<?php
        include("./checkSession.php");
?>
<h2 style="text-align: center;">Le film inséré</h2>
<?php
        // 1. Obtenir les données du formulaire
        $titre = $_POST['titre'];
        $description = $_POST['description'];
        $duree =  $_POST['duree'];
        $image = $_FILES['image'];

        // // Upload du fichier
        // 1. Créer un nom unique pour le fichier
            $dossier = "./uploads";
            $nomFichier = uniqid() . date("h-i-s") . $_FILES['image']['name'];

            $cheminComplet = $dossier . "/" . $nomFichier;

        // // 2. Déplacer le fichier temporaire et lui donner le nom complet
            move_uploaded_file($_FILES['image']['tmp_name'], $cheminComplet);

            // echo $cheminComplet;

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

        // 3. Créer une requête du type INSERT
        $sql = "INSERT INTO film (id, titre, description, duree, image) VALUES (null, :titre, :description, :duree, :image)";

        // 4. Préparer la requête
        $stmt = $cnx->prepare($sql);

        $stmt->bindValue(":titre", $titre);
        $stmt->bindValue(":description", $description);
        $stmt->bindValue(":duree", $duree);
        $stmt->bindValue(":image", $nomFichier);
        
        // 5. Lancer la requête
        $stmt->execute();
    ?>

    <div class="card">
        <img src="<?php echo $cheminComplet; ?>" alt="Image" style="width:100%">
        <div class="container">
            <h4>
                <b><?php echo $titre; ?></b>
            </h4>
            <p>Durée : <?php echo $duree; ?> minutes</p>
            <p>Description : <br><?php echo $description; ?></p>
        </div>
    </div>
    <div class="button-container">
            <button type="submit"><a href="./front-page.php">Retour à l'accueil</a></button>
    </div>
</body>
</html>