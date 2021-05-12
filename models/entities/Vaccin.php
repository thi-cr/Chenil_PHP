<?php


class Vaccin
{
    private $id;
    private $nom;
    private $desc;
    private $especeID;

    /**
     * Vaccin constructor.
     * @param $id
     * @param $nom
     * @param $desc
     * @param $especeID
     */
    public function __construct($id, $nom, $desc, $especeID)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->desc = $desc;
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