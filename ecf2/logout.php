//Deconnexion
<?php
session_start();
session_destroy();
header('location:Hackathon/recettes.php');
