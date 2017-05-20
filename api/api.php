<?php
require 'databaseController.php';
require 'AltoRouter.php';

try {
    $controller = new DBController();
    $router = new AltoRouter();
    $router->setBasePath('/~user/monkey/api');

    // GET all
    $router->map('GET', '/events/',
        function() use ($controller) {
            header('Content-Type: application/json');
            $controller->getAll();
        }
    );
    
    // GET by id
    $router->map('GET', '/events/[i:id]',
        function($id) use ($controller) {
            header('Content-Type: application/json');
            $controller->getByID($id);
        }
    );    
    
    // GET by person id
    $router->map('GET', '/events/person/[i:id]',
        function($id) use ($controller) {
            header('Content-Type: application/json');
            $controller->getByPersonID($id);
        }
    );

    // GET between dates
    $router->map('GET', '/events/byDate/',
        function() use ($controller) {
            header('Content-Type: application/json');
            $controller->getBetweenDates($_GET["from"],$_GET["until"]);
        }
    );

    // GET by person id and between dates
    $router->map('GET', '/events/person/[i:id]/byDate/',
        function($id) use ($controller) {
            header('Content-Type: application/json');
            $controller->getByPersonIDAndDates($id,$_GET["from"],$_GET["until"]);
        }
    );

    // POST event
    $router->map('POST', '/events/',
        function() use ($controller) {
            //header('Content-Type: application/json');
            $controller->postEvent(file_get_contents('php://input'));
        }
    );

    // DELETE event (GET)
    $router->map('GET', '/events/delete/[i:id]',
        function($id) use ($controller) {
            $controller->deleteEvent($id);
        }
    );

    // EDIT event (POST)
    $router->map('POST', '/events/edit/[i:id]',
        function($id) use ($controller) {
            $controller->editEvent($id, file_get_contents('php://input'));
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