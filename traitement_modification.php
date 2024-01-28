<?php
include 'config.php';
include 'utils.php';

// Vérifier la connexion à la base de données
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Vérifier si le formulaire de modification a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Récupération des données du formulaire
    $candidat_id = $conn->real_escape_string($_POST['candidat_id']);
    $nom = $conn->real_escape_string($_POST['nom']);
    $prenom = $conn->real_escape_string($_POST['prenom']);
    // Ajoutez d'autres champs du formulaire ici

    // Vérifier la confirmation
    if (!isset($_POST['confirmation'])) {
        // Rediriger avec un message d'erreur si la confirmation n'est pas cochée
        header("Location: modification_candidature.php?id=$candidat_id&error=confirmation");
        exit();
    }

    // Utiliser une requête préparée pour éviter les injections SQL
    $query = $conn->prepare("UPDATE candidats 
                             SET nom = ?, prenom = ? 
                             WHERE id = ?");
    $query->bind_param("ssi", $nom, $prenom, $candidat_id);

    if ($query->execute()) {
        // Rediriger avec un message de succès
        header("Location: modification_candidature.php?id=$candidat_id&success=true");
        exit();
    } else {
        // Gérer les erreurs de mise à jour dans la base de données
        header("Location: modification_candidature.php?id=$candidat_id&error=database");
        exit();
    }

    // Fermer la requête préparée
    $query->close();
}

// Fermer la connexion à la base de données
$conn->close();
?>
