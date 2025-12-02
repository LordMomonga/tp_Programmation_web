
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MML - Médiathèque musicale</title>

    <!-- GOOGLE FONTS POPPINS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif !important;
        }

        
        .artist-img {
            height: 230px;        
             width: 100%;          
            object-fit: cover;    
            border-radius: 4px;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<?php include 'components/navbar.php'; ?>

<!-- HERO -->
<section class="bg-dark text-white text-center py-5">
    <div class="container">
        <h1 class="display-4 fw-bold">Bienvenue sur MML</h1>
        <p class="lead">Découvrez, consultez et gérez vos artistes et œuvres préférées.</p>
        <a href="signup.php" class="btn btn-light btn-lg mt-3">Commencer maintenant</a>
    </div>
</section>

<!-- ARTISTES RÉCENTS -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="mb-4 text-center fw-bold">Artistes ajoutés récemment</h2>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="https://th.bing.com/th/id/OIP.25AbxD57qgUT_DXTq6-iawHaFj?w=238"
                         class="card-img-top artist-img">
                    <div class="card-body">
                        <h5 class="card-title">Céline Dion</h5>
                        <p class="card-text">Originaire de Québec. Chanteuse internationale.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="https://th.bing.com/th/id/OIP.CZTyajaqTjx-3cxeTetaMQHaE8?w=296"
                         class="card-img-top artist-img">
                    <div class="card-body">
                        <h5 class="card-title">Henri Salvador</h5>
                        <p class="card-text">Artiste français, auteur-compositeur-interprète.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="https://th.bing.com/th/id/R.7ac33edea14ec753bc20562ef05b5d8f?rik=HsL9rYtMe9MeEg"
                         class="card-img-top artist-img">
                    <div class="card-body">
                        <h5 class="card-title">Stromae</h5>
                        <p class="card-text">Chanteur belge aux clips créatifs et originaux.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- FOOTER -->
<?php include 'components/footer.php'; ?>


<script>
// -------------------------------
//   MENU DYNAMIQUE
// -------------------------------

// Déconnexion

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
