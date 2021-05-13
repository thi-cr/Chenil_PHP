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
}