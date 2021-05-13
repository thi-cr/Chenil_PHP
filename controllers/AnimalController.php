<?php


class AnimalController extends AbstractController
{
    public function __construct()
    {
        $this->dao = new AnimalDAO();
    }

    public function index()
    {
        $animaux = $this->dao->fetchAll();

        $personneDAO = new PersonneDAO();
        $personnes = $personneDAO->fetchAll();
        include('../views/head.php');
        include('../views/animaux/list.php');
        include('../views/foot.php');
    }

    public function store($data)
    {
        $is_stored_in_db = $this->dao->store($data);
        if ($is_stored_in_db) {
            $animaux = $this->dao->fetchAll();
            include('../views/animaux/list.php');
        } else {
            echo "Erreur";
            return http_response_code(401);
        }
    }

    public function delete($id, $data)
    {
        $this->dao->delete($data);
        $animaux = $this->dao->fetchAll();
        include('../views/animaux/list.php');
    }

    public function show($id)
    {
        $animal = $this->dao->fetch($id);
        include('../views/animaux/one.php');
    }

    public function edit($id)
    {
        $animal = $this->dao->fetch($id);
        $vaccinDAO = new VaccinDAO();
        $vaccins = $vaccinDAO->fetchAll();
        $personneDAO = new PersonneDAO();
        $personnes = $personneDAO->fetchAll();
        $raceDAO = new RaceDAO();
        $races = $raceDAO->fetchAll();
        include('../views/animaux/edit.php');
    }

    public function update($id, $data)
    {
        $this->dao->update($id, $data);
        $animaux = $this->dao->fetchAll();
        include('../views/animaux/list.php');
    }

    public function add()
    {
        $vaccinDAO = new VaccinDAO();
        $vaccins = $vaccinDAO->fetchAll();
        $personneDAO = new PersonneDAO();
        $personnes = $personneDAO->fetchAll();
        $raceDAO = new RaceDAO();
        $races = $raceDAO->fetchAll();
        include('../views/animaux/ajouter.php');
    }

}