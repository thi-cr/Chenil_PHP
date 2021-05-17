<?php


class EspeceController extends AbstractController
{
    public function __construct()
    {
        $this->dao = new EspeceDAO();
    }

    public function index()
    {
        $especes = $this->dao->fetchAll();

        include('../views/head.php');
        include('../views/especes/list.php');
        include('../views/foot.php');
    }

    public function store($id, $data)
    {
        $is_stored_in_db = $this->dao->store($id, $data);
        if ($is_stored_in_db) {
            $especes = $this->dao->fetchAll();
            include('../views/head.php');
            include('../views/especes/list.php');
            include('../views/foot.php');
        } else {
            echo "Erreur";
            return http_response_code(401);
        }
    }

    public function delete($id, $data)
    {
        $this->dao->delete($data);
        $especes = $this->dao->fetchAll();
        include('../views/head.php');
        include('../views/especes/list.php');
        include('../views/foot.php');
    }


    public function edit($id)
    {
        $espece = $this->dao->fetch($id);
        include('../views/head.php');
        include('../views/especes/edit.php');
        include('../views/foot.php');
    }

    public function update($id, $data)
    {
        $this->dao->update($id, $data);
        $especes = $this->dao->fetchAll();
        include('../views/head.php');
        include('../views/especes/list.php');
        include('../views/foot.php');
    }

    public function add()
    {
        $animalDAO = new AnimalDAO();
        $animaux = $animalDAO->fetchAll();
        include('../views/head.php');
        include('../views/especes/ajouter.php');
        include('../views/foot.php');
    }

}