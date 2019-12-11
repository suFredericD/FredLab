<?php
/*******************************************************************************************************
 *   	FredLab Projects Incorporated
 *                Projet :   FredLab
 *                  Page :   webFonts.php
 *                Chemin :   http://www.fred-lab.com/scripts/paging/webFonts.php
 *                  Type :   page de script
 *              Contexte :   php 7.3
 *              Fonction :   construction de la vue : webfonts
 *   Date mise en oeuvre :   10/12/2019
 *          Dernière MàJ :   11/12/2019
 *******************************************************************************************************/
/***** *****    INCLUSIONS ET SCRIPTS   ***** *****/

/***** *****    FONCTIONS   ***** *****/
// Fonction de construction de la vue : webfonts
//       Paramètres : none
// Valeur de retour : code html
function fctDisplayWebFonts($objPageInfos){
    $arrWebFonts = fct_SelectAllWebFonts();
    $intWebFonts = count($arrWebFonts);
    //print_r($arrWebFonts);
    $strExampleText = "abcdefghijklmnopqrstuvwxyz<br>ABCDEFGHIJKLMNOPQRSTUVWXYZ<br>0123456789<br>\\ / &​ . ​, ​? ​! ​@ ​( ​) ​# ​\$ ​% ​* ​+ ​- ​= ​: ​;<br>é è à ù ¤ § [ ] { } ` ² ~ µ";
?>
<!-- -- -- -- Section principale : WebFonts -- -- -- -->
    <section class="row" id="sec_webfonts">
     <div class="col-xl-12 col-lg-12" id="wft_main">
<?php
    for ( $i = 1 ; $i<= $intWebFonts ; $i++ ){
        $strFontFamily = "font-family:'" . $arrWebFonts[$i]['Name'] . "';";
        $strFontLinkUrl = $objPageInfos->getConfigPath() . "fonts/" . $arrWebFonts[$i]['Directory'] . "/" . $arrWebFonts[$i]['Demo'];
        $strFontLinkTitle = "Voir la page d'exemple de la font : '" . $arrWebFonts[$i]['Name'] . "'";
        $strLinkFontKit = "../files/fontskits/" . $arrWebFonts[$i]['Directory'] . ".rar";
        $strLinkFontKitTitle = "Téléchager le fontkit de : '" . $arrWebFonts[$i]['Name'] . "'";
?>
<!-- -- -- -- Article webfont : <?php echo $arrWebFonts[$i]['Name'] . " (id: " . $i . ")";?> -- -- -- -->
      <article class="row">
       <div class="col-xl-4 col-lg-4 wft_infos">
        <div class="row">
         <div class="col-xl-3 col-lg-3 wft_index"><span class="badge badge_custom"><?php echo $i;?></span></div>
         <div class="col-xl-9 col-lg-9 wft_name"><?php echo $arrWebFonts[$i]['Name'];?></div>
<!-- -- -- -- Lien vers la page de démo de : <?php echo $arrWebFonts[$i]['Name'];?> -- -- -- -->
         <div class="offset-xl-1 col-xl-4 offset-lg-1 col-lg-4 wft_link">
          <a href="<?php echo $strFontLinkUrl;?>" title="<?php echo $strFontLinkTitle;?>" target="_blank">Démo</a>
         </div>
<!-- -- -- -- Lien vers le fontkit de : <?php echo $arrWebFonts[$i]['Name'];?> -- -- -- -->
         <div class="offset-xl-1 col-xl-5 offset-lg-1 col-lg-5 wft_link">
          <a href="<?php echo $strLinkFontKit;?>" title="<?php echo $strLinkFontKitTitle;?>"><span class="fa fa-sign-in-alt"></span>&nbsp;Fontkit</a>
         </div>
        </div>
       </div>
<!-- -- -- -- Exemple de la font : <?php echo $arrWebFonts[$i]['Name'];?> -- -- -- -->
       <div class="col-xl-8 col-lg-8 wft_example">
        <p style="<?php echo $strFontFamily;?>"><?php echo $strExampleText;?></p>
       </div>
      </article>
<?php        
    }
?>
     </div>
    </section>
<?php
}