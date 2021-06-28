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
         <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
   <body style='background:#fff;'>
       
      <div class="topnav">
          
  <a class="active" href="#home">Home</a>
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
  <a id="content">
            <!-- tester si l'utilisateur est connecté -->
            <?php
                session_start();
                if($_SESSION['username'] !== ""){
                    $user = $_SESSION['username'];
                    // afficher un message
                    echo "Bonjour $user, vous êtes connecté";
                }
            ?>
            
  </a>
</div>
     

       <div id="menu">
           
           <div><a href="demande_intro.php"><button class="bouton_menu">Nouvelle demande</button></a></div>
           
           <div><a href="suivre.php"><button class="bouton_menu">suivre les demandes</button></a></div>
           
           <div><a href="afficher.php"><button class="bouton_menu">afficher les données</button></a></div>
           
           
           
       </div>
   <!--    <div id="container_menu">
        <div>
            <div><a href="Devis.php"><button class="bouton_menu">Devis</button></a></div>
         
            <div><a href="Convention.php"><button class="bouton_menu">Convention</button></a></div>
            
            <div><a href="Convocation.php"><button class="bouton_menu">Convocation</button></a></div>
                         
            <div><a href="Audit.php"><button class="bouton_menu">Audit</button></a></div>
            
            <div><a href="Option.php"><button class="bouton_menu">options</button></a></div>
                
            <div><a href="Facture.php"><button class="bouton_menu">Facture</button></a></div>
          
 -->

    </body>
</html>
