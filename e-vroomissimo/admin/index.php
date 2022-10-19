<?php

    require("../config/commandes.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    
<div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            <form method="post">

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">URL de l'image</label>
                <input type="text" class="form-control" name="image" required> 
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Marque de la voiture</label>
                <input type="text" class="form-control" name="nom" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Prix</label>
                <input type="number" class="form-control" name="prix" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Description</label>
                <textarea class="form-control" name="desc" required></textarea>
            </div>


            <button type="submit" name="valider" class="btn btn-primary">Ajouter un nouveau véhicule</button>

            </form>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>

<?php

    if(isset($_POST['valider'])) 
    {
        if(isset($_POST['image']) AND isset($_POST['nom']) AND isset($_POST['prix']) AND isset($_POST['desc']))
        {
        if(!empty($_POST['image']) AND !empty($_POST['nom']) AND !empty($_POST['prix']) AND !empty($_POST['desc']))
        {
           $image = htmlspecialchars(strip_tags($_POST['image']));
           $nom = htmlspecialchars(strip_tags($_POST['nom']));
           $prix = htmlspecialchars(strip_tags($_POST['prix']));
           $desc = htmlspecialchars(strip_tags($_POST['desc'])); 

           try
           {
            ajouter($image, $nom, $prix, $desc);

           } catch (Exception $e) {

               $e->getMessage(); 
           }            
        }   
        }
    }

?>