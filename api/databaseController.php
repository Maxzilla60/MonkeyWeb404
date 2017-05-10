<?php

class DBController
{
    function getAll() {
        //echo "Get all<br>";

        try {
            // Open connection to DB:
            $pdo = new PDO("mysql:host=localhost;dbname=monkey",
                'root', 'user' );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Create array for each result:
            $i = 0;
            $events = array();
            foreach($pdo->query("SELECT * FROM events") as $row) {
                // Create class:
                $events[$i] = new StdClass();
                $events[$i]->id = $row['ID'];
                $events[$i]->name = $row['Name'];
                $events[$i]->personid = $row['PersonID'];
                $events[$i]->startdate = $row['StartDate'];
                $events[$i]->enddate = $row['EndDate'];
                $i++;
            }
        }
        catch ( PDOException $e ) {
            print 'Exception!: ' . $e->getMessage();
        }
        $pdo = null; // Close connection

        // Send results:
        http_response_code(200);
        header('Content-Type: application/json');
        echo json_encode($events, JSON_PRETTY_PRINT);
    }
    
    function getByID($id) {
        //echo "Get by id (".$id.")<br>";

        try {
            // Open connection to DB:
            $pdo = new PDO("mysql:host=localhost;dbname=monkey",
                'root', 'user' );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Create array for each result:
            $i = 0;
            $events = array();
            foreach ($pdo->query("SELECT * FROM events WHERE ID=" . $id) as $row) {
                // Create class:
                $events[$i] = new StdClass();
                $events[$i]->id = $row['ID'];
                $events[$i]->name = $row['Name'];
                $events[$i]->personid = $row['PersonID'];
                $events[$i]->startdate = $row['StartDate'];
                $events[$i]->enddate = $row['EndDate'];
                $i++;
            }
        }
        catch ( PDOException $e ) {
            print 'Exception!: ' . $e->getMessage();
        }
        $pdo = null; // Close connection

        // Send results:
        http_response_code(200);
        header('Content-Type: application/json');
        echo json_encode($events, JSON_PRETTY_PRINT);
    }
    
    function getByPersonID($id) {
        //echo "Get by person id (".$id.")<br>";

        try {
            // Open connection to DB:
            $pdo = new PDO("mysql:host=localhost;dbname=monkey",
                'root', 'user' );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Create array for each result:
            $i = 0;
            $events = array();
            foreach($pdo->query("SELECT * FROM events WHERE PersonID=". $id) as $row) {
                // Create class:
                $events[$i] = new StdClass();
                $events[$i]->id = $row['ID'];
                $events[$i]->name = $row['Name'];
                $events[$i]->personid = $row['PersonID'];
                $events[$i]->startdate = $row['StartDate'];
                $events[$i]->enddate = $row['EndDate'];
                $i++;
            }
        }
        catch ( PDOException $e ) {
            print 'Exception!: ' . $e->getMessage();
        }
        $pdo = null; // Close connection

        // Send results:
        http_response_code(200);
        header('Content-Type: application/json');
        echo json_encode($events, JSON_PRETTY_PRINT);
    }

    function getBetweenDates($from,$until) {
        // Check for filled in URL variables
        if ($from == null || $until == null) {
            echo "Please set from & until.";
        }
        else {
            //echo "Get between Dates (" . $from . "," . $until . ")\n\n";

            try {
                // Open connection to DB:
                $pdo = new PDO("mysql:host=localhost;dbname=monkey",
                    'root', 'user');
                $pdo->setAttribute(PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION);

                // Create array for each result:
                $i = 0;
                $events = array();
                foreach ($pdo->query("SELECT * FROM events WHERE StartDate > '" . $from . "' AND EndDate < '" . $until . "'") as $row) {
                    // Create class:
                    $events[$i] = new StdClass();
                    $events[$i]->id = $row['ID'];
                    $events[$i]->name = $row['Name'];
                    $events[$i]->personid = $row['PersonID'];
                    $events[$i]->startdate = $row['StartDate'];
                    $events[$i]->enddate = $row['EndDate'];
                    $i++;
                }
            } catch (PDOException $e) {
                print 'Exception!: ' . $e->getMessage();
            }
            $pdo = null; // Close connection

            // Send results:
            http_response_code(200);
            header('Content-Type: application/json');
            echo json_encode($events, JSON_PRETTY_PRINT);
        }
    }

    function getByPersonIDAndDates($id,$from,$until) {
        // Check for filled in URL variables
        if ($id == null || $from == null || $until == null) {
            echo "Please set id & from & until.\n";
        }
        else {
            //echo "id = ".$id."\nfrom = ".$from."\nuntil = ".$until."\n";

            try {
                // Open connection to DB:
                $pdo = new PDO("mysql:host=localhost;dbname=monkey",
                    'root', 'user');
                $pdo->setAttribute(PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION);

                // Create array for each result:
                $i = 0;
                $events = array();
                foreach ($pdo->query("SELECT * FROM events WHERE StartDate > '" . $from . "' AND EndDate < '" . $until . "' AND PersonID = ". $id) as $row) {
                    // Create class:
                    $events[$i] = new StdClass();
                    $events[$i]->id = $row['ID'];
                    $events[$i]->name = $row['Name'];
                    $events[$i]->personid = $row['PersonID'];
                    $events[$i]->startdate = $row['StartDate'];
                    $events[$i]->enddate = $row['EndDate'];
                    $i++;
                }
            } catch (PDOException $e) {
                print 'Exception!: ' . $e->getMessage();
            }
            $pdo = null; // Close connection

            // Send results:
            http_response_code(200);
            header('Content-Type: application/json');
            echo json_encode($events, JSON_PRETTY_PRINT);
        }
    }
}
?>