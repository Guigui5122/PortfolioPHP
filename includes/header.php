<header class="site-header">
    <div class="logo">
        <a href="#">GP DEV</a>
    </div>
    <nav class="main-nav">
        <ul>
            <li><a href="/index.php#">Accueil</a></li>
            <li><a href="/index.php#projects">Mes projets</a></li>
            <li><a href="/index.php#skills">Skills</a></li>
            <li><a href="#">Contact</a></li>
            <?php if(isLoggedIn()):?>
                <li><a href="/createproject.php">Créer un projet</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <div class="cta">
        <?php if(isLoggedIn()):?>
            <a href="/logout.php" class="btn-primary">Se déconnecter</a>    
        <?php else: ?>
            <a href="/login.php" class="btn-primary">Se connecter</a>
            <?php endif; ?>
    </div>
</header>