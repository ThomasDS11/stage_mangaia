<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
        
    </head>
    <body>
<?php




require 'helper.php';
require 'variable_bdd.php';             

?>
         <div class="topnav">
          
  <a class="active" href="#home">Home</a>
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
  <a id="content">
            <!-- tester si l'utilisateur est connecté -->
          
            
  </a>
</div>
      
        <div>
            
            <h1> La création d'une nouvelle demande néccesite : </h1>
            
            
  
        </div>
        
        <h2>Convocation :</h2>
        
        <form id='convocation' action="Convocation.php" method="post">
<div class="form-group">
                   <label for="selection">Le genre stagiaire</label>
                   <select name="genre" id="selection" class="form-control">
     
                       <option value="<?= $genre1['genre'] ?>"><?= $genre1['genre'] ?></option>
                       <option value="<?= $genre2['genre'] ?>"><?= $genre2['genre'] ?></option> 
                  
                   </select>
                    <label for="selection">Le nom du stagiare</label>
                    <select name="nom" id="selection" class="form-control">
                     
                       <option value="<?= $nom1['nom'] ?>"><?= $nom1['nom'] ?></option>
                       <option value="<?= $nom2['nom'] ?>"><?= $nom2['nom'] ?></option>
                 
                  
                   </select>
                     <label for="selection">adresse du stagiare</label>
                     <select name="adresse" id="selection" class="form-control">
                       <?php
                       foreach($adresses as $key => $adresse){
                           
                           
                       
                       ?>
                       <option value="<?= $adresse['adresse'] ?>"><?= $adresse['adresse'] ?></option>
                    <?Php
                       }
                    ?>
                  
                   </select>
                      <label for="selection">CP du stagiare</label>
                   <select name="cp" id="selection" class="form-control">
                     
                       <option value="<?= $cp1['cp'] ?>"><?= $cp1['cp'] ?></option>
                       <option value="<?= $cp2['cp'] ?>"><?= $cp2['cp'] ?></option>
                      
                  
                   </select>
                       <label for="selection">Ville du stagiare</label>
                   <select name="ville" id="selection" class="form-control">
                     
                     <option value="<?= $ville1['ville'] ?>"><?= $ville1['ville'] ?></option>
                     <option value="<?= $ville2['ville'] ?>"><?= $ville2['ville'] ?></option>
  
                  
                   </select>
                        <label for="selection">Nom de la formation</label>
                   <select name="nom_formation" id="selection" class="form-control">
                     
    
                     <option value="<?= $nom_formation1['nom_formation'] ?>"><?= $nom_formation1['nom_formation'] ?></option>
                     <option value="<?= $nom_formation2['nom_formation'] ?>"><?= $nom_formation2['nom_formation'] ?></option>
                 
                  
                   </select>
                         <label for="selection">Date de la session</label>
                   <select name="date" id="selection" class="form-control">
                     
                     <option value="<?= $date1['date'] ?>"><?= $date1['date'] ?></option>
                     <option value="<?= $date2['date'] ?>"><?= $date2['date'] ?></option>
                
                  
                   </select>
                          <label for="selection">Lieu</label>
                   <select name="lieu" id="selection" class="form-control">
                     
                     <option value="<?= $lieu1['lieu'] ?>"><?= $lieu1['lieu'] ?></option>
                     <option value="<?= $lieu2['lieu'] ?>"><?= $lieu2['lieu'] ?></option>
                  
                   </select>
                    <p><input type="submit" value="TELECHARGER LA CONVOCATION"></p>
       </div>
            </form>

         </body>
       
</html>
