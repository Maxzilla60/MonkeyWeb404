<?php
class evenementenbeheer extends Controller
{


    public function index()
    {
        session_start();
        if(!isset($_SESSION["valid_user"])){
            header('location: ' . URL . 'home/index');
        }else {
            $evenementen = $this->model->getAllEvenementen();

            require APP . 'view/_templates/header.php';
            require APP . 'view/evenementenbeheer/index.php';
            require APP . 'view/_templates/footer.php';
        }

    }

    public function addEvenement()
    {
        if (isset($_POST["submit_add_evenement"])) {
            $this->model->addEvenement($_POST["id"], $_POST["naam"], $_POST["datum"], $_POST["werknemers"], $_POST["beschrijving"]);
        }

        header('location: ' . URL . 'evenementenbeheer/index');
    }

    public function deleteEvenement($evenement_id)
    {
        if (isset($evenement_id)) {
            $this->model->deleteEvenement($evenement_id);
        }

        header('location: ' . URL . 'evenementenbeheer/index');
    }

    public function editEvenement($evenement_id)
    {
        if (isset($evenement_id)) {
            $evenement = $this->model->getEvenement($evenement_id);

            require APP . 'view/_templates/header.php';
            require APP . 'view/evenementenbeheer/edit.php';
            require APP . 'view/_templates/footer.php';
        } else {
            header('location: ' . URL . 'evenementebeheer/index');
        }
    }

    public function updateEvenement()
    {
        if (isset($_POST["submit_update_evenement"])) {
            $this->model->updateEvenement($_POST["naam"], $_POST["datum"], $_POST["werknemers"], $_POST['beschrijving'], $_POST["evenement_id"]);
        }
        header('location: ' . URL . 'evenementenbeheer/index');
    }


}