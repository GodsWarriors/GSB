<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>

<?php

require_once ('../model/classes/ligneFraisHorsForfait.php');
require_once('../view/frmGestionHorsForfaits.php');
require_once ('../include/dao.php');

if (isset($_POST['Ajouter'])) {
                //Creation objet lignefraisforfait
                $lfhf = new LigneFraisHorsForfait();
				//$lff1 = new LigneFraisAuForfait();
				
				//$visiteur = new Utilisateur();
			
                $visiteur = $_SESSION['id'];
				
                
                $presta = $_POST['description'];

                $montant = $_POST['montant'];
				$jour = $_POST['jour'];
				$mois = $_POST['mois'];
				$annee = $_POST['annee'];
				$date = $annee."-".$mois."-".$jour;
				
				
				$lfhf->setVisiteur($visiteur);
				$lfhf->setPrestation($presta);
				$lfhf->setMontant($montant);
				$lfhf->setdatePresta($date);
				
				//$lfhf->setDate($justif);
				
				
				//var_dump($lfhf); exit();
               
				  $resu=$lfhf->insertLFHF1();
				
				header("Location:../view/frmGestionHorsForfaits.php");
}
/*supprimer est le nom name="supprimer" du button d
dans la vue ligneFraisAuForfait.php

if (isset($_POST['Supprimer'])) {
	
	$numLigne = $_POST["IdPresta"];
	//echo ($numLigne); echo "Bonjour"; exit();
	$lff = new LigneFraisAuForfait();
	$lff->setId($numLigne);
	$lff->supprimerLigneFraisAuForfait();
	header("Location:../view/frmLigneFraisAuForfait.php");
	
}

if (isset($_POST['modifier'])) {
	$numLigne = $_POST["id"];
	 $presta = $_POST['prestation'];
     $montant = $_POST['montant'];
	    
	
	 $lff = new LigneFraisHorsForfait();
	 $lff->setId($numLigne);
	 $lff->setFraisForfait($presta);
     $lff->setQuantite($montant);
	// var_dump($lff); exit();
	 $lff->UpdateHorsForfait();
	 header("Location:../view/frmGestionHorsForfaits.php");
	
	
}
*/



?>