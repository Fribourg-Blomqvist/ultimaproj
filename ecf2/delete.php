<?php
require './config/datamanager.php';
if (isset($_GET['id']) and !empty($_GET['id'])) {
  $id = $_GET['id'];
  deleteRecettes($id);
  $message = 'La recette à été effacé';
  header("location:ecf2/crud.php?message=$message");
}