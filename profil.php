<?php
session_start();

if (!isset($_SESSION["users"])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION["users"];

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil - MML</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>

<body class="bg-light">

    <!-- NAVBAR -->
    <?php include 'components/navbar.php'; ?>   

    <!-- CONTENU PROFIL -->
     <div class="container mt-5">
        <div class="card shadow mx-auto" style="max-width: 600px;">
            <div class="card-body">

                <h3 class="text-center mb-4">Mon Profil</h3>

                <div class="mb-3">
                    <label class="form-label fw-bold">Nom :</label>
                    <p class="border rounded p-2 bg-light"><?= htmlspecialchars($user[0]["nom"]?? ""); ?></p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Courriel :</label>
                    <p class="border rounded p-2 bg-light"><?= htmlspecialchars($user[0]["email"]); ?></p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Rôle :</label>
                    <p class="border rounded p-2 bg-light"><?= htmlspecialchars($user[0]["role"]); ?></p>
                </div>

                <a href="logout.php" class="btn btn-danger w-100">Se déconnecter</a>

            </div>
        </div>
    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
