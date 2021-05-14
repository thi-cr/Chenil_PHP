<?php


class RaceController extends AbstractController
{
    public function __construct()
    {
        $this->dao = new RaceDAO();
    }

    public function index()
    {
        $races = $this->dao->fetchAll();

        $especeDAO = new EspeceDAO();
        $especes = $especeDAO->fetchall();

        include('../views/head.php');
        include('../views/races/list.php');
        include('../views/foot.php');
    }

    public function store($id, $data)
    {
        $is_stored_in_db = $this->dao->store($id, $data);
        if ($is_stored_in_db) {
            $races = $this->dao->fetchAll();
            include('../views/races/list.php');
        } else {
            echo "Erreur";
            return http_response_code(401);
        }
    }

    public function delete($id, $data)
    {
        $this->dao->delete($data);
        $races = $this->dao->fetchAll();
        include('../views/races/list.php');
    }

    public function edit($id)
    {
        $race = $this->dao->fetch($id);
        $especeDAO = new EspeceDAO();
        $especes = $especeDAO->fetchAll();

        include('../views/races/edit.php');
    }

    public function update($id, $data)
    {
        $this->dao->update($id, $data);
        $races = $this->dao->fetchAll();
        include('../views/races/list.php');
    }

    public function add()
    {
        $especeDAO = new EspeceDAO();
        $especes = $especeDAO->fetchAll();
        include('../views/races/ajouter.php');
    }

}