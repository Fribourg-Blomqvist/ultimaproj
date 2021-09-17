
<?php 
session_start();
require '../config/datamanager.php';
require '../config/validData.php';


if (!empty($_POST['pseudo']) && !empty($_POST['mail']) && !empty($_POST['password']) && !empty($_POST['password_verif'])) {

  if ($_POST['password'] == $_POST['password_verif']) {
    $pwh = password_hash($_POST['password'], PASSWORD_DEFAULT);


    adduser($_POST['pseudo'], $_POST['mail'], $pwh);
    $_SESSION["user"] = $_POST['pseudo'];
    header('location:http://localhost/recettes-bio2/crud/crud.php');
  } else {
    //créer mess 2 mots pass non identique
    $message = 'Erreur mot de passe non identique';
    header("location:http://localhost/recettes-bio2/crud/formulaire.php?message=$message");
  }
} else { //creer message erreur
  $message = 'Erreur lors de l\'inscription';
  header("location:http://localhost/recettes-bio2/crud/formulaire.php?message=$message");
}


?>