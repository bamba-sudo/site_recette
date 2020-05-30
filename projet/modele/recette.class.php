<?php
// *******************************************
// Projet
// Classe  : Recette 
// Auteurs : Gharbi Walid, Ayachi Imed 
// *******************************************


// Classe représentant une Recette
class Recette {
	// Attributs
	private $code;         	// int
	private $titre;       	// String
	private $description;   // String
	private $nomPhoto;    	// String
	private $auteur;      	// String
	private $ingredients = array(); 	// array
	private $etapes = array();		// array
	
	// Constructeur
	public function __construct($unCode, $unTitre, $uneDescription, $unNomPhoto, $unAuteur) {
		$this->code = $unCode;
		$this->titre = $unTitre;
		$this->description = $uneDescription;
		$this->nomPhoto = $unNomPhoto;
		$this->auteur = $unAuteur;
	}
	
	// Accesseurs et mutateurs
	public function getCode() { return $this->code; }
	public function getTitre() { return $this->titre; }
	public function getDescription() { return $this->description; }
	public function getNomPhoto() { return $this->nomPhoto; }
	public function getAuteur() { return $this->auteur; }
	public function getIngredients() {
		$limite = count($this->ingredients);
		if ($limite == 0) {
			return "Aucun Ingredient";
		} else {
			for ($i=0; $i <= $limite ; $i++) { 
			return $this->ingredients[$i];
		}
		}

	}
	public function getEtapes() {
		$limite = count($this->etapes);
		if ($limite == 0) {
			return "Aucune Etape";
		} else {
			for ($i=0; $i <= $limite ; $i++) { 
			return $this->etapes[$i];
		}

		}
	}

	// Autres méthodes
	public function ajouterUnIngredient($unIngredient) {

		array_push($this->ingredients, $unIngredient);

	}

	public function ajouterUneEtape($unEtape) {

		array_push($this->etapes, $unEtape);

	}

	// Affichage
	public function __toString() {
		$message = "Code : ".$this->code."<br /> Titre : ".$this->titre;
		$message.= "<br /> Description : ".$this->description."<br /> Nom de la photo : ".$this->nomPhoto;
		$message.= "<br /> Auteur : ".$this->auteur."<br /> Ingredient : ".$this->getIngredients();
		$message.= "<br /> Etape : ".$this->getEtapes();
		return $message;
	} 
}	

?>