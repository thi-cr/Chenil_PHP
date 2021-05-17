<?php


class SejourDAO extends AbstractDAO
{
    public function __construct()
    {
        //appelle le constructeur du parent (AbstractDAO)
        parent::__construct('sejours');
    }

    public function animal($animal_id)
    {
        return $this->belongsTo(new AnimalDAO(), $animal_id);
    }

    public function create($result)
    {
        return new Sejour(
            $result['id'],
            $result['date_debut'],
            $result['date_fin'],
            $result['animal_id']
        );
    }

    public function deepCreate($result)
    {
        return new Sejour(
            $result['id'],
            $result['date_debut'],
            $result['date_fin'],
            $this->animal($result['animal_id'])
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
            $statement = $this->connection->prepare("UPDATE {$this->table} SET date_debut = ?, date_fin = ?, animal_id = ? WHERE id = ?");
            $statement->execute(
                [
                    htmlspecialchars($data['date_debut']),
                    htmlspecialchars($data['date_fin']),
                    htmlspecialchars($data['animal']),
                    htmlspecialchars($data['id'])
                ]
            );
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    function store($id, $data)
    {
        if (empty($data['date_debut']) || empty($data['date_fin']) || empty($data['animal'])) {
            return false;
        }

        try {
            $statement = $this->connection->prepare(
                "INSERT INTO {$this->table} (date_debut, date_fin, animal_id ) VALUES (?, ?, ?)"
            );
            $statement->execute([
                htmlspecialchars($data['date_debut']),
                htmlspecialchars($data['date_fin']),
                htmlspecialchars($data['animal']),
            ]);
            return true;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }
}