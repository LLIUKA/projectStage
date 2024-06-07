<?php  




require "config/connexion.php";


?>

<!DOCTYPE html>
<html lang="fr">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login_OTOP</title>
</head>
<body>
<form method="post">
    <section id="login">
        <div class="container">
        <div class="form-group">
    <label for="nom">nom utilisateur</label>
    <input type="text" class="form-control" name="nom">
  </div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" name="email">
    <small id="email" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="motdepasse">Mot de passe</label>
    <input type="password" class="form-control" name="motdepasse">
  </div>
  <button type="submit" class="btn btn-primary" name="valider">se connecter</button>
        </div>
    </section>
    </form>
</body>
</html>
<?php 

session_start();

require "config/commandes.php";
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