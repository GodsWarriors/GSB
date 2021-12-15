<!DOCTYPE html>
<?php
session_start();
?>
<?php 
require_once ('../model/classes/ligneFraisHorsForfait.php');
require_once ('../include/dao.php');
require_once('../fonctions/fcnMois.php');
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
  $mois = date('F');
?>
    </div>


<body>
<?php
   
   if (isset($_POST["modif"])){
	 $lff=$lff= new LigneFraisHorsForfait();
	 $lff->setID($_POST['idPresta']);
	 $resu = $lff->LigneHorsForfait();
	 var_dump ($resu); 
	 
  }
  
  if (isset($_POST["supp"])){
	  $lff= new LigneFraisHorsForfait();
	  $lff->setID($_POST['idPresta']);
	  $lff->supprimerHorsForfait();
  }
  ?>

<form class="form-horizontal" method="POST" action="../controller/ctrlGestionHorsForfaits.php">
<fieldset>
<h1>Gestion des Frais Hors Forfait</h1>
<br>
<!-- Select Basic -->

<div class="form-group">
  <label class="col-md-5 control-label" for="description">Description</label>  
  <div class="col-md-2">
  <input id="description" name="description" type="text" placeholder="" class="form-control input-md" required=""
  value="<?php if(isset($_POST['modif'])) echo $resu['prestation'];?>">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-5 control-label" for="montant">Montant</label>  
  <div class="col-md-2">
  <input id="montant" name="montant" type="text" placeholder="" class="form-control input-md" required=""
  value="<?php if(isset($_POST['modif'])) echo $resu['montant'];?>">
    
  </div>
</div>

<!-- Select Basic -->
<!-- modification du 09/12/2021 -->
<div class="form-group">
  <label class="col-md-5 control-label">Date</label>
  <div class="col-md-3">
  <select id="jour" name="jour" class="form inputatl">
      <option selected>--Jour--</option>
      <?php for($i=1; $i<=31;$i++) { ?>
        <option value="<?php echo $i ?>"><?php echo $i ?></option>
        <?php } ?>

    </select>
    <input id="mois" name="mois"  type="month" disabled="disabled" value="<?php echo date('F'); ?>">
    <input id="annee" name="annee"  type="month" disabled="disabled" value="<?php echo date('Y'); ?>">
  </div>
</div>
<!-- modification du 09/12/2021 -->

<!-- Button -->
<div class="form-group">
  <label class="col-md-5 control-label"></label>
  <div class="col-md-4">
    <button id="Ajouter" name="Ajouter" class="btn btn-primary">Ajouter</button>
    <button  type="submit" name="modifier"  class="btn btn-success">Enregister les modification</button>
  </div>
</div>
</fieldset>
</form>
<?php
           $lff = new LigneFraisHorsForfait();
          $visiteur = $_SESSION['id'];
          $lff->setVisiteur($visiteur);
          $lesLignesHorsFrais=$lff->listeFraisHorsForfait();
          ?>
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">			
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-4">
											
					</div>
					<div class="col-xs-4">
						<h2 class="text-center">Les Frais <b>Hors Forfaits</b></h2>
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
                        <th>Description</th>
                        <th>Montant</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <?php 	
	while($row = $lesLignesHorsFrais->fetch(PDO::FETCH_ASSOC)){ ?>
            <tr>
			<form method="POST" action="">
      <input type="hidden" name="idPresta" value="<?php echo $row['id']; ?>">
      <input type="hidden"name="visiteur" value="<?php echo $row['visiteur']; ?>">
      <td><?php echo $row['datePresta']; ?></td>
				 <td><?php echo $row['prestation']; ?></td>
				 <td><?php echo $row['montant']; ?></td>
				<td class="text-center"><button type="submit" id="modif" name="modif" 
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
