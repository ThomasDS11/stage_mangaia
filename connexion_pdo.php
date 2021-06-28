<?php


define('bdd_server', '127.0.0.1');
define('bdd_user', 'phpuser');
define('bdd_password', 'php');
define('bdd_name', 'mangaia');



try{
    $pdo = new PDO("mysql:host=" . bdd_server . ";dbname=" . bdd_name, bdd_user, bdd_password);

   // $dsn = 'mysql:dbname=QCM_DATA;host=127.0.0.1';
   // $user = "phpuser";
   // $password = "php";

 //   $pdo = new PDO($dsn, $user, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>