<?php
$dsn = 'mysql:host=localhost;dbname=wmc2023db;';
$user = 'root';
$pass = '';

try {
   $db = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
   die('Unable to connect to database. ' . $e);
}
?>