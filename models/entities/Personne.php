<?php


class personne
{
    private $id;
    private $nom;
    private $prenom;
    private $dateNais;
    private $email;
    private $tel;

    /**
     * personne constructor.
     * @param $id
     * @param $nom
     * @param $prenom
     * @param $dateNais
     * @param $email
     * @param $tel
     */
    public function __construct($id, $nom, $prenom, $dateNais, $email, $tel)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNais = $dateNais;
        $this->email = $email;
        $this->tel = $tel;
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