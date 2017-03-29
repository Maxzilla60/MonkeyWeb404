<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "AltoRouter.php";

$user='root';
$password='user';
$database='monkey';
$pdo=null;

try {
    $pdo = new PDO( "mysql:host=localhost;dbname=$database",
        $user, $password );
    $pdo->setAttribute( PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION );

    $router = new AltoRouter();
    $router->setBasePath("~user/monkey/api");

    $router->map('GET', '/events/[i:id]',
        function ($id) use ($pdo) {
            foreach($pdo->query("SELECT * FROM events WHERE ID=".$id) as $row) {
                echo $row['ID'] . ' ' . $row['Name'] . '<br>';
            }
        }
    );

    $match = $router->match();

    if ($match && is_callable($match['target'])) {
        call_user_func_array($match['target'], $match['params']);
    }
} catch ( Exception $e ) {
    print 'Exception!: ' . $e->getMessage();
}
$pdo = null;

?>