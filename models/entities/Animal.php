<?php


class Animal
{
    private $id;
    private $nom;
    private $race;
    private $sexe;
    private $sterilise;
    private $dateNais;
    private $numPuce;
    private $proprio;

    /**
     * Animal constructor.
     * @param $id
     * @param $nom
     * @param $race
     * @param $sexe
     * @param $sterilise
     * @param $dateNais
     * @param $numPuce
     * @param $proprio
     */
    public function __construct($id, $nom, $race, $sexe, $sterilise, $dateNais, $numPuce, $proprio)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->race = $race;
        $this->sexe = $sexe;
        $this->sterilise = $sterilise;
        $this->dateNais = $dateNais;
        $this->numPuce = $numPuce;
        $this->proprio = $proprio;
    }

    public function __get ($prop) {
        if (property_exists($this, $prop)) {
            return $this->$prop;
        }
    }

    public function __set ($prop, $value) {
        if(property_exists($this, $prop)) {
            $this->$prop = $value;
        }
    }


}