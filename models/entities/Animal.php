<?php


class Animal
{
    private $id;
    private $nom;
    private $sexe;
    private $sterilise;
    private $date_naissance;
    private $numero_puce;
    private $proprietaire_id;
    private $race_id;
    private $vaccins;
    private $sejourID;

    /**
     * Animal constructor.
     * @param $id
     * @param $nom
     * @param $sexe
     * @param $sterilise
     * @param $date_naissance
     * @param $numero_puce
     * @param $proprietaire_id
     * @param $race_id
     * @param bool $vaccins
     * @param bool $sejourID
     */
    public function __construct($id, $nom, $sexe, $sterilise, $date_naissance, $numero_puce, $proprietaire_id, $race_id, $vaccins = false, $sejourID = false)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->sexe = $sexe;
        $this->sterilise = $sterilise;
        $this->date_naissance = $date_naissance;
        $this->numero_puce = $numero_puce;
        $this->proprietaire_id = $proprietaire_id;
        $this->race_id = $race_id;
        $this->vaccins = $vaccins;
        $this->sejourID = $sejourID;
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

    public function has_vaccin ($vaccin_id) {
        //detecter si dans $this->vaccins il y a un vaccin avec cette id, si oui je vais return true sinon false
        if($this->vaccins) {
            foreach($this->vaccins as $vaccin) {
                if($vaccin && $vaccin->id && $vaccin->id == $vaccin_id) {
                    return true;
                }
            }
        }
        return false;
    }

    public function has_vaccins ($vaccin_ids) {
        $current_ids = $this->get_ids($this->vaccins);
        $dissociate = array_diff($current_ids, $vaccin_ids);
        $associate = array();

        foreach($vaccin_ids as $vaccin_id) {
            if (!in_array($vaccin_id, $current_ids)) {
                array_push($associate, $vaccin_id);
            }
        }

        return ["associate" => $associate, "dissociate" => $dissociate];

    }


    }