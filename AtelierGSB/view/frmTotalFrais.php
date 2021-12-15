<!DOCTYPE html>
<?php
session_start();
?>

<?php
require_once ('../model/classes/ligneFraisAuForfait.php');
require_once ('../model/classes/fraisForfait.php');
require_once ('../fonctions/fcnMois.php');
$lff = new LigneFraisAuForfait();
$idVis = $_SESSION['id'];
$lff->setVisiteur($idVis);
$recapLignesFrais=$lff->recapFraisAuForfait();
$recapTotal = $lff->totalFraisAuForfait();

?>


<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
</head>
<body>
<?php include("header.php") ;?> 


    <div class="container">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        
				
				<h2><?php echo "Mois/Année : ". substr($recapTotal["mois"],3,2)."-"
				.substr($recapTotal["mois"],0,4) ?></h2>
				
                       
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                           
                            <th>Prestation</th>
                            <th>Quantite</th>
							<th>Montant</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php 	
				
	      while($row = $recapLignesFrais->fetch(PDO::FETCH_ASSOC)){ ?>
		  
                     <tr>
                        
						<td><?php echo $row['libelle']; ?></td>
                        
                        <td><?php echo $row['quantite']; ?></td>
						<td><?php echo $row['montant']; ?></td>
						<td><?php echo $row['sousTotal']; ?></td>
                     
                    </tr>
               
                       <?php } 	?>      
                    </tbody>
                </table>
				
				

            </div>
			
			<label class="col-primary">
			<?php echo "Total Frais au Forfait : ". $recapTotal["total"] ?> </label>
        <br/>
		<br />

		</div>        
    </div>     
</body>
</html>