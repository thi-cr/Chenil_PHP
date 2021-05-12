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
}