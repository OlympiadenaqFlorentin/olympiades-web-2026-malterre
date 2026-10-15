<?php
require_once("/Back/PDO.php");
Class User{
    public $nom_utilisateur;
    public $mdp;
    public $grade;

    function __construct($nom_utilisateur, $mdp, $grade){
        $this->nom_utilisateur = $nom_utilisateur;
        $this->mdp = $mdp;
        $this->grade = $grade;
    }

    function setnom_utilisateur($nom_utilisateur){
        $this->nom_utilisateur = $nom_utilisateur;
    }
    function setmdp($mdp){
        $this->mdp = $mdp;
    }
    function setgrade($grade){
        $this->grade = $grade;
    }
    
    function getid(){
        return $this->id;
    }
    function getnom_utilisateur(){
        return $this->nom_ulisateur;
    }
    function getmdp(){
        return $this->mdp;
    }
    function getgrade(){
        return $this->grade;
    }

    public function create(){
        //manque un truc ?
        $stmt = $sql->prepare("INSERT INTO User (nom_utilisateur, mdp, grade) VALUES (:nom_utilisateur, :mdp, :grade);");
        $stmt->binparam(":nom_utilisateur",$nom_utilisateur);
        $stmt->binparam(":mdp",$mdp);
        $stmt->binparam(":grade",$grade);
        return $stmt->exexute();
    }
}
?>