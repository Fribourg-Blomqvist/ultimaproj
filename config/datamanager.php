<?php
require 'database.php';
//Requet sql pour le crud qui permet de communiquer avec la base de donnée
//optimisation du datamanager (regroupement de tte les fonctions)
//requir de datamanager dans les differents fichier pour appeller de la fonction choisi
function addrecettes(string $title, string $description, string $pays, string $legumes, string $fruits, string $images)
{
    $dbco;

    connexion($dbco);
    //var_dump($title,$description, $pays, $legumes, $fruits, $images);
    try {
        $query = $dbco->prepare("INSERT INTO recettes(title, description, pays, legumes, fruits, images)
              VALUES(:title,:description,:pays,:legumes, :fruits, :images)");

        $query->bindValue(':title', $title);
        $query->bindValue(':description', $description);
        $query->bindValue(':pays', $pays);
        $query->bindValue(':legumes', $legumes);
        $query->bindValue(':fruits', $fruits);
        $query->bindValue(':images', $images);


        $query->execute();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
//Ajouter un utilisateur
function adduser(string $pseudo, string $mail, string $password)
{
    $dbco;

    connexion($dbco);
    //var_dump($pseudo,$mail,$password);
    try {
        $query = $dbco->prepare("INSERT INTO user (pseudo, mail, password)
              VALUES(:pseudo,:mail,:password)");

        $query->bindValue(':pseudo', $pseudo);
        $query->bindValue(':mail', $mail);
        $query->bindValue(':password', $password);
        $query->execute();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

//afficher les recettes
function select_all_recettes()
{
    $dbco;

    connexion($dbco);

    try {
        $query = $dbco->prepare("SELECT * FROM recettes");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
//verification des utilisateur
function selectuser(string $pseudo)
{
    $dbco = NULL;
    connexion($dbco);
    try {
        $query = $dbco->prepare("SELECT pseudo, password, role FROM user WHERE pseudo=:pseudo");
        $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
//Selectionner une recette par son Id
function select_recettes_by_id(int $id)
{
    $dbco = NULL;
    connexion($dbco);
    try {
        $query = $dbco->prepare("SELECT * FROM recettes WHERE id = :id");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
function update_recettes_by_id(
    string $title,
    string $description,
    string $pays,
    string $legumes,
    string $fruits,
    string $images,
    int $id
) {
    $dbco = NULL;
    connexion($dbco);

    try {
        $query = $dbco->prepare("UPDATE recettes SET title=:title, description=:description, pays=:pays, legumes=:legumes, fruits=:fruits, images=:images WHERE id =:id");
        $query->bindValue(':title', $title, PDO::PARAM_STR);
        $query->bindValue(':description', $description, PDO::PARAM_STR);
        $query->bindValue(':pays', $pays, PDO::PARAM_STR);
        $query->bindValue(':legumes', $legumes, PDO::PARAM_STR);
        $query->bindValue(':fruits', $fruits, PDO::PARAM_STR);
        $query->bindValue(':images', $images, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
//Fonction pour effacer une recette
function deleteRecettes(int $id)
{
    $dbco = NULL;
    connexion($dbco);

    try {
        $query = $dbco->prepare('DELETE FROM recettes WHERE id=:id');
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
