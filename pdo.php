<!doctype html>
<html>
<head>
<title>
Connexion à MySQL avec PDO 
</title>
<link rel="stylesheet" href="vehicules.css" />
<meta charset="utf-8">
</head>
<body>
<h1>
Interrogation de la table Vehicules avec PDO (style windows 95)
</h1>

<?php
require("connect.php");

$dsn="mysql:dbname=".BASE.";host=".SERVER;
    try{
      $connexion=new PDO($dsn,USER,PASSWD);
    }
    catch(PDOException $e){
      printf("Échec de la connexion : %s\n", $e->getMessage());
      exit();
    }
$sql="SELECT * from vehicules";
if(!$connexion->query($sql)) echo "Pb d'accès a vroomissimo";
else{
    ?>
    <table class="tableau" id="tableau">
    <tr> <td> ID </td> <td> Argus </td> <td> Prix </td><td> Kilométrage </td> <td> Année de production </td> <td> Mise en circulation </td> <td> Description </td> <td> Garantie </td> <td> Statut </td> <td> ID vendeur </td> <td> ID modeles </td> <td> ID consommation</td> <td> ID options </td> <td> ID couleurs </td> <td> ID caractéristiques techniques </td></tr>
      <?php
      foreach ($connexion->query($sql) as $row)
    echo "<tr><td>".$row['id_vehicules']."</td>
              <td>".$row['prix_argus']."</td>
              <td>".$row['prix_vente']."</td>
              <td>".$row['km']."</td>
              <td>".$row['annee_construction']."</td>
              <td>".$row['date_mise_circulation']."</td>
              <td>".$row['description']."</td>
              <td>".$row['garantie']."</td>
              <td>".$row['statut_voiture']."</td>
              <td>".$row['id_vendeurs']."</td>
              <td>".$row['id_modeles']."</td>
              <td>".$row['id_consommation']."</td>
              <td>".$row['id_options']."</td>
              <td>".$row['id_couleur']."</td>
              <td>".$row['id_caracteristiques_techniques']."</td></tr><br/>\n";
      ?>
    </table>
    <?php } ?>
</body>
</html>