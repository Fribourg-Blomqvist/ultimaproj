<?php
session_start();
if ($_SESSION['admin'] != 1) {
    header('location:http://localhost/recettes-bio2/crud/crud.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/fd11eb9a8c.js" crossorigin="anonymous"></script>
    <title>Ajout</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/formadd.css">
</head>

<body>
    <?php include '../require/header.php'; ?>
   
    <h2>Ajouter une nouvelle recette</h2>
    <form action="add.php" method="post" enctype="multipart/form-data">
        <label for="name">Title :</label>
        <input type="text" name="title" required>
        <label for="model">Description :</label>
        <input type="text" name="description" required>
        <label for="pays">Pays :</label>
        <input type="text" name="pays" required>
        <label for="legumes">Legumes :</label>
        <input type="text" name="legumes" required>
        <label for="fruits">Fruits:</label>
        <input type="text" name="fruits" required>
        <label for="images">Images:</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="4194304"> <!-- 4Mo => 1024*1024*4 -->
        <input type="file" id="images " name="images" required>

        <button type="submit">Ajout</button>

    </form>
    <?php
    if(isset($_GET['message'])){
        echo $_GET['message'];
    }?>
    <?php include '../require/footer.php'; ?>

</body>

</html>