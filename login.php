<?php
session_start();

$error = "";
$success = "";

// S'assurer que users est bien un tableau
if (!isset($_SESSION["users"]) || !is_array($_SESSION["users"])) {
    $_SESSION["users"] = [];
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST["email"] ?? "");
    $password = trim($_POST["password"] ?? "");

    if ($email === "" || $password === "") {
        $error = "Tous les champs sont obligatoires.";
    } elseif (empty($_SESSION["users"])) {
        $error = "Aucun utilisateur enregistré. Veuillez vous inscrire d'abord.";
    } else {
        $found = false;
        foreach ($_SESSION["users"] as $user) {
            if (is_array($user) && isset($user["email"], $user["password"])) {
                if ($user["email"] === $email && password_verify($password, $user["password"])) {
                    $_SESSION["user"] = $user;
                    header("Location: profil.php");
                    $success = "Connexion réussie ! Redirection en cours...";
                    exit;
                }
            }
        }
        $error = "Courriel ou mot de passe incorrect.";
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Art Store</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-light">
    <?php include 'components/navbar.php'; ?>

    <?php if ($error !== ""): ?>
    <div class="alert alert-danger" style="position:absolute; bottom:0px; right:0px; margin:20px; width: auto;">
        <?= $error ?>
    </div>
<?php endif; ?>


    <!-- CONTAINER -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">

                <div class="card shadow">
                    <div class="card-body p-4">

                        <h3 class="text-center mb-4">Se connecter</h3>

                        <!-- FORMULAIRE -->
                        <form id="loginForm" action="login.php" method="POST">

                            <div class="mb-3">
                                <label class="form-label">Courriel</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Mot de passe</label>
                                <input type="password" name="password" id="password" class="form-control" required minlength="2">
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                Connexion
                            </button>

                            <p class="text-center mt-3">
                                Pas de compte ?
                                <a href="signup.php">Créer un compte</a>
                            </p>

                        </form>

                        <!-- MESSAGE D’ERREUR -->
                        <div id="errorBox" class="alert alert-danger mt-3 d-none"></div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- JS -->
  

</body>
</html>
