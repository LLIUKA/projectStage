<?php
// Démarre une nouvelle session ou reprend une session existante
session_start();
//securisation des acces a la page admin


// Inclusion du fichier de configuration et des commandes
require("../config/commandes.php");
// Appel de la fonction 'afficher' pour récupérer et afficher les produits
// Elle récupère les produits de la base de données et les retourne
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
                 // Boucle à travers chaque produit dans le tableau $Produits et affiche les informations de chaque produit
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
                // Fin de la boucle 
            </div>
        </div>
    </section>
</body>

</html>
<?php
// Vérification si le formulaire a été soumis avec le bouton 'valider'
if (isset($_POST['valider'])) {
    // Vérification que le champ 'idproduit' est présent dans le formulaire
    if (isset($_POST['idproduit'])) {
        // Vérification que le champ 'idproduit' n'est pas vide
        if (!empty($_POST['idproduit'])) 
        // Récupération et sécurisation des données du formulaire
            $idproduit = htmlspecialchars(strip_tags($_POST['idproduit']));
            // Appel de la fonction 'supprimer' pour supprimer le produit de la base de données
            supprimer($idproduit);
        }
    }
}
?>
