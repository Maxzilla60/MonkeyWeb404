<?php

class werknemers extends Controller
{
    public function index()
    {
        session_start();
        if(!isset($_SESSION["valid_user"])){
            header('location: ' . URL . 'home/index');
        }else {
            $werknemers = $this->model->getAllWerknemers();

            require APP . 'view/_templates/header.php';
            require APP . 'view/werknemers/index.php';
            require APP . 'view/_templates/footer.php';
        }

    }

    public function addWerknemer()
    {
        if (isset($_POST["submit_add_werknemer"])) {
            $this->model->addWerknemer($_POST["id"], $_POST["naam"], $_POST["uren"], $_POST["evenementen"]);
        }

        header('location: ' . URL . 'werknemers/index');
    }

    public function deleteWerknemer($werknemer_id)
    {
        if (isset($werknemer_id)) {
            $this->model->deleteWerknemer($werknemer_id);
        }

        header('location: ' . URL . 'werknemers/index');
    }

    public function editWerknemer($werknemer_id)
    {
        if (isset($werknemer_id)) {
            $werknemer = $this->model->getWerknemer($werknemer_id);

            require APP . 'view/_templates/header.php';
            require APP . 'view/werknemers/edit.php';
            require APP . 'view/_templates/footer.php';
        } else {
            header('location: ' . URL . 'werknemers/index');
        }
    }

    public function updateWerknemer()
    {
        if (isset($_POST["submit_update_werknemer"])) {
            $this->model->updateWerknemer($_POST["naam"], $_POST["uren"], $_POST["evenementen"], $_POST['werknemer_id']);
        }
        header('location: ' . URL . 'werknemers/index');
    }

}