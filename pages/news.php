<?php
/*********************************************************************************
 *   FredLab Projects Incorporated
 *                Projet :   FredLab
 *                  Page :   news.php
 *                Chemin :   https://www.fred-lab.com/pages/news.php
 *                  Type :   page utilisateur
 *              Contexte :   php 7.4
 *              Fonction :   page de présentation des news du site
 *   Date mise en oeuvre :   27/10/2020
 *          Dernière MàJ :   27/10/2020
 *********************************************************************************/
/***** *****    INCLUSIONS ET SCRIPTS   ***** *****/
require("../scripts/admin/variables.php");                  // Variables globales du site
require("../scripts/admin/bdd.php");                        // Script de connexion à la base de données
require("../scripts/classes/page.php");                     // Script de définition de la classe 'Page'
require("../scripts/paging/htmlPaging.php");                // Script de construction de la structure html des pages
require("../scripts/paging/mainPaging.php");                // Script de construction des composants graphiques
require("../scripts/paging/menus.php");                     // Script de construction des menus
require("../scripts/paging/chrono.php");                    // Script de construction de la présentation chronologique
/***** *****    DECLARATIONS   ***** *****/
//***** *****   Informations de la page
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
$arrAllNews = fct_SelectAllNews();

// ***** ***** ***** PAGE HTML   ***** ***** *****
// ***** ***** ***** En-tête HTML ***** ***** *****
fct_BuildHeaderHtml($objPageInfos);
// ***** ***** ***** En-tête graphique ***** ***** *****
fct_BuildHeaderGraph($objPageInfos);
// ***** ***** ***** Menu principal ***** ***** *****
fct_BuildHorizontalMenu($objPageInfos);
// ***** ***** ***** Corps du contenu ***** ***** *****
?>
    <h1>Des nouvelles du labo...</h1><hr class="body-hr">
    <section class="col-xl-12" id="secNews">
     <div class="row">
<?php
    for ($i=1; $i<=count($arrAllNews);$i++) {
        $datFullNewsDate = new DateTime($arrAllNews[$i]['Date']);
        $strNewsDate = $datFullNewsDate->format("d/m/Y");
?>
      <article class="offset-xl-1 col-xl-10 newsItem">
       <div class="row">
        <div class="col-xl-2 newsDate"><?php echo $strNewsDate;?></div>
        <div class="col-xl-10 newsSub"><?php echo $arrAllNews[$i]['Title'];?></div>
        <div class="col-xl-12 newsText"><?php echo $arrAllNews[$i]['Content'];?></div>
       </div>
      </article>
<?php
    }?>
     </div>
    </section>
<?php
// ***** ***** ***** Footer HTML ***** ***** *****
fct_BuildFooterHtml($objPageInfos);
?>