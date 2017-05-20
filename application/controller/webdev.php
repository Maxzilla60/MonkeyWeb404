<?php

class WebDev extends Controller
{
    public function index()
    {
        $students = $this->model->getAllStudents();
        $users= $this->model->getAllUsers();

        require APP . 'view/_templates/header.php';
        require APP . 'view/webdev/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function addStudent()
    {
        if (isset($_POST["submit_add_student"])) {
            $this->model->addStudent($_POST["name"], $_POST["number"],  $_POST["richting"]);
        }

        header('location: ' . URL . 'webdev/index');
    }

    public function deleteStudent($student_id)
    {
        if (isset($student_id)) {
            $this->model->deleteStudent($student_id);
        }

        header('location: ' . URL . 'webdev/index');
    }

    public function editStudent($student_id)
    {
        if (isset($student_id)) {
            $student = $this->model->getStudent($student_id);

            require APP . 'view/_templates/header.php';
            require APP . 'view/webdev/edit.php';
            require APP . 'view/_templates/footer.php';
        } else {
            header('location: ' . URL . 'webdev/index');
        }
    }

    public function updateStudent()
    {
        if (isset($_POST["submit_update_student"])) {
            $this->model->updateStudent($_POST["name"], $_POST["number"],  $_POST["richting"], $_POST['student_id']);
        }
        header('location: ' . URL . 'webdev/index');
    }

    public function validateUser(){
        $users= $this->model->getAllUsers();
        $right =false;
        foreach ($users as $user) {
            if($user->username == $_POST["user"] && $user->password == md5($_POST["password"])){
                    $right=true;
            }
        }
        if($right){
            Require APP  .'view/_templates/header.php';
            Require APP .'view/home/index.php';
            Require APP .'view/_templates/footer.php';
        }else{
            Require APP .'view/login/login.php';
            Require APP .'view/_templates/wrongLogin.php';
        }
        $right=false;
    }


}
