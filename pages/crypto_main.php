<?php
/*********************************************************************************
 *   FredLab Projects Incorporated
 *                Projet :   FredLab
 *                  Page :   crypto_main.php
 *                Chemin :   https://www.fred-lab.com/pages/crypto_main.php
 *                  Type :   page utilisateur
 *              Contexte :   php 7.4
 *              Fonction :   page principale sur les cryptos
 *   Date mise en oeuvre :   02/11/2020
 *          Dernière MàJ :   03/11/2020
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
$arrAllCryptoApp = fct_SelectAllcryptoApp();
$intCryptoApps = count($arrAllCryptoApp);
$arrAllCryptoAppTypes = fct_SelectAllcryptoAppTypes();

// ***** ***** ***** PAGE HTML   ***** ***** *****
// ***** ***** ***** En-tête HTML ***** ***** *****
fct_BuildHeaderHtml($objPageInfos);
// ***** ***** ***** En-tête graphique ***** ***** *****
fct_BuildHeaderGraph($objPageInfos);
// ***** ***** ***** Menu principal ***** ***** *****
fct_BuildHorizontalMenu($objPageInfos);
// ***** ***** ***** Corps du contenu ***** ***** *****
$strWelcomeText = "<span class=\"far fa-hand-point-left\"></span>&nbsp;&nbsp;&nbsp;"
                . "<span class=\"fa fa-hand-point-left\"></span>&nbsp;&nbsp;&nbsp;"
                . "<span class=\"far fa-hand-point-left\"></span>&nbsp;&nbsp;&nbsp;"
                . "<span class=\"fa fa-hand-point-left\"></span>&nbsp;&nbsp;&nbsp;"
                . "<span class=\"far fa-hand-point-left\"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
                . "Sélectionner une catégorie pour afficher les articles correspondants...<hr>";
?>
    <h1 class="offset-xl-1 col-xl-11 offset-lg-2 col-lg-10 offset-md-3 col-md-9 offset-sm-3 col-sm-9 offset-4 col-8 no-bg-no-bd">Les crypto-monnaies</h1>
    <section class="offset-xl-2 col-xl-10 offset-lg-3 col-lg-9 offset-md-3 col-md-9 offset-sm-3 col-sm-9 offset-4 col-8" id="secCryptos">
<!-- -- -- -- -- -- -- MENU DES CRYPTOS APPLICATIONS -- -- -- -- -- -- -->
     <div id="cryMenu">
      <div class="row">
<?php
        for ($i=1;$i<=count($arrAllCryptoAppTypes);$i++){
                $strInnerHTML = $arrAllCryptoAppTypes[$i]['Icon'] . "&nbsp;" . $arrAllCryptoAppTypes[$i]['Name'];
?>
        <div id="<?php echo $arrAllCryptoAppTypes[$i]['DOM'];?>" class="col-xl-12" title="<?php echo $arrAllCryptoAppTypes[$i]['Description'];?>"><?php echo $strInnerHTML;?></div>
        <div  class="offset-xl-2 col-xl-8 offset-lg-1 col-lg-10 offset-md-1 col-md-10">
         <div class="row">
<?php
                for ($j=1;$j<=$intCryptoApps;$j++) {
                        if($arrAllCryptoApp[$j]['TypeId']==$arrAllCryptoAppTypes[$i]['Id']) {
?>
           <div class="col-xl-12" title="<?php echo $arrAllCryptoApp[$j]['Resume'];?>">
            <img src="../media/logos/<?php echo $arrAllCryptoApp[$j]['Logo'];?>" class="img-fluid crMenuLogos">
           </div>
<?php
                        }
                }
?>
         </div>
        </div>
<?php
        }
?>

      </div>
     </div>
<!-- -- -- -- -- -- -- CONTENU DES CRYPTOS APPLICATIONS -- -- -- -- -- -- -->
      <article id="cryContent" class="col-xl-12">
       <div class="row">
        <div id="crySubTitle" class="col-xl-12"><p><?php echo $strWelcomeText;?></p></div>
        <div id="cryText" class="col-xl-12"><p></p></div>
       </div>
      </article>
     </div>
    </section>
<?php
// ***** ***** ***** Footer HTML ***** ***** *****
fct_BuildFooterHtml($objPageInfos);
?>