<?php
/*******************************************************************************************
 *   FredLab Incorporated
 *                Projet :   Pages Persos @ Free
 *                  Page :   page.php
 *                Chemin :   http://127.0.0.1:8080/FredLab/scripts/classes/page.php
 *                  Type :   page de scripts
 *              Contexte :   php 7.3
 *              Fonction :   page de définition de la classe page
 *   Date mise en oeuvre :   24/10/2019
 *          Dernière MàJ :   13/10/2019
 *******************************************************************************************/
/***** *****    INCLUSIONS ET SCRIPTS   ***** *****/

/***** *****    DECLARATIONS   ***** *****/

/***** *****    CLASSES   ***** *****/
class Page{
	private $strName;			// Nom de la page avec extension
	private $strTitle;			// Titre de la page
	private $strDescription;	// Rôle de la page
	private $strKeyWords;		// Mots-clés de la page

	private $strPath;			// Chemin de la page
	private $strIndexPath;		// Chemin vers l'index

	private $strMediaPath;		// Chemin relatif vers medias/
	private $strPicturesPath;	// Chemin relatif vers medias/pics/
	private $strLogosPath;		// Chemin relatif vers medias/logos/

	private $strConfigPath;		// Chemin relatif vers config/
	private $strCssPath;		// Chemin relatif vers config/css/
	private $strScriptsPath;	// Chemin relatif vers scripts/
	
	//	***** ***** ***** SETTERS ***** ***** ***** //
	public function setName($strNewName){
		$this->strName = $strNewName;										// Nom de la page avec extension
		//  Informations pages du site
		$arrPages = array(
			"index.php" => array(
				"title" => "FredLab - Accueil",
				"description" => "Bienvenue",
				"keywords" => "informaticien, programmeur, projets, programmation, php, javascript, languages"),
			"candidat.php" => array(
				"title" => "FredLab - Candidat",
				"description" => "Bienvenue dans l'espace candidat",
				"keywords" => "informaticien, programmeur, projets, programmation, php, javascript, languages"),
			"coding.php" => array(
				"title" => "FredLab - Codeurs",
				"description" => "Bienvenue dans l'espace codeur",
				"keywords" => "informaticien, programmeur, projets, programmation, php, javascript, languages")
			);
		$this->setTitle($arrPages[$strNewName]['title']);					// Titre de la page
		$this->setDescription($arrPages[$strNewName]['description']);		// Rôle de la page
		$this->setKeywords($arrPages[$strNewName]['keywords']);				// Mots-clés de la page
		if ( $strNewName == "index.php" ){
			$this->strPath = "pages/";
			$this->strIndexPath = "";
			$this->strMediaPath = $GLOBALS['strMediaPath'];
			$this->strPicturesPath = $GLOBALS['strPicturesPath'];
			$this->strLogosPath = $GLOBALS['strLogosPath'];
			$this->strConfigPath = $GLOBALS['strConfigPath'];
			$this->strCssPath = $GLOBALS['strCssPath'];
			$this->strScriptsPath = $GLOBALS['strScriptsPath'];
		} else {
			$this->strPath = "";
			$this->strIndexPath = "../";
			$this->strMediaPath = "../".$GLOBALS['strMediaPath'];
			$this->strPicturesPath = "../".$GLOBALS['strPicturesPath'];
			$this->strLogosPath = "../".$GLOBALS['strLogosPath'];
			$this->strConfigPath = "../".$GLOBALS['strConfigPath'];
			$this->strCssPath = "../".$GLOBALS['strCssPath'];
			$this->strScriptsPath = "../".$GLOBALS['strScriptsPath'];
		}
	}
	public function setTitle($strNewTitle){
		$this->strTitle = $strNewTitle;
	}
	public function setDescription($strNewDescription){
		$this->strDescription = $strNewDescription;
	}
	public function setKeywords($strKeyWords){
		$this->strKeyWords = $strKeyWords;
	}
	//	***** ***** ***** GETTERS ***** ***** ***** //
	public function getName(){				// Extraction du nom
		return $this->strName;
	}
	public function getTitle(){				// Extraction du titre
		return $this->strTitle;
	}
	public function getDescription(){		// Extraction de la description
		return $this->strDescription;
	}
	public function getKeywords(){			// Extraction des mots-clés
		return $this->strKeyWords;
	}
	public function getPath(){				// Extraction du chemin
		return $this->strPath;
	}
	public function getIndexPath(){			// Extraction du chemin vers l'index
		return $this->strIndexPath;
	}
	public function getMediaPath(){			// Extraction du chemin des medias
		return $this->strMediaPath;
	}
	public function getPicturesPath(){		// Extraction du chemin des images
		return $this->strPicturesPath;
	}
	public function getLogosPath(){			// Extraction du chemin des logos
		return $this->strLogosPath;
	}
	public function getConfigPath(){		// Extraction du chemin des fichiers de configuration
		return $this->strConfigPath;
	}
	public function getCssPath(){			// Extraction du chemin des fichiers css
		return $this->strCssPath;
	}
	public function getScriptsPath(){		// Extraction du chemin des scripts du site
		return $this->strScriptsPath;
	}
}?>