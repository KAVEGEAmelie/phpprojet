<?php
include 'config.php';
include("db.php");

// Démarrer la session
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Vérifier si l'utilisateur est déjà connecté, le rediriger vers la page d'accueil
if (isset($_SESSION['nom_utilisateur'])) {
    header("Location: dashboard.php");
    exit();
}

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les informations d'identification du formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérifier les informations d'identification dans la base de données
    $stmt = $conn->prepare("SELECT mot_de_passe FROM utilisateurs WHERE nom_utilisateur = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($mot_de_passe_hash);
    $stmt->fetch();

    if (password_verify($password, $mot_de_passe_hash)) {
        // Authentification réussie, stocker le nom d'utilisateur dans la session
        $_SESSION['nom_utilisateur'] = $username;
        header("Location: dashboard.php");
        exit();  // Assurez-vous d'ajouter cette ligne pour arrêter l'exécution du script après la redirection
    } else {
        // Authentification échouée, afficher un message d'erreur
        $erreur_message = "Identifiants incorrects. Veuillez réessayer.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - IAI-TOGO Concours</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url("img/galerie12.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border: 2px solid #ddd;
            border-radius: 5px;
            max-height: 500px;
            overflow-y: auto; 
            max-width: 400px; /* Reduit la largeur maximale du formulaire */
            width: 100%; /* Pour s'assurer qu'il s'adapte à la largeur de l'écran */
        }

        h2 {
            text-align: center;
        }

        form {
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        button {
            width: 100%;
        }

        p {
            text-align: center;
            margin-top: 15px;
        }

        .alert-danger {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<body>
    <div class="container">
        <h2>Connexion</h2>
        <?php if (isset($erreur_message)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $erreur_message; ?>
            </div>
        <?php endif; ?>
        <form method="POST" action="login.php">
            <div class="form-group">
                <label for="username">Nom d'utilisateur :</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" class="form-control" id="password" name="password" minlength="8" required>
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
        <p>Vous n'avez pas de compte ? <a href="register.php">Créer un compte</a></p>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>