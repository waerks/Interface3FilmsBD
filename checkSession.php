<?php

    include("./nav.php");

    if(empty($_SESSION['nomUtilisateur'])){
        header('location: ./connexion.php');
    }