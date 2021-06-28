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

$genre = filter_input(INPUT_POST, 'genre');
$mail = filter_input(INPUT_POST, 'mail');
$societe = filter_input(INPUT_POST, 'societe');
$tel = filter_input(INPUT_POST, 'tel');
$adresse = filter_input(INPUT_POST, 'adresse');
$cp = filter_input(INPUT_POST, 'cp');
$ville= filter_input(INPUT_POST, 'ville');
$stagiaire= filter_input(INPUT_POST, 'stagiaire');
$id_stagiaire= filter_input(INPUT_POST, 'id_stagiaire');

$nom = $stagiaire;

$statement_securite = $pdo->prepare("SELECT mail FROM stagiaire where mail = :mail");
$statement_securite->bindParam(":mail", $mail);
$statement_securite->execute();  
$mail_test = $statement_securite->fetch(PDO::FETCH_ASSOC);
 

//var_dump($mail_test);

if( empty($mail_test)){
    $statement_request = $pdo->prepare("INSERT INTO stagiaire (genre, nom, mail, societe, tel, adresse, cp, ville)
VALUES (:genre, :stagiaire, :mail, :societe, :tel, :adresse, :cp, :ville)"); 
$statement_request->bindParam(":stagiaire", $stagiaire);
$statement_request->bindParam(":genre", $genre);
$statement_request->bindParam(":mail", $mail);
$statement_request->bindParam(":societe", $societe);
$statement_request->bindParam(":tel", $tel);
$statement_request->bindParam(":adresse", $adresse);
$statement_request->bindParam(":cp", $cp);
$statement_request->bindParam(":ville", $ville);
$statement_request->execute();     

$statement_recup = $pdo->prepare("SELECT id FROM stagiaire where mail = :mail");
$statement_recup ->bindParam(":mail", $mail);
$statement_recup->execute();  
$id_stagiaire_res = $statement_recup->fetch(PDO::FETCH_ASSOC);
$id_stagiaire = $id_stagiaire_res["id"];

//var_dump($id_stagiaire);




}else{

}

$statement_societe = $pdo->prepare("SELECT nom_societe FROM societe where nom_societe = :societe");
$statement_societe->bindParam(":societe", $societe);
$statement_societe->execute();  
$societe_test = $statement_societe->fetch(PDO::FETCH_ASSOC);

//var_dump($societe_test);

 if ( $societe_test != false ){
     
$nom_societe1 =$societe_test;     
     
//$statement_adresse_societe = $pdo->prepare("SELECT adresse_societe FROM societe where nom_societe = :societe");
//$statement_adresse_societe->bindParam(":societe", $societe);
//$statement_adresse_societe->execute();  
//$adresse_societe = $statement_adresse_societe->fetch(PDO::FETCH_ASSOC);
//
//$statement_cp_societe = $pdo->prepare("SELECT cp_societe FROM societe where nom_societe = :societe");
//$statement_cp_societe->bindParam(":societe", $societe);
//$statement_cp_societe->execute();  
//$cp_societe = $statement_cp_societe->fetch(PDO::FETCH_ASSOC);
//
//$statement_ville_societe = $pdo->prepare("SELECT ville_societe FROM societe where nom_societe = :societe");
//$statement_ville_societe->bindParam(":societe", $societe);
//$statement_ville_societe->execute();  
//$ville_societe = $statement_ville_societe->fetch(PDO::FETCH_ASSOC);
//
//$statement_nom_contact_societe = $pdo->prepare("SELECT nom_contact_societe FROM societe where nom_societe = :societe");
//$statement_nom_contact_societe->bindParam(":societe", $societe);
//$statement_nom_contact_societe->execute();  
//$nom_contact_societe = $statement_nom_contact_societe->fetch(PDO::FETCH_ASSOC);
//
//$statement_genre_contact_societe = $pdo->prepare("SELECT genre_contact_societe FROM societe where nom_societe = :societe");
//$statement_genre_contact_societe->bindParam(":societe", $societe);
//$statement_genre_contact_societe->execute();  
//$genre_contact_societe = $statement_genre_contact_societe->fetch(PDO::FETCH_ASSOC);
//
//$statement_tel_contact_societe = $pdo->prepare("SELECT tel_contact_societe FROM societe where nom_societe = :societe");
//$statement_tel_contact_societe->bindParam(":societe", $societe);
//$statement_tel_contact_societe->execute();  
//$tel_contact_societe = $statement_tel_contact_societe->fetch(PDO::FETCH_ASSOC);
//
//$statement_mail_contact_societe = $pdo->prepare("SELECT mail_contact_societe FROM societe where nom_societe = :societe");
//$statement_mail_contact_societe->bindParam(":societe", $societe);
//$statement_mail_contact_societe->execute();  
//$mail_contact_societe = $statement_mail_contact_societe->fetch(PDO::FETCH_ASSOC);
//
//$statement_id_societe = $pdo->prepare("SELECT id_societe FROM societe where nom_societe = :societe");
//$statement_id_societe->bindParam(":societe", $societe);
//$statement_id_societe->execute();  
//$id_societe = $statement_id_societe->fetch(PDO::FETCH_ASSOC);


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

$statement_id_societe_envoie = $pdo->prepare("UPDATE stagiaire SET id_societe = :id_societe where nom = :stagiaire"); 
$statement_id_societe_envoie->bindParam(":stagiaire", $stagiaire);
$statement_id_societe_envoie->bindParam(":id_societe", $id_societe["id_societe"], PDO::PARAM_INT);
$statement_id_societe_envoie->execute(); 


//var_dump($tel_contact_societe);

?>
        <div id="container">
            <h4>une societe à été trouvé au nom de celle que vous avez fournis nous avons recupéré les informations de cette derniere et nous les avons relié au stagiaire</h4>
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
            <h4>aucune societe n'a été renseigné dans notre base de données au nom de celle a qui apartient le stagiaire, nous allons donc la crée</h4>
         <form action="nouvelle_societe.php" method="post">

 <label for="selection">Le genre du contact de la societe</label>
                   <select name="genre_contact_societe" id="selection" class="form-control">
     
                       <option value="Monsieur">Homme</option>
                       <option value="Madame">Femme</option> 
                  
                   </select>
  <p>Veuillez entrer le nom du contact societe: <input type="text" id="mail" name="nom_contact_societe" /></p>
  <p>Veuillez entrer le mail du contact societe: <input type="text" id="mail" name="mail_contact_societe" /></p>
  <p>Veuillez entrer la societe: <input type="text" id="societe" name="nom_societe" /></p>
  <p>Veuillez entrer le numero de telephone du contact societe: <input type="text" id="tel" name="tel_contact_societe" /></p>
  <p>Veuillez entrer l'adresse de la societe: <input type="text" id="adresse" name="adresse_societe" /></p>
  <p>Veuillez entrer la cp de la societe: <input type="text" id="cp" name="cp_societe" /></p>
  <p>Veuillez entrer la ville de la societe: <input type="text" id="ville" name="ville_societe" /></p>
  <input type="hidden" name="stagiaire" value="<?= $stagiaire?>"></input>
  <input type="hidden" name="societe_test" value="<?=  $societe_test?>"></input>
             <input type="hidden" name="id_stagiaire" value="<?= $id_stagiaire?>"></input>
                <input type="hidden" name="genre" value="<?= $genre?>"></input>
                  <input type="hidden" name="nom" value="<?= $nom?>"></input>
                    <input type="hidden" name="mail" value="<?= $mail?>"></input>
                         <input type="hidden" name="societe" value="<?= $societe?>"></input>
                              <input type="hidden" name="tel" value="<?= $tel?>"></input>
                                   <input type="hidden" name="adresse" value="<?= $adresse?>"></input>
                                        <input type="hidden" name="cp" value="<?= $cp?>"></input>
                                               <input type="hidden" name="ville" value="<?= $ville?>"></input>
 
        <p><input type="submit" value="OK"></p>
        </form>
            
        </div>
<?Php
}
?>
    </body>
       
</html>







