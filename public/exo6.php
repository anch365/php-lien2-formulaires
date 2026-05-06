<?php

// Première étape de sécurité : verifier la méthode
if ($_SERVER['REQUEST_METHOD'] !== "GET") {
    echo "<p>Mauvaise méthode</p>";
    exit();
}

// Deuxieme étape de sécurité : verifier que la colonne voulue existe bien
if (!isset($_GET["genre"]) || !isset($_GET["nom"]) || !isset($_GET["prenom"])) {
    echo "<p>Un des paramètres est manquant</p>";
    exit();
}

// Troisième étape de sécurité : verifier que la colonne voulue n'est pas vide
if (empty($_GET["genre"]) || empty($_GET["nom"]) || empty($_GET["prenom"])) {
    echo "<p>Un des paramètres est vide</p>";
    exit();
}

// Quatrième étape de sécurité : on empêche l'utilisation de balise (par exemple script)
$genre = htmlspecialchars(strip_tags(trim($_GET["genre"])));
$nom = htmlspecialchars(strip_tags(trim($_GET["nom"])));
$prenom = htmlspecialchars(strip_tags(trim($_GET["prenom"])));


// Pour tester que la quatrième étape fonctionne (attention c'est temporaire, on l'enlève dès qu'on a finit de tester car c'est une page backend donc pas d'affichage) 
// echo $prenom;
// echo $nom;
// echo $tel;

// Cinquième étape de sécurité : verifier les règles métiers (par exemple si on s'attends à recevoir un nombre on vérifier qu'on a bien un nombre)
// Par exemple ici on test que le nom reçu sera bien un nombre une chaine de caractère comprise entre 3 et 50: 

if (strlen($nom) < 3 || strlen($nom) > 50) {
    echo "<p>Le nom doit avoir entre 3 et 50 caractères</p>";
    exit();
}
if (strlen($prenom) < 3 || strlen($prenom) > 50) {
    echo "<p>Mauvaise méthode</p>";
    exit();
}
// UNE FOIS TOUTE LE SECURITE EFFECTUE
// On fait ce qu'on veut faire avec les données reçu, par exemple les mettre en base de données, en cookie ou en session ou les afficher
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 5</title>
</head>

<body>

        <?php if (isset($_GET["error"])) {
            $error = htmlspecialchars(trim($_GET["error"]));
            switch ($error) {
                case 'bad-method': ?>
                    <p class="error">Méthode non autorisé</p>
                <?php break;

                case 'column-missing': ?>
                    <p class="error">Une valeur est manquante</p>
                <?php break;

                case 'column-empty': ?>
                    <p class="error">Les valeurs ne peuvent pas être vide</p>
                <?php break;

                case 'prenom-length': ?>
                    <p class="error">Le prénom doit avoir entre 3 et 50 caractères</p>
                <?php break;

                case 'nom-length': ?>
                    <p class="error">Le nom doit avoir entre 3 et 50 caractères</p>
                <?php break;

                default: ?>
                    <p class="error">Erreur inconnue</p>
        <?php break;
            }
        } ?>

        <div>
            <p>
                Civilité : <?= $genre ?> <br>
                Nom : <?= $nom ?> <br>
                Prénom : <?= $prenom ?>
            </p>
        </div>

</body>

</html>