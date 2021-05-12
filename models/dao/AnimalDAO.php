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

    public function associate_vaccins ($id, $vaccin_ids) {
        foreach ($vaccin_ids as $vaccin) {
            $this->associate('vaccin_animal', $id, 'animal_id', 'vaccin_id', $vaccin);
            //table intermédiaire, l'id du pokémon, la colonne dans la table 'pokemon_id', 'type_id', $type
        }
    }

    public function dissociate_vaccins ($id, $vaccin_ids) {
        foreach ($vaccin_ids as $vaccin) {
            $this->dissociate('vaccin_animal', $id, 'animal_id', 'vaccin_id', $vaccin);
            //table intermédiaire, l'id du pokémon, la colonne dans la table 'pokemon_id', 'type_id', $type
        }
    }

    function create($result)
    {
        return new Animal(
            $result['id'],
            $result['nom'],
            $result['sexe'],
            $result['sterilise'],
            $result['dateNais'],
            $result['numPuce'],
            $result['proprioID'],
            $result['raceID']
        );
    }

    function deepCreate($result)
    {
        return new animal(
            $result['id'],
            $result['nom'],
            $result['sexe'],
            $result['sterilise'],
            $result['dateNais'],
            $result['numPuce'],
            $this->personne($result['proprioID']),
            $this->race($result['raceID']),
            $this->vaccins($result['id']),
            $this->sejours($result['id'])
        );
    }

    function store ($data) {
        if(empty($data['nom']) || empty($data['sexe']) || empty($data['sterilise']) || empty($data['dateNais']) || empty($data['numPuce']) || empty($data['proprioID']) || empty($data['raceID'])) {
            return false;
        }

        $animal = $this->create(
            [
                'id'=> 0,
                'nom'=> $data['nom'],
                'sexe' => $data['sexe'],
                'sterilise'=> $data['sterilise'],
                'dateNais' => $data['dateNais'],
                'numPuce' => $data['numPuce'],
                'proprioID' => $data['proprioID'],
                'raceID' => $data['raceID']
            ]
        );

        if ($animal) {
            try {
                $statement = $this->connection->prepare(
                    "INSERT INTO {$this->table} (nom, sexe, sterilise, date_naissance, numero_puce, proprietaire_id, race_id) VALUES (?, ?, ?, ?, ?, ?, ?)"
                );
                $statement->execute([
                    htmlspecialchars($animal->__get('nom')),
                    htmlspecialchars($animal->__get('sexe')),
                    htmlspecialchars($animal->__get('sterilise')),
                    htmlspecialchars($animal->__get('dateNais')),
                    htmlspecialchars($animal->__get('numPuce')),
                    htmlspecialchars($animal->__get('proprioID')),
                    htmlspecialchars($animal->__get('raceID')),
                ]);
                return true;
            } catch(PDOException $e) {
                print $e->getMessage();
                return false;
            }
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
}