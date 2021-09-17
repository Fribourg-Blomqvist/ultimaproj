<?php 
session_start();



// appel fichier pour recupération infos base de données
require '../config/datamanager.php';
require '../config/validData.php';

$pseudo =  valid_data($_POST['pseudo']);
$result = selectuser($pseudo);

if ($result) {

  if (password_verify($_POST['password'], $result['password'])) {

    if ($result['role'] == 1) {
      $_SESSION["admin"] = true;
    } else {
      $_SESSION["admin"] = false;
    }
    $_SESSION["user"] = $result['pseudo'];

    header('location:http://localhost/recettes-bio2/crud/crud.php');
  } else {
    //message erreur renvoi mp incorrect
    $message = 'Mot de passe incorrect';
    header("location:http://localhost/recettes-bio2/crud/formulaire.php?message=$message");
  }
} else {
  $message = 'Pseudo inconnu';
  header("location:http://localhost/recettes-bio2/crud/formulaire.php?message=$message");
}
