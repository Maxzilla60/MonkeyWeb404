<?php
require 'databaseController.php';
require 'AltoRouter.php';

try {
    $controller = new DBController();
    $router = new AltoRouter();
    $router->setBasePath('/~user/monkey/api');

    $router->map('GET', '/events/?',
        function() use ($controller) {
            $controller->getBetweenDates($_GET['from'],$_GET['until']);
        }
    );

    $router->map('GET', '/events/',
        function() use ($controller) {
            $controller->getAll();
        }
    );

    $router->map('GET', '/events/[i:id]',
        function($id) use ($controller) {
            $controller->getByID($id);
        }
    );

    $match = $router->match();

    if ($match && is_callable($match['target'])) {
        call_user_func_array($match['target'], $match['params']);
    }
}
catch (Exception $e) {
    var_dump($e);
}