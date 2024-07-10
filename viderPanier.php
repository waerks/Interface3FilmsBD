<?php

session_start();

unset($_SESSION['panier']);
unset($_SESSION['quantiteTotale']);

header("location: ./front-page.php");