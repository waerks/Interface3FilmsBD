
<h2 style="text-align: center;">Merci pour votre inscription !</h2>
<?php
        // 1. Obtenir le terme de la recherche
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        // $image = $_FILES['image'];

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
        // // Vérifier si l'utilisateur existe déjà dans la DB
        $sql = "SELECT * FROM utilisateur WHERE email = :email";
        $stmt = $cnx->prepare($sql);

        $stmt->bindValue(":email", $email);

        $stmt->execute();

        $arraUtilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // // SI l'eamil est déjà pris
        if(!empty($arraUtilisateurs)){
            echo '<div class="button-container"><p class="die">/!\ L\'adresse mail est déjà prise /!\</p></div>';
            echo '<div class="button-container"><button type="submit"><a href="./inscription.php">Retour à l\'inscription</a></button></div>';
            die();
        }

        // // Envoyer nouvel utilisateur dans la DB
        $sql = "INSERT INTO utilisateur (id, nom, email, password) VALUES (null, :nom, :email, :password)";

        // 4. Préparer la requête
        $stmt = $cnx->prepare($sql);
        
        // 5. Donner des valeurs aux paramètres (placeholders)
        $stmt->bindValue(":nom", $nom);
        $stmt->bindValue(":email", $email);

        // // Crypter le password
        $passwordHash = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);
        $stmt->bindValue(":password", $passwordHash);

        // 6. Exécuter la requête
        $stmt->execute();

        // 7. Vérifier si l'inscription été faite correctement

    ?>
        <div class="button-container">
            <button type="submit"><a href="./front-page.php">Retour à l'accueil</a></button>
        </div>
</body>
</html>