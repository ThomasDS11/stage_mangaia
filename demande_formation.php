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
$id_stagiaire= filter_input(INPUT_POST, 'id_stagiaire');
$genre_contact_societe = filter_input(INPUT_POST, 'genre_contact_societe');
$nom_contact_societe = filter_input(INPUT_POST, 'nom_contact_societe');
$mail_contact_societe = filter_input(INPUT_POST, 'mail_contact_societe');
$nom_societe = filter_input(INPUT_POST, 'nom_societe');
$tel_contact_societe = filter_input(INPUT_POST, 'tel_contact_societe');
$adresse_societe= filter_input(INPUT_POST, 'adresse_societe');
$cp_societe= filter_input(INPUT_POST, 'cp_societe');
$ville_societe= filter_input(INPUT_POST, 'ville_societe');
$genre = filter_input(INPUT_POST, 'genre');
$nom = filter_input(INPUT_POST, 'nom');
$mail = filter_input(INPUT_POST, 'mail');
$societe = filter_input(INPUT_POST, 'societe');
$tel = filter_input(INPUT_POST, 'tel');
$adresse = filter_input(INPUT_POST, 'adresse');
$cp = filter_input(INPUT_POST, 'cp');
$ville = filter_input(INPUT_POST, 'ville');


//
//var_dump($id_stagiaire);
//var_dump($genre);
//var_dump($nom);
//var_dump($mail);
//var_dump($societe);
//var_dump($tel);
//var_dump($adresse);
//var_dump($cp);
//var_dump($ville);
//
//
//
//
//var_dump($adresse_societe);
//var_dump($nom_societe);
//var_dump($cp_societe);
//var_dump($ville_societe);
//var_dump($nom_contact_societe);
//var_dump($genre_contact_societe);
//var_dump($tel_contact_societe);
//var_dump($mail_contact_societe);

?>

        <div id="container_stagiaire">
        <h4> A présent nous que nous avons notre stagiaire ansi que sa société commencons la demande </h4>
        
              <form action="nouvelle_demande.php" method="post">


  <p>Veuillez entrer le nom de demande: <input type="text" id="mail" name="nom_demande" /></p>
   <label for="selection">Le type de tarif</label>
                   <select name="type_tarif" id="selection" class="form-control">
     
                       <option value="forfaitaire">forfaitaire</option>
                       <option value="FNE">FNE </option> 
                  
                   </select>
  <p>Veuillez entrer le coup de formation par jour: <input type="text" id="mail" name="cout_formation_jour" /></p>
  <p>Veuillez entrer les frais de restauration: <input type="text" id="societe" name="frais_restauration" /></p>
  <p>Veuillez entrer le montant hors taxe: <input type="text" id="tel" name="montant_ht" /></p>
  <p>Veuillez entrer le montant tva: <input type="text" id="adresse" name="montant_tva" /></p>
  <p>Veuillez entrer le montant ttc: <input type="text" id="cp" name="montant_ttc" /></p>
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
 
        <p><input type="submit" value="CREER LES SESSIONS"></p>
        </form>
        
        </div>