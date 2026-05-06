<?php

// Première étape de sécurité : verifier la méthode
if ($_SERVER['REQUEST_METHOD'] !== "POST") {
  header("Location: ../process/user5.php?error=bad-method");
  exit();
}

// Deuxieme étape de sécurité : verifier que la colonne voulue existe bien
if (!isset($_POST["genre"]) || !isset($_POST["nom"]) || !isset($_POST["prenom"]) || !isset($_FILES["monfichier"])) {
  header("Location: ../process/user5.php?error=bad-method");
  exit();
}

// Troisième étape de sécurité : verifier que la colonne voulue n'est pas vide
if (empty($_POST["genre"]) || empty($_POST["nom"]) || empty($_POST["prenom"]) || empty($_FILES["monfichier"])) {
  header("Location: ../process/user5.php?error=bad-method");
  exit();
}

// Quatrième étape de sécurité : on empêche l'utilisation de balise (par exemple script)
$genre = htmlspecialchars(strip_tags(trim($_POST["genre"])));
$nom = htmlspecialchars(strip_tags(trim($_POST["nom"])));
$prenom = htmlspecialchars(strip_tags(trim($_POST["prenom"])));
// $monfichier = htmlspecialchars(strip_tags(trim($_GET["monfichier"])));


// Pour tester que la quatrième étape fonctionne (attention c'est temporaire, on l'enlève dès qu'on a finit de tester car c'est une page backend donc pas d'affichage) 
// echo $prenom;
// echo $nom;
// echo $tel;

// Cinquième étape de sécurité : verifier les règles métiers (par exemple si on s'attends à recevoir un nombre on vérifier qu'on a bien un nombre)
// Par exemple ici on test que le nom reçu sera bien un nombre une chaine de caractère comprise entre 3 et 50: 

// if (strlen($nom) < 3 || strlen($nom) > 50) {
//   header("Location: ../process/user5.php?error=bad-method");
//   exit();
// }
// if (strlen($prenom) < 3 || strlen($prenom) > 50) {
//   header("Location: ../process/user5.php?error=bad-method");
//   exit();
// }
// UNE FOIS TOUTE LE SECURITE EFFECTUE
// On fait ce qu'on veut faire avec les données reçu, par exemple les mettre en base de données, en cookie ou en session ou les afficher

$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["monfichier"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

$check = getimagesize($_FILES["monfichier"]["tmp_name"]);
if ($check !== false) {
  echo "File is an image - " . $check["mime"] . ".";
  $uploadOk = true;
} else {
  echo "File is not an image.";
  $uploadOk = false;
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "<br> <br> Sorry, file already exists.";
  $uploadOk = false;
}

// Check file size
if ($_FILES["monfichier"]["size"] > 1000000) {
  echo "<br> <br> Sorry, your file is too large.";
  $uploadOk = false;
}

// Allow certain file formats
if (
  $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif"
) {
  echo "<br> <br> Sorry, only JPG, JPEG, PNG & GIF files are allowed. <br> <br>";
  $uploadOk = false;
}

// Check if $uploadOk is set to 0 by an error
if (!$uploadOk) {
  echo "<br> <br> Sorry, your file was not uploaded. <br> <br>";
  // if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["monfichier"]["tmp_name"], $target_file)) {
    echo "<br> <br> The file " . htmlspecialchars(basename($_FILES["monfichier"]["name"])) . " has been uploaded.";
  } else {
    echo "<br> <br> Sorry, there was an error uploading your file. <br> <br>";
  }
}

$genre = $_POST['genre'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
?>

<?= "$genre $nom $prenom"?>

