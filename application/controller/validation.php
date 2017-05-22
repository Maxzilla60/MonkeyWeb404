<?php

session_start();

class validation extends Controller


{
    public function validateUser(){
        $users= $this->model->getAllUsers();
        $right =false;
        foreach ($users as $user) {
            if($user->username == $_POST["user"] && $user->password == md5($_POST["password"])){
                $right=true;
                $_SESSION["valid_user"]= true;
            }
        }
        if($right){
            header('location: ' . URL . 'landingPage/index');
        }else{
            Require APP .'view/login/login.php';
            Require APP .'view/_templates/wrongLogin.php';
            $_SESSION["valid_user"]= null;

        }
        $right=false;
    }

}