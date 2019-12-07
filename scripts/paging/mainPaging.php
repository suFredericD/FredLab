<?php
/*******************************************************************************************************
 *   FredLab Projetcs Incorporated
 *                Projet :   FredLab
 *                  Page :   mainPaging.php
 *                Chemin :   http://127.0.0.1:8080/FredLab/scripts/paging/mainPaging.php
 *                  Type :   page de script
 *              Contexte :   php 7.3
 *              Fonction :   construction des composants graphiques des pages
 *   Date mise en oeuvre :   13/11/2019
 *          Dernière MàJ :   07/12/2019
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
         <td class="col-lg-4 col-md-4 col-sm-4 col-2">
          <img class="img-logosite" src="<?php echo $objPageInfos->getLogosPath().$GLOBALS['strSiteIcon'];?>">
         <td class="col-lg-8 col-md-8 col-sm-8 col-10"><?php echo $GLOBALS['strSiteTitle'];?></td>
        </tr>
       </table>
      </header>
<?php
}?>