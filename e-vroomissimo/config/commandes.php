<?php
// crée une fonction ajouter un produit********************************************
function ajouter($image, $nom, $prix, $desc) 
{
    if(require("C:\laragon\www\projet_vroomissimo/e-vroomissimo\config\connection.php"))// si connecter a la base de données, execute la fonction
    {
        $req = $access->prepare("INSERT INTO produits (image, nom, prix, description) VALUES ('$image', '$nom', $prix, '$desc')"); // je récupére mon accée et prépare une commande 

        $req->execute(array($image, $nom, $prix, $desc)); // j'exécute la commande préparer sous forme de tableau

        $req->closeCursor(); // fin d'instruction 
    }
}

// crée une fonction afficher un produit*******************************************
function afficher() 
{
    if(require("C:\laragon\www\projet_vroomissimo/e-vroomissimo\config\connection.php"))
    {
        $req = $access->prepare("SELECT * FROM produits ORDER BY id DESC"); // prépare une requete qui selectionne tous dans la table produit par ordre décroissant
    
        $req->execute(); // éxecutée la requéte 

        $data = $req->fetchAll(PDO::FETCH_OBJ); // stocker dans la variable "data" les données récupérer par la méthode fetchAll dans la variable "$req" sous forme d'objet "pdo fetch_obj"
        
        return $data; // affiche data

        $req->closeCursor(); // fin d'instruction
    
    }
}

// crée une fonction supprimer un produit****************************************
function supprimer($id)
{
    if(require("C:\laragon\www\projet_vroomissimo/e-vroomissimo\config\connection.php")) // connection à la bdd
    {
       $req=$access->prepare("DELETE * FROM produits WHERE id=?"); // prépare la requete supprime tous les champs dans la table produits comportant l'id ?(encore inconnue) 
    
       $req->execute(array($id)); // éxecutée la requéte
    }
}

?>