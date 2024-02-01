<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iai_togo_db";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}


/*
// Nom d'utilisateur et mot de passe à insérer (à faire une seule fois)
$nom_utilisateur = 'admin';
$mot_de_passe = 'mot_de_passe_admin';

// Hash du mot de passe
$hashed_password = password_hash($mot_de_passe, PASSWORD_DEFAULT);

// Requête pour insérer le nom d'utilisateur et le mot de passe haché dans la table administrateurs
$query = "INSERT INTO administrateurs (nom_utilisateur, mot_de_passe) VALUES (?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $nom_utilisateur, $hashed_password);

// Exécution de la requête
$stmt->execute();

// Fermeture de la déclaration préparée
$stmt->close();
*/

// Vous pouvez laisser le reste de votre code ici...

// Ne fermez pas la connexion à la base de données ici si vous comptez utiliser la connexion dans d'autres fichiers.
// $conn->close();
?>
