<?php  


require "../backend/config/connexion.php";


?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <link rel="stylesheet" href="formulaireinscription.css">


  <script src="https://kit.fontawesome.com/259f41835c.js" crossorigin="anonymous"></script> 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
  rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
  crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Formulaire Inscription</title>   
<body id="body">
<form method="post">
<section id="login">
    <div class="container" >
        <div class="row">
            <div class="col d-flex justify-content-center">
                <img  id="logo" src="/HTML/OTOP-noir.png"><br>
            </div>
            <div>
                <h1 id="titre">Inscriptions</h1>
            </div>
        </div>
        <div class="form-group">
        <div id="champinscription" class="d-flex justify-content-center">
                <label class="visually-hidden" for="nom">Nom</label><br>
                <div class="input-group">
                    <div class="input-group-text" id="fondicone"><i class="fa-solid fa-user"></i></div>
                    <input type="text" class="form-control" id="autoSizingInputGroup" placeholder="Nom" name="nom">
                </div>
        </div>
        </div>
        <div class="form-group">
        <div id="champinscription" class="d-flex justify-content-center">
                <label class="visually-hidden" for="email">Email</label><br>
                <div class="input-group">
                    <div class="input-group-text" id="fondicone"><i class="fa-solid fa-at"></i></div>
                    <input type="email" class="form-control" id="autoSizingInputGroup" placeholder="Email" name="email">
                </div>
        </div>
        </div>
        <div id="champinscription" class="d-flex justify-content-center">
                <label class="visually-hidden" for="autoSizingInputGroup">Mot De Passe</label><br>
                <div class="input-group">
                    <div class="input-group-text" id="fondicone"><i class="fa-solid fa-key"></i></div>
                    <input type="password" class="form-control" id="autoSizingInputGroup" placeholder="Mot De Passe" name="motdepasse">
                </div>
        </div>
        <div class="form-group">
        <div id="champinscription" id="bouton" class="">
            <div class="d-flex justify-content-center">
                <br><a href="accueil.html"><button type="button"  id="boutonformulaire" class="btn btn btn-secondary btn-lg"><h6>Retour</h6></button></a>
                <a href=""><button type="submit" id="boutonformulaire"  class="btn btn btn-secondary btn-lg" name="valider"><h6>Valider</h6></button></a>
            </div>
        </div>
    </div>
    </div>
</section>
</form>
</body>
</html>
<?php 

session_start();

require "../backend/config/commandes.php";
//verification de saisie du formulaire
if(isset($_POST['valider'])){
  //verif remplisage
    if(!empty($_POST['nom']) AND!empty($_POST['motdepasse'] AND!empty($_POST['email']))){
      //creation des variable avec sha1 pour hacher les mdp en bdd
        $pseudo = htmlspecialchars($_POST['nom']);      
        $email = htmlspecialchars($_POST['email']);
        $mdp = ($_POST['motdepasse']);

        register($pseudo, $email, $mdp);
        }
}else{
 echo "ERROR : veuillez remplir tous les champs";
}

?>