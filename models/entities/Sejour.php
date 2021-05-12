<?php


class Sejour
{
    private $id;
    private $dateDebut;
    private $dateFin;
    private $animalID;

    /**
     * Sejour constructor.
     * @param $id
     * @param $dateDebut
     * @param $dateFin
     * @param $animalID
     */
    public function __construct($id, $dateDebut, $dateFin, $animalID)
    {
        $this->id = $id;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
        $this->animalID = $animalID;
    }

    public function __get($prop)
    {
        if (property_exists($this, $prop)) {
            return $this->$prop;
        }
    }

    public function __set($prop, $value)
    {
        if (property_exists($this, $prop)) {
            $this->$prop = $value;
        }
    }
}