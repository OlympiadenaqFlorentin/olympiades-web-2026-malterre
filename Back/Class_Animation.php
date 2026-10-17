<?php
require_once __DIR__ . '/PDO.php';

class Animation
{
    private PDO $pdo;

    public $Nom;
    public $taille_min;
    public $statute;
    public $id_univers;

    // Constructeur
    public function __construct(PDO $db)
    {
        $this->pdo = $db;
    }

    // GETTERS
    public function getNom()
    {
        return $this->Nom;
    }

    public function getTailleMin()
    {
        return $this->taille_min;
    }

    public function getStatute()
    {
        return $this->statute;
    }

    public function getIdUnivers()
    {
        return $this->id_univers;
    }

    // SETTERS
    public function setNom(string $Nom)
    {
        $this->Nom = $Nom;
    }

    public function setTailleMin(int $taille_min)
    {
        $this->taille_min = $taille_min;
    }

    public function setStatute(string $statute)
    {
        $this->statute = $statute;
    }

    public function setIdUnivers(int $id_univers)
    {
        $this->id_univers = $id_univers;
    }

    // AJOUTER UNE ATTRACTION
    public function create(): bool
    {
        $sql = "INSERT INTO attractions
                (Nom, taille_min, statue, id_univers)
                VALUES
                (:Nom, :taille_min, :statute, :id_univers)";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':Nom', $this->Nom);
        $stmt->bindValue(':taille_min', $this->taille_min, PDO::PARAM_INT);
        $stmt->bindValue(':statute', $this->statute);
        $stmt->bindValue(':id_univers', $this->id_univers, PDO::PARAM_INT);

        return $stmt->execute();
    }

    // SÉLECTIONNER TOUTES LES ATTRACTIONS
    public function selecte(): array
    {
        $sql = "SELECT * FROM attractions";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // RECHERCHER UNE ATTRACTION PAR SON NOM
    public function selecteParNom(string $Nom): array|false
    {
        $sql = "SELECT * FROM attractions WHERE Nom = :Nom";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':Nom', $Nom);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // MODIFIER UNE ATTRACTION
    public function update(): bool
    {
        $sql = "UPDATE attractions
                SET taille_min = :taille_min,
                    statue = :statute,
                    id_univers = :id_univers
                WHERE Nom = :Nom";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':Nom', $this->Nom);
        $stmt->bindValue(':taille_min', $this->taille_min, PDO::PARAM_INT);
        $stmt->bindValue(':statute', $this->statute);
        $stmt->bindValue(':id_univers', $this->id_univers, PDO::PARAM_INT);

        return $stmt->execute();
    }

    // SUPPRIMER UNE ATTRACTION
    public function delete(string $Nom): bool
    {
        $sql = "DELETE FROM attractions WHERE Nom = :Nom";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':Nom', $Nom);

        return $stmt->execute();
    }
}
?>
