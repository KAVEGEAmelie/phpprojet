<?php
// Paramètres de connexion à la base de données
$servername = "localhost";  
$username = "root";  
$password = "";
$dbname = "iai_togo_db";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Nom d'utilisateur et mot de passe à insérer
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

// Fermeture de la connexion à la base de données
$conn->close();
?>
