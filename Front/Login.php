<?php
require_once __DIR__ . '/../Back/PDO.php';
require_once __DIR__ . '/../Back/Class_User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom_utilisateur = trim($_POST['nom_utilisateur'] ?? '');
    $grade = trim($_POST['grade'] ?? '');
    $mdp = trim($_POST['mdp'] ?? '');

    $user = new User($pdo);
    $user->create($nom_utilisateur, $grade, $mdp);

   echo('insert réussie');
    exit;
};
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Style.css">
    <link rel="shortcut icon" href="/illustrations/Roue.png" type="image/x-icon">
    <title>RaceParc</title>
</head>
<body class="body-Login">
    <header>
        <nav class="navbar">
            <!-- <h2 class="Nom-NavBar">RaceParc</h2> -->
            <a class="aNavBar" href="../Index.html"><strong>Accueil</strong></a>
            <a class="aNavBar" href="Animation.html"><strong>Animations</strong></a>
            <a class="aNavBar" href="Musee.html"><strong>Musée</strong></a>
            <a class="aNavBar" href=""><strong>Billeterie</strong></a>
            <div class="container_logo_login"><a class="logo_login" href="Login.php"><img src="/illustrations/Icône profil avec badge circulaire.png"></a>
        </nav>
    </header>
    <form class="form_Connexion">
        <label for="nom">Nom d'utilisateur / Email </label><br>
        <input type="text" name="nom_utilisateur" required placeholder="identifiant"><br>
        <input type="text" name="grade" required placeholder="admin"><br>
        <label for="mdp">Votre Mot de passe</label><br>
        <input type="password" name="mdp" required placeholder="Mot de passe"><br>

        <button type="submit">Se Connecter</button>
    </form>
</body>