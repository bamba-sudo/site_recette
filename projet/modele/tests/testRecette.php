<!DOCTYPE html>
<!------------------------------------------------------------------>
<!---- Projet                                        			 --->
<!---- Fichier de test unitaire pour la classe Recette           ---> 
<!---- Auteurs : Gharbi Walid, Ayachi Imed                       --->
<!------------------------------------------------------------------>
<html lang="fr">
<head>
	<title>Projet TestRecette</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="../../css/styleTable.css" />
</head>
<body >
	<!---- Création d'une recette ---->
	<h1>Fichier de test pour la classe Recette</h1>
	<?php
		include_once "../etape.class.php"; 
		include_once "../ingredient.class.php"; 
		include_once "../recette.class.php";
		$unIngredient=new Ingredient(1, 20, "ml", "Eau");
		$uneEtape=new Etape(1, "Manger"); 
		$uneRecette=new Recette(2, "Robinet", "Boire", "eau.png", "Walid");
	?>

	<!---- Utilisation et affichage des méthodes -->
	<table>
		<thead>
			<tr>
				<th>Méthode</th>
				<th>Résultat</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>toString</td>
				<td><?php echo $uneRecette;?></td>
			</tr>
			<tr>
				<td>getCode<br/>getTitre<br/>getDescription<br/>getNomPhoto<br/>getAuteur<br/>getIngredients<br/>getEtapes2</td>
				<td>
					<?php
						echo $uneRecette->getCode()."<br/>";
						echo $uneRecette->getTitre()."<br/>";
						echo $uneRecette->getDescription()."<br/>";
						echo $uneRecette->getNomPhoto()."<br/>";
						echo $uneRecette->getAuteur()."<br/>";
						echo $uneRecette->getIngredients()."<br/>";
						echo $uneRecette->getEtapes();
					?>
				</td>
			</tr>
			<tr>
				<td>ajouterUnIngredient<br/>ajouterUneEtape</td>
				<td>
					<?php
						echo $uneRecette->ajouterUnIngredient($unIngredient)."<br/>";
						echo $uneRecette->ajouterUneEtape($uneEtape);
					?>
				</td>
			</tr>
			<tr>
				<td>__toString</td>
				<td>
					<?php
						echo $uneRecette;
					?>
				</td>
			</tr>
		</tbody>
	</table>
	<br/>
</body>
</html>
