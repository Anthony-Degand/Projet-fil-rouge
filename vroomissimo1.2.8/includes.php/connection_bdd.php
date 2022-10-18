<?php
 //crée les constantes d'environement 

 define("DBHOST","localhost");          //server
 define("DBUSER","root");               //identifiant
 define("DBPASS","");                   //password
 define("DBNAME","vroomissimo");        //nom de la base de données 

 // DSN de connection ( data source name )

 $dsn='mysql:dbname='. DBNAME .'; host='. DBHOST ;

 // Connection à la base de données

 try {
     $db= new PDO ($dsn,DBUSER ,DBPASS);
     $db->exec ("SET NAMES utf8");

 } catch (PDOException $e) {
     die($e->getMessage());
 }

// $bdd = new PDO('mysql:host=localhost;dbname=vroomissimo;', 'root', '');  <-- fonctionne aussi ???? 
?>


