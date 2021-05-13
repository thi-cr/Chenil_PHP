<?php


class PersonneDAO extends AbstractDAO
{
    public function __construct()
    {
        //appelle le constructeur du parent (AbstractDAO)
        parent::__construct('personnes');
    }

    public function animaux($proprietaire_id)
    {
        return $this->hasMany(new AnimalDAO(), 'proprietaire_id', $proprietaire_id);
    }

    public function create($result)
    {
        return new Personne(
            $result['id'],
            $result['nom'],
            $result['prenom'],
            $result['date_naissance'],
            $result['email'],
            $result['tel']
        );
    }

    public function deepCreate($result)
    {
        return new Personne(
            $result['id'],
            $result['nom'],
            $result['prenom'],
            $result['date_naissance'],
            $result['email'],
            $result['tel'],
            $this->animaux($result['id'])
        );
    }

    function delete($data)
    {
        if (empty($data['id'])) {
            return false;
        }

        try {
            $statement = $this->connection->prepare("DELETE FROM {$this->table} WHERE id = ?");
            $statement->execute([
                $data['id']
            ]);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    public function update($id, $data)
    {
        try {
            $statement = $this->connection->prepare("UPDATE {$this->table} SET nom = ?, prenom = ?, date_naissance = ?, email = ?, tel = ? WHERE id = ?");
            $statement->execute(
                [
                    htmlspecialchars($data['nom']),
                    htmlspecialchars($data['prenom']),
                    htmlspecialchars($data['date_naissance']),
                    htmlspecialchars($data['email']),
                    htmlspecialchars($data['tel']),
                    htmlspecialchars($data['id'])
                ]
            );
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    function store($id, $data)
    {
        if (empty($data['nom']) || empty($data['prenom']) || empty($data['date_naissance']) || empty($data['email']) || empty($data['tel'])) {
            return false;
        }

        try {
            $statement = $this->connection->prepare(
                "INSERT INTO {$this->table} (nom, prenom, date_naissance, email, tel) VALUES (?, ?, ?, ?, ?)"
            );
            $statement->execute([
                htmlspecialchars($data['nom']),
                htmlspecialchars($data['prenom']),
                htmlspecialchars($data['date_naissance']),
                htmlspecialchars($data['email']),
                htmlspecialchars($data['tel'])
            ]);
            return true;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

}