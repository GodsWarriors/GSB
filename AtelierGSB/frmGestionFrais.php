<?php
session_start();
?>
<?php 
require_once ('../model/classes/utilisateur.php');
require_once ('../model/classes/ligneFraisAuForfait.php');
require_once ('../model/classes/fraisForfait.php');
require_once ('../include/dao.php');
require_once('../fonctions/fcnMois.php');
require_once('../controller/ctrl_gestion_frais.php');
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!------ Include the above in your HEAD tag ---------->

<?php include("header.php") ;?> 

      <?php
      date_default_timezone_set('Europe/Paris');
  $date = date('d-m-y H:i');
  $annee = date('Y');
?>
    </div>




<body>
<?php
   
   if (isset($_POST["choisir"])){
    $lff=$lff= new LigneFraisAuForfait();
    $lff->setID($_POST['IdPresta']);
    $resu = $lff->LaLigneFraisAuForfait();
    //var_dump ($resu); exit(); 
    
   }


   

  
  if (isset($_POST["supp"])){
	  $lff= new LigneFraisAuForfait();
	  $lff->setID($_POST['IdPresta']);
	  $lff->supprimerLigneFraisAuForfait();
  }
  ?>

<form class="form-horizontal" method="post" action="../controller/ctrl_gestion_frais.php">
<fieldset>
<h1>Gestion des Frais au Forfait</h1>
<br>
<div class="col-sm-1">
		<input id="idFF" name="idFF" ﻿ type="hidden"  placeholder="" 
		class="form-control" value="<?php if(isset($_POST['choisir'])) echo $resu['id'] ;?>">    
		</div>
<!-- Select Basic -->

<div class="form-group">
  <label class="col-md-4 control-label" for="presta">Sélectionner</label>
  <div class="col-md-2">
    <select id="presta" name="presta" class="form inputatl">
      <option value="">---Choisir la presta---</option>
      <option <?php if(isset($_POST['choisir']) 
	       &&($resu['idFraisForfait'] == 'KM'))
	  { echo 'selected="selected"'; } ?>  value="KM">KM</option>

      <option <?php if(isset($_POST['choisir']) 
	       &&($resu['idFraisForfait'] == 'ETP'))
	  { echo 'selected="selected"'; } ?> value="ETP">Étapes</option>

<option <?php if(isset($_POST['choisir']) 
	       &&($resu['idFraisForfait'] == 'NUI'))
	  { echo 'selected="selected"'; } ?> value="NUI">Nuité</option>

<option <?php if(isset($_POST['choisir']) 
	       &&($resu['idFraisForfait'] == 'REP'))
	  { echo 'selected="selected"'; } ?> value="REP">Repas</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-5 control-label" for="quantite">Quantité</label>  
  <div class="col-md-1">
  <input id="quantite" name="quantite" type="text" placeholder="" class="form-control input-md" required=""
  value="<?php if(isset($_POST['choisir'])) echo $resu['quantite'];?>">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-5 control-label" for="mois">Mois</label>
  <div class="col-md-4">
    <input id="mois" name="mois"  type="month" disabled="disabled" value="<?php echo date("F , Y"); ?>">
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-5 control-label" ></label>
  <div class="col-md-4">
    <button id="Ajouter" name="Ajouter" class="btn btn-primary">Ajouter</button>
    <button  type="submit" name="modifier" class="btn btn-success">Enregister les modification</button>
  </div>
</div>
</fieldset>
</form>
<?php
           $lff = new LigneFraisAuForfait();
          $idVis = $_SESSION['id'];
          $lff->setVisiteur($idVis);
          $lesLignesFrais=$lff->listeFraisAuForfait();
          ?>
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">			
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-4">
											
					</div>
					<div class="col-xs-4">
						<h2 class="text-center">Les Frais <b>au Forfaits</b></h2>
					</div>
                    <div class="col-xs-4">
                        <div class="search-box">
							<div class="input-group">
								<span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
								<input type="text" class="form-control" placeholder="Search&hellip;">
							</div>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Préstation</th>
                        <th>Quantité</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <?php 	
	while($row = $lesLignesFrais->fetch(PDO::FETCH_ASSOC)){ ?>
            <tr>
			<form method="POST" action="">
      <input type="hidden" name="IdPresta" value="<?php echo $row['id1']; ?>">
      <input type="hidden"name="IdVis" value="<?php echo $row['idVisiteur']; ?>">
          <td> <?php echo MoisLettres(substr($row['mois'],4,2))." ".$annee; ?></td>
				 <td><?php echo $row['libelle']; ?></td>
				 <td><?php echo $row['quantite']; ?></td>
				<td class="text-center"><button type="submit" id="choisir" name="choisir" 
				class="btn btn-info glyphicon glyphicon-edit"></button>		
				<button type="submit" id="supp" name="supp" 
				class="btn btn-danger glyphicon glyphicon-trash"></button>
        
				</td>
				</form>
            </tr>
	<?php } 	?>   
                
            </table>
        </div>
    </div>        
</div>     
</body>
</html>
