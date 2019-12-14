<?php
/*******************************************************************************************************
 *   FredLab Projects Incorporated
 *                Projet :   FredLab
 *                  Page :   htmlPaging.php
 *                Chemin :   http://www.fred-lab.com/scripts/paging/htmlPaging.php
 *                  Type :   page de script
 *              Contexte :   php 7.3
 *              Fonction :   construction de la structure des pages html
 *   Date mise en oeuvre :   24/10/2019
 *          Dernière MàJ :   13/12/2019
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
     <link href="<?php echo $objPageInfos->getConfigPath().$GLOBALS['strjQueryUiCss'];?>" rel="stylesheet"><!-- Script css jQueryUi -->
     <link href="<?php echo $objPageInfos->getCssPath().$GLOBALS['strMainCss'];?>" rel="stylesheet" type="text/css"><!-- Page css principale -->
<?php   if ( $objPageInfos->getName() != "index.php" ) {?>
     <link href="<?php echo $objPageInfos->getCssPath().$strFileCss;?>" rel="stylesheet" type="text/css"><!-- Css associée à la page courante-->
<?php     if ( $objPageInfos->getName() === "coding.php" ) {?>
     <link href="<?php echo $objPageInfos->getCssPath();?>fonts.css" rel="stylesheet" type="text/css"><!-- Css associée à la page courante-->
<?php     }?>     
<?php   }?>
     <link rel="icon" type="image/icon" href="<?php echo $objPageInfos->getMediaPath() . "icons/" . $GLOBALS['strSiteIcon'];?>"><!-- Icône du site -->
     <link href="<?php echo $objPageInfos->getConfigPath().$GLOBALS['strFontAwesomeCss'];?>" rel="stylesheet"><!-- Script css FontAwesome -->
    </head>
<!-- -- -- -- -- -- -- -- -- -- -- -- -- - -- -- -- -->
<!-- -- -- -- -- -- Début du contenu -- -- -- -- -- -->
    <body>
     <section class="container" id="site-container">
<?php
}
// *** *** *** *** *** Footer Html *** *** *** *** *** //
// Fonction de construction du footer Html
//       Paramètres :
//         objPageInfos : objet contenant les infos de la page (classe 'Page')
// Valeur de retour : code html
function fct_BuildFooterHtml($objPageInfos){
?>
<!-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
<!-- -- -- -- -- -- Fin du contenu -- -- -- -- -- -->
     </section>
<!-- -- -- -- Bootstrap Core JavaScript -- -- -- -->
     <script src="<?php echo $GLOBALS['strAjax'];?>"></script><!-- Scripting Ajax -->
     <script src="<?php echo $objPageInfos->getConfigPath().$GLOBALS['strBootStrapJs'];?>"></script><!-- Script js BootStrap -->
     <script src="<?php echo $objPageInfos->getConfigPath().$GLOBALS['strFontAwesomeJs'];?>" crossorigin="anonymous"></script><!-- Script js FontAwesome -->
     <script src="<?php echo $objPageInfos->getConfigPath().$GLOBALS['strjQueryJs'];?>"></script><!-- Script js jQuery -->
     <script src="<?php echo $objPageInfos->getConfigPath().$GLOBALS['strjQueryUiJs'];?>"></script><!-- Script js jQueryUi -->
<?php     if ( $objPageInfos->getName() == "index.php" ){?>
     <script src="<?php echo $objPageInfos->getScriptsPath();?>paging/acueilPaging.js"></script><!-- JavaScript : mise en page accueil -->
<?php     } else if ( $objPageInfos->getName() == "candidat.php" ){?>
     <script src="<?php echo $objPageInfos->getScriptsPath();?>paging/candidatPaging.js"></script><!-- JavaScript : mise en page candidat -->
     <script src="<?php echo $objPageInfos->getScriptsPath();?>paging/chronoPaging.js"></script><!-- JavaScript : mise en page chronologie -->
<?php     } else if ( $objPageInfos->getName() == "coding.php" ){?>
     <script src="<?php echo $objPageInfos->getScriptsPath();?>paging/coding.js"></script><!-- JavaScript : mise en page coding -->
<?php     }?>

    </body>
<!-- -- -- -- Footer Html -- -- -- -->
    <footer class="container">
     <section class="row" id ="footer">
<!-- -- -- -- Technologies -- -- -- -->
      <article class="offset-xl-2 col-xl-4 offset-lg-2 col-lg-3 offset-md-2 col-md-4 col-sm-6" id="powering">
       <label class="col-xl-10 col-sm-12">&#9889;&nbsp;Powered by&nbsp;</label>
       <p class="site-powering">
        <span class="fab fa-php fa-lg"></span>&nbsp;&nbsp;<?php echo $GLOBALS['strPhpVersionDisplay'];?>&nbsp;/
        MySql 8.0&nbsp;&nbsp;<span class="fa fa-database"></span>
       </p>
       <p class="site-powering">
        <span class="fab fa-html5"></span>&nbsp;&nbsp;HTML 5&nbsp;/
        CSS 3&nbsp;&nbsp;<span class="fab fa-css3"></span>
       </p>
       <p class="site-powering"><span class="fab fa-js"></span>&nbsp;JavaScript ES2015</p>
       <p class="site-powering"><span class="fab fa-bootstrap"></span>&nbsp;BootStrap 4.0</p>
       <p class="site-powering"><span class="fab fa-font-awesome"></span>&nbsp;FontAwesome 5.11</p>
      </article>
<!-- -- -- -- Contacts -- -- -- -->
      <article class="offset-xl-1 col-xl-4 offset-lg-1 col-lg-4 offset-md-1 col-md-5 offset-sm-1 col-sm-5" id="contacts">
       <div class="row">
        <label class="col-xl-10 col-md-9"><span class="far fa-address-book fa-lg"></span>&nbsp;Contacts&nbsp;</label>
        <address class="col-xl-10 contact_links">
         <a href="https://www.facebook.com/FredLaboratory" title="Vers la page Facebook de FredLab..." target="_blank">
          <span class="fab fa-facebook-square"></span>&nbsp;FredLab@Facebook
         </a>
        </address>
        <address class="col-xl-10 contact_links">
         <a href="https://github.com/suFredericD/FredLab" title="Vers le dépôt de FredLab sur GitHub.com..." target="_blank">
          <span class="fab fa-github-square"></span>&nbsp;FredLab@GitHub
         </a>
        </address>
        <address class="col-xl-10 contact_links">
         <a href="https://www.linkedin.com/in/frédéric-daniau-10baba184" title="Vers mon profil LinkedIn..." target="_blank">
          <span class="fab fa-linkedin"></span>&nbsp;Fred@LinkedIn
         </a>
        </address>
       </div>
      </article>
<!-- -- -- -- Mentions -- -- -- -->
      <article class="col-xl-12" id="copy">
       <p class="site-author">&nbsp;FredLab&nbsp;Projects&nbsp;Inc.<i>&nbsp;&#x24b8;</i>&nbsp;2019&nbsp;</p>
      </article>
     </section>
    </footer>
<!-- -- -- -- Fin de page -- -- -- -->
</html>
<?php
}

















