<?php
include 'config.php';
include("utils.php");


if (isset($_GET['id'])) {
    $candidat_id = $_GET['id'];

    // Requête préparée pour éviter les injections SQL
    $query = "SELECT * FROM candidats WHERE id = ?";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $candidat_id);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $candidat = $result->fetch_assoc();
        
        // Vérifier si le candidat existe
        if (!$candidat) {
            die("Candidat non trouvé");
        }
    } else {
        // Gérer l'erreur de requête
        die("Erreur de requête : " . $stmt->error);
    }
    
    // Fermer la déclaration préparée
    $stmt->close();
} else {
    // Rediriger vers la page principale si l'ID n'est pas spécifié
    header("Location:dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation de la Candidature</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Styles CSS personnalisés -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }

        #candidature-container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        #photo-container {
            text-align: center;
        }

        #photo {
            max-width: 200px;
            height: auto;
            border-radius: 5px;
            margin-top: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn {
            border-radius: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center mb-4">Consultation de la Candidature</h2>
        <div id="candidature-container">
            <!-- Les informations de candidature -->
            <div class="form-group">
                <label for="nom">Nom complet :</label>
                <p id="nom"><?php echo $candidat['nom'] . ' ' . $candidat['prenom']; ?></p>
            </div>
            <div class="form-group">
                <label for="date_naissance">Date de Naissance :</label>
                <p id="date_naissance"><?php echo $candidat['date_naissance']; ?></p>
            </div>
            <div class="form-group">
                <label for="sexe">Sexe :</label>
                <p id="sexe"><?php echo ($candidat['sexe'] == 'M') ? 'Masculin' : 'Féminin'; ?></p>
            </div>
            <div class="form-group">
                <label for="nationalite">Nationalité :</label>
                <p id="nationalite"><?php echo $candidat['nationalite']; ?></p>
            </div>
            <div class="form-group">
                <label for="annee_bac">Année d'obtention du BAC II :</label>
                <p id="annee_bac"><?php echo $candidat['annee_bac']; ?></p>
            </div>
            <div class="form-group">
                <label for="serie_bac">Série BAC :</label>
                <p id="serie_bac"><?php echo $candidat['serie_bac']; ?></p>
            </div>

           

            <!-- Boutons "Modifier candidature" et "Supprimer candidature" -->
            <div class="text-center">
                <a href="modifier_candidature.php?id=<?php echo $candidat['id']; ?>" class="btn btn-primary">Modifier candidature</a>
                <button class="btn btn-danger" data-toggle="modal" data-target="#confirmationModal">Supprimer candidature</button>
            </div>
        </div>
    </div>

    <!-- Modal de confirmation de suppression -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirmation de suppression</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir supprimer cette candidature ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <a href="supprimer_candidature.php?id=<?php echo $candidat['id']; ?>" class="btn btn-danger">Supprimer</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Inclusion des scripts Bootstrap et jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
