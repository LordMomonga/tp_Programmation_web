<?php
session_start();

$error = "";

// S'assurer que users est bien un tableau
if (!isset($_SESSION["users"]) || !is_array($_SESSION["users"])) {
    $_SESSION["users"] = [];
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (empty($_POST["nom"]) || empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["confirm"]) || empty($_POST["role"])) {
        $error = "Tous les champs sont obligatoires.";
    } else {
        $nom = trim($_POST["nom"]);
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);
        $confirm = trim($_POST["confirm"]);
        $role = trim($_POST["role"]);

        if ($password !== $confirm) {
            $error = "Les mots de passe ne correspondent pas.";
        }

        // Vérifier si email déjà utilisé
        foreach ($_SESSION["users"] as $u) {
            if (is_array($u) && isset($u["email"]) && $u["email"] === $email) {
                $error = "Un compte existe déjà avec ce courriel.";
                break;
            }
        }

        // Ajouter l'utilisateur seulement s'il n'y a pas d'erreur
        if ($error === "") {
            $_SESSION["users"][] = [
                "nom" => $nom,
                "email" => $email,
                "password" => password_hash($password, PASSWORD_BCRYPT),
                "role" => $role
            ];

            header("Location: login.php");
            exit;
        }
    }
}

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S’inscrire - MML</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font : Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Poppins", sans-serif;
        }
        .card {
            border-radius: 12px;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
   <?php include 'components/navbar.php'; ?>

   <?php if ($error !== ""): ?>
    <div class="alert alert-danger" style="position:absolute; bottom:0px; right:0px; margin:20px; width: auto;">
        <?= $error ?>
    </div>
<?php endif; ?>
    <!-- FORMULAIRE -->
    <div class="container mt-5" style="max-width: 550px;">
        <h2 class="text-center mb-4">Créer un compte</h2>

        <div class="card shadow p-4">
            <form action="signup.php" method="POST">

                <!-- Nom -->
                <div class="mb-3">
                    <label class="form-label">Nom <span class="text-danger">*</span></label>
                    <input 
                        type="text" 
                        class="form-control" 
                        name="nom" 
                        placeholder="Votre nom"
                        required
                        pattern="[A-Za-zÀ-ÖØ-öø-ÿ ]+"
                        title="Lettres uniquement"
                    >
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label">Courriel <span class="text-danger">*</span></label>
                    <input 
                        type="email" 
                        class="form-control" 
                        name="email" 
                        placeholder="exemple@courriel.com"
                        required
                    >
                </div>

                <!-- Mot de passe -->
                <div class="mb-3">
                    <label class="form-label">Mot de passe <span class="text-danger">*</span></label>
                    <input 
                        type="password" 
                        class="form-control" 
                        name="password"
                        placeholder="Mot de passe"
                        required
                        title="Min. 8 caractères : 1 majuscule, 1 minuscule, 1 chiffre, 1 spécial"
                    >
                </div>

                <!-- Confirmer -->
                <div class="mb-3">
                    <label class="form-label">Confirmer le mot de passe <span class="text-danger">*</span></label>
                    <input 
                        type="password" 
                        class="form-control" 
                        name="confirm"
                        placeholder="Confirmation"
                        required
                    >
                </div>

                <!-- Rôle -->
                <div class="mb-3">
                    <label class="form-label">Rôle <span class="text-danger">*</span></label>
                    <select class="form-select" name="role" required>
                        <option value="">-- Choisir un rôle --</option>
                        <option value="client">Client</option>
                        <option value="gerant">Gérant</option>
                    </select>
                </div>

                <!-- Bouton -->
                <button type="submit" class="btn btn-primary w-100">
                    Créer mon compte
                </button>

            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
