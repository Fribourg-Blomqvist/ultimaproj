//Deconnexion
<?php
session_start();
session_destroy();
header('location:http://localhost/recettes-bio2/recettes.php');
