<?php


class Sejour
{
    private $id;
    private $date_debut;
    private $date_fin;
    private $animal_id;

    /**
     * Sejour constructor.
     * @param $id
     * @param $date_debut
     * @param $date_fin
     * @param $animal_id
     */
    public function __construct($id, $date_debut, $date_fin, $animal_id)
    {
        $this->id = $id;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
        $this->animal_id = $animal_id;
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