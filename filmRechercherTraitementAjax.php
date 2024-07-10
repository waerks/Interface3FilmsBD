<?php
include "./db/config.php";

header('Content-Type: application/json'); // S'assurer que la réponse est de type JSON

try {
    $cnx = new PDO(DSN, USERNAME, PASSWORD);
} catch (Exception $e) {
    echo json_encode(['error' => 'Problème de connexion !']);
    die();
}

$termeRecherche = $_POST['termeRecherche'];
$sql = "SELECT * FROM film WHERE titre LIKE :termeRecherche";
$stmt = $cnx->prepare($sql);
$stmt->bindValue(":termeRecherche", "%" . $termeRecherche . "%", PDO::PARAM_STR);
$stmt->execute();
$arrayFilms = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($arrayFilms);