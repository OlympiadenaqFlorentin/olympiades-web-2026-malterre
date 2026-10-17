<?php
session_start();
require_once __DIR__ . '/../Back/PDO.php';
require_once __DIR__ . '/../Back/Class_User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom_utilisateur = trim($_POST['nom_utilisateur'] ?? '');
    $mdp = $_POST['mdp'] ?? '';

    // Vérifier que les champs sont remplis
    if ($nom_utilisateur === '' || $mdp === '') {
        echo "Veuillez remplir tous les champs.";
        exit;
    }

    // Créer l'objet utilisateur
    $user = new User_($pdo);

    // Vérifier le nom d'utilisateur et le mot de passe
    if ($user->connexion($nom_utilisateur, $mdp)) {

        // Connexion réussie
        session_regenerate_id(true);

        $_SESSION['nom_utilisateur'] = $user->getnom_utilisateur();

        // Redirection après connexion
        header('Location: Admin.php');
        exit;

    } else {
        // Identifiants incorrects
        echo "Nom d'utilisateur ou mot de passe incorrect.";
        exit;
    }
}
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
            <a class="aNavBar" href="Billetterie.html"><strong>Billetterie</strong></a>
            <div class="container_logo_login">
                <a class="logo_login" href="Login.php">
                    <img src="/illustrations/Icône profil avec badge circulaire.png" alt="Profil utilisateur">
                </a>
            </div>
        </nav>
    </header>

    <form class="form_Connexion" method="POST">
        <h2>RACE<span>PARC</span></h2>
        <p class="sous-titre">ACCÈS À VOTRE ESPACE</p>

        <label for="nom">Nom d’utilisateur / Adresse e-mail</label>
        <input type="text" id="nom" name="nom_utilisateur" required placeholder="Votre identifiant">

        <label for="mdp">Votre mot de passe</label>
        <input type="password" id="mdp" name="mdp" required placeholder="Votre mot de passe">

        <button type="submit">Se connecter →</button>
    </form>
</body>
</html>