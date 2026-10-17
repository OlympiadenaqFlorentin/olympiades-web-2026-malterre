<?php
require_once __DIR__ . '/PDO.php';

class User_ {
    private PDO $pdo;

    public $nom_utilisateur;
    public $grade;
    public $mdp;

    public function __construct(PDO $db) {
        $this->pdo = $db;
    }

    public function setnom_utilisateur(string $nom_utilisateur): void {
        $this->nom_utilisateur = $nom_utilisateur;
    }

    public function setgrade(string $grade): void {
        $this->grade = $grade;
    }

    public function setmdp(string $mdp): void {
        $this->mdp = $mdp;
    }

    public function getnom_utilisateur() {
        return $this->nom_utilisateur;
    }

    public function getgrade() {
        return $this->grade;
    }

    public function getmdp() {
        return $this->mdp;
    }

    public function create(
    string $nom_utilisateur,
    string $grade,
    string $mdp
    ): bool {
        $sql = "INSERT INTO User_ (nom_utilisateur, grade, mdp)
                VALUES (:nom_utilisateur, :grade, :mdp)";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':nom_utilisateur', $nom_utilisateur);
        $stmt->bindValue(':grade', $grade);
        $stmt->bindValue(':mdp', $mdp);

        return $stmt->execute();
    }


    public function selecte(): array
    {
        $sql = "SELECT nom_utilisateur,  FROM User_";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function connexion(string $nom_utilisateur, string $mdp): bool
    {
        // Rechercher l'utilisateur dans la base de données
        $sql = "SELECT * FROM User_ WHERE nom_utilisateur = :nom_utilisateur";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':nom_utilisateur', $nom_utilisateur);
        $stmt->execute();

        $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifier si l'utilisateur existe
        if (!$utilisateur) {
            return false;
        }

        if (!password_verify($mdp, $utilisateur['mdp'])) {
            return false;
        }

        $this->nom_utilisateur = $utilisateur['nom_utilisateur'];

        return true;
    }
}
?>