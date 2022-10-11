<?php
$bdd = new PDO('mysql:host=localhost;dbname=vroomissimo;', 'root', ''); // connection a la base de données
$allvehicules = $bdd->query('SELECT * FROM vehicules ORDER BY id_vehicules DESC'); // récupérer tous de la table vehicule par ordre décroissant
if(isset($_GET['s']) AND !empty($_GET['s'])){ // si, l'utilisateur à lancer sa recherche dans l'input "s" et si elle n'est pas vide 
   $recherche = htmlspecialchars($_GET['s']); // empécher que l'utilisateur rentre du code html dans la recherche 
   $allvehicules = $bdd->query('SELECT vehicules.prix_vente, vehicules.km, vehicules.date_mise_circulation, modeles.nom_modeles, marques.nom_marques FROM vehicules LEFT JOIN modeles ON vehicules.id_modeles = modeles.id_modeles LEFT JOIN marques ON vehicules.id_marques = marques.id_marques LIKE "%'.$recherche.'%"'); // verifier si la recherche correspond à une partit du resultat et l'afficher par ordre décroissant
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

            if($allvehicules->rowCount() > 0 ){// compté le nombre de champs qui à était recupérer au niveau de la requette (s'il en récupere au moin un )

                while($vehicule = $allvehicules->fetch()){ // (methode fetch = recupérer les données) 
                    ?>
                        <table>
                            <tr>
                                <td><?php echo $vehicule['nom_modeles']; ?></td>
                                <td><?php echo $vehicule['nom_marques']; ?></td>
                                <td><?php echo $vehicule['km']; ?></td>
                                <td><?php echo $vehicule['date_mise_circulation']; ?></td>
                                <td><?php echo $vehicule['prix_vente']; ?></td>
                            </tr>
                        </table>
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