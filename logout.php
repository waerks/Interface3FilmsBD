<?php
    session_start();
    include("./nav.php");
    session_destroy();
?>
<h2 style="text-align: center;">Vous allez nous manquer :(</h2>

<div class="button-container">
        <button type="submit"><a href="./connexion.php">Se connecter</a></button>
</div>
</body>
</html>