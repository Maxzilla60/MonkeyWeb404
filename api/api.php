<?php
$user='root';
$password='user';
$database='monkey';
$pdo=null;

$url = parse_url(trim($_SERVER['REQUEST_URI']));
$pathSegments = array_values(array_filter(explode('/',$url['path'])));
$method = $_SERVER['REQUEST_METHOD'];
$requestBody = file_get_contents('php://input');

if ($method == 'GET') {
    if ($url['path'] == "/~user/monkey/api/events/") {
        try {
            $pdo = new PDO( "mysql:host=localhost;dbname=$database",
                $user, $password );
            $pdo->setAttribute( PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION );

            $i = 0;
            $events = array();
            foreach($pdo->query("SELECT * FROM events") as $row) {
                $events[$i] = new StdClass();
                $events[$i]->id = $row['ID'];
                $events[$i]->name = $row['Name'];
                $i++;
            }
        } catch ( PDOException $e ) {
            print 'Exception!: ' . $e->getMessage();
        }
        $pdo = null;

        http_response_code(200);
        header('Content-Type: application/json');
        echo json_encode($events);
    }
    else if (isset($pathSegments[4])) {
        $id = $pathSegments[4];

        try {
            $pdo = new PDO( "mysql:host=localhost;dbname=$database",
                $user, $password );
            $pdo->setAttribute( PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION );

            foreach($pdo->query("SELECT * FROM events WHERE ID=".$id) as $row) {
                $name = $row['Name'];
            }

        } catch ( PDOException $e ) {
            print 'Exception!: ' . $e->getMessage();
        }
        $pdo = null;

        $person = new StdClass();
        $person->id = $id;
        $person->name = $name;
        http_response_code(200);
        header('Content-Type: application/json');
        echo json_encode($person);
        echo $url['path'];
    }
}