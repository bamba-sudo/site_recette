<!DOCTYPE html>
<html>
<head>
	<title> Accueil </title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<script type="text/javascript" src="../bootstrap/js/bootstrap.bundle.js"></script>
	<script src="../jquery/jquery-3.5.0.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<style type="text/css">
		.hauteur {
			height: 200px;
		}

		.padding {
			padding-top:50px;
		}
	</style>
</head>
<body class="bg-light" style="background-image: url('../images/entre.jpg'); background-size: 2000px auto;">
	<!-- Container -->
	<div class="container-fluid">
	<?php
// ============================ INLCUSIONS ==========================================
	// si la constante n'existe pas, on la crée
	if (defined("DOSSIER_BASE_INCLUDE") == false) {
		define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."projet/");
	}
	// Importe l'interface DAO et la classe Equipe
	include_once(DOSSIER_BASE_INCLUDE."vues/gabarits/entete.inc.php");
?>
<!-- Menu -->
		<div class="row mx-auto d-block pt-4" style="width: 850px;">
			<div class="col-md-12 bg-white text-center" style="opacity: 0.8">
				<nav class="navbar navbar-expand-md bg-light navbar-light">
					<!-- Brand -->
	  				<img class="navbar-brand" src="../images/menu.png" width="50" />
	  				<!-- Links -->
	  				<ul class="navbar-nav">
	    				<li class="nav-item">
	      					<a class="active nav-link" href="pageAccueil.php">Accueil</a>
	    				</li>
	    				<!-- Dropdown 1-->
	    				<li class="nav-item dropdown">
	      					<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
	        					À propos
	      					</a>
	      					<div class="dropdown-menu">
	        					<a class="dropdown-item" href="pageVoirInfo.php">Voir infos</a>
	        					<a class="dropdown-item" href="pageContact.php">Contact</a>
	      					</div>
	    				</li>
	    				<!-- Dropdown 2-->
	    				<li class="nav-item dropdown">
	      					<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
	        					Recettes
	      					</a>
	      					<div class="dropdown-menu">
	        					<a class="dropdown-item" href="pageRechercheDeRecettes.php">Recherche de recettes</a>
	        					<a class="dropdown-item" href="pageAffichageDeRecettes.php">Affichages d'une recette</a>
	      					</div>
	    				</li>
	    				<li class="nav-item">
	      					<a class="nav-link" href="pageCreationRecette.php">Création d'une recette</a>
	    				</li>
	    				<!-- Dropdown 3-->
	    				<li class="nav-item dropdown">
	      					<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
	        					Gestion du compte
	      					</a>
	      					<div class="dropdown-menu">
	        					<a class="dropdown-item" href="pageCreerCompte.php">Se creer un compte</a>
	        					<a class="dropdown-item" href="pageSeConnecter.php">Se connecter</a>
	        					<a class="dropdown-item" href="pageSeDeconnecter.php">Se deconnecter</a>
	      					</div>
	    				</li>
	  				</ul>
				</nav>
			</div>
		</div>
		<!-- Milieu -->
		<div class="row mx-auto d-block padding">
			<div class="col-md-12 padding text-center">
				<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../images/dejeuner.jpeg" width="1400">
      <div class="carousel-caption bg-dark rounded" style="opacity: 0.8;">
        <h3 class="text-uppercase text-warning"> Dejeuner </h3>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../images/hero.jpg" width="1400">
      <div class="carousel-caption bg-dark rounded" style="opacity: 0.8;">
        <h3 class="text-uppercase text-warning"> Diner </h3>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../images/repas.jpg" width="1400">
      <div class="carousel-caption bg-dark rounded" style="opacity: 0.8;">
        <h3 class="text-uppercase text-warning"> Souper </h3>
      </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>
			</div>
		</div>
	</div>
</body>
</html>