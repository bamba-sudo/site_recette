<!DOCTYPE html>
<!------------------------------------------------------------------>
<!---- Projet                                        			 --->
<!---- Fichier de test unitaire pour la classe Ingredient        ---> 
<!---- Auteurs : Gharbi Walid, Ayachi Imed                       --->
<!------------------------------------------------------------------>
<html lang="fr">
<head>
	<title>Projet TestIngredient</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="../../css/styleTable.css" />
</head>
<body >
	<!---- Création d'une Ingredient ---->
	<h1>Fichier de test pour la classe Ingredient</h1>
	<?php
		include_once "../ingredient.class.php"; 
		$unIngredient=new Ingredient(1, 20, "ml", "Eau");
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
				<td><?php echo $unIngredient;?></td>
			</tr>
			<tr>
				<td>getNumero<br/>getQuantite<br/>getUnite<br/>getNom</td>
				<td>
					<?php
						echo $unIngredient->getNumero()."<br/>";
						echo $unIngredient->getQuantite()."<br/>";
						echo $unIngredient->getUnite()."<br/>";
						echo $unIngredient->getNom();
					?>
				</td>
			</tr>
			<tr>
				<td>__toString</td>
				<td>
					<?php
						echo $unIngredient;
					?>
				</td>
			</tr>
		</tbody>
	</table>
	<br/>
</body>
</html>
