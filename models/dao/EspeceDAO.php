<?php


class EspeceDAO extends AbstractDAO
{
    public function __construct()
    {
        //appelle le constructeur du parent (AbstractDAO)
        parent::__construct('especes');
    }

    public function races($espece_id)
    {
        return $this->hasMany(new RaceDAO(), 'espece_id', $espece_id);
    }

    public function create($result)
    {
        return new Espece(
            $result['id'],
            $result['nom']
        );
    }
    public function deepCreate($result)
    {
        return new Espece(
            $result['id'],
            $result['nom']
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
            return $e->getMessage();
        }
    }

    public function update($id, $data)
    {
        try {
            $statement = $this->connection->prepare("UPDATE {$this->table} SET nom = ? WHERE id = ?");
            $statement->execute(
                [
                    htmlspecialchars($data['nom']),
                    htmlspecialchars($data['id'])
                ]
            );
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    function store($id, $data)
    {
        if (empty($data['nom'])) {
            return false;
        }

        try {
            $statement = $this->connection->prepare(
                "INSERT INTO {$this->table} (nom) VALUES (?)"
            );
            $statement->execute([
                htmlspecialchars($data['nom']),
            ]);
            return true;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }


}