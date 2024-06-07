<?php  


require "config/commandes.php";
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
    <label for="email">Email address</label>
    <input type="email" class="form-control" name="email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
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
//si le bouton se connecter est cliqué alors on execute le code ci-dessous
if(isset($_POST['valider'] )){
  //on verifie si les champs ne sont pas vide
    if(!empty($_POST['email']) AND!empty($_POST['motdepasse'])){
        $email =htmlspecialchars($_POST['email']);
        $mdp =sha1($_POST['motdepasse']);
      //creation de la variable recupuser qui sera egale a access(variable de connection a la bdd)qui prepare la comande sql dans prepare
        $recupUser = $access->prepare("SELECT * FROM utilisateur WHERE email =? AND motdepasse =? LIMIT 1");
        //on execute la requete prepare avec les parametres email et motdepasse
        $recupUser->execute(array($email, $mdp));

        $recupnom = $access->prepare("SELECT nom FROM utilisateur WHERE email = :email");
        $recupnom->execute(array(':email' => $email));

     

        $checkuser = $recupUser->rowCount();
        $isAdmin = $recupUser->fetch();
        
        //heck user va crée la session si il et superieur a 0
        if($checkuser > 0){
          $_SESSION['email'] = $email;
          $_SESSION['motdepasse'] = $mdp;
          $_SESSION['type'] = $isAdmin['type'];

                 header("location:indexlog.php");
           //sinon il va crée une session clasic pour tout les autre cas           
          } if ($recupUser->rowCount() > 0) {
            $user = $recupUser->fetch();
            $nom = $recupnom->fetchColumn();
            $_SESSION['nom'] = $nom;
          $_SESSION['email'] = $email;
          $_SESSION['motdepasse'] = $mdp;
          $_SESSION['userid'] = $user['userid'];
          header('location:indexlog.php');
          }
              // Redirection vers la page utilisateur
              
          }
      }
   
      
  
?>