<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chaussures</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

</head>
<body>

    <form action="controller.php" method="post">
        <label for="marque">Marque</label>
        <select class="form-control" name="marque" id="marque" placeholder="obligatoire" required>
            <option value="fila">Fila</option>
            <option value="nike">Nike</option>
            <option value="adidas">Adidas</option>
            <option value="jordan">Jordan</option>
        </select>

        <label for="modele">Modèle</label>
        <input class="form-control" type="text" name="modele" id="modele" placeholder = "obligatoire" required>

        <label for="quantite">Quantité</label>
        <input class="form-control" type="number" name="quantite" id="quantite" placeholder = "obligatoire" required>

        <label for="style">Style</label>
        <select class="form-control" name="style" id="style" placeholder = "obligatoire" required>
            <option value="mariage">mariage</option>
            <option value="ville">ville</option>
            <option value="sportswear">sportswear</option>
        </select>

        <label for="prix">Prix</label>
        <input class="form-control" type="range" name="prix" id="prix" min="0" max="500">

        <label for="taille">Taille</label>
        <input class="form-control" type="text" name="taille" id="taille">

        <label for="fermeture">Fermeture</label> <br>
        <input type="radio" name="fermeture" id="fermeture">Eclairs <br>
        <input type="radio" name="fermeture" id="fermeture">Lacets <br>
        <input type="radio" name="fermeture" id="fermeture">Scracth <br>

        <button class="btn btn-success" type="submit">Envoyer</button>
    </form>
    
</body>
</html>