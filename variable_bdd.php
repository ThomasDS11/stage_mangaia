
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
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

    $helper = new helper($pdo);

} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
    
    
}
$statement = $pdo->prepare("SELECT genre FROM stagiaire Where id = '1'");
$statement->execute();     
$genre1 = $statement->fetch(PDO::FETCH_ASSOC);


$statement1 = $pdo->prepare("SELECT genre FROM stagiaire Where id = '2'");
$statement1->execute();     
$genre2 = $statement1->fetch(PDO::FETCH_ASSOC);


$statement2 = $pdo->prepare("SELECT nom FROM stagiaire Where id = '1'");
$statement2->execute();     
$nom1 = $statement2->fetch(PDO::FETCH_ASSOC);


$statement3 = $pdo->prepare("SELECT nom FROM stagiaire Where id = '2'");
$statement3->execute();     
$nom2 = $statement3->fetch(PDO::FETCH_ASSOC);

$statement4 = $pdo->prepare("SELECT adresse FROM stagiaire ");
$statement4->execute();     
$adresses = $statement4->fetchall(PDO::FETCH_ASSOC);



$statement6 = $pdo->prepare("SELECT cp FROM stagiaire Where id = '1'");
$statement6->execute();     
$cp1 = $statement6->fetch(PDO::FETCH_ASSOC);

$statement7 = $pdo->prepare("SELECT cp FROM stagiaire Where id = '2'");
$statement7->execute();     
$cp2 = $statement7->fetch(PDO::FETCH_ASSOC);

$statement8 = $pdo->prepare("SELECT ville FROM stagiaire Where id = '1'");
$statement8->execute();     
$ville1 = $statement8->fetch(PDO::FETCH_ASSOC);

$statement9 = $pdo->prepare("SELECT ville FROM stagiaire Where id = '2'");
$statement9->execute();     
$ville2 = $statement9->fetch(PDO::FETCH_ASSOC);

$statement10 = $pdo->prepare("SELECT nom_formation FROM session Where id = '1'");
$statement10->execute();     
$nom_formation1 = $statement10->fetch(PDO::FETCH_ASSOC);

$statement11 = $pdo->prepare("SELECT nom_formation FROM session Where id = '2'");
$statement11->execute();     
$nom_formation2 = $statement11->fetch(PDO::FETCH_ASSOC);

$statement12 = $pdo->prepare("SELECT date FROM session Where id = '1'");
$statement12->execute();     
$date1 = $statement12->fetch(PDO::FETCH_ASSOC);

$statement13 = $pdo->prepare("SELECT date FROM session Where id = '2'");
$statement13->execute();     
$date2 = $statement13->fetch(PDO::FETCH_ASSOC);

$statement14 = $pdo->prepare("SELECT lieu FROM session Where id = '1'");
$statement14->execute();     
$lieu1 = $statement14->fetch(PDO::FETCH_ASSOC);

$statement15 = $pdo->prepare("SELECT lieu FROM session Where id = '2'");
$statement15->execute();     
$lieu2 = $statement15->fetch(PDO::FETCH_ASSOC);


?>
    </body>