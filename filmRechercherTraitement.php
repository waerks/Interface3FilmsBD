<?php
        include("./checkSession.php");
?>
<h2 style="text-align: center;">Les résultats de recherche</h2>
<?php
        // 1. Obtenir le terme de la recherche
        $termeRecherche = $_POST['termeRecherche'];

        // 2. Connecter à la BD (PDO)
        include ("./db/config.php");
        try {
            // Essayer de se connecter
            $cnx = new PDO(DSN, USERNAME, PASSWORD);
        } catch (Exception $e) {
            // Problème de connexion
            echo '<h2>Problème de connexion !</h2>';
            die();
        }

        // 3. Créer une requête
        $sql = "SELECT * FROM film WHERE titre LIKE :termeRecherche";

        // 4. Préparer la requête
        $stmt = $cnx->prepare($sql);
        
        // 5. Donner des valeurs aux paramètres (placeholders)
        $stmt->bindValue(":termeRecherche","%". $termeRecherche ."%", PDO::PARAM_STR);

        // 6. Exécuter la requête
        $stmt->execute();
        
        // 7. Obtenir les données
        $arrayFilms = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // 8. Afficher les données
        echo '<div class="contain-card">';
        foreach($arrayFilms as $film){
            echo '<div class="card">';
            echo '<img src="uploads/' . $film['image'] . '" alt="Image" style="width:100%">';
            echo '<div class="container">';
                echo '<h4>';
                    echo '<b>' . $film['titre'] . '</b>';
                echo '</h4>';
                echo '<p><span style="font-weight: bold;">Durée : </span>' . $film['duree'] . ' minutes</p>';
                echo '<p><span style="font-weight: bold;">Description : </span><br>' . $film['description'] . '</p>';
                echo '<p><span style="font-weight: bold;">Note des utilisateurs : </span><br>10/10</p>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    ?>
        <div class="button-container">
            <button type="submit"><a href="./filmRechercher.php">Refaire une recherche</a></button>
        </div>
</body>
</html>