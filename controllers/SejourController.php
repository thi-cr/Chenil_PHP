<?php


class sejourController extends AbstractController
{
    public function __construct()
    {
        $this->dao = new SejourDAO();
    }

    public function index()
    {
        $sejours = $this->dao->fetchAll();

        include('../views/head.php');
        include('../views/sejours/list.php');
        include('../views/foot.php');
    }

    public function store($id, $data)
    {
        $is_stored_in_db = $this->dao->store($id, $data);
        if ($is_stored_in_db) {
            $sejours = $this->dao->fetchAll();
            include('../views/head.php');
            include('../views/sejours/list.php');
            include('../views/foot.php');
        } else {
            echo "Erreur";
            return http_response_code(401);
        }
    }

    public function delete($id, $data)
    {
        $this->dao->delete($data);
        $sejours = $this->dao->fetchAll();
        include('../views/head.php');
        include('../views/sejours/list.php');
        include('../views/foot.php');
    }


    public function edit($id)
    {
        $sejour = $this->dao->fetch($id);
        $animalDAO = new AnimalDAO();
        $animaux = $animalDAO->fetchAll();
        include('../views/head.php');
        include('../views/sejours/edit.php');
        include('../views/foot.php');
    }

    public function update($id, $data)
    {
        $this->dao->update($id, $data);
        $sejours = $this->dao->fetchAll();
        include('../views/head.php');
        include('../views/sejours/list.php');
        include('../views/foot.php');
    }

    public function add()
    {
        $animalDAO = new AnimalDAO();
        $animaux = $animalDAO->fetchAll();
        include('../views/head.php');
        include('../views/sejours/ajouter.php');
        include('../views/foot.php');
    }
}