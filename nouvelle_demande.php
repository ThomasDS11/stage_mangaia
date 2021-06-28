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

$nom_demande = filter_input(INPUT_POST, 'nom_demande');
$type_tarif = filter_input(INPUT_POST, 'type_tarif');
$cout_formation_jour = filter_input(INPUT_POST, 'cout_formation_jour');
$frais_restauration = filter_input(INPUT_POST, 'frais_restauration');
$montant_ht = filter_input(INPUT_POST, 'montant_ht');
$montant_tva= filter_input(INPUT_POST, 'montant_tva');
$montant_ttc= filter_input(INPUT_POST, 'montant_ttc');
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
$ville= filter_input(INPUT_POST, 'ville');




$statement_envoie_societe = $pdo->prepare("INSERT INTO demande_formation (nom_demande, type_tarif, cout_formation_jour, frais_restauration, montant_ht, montant_tva, montant_ttc, id_stagiaire)
VALUES (:nom_demande, :type_tarif, :cout_formation_jour, :frais_restauration, :montant_ht, :montant_tva, :montant_ttc, :id_stagiaire)"); 
$statement_envoie_societe->bindParam(":nom_demande", $nom_demande);
$statement_envoie_societe->bindParam(":type_tarif", $type_tarif);
$statement_envoie_societe->bindParam(":cout_formation_jour", $cout_formation_jour);
$statement_envoie_societe->bindParam(":frais_restauration", $frais_restauration);
$statement_envoie_societe->bindParam(":montant_ht", $montant_ht);
$statement_envoie_societe->bindParam(":montant_tva", $montant_tva);
$statement_envoie_societe->bindParam(":montant_ttc", $montant_ttc);
$statement_envoie_societe->bindParam(":id_stagiaire", $id_stagiaire);
$statement_envoie_societe->execute(); 

$id_demande = $pdo->lastInsertId();

//var_dump($id_demande);

$statement_nom_formation = $pdo->prepare("SELECT nom_formation FROM formation ");
$statement_nom_formation->execute();     
$formation = $statement_nom_formation->fetchall(PDO::FETCH_ASSOC);

$statement_nom_formateur = $pdo->prepare("SELECT nom_formateur FROM formateur ");
$statement_nom_formateur->execute();     
$formateur = $statement_nom_formateur->fetchall(PDO::FETCH_ASSOC);

$statement_id_formateur = $pdo->prepare("SELECT id_formateur FROM formateur ");
$statement_id_formateur->execute();     
$formateur2 = $statement_id_formateur->fetchall(PDO::FETCH_ASSOC);

//var_dump($formateur2);
//
//var_dump($formateur);

?>
        <div id="container_stagiaire">
        <h4> Vous allez a présent créer une session relier a la demande précédente </h4>
        
              <form action="nouvelle_session.php" method="post">

   <label for="selection">veuillez choisir le nom de formation</label>
   <select name="nom_formation" id="selection" class="form-control">
                       <?php
                       foreach($formation as $key => $formation){
                       ?>
                       <option value="<?= $formation['nom_formation'] ?>"><?= $formation['nom_formation'] ?></option>
                    <?Php
                       }
                    ?>
   </select>                
  <p>Veuillez entrer le prix de la session(uniquement si different de celui de la formation): <input type="text" id="prix_session" name="prix_session" /></p>
  <p>Veuillez entrer la date de la session: <input type="text" id="date_session" name="date_session" /></p>
<label for="selection">veuillez selectionner le lieu de la session</label>
                    <select name="lieu_session" id="selection" class="form-control">
                     
                       <option value="locaux">Locaux</option>
                       <option value="distanciel">Distanciel</option>
                 
                  
                   </select>
  <p>Veuillez entrer la durée de la session: <input type="text" id="duree_session" name="duree_session" /></p>
  <p>Veuillez entrer le cadre de la session: <input type="text" id="cadre_session" name="cadre session" /></p>
   <label for="selection">veuillez choisir le nom du formateur pour la session</label>
   <select name="nom_formateur" id="selection" class="form-control">
                       <?php
                       foreach($formateur as $key => $formateur){                      
                       ?>
                            <option value="<?= $formateur['nom_formateur'] ?>"><?= $formateur['nom_formateur'] ?></option>
                    <?Php
                       }
                    ?>
                  
       <input type="hidden" name="id_demande" value="<?= $id_demande?>"></input>
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
   <input type="hidden" name="nom_demande" value="<?= $nom_demande?>"></input>
     <input type="hidden" name="type_tarif" value="<?= $type_tarif?>"></input>
       <input type="hidden" name="cout_formation_jour" value="<?= $cout_formation_jour?>"></input>
         <input type="hidden" name="frais_restauration" value="<?= $frais_restauration?>"></input>
           <input type="hidden" name="montant_ht" value="<?= $montant_ht?>"></input>
             <input type="hidden" name="montant_tva" value="<?= $montant_tva?>"></input>
               <input type="hidden" name="montant_ttc" value="<?= $montant_ttc?>"></input>
        <p><input type="submit" value="Valider"></p>
        </form>
        </div>