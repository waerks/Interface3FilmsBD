<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://jsuites.net/v4/jsuites.js"></script>
    <link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />
    <title>Recherche de films</title>
</head>
<body>

    <?php
        if(session_id() === ""){
            session_start();
        }
    ?>

    <!-- *** MENU *** -->
    <nav>
        <a href="./front-page.php">Accueil</a>
        <a href="./filmInserer.php">Insérer un film</a>
        <a href="./filmRechercher.php">Rechercher un film</a>
        <a href="./filmRechercherAjax.php">Rechercher Ajax</a>
        <a href="./inscription.php">Inscription</a>
        <a href="./logout.php">Déconnexion</a>
        <a  href="./viderPanier.php">Vider panier</a>
        <p id="divPanier">
            <a href="./page-panier.php">🛒 </a>
            <span>  
            <?php

                if(isset($_SESSION['quantiteTotale'])){
                    echo $_SESSION['quantiteTotale'];
                } else {
                    echo 'Panier vide';
                }

            ?>
            </span>
        </p>
    </nav>