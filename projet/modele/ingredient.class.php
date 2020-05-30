<?php
// *******************************************
// Projet
// Classe  : Ingredient 
// Auteurs : Gharbi Walid, Ayachi Imed 
// *******************************************


// Classe représentant une Ingredient
class Ingredient {
	// Attributs
	private $numero;        // int
	private $quantite;      // double
	private $unite;			// String
	private $nom;			// String
	
	// Constructeur
	public function __construct($unNumero, $uneQuantite, $uneUnite, $unNom) {
		$this->numero = $unNumero;
		$this->quantite = $uneQuantite;
		$this->unite = $uneUnite;
		$this->nom = $unNom;
	}
	
	// Accesseurs et mutateurs
	public function getNumero() { return $this->numero; }
	public function getQuantite() { return $this->quantite; }
	public function getUnite() { return $this->unite; }
	public function getNom() { return $this->nom; }

	// Affichage
	public function __toString() {
		$message = "Numero : ".$this->numero."<br /> Quantite : ".$this->quantite;
		$message.= "<br /> Unite : ".$this->unite."<br /> Nom : ".$this->nom;
		return $message;
	} 
}	

?>