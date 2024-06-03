<?php  
//demarer la session amdin
session_start();

include "config/commandes.php"

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
//recuperation des info connexion admin
if (isset($_POST['valider'])) {  // Check if the form was submitted
    if (!empty($_POST['email']) AND !empty($_POST['motdepasse'])) {  // Check if email and password are not empty
        $email = htmlspecialchars($_POST['email']); // Sanitize email to prevent XSS
        $motdepasse = htmlspecialchars($_POST['motdepasse']); // Sanitize password to prevent XSS

        $admin = getAdmins($email, $motdepasse);  // Validate credentials with getAdmins

        if ($admin) {  // Check if getAdmins returned true (valid credentials)
            $_SESSION['KI3ydh638DH'] = $admin; // Store admin data in session (potentially sensitive, consider alternatives)
            header('location:admin/');  // Redirect to admin page
        } else {
            echo "Email ou mot de passe incorrect"; // Display error message
        }
    } else {
        echo "Veuillez remplir tous les champs du formulaire."; // Display message for empty fields
    }
}
?>