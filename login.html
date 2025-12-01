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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">MML</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.html">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link active" href="signup.html">S’inscrire</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.html">Se connecter</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- CONTAINER -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">

                <div class="card shadow">
                    <div class="card-body p-4">

                        <h3 class="text-center mb-4">Se connecter</h3>

                        <!-- FORMULAIRE -->
                        <form id="loginForm">

                            <div class="mb-3">
                                <label class="form-label">Courriel</label>
                                <input type="email" id="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Mot de passe</label>
                                <input type="password" id="password" class="form-control" required minlength="8">
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                Connexion
                            </button>

                            <p class="text-center mt-3">
                                Pas de compte ?
                                <a href="signup.html">Créer un compte</a>
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
    <script>
        // Simule une base de données
        const users = [
            {
                nom: "Jean Client",
                email: "client@example.com",
                password: "Client123!",
                role: "client"
            },
            {
                nom: "Marie Gérante",
                email: "gerant@example.com",
                password: "Gerant123!",
                role: "gerant"
            }
        ];

        // Vérifier si déjà connecté
        if(localStorage.getItem("user")){
            window.location.href = "profile.html";
        }

        const loginForm = document.getElementById("loginForm");
        const errorBox = document.getElementById("errorBox");

        loginForm.addEventListener("submit", function(e){
            e.preventDefault();

            const email = document.getElementById("email").value.trim();
            const password = document.getElementById("password").value.trim();

            // Validation simple
            if(email === "" || password === ""){
                showError("Veuillez remplir tous les champs.");
                return;
            }

            // Vérifier utilisateur
            const user = users.find(u => u.email === email);

            if(!user){
                showError("Courriel ou mot de passe incorrect.");
                return;
            }

            // Vérifier le mot de passe
            if(user.password !== password){
                showError("Courriel ou mot de passe incorrect.");
                return;
            }

            // Création de session
            localStorage.setItem("user", JSON.stringify(user));

            // Redirection selon rôle
            if(user.role === "client"){
                window.location.href = "profile.html";
            } else if(user.role === "gerant"){
                window.location.href = "dashboard.html";
            }
        });

        function showError(msg){
            errorBox.classList.remove("d-none");
            errorBox.innerText = msg;
        }

    </script>

</body>
</html>
