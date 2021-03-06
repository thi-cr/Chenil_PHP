<?php


class PersonneController extends AbstractController
{
    public function __construct()
    {
        $this->dao = new PersonneDAO();
    }

    public function index()
    {
        $personnes = $this->dao->fetchAll();

        include('../views/head.php');
        include('../views/personnes/list.php');
        include('../views/foot.php');
    }

    public function store($id, $data)
    {
        $is_stored_in_db = $this->dao->store($id, $data);
        if ($is_stored_in_db) {
            $personnes = $this->dao->fetchAll();
            include('../views/head.php');
            include('../views/personnes/list.php');
            include('../views/foot.php');
        } else {
            echo "Erreur";
            return http_response_code(401);
        }
    }

    public function delete($id, $data)
    {
        $error = $this->dao->delete($data);
        $personnes = $this->dao->fetchAll();
        include('../views/personnes/list.php');
    }

    public function show($id)
    {
        $personne = $this->dao->fetch($id);
        include('../views/head.php');
        include('../views/personnes/one.php');
        include('../views/foot.php');
    }

    public function edit($id)
    {
        $personne = $this->dao->fetch($id);
        $animalDAO = new AnimalDAO();
        $animaux = $animalDAO->fetchAll();
        include('../views/head.php');
        include('../views/personnes/edit.php');
        include('../views/foot.php');
    }

    public function update($id, $data)
    {
        $this->dao->update($id, $data);
        $personnes = $this->dao->fetchAll();
        include('../views/head.php');
        include('../views/personnes/list.php');
        include('../views/foot.php');
    }

    public function add()
    {
        $animalDAO = new AnimalDAO();
        $animaux = $animalDAO->fetchAll();
        include('../views/head.php');
        include('../views/personnes/ajouter.php');
        include('../views/foot.php');
    }
}