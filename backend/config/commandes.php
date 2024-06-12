<?php

// Fonction pour ajouter un produit à la base de données
function ajouter($image, $nom, $prix, $desc)
{
     // Inclure le fichier de connexion à la base de données
    if (require("connexion.php")) {
        // Préparer la commande SQL pour insérer un produit
        $sql = "INSERT INTO produit (image, nom, prix, description) VALUES (?,?,?,?)";
        //creation de la variable avec la comande sql pour preparé l'incertion du produit dans la bd
        $req = $access->prepare($sql);
        // Vérifier que tous les champs sont remplis
        if (!empty($image) && !empty($nom) && !empty($prix) && !empty($desc)) {
            try {
                // Lier les valeurs aux paramètres de la commande SQL
                $req->bindParam(1, $image);
                $req->bindParam(2, $nom);
                $req->bindParam(3, $prix);
                $req->bindParam(4, $desc);
                
                // Exécuter la requête
                $req->execute();
            } catch (Exception $e) {
                //affichage des possible erreur sql
                $errorMessage = $e->getMessage();
                error_log("SQL Error: " . $errorMessage);
                echo "Erreur d'insertion : " . $errorMessage;

            }
        } else {
            // Afficher un message d'erreur si des champs sont vides
            echo "Erreur : Veuillez remplir tous les champs du formulaire.";
        }

        // Fermer le curseur de la requête
        $req->closeCursor();
    } else {
        // Gérer les erreurs de connexion à la base de données
        echo "Erreur de connexion à la base de données.";
    }
}

// Fonction pour afficher tous les produits
function afficher()
{
    // Inclure le fichier de connexion à la base de données
    if (require("connexion.php")) {
        // Préparer la commande SQL pour sélectionner tous les produits

        $sql="SELECT * FROM produit ORDER BY id DESC";
        $req = $access->prepare($sql);
        
        // Exécuter la requête
        $req->execute();
        // Récupérer les données sous forme d'objets
        $data = $req->fetchall(PDO::FETCH_OBJ);
        
        // Retourner les données
        return $data;
        // Fermer le curseur de la requête
        $req->closeCursor();
    }
}
//creation de la fonction supprimer pour supprimer les produit 
function supprimer($id)
{
    // Inclure le fichier de connexion à la base de données
    if (require("connexion.php")) {
        //sentence sql pour supprimer un produit via son id
        $sql = "DELETE FROM produit WHERE id = :id";

        try {
            $req = $access->prepare($sql);

            // Lier l'ID au paramètre de la commande SQL
            $req->bindParam(':id', $id, PDO::PARAM_INT);

            //execute de la fonction avec catch d'erreur au cas ou 
            $req->execute();
        } catch (PDOException $e) {
        // Afficher les erreurs éventuelles lors de la suppression
            echo "Error deleting product: " . $e->getMessage();
        }
    } else {
        // Gérer les erreurs de connexion à la base de données
        echo "Error connecting to database.";
    }
}



// Fonction pour enregistrer un nouvel utilisateur
function register( $pseudo, $email, $mdp){
require("connexion.php");
// Vérifier la complexité du mot de passe
if (!preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z]).{10,}$/', $mdp)) {
  echo "ERROR: Password must be at least 10 characters long and contain at least one uppercase letter, one lowercase letter, and one digit.";
    exit; // Terminer l'exécution du script
}
// Hasher le mot de passe après vérification de sa complexité
$mdp = sha1($mdp);

// Préparer la commande SQL pour insérer un nouvel utilisateur
$insertUser = $access->prepare('INSERT INTO utilisateur(nom, motdepasse, email, type ) VALUES (?, ?, ?, 0)');
$insertUser->execute(array($pseudo, $mdp, $email));    

// Rediriger l'utilisateur après l'enregistrement
    header('location:/otopbackv10/HTML/formulaireconnexion.php');


}


// Fonction pour vérifier si un email est déjà enregistré
function verifmail($email) {
  // Inclure le fichier de connexion à la base de données
  if (require("connexion.php")) {
  $access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Préparation et exécution de la requête SQL
  $sql = "SELECT * FROM utilisateurs WHERE email = ?";
  $req = $access->prepare($sql);
  $req->bindParam(1, $email, PDO::PARAM_STR);
  $req->execute();

  // Compter le nombre de résultats
  $rowCount = $req->rowCount();

  // Fermer la requête
  $req = null;
  // Retourner true si l'email existe déjà, sinon false
  return $rowCount > 0; 
}
}
