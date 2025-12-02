
<?php 

 $user = $_SESSION["users"] ?? null;



?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">MML</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul id="menu" class="navbar-nav ms-auto">
                <?php if (!$user): ?>
                    <!-- Menu pour visiteur (non connecté) -->
                    <li class="nav-item"><a class="nav-link" href="login.php">Connexion</a></li>
                    <li class="nav-item"><a class="nav-link" href="signup.php">Inscription</a></li>

                <?php else: ?>
                    <!-- Menu pour utilisateur connecté -->
                   
                    <li class="nav-item"><a class="nav-link" href="profil.php">mon profil</a></li>
                    <li class="nav-item"><a href="pageOeuvre.php" class="nav-link">oeuvres</a></li>
                    <li class="nav-item"><a href="pageAjout.php" class="nav-link">artistes</a></li>

                    <li class="nav-item"><a class="nav-link" href="logout.php">logout</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
