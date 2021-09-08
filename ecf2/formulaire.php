<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire signup/login</title>
  <script src="https://kit.fontawesome.com/fd11eb9a8c.js" crossorigin="anonymous"></script>
  <script src="../Hackathon/assets/javascript/jqueryfirst.js"></script>
  <link rel="stylesheet" href="../ecf2/assets/css/form.css">
  <link rel="stylesheet" href="../Hackathon/assets/css/style.css">
</head>

<body>

  <?php include '../requ/header.php'; ?>
  <div class="login-page">
    <div class="form">
      <form action="signup.php" method="post" class="register-form">
        <label for="name">Pseudo:</label>
        <input type="text" name="pseudo" required>
        <label for="mail">mail :</label>
        <input type="email" name="mail" required>
        <label for="password">Mot de passe:</label>
        <input type="password" name="password" required>
        <label for="password_verif">Verifier mot de passe:</label>
        <input type="password" name="password_verif" required>
        <button type="submit" class="btn">Allez</button>
        <p class="message">Deja enregistré? <a href="#">Identifiez vous</a></p>
      </form>
      <form action="login.php" method="post" class="login-form">
      <label for="name">pseudo</label>
        <input type="text" name="pseudo" />
        <label for="password">Mot de passe</label>
        <input type="password" name="password" />
        <button>Allez</button>
        <p class="message">Toujours pas enregistré? <a href="#">Créer un compte</a></p>
      </form>
    </div>
  </div>
  <?php include '../requ/footer.php'; ?>



  <script src="../Hackathon/assets/javascript/formu.js"></script>
</body>
</html>