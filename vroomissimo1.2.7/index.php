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
$sql = "SELECT * FROM `vehicules` NATURAL JOIN `marques` NATURAL JOIN `modeles` NATURAL JOIN `vendeurs` NATURAL JOIN `villes` NATURAL JOIN `departements`
NATURAL JOIN `caracteristiques_techniques`NATURAL JOIN `consommation`NATURAL JOIN `couleur`NATURAL JOIN `options` ORDER BY `id_vehicules` DESC";
// on exécute la requête
$requete = $db->query($sql); // dans ma bbd exécute ma requete "sql"
// on récupère les données
$vehicules = $requete->fetchAll(); // variable vehicules = récupèrer les données de la variable "requete" (info : apres un fetch all il y a une boucle )

// contenue de ma pages
?>
<h1>Contenue de la page d'accueil</h1>

<section> <!--ouvrir une section pour le SEO (referencement) est une bonne pratique-->
<?php foreach($vehicules as $vehicule): ?> <!-- boucle "pour chaque" qui parcourt les tableaux, pour chaques -> vehicule : -->
    <article>
        <table>
            <tr>
                <td>Marques</td>
                <td>Modeles</td>
                <td>Prix jusque(€)</td>
                <td>1er immatriculation</td>
                <td>Ville/(CP)</td>
            </tr>

            <tr>
                <td><?php echo strip_tags($vehicule['nom_marques'])?></td>
                <td><?php echo strip_tags($vehicule['nom_modeles'])?></td>
                <td><?php echo strip_tags($vehicule['prix_vente'])?></td>
                <td><?php echo strip_tags($vehicule['date_mise_circulation'])?></td>
                <td><?php echo strip_tags($vehicule['code_postal'])?></td>
            </tr>
        </table>
    </article>
<?php endforeach; ?>
</section>

<?php

// inclure mon footer
include('C:\laragon\www\projet_vroomissimo\vroomissimo1.2.7\includes.php\footer.php');

?>