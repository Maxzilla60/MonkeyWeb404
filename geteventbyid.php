<?php

$user='root';
$password='user';
$database='monkey';
$pdo=null;

$q = intval($_GET['q']);

try {
    $pdo = new PDO( "mysql:host=localhost;dbname=$database",
        $user, $password );
    $pdo->setAttribute( PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION );
    
    foreach($pdo->query("SELECT * FROM events WHERE ID=".$q) as $row) {
        echo $row['ID'] . ' ' . $row['Name'] . '<br>';
    }
} catch ( PDOException $e ) {
    print 'Exception!: ' . $e->getMessage();
}
$pdo = null;

?>