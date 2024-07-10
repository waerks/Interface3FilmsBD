<?php

session_start();
   
// var_dump($_POST);
// die();
$idFilm = $_POST['idFilm'];
$valeur = $_POST['valeur'];
$nouvelleNote = $_POST['nouvelleNote'];
$idUtilisateur = $_SESSION['idUtilisateur'];

include("./db/config.php");

try {
    $cnx = new PDO(DSN, USERNAME, PASSWORD);
} catch (Exception $e) {
    print("<h3>Un problème est survenu</h3>");
    print("<img src='./image.jpg'>");
    print("<a href='./accueil.php'>Accueil</a>");

    die();
}

if ($nouvelleNote == "true") {
    // SI nouvelleNote est true
    $sql = "INSERT INTO note (id, valeur, idUtilisateur, idFilm) VALUES (null, :valeur, :idUtilisateur, :idFilm)";
} else {
    $sql = "UPDATE note SET valeur = :valeur WHERE idUtilisateur = :idUtilisateur AND idFilm = :idFilm";
}

$stmt = $cnx->prepare($sql);

$stmt->bindValue(":valeur", $valeur);
$stmt->bindValue(":idUtilisateur", $idUtilisateur);
$stmt->bindValue(":idFilm", $idFilm);

$stmt->execute();



?>