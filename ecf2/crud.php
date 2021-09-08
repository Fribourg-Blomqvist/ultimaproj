<?php
session_start();

require '../config/datamanager.php';
$recettes = select_all_recettes();

$size = count($recettes);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/fd11eb9a8c.js" crossorigin="anonymous"></script>
  <title>Nos Recettes</title>
  <link rel="stylesheet" href="../ecf2/assets/css/crud.css">
  <link rel="stylesheet" href="../Hackathon/assets/css/style.css">
</head>

<body>
  <?php include '../requ/header.php'; ?>
  <?php
  if ($_SESSION["user"]) {
    echo '<li><a href="../ecf2/logout.php" class="lien">Deconnexion</a></li>';
  }
  if (isset($_GET['message'])) {
    echo $_GET['message'];
  }
  ?>
  <div class="tablo">
    <table>
      <thead>
        <th>Id</th>
        <th>Title</th>
        <th>Description</th>
        <th>Pays</th>
        <th>Legumes</th>
        <th>Fruits</th>
        <th>Images</th>
      </thead>
      <tbody>
        <?php for ($i = 0; $i < ($size); $i++) : ?>
          <tr>
            <?php foreach ($recettes[$i] as $key => $value) : ?>
              <?php
              if ($key != 'images') :

              ?>
                <td><?php echo $value; ?></td>
              <?php
              else :
              ?>
                <td> <img src="../ecf2/assets/img/<?php echo $value; ?>" alt=""></td>
              <?php endif; ?>



            <?php endforeach; ?>
            <?php
            //var_dump($_SESSION)

            if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
            ?>
              <td>
                <a href="../ecf2/delete.php?id=<?php echo $recettes[$i]['id']; ?>">Delete</a>
                <a href="../ecf2/addform.php">Add</a>
                <a href="../ecf2/updateform.php">Update</a>
              </td>

            <?php
            }
            ?>
          </tr>
        <?php endfor; ?>
      </tbody>

    </table>
  </div>
  <?php include '../requ/footer.php'; ?>
</body>

</html>