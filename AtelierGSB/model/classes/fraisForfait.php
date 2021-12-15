<?php
class FraisForfait {
  private $id;
  private $libelle;
  private $montant;
  // le constructeur est une fonction qui permet d'initialiser un objet vide
  //L'objet c'est l'initialisation des attributs d'une classe 
  //on parle :d'instanciation d'un objet .
  function __construct() {     
  }
  function setId($id) {
      $this->id = $id;}
    function getId() {
      return $this->id ;}
  function setLibelle($libelle) {
      $this->libelle = $libelle;}
  function setMontant($montant) {
      $this->montant = $montant;}

}
        
        
?>

