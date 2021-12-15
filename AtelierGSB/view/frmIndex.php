<?php
session_start();
?>
<?php 
require_once ('../model/classes/utilisateur.php');
require_once ('../model/classes/ligneFraisAuForfait.php');
require_once ('../model/classes/fraisForfait.php');
require_once ('../Include/dao.php');
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!------ Include the above in your HEAD tag ---------->


<html lang="en">
<head>
  <title>GSB</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,500i,700,800i" rel="stylesheet">
  <link href="../Bootstrap/css/style.css" rel="stylesheet" id="bootstrap-css">
</head>
  <body>

    <nav class="navbar navbar-expand-sm   navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
          <li class="nav-item">
            <a class="nav-link" href="#">LFF</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">LFHF</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Déconnexion</a>
          </li>
           <!-- <li class="nav-item dropdown dmenu">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
              Dropdown link
            </a>
            <div class="dropdown-menu sm-menu">
              <a class="dropdown-item" href="#">Link 1</a>
              <a class="dropdown-item" href="#">Link 2</a>
              <a class="dropdown-item" href="#">Link 3</a>
              <a class="dropdown-item" href="#">Link 4</a>
              <a class="dropdown-item" href="#">Link 5</a>
              <a class="dropdown-item" href="#">Link 6</a>
            </div>
          </li> -->
          </ul>
        </div>
      </nav>

      <form class="form-horizontal">
<fieldset>

<div class="col text-center">
      <p>Bonjour <strong><?php echo " ".$_SESSION["nom"]." ".$_SESSION["prenom"];?></strong</p>
      <?php
      date_default_timezone_set('Europe/Paris');
  $date = date('d-m-y H:i');
  echo $date;
?>
    </div>

    <h1>Gestion des Frais au Forfait</h1>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="CHOIX">Sélectionner</label>
  <div class="col-md-4">
    <select id="CHOIX" name="CHOIX" class="form-control inputatl">
      <option value="">---Choisir la presta---</option>
      <option value="KM">KM</option>
      <option value="ETP">Étapes</option>
      <option value="NUI">Nuité</option>
      <option value="REP">Repas</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="QT">Quantité</label>  
  <div class="col-md-4">
  <input id="QT" name="QT" type="text" placeholder="" class="form-control input-md" value="<?php if(isset($_POST['modif'])) echo $resu['quantite'];?>" required="">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="DATE">Mois</label>
  <div class="col-md-4">
    <select id="DATE" name="DATE" class="form-control">
      <option>---Choisir le mois---</option>
      <option value="01">Janvier</option>
      <option value="02">Février</option>
      <option value="03">Mars</option>
      <option value="04">Avril</option>
      <option value="05">Mai</option>
      <option value="06">Juin</option>
      <option value="07">Juillet</option>
      <option value="08">Août</option>
      <option value="09">Septembre</option>
      <option value="10">Octobre</option>
      <option value="11">Novembre</option>
      <option value="12">Décembre</option>
    </select>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="BT"></label>
  <div class="col-md-4">
    <button id="BT" name="Ajouter" class="btn btn-primary">Ajouter</button>
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


      <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Elegant Table Design</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
body {
    color: #566787;
    background: #f5f5f5;
    font-family: 'Roboto', sans-serif;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
	min-width: 1000px;
    background: #fff;
    padding: 20px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
    font-size: 15px;
    padding-bottom: 10px;
    margin: 0 0 10px;
    min-height: 45px;
}
.table-title h2 {
    margin: 5px 0 0;
    font-size: 24px;
}
.table-title select {
    border-color: #ddd;
    border-width: 0 0 1px 0;
    padding: 3px 10px 3px 5px;
    margin: 0 5px;
}
.table-title .show-entries {
    margin-top: 7px;
}
.search-box {
    position: relative;
    float: right;
}
.search-box .input-group {
    min-width: 200px;
    position: absolute;
    right: 0;
}
.search-box .input-group-addon, .search-box input {
    border-color: #ddd;
    border-radius: 0;
}
.search-box .input-group-addon {
    border: none;
    border: none;
    background: transparent;
    position: absolute;
    z-index: 9;
}
.search-box input {
    height: 34px;
    padding-left: 28px;		
    box-shadow: none !important;
    border-width: 0 0 1px 0;
}
.search-box input:focus {
    border-color: #3FBAE4;
}
.search-box i {
    color: #a0a5b1;
    font-size: 19px;
    position: relative;
    top: 2px;
    left: -10px;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
}
table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}
table.table td:last-child {
    width: 130px;
}
table.table td a {
    color: #a0a5b1;
    display: inline-block;
    margin: 0 5px;
}
table.table td a.view {
    color: #03A9F4;
}
table.table td a.edit {
    color: #FFC107;
}
table.table td a.delete {
    color: #E34724;
}
table.table td i {
    font-size: 19px;
}    
.pagination {
    float: right;
    margin: 0 0 5px;
}
.pagination li a {
    border: none;
    font-size: 13px;
    min-width: 30px;
    min-height: 30px;
    padding: 0 10px;
    color: #999;
    margin: 0 2px;
    line-height: 30px;
    border-radius: 30px !important;
    text-align: center;
}
.pagination li a:hover {
    color: #666;
}	
.pagination li.active a {
    background: #03A9F4;
}
.pagination li.active a:hover {        
    background: #0397d6;
}
.pagination li.disabled i {
    color: #ccc;
}
.pagination li i {
    font-size: 16px;
    padding-top: 6px
}
.hint-text {
    float: left;
    margin-top: 10px;
    font-size: 13px;
}
</style>
<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
	// Animate select box length
	var searchInput = $(".search-box input");
	var inputGroup = $(".search-box .input-group");
	var boxWidth = inputGroup.width();
	searchInput.focus(function(){
		inputGroup.animate({
			width: "300"
		});
	}).blur(function(){
		inputGroup.animate({
			width: boxWidth
		});
	});
});
</script>
</head>
<body>
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
                        <th>#</th>
                        <th>Prestation</th>
                        <th>Date</th>
                        <th>Quantité</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <table>
                <?php 	
	while($row = $lesLignesFrais->fetch(PDO::FETCH_ASSOC)){ ?>
            <tr>
			<form method="POST" action="">
                <td><input type="hidden" name="IdPresta" value="<?php echo $row['id1']; ?>"></td>
                <td><input type="hidden"name="IdVis" value="<?php echo $row['idVisiteur']; ?>"</td>
                 <td> <?php echo $row['mois']; ?></td>
				 <td><?php echo $row['libelle']; ?></td>
				 <td><?php echo $row['quantite']; ?></td>
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
