<?php
	/* ==================================================================================
   	 * Description : DAO pour la classe Recette de la BD site_recette
     * Auteur      : Gharbi Walid, Ayachi Imed
	 * ==================================================================================
	*/
	
	// ============================ INLCUSIONS ==========================================
	// si la constante n'existe pas, on la crée
	if (defined("DOSSIER_BASE_INCLUDE") == false) {
		define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."projet/");
	}
	// Importe l'interface DAO et la classe Equipe
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/DAO.interface.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/recette.class.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/ingredient.class.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/etape.class.php");

	// ============================== CLASSE ============================================
	class RecetteDAO implements DAO {	

		/* ************************************************************************************** */
		/* Retourne une Recette en fonction de la clé primaire (code). Retourne null si non trouvé */
		/* ************************************************************************************** */
		public static function chercher($cles) { 
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}

			$uneRecette=null; 

			$requete= $connexion->prepare("SELECT * FROM recette WHERE code=?");
		  

			$requete->execute(array($cles));			
			
			if ($requete->rowCount() > 0) {
				$enregistrement=$requete->fetch();
				$uneRecette=new Recette($enregistrement['code'], $enregistrement['titre'], $enregistrement['description'],
									$enregistrement['nom_photo'], $enregistrement['auteur']);
			}

			$requete-> closeCursor();
			ConnexionBD::close();	
		  
			return $uneRecette;	 
		} 
		
		/* ************************************************************************************* */
		/* Retourne un tableau avec toutes les recettes                                          */
		/* ************************************************************************************* */
		static public function chercherTous() { 
			return self::chercherAvecFiltre("");
		} 
		
		/* ************************************************************************************* */
		/* Retourne un tableau avec toutes les recettes qui respectent les consitions du filtre  */
		/* ************************************************************************************* */
		static public function chercherAvecFiltre($filtre){ 
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}

			$liste = array(); 
				
			$requete= $connexion->prepare("SELECT * FROM recette ".$filtre);

			$requete-> execute();			

			foreach ($requete as $enregistrement) {
				$uneRecette=new Recette($enregistrement['code'], $enregistrement['titre'], $enregistrement['description'],
									$enregistrement['nom_photo'], $enregistrement['auteur']);
				array_push($liste, $uneRecette);
			}

			$requete-> closeCursor();
			ConnexionBD::close();	
			
			return $liste;	 
		} 

		/* ************************************************************************************* */
		/* Insère l'objet reçu en paramètre dans la table recette                                */
		/* ************************************************************************************* */
		static function inserer($uneRecette){ 
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}

			$tab=array( $uneRecette->getCode(),      $uneRecette->getTitre(),
						$uneRecette->getDescription(), $uneRecette->getNomPhoto(),
						$uneRecette->getAuteur()   );
			$commandeSQL  = "INSERT INTO recette (code,titre,description,auteur,nom_photo)";  
			$commandeSQL .=  "VALUES (?,?,?,?,?)";

			
			$requete = $connexion->prepare($commandeSQL);
			$requete->execute($tab);
			
			ConnexionBD::close();	
		}


		/* ********************************************************************************************  */
		/* Utilise l'objet reçu en paramètre pour modifier l'enreg. corresponadant dans la table recette */
		/* ********************************************************************************************  */
		static public function modifier($uneRecette) {
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}

			$commandeSQL = "UPDATE recette SET nom_photo='".$uneRecette->getNomPhoto()."',titre=".$uneRecette->getTitre();
			$commandeSQL .= ",description=".$uneRecette->getDescription().",auteur=".$uneRecette->getAuteur()." WHERE code='".$uneRecette->getCode()."'";

			$requete = $connexion->prepare($commandeSQL);			
			$requete->execute();
			
			ConnexionBD::close();	
		}

		/* ******************************************************************************************** */
		/* Supprime l'enregistrement dans la table recette corresponadant à l'objet reçu en paramètres   */
		/* ******************************************************************************************** */
		static public function supprimer($uneRecette){
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			$commandeSQL = "DELETE FROM recette WHERE code='".$uneRecette->getCode()."'";
			$requete = $connexion->prepare($commandeSQL);
			return	$requete->execute();
		} 
		
		static public function chercherEtapesUneRecette($codeRecette) {

			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}

			$liste = array();
			$uneEtape=null; 

			$requete= $connexion->prepare("SELECT * FROM etape WHERE code_recette =".$codeRecette);

			$requete-> execute();		
			
			foreach ($requete as $enregistrement) {
				$uneEtape=new Etape($enregistrement['numero'], $enregistrement['texte']);
				array_push($liste, $uneEtape);
			}

			//if ($requete->rowCount() > 0) {
			//	$enregistrement=$requete->fetch();
			//	$uneEtape=new Etape($enregistrement['numero'], $enregistrement['texte']);
			//}

			$requete-> closeCursor();
			ConnexionBD::close();	
		  
			return $liste;	

		}

		static public function chercherIngredientsUneRecette($codeRecette) {

			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}

			$liste = array();
			$unIngredient=null; 

			$requete= $connexion->prepare("SELECT * FROM ingredient WHERE code_recette=".$codeRecette);

			$requete-> execute();		

			foreach ($requete as $enregistrement) {
				$unIngredient=new Ingredient($enregistrement['numero'], $enregistrement['quantite'], 
					$enregistrement['unite'], $enregistrement['nom']);
				array_push($liste, $unIngredient);
			}
			
			//if ($requete->rowCount() > 0) {
			//	$enregistrement=$requete->fetch();
			//	$unIngredient=new Ingredient($enregistrement['numero'], $enregistrement['quantite'], 
			//		$enregistrement['unite'], $enregistrement['nom']);
			//}

			$requete-> closeCursor();
			ConnexionBD::close();	
		  
			return $liste;	

		}

		static public function insererEtapesUneRecette($codeRecette, $lesEtapes) {
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}

			$tab=array( $lesEtapes->getNumero(),      $codeRecette, $lesEtapes->getTexte());
			$commandeSQL  = "INSERT INTO etape (numero,".$codeRecette.",text)";  
			$commandeSQL .=  "VALUES (?,?,?)";

			
			$requete = $connexion->prepare($commandeSQL);
			$requete->execute($tab);
			
			ConnexionBD::close();	
		}

		static public function insererIngredientsUneRecette($codeRecette, $lesIngredients) {
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}

			$tab=array( $lesIngredients->getNumero(),      $codeRecette, $lesIngredients->getQuantite(),
						$lesIngredients->getUnite(), $lesIngredients->getNom());
			$commandeSQL  = "INSERT INTO recette (numero,".$codeRecette.",quantite,unite,nom)";  
			$commandeSQL .=  "VALUES (?,?,?,?,?)";

			
			$requete = $connexion->prepare($commandeSQL);
			$requete->execute($tab);
			
			ConnexionBD::close();	
		}
	}
	
?>