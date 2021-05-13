<?php


class Vaccin
{
    private $id;
    private $nom;
    private $description;
    private $espece_id;
    private $animaux;

    /**
     * Vaccin constructor.
     * @param $id
     * @param $nom
     * @param $description
     * @param $espece_id
     * @param bool $animaux
     */
    public function __construct($id, $nom, $description, $espece_id, $animaux = false)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->espece_id = $espece_id;
        $this->animaux = $animaux;
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