<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 1</title>
</head>
<body>
    <form action="../process/user.php" method="GET">
        
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
            <label for="prenom">Nom :</label>
            <input type="text" placeholder="Ex: Anchoura" id="prenom" name="prenom" minlength="3" maxlength="50" required>
        </div>
        <div>
            <label for="nom">Prénom :</label>
            <input type="text" placeholder="Ex: Abdou" id="nom" name="nom" minlength="3" maxlength="50" required>
        </div>

        <button type="submit">Créer le client</button>
    </form>
</body>
</html>