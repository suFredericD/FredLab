<?php
/*******************************************************************************************************
 *   FredLab Projetcs Incorporated
 *                Projet :   FredLab
 *                  Page :   htmlPaging.php
 *                Chemin :   http://127.0.0.1:8080/FredLab/scripts/paging/htmlPaging.php
 *                  Type :   page de script
 *              Contexte :   php 7.3
 *              Fonction :   construction de la structure des pages html
 *   Date mise en oeuvre :   24/10/2019
 *          Dernière MàJ :   15/11/2019
 *******************************************************************************************************/
/***** *****    INCLUSIONS ET SCRIPTS   ***** *****/

/***** *****    FONCTIONS   ***** *****/
// Fonction de construction du header Html
//       Paramètres :
//         objPageInfos : objet contenant les infos de la page (classe 'Page')
// Valeur de retour : code html
function fct_BuildHeaderHtml($objPageInfos){
    $arrFileName = preg_split("/\./", $objPageInfos->getName());    // Split du nom complet du fichier en tableau
    $strFileCss = $arrFileName[0] . ".css";                         // Nom du css associé au fichier
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
     <title><?php echo $objPageInfos->getTitle();?></title>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, shrink-to-fit=yes">
     <meta name="description" content="<?php echo $objPageInfos->getDescription();?>">
     <meta name="author" content="<?php echo $GLOBALS['strAuthor'];?>">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
     <meta name="keywords" content="<?php echo $objPageInfos->getKeywords();?>">
     <meta name="robots" content="all">
  <!-- Open Graph data -->
     <meta property="og:title" content="<?php echo $objPageInfos->getTitle();?>">
     <meta property="og:type" content="website">
     <meta property="og:url" content="">
     <meta property="og:image" content="">
     <meta property="og:description" content="<?php echo $objPageInfos->getDescription();?>">
     <meta property="og:site_name" content="<?php echo $GLOBALS['strSiteTitle'];?>">
<!-- Liens de mise en forme et scripts -->
     <link href="<?php echo $objPageInfos->getConfigPath().$GLOBALS['strBootStrapCss'];?>" rel="stylesheet"><!-- Script css BootStrap -->
     <link href="<?php echo $objPageInfos->getCssPath().$GLOBALS['strMainCss'];?>" rel="stylesheet" type="text/css"><!-- Page css principale -->
<?php   if ( $objPageInfos->getName() != "index.php" ) {?>
     <link href="<?php echo $objPageInfos->getCssPath().$strFileCss;?>" rel="stylesheet" type="text/css"><!-- Css associée à la page courante-->
<?php   }?>
     <link rel="shortcut icon" type="image/x-icon" href="<?php echo $objPageInfos->getMediaPath() . "icons/" . $GLOBALS['strSiteIcon'];?>"><!-- Icône du site -->
     <link href="<?php echo $objPageInfos->getConfigPath().$GLOBALS['strFontAwesomeCss'];?>" rel="stylesheet"><!-- Script css FontAwesome -->
    </head>
<!-- -- -- -- -- -- -- -- -- -- -- -- -- - -- -- -- -->
<!-- -- -- -- -- -- Début du contenu -- -- -- -- -- -->
    <body>
     <section class="container" id="site-container">
<?php
}
// *** *** *** *** *** Footer Html *** *** *** *** *** //
function fct_BuildFooterHtml($objPageInfos){
?>
<!-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
<!-- -- -- -- -- -- Fin du contenu -- -- -- -- -- -->
     </section>
<?php     if ( $objPageInfos->getName() == "index.php" ){?>
     <script src="<?php echo $objPageInfos->getScriptsPath();?>paging/acueilPaging.js"></script><!-- JavaScript : mise en page accueil -->
<?php     } else if ( $objPageInfos->getName() == "candidat.php" ){?>
     <script src="<?php echo $objPageInfos->getScriptsPath();?>paging/candidatPaging.js"></script><!-- JavaScript : mise en page candidat -->
     <script src="<?php echo $objPageInfos->getScriptsPath();?>paging/chronoPaging.js"></script><!-- JavaScript : mise en page chronologie -->
<?php     } else if ( $objPageInfos->getName() == "coding.php" ){?>
     <script src="<?php echo $objPageInfos->getScriptsPath();?>paging/coding.js"></script><!-- JavaScript : mise en page coding -->
<?php     }?>
<!-- -- -- -- Bootstrap Core JavaScript -- -- -- -->
     <script src="<?php echo $GLOBALS['strAjax'];?>"></script><!-- Scripting Ajax -->
     <script src="<?php echo $objPageInfos->getConfigPath().$GLOBALS['strBootStrapJs'];?>"></script><!-- Script js BootStrap -->
     <script src="<?php echo $objPageInfos->getConfigPath().$GLOBALS['strFontAwesomeJs'];?>" crossorigin="anonymous"></script><!-- Script js FontAwesome -->
    </body>
 <!-- -- -- -- Footer Html -- -- -- -->
    <footer>
     <address>
      <p class="site-author">FredLab&nbsp;Inc.<i>&nbsp;&#x24b8;</i>&nbsp;2019</p>
      <p class="site-powering">&#9889;&nbsp;Powered by&nbsp;&nbsp;
       <span class="fab fa-php fa-4x" id="php-version"></span>&nbsp;<?php echo $GLOBALS['strPhpVersionDisplay'];?>
      </p>
     </address>
    </footer>
</html>
<?php
}?>