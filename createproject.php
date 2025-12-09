<?php
require_once 'db/functions.php';
require_once 'utils/session.php';

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
<?php require_once "includes/header.php"; ?>

<div class="form-container">
    <div class="form-card">
        <?php
        if (isset($success)):
            if ($success): ?>
                <div class="alert success">
                    Le projet a bien été créé
                </div>
            <?php
            else: ?>
                <div class="alert error">
                    Une erreur est survenue
                </div>
        <?php
            endif;
        endif; ?>
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
            <!-- test d'ajout de sélection des skills pour les intégrer sur la création d'un projet -->
            <div class="form-group">
                <?php $skills = getAllSkills(); ?>
                <label for="skills">Skills utilisés dans le projet</label>
                <select name="skills[]" id="skills" multiple>
                    <?php foreach ($skills as $skill): ?>
                        <option value="<?= htmlspecialchars($skill['idskills']) ?>">
                            <?= htmlspecialchars($skill['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <small>Maintenez la touche <kbd>Ctrl</kbd> (ou <kbd>Cmd</kbd> sur Mac) enfoncée pour sélectionner plusieurs skills.</small>
            </div>


            <button type="submit" class="submit-btn">Créer le projet</button>
        </form>
    </div>
</div>
<?php include_once "includes/footer.php"; ?>