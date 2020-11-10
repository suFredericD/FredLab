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
 *          Dernière MàJ :   10/11/2020
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
$arrAllCryptoApp = fct_SelectAllCryptoApp();
$intCryptoApps = count($arrAllCryptoApp);
$arrAllCryptoAppTypes = fct_SelectAllCryptoAppTypes();
$arrAllCryptoCoins = fct_SelectAllCryptoCoinsBySlug();

// ***** ***** ***** PAGE HTML   ***** ***** *****
// ***** ***** ***** En-tête HTML ***** ***** *****
fct_BuildHeaderHtml($objPageInfos);
// ***** ***** ***** En-tête graphique ***** ***** *****
fct_BuildHeaderGraph($objPageInfos);
// ***** ***** ***** Menu principal ***** ***** *****
fct_BuildHorizontalMenu($objPageInfos);
// ***** ***** ***** Corps du contenu ***** ***** *****
$strWelcomeText = "<span class=\"fa fa-angle-left\"></span>&nbsp;&nbsp;&nbsp;"
                . "<span class=\"fa fa-angle-left\"></span>&nbsp;&nbsp;&nbsp;"
                . "<span class=\"fa fa-angle-left\"></span>&nbsp;&nbsp;&nbsp;"
                . "<span class=\"fa fa-angle-left\"></span>&nbsp;&nbsp;&nbsp;"
                . "<span class=\"fa fa-angle-left\"></span>&nbsp;&nbsp;&nbsp;"
                . "<span class=\"fa fa-angle-left\"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
                . "Sélectionner une catégorie pour afficher les articles correspondants...<hr>";
?>
    <h1 class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 no-bg-no-bd">Les crypto-monnaies</h1>
    <section class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="secCryptos">
     <div class="row">
<!-- -- -- -- -- -- -- MENU DES CRYPTOS APPLICATIONS -- -- -- -- -- -- -->
      <div id="cryMenu" class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-4">
       <div class="row">
<?php
        for ($i=1;$i<=count($arrAllCryptoAppTypes);$i++){
                $strInnerHTML = $arrAllCryptoAppTypes[$i]['Icon'] . "&nbsp;" . $arrAllCryptoAppTypes[$i]['Name'];
?>
         <div id="<?php echo $arrAllCryptoAppTypes[$i]['DOM'];?>" class="col-xl-12" title="<?php echo $arrAllCryptoAppTypes[$i]['Description'];?>"><?php echo $strInnerHTML;?></div>
         <div id="crRub<?php echo $i;?>" class="col-xl-8-hidden col-lg-10-hidden col-md-10-hidden col-12-hidden">
          <div class="row">
<?php
                for ($j=1;$j<=$intCryptoApps;$j++) {
                        if($arrAllCryptoApp[$j]['TypeId']==$arrAllCryptoAppTypes[$i]['Id']) {
?>
           <div class="offset-xl-1 col-xl-10" title="<?php echo $arrAllCryptoApp[$j]['Resume'];?>">
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
       <article id="cryContent" class="col-xl-9 col-lg-9 col-md-8 col-sm-8 col-8">
        <div class="row">
         <div id="crySubTitle" class="col-xl-12"><p><?php echo $strWelcomeText;?></p></div>
         <div id="cryText" class="row">
<?php
        for ($i=1;$i<=$intCryptoApps;$i++) {
                $strLinkText = "Visiter " . $arrAllCryptoApp[$i]['Name'] . "...";
                $strLinkTitle = "Ouvrir un nouvel onglet sur le site de " . $arrAllCryptoApp[$i]['Name'] . "...";
?>
          <div id="<?php echo "app".$i;?>" class="offset-xl-1 col-xl-10">
           <div class="row">
            <div class="offset-xl-1 col-xl-3 crAppLogo">
             <a href="<?php echo $arrAllCryptoApp[$i]['Url'];?>" title="<?php echo $strLinkTitle;?>" target="_blank">
              <img class="img-fluid" src="../media/logos/<?php echo $arrAllCryptoApp[$i]['Logo'];?>">
             </a>
            </div>
            <div class="offset-xl-1 col-xl-6 crAppType">
             <div class="row">
              <div class="col-xl-5 crAppCatLabel">Categorie</div>
              <div class="col-xl-5 crAppCatName" title="<?php echo $arrAllCryptoApp[$i]['TypeDescription'];?>"><?php echo $arrAllCryptoApp[$i]['Type'];?></div>
              <div class="col-xl-2 crAppCatLogo"><?php echo $arrAllCryptoApp[$i]['TypeIcon'];?></div>
             </div>
            </div><hr>
            <div class="offset-xl-1 col-xl-10 crAppText"><?php echo $arrAllCryptoApp[$i]['Description'];?></div>
            <div class="offset-xl-2 col-xl-8 crAppText">
             <a href="<?php echo $arrAllCryptoApp[$i]['Url'];?>" title="<?php echo $strLinkTitle;?>" target="_blank"><?php echo $strLinkText;?></a>
            </div>
           </div>
          </div>
<?php   }
?>
         </div>
        </div>
       </article>
      </div>
     </div>
    </section>
<?php
// ***** ***** ***** Footer HTML ***** ***** *****
fct_BuildFooterHtml($objPageInfos);
?>