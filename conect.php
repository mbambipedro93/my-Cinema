<?php
$dsn = 'mysql:dbname=cinema;host=127.0.0.1';
$user = 'benjamin';
$password = '2602';
$db = new PDO($dsn, $user, $password);
if (!$db) {
    echo "error:667";

} else {
    echo "";
}
try {
    $db;
} catch (PDOException $e){
    error: $e->getmessage();

}