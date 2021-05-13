<?php


class personne
{
    private $id;
    private $nom;
    private $prenom;
    private $date_naissance;
    private $email;
    private $tel;
    private $animaux;

    /**
     * personne constructor.
     * @param $id
     * @param $nom
     * @param $prenom
     * @param $date_naissance
     * @param $email
     * @param $tel
     * @param bool $animaux
     */
    public function __construct($id, $nom, $prenom, $date_naissance, $email, $tel, $animaux = false)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->date_naissance = $date_naissance;
        $this->email = $email;
        $this->tel = $tel;
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