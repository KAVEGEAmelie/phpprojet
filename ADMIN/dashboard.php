<?php
include '../config.php';
session_start();

// Vérifier si l'administrateur est connecté
if (!isset($_SESSION['admin_authenticated'])) {
    header("Location: ../ADMIN/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Tableau de bord </h1>
    <?php
    // Afficher le message de confirmation
    if (isset($_GET['message']) && $_GET['message'] === 'success') {
        echo "<script>alert('Vous êtes maintenant connecté.');</script>";
    }
    ?>
    <!-- Le reste du contenu du tableau de bord ici -->
</body>
</html>
