<?php
        include("./checkSession.php");
?>
        <h2>Entrer les données du film</h2>

        <!-- *** FORMULAIRE D'INSERTION *** -->
        <form action="./filmInsererTraitement.php" method="POST" class="form-example" enctype="multipart/form-data">
            <div class="form-example">
                <label for="titre">Titre:</label>
                <input type="text" name="titre" id="titre"/>
            </div>
            <div class="form-example">
                <label for="description">Description:</label>
                <textarea name="description" id="description"></textarea>
            </div>
            <div class="form-example">
                <label for="duree">Durée:</label>
                <input type="number" name="duree" id="duree"/>
            </div>
            <div class="form-example">
                <label for="image">Image:</label>
                <input type="file" name="image" id="image"/>
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