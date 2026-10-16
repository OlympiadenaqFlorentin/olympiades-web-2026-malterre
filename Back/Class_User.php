<?php
require_once __DIR__ . '/PDO.php';
Class User_{
    private $pdo;
    public $nom_utilisateur;
    public $grade;
    public $mdp;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    function __construct($nom_utilisateur, $grade, $mdp){
        $this->nom_utilisateur = $nom_utilisateur;
        $this->grade = $grade;
        $this->mdp = $mdp;
    }

    function setnom_utilisateur($nom_utilisateur){
        $this->nom_utilisateur = $nom_utilisateur;
    }
    function setgrade($grade){
        $this->grade = $grade;
    }
    function setmdp($mdp){
        $this->mdp = $mdp;
    }
    
    
    function getid(){
        return $this->id;
    }
    function getnom_utilisateur(){
        return $this->nom_utilisateur;
    }
    function getgrade(){
        return $this->grade;
    }
    function getmdp(){
        return $this->mdp;
    }

    public function create($nom_utilisateur, $grade, $mdp){
        $stmt = $sql->prepare("INSERT INTO User (nom_utilisateur, grade, mdp) VALUES (:nom_utilisateur, :grade :mdp);");
        $stmt->bindparam(":nom_utilisateur",$nom_utilisateur);
        $stmt->bindparam(":grade",$grade);
        $stmt->bindparam(":mdp",$mdp);
        return $stmt->execute();
    }
}
?>