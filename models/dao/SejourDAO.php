<?php


class SejourDAO extends AbstractDAO
{
    public function __construct()
    {
        //appelle le constructeur du parent (AbstractDAO)
        parent::__construct('sejours');
    }

    public function create($result)
    {
        return new Sejour(
          $result['id'],
          $result['dateDebut'],
          $result['dateFin'],
          $result['animalID']
        );
    }
}