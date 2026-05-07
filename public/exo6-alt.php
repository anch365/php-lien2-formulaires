<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // Traitement des données + affichage du résultat

    // Récupérer les données
    $genre = $_POST['genre'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $monfichier = $_POST['monfichier'];

    // Affichage des données
    echo "$genre $nom $prenom <br> <br> $monfichier";
} else {
    // Affichage du formulaire
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <form action="./exo6-alt.php" method="POST">
            <div>
                <select name="genre" id="genre">
                    <option value="Mr">Mr</option>
                    <option value="Mme">Mme</option>
                </select><br> <br>
            </div>

            <div><label for="prenom">Prénom :</label>
                <input type="text" placeholder="Ex: Anchoura" id="prenom" name="prenom" minlength="3" maxlength="50" required> <br> <br>
            </div>
            <div>
                <label for="nom">Nom :</label>
                <input type="text" placeholder="Ex: Abdou" id="nom" name="nom" minlength="3" maxlength="50" required> <br> <br>
            </div>

            <!-- Exercice 7 : ADD un champs d'envoi de fichier -->
            <input type="file" name="monfichier" id="monfichier"><br> <br>
            <button type="submit">Confirmer les données</button>

        </form>
    </body>

    </html>

<?php
}

?>