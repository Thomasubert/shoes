<?php

var_dump($_POST);
$host       = 'localhost'; 
$dbname     = 'coursphp';
$port       = '3308'; 
$login      = 'root'; 
$password   = ''; 

try {
   
    $bdd = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8;port='.$port, $login, $password);
}
catch (Exception $e) {
    
    die('Erreur : ' . $e->getMessage());
}


$marqueValide = ['fila', 'nike', 'adidas', 'jordan'];

if( !in_array($_POST['marque'], $marqueValide) ) {
    echo "Le genre n'est pas valide.";
}

else {
    $marque = $_POST['marque'];
}


if (empty($_POST['modele'])) {
    echo "Le modele n'a pas un format valide.";
}

else {
    $modele = $_POST['modele'];
}

if (empty($_POST['quantite'])) {
    echo "Attention, la quantité ne peut pas être vide.";
}

else if( strlen($_POST['quantite']) > 6) {
    echo "Attention, la quantité ne doit pas dépasser 6 chiffres.";
}
else {
    
    $quantite = $_POST['quantite'];
}


$styleValide = ['mariage', 'ville', 'sportswear'];

if (empty($_POST['style'])) {
    $style = null;
}

elseif( !in_array($_POST['style'], $styleValide) ) {
    echo "Le style n'est pas valide.";
}

else {
    $style = $_POST['style'];
}


if (empty($_POST['prix'])) {
    $prix = null;
}

elseif (intval($_POST['prix']) <= 0) {
    echo "Le prix n'a pas un format valide.";
}

else {
    $prix = $_POST['prix'];
}



if (empty($_POST['taille'])) {
    $taille = null;
}

elseif (intval($_POST['taille']) <= 0) {
    echo "La taille n'a pas un format valide.";
}

else {
    $taille = $_POST['taille'];
}




if (empty($_POST['fermeture'])) {
    $fermeture = null;
}

else {
    $fermeture = $_POST['fermeture'];
}


if (empty($marque) || empty($modele) || empty($quantite) ) {
    echo "Attention, le titre, la date de sortie et le réalisateur sont obligatoires !";
}
else {
    // VERSION 1 : J'échappe mes données à la main et je remplis les $fields et $values selon si 
    // le champ a été rempli par l'utilisateur
    /* $fields = "titre, date_de_sortie, realisateur";
    $values = '"'. htmlspecialchars($titre) . '", "' . htmlspecialchars($dateDeSortie) . '", "' . htmlspecialchars($realisateur) . '"';
    if ($genre) { 
        $fields .= ", genre";
        $values .= ', "' . htmlspecialchars($genre) . '"';
    }
    if ($duree) { 
        $fields .= ", duree";
        $values .= ', "' . htmlspecialchars($duree) . '"';
    }
    if ($note) { 
        $fields .= ", note";
        $values .= ', "' . htmlspecialchars($note) . '"';
    }
    if ($acteurPrincipal) { 
        $fields .= ", acteur_principal";
        $values .= ', "' . htmlspecialchars($acteurPrincipal) . '"';
    }
    $req = 'INSERT INTO films('.$fields.') VALUES ('.$values.')';
    $bdd->query($req); */
    // VERSION 2 : On utilise un prepare/execute pour échapper les variables.
    // On utilise nos variables créées plutôt que les $_POST car 1/ elles ont passé les validations ci-dessus
    // et 2/ si elles n'ont pas été renseignées par l'utilisateur... elles sont égales à null !
    $req = "INSERT INTO chaussures(marque, modele, quantite, style, prix, taille, fermeture)
            VALUES(:marque, :modele, :quantite, :style, :prix, :taille, :fermeture)";
    $res = $bdd->prepare($req);
    $res->execute([
        'marque' => $marque,
        'modele' => $modele,
        'quantite' => $quantite,
        'style' => $style ,
        'prix' => $prix,
        'taille' => $taille,
        'fermeture' => $fermeture
    ]);
}






