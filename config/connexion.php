<?php 

try { 
//connexion de la base de donné au projet avec pdo fonction include de php
$access=new pdo("mysql:host=localhost;dbname=otop;charset=utf8", "root","");
//affichage des erreur
$access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (\Exception $e) {
    $e->getMessage();
}


?>