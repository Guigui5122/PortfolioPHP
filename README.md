# Projet Création d'un Portfolio 
**Live 1/8 (TBDC - Studi)**
    Index.php
    Header.php
    Footer.php
    style.css
    blog.php
    /img/photo de profil

**Live 2/8 (TBDC - Studi)**
    mise en place de la bdd (mysqlworkbench)
    connection a la bdd db/db_connection.php

**Live 3/8 (TBDC - Studi)**
    mise en place de la section skills
    creation table Skills
    refactoring index.php (alléger le code en doublon) -> création du fichier : db/functions.php

**Live 4/8 (TBDC - Studi)** 
**Live 5/8 (TBDC - Studi)**
-> ajout "createproject.php" + gestion de l'affcihage sur index.php (page d'accueil)
**Live 6/8 (TBDC - Studi)**

-> ajout utils/session.php pour gérer la connexion utilisateur 
**Live 7/8 (TBDC - Studi)**
Création d'un user en bdd et config.php pour gérer la connexion

**Live 8/8 (TBDC - Studi)**
## Déploiement
Déploiement avec AlwaysData (hébergeur gratuit : alwaysdata.com) [connexion via compte gmail]
1./ Créer un compte sur Always Data
2./ Envoyer nos pages PHP sur l'hébergeur via FTP (non sécurisé) ou SSH
    -> faire glisser les fichiers à droite vers le serveur Alwaysdata, on peut accéder au site via le lien : https://gpdev.alwaysdata.net/
    ⚠️ problème avec la Bdd !! (-> version utf8mb4_unicode_ci pas identique à la bdd always data!)
    ⚠️ supprimer les fichiers qui contiennent des infos sensibles (ex:create-user.php) 
52' live 8/8