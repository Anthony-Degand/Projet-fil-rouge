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
$sql = "SELECT * FROM `vehicules` ORDER BY `id_vehicules` DESC";
// on exécute la requête
$requete = $db->query($sql); // dans ma bbd exécute ma requete "sql"
// on récupère les données
$vehicules = $requete->fetchAll(); // variable vehicules = récupèrer les données de la variable "requete" (info : apres un fetch all il y a une boucle )

// contenue de ma pages
?>
<h1>Contenue de la page d'accueil</h1>

<section> <!--ouvrir une section pour le SEO (referencement) est une bonne pratique-->
<?php foreach($vehicules as $vehicule): ?> <!-- boucle "pour chaque" qui parcourt les tableaux, ici dans la table vehicules pour chaques vehicule : -->
    <article>
        <h1><?= strip_tags($vehicule['id_vehicules'])?></h1>        <!-- afficher les id_vehicules avec la methode "strip_tags()" pour prévenir les injections sql-->
        <p><?= strip_tags($vehicule['prix_vente'])?></p>            <!-- afficher les prix_vente-->
        <p>Statut : <?=strip_tags($vehicule['statut_voiture'])?></p><!-- afficher statut_voiture-->   
    </article>
<?php endforeach; ?>
</section>

<?php

// inclure mon footer
include('C:\laragon\www\projet_vroomissimo\vroomissimo1.2.7\includes.php\footer.php');

?>