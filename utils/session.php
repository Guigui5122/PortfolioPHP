<?php

session_start();

//savoir si l'utilisateur est connecté
function isLoggedIn(){
    $isLoggedIn = isset($_SESSION['idUser']);
    return $isLoggedIn;
}

function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: login.php');
        exit;
    }
}
?>