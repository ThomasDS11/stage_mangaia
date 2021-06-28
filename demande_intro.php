<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
        
    </head>
    <body>
<?php

session_start();
?>
        <div id="container">
        <form id="login"action="stagiaire.php" method="post">
            <p>Veuillez entrer le nom du stagiare: <input id="login_input" type="text" id="stagiare" name="stagiaire" /></p>
 <p><input id="login_submit"type="submit" value="OK"></p>
        </form>
        </div>
    </body>
       
</html>
