<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
?>


<?php
require_once ('../model/classes/utilisateur.php');
require_once ('../model/classes/ligneFraisAuForfait.php');
require_once ('../model/classes/fraisForfait.php');
require_once ('../include/dao.php');

if (isset($_POST['Ajouter'])) {
                //Creation objet lignefraisforfait
                $lff = new LigneFraisAuForfait();
				$lff1 = new LigneFraisAuForfait();
				$ff = new fraisForfait();
				$visiteur = new Utilisateur();
			
                $idVis = $_SESSION['id'];
				
                $mois =date("Ym");
                $libelle = $_POST['presta'];
                $quantite = $_POST['quantite'];
				
				$visiteur->setId($idVis);
				$ff->setId($libelle);
				$idPresta = $ff->getId();
				//echo $idPresta ; exit();
				//$lff->setId($viteur->getId());
				$lff->setVisiteur($idVis);
                $lff->setMois($mois);
                $lff->setFraisForfait($idPresta);
                $lff->setQuantite($quantite);
                //Ajoute une prestation
				// var_dump($lff); exit();
                 // echo "Bonjour";                 exit();
                $resu = $lff->insertFraisAuForfait();
			     
     
				header("Location:../view/frmGestionFrais.php");
}

if (isset($_POST['modifier'])) {
    $numLigne = $_POST["idFF"];
     $presta = $_POST['presta'];
       $qt = $_POST['quantite'];
        
    
     $lff = new LigneFraisAuForfait();
     $lff->setId($numLigne);
     $lff->setFraisForfait($presta);
       $lff->setQuantite($qt);
    // var_dump($lff); exit();
     $lff->updateLigneFF();
     header("Location:../view/frmGestionFrais.php");
    
    
  }
  