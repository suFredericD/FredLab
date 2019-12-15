<?php
/*********************************************************************************
 *   FredLab Projetcs Incorporated
 *                Projet :   FredLab
 *                  Page :   index.php
 *                Chemin :   http://127.0.0.1:8080/FredLab/index.php
 *                  Type :   page utilisateur
 *              Contexte :   php 7.3
 *              Fonction :   page d'accueil
 *   Date mise en oeuvre :   24/10/2019
 *          Dernière MàJ :   15/12/2019
 *********************************************************************************/
/***** *****    INCLUSIONS ET SCRIPTS   ***** *****/
require("scripts/admin/variables.php");                             // Variables globales du site
require("scripts/classes/page.php");                                // Script de définition de la classe 'Page'
require("scripts/paging/htmlPaging.php");                           // Script de construction de la structure html des pages
require("scripts/paging/mainPaging.php");                           // Script de construction des composants graphiques
require("scripts/paging/menus.php");                                // Script de construction des menus
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
// ***** ***** ***** PAGE HTML   ***** ***** *****
// ***** ***** ***** En-tête HTML ***** ***** *****
fct_BuildHeaderHtml($objPageInfos);
// ***** ***** ***** En-tête graphique ***** ***** *****
fct_BuildHeaderGraph($objPageInfos);
// ***** ***** ***** Menu principal ***** ***** *****
fct_BuildHorizontalMenu($objPageInfos);
// ***** ***** ***** Corps du contenu ***** ***** *****
$strArtisanLinkTitle = "Voir sa ganache...";
?>
      <section class="row" id="secAccueilTitle">
       <div class="offset-xl-1 col-xl-10 col-lg-12">
        <div class="row">
<!-- -- -- -- Logo animé d'accueil -- -- -- -->
          <div class="offset-xl-1 col-xl-2 offset-lg-1 col-lg-2 col-md-2 col-sm-2 col-4" id="accLogo_cell"></div>
          <div class="col-xl-9 col-lg-8 col-md-10 col-sm-10 col-8">
           <div class="row">
            <div class="offset-xl-1 col-xl-10 col-lg-12 animated-green" id="accWelcome">Bienvenue</div>
            <div class="offset-xl-1 col-xl-10 col-lg-12 animated-green" id="accWelcomeSub">dans mon laboratoire virtuel</div>
           </div>
          </div>
        </div>
       </div>
      </section>
<!-- -- -- -- Section : accueil présentation -- -- -- -->
      <section class="row accueil_main" id="secAccueilMain">
       <article class="offset-xl-1 col-xl-10 offset-lg-1 col-lg-10" id="acc_welcometext">
        <p>Ici, chaque ligne de code
           est amoureusement bichonnèe,
           tapèe <em>à la main</em> par <a href="index.php#accCandidat" data-toggle="meBubble" data-animation="true" html="true" title="<?php echo $strArtisanLinkTitle;?>">un artisan passioné</a>,
           à partir de languages <em>rigoureusement sèlectionnès</em>
           pour vous garantir une expèrience
           de navigation de <em>qualitè supèrieure</em>.<br><br>
           &laquo;&nbsp;<cite>Et le code source, ça se partage !</cite>&nbsp;&raquo;&nbsp;&#9472;&nbsp;<strong>Aristote</strong></p>
       </article>
<!-- -- -- -- Section : Espace candidat -- -- -- -->
       <label class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-6" for="accCandidat">
        <a href="index.php#accCandidat" title="Tout savoir de l'origine de Fred juqu'à nos jours...">
         <span class="far fa-address-card"></span>&nbsp;&nbsp;Espace candidat</a>
       </label>
       <div class="col-xl-12-hidden" id="accCandidat">
        <div class="row">
<!-- -- -- -- Présentation de l'espace candidat -- -- -- -->
         <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-5 no-bg-no-bd" id="acc_divme">
          <img class="img-fluid img-thumbnail" src="media/pics/fred.jpg" alt="Photo de moi" title="Oui c'est moi :)">
         </div>
         <p class=" col-xl-10 col-lg-9 col-md-8 col-sm-8 col-7 accRubTitle">Toutes les rubriques de ma candidature virtuelle</p>
         <p class="accRubText">Principalement à destination des <strong title="Oui oui, c'est vous... :o)">recruteurs</strong>,&nbsp;
          <a href="pages/candidat.php" title="Accéder à l'espace candidat">l'espace candidat</a>&nbsp;
          consiste en une synthèse de <strong>mon parcours</strong> et de <strong>mes compétences</strong>&nbsp;
          au travers de quelques pages et scripts associés que <strong title="C'est Bibi ^^">j'ai entièrement mis au point</strong>.</p>
<!-- -- -- -- Présentation du parcours -- -- -- -->
         <div class="offset-xl-1 col-xl-9 subLabel">Mon parcours</div>
          <p class="accRubText" id="accParcours">Découvrez un parcours <strong>riche</strong> et <strong>atypique</strong>, et consultez-le <strong>comme vous le souhaitez</strong> :<br>
          <a href="pages/candidat.php#bref" title="Pour les plus pressés ...">En bref</a>,
          <a href="pages/candidat.php#thema" title="Parce que j'ai plusieurs cordes à mon arc...">Thématique</a> ou
          <a href="pages/candidat.php#chrono" title="&laquo; La chronologie (aussi annale, chronique) est une science de dates et d'événements historiques ou succession d'événements dans le temps. Considérée comme une discipline auxiliaire de l’histoire, la chronologie est une manière d'appréhender l'histoire par les événements.&raquo;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&mdash; source : Wikipedia">Chronologique</a>.
         </p>
<!-- -- -- -- Présentation des cv -- -- -- -->
         <div class="offset-xl-1 col-xl-9 subLabel">Curriculum vitae</div>
         <p class="accRubText" id="accCv">Consultez&nbsp;
          <a href="pages/candidat.php#cv" title="">mon curriculum vitae</a>, en <strong>format Pdf</strong> (pour le lire ou le télécharger), ou en tant que <strong>page Web</strong> dans un des <strong>formats dynamiques</strong> où j'utilise plusieurs variantes de <strong>construction</strong> et <strong>d'affichage</strong>.</p>
        </div>
       </div>
<!-- -- -- -- Section : Espace codeur -- -- -- -->
       <label class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-6" for="accCoding">
        <a href="index.php#accCoding" title="Là c'est pour les programmeurs surtout...">
         <span class="fa fa-laptop-code"></span>&nbsp;&nbsp;Espace codeur</a>
       </label>
       <div class="col-xl-12-hidden" id="accCoding">
        <div class="row">
<!-- -- -- -- Présentation de l'espace coding -- -- -- -->
         <div class="col-xl-2 no-bg-no-bd">
          <img class="img-fluid" src="media/pics/animated_code.gif" alt="Image d'illustration" title="Prends la pillule bleue...">
         </div>
         <p class="col-xl-10 accRubTitle">Toutes les rubriques pour les codeurs</p>
         <p class="col-xl-12 accRubText">Principalement à destination des <strong title="Oui oui, c'est vous aussi... :o)">développeurs</strong>, retrouvez dans
          <a href="pages/coding.php" title="Accéder à l'espace codeur">l'espace codeur</a>&nbsp;
          tout ce qui va bien pour triturer vos méninges, chouchouter votre code et développer <em>oklm</em> :
          <ul class="offset-xl-1 col-xl-10" id="accUlText">
            <li><a href="pages/coding.php#cod_toolbox" title="Accéder à la ToolBox">les outils</a> bien pratiques,</li>
            <li>les références de la bibliographie,</li>
            <li>et bien d'autres ressources...</li>
          </ul>
         </p>
        </div>
       </div>
      </section>
<?php
// ***** ***** ***** Footer HTML ***** ***** *****
fct_BuildFooterHtml($objPageInfos);
?>