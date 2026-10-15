<?php
require_once 'PDO.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>
    <form action="index.php" method="POST">
        <input type="text" name="inputName" placeholder="First Name">
        <br>
        <input type="text" name="inputLastname" placeholder="Last Name">
        <br>
        <button type="submit" name="submit">Sign up</button>
    </form> 

    <?php
    if (isset($_POST['submit'])) {
        $inputPrenom = $_POST['inputName'];
        $inputNom = $_POST['inputLastname'];

        $stmt = $conn->prepare("INSERT INTO test (Prenom, nom) VALUES (:prenom, :nom)");
        $stmt->execute([
            ':prenom' => $inputPrenom,
            ':nom'    => $inputNom
        ]);
    }
    ?>
</body>
</html>