<?php
require_once __DIR__ . '/../Back/PDO.php';
require_once __DIR__ . '/../Back/Class_User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom_utilisateur = trim($_POST['nom_utilisateur'] ?? '');
    $grade = trim($_POST['grade'] ?? '');
    $mdp = trim($_POST['mdp'] ?? '');

    $mdp = password_hash($mdp, PASSWORD_BCRYPT);

    $user = new User_($pdo);
    $user->create($nom_utilisateur, $grade, $mdp);

    echo 'insert réussie';
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
            <a class="aNavBar" href="Billeterie.html"><strong>Billeterie</strong></a>
            <div class="container_logo_login"><a class="logo_login" href="Login.php"><img src="/illustrations/Icône profil avec badge circulaire.png"></a>
        </nav>
    </header>
    <form class="form_Connexion" method="POST">
    <h2>RACE<span>PARC</span></h2>
    <p class="sous-titre">ACCÈS À VOTRE ESPACE</p>

    <label for="nom">Nom d'utilisateur / Email</label>
    <input type="text" id="nom" name="nom_utilisateur" required placeholder="Votre identifiant">
    
    <label for="grade">Grade</label>
    <input type="text" id="grade" name="grade" required placeholder="Votre grade">
    
    <label for="mdp">Votre mot de passe</label>
    <input type="password" id="mdp" name="mdp" required placeholder="Votre mot de passe">
    
    <button type="submit">Se connecter →</button>
</form>
</body>