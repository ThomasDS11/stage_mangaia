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



//var_dump($Genre);
//echo $Genre;

$nom_formation = filter_input(INPUT_POST, 'nom_formation');
$prix_session = filter_input(INPUT_POST, 'prix_session');
$date_session = filter_input(INPUT_POST, 'date_session');
$lieu_session = filter_input(INPUT_POST, 'lieu_session');
$duree_session = filter_input(INPUT_POST, 'duree_session');
$cadre_session = filter_input(INPUT_POST, 'cadre_session');
$id_formateur1 = filter_input(INPUT_POST, 'nom_formateur');
$id_demande = filter_input(INPUT_POST, 'id_demande');

//var_dump($id_demande);
//
//var_dump($nom_formation);
//var_dump($prix_session);
//var_dump($date_session);
//var_dump($lieu_session);
//var_dump($duree_session);
//var_dump($cadre_session);

$nom_demande = filter_input(INPUT_POST, 'nom_demande');
$type_tarif = filter_input(INPUT_POST, 'type_tarif');
$cout_formation_jour = filter_input(INPUT_POST, 'cout_formation_jour');
$frais_restauration = filter_input(INPUT_POST, 'frais_restauration');
$montant_ht = filter_input(INPUT_POST, 'montant_ht');
$montant_tva= filter_input(INPUT_POST, 'montant_tva');
$montant_ttc= filter_input(INPUT_POST, 'montant_ttc');
$id_stagiaire= filter_input(INPUT_POST, 'id_stagiaire');

//var_dump($nom_demande);
//var_dump($type_tarif);
//var_dump($cout_formation_jour);
//var_dump($frais_restauration);
//var_dump($montant_ht);
//var_dump($montant_tva);
//var_dump($montant_ttc);

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



$content = file_get_contents(dirname(__FILE__).'/convocation_p_template.htm'); // Attention au chemin d'acc??s au fichier template. ici, il est dans le m??me r??pertoire que export.php sinon donnez le chemin correct.

$content = str_replace('##nom##', $nom, $content);
$content = str_replace('##adresse##', $adresse, $content);
$content = str_replace('##cp##', $cp, $content);
$content = str_replace('##ville##', $ville, $content);
$content = str_replace('##genre##', $genre, $content);
$content = str_replace('##nom_formation##', $nom_formation, $content);
$content = str_replace('##date_session##', $date_session, $content);
$content = str_replace('##duree_session##', $duree_session, $content);



// La suite du fichier ?? l'??tape 3
$filename = "convocation_presentiel_$id_demande.doc";// V??rifie que l'on peut ??crire dans le fichier if(!is_writable($filename)) exit();// V??rifie que l'on peut ouvrir le fichier
if (!$handle = fopen($filename, 'a')) 
exit("Impossible d'ouvrir le fichier ($filename)");

// On ajoute le contenu de exemple.html
if (fwrite($handle, $content) === FALSE) 
exit("Impossible d'??crire dans le fichier ($filename)");

echo "<a href='$filename'>T??l??charger le fichier</a>";
fclose($handle)


?>

    </body>
  </html>
