<?php
/*********************************************************************************
 *   FredLab Projetcs Incorporated
 *                Projet :   FredLab
 *                  Page :   coding.php
 *                Chemin :   http://127.0.0.1:8080/FredLab/coding.php
 *                  Type :   page utilisateur
 *              Contexte :   php 7.3
 *              Fonction :   page d'accueil de l'espace codeur
 *   Date mise en oeuvre :   10/12/2019
 *          Dernière MàJ :   10/12/2019
 *********************************************************************************/
/***** *****    INCLUSIONS ET SCRIPTS   ***** *****/
require("../scripts/admin/variables.php");                  // Variables globales du site
require("../scripts/admin/bdd.php");                        // Script de connexion à la base de données
require("../scripts/classes/page.php");                     // Script de définition de la classe 'Page'
require("../scripts/paging/htmlPaging.php");                // Script de construction de la structure html des pages
require("../scripts/paging/mainPaging.php");                // Script de construction des composants graphiques
require("../scripts/paging/menus.php");                     // Script de construction des menus

/***** *****    DECLARATIONS   ***** *****/
$datNow = new DateTime();                                           // Timer de génération de la page (start)
$intMinInMilli = intval( ( $datNow->format("i") * 60 ) * 1000 );    // Minutes en millisecondes
$intSecInMilli = intval($datNow->format("s")*1000);                 // Secondes en millisecondes
$intMilliSec = $datNow->format("v");                                // Millisecondes
$intStartMilliSec = $intMinInMilli + $intSecInMilli + $intMilliSec; // Timer en millisecondes (start)
//***** *****   Informations de la page
if ( $_SERVER["SCRIPT_NAME"] === "/FredLab/index.php" ) {            // Comparaison du nom du script
	$strPathFile = $_SERVER["CONTEXT_PREFIX"]."/";                  // Affectation du path si index.php
}else{
	$strPathFile = $_SERVER["CONTEXT_PREFIX"]."/pages/";            // Affectation du path si autre fichier
}
if ( isset($_SERVER["HTTP_REFERER"]) ) {                            // Récupération de la page précédente
    $strHttpReferer = $_SERVER["HTTP_REFERER"];
}else{
    $strHttpReferer = $_SERVER["SCRIPT_NAME"];
}
$arrFileName = preg_split("/\//", $_SERVER["SCRIPT_NAME"]);         // Split du nom complet du fichier en tableau
$intFileCount = count($arrFileName)-1;                              // Position de lecture du nom de fichier seul
$strPageFile = $arrFileName[$intFileCount];                         // Nom du fichier seul
$objPageInfos = new Page();                                         // Incrémentation de l'objet 'Page'
$objPageInfos->setName($strPageFile);
// ***** ***** ***** Variables de la page ***** ***** *****

// ***** ***** ***** PAGE HTML   ***** ***** *****
// ***** ***** ***** En-tête HTML ***** ***** *****
fct_BuildHeaderHtml($objPageInfos);
// ***** ***** ***** En-tête graphique ***** ***** *****
fct_BuildHeaderGraph($objPageInfos);
// ***** ***** ***** Menu principal ***** ***** *****
fct_BuildHorizontalMenu($objPageInfos);
// ***** ***** ***** Corps du contenu ***** ***** *****
?>
      <section class="row" id="secAccueilTitle">
      
      </section>
<?php
// ***** ***** ***** Footer HTML ***** ***** *****
fct_BuildFooterHtml($objPageInfos);
?>