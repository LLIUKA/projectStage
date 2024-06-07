<?php  


require "../backend/config/commandes.php";
require "../backend/config/connexion.php";

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Connexion</title>

    <link rel="stylesheet" href="formulaireconnexion.css">
    

    <script src="https://kit.fontawesome.com/259f41835c.js" crossorigin="anonymous"></script> 

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
<body id="body">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <form method="post">
        <section id="login">
    <div class="container" >
        <div class="row">
            <div class="col d-flex justify-content-center">
                <img  id="logo" src="/HTML/OTOP-noir.png"><br>
            </div>
            <div>
                <h1 id="titre">Connexion</h1>
            </div>
        </div>
        <div id="champinscription" class="d-flex justify-content-center">
                <label class="visually-hidden" for="autoSizingInputGroup">Email</label><br>
                <div class="input-group">
                    <div class="input-group-text" id="fondicone"><i class="fa-solid fa-at"></i></div>
                    <input type="email" class="form-control" id="autoSizingInputGroup" placeholder="Email" name="email">
                </div>
        </div>
        <div id="champinscription" class="d-flex justify-content-center">
                <label class="visually-hidden" for="autoSizingInputGroup">Mot De Passe</label><br>
                <div class="input-group">
                    <div class="input-group-text" id="fondicone"><i class="fa-solid fa-key"></i></div>
                    <input type="password" class="form-control" id="autoSizingInputGroup" placeholder="Mot De Passe" name="motdepasse">
                </div>
        </div>
        <div id="champinscription" id="bouton" class="">
            <div class="d-flex justify-content-center">
                <br><a href=""><button type="button"  id="boutonformulaire" class="btn btn btn-secondary btn-lg"><h6>Retour</h6></button></a>
                <a href=""><button type="submit" id="boutonformulaire"  class="btn btn btn-secondary btn-lg" name="valider"><h6>Valider</h6></button></a>
            </div>
        </div>
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
          header('location:../HTML/accueillog.php');
          }
              // Redirection vers la page utilisateur
              
          }
      }
   
      
  
?>