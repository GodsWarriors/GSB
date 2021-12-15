<!--Permet d'exploiter la session d'un utilisateur 
 et activer le tableau $_SESSION-->
 <?php
session_start();
?>

<?php
require_once ('../model/classes/utilisateur.php');
require_once ('../include/dao.php');



?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
		
		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="style.css" type="text/css"  />
        <title>Login</title>
    </head>
    <body>
	
        
    <?php
 
		//// isset détermine si une valeur définie et est differente de NULL
        if (isset($_POST['Valider']) ) {
            
     //Créer un objet $util de la classe Utilisateur. Cet objet est vide
            $util = new Utilisateur();

     //remplir le login et le pass de l'objet $util
            $util->setLogin($_POST['login']);
            $util->setMdp($_POST['mdp']);
			
           			 // echo 'bonjour';            
           //exit();
         
            //echo $util->getLogin();
            //
         
            //
            //$resu contient le resultat de requete traitée par la fonction verifierInfosConnexion
           // $resu contient soit 0 ligne soit 1 t-uplet d'un Utilisateur
            $resu = $util->verifierInfosConnexion();
            
            
            if (!isset($resu)) {
                header("Location:login.php");
            } else {
                //$_SESSION tableau php natif c'est une variable globale 
                //$_SESSION est un tableau associatif il contient tous les attribut de la table utilisateur : 
                //id, nom, prenom, adresse, ville, cp, dateEmbauche, login, mdp, idType
                $_SESSION = $resu;
                //var_dump($_SESSION);
                //exit();
             
                if ($resu["idType"] == "1") {
                    header("Location:../view/frmGestionFrais.php");
                }
                if ($resu["idType"] == "2") {
                    header("Location:formComptable.php");
				}
				
		}
		}
             
    ?>
	</body>
        
</html>