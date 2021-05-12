<?php


class Race
{
    private $id;
    private $nom;
    private $especeID;

    /**
     * Race constructor.
     * @param $id
     * @param $nom
     * @param $especeID
     */
    public function __construct($id, $nom, $especeID)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->especeID = $especeID;
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