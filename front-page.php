<?php

include("./checkSession.php");

        // 1. Connecter à la BD
        include ("./db/config.php");
        try {
            // Essayer de se connecter
            $cnx = new PDO(DSN, USERNAME, PASSWORD);
        } catch (Exception $e) {
            // Problème de connexion
            echo '<h2>Problème de connexion !</h2>';
            die();
        }

        // 2. Créer la requête
        $sql = "SELECT * FROM film ORDER BY id DESC LIMIT 5";

        // 3. Préparer la requête
        $stmt = $cnx->prepare($sql);

        // 4. Lancer la requête
        $stmt->execute();

        // 5. Obtenir le résultat et les mettre dans un array
        $arrayFilms = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // 6. Afficher les données
        // var_dump($arrayFilms);

        echo '<h1 style="text-align: center;">Bonjour '. $_SESSION['nomUtilisateur'] .'</h1>';
        echo '<div class="contain-card">';
        foreach($arrayFilms as $film){
            echo '<div class="card">';
            echo '<img src="uploads/' . $film['image'] . '" alt="Image" style="width:100%">';
            echo '<div class="container">';
                echo '<h4>';
                    echo '<b>' . $film['titre'] . '</b>';
                echo '</h4>';
                echo '<p><span style="font-weight: bold;">Durée :<br></span> ' . $film['duree'] . ' minutes</p>';
                echo '<p><span style="font-weight: bold;">Description :<br></span> ' . $film['description'] . '</p>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    ?>
</body>
</html>