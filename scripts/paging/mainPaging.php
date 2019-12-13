<?php
/*******************************************************************************************************
 *   FredLab Projects Incorporated
 *                Projet :   FredLab
 *                  Page :   mainPaging.php
 *                Chemin :   http://www.fred-lab.com/scripts/paging/mainPaging.php
 *                  Type :   page de script
 *              Contexte :   php 7.3
 *              Fonction :   construction des composants graphiques des pages
 *   Date mise en oeuvre :   13/11/2019
 *          Dernière MàJ :   13/12/2019
 *******************************************************************************************************/
/***** *****    INCLUSIONS ET SCRIPTS   ***** *****/

/***** *****    FONCTIONS   ***** *****/
// Fonction de construction du header graphique
//       Paramètres :
//         objPageInfos : objet contenant les infos de la page (classe 'Page')
// Valeur de retour : code html
function fct_BuildHeaderGraph($objPageInfos){?>
<!-- -- -- -- -- Header graphique -- -- -- -- -->
      <header id="site-header">
       <table class="table" id="tab-site-header">
        <tr class="row">
         <td class="col-lg-4 col-md-4 col-sm-4 col-4">
          <img class="img-logosite" src="<?php echo $objPageInfos->getLogosPath().$GLOBALS['strSiteLogo'];?>">
         <td class="col-lg-8 col-md-8 col-sm-8 col-8" id="main_title"><?php echo $GLOBALS['strSiteTitle'];?></td>
        </tr>
       </table>
      </header>
<?php
}