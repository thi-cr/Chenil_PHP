<?php


class Race
{
    private $id;
    private $nom;
    private $espece_id;

    /**
     * Race constructor.
     * @param $id
     * @param $nom
     * @param $espece_id
     */
    public function __construct($id, $nom, $espece_id)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->espece_id = $espece_id;
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