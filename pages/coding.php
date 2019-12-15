<?php
/*********************************************************************************
 *   	FredLab Projects Incorporated
 *                Projet :   FredLab
 *                  Page :   coding.php
 *                Chemin :   http://www.fred-lab.com/pages/coding.php
 *                  Type :   page utilisateur
 *              Contexte :   php 7.3
 *              Fonction :   page d'accueil de l'espace codeur
 *   Date mise en oeuvre :   10/12/2019
 *          Dernière MàJ :   15/12/2019
 *********************************************************************************/
/***** *****    INCLUSIONS ET SCRIPTS   ***** *****/
require("../scripts/admin/variables.php");                  // Variables globales du site
require("../scripts/admin/bdd.php");                        // Script de connexion à la base de données
require("../scripts/classes/page.php");                     // Script de définition de la classe 'Page'
require("../scripts/paging/htmlPaging.php");                // Script de construction de la structure html des pages
require("../scripts/paging/mainPaging.php");                // Script de construction des composants graphiques
require("../scripts/paging/menus.php");                     // Script de construction des menus
require("../scripts/paging/webFonts.php");                  // Script de construction de la vue : webfonts
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
$arrUlinksReferers = fct_SelectAllUlinksReferers();
$intUlinksReferers = count($arrUlinksReferers);
$arrUlinksTypes = fct_SelectAllUlinksTypes();
$intUlinksTypes = count($arrUlinksTypes);
// ***** ***** ***** PAGE HTML   ***** ***** *****
// ***** ***** ***** En-tête HTML ***** ***** *****
fct_BuildHeaderHtml($objPageInfos);
// ***** ***** ***** En-tête graphique ***** ***** *****
fct_BuildHeaderGraph($objPageInfos);
// ***** ***** ***** Menu principal ***** ***** *****
fct_BuildHorizontalMenu($objPageInfos);
// ***** ***** ***** Corps du contenu ***** ***** *****
$strClaLinkOfficial = "col-xl-8 col-lg-8 col-md-8 col-sm-8 ulk_official";
if ( !isset($_GET['view']) ){
?>
<!-- -- -- -- Section : principale -- -- -- -->
      <section class="row" id="sec_codingmain">
       <label class="col-xl-12 col-lg-12" for="sec_codingmain"><h1>Espace codeurs</h1></label>
<!-- -- -- -- Section gauche : la boîte à outils -- -- -- -->
       <div class="col-xl-5 col-lg-5" id="cod_toolbox">
        <label class="col-xl-12 col-lg-12" for="cod_toolbox"><span class="fa fa-toolbox"></span>&nbsp;La ToolBox</label>
        <div class="offset-xl-1 col-xl-10 offset-lg-1 col-lg-10 tbx_links" id="tbx_webfonts">
         <a href="coding.php?view=fonts" title="Retrouvez une sélection de fonts pour vos sites...">WebFonts kits</a>
        </div>
       </div>
<!-- -- -- -- Section droite : les ressources-- -- -- -->
       <div class="offset-xl-1 col-xl-5 offset-lg-1 col-lg-5" id="cod_ressources">
        <label class="col-xl-12 col-lg-12" for="cod_ressources"><span class="fa fa-book-reader"></span>&nbsp;Les ressources</label>
        <ul class="col-xl-12">
         <li id="utils_links"><span class="far fa-bookmark"></span>&nbsp;&nbsp;Liens utiles</li>
        </ul>
       </div>
      </section>
<!-- -- -- -- Section : liens utiles -- -- -- -->
      <section class="row" id="sec_utilslinks">
       <label class="col-xl-12" id="ulk_mainlabel"><span class="far fa-bookmark"></span>&nbsp;Tous les liens</label>
       <div class="col-xl-12" id="ulk_main">
<?php
    for ( $i = 1 ; $i <= $intUlinksReferers ; $i++ ){
        $strDivRefererId = "referer" . $i;
?>
<!-- -- -- -- Article n°<?php echo $i . " : " . $arrUlinksReferers[$i]['Label'];?> -- -- -- -->
        <label class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 offset-md-1 col-md-10 ulk_reflabel" id="<?php echo $i;?>">
         <span class="<?php echo $arrUlinksReferers[$i]['Icon'];?>"></span>&nbsp;<?php echo $arrUlinksReferers[$i]['Label'];?>
        </label>
        <div class="row ulk_referer" id="<?php echo $strDivRefererId;?>">
<?php
        for ($j = 1 ; $j <= $intUlinksTypes ; $j++ ){
            $arrUlinksFromTypeRef = fct_SelectUlinksFromTypeAndRef($arrUlinksTypes[$j]['Id'], $arrUlinksReferers[$i]['Id']);
            $intUlinksFromTypeRef = count($arrUlinksFromTypeRef);
?>
         <div class="col-xl-12 ulk_types">
          <article class="row">
<!-- -- -- -- <!-- -- -- -- Article n°<?php echo $i . " : rubrique " . $arrUlinksTypes[$j]['Label'];?> -- -- -- -->           
<?php       if ( $j == 1 ){
                if ( $arrUlinksReferers[$i]['Label'] != "Général" ){?>
          <label class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-6 ulk_typelabel"><span class="<?php echo $arrUlinksTypes[$j]['Icon'];?>"></span>&nbsp;<?php echo $arrUlinksTypes[$j]['Label'];?></label>
           <a class="<?php echo $strClaLinkOfficial;?>" href="<?php echo $arrUlinksFromTypeRef[$j]['Url'];?>" title="<?php echo $arrUlinksFromTypeRef[$j]['Title'];?>" target="_blank">
            <?php echo $arrUlinksFromTypeRef[$j]['Label'];?>
           </a>
<?php           }?>
<?php       } else {
                if ( is_array($arrUlinksFromTypeRef) ){?>
           <label class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-6 ulk_typelabel"><span class="<?php echo $arrUlinksTypes[$j]['Icon'];?>"></span>&nbsp;<?php echo $arrUlinksTypes[$j]['Label'];?></label>
           <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 ulk_list">
            <div class="row">
<?php               for ( $k = 1 ; $k <= $intUlinksFromTypeRef ; $k++ ){?>
             <div class="col-xl-8">
              <a href="<?php echo $arrUlinksFromTypeRef[$k]['Url'];?>" title="<?php echo $arrUlinksFromTypeRef[$k]['Title'];?>" target="_blank"><?php echo $arrUlinksFromTypeRef[$k]['Label'];?></a>
             </div>
             <p class="col-xl-12"><?php echo $arrUlinksFromTypeRef[$k]['Description'];?></p>
<?php               }?>
            </div>
           </div>
<?php           } else {?>
           <label class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-6 ulk_typelabel"><span class="<?php echo $arrUlinksTypes[$j]['Icon'];?>"></span>&nbsp;<?php echo $arrUlinksTypes[$j]['Label'];?></label>
           <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 ulk_blank"><?php echo "Aucun item pour le moment.";?></div>
<?php           }
            }?>
            </article>
          </div>
<?php   }
?>  
         </div>
<?php
    }?>
        </div>
       </section>
<?php
} elseif ( $_GET['view'] == "fonts" ) {
    fctDisplayWebFonts($objPageInfos);
}
// ***** ***** ***** Footer HTML ***** ***** *****
fct_BuildFooterHtml($objPageInfos);
