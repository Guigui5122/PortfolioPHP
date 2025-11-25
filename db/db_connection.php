<?php

function getDBConnection()
{
    try{
        $user ="root";
        $password = "";

        $pdo = new PDO('mysql:host=localhost;dbname=portfoliobdd', $user, $password); 
        return $pdo;
    }catch(PDOException $e)
    {
        die("Erreur lors de la connexion à la BDD");
    }

}