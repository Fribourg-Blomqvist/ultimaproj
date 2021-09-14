<?php
require '../config/validData.php';
require '../config/datamanager.php';


$ext = array('png', 'jpg', 'jpeg', 'gif');

if (isset($_POST['title'], $_POST['description'], $_POST['pays'], $_POST['legumes'], $_POST['fruits'], $_FILES['images'])) :
    if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['pays']) && !empty($_POST['legumes']) && !empty($_POST['fruits']) && !empty($_FILES['images'])) :
        $title = valid_data($_POST['title']);
        $description = valid_data($_POST['description']);
        $pays = valid_data($_POST['pays']);
        $legumes = valid_data($_POST['legumes']);
        $fruits = valid_data($_POST['fruits']);
        $images = $_FILES['images'];
        if ($images['error'] > 0 && $images['error'] < 3) :
            $msg_error = "taille du fichier trop grand";
        elseif ($images['error'] == 3 || $images['error'] > 4) :
            $msg_error = "problème pendant l'upload";
        else :
            if ($images['error'] == 4) :
                $images_name = 'generic.jpg';
                $set_request = TRUE;
            else :
                // je revérifie la taille de l'image côté serveur
                if ($images['size'] > 4194304) :
                    $msg_error = "taille du fichier trop grand"; // 4Mo => 1024*1024*4

                // je vérifie que l'extension est bien une image
                elseif (!in_array(strtolower(pathinfo($images['name'], PATHINFO_EXTENSION)), $ext)) :
                    $msg_error = "le fichier n'est pas une image";

                // taille ok, extension ok
                else :
                    // je donne un nouveau nom à l'image pour éviter les doublons
                    $images_name = uniqid() . '_' . $images['name'];
                    $img_folder = '../assets/img/';
                    // dirname(dirname(__DIR__)) . '/assets/img/';
                    //@mkdir($img_folder, 0777);
                    $dir = $img_folder . $images_name;
                    
                    $move_file = move_uploaded_file($images['tmp_name'], $dir);
                    if (!$move_file) :
                        $msg_error = "problème pendant l'upload de l'image";
                        header("location:http://localhost/recettes-bio2/crud/addform.php?message=$msg_error");
                    else :

                        addrecettes($title, $description, $pays, $legumes, $fruits, $images_name);
                        $message = 'Félicitation!! Recette ajouté';
                        header("location:http://localhost/recettes-bio2/crud/crud.php?message=$message");

                    endif;
                endif;

            endif;
        endif;

    else :
        $msg_error = "Des données sont manquantes";
        header("location:http://localhost/recettes-bio2/crud/addform.php?message=$msg_error");
    endif;
else :
    $msg_error = "Erreur lors de l'enregistrement";
    header("location:http://localhost/recettes-bio2/crud/addform.php?message=$msg_error");
endif;
