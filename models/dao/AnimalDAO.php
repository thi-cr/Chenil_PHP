<?php


class AnimalDAO extends AbstractDAO
{
    public function __construct()
    {
        //appelle le constructeur du parent (AbstractDAO)
        parent::__construct('animaux');
    }

    public function personne($personne_id)
    {
        return $this->belongsTo(new PersonneDAO(), $personne_id);
    }

    public function vaccins($animal_id)
    {
        return $this->belongsToMany(new VaccinDAO(), 'vaccin_animal', $animal_id, 'animal_id', 'vaccin_id');
    }

    public function sejours($animal_id)
    {
        return $this->hasMany(new SejourDAO(), 'animal_id', $animal_id);
    }

    public function race($race_id)
    {
        return $this->belongsTo(new RaceDAO(), $race_id);
    }

    public function associate_vaccins($id, $vaccin_ids)
    {
        foreach ($vaccin_ids as $vaccin) {
            $this->associate('vaccin_animal', $id, 'animal_id', 'vaccin_id', $vaccin);
        }
    }

    public function dissociate_vaccins($id, $vaccin_ids)
    {
        foreach ($vaccin_ids as $vaccin) {
            $this->dissociate('vaccin_animal', $id, 'animal_id', 'vaccin_id', $vaccin);
        }
    }

    public function remove_vaccins($id){
        $this->remove('vaccin_animal', $id, 'animal_id');
    }

    function create($result)
    {
        return new Animal(
            $result['id'],
            $result['nom'],
            $result['sexe'],
            $result['sterilise'],
            $result['date_naissance'],
            $result['numero_puce'],
            $result['proprietaire_id'],
            $result['race_id']
        );
    }

    function deepCreate($result)
    {
        return new animal(
            $result['id'],
            $result['nom'],
            $result['sexe'],
            $result['sterilise'],
            $result['date_naissance'],
            $result['numero_puce'],
            $this->personne($result['proprietaire_id']),
            $this->race($result['race_id']),
            $this->vaccins($result['id']),
            $this->sejours($result['id'])
        );
    }

    function store($id, $data)
    {
        var_dump($data);
        if (empty($data['nom']) || empty($data['sexe']) || empty($data['sterilise']) || empty($data['date_naissance']) || empty($data['numero_puce']) || empty($data['personne']) || empty($data['race'])) {
            return false;
        }
        $animalDAO = new AnimalDAO();

        $animal = $this->create(
            [
                'id' => 0,
                'nom' => $data['nom'],
                'sexe' => $data['sexe'],
                'sterilise' => $data['sterilise'],
                'date_naissance' => $data['date_naissance'],
                'numero_puce' => $data['numero_puce'],
                'proprietaire_id' => $data['personne'],
                'race_id' => $data['race']
            ]
        );

        try {
            $statement = $this->connection->prepare(
                "INSERT INTO {$this->table} (nom, sexe, sterilise, date_naissance, numero_puce, proprietaire_id, race_id) VALUES (?, ?, ?, ?, ?, ?, ?)"
            );
            $statement->execute([
                htmlspecialchars($data['nom']),
                htmlspecialchars($data['sexe']),
                htmlspecialchars($data['sterilise']),
                htmlspecialchars($data['date_naissance']),
                htmlspecialchars($data['numero_puce']),
                htmlspecialchars($data['personne']),
                htmlspecialchars($data['race']),

            ]);
            if (isset($data['vaccins'])) {
                $id = $this->connection->lastInsertId();
                $animalDAO->associate_vaccins($id, $data['vaccins']);
                return true;
            }
            return true;
        } catch (PDOException $e) {
            print $e->getMessage();
        }


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
            $statement = $this->connection->prepare("UPDATE {$this->table} SET nom = ?, sexe = ?, sterilise = ?, date_naissance = ?, numero_puce = ?, proprietaire_id = ?, race_id = ? WHERE id = ?");
            $statement->execute(
                [
                    htmlspecialchars($data['nom']),
                    htmlspecialchars($data['sexe']),
                    htmlspecialchars($data['sterilise']),
                    htmlspecialchars($data['date_naissance']),
                    htmlspecialchars($data['numero_puce']),
                    htmlspecialchars($data['personne']),
                    htmlspecialchars($data['race']),
                    htmlspecialchars($data['id'])
                ]
            );
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        $animal = $this->fetch($data['id']);
        $animalDAO = new AnimalDAO();

        if (isset($data['vaccins'])) {
            $diff = $animal->has_vaccins($data['vaccins']);

            if ($diff['associate']) {
                $animalDAO->associate_vaccins($data['id'], $diff['associate']);
            }

            if ($diff['dissociate']) {
                $animalDAO->dissociate_vaccins($data['id'], $diff['dissociate']);
            }
        }else{
            $diff = $animal->has_vaccins($data['vaccins']);
            $animalDAO->dissociate_vaccins($data['id'], $diff['dissociate']);

        }

    }
}