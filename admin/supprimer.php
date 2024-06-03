<?php
session_start();
//securisation des acces a la page admin
if(!isset($_SESSION['KI3ydh638DH'])){
header("Location: ../login.php");
}
if(empty($_SESSION['KI3ydh638DH'])){
    header("Location:../login.php");
}


require("../config/commandes.php");
$Produits = afficher();
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

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">id produit</label>
                            <input type="number" class="form-control" name="idproduit" required>
                        </div>


                        <button type="submit" name="valider" class="btn btn-primary">supprimer un produit</button>
                </form>
                <?php foreach ($Produits as $produit) : ?>
                    
                        <div class="container">
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                                <div class="col">
                                    <div class="card shadow-sm">
                                        <title><?= $produit->idproduit ?></title>
                                        <rect width="200px" height="200px" fill="#55595c" /><img src=<?= $produit->image ?> <div class="card-body">
                                        <small class="text-muted"><?= $produit->id?></small>
                                    </div>                              
                                </div>
                            </div>
                         </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</body>

</html>
<?php
// verification du remplisage du formulaire et mise en base de donne avec la method post
if (isset($_POST['valider'])) {
    //verification du remplisage
    if (isset($_POST['idproduit'])) {
        //recuperation des donné du formulaire
        if (!empty($_POST['idproduit'])) {
            $idproduit = htmlspecialchars(strip_tags($_POST['idproduit']));
            //apelle de la fonction supprimer
            supprimer($idproduit);
        }
    }
}
?>