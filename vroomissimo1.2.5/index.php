<?php
$bdd = new PDO('mysql:host=localhost;dbname=vroomissimo;', 'Antho', 'azerty123'); // connection a la base de données
$allcars = $bdd->query('SELECT * FROM marques ORDER BY id_marques DESC'); // récupérer tous les marques de la table marques par ordre decroissant
if(isset($_GET['s']) AND !empty($_GET['s'])){ // si, l'utilisateur à lancer sa recherche dans l'input "s" et si elle n'est pas vide 
   $recherche = htmlspecialchars($_GET['s']); // empécher que l'utilisateur rentre du code html dans la recherche 
   $allcars = $bdd->query('SELECT nom_marques FROM marques WHERE nom_marques LIKE "%'.$recherche.'%" ORDER BY  id_marques DESC'); // verifier si la recherche correspond à une partit du resultat et l'afficher par ordre décroissant
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rechercher des vehicules</title>
</head>
<body>
    <form method="GET">
        <input type="search" name="s" placeholder="Rechercher un vehicule">
        <input type="submit" name="envoyer">
    </form>

    <section class="affichage">

        <?php 

            if($allcars->rowCount() > 0){// compté le nombre de champs qui à était recupérer au niveau de la requette (s'il en récupere au moin un )

                while($car = $allcars->fetch()){ // (methode fetch = recupérer les données) 
                    ?>
                        "mon tableau ici"
                    <?php //fermer les balise php et les reouvrir pour poser une balise html
                } 

            }else{ // sinon Afficher un message d'erreur
                ?>
                    <p>Aucun vehicule trouver</p>
                <?php //fermer les balise php et les reouvrir pour poser une balise html 
            }
         ?> 

    </section>

</body>
</html>