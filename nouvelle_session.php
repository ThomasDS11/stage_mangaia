<html>
<?Php
require "connexion_pdo.php";

?>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
        
    </head>
    <body>
<?php

$nom_formation = filter_input(INPUT_POST, 'nom_formation');
$prix_session = filter_input(INPUT_POST, 'prix_session');
$date_session = filter_input(INPUT_POST, 'date_session');
$lieu_session = filter_input(INPUT_POST, 'lieu_session');
$duree_session = filter_input(INPUT_POST, 'duree_session');
$cadre_session = filter_input(INPUT_POST, 'cadre_session');
$id_formateur1 = filter_input(INPUT_POST, 'nom_formateur');
$id_demande = filter_input(INPUT_POST, 'id_demande');

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

//var_dump($id_demande);

$statement_envoie_session = $pdo->prepare("INSERT INTO session (nom_formation, date_session, lieu_session, duree_session, cadre_session)
VALUES (:nom_demande, :date_session, :lieu_session, :duree_session, :cadre_session)"); 
$statement_envoie_session->bindParam(":nom_demande", $nom_formation);
$statement_envoie_session->bindParam(":date_session", $date_session);
$statement_envoie_session->bindParam(":lieu_session", $lieu_session);
$statement_envoie_session->bindParam(":duree_session", $duree_session);
$statement_envoie_session->bindParam(":cadre_session", $cadre_session);
$statement_envoie_session->execute();

$id_session = $pdo->lastInsertId();

//var_dump($id_session);
//
//var_dump($id_formateur1);


$statement_formateur_envoie= $pdo->prepare("SELECT id_formateur FROM formateur where nom_formateur = :id_formateur");
$statement_formateur_envoie->bindParam(":id_formateur", $id_formateur1);
$statement_formateur_envoie->execute();     
$id_formateur_res = $statement_formateur_envoie->fetch(PDO::FETCH_ASSOC);

$id_formateur = $id_formateur_res["id_formateur"];

$statement_set_id = $pdo->prepare("UPDATE session SET id_formateur = :id_formateur where id_session = :id_session"); 
$statement_set_id->bindParam(":id_formateur", $id_formateur);
$statement_set_id->bindParam(":id_session", $id_session);
$statement_set_id->execute();

$statement_formation_set = $pdo->prepare("SELECT id_formation FROM formation where nom_formation = :nom_formation");
$statement_formation_set->bindParam(":nom_formation", $nom_formation);
$statement_formation_set->execute();     
$id_formation_res = $statement_formation_set->fetch(PDO::FETCH_ASSOC);

$id_formation = $id_formation_res["id_formation"];

//var_dump($id_formateur_res);
//
//var_dump($id_formateur);
//
//var_dump($id_formation);

$update_demande = $pdo->prepare("UPDATE demande_formation SET id_formation = :id_formation where id_demande= :id_demande"); 
$update_demande->bindParam(":id_formation", $id_formation);
$update_demande->bindParam(":id_demande", $id_demande);
$update_demande->execute();

$update_demande2 = $pdo->prepare("UPDATE demande_formation SET id_session = :id_session where id_demande= :id_demande"); 
$update_demande2->bindParam(":id_session", $id_session);
$update_demande2->bindParam(":id_demande", $id_demande);
$update_demande2->execute();



?>
        <div id="container_stagiaire">
        <h4>Voici les documents que vous pouvez generer :</h4>
        
        
         <h4>Convocation :</h4>
        
        <form id='convocation' action="Convocation.php" method="post">
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
                                               <input type="hidden" name="nom_formation" value="<?= $nom_formation?>"></input>
                                                      <input type="hidden" name="prix_session" value="<?= $prix_session?>"></input>
                                                             <input type="hidden" name="date_session" value="<?= $date_session?>"></input>
                                                                    <input type="hidden" name="lieu_session" value="<?= $lieu_session?>"></input>
                                                                           <input type="hidden" name="duree_session" value="<?= $duree_session?>"></input>
                                                                                  <input type="hidden" name="cadre_session" value="<?= $cadre_session?>"></input>
                                                                                         <input type="hidden" name="nom_formateur" value="<?= $id_formateur?>"></input>
        <p><input type="submit" value="TELECHARGER LA CONVOCATION"></p>
        </form>
          <h4>Convocation presentiel :</h4>
        
        <form id='convocation_p' action="Convocation_p.php" method="post">
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
                                               <input type="hidden" name="nom_formation" value="<?= $nom_formation?>"></input>
                                                      <input type="hidden" name="prix_session" value="<?= $prix_session?>"></input>
                                                             <input type="hidden" name="date_session" value="<?= $date_session?>"></input>
                                                                    <input type="hidden" name="lieu_session" value="<?= $lieu_session?>"></input>
                                                                           <input type="hidden" name="duree_session" value="<?= $duree_session?>"></input>
                                                                                  <input type="hidden" name="cadre_session" value="<?= $cadre_session?>"></input>
                                                                                         <input type="hidden" name="nom_formateur" value="<?= $id_formateur?>"></input>
        <p><input type="submit" value="TELECHARGER LA CONVOCATION PRESENTIEL"></p>
        </form>

          <h4>Convention :</h4>
        
        <form id='convention' action="Convention.php" method="post">
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
                                               <input type="hidden" name="nom_formation" value="<?= $nom_formation?>"></input>
                                                      <input type="hidden" name="prix_session" value="<?= $prix_session?>"></input>
                                                             <input type="hidden" name="date_session" value="<?= $date_session?>"></input>
                                                                    <input type="hidden" name="lieu_session" value="<?= $lieu_session?>"></input>
                                                                           <input type="hidden" name="duree_session" value="<?= $duree_session?>"></input>
                                                                                  <input type="hidden" name="cadre_session" value="<?= $cadre_session?>"></input>
                                                                                         <input type="hidden" name="nom_formateur" value="<?= $id_formateur?>"></input>
        <p><input type="submit" value="TELECHARGER LA CONVENTION"></p>
        </form>
          
            <h4>Devis :</h4>
        
        <form id='devis' action="Devis.php" method="post">
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
                                               <input type="hidden" name="nom_formation" value="<?= $nom_formation?>"></input>
                                                      <input type="hidden" name="prix_session" value="<?= $prix_session?>"></input>
                                                             <input type="hidden" name="date_session" value="<?= $date_session?>"></input>
                                                                    <input type="hidden" name="lieu_session" value="<?= $lieu_session?>"></input>
                                                                           <input type="hidden" name="duree_session" value="<?= $duree_session?>"></input>
                                                                                  <input type="hidden" name="cadre_session" value="<?= $cadre_session?>"></input>
                                                                                         <input type="hidden" name="nom_formateur" value="<?= $id_formateur?>"></input>
        <p><input type="submit" value="TELECHARGER LE DEVIS"></p>
        </form>
            
               <h4>Attestation de formation:</h4>
        
               <form id='a_formation' action="a_formation.php" method="post">
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
                                               <input type="hidden" name="nom_formation" value="<?= $nom_formation?>"></input>
                                                      <input type="hidden" name="prix_session" value="<?= $prix_session?>"></input>
                                                             <input type="hidden" name="date_session" value="<?= $date_session?>"></input>
                                                                    <input type="hidden" name="lieu_session" value="<?= $lieu_session?>"></input>
                                                                           <input type="hidden" name="duree_session" value="<?= $duree_session?>"></input>
                                                                                  <input type="hidden" name="cadre_session" value="<?= $cadre_session?>"></input>
                                                                                         <input type="hidden" name="nom_formateur" value="<?= $id_formateur?>"></input>
        <p><input type="submit" value="TELECHARGER L'ATTESTATION DE FORMATION"></p>
        </form>
               
                 <h4>Attestation de formation sans certification:</h4>
        
               <form id='a_formation2' action="a_formation2.php" method="post">
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
                                               <input type="hidden" name="nom_formation" value="<?= $nom_formation?>"></input>
                                                      <input type="hidden" name="prix_session" value="<?= $prix_session?>"></input>
                                                             <input type="hidden" name="date_session" value="<?= $date_session?>"></input>
                                                                    <input type="hidden" name="lieu_session" value="<?= $lieu_session?>"></input>
                                                                           <input type="hidden" name="duree_session" value="<?= $duree_session?>"></input>
                                                                                  <input type="hidden" name="cadre_session" value="<?= $cadre_session?>"></input>
                                                                                         <input type="hidden" name="nom_formateur" value="<?= $id_formateur?>"></input>
        <p><input type="submit" value="TELECHARGER L'ATTESTATION DE FORMATION( sans certification)"></p>
        </form>
                 
                   <h4>Facture classique:</h4>
        
                   <form id='facture_classique' action="Facture.php" method="post">
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
                                               <input type="hidden" name="nom_formation" value="<?= $nom_formation?>"></input>
                                                      <input type="hidden" name="prix_session" value="<?= $prix_session?>"></input>
                                                             <input type="hidden" name="date_session" value="<?= $date_session?>"></input>
                                                                    <input type="hidden" name="lieu_session" value="<?= $lieu_session?>"></input>
                                                                           <input type="hidden" name="duree_session" value="<?= $duree_session?>"></input>
                                                                                  <input type="hidden" name="cadre_session" value="<?= $cadre_session?>"></input>
                                                                                         <input type="hidden" name="nom_formateur" value="<?= $id_formateur?>"></input>
        <p><input type="submit" value="TELECHARGER LA FACTURE CLASSIQUE"></p>
        </form>
                   
                     <h4>Facture CPF:</h4>
        
                     <form id='facture_CPF' action="Facture_cpf.php" method="post">
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
                                               <input type="hidden" name="nom_formation" value="<?= $nom_formation?>"></input>
                                                      <input type="hidden" name="prix_session" value="<?= $prix_session?>"></input>
                                                             <input type="hidden" name="date_session" value="<?= $date_session?>"></input>
                                                                    <input type="hidden" name="lieu_session" value="<?= $lieu_session?>"></input>
                                                                           <input type="hidden" name="duree_session" value="<?= $duree_session?>"></input>
                                                                                  <input type="hidden" name="cadre_session" value="<?= $cadre_session?>"></input>
                                                                                         <input type="hidden" name="nom_formateur" value="<?= $id_formateur?>"></input>
        <p><input type="submit" value="TELECHARGER LA FACTURE CPF"></p>
        </form>
       <div><a href="index.php"><button class="bouton_menu_retour">Revenir a l'acceuil</button></a></div>
        </div>
         </body>
       
</html>

        
    