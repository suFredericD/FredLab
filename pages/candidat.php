<?php
/*********************************************************************************
 *   FredLab Projetcs Incorporated
 *                Projet :   FredLab
 *                  Page :   candidat.php
 *                Chemin :   http://127.0.0.1:8080/FredLab/candidat.php
 *                  Type :   page utilisateur
 *              Contexte :   php 7.3
 *              Fonction :   page d'accueil de l'espace cadidat
 *   Date mise en oeuvre :   25/10/2019
 *          Dernière MàJ :   07/12/2019
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
$arrCertifs = fct_SelectAllCertifsFromOcr();                         // Tableau des certifications OpenClassRooms
$intCertifs = count($arrCertifs);                                    // Nombre de certifications 
// Url, label d'affichage et attribut 'title' du lien vers la fiche détaillée de la formation
$strDiplomLinkUrl = "https://www.afpa.fr/formation-qualifiante/concepteur-developpeur-informatique";
$strDiplomLinkLabel = "<strong>I.U.T. Technicien Supérieur en Informatique de Gestion</strong>, option Étude et Développement";
$strDiplomLinkTitle = "Lien vers la fiche détaillée de la formation : I.U.T. Technicien Supérieur en Informatique de Gestion";
// Url, label d'affichage et attribut 'title' du lien vers le site de l'Afpa Beaumont
$strAfpaLinkUrl = "https://www.afpa.fr/centre/centre-de-clermont-beaumont";
$strAfpaLinkLabel = "Centre Afpa de Beaumont<br>Puy-de-Dôme (63)";
$strAfpaLinkTitle = "Lien vers la page du site de l'Afpa de Beaumont (63)";
// ***** ***** ***** PAGE HTML   ***** ***** *****
// ***** ***** ***** En-tête HTML ***** ***** *****
fct_BuildHeaderHtml($objPageInfos);
// ***** ***** ***** En-tête graphique ***** ***** *****
fct_BuildHeaderGraph($objPageInfos);
// ***** ***** ***** Menu principal ***** ***** *****
fct_BuildHorizontalMenu($objPageInfos);
// ***** ***** ***** Corps du contenu ***** ***** *****
?>
   <h1><a href="candidat.php"  title="Espace candidat">Regio candidatum</a></h1><hr class="body-hr">
   <div class="row">
    <div class="offset-lg-1 col-lg-10 offset-md-1 col-md-10 offset-sm-1 col-sm-10 offset-1 col-10" title="Un homme, des parcours" style="padding-top:5px;margin-top:5px;background-color:transparent;">
     <h2>Cursus</h2>
    </div>
   </div>
   <div class="row" id="rowLinks">
	 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 cdtrubtitle bxshadow">
	  <a href="#bref" id="lnkBref" title="En bref : pour les deux du fond qui suivaient pas...">In Brevi</a>
	 </div>
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 cdtrubtitle bxshadow">
	  <a href="#thema" id="lnkThema" title="Thématique : parce que j'ai plusieurs cordes à mon arc...">Argumentum</a>
	 </div>
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 cdtrubtitle bxshadow"">
	  <a href="#chrono" id="lnkChrono" title="&laquo; La chronologie (aussi annale, chronique) est une science de dates et d'événements historiques ou succession d'événements dans le temps. Considérée comme une discipline auxiliaire de l’histoire, la chronologie est une manière d'appréhender l'histoire par les événements.&raquo;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&mdash; source : Wikipedia">Chronicon</a>
	 </div>
   </div>
<!-- -- -- -- -- Rubrique "En Bref" -- -- -- -- -->
   <div class="row" style="margin-top:5px;">
    <div class="col-lg-12-hidden col-md-12 col-sm-12 col-xs-12 bxshadow" id="bref" title="Postquam interiecto temporis amet ipsum expensis pluribus studiis experitur opportunitate professionem amplecti metus. Et sic, per elit disciplina, et percusserit me, ascenderunt in gradibus post annos decem quam ne ad spem Nostram praeveniens exspectationem correspondent. Igitur et effectus huius operis quaestio rursus ad triumphum delaturos est secundum rationem, vel potius ad source codice. Cum novus challenges operantur secundum similitudinem, et moderatorum ad meliorem partem virgam incorporate munus, actum productio modi, (re) invenire linguarum ...&nbsp;&laquo;Evolutio Morpheus, evoutio in ...&raquo;">
	 <p>Après avoir <span class="text-lighter">auto-financer mes études</span> sur plusieurs périodes entrecoupées d'expériences professionnelles, je saisis l'opportunité d'embrasser une carrière dans la restauration.</p>
	 <p>Ainsi, de formations en promotions, <span class="text-lighter">je gravis les échelons</span> et me heurte dix ans plus tard à des perspectives qui ne correspondent plus à mes attentes.</p>
	 <p>Dès lors, le fruit de cette remise en question professionnelle sera très logiquement le retour aux sources, ou plutôt au <span class="text-lighter-italic">code source</span>.</p>
	 <p>Depuis, je travaille à <span class="text-lighter">assimiler</span> les nouveaux enjeux, <span class="text-lighter">incorporer</span> les fonctionnalités et frameworks récents, <span class="text-lighter">actualiser</span> les méthodes de production, <span class="text-lighter">(re)découvrir</span> des languages de programmation...</p>
	 <blockquote>"L'&eacute;volution Morpheus, l'&eacute;voution..."</blockquote>
    </div>
   </div>
<!-- -- -- -- -- Rubrique "Thématique" -- -- -- -- -->
   <div class="col-lg-12-hidden col-md-12 col-sm-12 col-xs-12" id="thema">
	 <div class="row">
	  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 theRubTitle" title="La passion depuis toujours">L'informatique</div>
<!-- -- -- -- -- Certifications -- -- -- -- -->
     <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 theRubText">
      <div class="row">
       <div class="col-xl-2 col-lg-2 subTitle">
        <a href="https://www.openclassrooms.com/fr/" target="_blank"><img class="img-fluid" id="ocrLogo" src="../media/logos/openclassrooms.png"></a>
       </div>
       <div class="col-xl-10 col-lg-10 subTitle">Mes certifications</div>
      </div>
<?php for ( $i = 1 ; $i <= $intCertifs ;$i++ ) {
         $objDate = new DateTime ($arrCertifs[$i]['Date']);
         $strDate = $objDate->format("d/m/Y");
         $strAttributeTitle = "Consulter le certificat : « " . $arrCertifs[$i]['Label'] . " »" . ", obtenue le " . $strDate;
?>
      <div class="row">
       <div class="col-xl-12 col-lg-12 certifLabel">
        <a href="../docs/ocrCertifs/<?php echo $arrCertifs[$i]['File'];?>" target="_blank" title="<?php echo $strAttributeTitle;?>">
         <p><?php echo $arrCertifs[$i]['Label'];?></p>
        </a>
       </div>
      </div>

<?php }?>
     </div>
<!-- -- -- -- -- Mes domaines -- -- -- -- -->
     <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 theRubText">
      <div class="row">
       <div class="col-xl-12 col-lg-12 subTitle">Mes domaines</div>
      </div>
      <div class="row domRow">
       <div class="col-xl-2 col-lg-2 domIcon"><span class="fab fa-php fa-2x"></span></div>
       <div class="col-xl-7 col-lg-7 domName">PHP</div>
       <div class="col-xl-1 col-lg-1 domVersion">7.3</div>
      </div>
      <div class="row domRow">
       <div class="col-xl-2 col-lg-2 domIcon"><span class="fa fa-database fa-2x"></span></div>
       <div class="col-xl-7 col-lg-7 domName">MySql</div>
       <div class="col-xl-1 col-lg-1 domVersion">8.0</div>
      </div>
      <div class="row domRow">
       <div class="col-xl-2 col-lg-2 domIcon"><span class="fab fa-js fa-2x"></span></div>
       <div class="col-xl-7 col-lg-7 domName">JavaScript</div>
       <div class="col-xl-1 col-lg-1 domVersion">ES2015</div>
      </div>
      <div class="row domRow">
       <div class="col-xl-2 col-lg-2 domIcon"><span class="fab fa-html5 fa-2x"></span></div>
       <div class="col-xl-7 col-lg-7 domName">HTML</div>
       <div class="col-xl-1 col-lg-1 domVersion">5.0</div>
      </div>
      <div class="row domRow">
       <div class="col-xl-2 col-lg-2 domIcon"><span class="fab fa-css3 fa-2x"></span></div>
       <div class="col-xl-7 col-lg-7 domName">CSS</div>
       <div class="col-xl-1 col-lg-1 domVersion">3.0</div>
      </div>
      <div class="row domRow">
       <div class="col-xl-2 col-lg-2 domIcon"><span class="fab fa-bootstrap fa-2x"></span></div>
       <div class="col-xl-7 col-lg-7 domName">BootStrap</div>
       <div class="col-xl-1 col-lg-1 domVersion">4.0</div>
      </div>
      <div class="row domRow">
       <div class="col-xl-2 col-lg-2 domIcon"><span class="fab fa-font-awesome fa-2x"></span></div>
       <div class="col-xl-7 col-lg-7 domName">FontAwesome</div>
       <div class="col-xl-1 col-lg-1 domVersion">5.11</div>
      </div>
      <div class="row domRow">
       <div class="col-xl-2 col-lg-2 domIcon"><img class="img-fluid" id="jQLogo" src="../media/logos/jQLogo.png"></div>
       <div class="col-xl-7 col-lg-7 domName">jQuery</div>
       <div class="col-xl-1 col-lg-1 domVersion">3.4.1</div>
      </div>
      <div class="row domRow">
       <div class="col-xl-2 col-lg-2 domIcon"><span class="fa fa-chart-pie fa-2x"></span></div>
       <div class="col-xl-7 col-lg-7 domName">jpGraph</div>
       <div class="col-xl-1 col-lg-1 domVersion">4.2</div>
      </div>
      <div class="row domRow">
       <div class="col-xl-2 col-lg-2 domIcon"><span class="fab fa-git-alt fa-2x"></span></div>
       <div class="col-xl-7 col-lg-7 domName">Git</div>
       <div class="col-xl-1 col-lg-1 domVersion">2.20</div>
      </div>
      <div class="row domRow">
       <div class="col-xl-2 col-lg-2 domIcon"><img class="img-fluid" id="vscLogo" src="../media/logos/vscLogo.png"></div>
       <div class="col-xl-7 col-lg-7 domName">Visual Studio Code</div>
       <div class="col-xl-1 col-lg-1 domVersion">1.40</div>
       
      </div>
     </div>
    </div>
<!-- -- -- -- -- Ma formation -- -- -- -- -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 theRubText">
     <div class="row">
      <div class="col-xl-12 col-lg-12 subTitle">Ma formation</div>
     </div>
     <div class="row">
      <div class="col-xl-8 col-lg-8" id="formationLabel">
       <a href="<?php echo $strDiplomLinkUrl;?>" title="<?php echo $strDiplomLinkTitle;?>" target="_blank"><?php echo $strDiplomLinkLabel;?></a>
      </div>
      <div class="col-xl-4 col-lg-4" id="formationLocation">
       <a href="<?php echo $strAfpaLinkUrl;?>" title="<?php echo $strAfpaLinkTitle;?>" target="_blank"><?php echo $strAfpaLinkLabel;?></a>
      </div>
     </div>
     <div class="row">
	   <div class="col-xl-12" id="formationText">
       <div class="row">
        <div class="col-xl-8 itemLabel">Conception et réalisation d’interfaces utilisateur</div>
       </div>
       <div class="row">
        <div class="col-xl-5 itemLabel">Modélisation</div>
        <div class="col-xl-7 itemText">Merise/U.M.L.</div>
       </div>
       <div class="row">
        <div class="col-xl-5 itemLabel">Languages Web</div>
        <div class="col-xl-7 itemText">PHP, ASP, Javascript, VBscript, HTML, CSS</div>
       </div>
       <div class="row">
        <div class="col-xl-5 itemLabel">Bases de Données</div>
        <div class="col-xl-7 itemText">ADO, SQL Server, MySQL</div>  
       </div>
       <div class="row">
        <div class="col-xl-5 itemLabel">Environnements de développement</div>
        <div class="col-xl-7 itemText">VisualDev, DreamWeaver MX</div>
       </div>
		</div>
	  </div>
    </div>
   </div>
<!-- -- -- -- -- Rubrique "Chronologie" -- -- -- -- -->
   <div class="col-lg-12-hidden col-md-12 col-sm-12 col-xs-12" id="chrono">
	<div class="row">
	 
    </div>
   </div><hr class="body-hr">
<!-- -- -- -- -- Rubrique "Curricula vitae" -- -- -- -- -->
   <div class="row" id="cv">
    <div class="offset-lg-1 col-lg-10 offset-md-1 col-md-10 offset-sm-1 col-sm-10 offset-1 col-10" title="Hé oui, au pluriel ça donne ça..." style="padding-top:5px;margin-top:5px;background-color:transparent;">
     <h2>Curricula vitae</h2>
    </div>
   </div>
   <div class="row can_docitem">
	<div class="offset-lg-2 col-lg-2 offset-md-1 col-md-2 offset-sm-1 col-sm-2 offset-1 col-2 doc-icon-cell">
     <img src="../media/icons/docs.png" class="img-fluid logo" alt="logo documents">
    </div>
    <div class="col-lg-6 col-md-7 col-sm-7 col-7 cdtrubtitle bxshadow">
     <a href="../docs/FD_programmeur_anon.pdf" target="_blank" class="linkcv" title="La base...">Versionem PDF</a>
    </div>
   </div>
   <div class="row can_docitem">
	 <div class="offset-lg-2 col-lg-2 offset-md-1 col-md-2 offset-sm-1 col-sm-2 offset-1 col-2 doc-icon-cell">
     <img src="../media/icons/docs.png" class="img-fluid logo" alt="logo documents">
    </div>
	 <div class="col-lg-6 col-md-7 col-sm-7 col-7 cdtrubtitle bxshadow">
     <a href="cvhtml.htm" class="linkcv" title="La version html/css purs (mon royaume contre un script...)">Versionem HTML</a>
    </div>
   </div>
   <div class="row bottom-buttons"">
    <div class="col-lg-3 col-md-4 col-sm-4 col-4 linktotop bxshadow" title="Haut de page" style="padding-top:5px;margin-top:5px;">
     <a href="#haut">Summitatem</a>
    </div>
    <div class="offset-lg-6 col-lg-3 offset-md-4 col-md-4 offset-sm-4 col-sm-4 offset-4 col-4 linktotop bxshadow" title="Accueil" style="padding-top:5px;margin-top:5px;">
     <a href="../index.php">Ostium</a>
    </div>
   </div>
<?php
// ***** ***** ***** Footer HTML ***** ***** *****
fct_BuildFooterHtml($objPageInfos);
?>