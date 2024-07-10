<?php
include("./checkSession.php");

include ("./db/config.php");
try {
    // Essayer de se connecter
    $cnx = new PDO(DSN, USERNAME, PASSWORD);
} catch (Exception $e) {
    // Problème de connexion
    echo '<h2>Problème de connexion !</h2>';
    die();
}

if(empty($_SESSION['panier'])){
    echo '<h2>Réacpitulatif de la commande</h2>';
    die();
}

$ids = array_keys($_SESSION['panier']);


$stringIds = implode(",", $ids);

$sql = "SELECT * FROM film WHERE film.id IN (". $stringIds .")";
$stmt = $cnx->prepare($sql);
$stmt->execute();

$arrayPanier = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<h2>Réacpitulatif de la commande</h2>
<div class="containerP">

<?php
    $panier = $_SESSION['panier'];

    foreach($arrayPanier as $produit){
        echo '<div>';
            echo '<div>';
                echo '<img src="uploads/'. $produit['image'] .'" alt="">';
            echo '</div>';
            echo '<div>';
                echo '<h4>'. $produit['titre'] .'</h4>';
                echo '<p>Description : <a href="./detailFilm.php?idFilm='. $produit['id'] .'"> Voir l\'article</a></p>';
                echo '<p>Duree : <span>'. $produit['duree'] .'</span> minutes</p>';
                echo '<p>Quantité : <span>'. $panier[$produit['id']] .'</span></p>';
            echo '</div>';
        echo '</div>';
    }
?>
</div>
</body>
</html>