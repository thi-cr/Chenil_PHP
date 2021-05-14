<?php


class RaceDAO extends AbstractDAO
{
    public function __construct()
    {
        //appelle le constructeur du parent (AbstractDAO)
        parent::__construct('races');
    }

    public function especes($race_id)
    {
        return $this->belongsTo(new EspeceDAO(), $race_id);
    }

    public function create($result)
    {
        return new Race(
            $result['id'],
            $result['nom'],
            $result['espece_id']
        );
    }

    public function deepCreate($result)
    {
        return new Race(
            $result['id'],
            $result['nom'],
            $this->especes($result['espece_id'])
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
            $statement = $this->connection->prepare("UPDATE {$this->table} SET nom = ?, espece_id = ? WHERE id = ?");
            $statement->execute(
                [
                    htmlspecialchars($data['nom']),
                    htmlspecialchars($data['espece']),
                    htmlspecialchars($data['id'])
                ]
            );
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    function store($id, $data)
    {
        if (empty($data['nom']) || empty($data['espece'])) {
            return false;
        }


        try {
            $statement = $this->connection->prepare(
                "INSERT INTO {$this->table} (nom,espece_id) VALUES (?, ?)"
            );
            $statement->execute([
                htmlspecialchars($data['nom']),
                htmlspecialchars($data['espece'])
            ]);
            return true;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }


}