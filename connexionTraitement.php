<?php
        include("./checkSession.php");
?>

<?php
// DEMARRER LA SESSION


    // 1. Obtenir le terme de la recherche
    // $nom = $_POST['nom'];
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

    // 3. Créer une requête pour chercher l'utilisateur qui un email dans le DB
    // // Vérifier si l'utilisateur existe déjà dans la DB
    $sql = "SELECT * FROM utilisateur WHERE email = :email";
    $stmt = $cnx->prepare($sql);

    $stmt->bindValue(":email", $email);

    $stmt->execute();

    $arrayUtilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 4. Si l'utilisateur n'existe pas, obtenir le mot de passe et le comparer
    // // L'utilisateur n'existe pas
    if(empty($arrayUtilisateurs)){
        echo '<h2 style="text-align: center;">Un petit problème.</h2>';
        echo '<div class="button-container"><p class="die">/!\ Cet utilisateur n\'existe pas. /!\</p></div>';
        echo '<div class="button-container"><button type="submit"><a href="./inscription.php">Aller à l\'inscription</a></button></div>';
        die();
    }

    $passwordHashDB = $arrayUtilisateurs[0]['password'];
    $nomUtilisateur = $arrayUtilisateurs[0]['nom'];
    $idUtilisateur = $arrayUtilisateurs[0]['id'];

    // // Password incorrect
    if(password_verify($password, $passwordHashDB) == false) {
        echo '<h2 style="text-align: center;">Un petit problème.</h2>';
        echo '<div class="button-container"><p class="die">/!\ Le mot de passe est incorrect. /!\</p></div>';
        echo '<div class="button-container"><button type="submit"><a href="./connexion.php">Retour à la connexion</a></button></div>';
        die();
    } else {
        // Tout est bon
        $_SESSION['nomUtilisateur'] = $nomUtilisateur;
        $_SESSION['idUtilisateur'] = $idUtilisateur;
        header('location: ./front-page.php');
    }

?>
</body>
</html>