<?php
        include("./checkSession.php");
?>
        <h2>Faites votre recherche</h2>

        <!-- *** FORMULAIRE D'INSERTION *** -->
        <form class="form-example" id="formHTML">
            <div class="form-example nope">
                <input type="text" name="termeRecherche" id="termeRecherche" placeholder="..."/>
                <!-- <input id="btnRecherche" type="submit" value="Rechercher"/> -->
            </div>
        </form>


        <div class="contain-card">

        </div>

        <div class="button-container">
            <button type="submit"><a href="./front-page.php">Retour à l'accueil</a></button>
        </div>
        <script src="./js/filmRechercherAjax.js"></script>
    </body>
</html>