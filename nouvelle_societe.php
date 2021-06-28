<html>
<?Php
require "connexion_pdo.php";
session_start();
?>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
        
    </head>
    <body>
<?php
//var_dump($_POST);

$genre_contact_societe = filter_input(INPUT_POST, 'genre_contact_societe');
$nom_contact_societe = filter_input(INPUT_POST, 'nom_contact_societe');
$mail_contact_societe = filter_input(INPUT_POST, 'mail_contact_societe');
$nom_societe = filter_input(INPUT_POST, 'nom_societe');
$tel_contact_societe = filter_input(INPUT_POST, 'tel_contact_societe');
$adresse_societe= filter_input(INPUT_POST, 'adresse_societe');
$cp_societe= filter_input(INPUT_POST, 'cp_societe');
$ville_societe= filter_input(INPUT_POST, 'ville_societe');
$stagiaire= filter_input(INPUT_POST, 'stagiaire');
$societe_test= filter_input(INPUT_POST, 'societe_test');
$id_stagiaire= filter_input(INPUT_POST, 'id_stagiaire');

$genre = filter_input(INPUT_POST, 'genre');
$nom = filter_input(INPUT_POST, 'nom');
$mail = filter_input(INPUT_POST, 'mail');
$societe = filter_input(INPUT_POST, 'societe');
$tel = filter_input(INPUT_POST, 'tel');
$adresse = filter_input(INPUT_POST, 'adresse');
$cp = filter_input(INPUT_POST, 'cp');
$ville= filter_input(INPUT_POST, 'ville');


//var_dump($societe_test);
//var_dump($nom_societe);

$statement_test = $pdo->prepare("SELECT nom_societe FROM societe where nom_societe = :nom_societe");
$statement_test->bindParam(":nom_societe", $nom_societe);
$statement_test->execute();  
$test_societe= $statement_test->fetch(PDO::FETCH_ASSOC);

//var_dump($test_societe);

if ($test_societe == false) {

$statement_envoie_societe = $pdo->prepare("INSERT INTO societe (nom_societe, adresse_societe, cp_societe, ville_societe, nom_contact_societe, genre_contact_societe, tel_contact_societe, mail_contact_societe)
VALUES (:nom_societe, :adresse_societe, :cp_societe, :ville_societe, :nom_contact_societe, :genre_contact_societe, :tel_contact_societe, :mail_contact_societe)"); 
$statement_envoie_societe->bindParam(":nom_societe", $nom_societe);
$statement_envoie_societe->bindParam(":adresse_societe", $adresse_societe);
$statement_envoie_societe->bindParam(":mail_contact_societe", $mail_contact_societe);
$statement_envoie_societe->bindParam(":cp_societe", $cp_societe);
$statement_envoie_societe->bindParam(":ville_societe", $ville_societe);
$statement_envoie_societe->bindParam(":nom_contact_societe", $nom_contact_societe);
$statement_envoie_societe->bindParam(":genre_contact_societe", $genre_contact_societe);
$statement_envoie_societe->bindParam(":tel_contact_societe", $tel_contact_societe);
$statement_envoie_societe->execute();     

$statement_id_societe2 = $pdo->prepare("SELECT id_societe FROM societe where nom_societe = :societe");
$statement_id_societe2->bindParam(":societe", $nom_societe);
$statement_id_societe2->execute();  
$id_societe2 = $statement_id_societe2->fetch(PDO::FETCH_ASSOC);

//var_dump($id_societe2);

$statement_id_societe_envoie2 = $pdo->prepare("UPDATE stagiaire SET id_societe = :id_societe where nom = :stagiaire"); 
$statement_id_societe_envoie2->bindParam(":stagiaire", $stagiaire);
$statement_id_societe_envoie2->bindParam(":id_societe", $id_societe2["id_societe"], PDO::PARAM_INT);
$statement_id_societe_envoie2->execute(); 


echo 'les données de la societe sont envoyées à la bdd, et le stagiaire à été rataché a cette société';

}else{

}
?>
        <h4>echec : la societe est déja répertoriée dans notre bdd vous avez du faire une faute de frappe plus tot </h4>
        <div id="container_stagiaire">
   <form action="demande_formation.php" method="post">
          <input type="hidden" name="id_stagiaire" value="<?= $id_stagiaire?>"></input>

                <input type="hidden" name="genre" value="<?= $genre?>"></input>
               <input type="hidden" name="nom" value="<?= $nom?>"></input>
                    <input type="hidden" name="mail" value="<?= $mail?>"></input>
                         <input type="hidden" name="societe" value="<?= $societe?>"></input>
                              <input type="hidden" name="tel" value="<?= $tel?>"></input>
                                   <input type="hidden" name="adresse" value="<?= $adresse?>"></input>
                                        <input type="hidden" name="cp" value="<?= $cp?>"></input>
                                             <input type="hidden" name="ville" value="<?= $ville?>"></input>
                                                  <input type="hidden" name="adresse_societe" value="<?= $adresse_societe?>"></input>
                                                       <input type="hidden" name="nom_societe" value="<?= $nom_societe?>"></input>
                                                            <input type="hidden" name="cp_societe" value="<?= $cp_societe?>"></input>
                                                                 <input type="hidden" name="ville_societe" value="<?= $ville_societe?>"></input>
                                                                      <input type="hidden" name="nom_contact_societe" value="<?= $nom_contact_societe?>"></input>
                                                                           <input type="hidden" name="genre_contact_societe" value="<?= $genre_contact_societe?>"></input>
                                                                                <input type="hidden" name="tel_contact_societe" value="<?= $tel_contact_societe?>"</input>
                                                                                     <input type="hidden" name="mail_contact_societe" value="<?= $mail_contact_societe?>"></input>
   <p><input type="submit" value="Commencer la demande"></p>
   </form>
        </div>