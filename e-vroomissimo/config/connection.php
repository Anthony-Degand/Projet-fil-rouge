<?php

try { // test

        // je crée une variable = à l'objet new PDO pour liée ma base de données à mon interface   
        $access=new PDO("mysql:host=localhost;dbname=e-vroomissimo;charset=utf8", "root", "");

        //message d'erreur si pblm de connection à la base de données
        $access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

} catch (Exception $e) { // si sa ne marche pas, attrape l'erreur et envoie moi le msg d'erreur

        $e->getMessage(); //Renvoie le message d'erreur
}



?>