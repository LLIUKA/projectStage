<?php

function ajouter($image, $nom, $prix, $desc)
{
    //require pour lié lacces a connexion.php
    if (require("connexion.php")) {

        $sql = "INSERT INTO produit (image, nom, prix, description) VALUES (?,?,?,?)";
        //creation de la variable avec la comande sql pour preparé l'incertion du produit dans la bd
        $req = $access->prepare($sql);

        if (!empty($image) && !empty($nom) && !empty($prix) && !empty($desc)) {
            try {
                // Bind the sanitized values to the prepared statement
                $req->bindParam(1, $image);
                $req->bindParam(2, $nom);
                $req->bindParam(3, $prix);
                $req->bindParam(4, $desc);

                $req->execute();
            } catch (Exception $e) {
                //affichage des possible erreur sql
                $errorMessage = $e->getMessage();
                error_log("SQL Error: " . $errorMessage);
                echo "Erreur d'insertion : " . $errorMessage;

            }
        } else {
            //verification du remplisage du formulaire
            echo "Erreur : Veuillez remplir tous les champs du formulaire.";
        }


        $req->closeCursor();
    } else {
        //geré les erreur
        echo "Erreur de connexion à la base de données.";
    }
}

//creation de la fonction afficher qui affichera tout le contenue
function afficher()
{
    if (require("connexion.php")) {
        $sql="SELECT * FROM produit ORDER BY id DESC";
        $req = $access->prepare($sql);

        $req->execute();
        //variable data qui va stocker les donné requiperé par req sous forme d'objet
        $data = $req->fetchall(PDO::FETCH_OBJ);

        return $data;
        //fermeture de la function
        $req->closeCursor();
    }
}
//creation de la function supprimer pour supprimer les produit 
function supprimer($id)
{
    if (require("connexion.php")) {
        //sentence sql pour supprimer un produit via son id
        $sql = "DELETE FROM produit WHERE id = :id";

        try {
            $req = $access->prepare($sql);


            $req->bindParam(':id', $id, PDO::PARAM_INT);

            //execute de la fonction avec catch derreur au cas ou 
            $req->execute();
        } catch (PDOException $e) {
            echo "Error deleting product: " . $e->getMessage();
        }
    } else {
        echo "Error connecting to database.";
    }
}




function register( $pseudo, $email, $mdp){
require("connexion.php");
if (!preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z]).{10,}$/', $mdp)) {
  echo "ERROR: Password must be at least 10 characters long and contain at least one uppercase letter, one lowercase letter, and one digit.";
  exit; // Terminate script execution to prevent further processing
}

$mdp = sha1($mdp); // Hash password after complexity check
//creation de variable et requete sql
$insertUser = $access->prepare('INSERT INTO utilisateur(nom, motdepasse, email, type ) VALUES (?, ?, ?, 0)');
$insertUser->execute(array($pseudo, $mdp, $email));    

//creation de la session qui correspondra a lid de lutilisateur


    header('location:login.php');


}



function verifmail($email) {
  // Connexion à la base de données (remplacez les informations de connexion)
  if (require("connexion.php")) {
  $access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Préparation et exécution de la requête SQL
  $sql = "SELECT * FROM utilisateurs WHERE email = ?";
  $req = $access->prepare($sql);
  $req->bindParam(1, $email, PDO::PARAM_STR);
  $req->execute();

  
  $rowCount = $req->rowCount();

  
  $req = null;

  return $rowCount > 0; 
}
}