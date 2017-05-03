<?php

class DBController
{
    function getByID($id) {
        echo "Get by id (".$id.")<br>";

        try {
            $pdo = new PDO("mysql:host=localhost;dbname=monkey",
                'root', 'user' );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            foreach ($pdo->query("SELECT * FROM events WHERE ID=" . $id) as $row) {
                $name = $row['Name'];
            }
        }
        catch ( PDOException $e ) {
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

    function getAll() {
        echo "Get all<br>";

        try {
            $pdo = new PDO("mysql:host=localhost;dbname=monkey",
                'root', 'user' );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Create array for each result:
            $i = 0;
            $events = array();
            foreach($pdo->query("SELECT * FROM events") as $row) {
                $events[$i] = new StdClass();
                $events[$i]->id = $row['ID'];
                $events[$i]->name = $row['Name'];
                $i++;
            }
        }
        catch ( PDOException $e ) {
            print 'Exception!: ' . $e->getMessage();
        }
        $pdo = null;

        // Send results:
        http_response_code(200);
        header('Content-Type: application/json');
        echo json_encode($events);
    }

    function getBetweenDates($from,$until) {
        echo "Get between Dates (".$from.",".$until.")<br>";

        // Open database connection:
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=monkey",
                'root', 'user' );
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
}
?>