<!DOCTYPE html>
<!------------------------------------------------------------------>
<!---- Projet                                        			 --->
<!---- Fichier de test unitaire pour la classe Etape             ---> 
<!---- Auteurs : Gharbi Walid, Ayachi Imed                       --->
<!------------------------------------------------------------------>
<html lang="fr">
<head>
	<title>Projet TestEtape</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="../../css/styleTable.css" />
</head>
<body >
	<!---- Création d'une recette ---->
	<h1>Fichier de test pour la classe Etape</h1>
	<?php
		include_once "../etape.class.php"; 
		$uneEtape=new Etape(1, "Manger");
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
				<td><?php echo $uneEtape;?></td>
			</tr>
			<tr>
				<td>getNumero<br/>>getDescription</td>
				<td>
					<?php
						echo $uneEtape->getNumero()."<br/>";
						echo $uneEtape->getDescription();
					?>
				</td>
			</tr>
			<tr>
				<td>__toString</td>
				<td>
					<?php
						echo $uneEtape;
					?>
				</td>
			</tr>
		</tbody>
	</table>
	<br/>
</body>
</html>
