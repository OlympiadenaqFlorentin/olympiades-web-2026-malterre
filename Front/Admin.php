<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Style.css">
    <link rel="shortcut icon" href="/illustrations/Roue.png" type="image/x-icon">
    <title>RaceParc</title>
</head>
<body>
    <header>
        <nav class="navbar">
            <!-- <h2 class="Nom-NavBar">RaceParc</h2> -->
            <a class="aNavBar" href="../Index.html"><strong>Accueil</strong></a>
            <a class="aNavBar" href="Animation.html"><strong>Animations</strong></a>
            <a class="aNavBar" href="Musee.html"><strong>Musée</strong></a>
            <a class="aNavBar" href="Billetterie.html"><strong>Billetterie</strong></a>
            <div class="container_logo_login">
                <a class="logo_login" href="Login.php">
                    <img src="/illustrations/Icône profil avec badge circulaire.png" alt="Profil">
                </a>
            </div>
        </nav>
    </header>
    <main class="admin-container">
        <h2>Tableau de bord</h2>
        <p class="admin-description">
            Bienvenue dans l'espace d'administration de RaceParc.
        </p>

        <div class="admin-stats">
            <div class="admin-card">
                <h3>Utilisateurs</h3>
                <p>128</p>
            </div>

            <div class="admin-card">
                <h3>Réservations</h3>
                <p>64</p>
            </div>

            <div class="admin-card">
                <h3>Animations</h3>
                <p>12</p>
            </div>
        </div>

        <div class="admin-menu">
            <a href="Utilisateurs.php">
                Gérer les utilisateurs <span>→</span>
            </a>

            <a href="Reservations.php">
                Gérer les réservations <span>→</span>
            </a>

            <a href="Animations.php">
                Gérer les animations <span>→</span>
            </a>

            <a href="Billetterie.php">
                Gérer la billetterie <span>→</span>
            </a>
        </div>
    </main>
</body>