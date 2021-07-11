<?php

$dbName = 'simplon';
$dbUser = 'root';
$dbPass = ''; // root si vous utilisez un Mac avec MAMP
$dbHost = 'localhost'; // ou 127.0.0.1, en cas de soucis (mais les deux devraient être identiques)
$dbDsn = 'mysql:dbname='.$dbName.';host='.$dbHost;

$dsn = 'mysql:dbname=beanies;host=127.0.0.1';
$user = 'root'; // Utilisateur par défaut
$password = ''; // Par défaut, pas de mot de passe sur Wamp

try {
    $connection = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

function getDatabaseConnexion() {

    try {
        $user = "root";
        $pass = "";
        $pdo = new PDO('mysql:host=localhost;dbname=simplon', $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
}
