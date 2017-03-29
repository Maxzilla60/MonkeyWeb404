<?php

$user='root';
$password='user';
$database='monkey';
$pdo=null;

$from = intval($_GET['from']);
$until = intval($_GET['until']);

try {
    $pdo = new PDO( "mysql:host=localhost;dbname=$database",
        $user, $password );
    $pdo->setAttribute( PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION );

    foreach($pdo->query("SELECT * FROM events WHERE StartDate >= ".$from) as $row) {
        echo $row['ID'] . ' ' . $row['Name'] . '<br>';
    }
    echo "SELECT * FROM events WHERE StartDate >= ".$from." AND EndDate <= ".$until;
} catch ( PDOException $e ) {
    print 'Exception!: ' . $e->getMessage();
}
$pdo = null;

?>