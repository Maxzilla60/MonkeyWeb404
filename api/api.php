<?php
$user='root';
$password='user';
$database='monkey';
$pdo=null;

// Parse URL & Request:
$url = parse_url(trim($_SERVER['REQUEST_URI']));
$pathSegments = array_values(array_filter(explode('/',$url['path'])));
$method = $_SERVER['REQUEST_METHOD'];
$requestBody = file_get_contents('php://input');

// GET:
if ($method == 'GET') {
    // GET between Dates:
    if (isset($pathSegments[4]) && substr(($pathSegments[4]),0,6) === "?from=") {
        echo "Get between Dates<br>";
        $from = intval($_GET['from']);
        $until = intval($_GET['until']);

        // Open database connection:
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=$database",
                $user, $password );
            $pdo->setAttribute( PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION );

            // Create array for each result:
            $i = 0;
            $events = array();
            foreach($pdo->query("SELECT * FROM events WHERE StartDate > '".$from."' AND EndDate < '".$until."'") as $row) {
                $events[$i] = new StdClass();
                $events[$i]->id = $row['ID'];
                $events[$i]->name = $row['Name'];
                $i++;
            }
        } catch ( PDOException $e ) {
            print 'Exception!: ' . $e->getMessage();
        }
        $pdo = null;

        // Send results:
        http_response_code(200);
        header('Content-Type: application/json');
        echo json_encode($events);
    }
    // GET ALL:
    else if ($url['path'] == "/~user/monkey/api/events/") {
        echo "Get all<br>";
        // Open database connection:
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=$database",
                $user, $password );
            $pdo->setAttribute( PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION );

            // Create array for each result:
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

        // Send results:
        http_response_code(200);
        header('Content-Type: application/json');
        echo json_encode($events);
    }
    // GET by ID:
    else if (isset($pathSegments[4]) && is_numeric($pathSegments[4])) {
        echo "Get by ID<br>";
        $id = $pathSegments[4]; // Keep requested ID
        // Open database connection:
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=$database",
                $user, $password );
            $pdo->setAttribute( PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION );

            // Get result:
            foreach($pdo->query("SELECT * FROM events WHERE ID=".$id) as $row) {
                $name = $row['Name'];
            }

        } catch ( PDOException $e ) {
            print 'Exception!: ' . $e->getMessage();
        }
        $pdo = null;

        // Create result class:
        $event = new StdClass();
        $event->id = $id;
        $event->name = $name;
        // Send result:
        http_response_code(200);
        header('Content-Type: application/json');
        echo json_encode($event);
    }
    // GET between Person and Dates:
    /*
        $from = intval($_GET['from']);
        $until = intval($_GET['until']);
    */
    // POST Person:
}