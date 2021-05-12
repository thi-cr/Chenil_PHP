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
}