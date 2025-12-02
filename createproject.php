<?php 
    require_once 'db/functions.php'; 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // <!-- Cas où le formulaire a été rempli et soumis -->
        $titre = $_POST["title"];
        $description = $_POST["description"];
        $gh_link = $_POST["gh_link"];
        $link_project = $_POST["link_project"];
        $success = insertProject($titre, $description, $gh_link, $link_project);

          // Redirection après traitement
    header("Location: index.php");
    exit();
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un projet</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="form-container">
        <div class="form-card">
            <?php 
                if(isset($success)):
                    if($success):?>
                        <div class="alert success">
                            Le projet a bien été créé
                        </div>
                    <?php 
                    else:?>
                        <div class="alert error">
                                Une erreur est survenue
                        </div>
                    <?php
                    endif;
                endif;?>
            <h1>Créer un projet</h1>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="title">Titre du projet</label>
                    <input type="text" name="title" id="title" placeholder="Ex: Mon application web" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" placeholder="Ex: Une application pour gérer les tâches" required></textarea>
                </div>

                <div class="form-group">
                    <label for="gh_link">Lien GitHub</label>
                    <input type="url" name="gh_link" id="gh_link" placeholder="https://github.com/..." required>
                </div>

                <div class="form-group">
                    <label for="link_project">Lien du projet</label>
                    <input type="url" name="link_project" id="link_project" placeholder="https://example.com" required>
                </div>

                <button type="submit" class="submit-btn">Créer le projet</button>
            </form>
        </div>
    </div>
</body>
</html>