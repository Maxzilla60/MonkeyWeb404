<?php

class DBController
{
    function getAll() {
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
    
    function getByID($id)
    {
        // Check for empty id:
        if ($id == null) {
            http_response_code(406);
        }
        else {
            try {
                // Open connection to DB:
                $pdo = new PDO("mysql:host=localhost;dbname=monkey",
                    'root', 'user');
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
    
    function getByPersonID($id)
    {
        // Check for empty id:
        if ($id == null) {
            http_response_code(406);
        }
        else {
            try {
                // Open connection to DB:
                $pdo = new PDO("mysql:host=localhost;dbname=monkey",
                    'root', 'user');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Create array for each result:
                $i = 0;
                $events = array();
                foreach ($pdo->query("SELECT * FROM events WHERE PersonID=" . $id) as $row) {
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

    function getBetweenDates($from,$until) {
        // Check for empty from & until:
        if ($from == null || $until == null) {
            http_response_code(406);
        }
        else {
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
        // Check for empty id, from & until:
        if ($id == null || $from == null || $until == null) {
            http_response_code(406);
        }
        else {
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

    function postEvent($req) {
        // Decode incoming request body to JSON
        $json = json_decode($req, true);

        // Check for empty name, personid, startdate & enddate:
        if ($json['name'] == null ||
            $json['personid'] == null ||
            $json['startdate'] == null ||
            $json['enddate'] == null) {
            http_response_code(406);
        }
        else {
            try {
                // Open connection to DB:
                $pdo = new PDO("mysql:host=localhost;dbname=monkey",
                    'root', 'user');
                $pdo->setAttribute(PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION);

                // Create prepared INSERT statement
                $stmt = $pdo->prepare("INSERT INTO events(Name, PersonID, StartDate, EndDate) VALUES (:name, :personid, :startdate, :enddate)");

                // Bind parameters:
                $stmt->bindParam(':name', $json['name']);
                $stmt->bindParam(':personid', $json['personid']);
                $stmt->bindParam(':startdate', $json['startdate']);
                $stmt->bindParam(':enddate', $json['enddate']);

                // Execute INSERT
                $stmt->execute();
            } catch (PDOException $e) {
                print 'Exception!: ' . $e->getMessage();
            }
            $pdo = null; // Close connection

            // Send OK
            http_response_code(200);
        }
    }
}
?>