<?php
session_start();
if ($_SESSION['admin'] != 1) {
    header('location:http://localhost/recettes-bio2/crud/crud.php');
}
?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/fd11eb9a8c.js" crossorigin="anonymous"></script>
  <title>Document</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/formadd.css">
</head>

<?php include '../require/header.php'; ?>
<?php
require '../config/datamanager.php';
$recettes = select_all_recettes();

$size = count($recettes);
?>
<form action="" method="get">
  <select name="selectId" id="">
    <?php for ($i = 0; $i < $size; $i++) : ?>
      <option value="<?php echo $recettes[$i]['id']; ?>"><?php echo $recettes[$i]['title'] ?></option>
    <?php endfor; ?>
  </select>
  <input type="submit" value="Selectioner">
</form>
<?php
if (isset($_GET['selectId'])) :
  $id = $_GET['selectId'];
  $recettes = select_recettes_by_id($id);
  //selectioner recette par id et peupler le formulaire
?>

  <!DOCTYPE html>
  <html lang="en">


  <body>

  </body>

  </html>
  <form action="update.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
    <label for="name">Title :</label>
    <input type="text" name="title" value="<?php echo $recettes['title']; ?>" required><br>
    <label for="model">Description :</label>
    <input type="text" name="description" value="<?php echo $recettes['description']; ?>" required><br>
    <label for="pays">Pays :</label>
    <input type="text" name="pays" value="<?php echo $recettes['pays']; ?>" required><br>
    <label for="legumes">Legumes :</label>
    <input type="text" name="legumes" value="<?php echo $recettes['legumes']; ?>" required><br>
    <label for="fruits">Fruits:</label>
    <input type="text" name="fruits" value="<?php echo $recettes['fruits']; ?>" required><br>
    <label for="images">Images:</label>
    <input type="hidden" name="MAX_FILE_SIZE" value="4194304"> <!-- 4Mo => 1024*1024*4 -->
    <input type="file" id="images " name="images" required>

    <button type="submit">Mettre à jour</button>
  </form>
  
<?php endif; ?>
<?php if(isset($_GET['message'])){
  echo $_GET['message'];
}?>
<?php include '../require/footer.php'; ?>