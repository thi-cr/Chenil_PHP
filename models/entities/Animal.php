<?php


class Animal
{
    private $id;
    private $nom;
    private $sexe;
    private $sterilise;
    private $dateNais;
    private $numPuce;
    private $proprioID;
    private $raceID;

    /**
     * Animal constructor.
     * @param $id
     * @param $nom
     * @param $sexe
     * @param $sterilise
     * @param $dateNais
     * @param $numPuce
     * @param $proprioID
     * @param $raceID
     */
    public function __construct($id, $nom, $sexe, $sterilise, $dateNais, $numPuce, $proprioID, $raceID)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->sexe = $sexe;
        $this->sterilise = $sterilise;
        $this->dateNais = $dateNais;
        $this->numPuce = $numPuce;
        $this->proprioID = $proprioID;
        $this->raceID = $raceID;
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

    public function get_ids($objs)
    {
        //renvoyer un tableau d'ID en ayant recu un tableau d'objets
        $ids = array();
        foreach ($objs as $obj) {
            if ($obj->id) {
                array_push($ids, $obj->id);
            }
        }
        return $ids;
    }


    }