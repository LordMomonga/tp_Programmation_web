<?php

session_start();
if (!isset($_SESSION['users'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom        = trim($_POST['nom']);
    $artiste    = trim($_POST['artiste']);
    $role       = trim($_POST['role']);
    $duree      = (int)$_POST['duree'];
    $taille     = !empty($_POST['taille']) ? (float)$_POST['taille'] : null;
    $lyrics     = trim($_POST['lyrics']);
    $date_ajout = $_POST['date_ajout'];
    $code_album = trim($_POST['code_album']);
    $prix       = (float)$_POST['prix'];
    $youtube    = trim($_POST['youtube']);

    // Lire le fichier JSON existant
    $file = 'oeuvres.json';
    $oeuvres = [];
    if (file_exists($file)) {
        $content = file_get_contents($file);
        $oeuvres = json_decode($content, true) ?? [];
    }

    // Ajouter la nouvelle œuvre
    $oeuvres[] = [
        'nom' => $nom,
        'artiste' => $artiste,
        'role' => $role,
        'duree' => $duree,
        'taille' => $taille,
        'lyrics' => $lyrics,
        'date_ajout' => $date_ajout,
        'code_album' => $code_album,
        'prix' => $prix,
        'youtube' => $youtube,
        'ajoute_par' => $_SESSION['users']['nom'] ?? 'inconnu'
    ];

    // Enregistrer dans le fichier JSON
    file_put_contents($file, json_encode($oeuvres, JSON_PRETTY_PRINT));

    $success = "Œuvre ajoutée avec succès !";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Œuvre - MML</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font : Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <?php include 'components/navbar.php'; ?>

    <?php if(isset($success)): ?>
    <div style="position:absolute; bottom:0px; right:0px; margin:20px; width: auto;" class="alert alert-success"><?= htmlspecialchars($success) ?></div>
<?php endif; ?>

    <!-- PAGE -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Ajouter une œuvre</h2>

        <div class="card shadow-sm mx-auto" style="max-width: 700px;">
            <div class="card-body">

                <form action="pageOeuvre.php" method="POST">

                    <!-- Nom de l’œuvre -->
                    <div class="mb-3">
                        <label class="form-label">Nom de l’œuvre <span class="text-danger">*</span></label>
                        <input 
                            type="text" 
                            class="form-control" 
                            name="nom"
                            required
                            placeholder="Ex : Pour que tu m’aimes encore"
                        >
                    </div>

                    <!-- Artiste principal -->
                    <div class="mb-3">
                        <label class="form-label">Artiste principal <span class="text-danger">*</span></label>
                        <input 
                            type="text" 
                            class="form-control" 
                            name="artiste"
                            required
                            placeholder="Nom de l’artiste"
                        >
                    </div>

                    <!-- Rôle -->
                    <div class="mb-3">
                        <label class="form-label">Rôle de l’artiste</label>
                        <select class="form-select" name="role" required>
                            <option value="chanteur">Chanteur</option>
                            <option value="compositeur">Compositeur</option>
                            <option value="interprète">Interprète</option>
                            <option value="auteur">Auteur</option>
                        </select>
                    </div>

                    <!-- Durée -->
                    <div class="mb-3">
                        <label class="form-label">Durée (en secondes) <span class="text-danger">*</span></label>
                        <input 
                            type="number" 
                            class="form-control" 
                            name="duree"
                            min="1"
                            required
                            placeholder="Ex : 245"
                        >
                    </div>

                    <!-- Taille en MB -->
                    <div class="mb-3">
                        <label class="form-label">Taille du fichier (MB)</label>
                        <input 
                            type="number" 
                            class="form-control" 
                            name="taille"
                            min="0"
                            step="0.01"
                            placeholder="Ex : 5.32"
                        >
                    </div>

                    <!-- Lyrics -->
                    <div class="mb-3">
                        <label class="form-label">Lyrics</label>
                        <textarea 
                            class="form-control" 
                            name="lyrics"
                            rows="4"
                            placeholder="Paroles de la chanson (optionnel)"
                        ></textarea>
                    </div>

                    <!-- Date d’ajout -->
                    <div class="mb-3">
                        <label class="form-label">Date d’ajout <span class="text-danger">*</span></label>
                        <input 
                            type="date" 
                            class="form-control" 
                            name="date_ajout"
                            required
                            value="<?php echo date('Y-m-d'); ?>"
                            readonly
                        >
                    </div>

                    <!-- Code de l’album -->
                    <div class="mb-3">
                        <label class="form-label">Code de l’album <span class="text-danger">*</span></label>
                        <input 
                            type="text" 
                            class="form-control" 
                            name="code_album"
                            required
                            placeholder="Ex : ABC1234"
                            pattern="[A-Za-z]{3}[0-9]{4}"
                            title="Format valide : AAA1234"
                        >
                    </div>

                    <!-- Prix -->
                    <div class="mb-3">
                        <label class="form-label">Prix ($) <span class="text-danger">*</span></label>
                        <input 
                            type="number" 
                            class="form-control" 
                            name="prix"
                            min="0"
                            step="0.01"
                            required
                            placeholder="Ex : 1.99"
                        >
                    </div>

                    <!-- Lien YouTube -->
                    <div class="mb-3">
                        <label class="form-label">Lien YouTube (optionnel)</label>
                        <input 
                            type="url" 
                            class="form-control" 
                            name="youtube"
                            placeholder="Ex : https://youtube.com/watch?v=..."
                        >
                    </div>

                    <!-- Bouton -->
                    <button type="submit" class="btn btn-primary w-100">Enregistrer</button>

                </form>

            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
