<?php
require('utilisateur.php');
require('../include/dao.php');	

class LigneFraisHorsForfait{
	private $id;
	private $visiteur;
	private $prestation;
	private $datePresta;
	private $montant ;

  function __construct() {
  }
  function setId($id) {
      $this->id = $id;
  }
  function setVisiteur($visiteur) {
      $this->visiteur = $visiteur;
  }

    function setPrestation($presta) {
      $this->prestation = $presta;
  }
  
    function setdatePresta($date) {
      $this->datePresta = $date;
  }
      function setMontant($montant) {
      $this->montant = $montant;
  }

  function listeFraisHorsForfait(){
    
    $dao=new Dao();  
  try{
  $sql= "SELECT id,visiteur,montant, 
  prestation,datePresta
  FROM  lignefraishorsforfait
  WHERE visiteur = '$this->visiteur'";
  $resu= $dao->executeRequete($sql);            
                 return   $resu;
  }
  catch (PDOException $exception) {  
          echo "Connection error: " . $exception->getMessage();
      }
}
  
	  function insertLFHF1(){


	  $dao = new Dao();
        //Requête SQL
        $sql = "INSERT INTO  lignefraishorsforfait
		(visiteur, prestation, datePresta,montant)   VALUES (	
		'".$this->visiteur."', 
		'".$this->prestation."',
		'".$this->datePresta."', 
		'".$this->montant."' )";
        $resu = $dao->executeRequete($sql);  
  }

  function supprimerHorsForfait(){
    $dao=new Dao();
    try{
      $sql = "DELETE FROM lignefraishorsforfait WHERE id='$this->id'";
      $resu = $dao->executeRequete($sql);
      return $resu;
    }
    catch (PDOException $exception) {
      echo "Connection error: " . $exception->getMessage();
    }

  }

  function UpdateHorsForfait(){
    $dao = new Dao();
    $sql = "UPDATE lignefraishorsforfait 
    SET montant='$this->montant' AND prestation='$this->prestation'
    WHERE id='$this->id'";
    $resu = $dao->executeRequete($sql);
}

function LigneHorsForfait() {
  $dao=new Dao();  
  try{
  $sql= "SELECT id ,visiteur, prestation,datePresta ,montant
  FROM  lignefraishorsforfait
  WHERE  visiteur = '$this->visiteur' ";
  $resu= $dao->executeRequete($sql);            
                 return   $resu;
  }
  catch (PDOException $exception) {  
          echo "Connection error: " . $exception->getMessage();
      }
}
  
}


?>

