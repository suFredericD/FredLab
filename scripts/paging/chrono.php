<?php
/*******************************************************************************************************
 *   FredLab Projects Incorporated
 *                Projet :   FredLab
 *                  Page :   chrono.php
 *                Chemin :   http://www.fred-lab.com/scripts/paging/chrono.php
 *                  Type :   page de script
 *              Contexte :   php 7.3
 *              Fonction :   construction de la présentation chronologique
 *   Date mise en oeuvre :   07/12/2019
 *          Dernière MàJ :   18/12/2019
 *******************************************************************************************************/
/***** *****    INCLUSIONS ET SCRIPTS   ***** *****/

/***** *****    FONCTIONS   ***** *****/
// Fonction de construction de la présentation chronologique
//       Paramètres : none
// Valeur de retour : code html
function fctDisplayChrono(){
    $datNow = new DateTime();
    $intYearNow = $datNow->format("Y");
    $arrActivities = fct_SelectAllActivitiesDesc();
    $intActivities = count($arrActivities);
?>
	 <div class="row">
<!-- -- -- -- Section gauche : aperçu -- -- -- -->
      <aside class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-4" id="chr_resume">
       <div class="row">
        <label class="col-xl-12" title="Chronologie">Chronicon</label>
<?php
    for ( $i = 1 ; $i <= $intActivities ; $i++ ){
        $strResumeLabel = "res_label" . $i;
?>
        <div class="offset-xl-1 col-xl-10 col-12 chr_reslabel" id="<?php echo $strResumeLabel;?>"><?php echo $arrActivities[$i]['Label'];?></div>
<?php
    }?>
       </div>
      </aside>
<!-- -- -- -- Section droite : affichage du contenu -- -- -- -->
      <section class="col-xl-9 col-lg-8 col-md-8 col-sm-8 col-8" id="chr_content">
       <div class="row">

<!-- -- -- -- Section droite : contenu -- -- -- -->
        <section class="col-xl-12" id="chr_articles">
         <div class="row">
<?php
    for ( $i = 1 ; $i <= $intActivities ; $i++ ){
        $strActivityBlocId = "activity" . $i;
        $strActBlocLabelId = "act_label" . $i;
        $strActBlocInfos = "act_infos" . $i;
        if ( $arrActivities[$i]['Type'] != "Expérience" ){
            $strOwnerLinkTitle = "Vers le site de l'établissement...";
        } else {
            $strOwnerLinkTitle = "Vers le site de l'entreprise...";
        }
        $datStart = new DateTime($arrActivities[$i]['Start']);
        if ( $arrActivities[$i]['End'] != $datNow->format("Y-m-d") ){
            $datEnd = new DateTime($arrActivities[$i]['End']);
            $strDateEnd = $datEnd->format("d/m/Y");
        } else {
            $datEnd = new DateTime();
            $strDateEnd = "Aujourd'hui";
        }
        $datDiff = date_diff($datStart, $datEnd);
	    if ( intval($datDiff->format('%a')) < 31 ){
            $strDateDiff = $datDiff->format('%a') . " jours";
        } else {
            if ( intval($datDiff->format('%a')) < 365 ){
                $strDateDiff = $datDiff->format('%m') . " mois";
            } else {
                $strDateDiff = $datDiff->format('%y') . " ans et " . $datDiff->format('%m') . " mois";
            }
        }
?>
<!-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -->
<!-- -- -- -- Activité n°<?php echo $i . " : " . $arrActivities[$i]['Label'];?> -- -- -- -->
         <article class="col-xl-12" id="<?php echo $strActivityBlocId;?>">
          <div class="row art_row">
           <label class="col-xl-8 col-lg-7 col-md-7 col-sm-7 col-12" for="<?php echo $strActivityBlocId;?>" id="<?php echo $strActBlocLabelId;?>"><?php echo $arrActivities[$i]['Label'];?></label>
           <div class="offset-xl-1 col-xl-3 offset-lg-1 col-lg-4 offset-md-1 col-md-4 offset-sm-1 col-sm-4 col-12 chr_type"><?php echo $arrActivities[$i]['TypeIcon'] . "&nbsp;". $arrActivities[$i]['Type'];?></div>
<!-- -- -- Activité n°<?php echo $i . " : informations";?> -- -- -->
           <div class="col-xl-8 col-lg-8 col-md-8 col-sm-9 col-12" id="<?php echo $strActBlocInfos;?>">
            <div class="row act_rowinfos">
<!-- -- -- Activité n°<?php echo $i . " : période";?> -- -- -->
             <div class="col-xl-4 col-lg-4 col-md-5 col-sm-4 col-4">
              <div class="row row_time">
               <div class="col-xl-12 chr_date"><?php echo $datEnd->format("d/m/Y");?></div>
               <div class="col-xl-12">
                <img class="img-fluid" src="../media/pics/arrow.png">
               </div>
               <div class="col-xl-12 chr_date"><?php echo $datStart->format("d/m/Y");?></div>
              </div>
             </div>
<!-- -- -- Activité n°<?php echo $i . " : entreprise ou établissement";?> -- -- -->
             <div class="col-xl-8 col-lg-8 col-md-7 col-sm-8 col-12 chr_details">
              <div class="row chr_details">
               <div class="col-xl-12 chr_olcell">
<?php   if ( $arrActivities[$i]['Label'] != "Intérim - Prospection" ){?>
                <a class="chr_ownlink" href="<?php echo $arrActivities[$i]['OwnerUrl'];?>" title="<?php echo $strOwnerLinkTitle;?>" target="_blank">
                 <?php echo $arrActivities[$i]['Owner'];?>
                </a>
<?php   } else {?>
                <p><?php echo $arrActivities[$i]['Owner'];?></p>
<?php   }?>
               </div>
<!-- -- -- Activité n°<?php echo $i . " : durée";?> -- -- -->
               <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-12 chr_lapse"><span class="fa fa-hourglass-half"></span></div>
               <div class="col-xl-10 col-lg-10 col-md-9 col-sm-9 col-12 chr_lapse"><?php echo $strDateDiff;?></div>
              </div>
             </div>
             </div>
            </div>        
<!-- -- -- Activité n°<?php echo $i . " : logo";?> -- -- -->
            <div class="col-xl-4 col-lg-4 col-md-3 col-sm-2 col-4 chr_imgcell">
             <img class="img-fluid img_logo" src="../media/logos/<?php echo $arrActivities[$i]['OwnerLogo'];?>">
            </div>
            <div class="offset-xl-1 col-xl-10 offset-lg-1 col-lg-10 chr_text"><?php echo $arrActivities[$i]['Content'];?></div>
          </article>
<?php
    }?>
         </div>
        </section>
<!-- -- -- Fin : chronologie -- -- -->
       </div>
      </section>
     </div>
<?php
}