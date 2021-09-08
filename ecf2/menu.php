<h1>Salut</h1>

<?php


if (isset($_SESSION['user'])) {
  echo '<li><a href="ecf2/logout.php" class="lien">Deconnexion</a></li>';
} else {
  echo '<li><a href="loginform.php" class="lien">login</li>
<li><a href="ecf2/formuser.php">inscription</a></li>';
}
