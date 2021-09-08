
<?php //var_dump($_POST['pseudo'],$_POST['mail'],$_POST['password']);
session_start();
require './config/datamanager.php';
require './config/validData.php';


if (!empty($_POST['pseudo']) && !empty($_POST['mail']) && !empty($_POST['password']) && !empty($_POST['password_verif'])) {
  //var_dump($_POST['pseudo'],$_POST['mail'],$_POST['password']);
  if ($_POST['password'] == $_POST['password_verif']) {
    $pwh = password_hash($_POST['password'], PASSWORD_DEFAULT);
    //var_dump(password_verify($_POST['password'],$pwh));

    adduser($_POST['pseudo'], $_POST['mail'], $pwh);
    $_SESSION["user"] = $_POST['pseudo'];
    header('location:http://localhost/recettes-bi2o/ecf2/crud.php');
  } else {
    //créer mess 2 mots pass non identique
    $message = 'Erreur mot de passe non identique';
    header("location:http://localhost/recettes-bio2/ecf2/formulaire.php?message=$message");
  }
} else { //creer message erreur
  //créeer message pesudo vide
  //si mail vid
  //si password est vide
  header('location:http://localhost/recettes-bio2/ecf2/formulaire.php');
}


?>