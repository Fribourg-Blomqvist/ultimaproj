<?php require dirname(__DIR__) . '/config/datamanager.php';

$recettes = select_all_recettes();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Recettes Online Bio</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/card.css">
</head>

<body style="background: url(assets/img/bg-recettes.png) no-repeat; background-position-x: 10%;">
    <!-- NAVBAR -->
    <nav id="nav">
        <div id="burger">
            <span id="spantop" class="spantopclose"></span>
            <span id="spancenter" class="spancenterclose"></span>
            <span id="spanbot" class="spanbotclose"></span>
        </div>
        <div class="logo">
            <img src="../Hackathon/assets/img/logo.png" alt="Logo">
            <span>Online <br> Bio</span>
        </div>
        <ul id="menu">
            <li id="home">
                <a href="../index.html">Accueil</a>
                <!-- <ul class="sub-menu">
                    <li>Qui Sommes Nous?</li>
                    <li>Ou Livrons nous?</li>
                </ul> -->
            </li>
            <li>
                <a href="https://www.online-bio.fr/">Boutique</a>
            </li>
            <li>
                <a href="producteur1.html">Producteurs</a>
            </li>
            <li>
                <a href="../ecf2/formulaire.php">Coté cuisine</a>
            </li>

        </ul>
    </nav>
    <!-- END NAVBAR -->


    <main class="page-content">
        <div class="contenaire">
            <?php
            // var_dump($recettes);
            // die();
            foreach ($recettes as $row) {
            ?>

                <div class="carte">
                    <div class="carte2"><img src="../ecf2/assets/img/<?= $row['images'] ?> " alt="photo"></div>
                    <h2><?php echo $row['title']; ?></h2>
                    <p><?php echo $row['description']; ?></p>
                    <p><?php echo $row['pays']; ?></p>
                </div>


            <?php
            }
            ?>
        </div>
    </main>
    <!-- END SECTION -->
    <!-- FOOTER -->
    <footer>
        <a href="#nav">
            <i class="fas fa-chevron-circle-up" id="header"></i>
        </a>
        <div>
            <div class="logo">
                <img src="assets/img/logo.png" alt="">
                <span>Online<br>Bio</span>
            </div>
            <div>
                <h2>Catégories</h2>
                <ul>
                    <li><a href="http://www.online-bio.fr/">La Boutique</a></li>
                    <li><a href="producteur1.html">Nos Producteurs</a></li>
                    <li><a href="recettes.html">Nos Recettes</a></li>
                </ul>
            </div>
            <div>
                <h2>Informations</h2>
                <ul>
                    <li><a href="https://www.online-bio.fr/mentions-legales/">Mentions Légales</a></li>
                    <li><a href="https://www.online-bio.fr/politique-de-confidentialite/">Confidentialité et
                            Cookies</a>
                    </li>
                    <li><a href="https://www.online-bio.fr/conditions-generales-de-vente-et-dutilisation/">CGUV</a>
                    </li>
                </ul>
            </div>
            <div>
                <h2>Contacts</h2>
                <ul>
                    <li><a href="tel:+33609399009">06 09 39 90 09</a></li>
                    <li><a href="mailto:onlinebio.contact@gamil.com">onlinebio.contact@gamil.com</a></li>
                </ul>
            </div>
        </div>
        <div>
            <i class="fab fa-facebook-square"></i>
            <i class="fab fa-instagram-square"></i>
        </div>
    </footer>
    <!-- END FOOTER -->
    <script src="assets/javascript/script.js"></script>
    <script src="ecf2/assets/javascript/formu.js"></script>
</body>

</html>