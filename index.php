<?php

require_once 'db/functions.php';
require_once 'utils/session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // <!-- Cas où le formulaire a été rempli et soumis -->
    // <!-- Cas où le formulaire (suppression) a été rempli et soumis -->
    $idProjectToDelete = $_POST["idProjectToDelete"];
    $success = deleteProject($idProjectToDelete);
}

?>
    <?php require_once "includes/header.php"; ?>

    <main>
        <section class="hero-section">
            <div class="hero-content">
                <h1>Plus qu'un portfolio : une preuve de résultat.</h1>
                <div>Contactez-moi pour vos idées de projet, même les plus fous!</div>
            </div>
            <img src="/img/GP_photo.jpg" alt="Photo de profil Guillaume">
        </section>
        <section class="projects" id="projects">
            <?php
            if (isset($success)):
                if ($success): ?>
                    <div class="alert success">
                        Le projet a bien été supprimé
                    </div>
                <?php
                else: ?>
                    <div class="alert error">
                        Une erreur est survenue
                    </div>
            <?php
                endif;
            endif; ?>

            <h2>Mes projets</h2>
            <div class="list-projects">
                <?php
                $projects = getAllProjects();
                foreach ($projects as $row) : ?>

                    <!-- Ici les projets s'ajoute lorsque l'on créer un nouveau projet via Createproject.php -->
                    <article class="project">
                        <h3>
                            <?php echoValue($row, 'title'); ?>
                        </h3>
                        <p class="description">
                            <?php echoValue($row, 'description'); ?>
                        </p>
                        <div class="project-skills">
                            <?php foreach ($row['skills'] as $skill): ?>
                                <div><?php echo $skill; ?></div>
                            <?php endforeach ?>
                        </div>
                        <div class="links">
                            <!-- Lien Github -->
                            <a href="<?php echoValue($row, 'gh_link'); ?>" class="btn-link github" target="_blank"><i class="fab fa-github"></i> Github</a>
                            <!-- Lien Projet -->
                            <a href="<?php echoValue($row, 'link_project'); ?>" class="btn-link project-url" target="_blank"><i class="fas fa-external-link-alt"></i> Voir</a>
                        </div>
                            <?php if (isLoggedIn()): ?>
                            <form action="" method="POST">
                            <div class="deletedBtnform">
                                <input type="hidden" name="idProjectToDelete" value="<?php echoValue($row, 'idprojects'); ?>" />
                                <input type="submit" value="Delete" class="btn-delete">
                            </div>
                            </form>
                            <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
        <section class="skills" id="skills">
            <h2> Hard Skills </h2>

            <div class="list-skills">
                <?php
                $skills = getAllSkills();
                foreach ($skills as $skill) : ?>
                    <article class="skill">
                        <?php if ($skill['logo'] == null): ?>
                            <h3>
                                <?php echoValue($skill, 'name'); ?>
                            </h3>
                        <?php else : ?>
                            <p class="img">
                                <img
                                    alt="<?php echoValue($skill, 'name'); ?>"
                                    src="<?php echoValue($skill, 'logo'); ?>" />
                            </p>
                        <?php
                        endif;
                        ?>
                    </article>
                <?php endforeach ?>
            </div>
        </section>
        <section class="references">

        </section>
    </main>

    <?php include_once "includes/footer.php"; ?>

