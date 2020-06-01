<?php
/*
   Description : fonctions d'affichage pour les menus
   Auteurs     : Gharbi Walid	
*/

// Fonction qui affiche les menus en fonction du tableau de chaine de caracrtères reçu en paramètre
// Le format des chaines est le suivant
//    TexteÀAfficher:Hyperliens:IndicateurItemActif(actif/non-actif)
// Chaque phrase doit créer :
//    Une division ayant la classe css "menu-item" contenant l'hyperlien contenant le texte à afficher
//    Si l'indicateur d'item est à actif, on ajoute la classe css "menu-item-selectionne" à la division
function afficherItemsMenu($tableau){
	foreach ($tableau as $unItem) {
		$infos = explode(";", $unItem);
		$itemSpecial = "";
		if ($infos[2] == "actif") {
			$itemSpecial = "active";
		}

		if ($infos[0] == "Accueil") {
			echo '<li class="nav-item">';
			echo '<a class="'.$itemSpecial.' nav-link" href="pageAccueil.php"> Accueil </a>';
			echo '</li>';
		} elseif ($infos[0] == "Creation d'une recette") {
			echo '<li class="nav-item">';
			echo '<a class="'.$itemSpecial.' nav-link" href="pageCreationRecette.php"> Creation d une recette </a>';
			echo '</li>';
		} elseif ($infos[0] == "Voir Info") {
		echo '<li class="nav-item dropdown">';
		echo '<a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown"> A propos </a>';
		echo "</li>";
		echo '<div class="dropdown-menu">';	
		echo '<a class="dropdown-item" href="pageVoirInfo.php">Voir infos</a>';
		echo '<a class="dropdown-item" href="pageContact.php">Contact</a>';
		echo '</div></li>';
		} elseif ($infos[0] == "Recherche De Recettes") {
		echo '<li class="nav-item dropdown">';
		echo '<a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown"> Recettes </a>';
		echo "</li>";
		echo '<div class="dropdown-menu">';	
		echo '<a class="dropdown-item" href="#">Recherche de recettes</a>';
		echo '<a class="dropdown-item" href="#">Affichages dune recette</a>';
		echo '</div></li>';
		} elseif($infos[0] == "Se Creer Un Compte") {
		echo '<li class="nav-item dropdown">';
		echo '<a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown"> Gestion du compte </a>';
		echo "</li>";
		echo '<div class="dropdown-menu">';	
		echo '<a class="dropdown-item" href="#"> '.$infos[0].' </a>';
		echo '<a class="dropdown-item" href="#"> '.$info[0].' </a>';
		echo '</div></li>';
		}
	}
}

// on remonte qu'une seule fois car cette ne sera utilisée
// que dans les du dossier vue (on va arranger cela au Labo6 ou 7) 
include_once DOSSIER_BASE_INCLUDE."/modele/equipe.class.php"; 

// Fonction qui le classement dans un tableau HTML
function afficherClassement($tableau){
	echo "<table>";
	echo "<thead>";
	echo "<tr>";
	echo "<th></th><th>Parties<br/>Jouées</th><th>Victoires</th><th>Défaites</th><th>Nulles</th><th>Points</th>";
	echo "</tr>";
	echo "</thead>";
	echo "<tbody>";
	foreach ($tableau as $uneEquipe) {
		echo "<tr>";
		echo "<th><img alt='Logo' src='".DOSSIER_BASE_LIENS."/images/".$uneEquipe->getNom().".png' height='40' /><br/>".$uneEquipe->getNom()."</th>";
		echo "<td>".$uneEquipe->calculerMatchsJoues()."</td>";
		echo "<td>".$uneEquipe->getVictoires()."</td>";
		echo "<td>".$uneEquipe->getDefaites()."</td>";
		echo "<td>".$uneEquipe->getNulles()."</td>";
		echo "<td>".$uneEquipe->calculerPoints()."</td>";
		echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";
}

// Nouvelle fonction qui génère le tableau de menu en fonction de 
// du type d'acteur (visiteur ou utilisateur) et de l'option active (correspondant
// à la partie affichée du menu
function genererTableauMenu($acteur,$optionActive){
	// liens du  communs à tous les acteurs
	$tab= [ "Accueil;".DOSSIER_BASE_LIENS."/index.php;non-actif",
	        "Voir Info;".DOSSIER_BASE_LIENS."/index.php/?action=seConnecter;non-actif",
	        "Contact;".DOSSIER_BASE_LIENS."/index.php/?action=voirEquipes;non-actif",
	        "Recherche De Recettes;".DOSSIER_BASE_LIENS."/index.php/?action=voirEquipes;non-actif",
	        "Affichage De Recettes;".DOSSIER_BASE_LIENS."/index.php/?action=voirEquipes;non-actif",
	       	//"Creation d'une recette;".DOSSIER_BASE_LIENS."/index.php/?action=voirEquipes;non-actif",
	       	"Se Creer Un Compte;".DOSSIER_BASE_LIENS."/index.php/?action=voirEquipes;non-actif",
	       	"Se Connecter;".DOSSIER_BASE_LIENS."/index.php/?action=voirEquipes;non-actif",
	       	//"Se Deconnecter;".DOSSIER_BASE_LIENS."/index.php/?action=voirEquipes;non-actif"];
			
	// pour un acteur utilisateur connecté qui peut modifier des matchs
	// on modifie l'option de se connecter et on ajoute l'option de gérer les matchs
	if ($acteur=="utilisateur") {
	    $tab[6]="Se Deconnecter;".DOSSIER_BASE_LIENS."/index.php/?action=seDeconnecter;non-actif";
		array_push($tab,"Creation d'une recette;".DOSSIER_BASE_LIENS."/index.php/?action=voirEquipes;non-actif");	
	}
	
	// choisir le lien actif 
	$i=0;
	for ($i=0;$i<count($tab);$i=$i+1){
		if (strpos($tab[$i],$optionActive)===0) {
			$tab[$i]=str_replace("non-actif","actif",$tab[$i]);
		} 
	}
	return $tab;
}

function afficherErreurs($tab) {
	if (count($tab)!=0) {
		echo "<div class='erreur'>";
		echo "<h3>Erreurs</h3>";
		echo "<ul>";
		foreach ($tab as $message){
			echo "<li>".$message."</li>";
		}
		echo "</ul>";
		echo"</div>";
	}	
}
?>