<?php
require_once __DIR__ . '/../Back/PDO.php';
require_once __DIR__ . '/../Back/Class_Animation.php';

$animation = new Animation($pdo);
$message = "";

// TRAITEMENT DES FORMULAIRES
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $action = $_POST["action"] ?? "";

        if ($action === "ajouter") {
            $animation->setNom(trim($_POST["Nom"]));
            $animation->setTailleMin((int) $_POST["taille_min"]);
            $animation->setStatute($_POST["statue"]);
            $animation->setIdUnivers((int) $_POST["id_univers"]);

            $animation->create();
        }

        elseif ($action === "modifier") {
            $animation->setNom($_POST["Nom"]);
            $animation->setTailleMin((int) $_POST["taille_min"]);
            $animation->setStatute($_POST["statue"]);
            $animation->setIdUnivers((int) $_POST["id_univers"]);

            $animation->update();
        }

        elseif ($action === "supprimer") {
            $animation->delete($_POST["Nom"]);
        }

        header("Location: admin.php");
        exit;

    } catch (PDOException $e) {
        $message = "Erreur : impossible d'effectuer cette action.";
    }
}

// RÉCUPÉRATION DES ANIMATIONS
$animations = $animation->selecte();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Style.css">
    <link rel="shortcut icon" href="/illustrations/Roue.png" type="image/x-icon">
    <title>RaceParc</title>
</head>
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
<h1>Administration de RaceParc</h1>

<?php if ($message !== ""): ?>
    <p><?= htmlspecialchars($message) ?></p>
<?php endif; ?>

<button class="ajouter" onclick="ouvrirAjout()">
    + Ajouter une animation
</button>

<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Taille minimale</th>
            <th>Statut</th>
            <th>ID univers</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
    <?php foreach ($animations as $a): ?>
        <tr>
            <td><?= htmlspecialchars($a["Nom"]) ?></td>
            <td><?= (int) $a["taille_min"] ?> cm</td>
            <td><?= htmlspecialchars($a["statue"]) ?></td>
            <td><?= (int) $a["id_univers"] ?></td>

            <td>
                <button
                    class="modifier"
                    onclick="ouvrirModification(
                        this.dataset.nom,
                        this.dataset.taille,
                        this.dataset.statue,
                        this.dataset.univers
                    )"
                    data-nom="<?= htmlspecialchars($a["Nom"], ENT_QUOTES, "UTF-8") ?>"
                    data-taille="<?= (int) $a["taille_min"] ?>"
                    data-statue="<?= htmlspecialchars($a["statue"], ENT_QUOTES, "UTF-8") ?>"
                    data-univers="<?= (int) $a["id_univers"] ?>">
                    Modifier
                </button>

                <button
                    class="supprimer"
                    onclick="ouvrirSuppression(this.dataset.nom)"
                    data-nom="<?= htmlspecialchars($a["Nom"], ENT_QUOTES, "UTF-8") ?>">
                    Supprimer
                </button>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


<!-- FORMULAIRE AJOUTER / MODIFIER -->
<div class="modal" id="modalAnimation">
    <div class="contenu">
        <h2 id="titreFormulaire">Ajouter une animation</h2>

        <form method="POST" action="admin.php">
            <input type="hidden" name="action" id="action" value="ajouter">

            <label for="Nom">Nom de l'animation</label>
            <input type="text" id="Nom" name="Nom" maxlength="50" required>

            <label for="taille_min">Taille minimale (cm)</label>
            <input type="number" id="taille_min" name="taille_min"
                   min="0" required>

            <label for="statue">Statut</label>
            <input type="text" id="statue" name="statue"
                   maxlength="50" required>

            <label for="id_univers">ID de l'univers</label>
            <input type="number" id="id_univers" name="id_univers"
                   min="1" required>

            <button type="submit" class="ajouter">Enregistrer</button>
            <button type="button" class="fermer"
                    onclick="fermerModales()">Annuler</button>
        </form>
    </div>
</div>


<!-- FORMULAIRE DE SUPPRESSION -->
<div class="modal" id="modalSuppression">
    <div class="contenu">
        <h2>Supprimer une animation</h2>
        <p>Confirmer la suppression de cette animation ?</p>

        <form method="POST" action="admin.php">
            <input type="hidden" name="action" value="supprimer">
            <input type="hidden" name="Nom" id="nomSuppression">

            <button type="submit" class="supprimer">
                Confirmer la suppression
            </button>

            <button type="button" class="fermer"
                    onclick="fermerModales()">Annuler</button>
        </form>
    </div>
</div>