<?php
require_once ('utilisateur.php');
require_once ('fraisForfait.php');
require_once ('../include/dao.php');	

class LigneFraisAuForfait{
	private $id;
	private $visiteur;
	private $mois;
	private $fraisForfait ;
	private $quantite;
	
	function __construct() {
  }
  function setId($id) {
      $this->id = $id;
  }
  function setVisiteur($visiteur) {
      $this->visiteur = $visiteur;
  }
  function setMois($mois) {
      $this->mois = $mois;
  }
    function setFraisForfait($fraisForfait) {
      $this->fraisForfait = $fraisForfait;
  }
  
      function setQuantite($quantite) {
      $this->quantite = $quantite;
  }
  
  
  function insertFraisAuForfait(){


	  $dao = new Dao();
        //Requête SQL
        $sql = "INSERT INTO lignefraisforfait 
		(idVisiteur,mois,idFraisForfait,quantite)  VALUES (	
		'".$this->visiteur."', 
		'".$this->mois."',
		'".$this->fraisForfait."', 
		'".$this->quantite."' )";
        $resu = $dao->executeRequete($sql);  
  }
  //liste des frais au forfait du visiteur connecté
  function listeFraisAuForfait(){
    
    $dao=new Dao();  
  try{
  $sql= "SELECT l.id id1,idVisiteur,f.id id2,quantite, libelle,mois
  FROM  lignefraisforfait l,fraisforfait f
  WHERE  f.id =l.idFraisForfait and idVisiteur = '$this->visiteur' ";
  $resu= $dao->executeRequete($sql);            
                 return   $resu;
  }
  catch (PDOException $exception) {  
          echo "Connection error: " . $exception->getMessage();
      }
}
  
  
  
  public function updateLigneFF(){
        $dao = new Dao();
        $sql = "update lignefraisforfait
		set 
		    idFraisForfait= '$this->fraisForfait',
		    quantite='$this->quantite' 
		where id='$this->id'";
        $resu = $dao->executeRequete($sql);
    }
   //Suppression d'une ligne Frais au Forfait 
  function supprimerLigneFraisAuForfait(){
	  //Pour la connexion
	  $dao=new Dao();
	   try{
   //$id le numéro de la ligne à supprimer
	$sql = "DELETE FROM lignefraisforfait 
	WHERE id= '$this->id'";
	// On execute la requete
	$resu = $dao->executeRequete($sql);
	 return   $resu;
	   }
    catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
}
function LaLigneFraisAuForfait(){
	$dao = new Dao();
    $sql = "SELECT * FROM lignefraisforfait WHERE id= '$this->id'";
    $resu = $dao->executeRequete($sql);
    $ligne = $resu->fetch(PDO::FETCH_ASSOC);
    return $ligne;
    
}

  public static function lesMois(){
	  
	  $dao=new Dao();  
    try{
    $sql= "SELECT * FROM  mois order by id ";
    $resu= $dao->executeRequete($sql);            
                   return   $resu;
    }
    catch (PDOException $exception) {  
            echo "Connection error: " . $exception->getMessage();
        }
  }
  
  
  function verifLigneFraisAuForfait(){
	
    $dao=new Dao();
    $lfaf=null;
    $sql= "SELECT idVisiteur,mois,idFraisForfait FROM lignefraisforfait WHERE 
	mois = '$this->mois' 
	and idVisiteur = '$this->visiteur' 
	and idFraisForfait= '$this->fraisForfait' ";
    $resu= $dao->executeRequete($sql);
     $ligne = $resu->fetch(PDO::FETCH_ASSOC);
           // var_dump($ligne);
            if ($resu->rowCount() == 1) {
                   $lfaf=$ligne;            
            }
    return $lfaf;
}



function recapFraisAuForfait(){
	  //connexion
	  $dao=new Dao();  
    try{
		//Requête SQL
    $sql= "SELECT quantite, libelle,montant, montant*quantite sousTotal
	FROM lignefraisforfait l,fraisforfait f 
	WHERE f.id =l.idFraisForfait  
	and idVisiteur = '$this->visiteur' ";
    $resu= $dao->executeRequete($sql);            
                   return   $resu;
    }
    catch (PDOException $exception) {  
            echo "Connection error: " . $exception->getMessage();
        }
  }
  
  
  
    function totalFraisAuForfait(){
    $dao=new Dao();
    $total=null;
    		//Requête SQL
    $sql= "SELECT sum(quantite*montant) total, mois
	FROM lignefraisforfait l,fraisforfait f 
	WHERE f.id =l.idFraisForfait  
	and idVisiteur = '$this->visiteur'
    group by mois	";
    $resu= $dao->executeRequete($sql);
     $ligne = $resu->fetch(PDO::FETCH_ASSOC);
           
    return $ligne;
	
}
 
  
  function SommeParPresta(){
	  //connexion
	  $dao=new Dao();  
    try{
		//Requête SQL
    $sql= "SELECT libelle,sum(quantite*montant) 
	FROM lignefraisforfait l,fraisforfait f 
	WHERE f.id =l.idFraisForfait  
	and idVisiteur = '$this->visiteur' 
	agroup by libelle  ";
    $resu= $dao->executeRequete($sql);            
                   return   $resu;
    }
    catch (PDOException $exception) {  
            echo "Connection error: " . $exception->getMessage();
        }
  }
  
  
  
}


?>

