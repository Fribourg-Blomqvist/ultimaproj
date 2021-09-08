<?php //var_dump($_POST['pseudo'],$_POST['password']);
session_start();



// appel fichier pour recupération infos base de données
require '../config/datamanager.php';
require '../config/validData.php';

$pseudo =  valid_data($_POST['pseudo']);
$result = selectuser($pseudo);
if (!is_null($result)) {

  if (password_verify($_POST['password'], $result['password'])) {

    if ($result['role'] == 1) {
      $_SESSION["admin"] = true;
    } else {
      $_SESSION["admin"] = false;
    }
    $_SESSION["user"] = $result['pseudo'];

    header('location:http://localhost/recettes-bio2/ecf2/crud.php');
  } else {
    //message erreur renvoi mp incorrect
    $message = 'Mot de passe incorrect';
    header("location:http://localhost/recettes-bio2/ecf2/formulaire.php?message=$message");
  }
} else {
  // pseudo incorrect
  header('location:http://localhost/recettes-bio2/ecf2/formulaire.php');
}
