<?php
function getAdmins($email, $motdepasse) {
  // ajt du fichier connexion pour ce connecter a la base de donner
  if (require("connexion.php")) { 
    // phrase sql qui sert a récupérer les données email et motdepasse de l'administrateur 
    $sql = "SELECT * FROM admin WHERE email = ? AND motdepasse = ?";

    try {
      // variable req qui sera = a access (variable de connexion a la bd) puis prepare la requete sql plus ajout de l'email et du mdp puis execution de la variable req avec tt les info
      $req = $access->prepare($sql);
      $req->bindParam(1, $email, PDO::PARAM_STR);
      $req->bindParam(2, $motdepasse, PDO::PARAM_STR); 
      $req->execute(); 

      //verifie si les info de req sont = a l'admin de la bd
      if ($req->rowCount() == 1) {
      
        $data = $req->fetch();//extraction des donné avec fetch vers la variable data
        return $data;
      } else {
        return false; // Aucun administrateur trouvé
      }
    } catch (PDOException $e) {
      echo "Erreur : " . $e->getMessage(); // Enregistrer ou gérer l'erreur plus en détail
      return false;
    } finally {
      $req->closeCursor(); // Ferme le curseur de la requête
    }
  } else {
    echo "Erreur de connexion à la base de données.";
    return false;
  }
}        
    //       if (password_verify($motdepasse, $data['motdepasse'])) {
    //         return $data;
    //       } else {
    //         return false; 
    //       }
    //     } else {
    //       return false; 
    //     }
    //   } catch (PDOException $e) {
    //     echo "Error: " . $e->getMessage();
    //     return false;
    //   } finally {
    //     $req->closeCursor();
    //   }
    // } else {
    //   echo "Error connecting to database.";
    //   return false;
    // }
  
function ajouter($image, $nom, $prix, $desc)
{
    //require pour lié lacces a connexion.php
    if (require("connexion.php")) {
        //creation de la variable avec la comande sql pour preparé l'incertion du produit dans la bd
        $req = $access->prepare("INSERT INTO produits (image, nom, prix, description) VALUES (?, ?, ?, ?)");

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
                echo "Erreur d'insertion : " . $errorMessage;

                error_log("SQL Error: " . $errorMessage);
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
        //variable avec commande sql qui va selectionner tout le contenue du produit et l'ordonner par l'ID decroissant
        $req = $access->prepare("SELECT * FROM produits ORDER BY id DESC");

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
        $sql = "DELETE FROM produits WHERE id = :id";

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
