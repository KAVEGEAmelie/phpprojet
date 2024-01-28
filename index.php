<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concours IAI-TOGO</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            overflow: hidden;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            transition: background-image 1s ease-in-out;
            min-height: 100vh; 
        }

        /* En-tête avec le logo, le titre et les liens */
        #header {
            background-color: transparent; /* Couleur de fond transparente */
            border-bottom: 2px solid #ccc; /* Bordure en bas */
            padding: 5px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Logo de l'école */
        #logo {
            width: 80px; /* Ajustez la taille du logo selon vos besoins */
        }

        /* Titre de la page */
        #title {
            color: #fff; /* Couleur du texte pour le titre dans la bande */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Ombre textuelle */
            font-size: 40px; 
        }

        /* Liens vers d'autres pages */
        #links {
            display: flex;
        }

        /* Styles des liens */
        #links a {
            color: #007bff; /* Couleur des boutons */
            text-decoration: none;
            margin-right: 15px; /* Espace entre les liens */
            transition: color 0.3s ease; /* Transition de couleur pour le survol */
            font-size: 20px; /* Taille du texte */
            font-weight: bold; /* Texte en gras */
        }

        /* Styles des liens au survol */
        #links a:hover {
            color: #0056b3; /* Couleur plus foncée au survol */
            text-decoration: underline;
        }

        /* Informations sur le concours */
        #info {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            color: #fff;
        }

        /* Style du texte à l'intérieur des informations */
        #info span {
            color: #007bff; /* Couleur des boutons */
            font-weight: bold; /* Texte en gras */
        }

        /* Conteneur pour les boutons de lien */
        .btn-container {
            position: absolute;
            bottom: 60px; /* Réduction de l'espace en bas du bouton container */
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
        }

        /* Styles des boutons */
        .btn {
            margin: 0 10px;
            border-radius: 15px; /* Bords plus arrondis */
            transition: background-color 0.3s ease, color 0.3s ease; /* Transitions pour le survol */
        }

        /* Styles des boutons au survol */
        .btn:hover {
            background-color: #0056b3; /* Couleur de fond plus foncée au survol */
            color: #fff; /* Couleur du texte plus claire au survol */
        }

        /* Pied de page */
        #footer {
            background-color: #333;
            color: white;
            padding: 1px;
            text-align: center;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Bande en haut avec logo, titre, et liens -->
    <div id="header">
       
        <img src="img/lo.jpg" alt="IAI-TOGO Logo" id="logo">
        <h1 id="title">IAI-TOGO Concours</h1>
        <div id="links">
            <a href="about.php">A propos</a>
            <a href="contact.php">Contact</a>
        </div>
    </div>

    <!-- Informations sur le concours -->
    <div id="info">
        <!-- Message de bienvenue avec un span stylisé -->
        <h2>Bienvenue au concours <span>IAI-TOGO!</span> Nous sommes ravis de vous accueillir dans cette compétition exceptionnelle. Découvrez vos opportunités, défiez-vous et faites partie de l'excellence. Bonne chance!</h2>
    </div>

    <!-- Boutons de lien vers d'autres pages -->
    <div class="btn-container">
        <!-- Bouton pour créer un compte -->
        <a href="register.php" class="btn btn-info">Créer un compte</a>
        <!-- Bouton pour se connecter -->
        <a href="login.php" class="btn btn-primary">Se connecter</a>
    </div>

    <!-- Pied de page -->
    <div id="footer">
        <!-- Texte de droits d'auteur -->
        <p>&copy; 2024 IAI-TOGO. Tous droits réservés.</p>
    </div>

    <!-- Inclusion des scripts Bootstrap et jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Script pour changer l'image de fond à intervalles réguliers -->
    <script>
        // Tableau contenant les chemins des images de fond
        var backgroundImages = ["img/l1.JPG", "img/l2.JPG", "img/l3.JPG"];
        var currentIndex = 0;

        // Fonction pour changer l'image de fond
        function changeBackgroundImage() {
            document.body.style.backgroundImage = "url('" + backgroundImages[currentIndex] + "')";
            currentIndex = (currentIndex + 1) % backgroundImages.length;
        }

        // Appeler la fonction pour changer l'image de fond toutes les 2 secondes
        setInterval(changeBackgroundImage, 2000);
    </script>
</body>
</html>
