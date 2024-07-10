<?php
    session_start();

// SI le panier n'existe pas, on doit le crée et le stocker dans la session
if(empty ($_SESSION['panier'])){
    $panier = [];
    $_SESSION['panier'] = $panier;
} else {
    // echo 'Le panier existe';
}

$idFilm = $_POST['idFilm'];
$quantite = $_POST['quantite'];

$panier = $_SESSION['panier'];

if(isset($panier[$idFilm])){
    $panier[$idFilm] += (int)$quantite;
} else {
    $panier[$idFilm] = $quantite;
}

$_SESSION['panier'] = $panier;

$quantiteTotale = 0;
foreach($panier as $quantite){
    $quantiteTotale += $quantite;
}

$_SESSION['quantiteTotale'] = $quantiteTotale;

// echo $quantiteTotale;
$reponse = [
    "message" => "Produit rajouté au panier",
    "quantiteTotale" => $quantiteTotale
];

echo (json_encode($reponse));


// echo 'Voici la session: ';
// var_dump($_SESSION);

// echo 'Voici la variable panier: ';
// var_dump($panier);

// var_dump($panier);