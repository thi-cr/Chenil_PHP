<?php


class VaccinDAO extends AbstractDAO
{
    public function __construct()
    {
        //appelle le constructeur du parent (AbstractDAO)
        parent::__construct('vaccins');
    }

    public function animaux($vaccin_id)
    {
        return $this->belongsToMany(new AnimalDAO(), 'vaccin_animal', $vaccin_id, 'vaccin_id', 'animal_id');
    }

    public function create($result)
    {
        return new Vaccin(
            $result['id'],
            $result['nom'],
            $result['description'],
            $result['espece_id']
        );
    }

    public function deepCreate($result)
    {
        return new Vaccin(
            $result['id'],
            $result['nom'],
            $result['description'],
            $result['espece_id'],
            $this->animaux($result['id'])
        );
    }
}