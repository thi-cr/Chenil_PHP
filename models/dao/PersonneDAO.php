<?php


class PersonneDAO extends AbstractDAO
{
    public function __construct()
    {
        //appelle le constructeur du parent (AbstractDAO)
        parent::__construct('personnes');
    }

    public function animaux($proprietaire_id)
    {
        return $this->hasMany(new AnimalDAO(), 'proprietaire_id', $proprietaire_id);
    }

    public function create($result)
    {
        return new Personne(
        $result['id'],
        $result['nom'],
        $result['prenom'],
        $result['date_naissance'],
        $result['email'],
        $result['tel']
        );
    }

    public function deepCreate($result)
    {
        return new Personne(
            $result['id'],
            $result['nom'],
            $result['prenom'],
            $result['date_naissance'],
            $result['email'],
            $result['tel'],
            $this->animaux($result['id'])
        );
    }
}