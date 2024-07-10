
<h2 style="text-align: center;">Inscription</h2>

<form action="./inscriptionTraitement.php" method="post" class="form-example">
    <div class="form-example">
        <label for="image">Votre avatar: </label>
        <input type="file" id="image" name="image">
    </div>
    <div class="form-example">
        <label for="nom">Votre nom: </label>
        <input type="text" id="nom" name="nom">
    </div>
    <div class="form-example">
        <label for="email">Votre email: </label>
        <input type="email" id="email" name="email">
    </div>
    <div class="form-example">
        <label for="password">Choissez un mot de passe: </label>
        <input type="password" id="password" name="password">
    </div>
    <div class="form-example">
        <input type="submit" value="Envoyer"/>
    </div>
</form>
<div class="button-container">
        <button type="submit"><a href="./front-page.php">Retour à l'accueil</a></button>
</div>

</body>
</html>