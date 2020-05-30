<!-- 
  ==============================================================================
  Description : fichier de tests pour la classe RecetteDAO
  Auteur      : Gharbi Walid
  ==============================================================================
-->

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Projet TestRecetteDAO</title>
	<meta charset="utf-8" />
	<style>
		h1 {background-color:black;color:white;}
		h2 {background-color:#CCCCCC;}
	</style>
</head>
<body >
	<!-- ======================= Inclusions ============================================== -->
	<h1>Test pour la classe EquipeDAO</h1>
	<?php
		// si la constante n'existe pas, on la crée
		if (defined("DOSSIER_BASE_INCLUDE") == false) {
			define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."projet/");
		}
		// Importe l'interface DAO et la classe Produit
		include_once(DOSSIER_BASE_INCLUDE."modele/recette.class.php");
		include_once(DOSSIER_BASE_INCLUDE.'modele/DAO/RecetteDAO.class.php');
	?>
	
	<!-- ======================= Test : chercher ========================================= -->
	<h2>Méthode chercher</h2>
	<?php 
		$uneRecette = RecetteDAO::chercher(1);
		echo "<ul><li>".$uneRecette."</li></ul>";

		$uneRecette = RecetteDAO::chercher(2);
		echo "<ul><li>".($uneRecette?$uneRecette:'null')."</li></ul>";
	?>

	<!-- ======================= Test : chercherTous ==================================== -->
	<h2>Méthode chercherTous</h2>
	<?php 
		$uneListe = RecetteDAO::chercherTous();
		echo "<ul>";
		if (count($uneListe)==0) {
			echo "<li>Aucune recette trouvée</li>";
		}
		foreach ($uneListe as $uneRecette){
			echo "<li>".$uneRecette."</li>";
		}
		echo "</ul>";
	?>

	<!-- ======================= Test : chercherAvecFiltre =============================== -->
	<h2>Méthode chercherAvecFiltre</h2>
	<?php 
		$uneListe = RecetteDAO::chercherAvecFiltre("WHERE code=1");
		echo "<ul>";
		foreach ($uneListe as $uneRecette){
			echo "<li>".$uneRecette."</li>";
		}
		echo "</ul>";
	?>

	<!-- ======================= Test : inserer ========================================= -->
	<h2>Méthode inserer</h2>
	<?php 
		$uneRecette = new Recette(2, "Hamburger", "viande sur du pain", "Walid Gharbi", "Hamburger.jpg");
		RecetteDAO::inserer($uneRecette);
		$uneRecette =RecetteDAO::chercher(2);
		echo "<ul><li>".$uneRecette."</li></ul>";
	?>

	<!-- ======================= Test : chercher Ingredient ========================================= -->
	<h2>Méthode chercher Ingredient</h2>
	<?php 
		$uneListe = RecetteDAO::chercherIngredientsUneRecette(1);
		echo "<ul>";
		foreach ($uneListe as $unIngredient){
			echo "<li>".$unIngredient."</li>";
		}
		echo "</ul>";
	?>

	<!-- ======================= Test : chercher Etape ========================================= -->
	<h2>Méthode chercher Ingredient</h2>
	<?php 
		$uneListe = RecetteDAO::chercherEtapesUneRecette(1);
		echo "<ul>";
		foreach ($uneListe as $uneRecette){
			echo "<li>".$uneRecette."</li>";
		}
		echo "</ul>";
	?>

</body>
</html>
