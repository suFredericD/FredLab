<?php
/*********************************************************************************
 *   FredLab Projetcs Incorporated
 *                Projet :   Pages Persos @ Free
 *                  Page :   menus.php
 *                Chemin :   http://127.0.0.1:8080/ppFree/menus.php
 *                  Type :   page de script
 *              Contexte :   php 7.3
 *              Fonction :   construction des menus du site
 *   Date mise en oeuvre :   24/10/2019
 *          Dernière MàJ :   07/12/2019
 *********************************************************************************/
// Fonction de construction du menu horizontal
//       Paramètres :
//         objPageInfos : objet contenant les infos de la page (classe 'Page')
// Valeur de retour : code html
function fct_BuildHorizontalMenu($objPageInfos){
?>
<!-- -- -- -- -- Menu principal -- -- -- -- -->
      <nav class="navbar navbar-expand-xl navbar-expand-lg navbar-expand-md" id="navbarMain" role="navigation">
       <a class="navbar-brand custom-brand" id="haut" href="#"></a><!-- Ancre pour les liens back-to-top -->
<!-- Bouton de réduction du menu pour les rescales petits formats -->
       <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarFullSite" aria-controls="navbarFullSite" aria-expanded="false" aria-label="Toggle navigation">
        <img src="<?php echo $objPageInfos->getLogosPath().$GLOBALS['strSiteLogo'];?>" class="navbar-toggler-icon">
       </button>
<!-- Barre de menu -->
       <div class="collapse navbar-collapse justify-content-center" id="navbarFullSite">
        <ul class="navbar-nav">
<!-- Page d'accueil -->
         <li class="nav-item">
          <a class="nav-link btn-nav" href="<?php echo $objPageInfos->getIndexPath();?>index.php" title="You are here &lArr;">Accueil</a>
         </li>
<!-- Espace candidat -->
         <li class="nav-item dropdown justify-content-center">
          <a class="nav-link dropdown-toggle" href="<?php echo $objPageInfos->getPath();?>candidat.php" id="navbarCandidat" title="De l'origine de Fred juqu'à nos jours..." role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <span class="far fa-address-card"></span>&nbsp;&nbsp;Candidat</a>
	   <div class="dropdown-menu dropdown-menu-right custom-dpdmenu" aria-labelledby="navbarCandidat">
	    <a class="dropdown-item" href="<?php echo $objPageInfos->getPath();?>candidat.php" title="Accéder à l'espace candidat">Espace candidat</a>
           <a class="dropdown-item" href="<?php echo $objPageInfos->getPath();?>candidat.php#bref" title="Pour les plus pressés ...">En bref</a>
           <a class="dropdown-item" href="<?php echo $objPageInfos->getPath();?>candidat.php#thema" title="Parce que j'ai plusieurs cordes à mon arc...">Thématique</a>
           <a class="dropdown-item" href="<?php echo $objPageInfos->getPath();?>candidat.php#chrono" title="&laquo; La chronologie (aussi annale, chronique) est une science de dates et d'événements historiques ou succession d'événements dans le temps. Considérée comme une discipline auxiliaire de l’histoire, la chronologie est une manière d'appréhender l'histoire par les événements.&raquo;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&mdash; source : Wikipedia">Chronologique</a>
           <div class="dropdown-divider custom-dpd-divider"></div>
           <a class="dropdown-item" href="<?php echo $objPageInfos->getIndexPath();?>docs/FD_programmeur_anon.pdf" title="La base..." target="_blank">Cv - Pdf</a>
           <a class="dropdown-item" href="<?php echo $objPageInfos->getPath();?>cvhtml.htm" title="Mon royaume contre un script...">Cv - Html & Css</a>
          </div>
         </li>
<!-- Espace codeur -->
         <li class="nav-item dropdown justify-content-center">
          <a class="nav-link dropdown-toggle" href="<?php echo $objPageInfos->getPath();?>coding.php" id="navbarCoding" title="Pour les progammeurs" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <span class="fa fa-laptop-code"></span>&nbsp;&nbsp;Codeur</a>
	   <div class="dropdown-menu dropdown-menu-right custom-dpdmenu" aria-labelledby="navbarCoding">

          <div class="dropdown-divider custom-dpd-divider"></div>

          </div>
         </li>
        </ul>
       </div>
      </nav>
<!-- -- -- -- -- Corps du contenu -- -- -- -- -->
<?php
}?>