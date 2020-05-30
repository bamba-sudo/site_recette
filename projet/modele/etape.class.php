<?php
// *******************************************
// Projet
// Classe  : Etape 
// Auteurs : Gharbi Walid, Ayachi Imed 
// *******************************************


// Classe représentant une Etape
class Etape {
	// Attributs
	private $numero;        // int
	private $description;   // String
	
	// Constructeur
	public function __construct($unNumero, $uneDescription) {
		$this->numero = $unNumero;
		$this->description = $uneDescription;
	}
	
	// Accesseurs et mutateurs
	public function getNumero() { return $this->numero; }
	public function getDescription() { return $this->description; }

	// Affichage
	public function __toString() {
		$message = "Numero : ".$this->numero."<br /> Description : ".$this->description;
		return $message;
	} 
}	

?>