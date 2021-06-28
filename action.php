
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

$Societe = filter_input(INPUT_POST, 'societe');
$Formation = filter_input(INPUT_POST, 'formation');
$Titre = filter_input(INPUT_POST, 'titre');
$Devis = filter_input(INPUT_POST, 'devis');
$Nom = filter_input(INPUT_POST, 'nom');
$Date = filter_input(INPUT_POST, 'date');
$Societe2 = filter_input(INPUT_POST, 'societe2');
$Adresse = filter_input(INPUT_POST, 'adresse');
$Nom2 = filter_input(INPUT_POST, 'nom2');
$Titre2 = filter_input(INPUT_POST, 'Titre2');
$Objectif = filter_input(INPUT_POST, 'objectif');
$Nom_client = filter_input(INPUT_POST, 'nom_client');
$Journee = filter_input(INPUT_POST, 'n=journee');
$Heure = filter_input(INPUT_POST, 'heure');
$Date2 = filter_input(INPUT_POST, 'date2');
$Prestation = filter_input(INPUT_POST, 'prestation');
$Via = filter_input(INPUT_POST, 'via');
$Tableau = filter_input(INPUT_POST, 'tableau');
$C1 = filter_input(INPUT_POST, 'C1');
$C2 = filter_input(INPUT_POST, 'C2');
$C3 = filter_input(INPUT_POST, 'C3');
$C4 = filter_input(INPUT_POST, 'C4');
$C5 = filter_input(INPUT_POST, 'C5');
$Date3 = filter_input(INPUT_POST, 'date3');
$Nom3 = filter_input(INPUT_POST, 'nom3');
$Titre3 = filter_input(INPUT_POST, 'Titre3');
var_dump($_POST);

echo $Societe;

 //Je suppose que vous avez déjà les variables php renseignées. Que ce soit un renseignement statique ou de données provenant de la base de données. Nommez vos variables selon les noms contenus dans le fichier template.html

// Je capture et mémorise le contenu du fichier template.html

$content = file_get_contents(dirname(__FILE__).'/Template_devis.htm'); // Attention au chemin d'accès au fichier template. ici, il est dans le même répertoire que export.php sinon donnez le chemin correct.

$content = str_replace('##Societe##', $Societe, $content);
$content = str_replace('##Formation##', $Formation, $content);
$content = str_replace('##Titre##', $Titre, $content);
$content = str_replace('##Devis##', $Devis, $content);
$content = str_replace('##Nom##', $Nom, $content);
$content = str_replace('##Date##', $Date, $content);
$content = str_replace('##Societe2##', $Societe2, $content);
$content = str_replace('##Adresse##', $Adresse, $content);
$content = str_replace('##Nom2##', $Nom2, $content);
$content = str_replace('##Titre2##', $Titre2, $content);
$content = str_replace('##Objectif##', $Objectif, $content);
$content = str_replace('##Nom_client##', $Nom_client, $content);
$content = str_replace('##Journee##', $Journee, $content);
$content = str_replace('##Heure##', $Heure, $content);
$content = str_replace('##Date2##', $Date2, $content);
$content = str_replace('##Prestation##', $Prestation, $content);
$content = str_replace('##Via##', $Via, $content);
$content = str_replace('##Tableau##', $Tableau, $content);
$content = str_replace('##C1##', $C1, $content);
$content = str_replace('##C2##', $C2, $content);
$content = str_replace('##C3##', $C3, $content);
$content = str_replace('##C4##', $C4, $content);
$content = str_replace('##C5##', $C5, $content);
$content = str_replace('##Date3##', $Date3, $content);
$content = str_replace('##Nom3##', $Nom3, $content);
$content = str_replace('##TITRE3##', $Titre3, $content);


// La suite du fichier à l'étape 3
$filename = "Devis.doc";// Vérifie que l'on peut écrire dans le fichier if(!is_writable($filename)) exit();// Vérifie que l'on peut ouvrir le fichier
if (!$handle = fopen($filename, 'a')) 
exit("Impossible d'ouvrir le fichier ($filename)");

// On ajoute le contenu de exemple.html
if (fwrite($handle, $content) === FALSE) 
exit("Impossible d'écrire dans le fichier ($filename)");

echo "<a href='$filename'>Télécharger le fichier</a>";
fclose($handle)
 ?>

    </body>
  </html>
