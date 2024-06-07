<?php 
session_start();
    
 

    require("../config/commandes.php")
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <!-- ajout de la method post au formulaire -->
                <form method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">titre de l'image</label>
                        <input type="name" class="form-control" name="image" required>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Nom du produit</label>
                            <input type="text" class="form-control" name="nom" required>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Prix</label>
                            <input type="number" class="form-control" name="prix" required>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">description</label>
                            <textarea class="form-control" name="desc" required></textarea>
                        </div>


                        <button type="submit" name="valider" class="btn btn-primary">ajouter un nouveau produit</button>
                       
                </form>
            </div>
        </div>
    </section> 
    <a href="supprimer.php" class="btn btn-primary">supprimer un produit ?</a>
</body>

</html>
<?php 
// verification du remplisage du formulaire et mise en base de donne avec la method post
 if(isset($_POST['valider']))
 {
    //verification du remplisage
    if(isset($_POST['image']) AND isset($_POST['nom']) AND isset($_POST['prix']) AND isset($_POST['desc']))
    {
        //recuperation des donné du formulaire
        if(!empty($_POST['image']) AND !empty($_POST['nom']) AND !empty($_POST['prix']) AND !empty($_POST['desc']))
        {
            $image= htmlspecialchars(strip_tags($_POST['image']));
            $nom= htmlspecialchars(strip_tags($_POST['nom']));
            $prix= htmlspecialchars(strip_tags($_POST['prix']));
            $desc= htmlspecialchars(strip_tags($_POST['desc']));

            //ajout des donné dans la base de donner et sur le site
            ajouter($image, $nom, $prix, $desc);
            }
        }
    }
?>