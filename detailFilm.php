<?php
include "./checkSession.php";
 
    // obtenir les données du formulaire
    // (dans ce cas, l'id du film)
    $idFilm = $_GET['idFilm'];
 
    // Connecter à la BD (PDO)
    include "./db/config.php";
 
    try {
        // essayer de connecter
        $cnx = new PDO(DSN, USERNAME, PASSWORD);
    } catch (Exception $e) {
        // problème de connexion!!
        // instructions à suivre en cas de
        // problème de connexion
        print("<h3>Un problème est survenu</h3>");
        print("<img src='./image.jpg'>");
        print("<a href='./accueil.php'>Accueil</a>");
 
        // var_dump ($e->getMessage());
        die();
    }
 
    // Requête pour obtenir la moyenne de tous les utilisateurs
    $sql = "SELECT *, AVG(valeur) AS moyenne FROM film LEFT JOIN note ON film.id = note.idFilm WHERE film.id = :id";
   
    $stmt = $cnx->prepare($sql);
    $stmt->bindValue(":id", $idFilm);
   
    $stmt->execute();
   
    $filmMoyenne = $stmt->fetch(PDO::FETCH_ASSOC); // le prémier (et unique) résultat de la requête
    // var_dump($filmMoyenne);
    // die();
    // FIN REQUETE MOYENNE
 
    // START REQUETE note.idUtilisateur session
    // Requête pour obtenir la note du film pour cet utilisateur (session)
    $idUtilisateur = $_SESSION['idUtilisateur'];
 
    $sql = "SELECT * FROM note WHERE note.idUtilisateur = :idUtilisateur AND note.idFilm = :idFilm";
 
    $stmt = $cnx->prepare($sql);
    $stmt->bindValue(":idUtilisateur", $idUtilisateur);
    $stmt->bindValue(":idFilm", $idFilm);
    $stmt->execute();
    $filmUtilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
    // FIN REQUETE note utilisateur session
   
 
    echo '<h2 id="idfilm"> '. $filmMoyenne['titre'] .'</h2>';
    echo '<div class="contain-card">';
        echo '<div class="card">';
        echo '<img src="uploads/' . $filmMoyenne['image'] . '" alt="Image" style="width:100%">';
        echo '<div class="container">';
            echo '<h4>';
                echo '<b>' . $filmMoyenne['titre'] . '</b>';
            echo '</h4>';
            echo '<p><span style="font-weight: bold;">Durée : </span>' . $filmMoyenne['duree'] . ' minutes</p>';
            echo '<p><span style="font-weight: bold;">Description : </span><br>' . $filmMoyenne['description'] . '</p>';
            echo '<p style="font-weight: bold;"><span >Note des utilisateurs : </span><br><div data-moyenne="'. $filmMoyenne['moyenne'] .'" id="divNote"></div></p>';
            echo '<p style="font-weight: bold;"><span >Votre note : </span><br><div data-idfilm ="'.$idFilm .'" data-valeur="'. ($filmUtilisateur ? $filmUtilisateur['valeur'] : "") .'" id="divNoteUtilisateur"></div></p>';
            // contrôle du panier
            echo '<select id="quantite" data-idfilm ="'.$idFilm .'">';
                for($i = 0; $i <= 50; $i++){
                    echo '<option value="'. $i .'">'. $i .'</option>';
                }
            echo '</select>';
            echo '<button id="ajouterPanier">Ajouter au panier</button>';
            echo '<button id="viderPanier">Vider le panier</button>';
        echo '</div>';
        echo '</div>';
    echo '</div>';
    ?>
 
<script src="./js/note.js"></script>
<script src="./js/panier.js"></script>