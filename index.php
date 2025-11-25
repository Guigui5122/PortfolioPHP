<?php require_once 'db/db_connection.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Portfolio GPDEV</title>
</head>
<body>
    <?php require_once "includes/header.php"; ?>

    <main>
        <section class="hero-section">
            <div>
                <h1>"Plus qu'un portfolio : une preuve de résultat."</h1>
                <div>N'hésitez pas à me contacter pour vos projets.</div>
            </div>
        <img src="/img/GP_photo.jpg" alt="Photo de profil Guillaume PELLOIN">
        </section>
        <section class="projects">
            <h2>Mes projets</h2>
            <div class="list-projects">
                <?php 
                    $pdo = getDBConnection();

                    $sql = "SELECT * FROM portfoliobdd.projects;";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach ($result as $row) :?>
                        <article class="project">
                            <!-- Images -->
                            <!-- Titre -->
                            <h3>
                                <?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8') . "\t"; ?>
                            </h3>
                            <p class="description">
                                <?php echo htmlspecialchars($row['description'], ENT_QUOTES, 'UTF-8') . "\t"; ?>
                            </p>
                            <!-- Lien Github -->
                            <a href="<?php echo htmlspecialchars($row['gh_link'], ENT_QUOTES, 'UTF-8') . "\n"; ?>">Github</a>
                            <!-- Lien Projet -->
                            <a href="<?php echo htmlspecialchars($row['link_project'], ENT_QUOTES, 'UTF-8') . "\n"; ?>">Voir</a>
                            <!-- Techos -->
                        </article>
                    <?php endforeach; ?>
            </div>        </section>
        <section class="skills">

        </section>
        <section class="references">

        </section>
    </main>

        <?php include_once "includes/footer.php"; ?>
   
</body>
</html>