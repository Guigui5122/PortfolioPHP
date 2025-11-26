<?php require_once 'db/functions.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon portfolio</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <?php require_once "includes/header.php"; ?>

    <main>
        <section class="hero-section">
            <div class="hero-content">
                <h1>Plus qu'un portfolio : une preuve de résultat.</h1>
                <div>Contactez-moi pour vos idées de projet, même les plus fous!</div>
            </div>
            <img src="/img/GP_photo.jpg" alt="Photo de profil Guillaume">
        </section>
        <section class="projects">
            <h2>Mes projets</h2>
            <div class="list-projects">
                <?php
                $project = getAllProjects();
                foreach ($project as $row) :?>

                    <article class="project">
                        <!-- Images -->
                        <!-- Titre -->
                        <h3>
                            <?php echoValue($row, 'title'); ?>
                        </h3>
                        <p class="description">
                            <?php echoValue($row, 'description'); ?>
                        </p>
                        <div class="links">
                            <!-- Lien Github -->
                            <a href="<?php echoValue($row, 'gh_link'); ?>" class="btn-link github" target="_blank"><i class="fab fa-github"></i> Github</a>
                            <!-- Lien Projet -->
                            <a href="<?php echoValue($row, 'link_project'); ?>" class="btn-link project-url" target="_blank"><i class="fas fa-external-link-alt"></i> Voir</a>
                        </div>
                        <!-- Techos -->
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
        <section class="skills">
                        <h2> Hard Skills </h2>

            <div class="list-skills">
                <?php
                $skills = getAllSkills();
                foreach ($skills as $skill) :?>
                    <article class="skill">
                        <?php if ($skill['logo'] == null): ?>
                            <h3>
                                <?php echoValue($skill,'name'); ?>
                            </h3>
                        <?php else : ?>
                            <p class="img">
                                <img src="<?php echoValue($skill, 'logo'); ?>" />
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

</body>

</html>