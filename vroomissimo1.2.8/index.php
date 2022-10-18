<?php
// requier la pages pour déclarer mes fonctions
require_once('C:\laragon\www\projet_vroomissimo\vroomissimo1.2.7\includes.php\functions.php');
//inclure mon header
 include('C:\laragon\www\projet_vroomissimo\vroomissimo1.2.7\includes.php\header.php');
//inclure ma navbar
include('C:\laragon\www\projet_vroomissimo\vroomissimo1.2.7\includes.php\navbar.php');

// requier la connection à ma base de donnée 
require_once('C:\laragon\www\projet_vroomissimo\vroomissimo1.2.7\includes.php\connection_bdd.php');

// on écrit la requête
$allcars = $db->query("SELECT * FROM `vehicules` NATURAL JOIN `marques` NATURAL JOIN `modeles` NATURAL JOIN `vendeurs` NATURAL JOIN `villes` NATURAL JOIN `departements`
NATURAL JOIN `caracteristiques_techniques`NATURAL JOIN `consommation`NATURAL JOIN `couleur`NATURAL JOIN `options` ORDER BY `id_vehicules` DESC"); // afficher le nom des marques de voitures
if (isset($_GET['s']) AND !empty($_GET['s'])){
    $recherche = htmlspecialchars($_GET['s']);
    $allcars = $db->query('SELECT * FROM `vehicules` NATURAL JOIN `marques` NATURAL JOIN `modeles` NATURAL JOIN `vendeurs` NATURAL JOIN `villes` NATURAL JOIN `departements`
    NATURAL JOIN `caracteristiques_techniques`NATURAL JOIN `consommation`NATURAL JOIN `couleur`NATURAL JOIN `options` "%'. $recherche .'%"');
}

// contenue de ma pages
?>
<h1>Contenue de la page d'accueil</h1>

<form method="GET">
  <input type="search" name="s" placeholder="Rechercher un vehicule">
  <input type="submit" name="envoyer">
</form>

<section class="affichage">
  
  <?php

    if($allcars->rowCount() > 0){
      while($car = $allcars->fetch()){
        ?>
        
        <h2><?php echo $car ['nom_marques']; ?></h2>

        <?php
      }
    }else{
      ?>
      <p class="rouge">Aucun véhicule trouver</p>
      <?php
    }

  ?>

</section>

<?php

// inclure mon footer
include('C:\laragon\www\projet_vroomissimo\vroomissimo1.2.7\includes.php\footer.php');

?>