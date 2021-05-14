<?php


class vaccinController extends AbstractController
{
    public function __construct()
    {
        $this->dao = new vaccinDAO();
    }

    public function index()
    {
        $vaccins = $this->dao->fetchAll();

        $especeDAO = new EspeceDAO();
        $especes = $especeDAO->fetchall();

        include('../views/head.php');
        include('../views/vaccins/list.php');
        include('../views/foot.php');
    }

    public function store($id, $data)
    {
        $is_stored_in_db = $this->dao->store($id, $data);
        if ($is_stored_in_db) {
            $vaccins = $this->dao->fetchAll();
            include('../views/vaccins/list.php');
        } else {
            echo "Erreur";
            return http_response_code(401);
        }
    }

    public function delete($id, $data)
    {
        $this->dao->delete($data);
        $vaccins = $this->dao->fetchAll();
        include('../views/vaccins/list.php');
    }

    public function edit($id)
    {
        $vaccin = $this->dao->fetch($id);
        $especeDAO = new EspeceDAO();
        $especes = $especeDAO->fetchAll();

        include('../views/vaccins/edit.php');
    }

    public function update($id, $data)
    {
        $this->dao->update($id, $data);
        $vaccins = $this->dao->fetchAll();
        include('../views/vaccins/list.php');
    }

    public function add()
    {
        $especeDAO = new EspeceDAO();
        $especes = $especeDAO->fetchAll();
        include('../views/vaccins/ajouter.php');
    }

}