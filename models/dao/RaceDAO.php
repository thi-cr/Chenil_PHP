<?php


class RaceDAO extends AbstractDAO
{
    public function __construct()
    {
        //appelle le constructeur du parent (AbstractDAO)
        parent::__construct('races');
    }

    public function animaux($race_id)
    {
        return $this->hasMany(new AnimalDAO(), 'race_id', $race_id);
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
            $this->animaux($result['id'])
        );
    }
}