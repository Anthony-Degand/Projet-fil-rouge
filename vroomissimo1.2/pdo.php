<?php
$bdd = new PDO('mysql:host=localhost;dbname=vroomissimo;','root','');
$allcars = $bdd->query('SELECT nom_marques FROM marques'); // afficher le nom des marques de voitures
if (isset($_GET['s']) AND !empty($_GET['s'])){
    $recherche = htmlspecialchars($_GET['s']);
    $allcars = $bdd->query('SELECT nom_marques FROM marques WHERE nom_marques LIKE "%'.$recherche.'%"');
}
?>
<!doctype html>
<html>
<head>
<title>
Rechercher des vehicules
</title>
<link rel="stylesheet" href="vehicules.css" />
<meta charset="utf-8">
</head>
<body>

<h1>Rechercher un vehicule d'occasion</h1>

<form method="GET">
  <input type="search" name="s" placeholder="Rechercher un vehicule">
  <input type="submit" name="envoyer">
</form>

<section class="affichage">

  <?php

    if($allcars->rowCount() > 0){
      while($car = $allcars->fetch()){
        ?>
        <p><?php echo $car ['nom_marques']; ?></p>
        <?php
      }
    }else{
      ?>
      <p>Aucun véhicule trouver</p>
      <?php
    }

  ?>

</section>

</body>
</html>