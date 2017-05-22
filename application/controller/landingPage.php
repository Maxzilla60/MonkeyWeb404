<?php

/**
 * Created by PhpStorm.
 * User: 11500351
 * Date: 21/05/2017
 * Time: 16:54
 */
class landingPage extends Controller
{

    public function index()
    {
        session_start();
        if(!isset($_SESSION["valid_user"])){
            header('location: ' . URL . 'home/index');
        }else {
            // load views
            require APP . 'view/_templates/header.php';
            require APP . 'view/home/index.php';
            require APP . 'view/_templates/footer.php';
        }
    }
}