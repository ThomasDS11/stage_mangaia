<html>
<?Php
session_start();
require "connexion_pdo.php";
?>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
        
    </head>
    <body>
<?php

$stagiaire = filter_input(INPUT_POST, 'stagiaire');

$statement_stagiaire = $pdo->prepare("SELECT nom FROM stagiaire Where nom = :stagiaire ");
$statement_stagiaire->bindParam(":stagiaire", $stagiaire);
$statement_stagiaire->execute();     
$stagiaire_test = $statement_stagiaire->fetch(PDO::FETCH_ASSOC);



if ( $stagiaire_test != false ){

    
$statement_stagiaire_all = $pdo->prepare("SELECT * FROM stagiaire where nom = :stagiaire");
$statement_stagiaire_all->bindParam(":stagiaire", $stagiaire);
$statement_stagiaire_all->execute();  
$requete_stagiaire = $statement_stagiaire_all->fetch(PDO::FETCH_ASSOC);

$id_stagiaire = $requete_stagiaire["id"];
$genre = $requete_stagiaire["genre"];
$nom = $requete_stagiaire["nom"];
$mail = $requete_stagiaire["mail"];
$societe = $requete_stagiaire["societe"];
$tel = $requete_stagiaire["tel"];
$adresse = $requete_stagiaire["adresse"];
$cp = $requete_stagiaire["cp"];
$ville = $requete_stagiaire["ville"];

//////////////////////////////////////////////////////////

$statement_societe1 = $pdo->prepare("SELECT * FROM societe where nom_societe = :societe");
$statement_societe1->bindParam(":societe", $societe);
$statement_societe1->execute();  
$requete_societe = $statement_societe1->fetch(PDO::FETCH_ASSOC);

$nom_societe = $requete_societe["nom_societe"];
$adresse_societe = $requete_societe["adresse_societe"];
$cp_societe = $requete_societe["cp_societe"];
$ville_societe = $requete_societe["ville_societe"];
$nom_contact_societe = $requete_societe["nom_contact_societe"];
$genre_contact_societe = $requete_societe["genre_contact_societe"];
$tel_contact_societe = $requete_societe["tel_contact_societe"];
$mail_contact_societe = $requete_societe["mail_contact_societe"];

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
          <div id="container">
              <h4>ce stagiaire existe deja dans notre base de donnée, nous avons recupéré les informations à son sujet ansi que la société correspondante</h4>
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
        <?php
        
}else{
    

?>
        <div id="container_stagiaire">
            
            <h4>Nous n'avons pas trouvé ce stagiaire dans la base de données, il va donc falloir nous transmettre les informations suivantes:</h4>
         <form action="nouveau_stagiaire.php" method="post">

 <label for="selection">Le genre stagiaire</label>
                   <select name="genre" id="selection" class="form-control">
     
                       <option value="Monsieur">Homme</option>
                       <option value="Madame">Femme</option> 
                  
                   </select>
  <p>Veuillez entrer le mail: <input type="text" id="mail" name="mail" /></p>
  <p>Veuillez entrer la societe: <input type="text" id="societe" name="societe" /></p>
  <p>Veuillez entrer le numero de telephone: <input type="text" id="tel" name="tel" /></p>
  <p>Veuillez entrer l'adresse: <input type="text" id="adresse" name="adresse" /></p>
  <p>Veuillez entrer la cp: <input type="text" id="cp" name="cp" /></p>
  <p>Veuillez entrer la ville: <input type="text" id="ville" name="ville" /></p>
  <input type="hidden" name="stagiaire" value="<?= $stagiaire?>"></input>
        <p><input type="submit" value="OK"></p>
        </form>
    </div>
<?Php
}
?>
    </body>
       
</html>
