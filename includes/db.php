<?php 
$dbname = 'vbook';
$dbuser = 'root';
$dbpass = 'root';

$db = new PDO('mysql:host=localhost; dbname=' . $dbname, $dbuser, $dbpass, array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
));
if (!$db) {
    echo 'noooo connection';}


?>