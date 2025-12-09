<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GP DEV Portfolio de Guillaume PELLOIN</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

    <header class="site-header">
        <div class="logo">
            <a href="/index">GP DEV</a>
        </div>
        <nav class="main-nav">
            <ul>
                <li><a href="/index.php#">Accueil</a></li>
                <li><a href="/index.php#projects">Mes projets</a></li>
                <li><a href="/index.php#skills">Skills</a></li>
                <li><a href="#">Contact</a></li>
                <?php if (isLoggedIn()): ?>
                    <li><a href="/createproject.php">Créer un projet</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <div class="cta">
            <?php if (isLoggedIn()): ?>
                <a href="/logout.php" class="btn-primary">Se déconnecter</a>
            <?php else: ?>
                <a href="/login.php" class="btn-primary">Se connecter</a>
            <?php endif; ?>
        </div>
    </header>