<?php
        include("./checkSession.php");
?>
        <h2>Faites votre recherche</h2>

        <!-- *** FORMULAIRE D'INSERTION *** -->
        <form action="./filmRechercherTraitement.php" method="post" class="form-example">
            <div class="form-example nope">
                <input type="text" name="termeRecherche" id="termeRecherche" placeholder="..."/>
                <input type="submit" value="Rechercher"/>
            </div>
        </form>
        <div class="button-container">
            <button type="submit"><a href="./front-page.php">Retour à l'accueil</a></button>
        </div>
    </body>
</html>