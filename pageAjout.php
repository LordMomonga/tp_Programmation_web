<?php
session_start();

// Sécurité : vérifier si l'utilisateur est connecté
if (!isset($_SESSION['users'])) {
    header("Location: login.php");
    exit;
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom   = trim($_POST['nom']);
    $ville = trim($_POST['ville']);

    // Gestion de la photo
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
        $uploadDir  = "uploads/";
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

        $fileTmp    = $_FILES['photo']['tmp_name'];
        $fileName   = uniqid() . "_" . basename($_FILES['photo']['name']);
        $filePath   = $uploadDir . $fileName;

        $allowedExt = ['jpg', 'jpeg', 'png', 'gif'];
        $ext = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

        if (!in_array($ext, $allowedExt)) {
            $error = "Format de fichier non autorisé !";
        } else {
            move_uploaded_file($fileTmp, $filePath);

            // Lire le fichier JSON existant
            $file = 'utils/artistes.json';
            $artistes = [];
            if (file_exists($file)) {
                $content = file_get_contents($file);
                $artistes = json_decode($content, true) ?? [];
            }

            // Ajouter le nouvel artiste
            $artistes[] = [
                'nom' => $nom,
                'ville' => $ville,
                'photo' => $filePath,
                'ajoute_par' => $_SESSION['user']['nom'] ?? 'inconnu'
            ];
            // Enregistrer dans le fichier JSON
            file_put_contents($file, json_encode($artistes, JSON_PRETTY_PRINT));

            $success = "Artiste ajouté avec succès !";
        }
    } else {
        $error = "Veuillez télécharger une photo valide !";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Artiste - MML</title>

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
    <div class="alert alert-success" style="position:absolute; bottom:0px; right:0px; margin:20px; width: auto;"><?= htmlspecialchars($success) ?></div>
<?php endif; ?>

    <!-- CONTENU PRINCIPAL -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Ajouter un artiste</h2>

        <div class="card shadow-sm mx-auto" style="max-width: 650px;">
            <div class="card-body">
                <form action="pageAjout.php" method="POST" enctype="multipart/form-data">

                    <!-- Nom de l’artiste -->
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom de l'artiste <span class="text-danger">*</span></label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="nom" 
                            name="nom"
                            placeholder="Ex : Céline Dion"
                            required 
                            pattern="[A-Za-zÀ-ÖØ-öø-ÿ ]+"
                            title="Lettres uniquement"
                        >
                    </div>

                    <!-- Ville -->
                    <div class="mb-3">
                        <label for="ville" class="form-label">Ville</label>
                        <select class="form-select" id="ville" name="ville">
                            <option value="Québec">Québec</option>
                            <option value="Montréal">Montréal</option>
                            <option value="Paris">Paris</option>
                            <option value="Toronto">Toronto</option>
                            <option value="Lyon">Lyon</option>
                        </select>
                    </div>

                    <!-- Photo -->
                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo de l'artiste <span class="text-danger">*</span></label>
                        <input 
                            type="file" 
                            class="form-control" 
                            id="photo" 
                            name="photo"
                            required
                            accept=".jpg, .jpeg, .png, .gif"
                        >
                        <small class="text-muted">Formats acceptés : .jpg, .jpeg, .png, .gif</small>
                    </div>

                    <!-- Bouton -->
                    <button type="submit" class="btn btn-primary w-100">Enregistrer</button>

                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
