<?php 

// Première étape de sécurité : verifier la méthode
if ($_SERVER['REQUEST_METHOD'] !== "GET") {
    header("Location: ./process/user.php?error=bad-method");
    exit();
}

// Deuxieme étape de sécurité : verifier que la colonne voulue existe bien
if (!isset($_GET["nom"]) || !isset($_GET["prenom"])) {
     header("Location: ./process/user.php?error=bad-method");
    exit();
}

// Troisième étape de sécurité : verifier que la colonne voulue n'est pas vide
if (empty($_GET["nom"]) || empty($_GET["prenom"])) {
     header("Location: ./process/user.php?error=bad-method");
    exit();
}

// Quatrième étape de sécurité : on empêche l'utilisation de balise (par exemple script)
$nom = htmlspecialchars(strip_tags(trim($_GET["nom"])));
$prenom = htmlspecialchars(strip_tags(trim($_GET["prenom"])));


// Pour tester que la quatrième étape fonctionne (attention c'est temporaire, on l'enlève dès qu'on a finit de tester car c'est une page backend donc pas d'affichage) 
// echo $prenom;
// echo $nom;
// echo $tel;

// Cinquième étape de sécurité : verifier les règles métiers (par exemple si on s'attends à recevoir un nombre on vérifier qu'on a bien un nombre)
// Par exemple ici on test que le nom reçu sera bien un nombre une chaine de caractère comprise entre 3 et 50: 

if (strlen($nom)< 3 || strlen($nom)> 50) {
  header("Location: ./process/user.php?error=bad-method");
    exit();
}
if (strlen($prenom)< 3 || strlen($prenom)> 50) {
  header("Location: ./process/user.php?error=bad-method");
    exit();
}
// UNE FOIS TOUTE LE SECURITE EFFECTUE
// On fait ce qu'on veut faire avec les données reçu, par exemple les mettre en base de données, en cookie ou en session ou les afficher
?>
