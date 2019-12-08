<?php
/*******************************************************************************************************
 *   FredLab Projetcs Incorporated
 *                Projet :   FredLab
 *                  Page :   chrono.php
 *                Chemin :   http://127.0.0.1:8080/FredLab/scripts/paging/chrono.php
 *                  Type :   page de script
 *              Contexte :   php 7.3
 *              Fonction :   construction de la présentation chronologique
 *   Date mise en oeuvre :   07/12/2019
 *          Dernière MàJ :   07/12/2019
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
<!-- -- -- Section gauche : années -- -- -->
      <div class="col-xl-2 col-lg-2 chr_bg" id="chr_years">
       <div class="row chr_bg">
<?php
    for ( $i = $intYearNow ; $i > 1998 ; $i--){?>
        <div class="offset-xl-1 col-xl-10 offset-lg-1 col-lg-10 year_label"><?php echo $i;?></div>
<?php
    }?>
       </div>
      </div>
<!-- -- -- Section droite : content -- -- -->
      <div class="col-xl-10 col-lg-10" id="chr_content">
<?php
    for ( $i = 1 ; $i <= $intActivities ; $i++){
        if ( $arrActivities[$i]['Type'] != "Professionnelle" ){
            $strOwnerLabel = "Organisme";
            $strAltLogo = "Logo de l'organisme : " . $arrActivities[$i]['Owner'];
            $strLogoLinkTitle = "Vers le site de l'organisme...";
            $strRoleLabel = "Diplôme";
        } else {
            $strOwnerLabel = "Employeur";
            $strAltLogo = "Logo de l'entreprise : " . $arrActivities[$i]['Owner'];
            $strLogoLinkTitle = "Vers le site de l'entreprise...";
            $strRoleLabel = "Poste";
        }
        $strLogoFile = "../media/logos/" . $arrActivities[$i]['OwnerLogo'];
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
       <div class="row chr_mainrow">
<!-- -- -- Type d'activité -- -- -->
        <label class="col-xl-3 col-lg-3">Activité</label>
        <div class="col-xl-9 col-lg-9 chr_activity">
         <div class="row chr_bg">
          <div class="col-xl-9 col-lg-9 chr_titles"><?php echo $arrActivities[$i]['Type'];?></div>
          <div class="col-xl-3 col-lg-3 chr_icon"><?php echo $arrActivities[$i]['TypeIcon'];?></div>
         </div>
        </div>
<!-- -- -- Employeur ou organisme -- -- -->
        <label class="col-xl-3 col-lg-3"><?php echo $strOwnerLabel;?></label>
        <div class="col-xl-7 col-lg-7 chr_bg">
         <a href="<?php echo $arrActivities[$i]['OwnerUrl'];?>" title="<?php echo $strLogoLinkTitle;?>" target="_blank"><?php echo $arrActivities[$i]['Owner'];?></a>
        </div>
        <div class="col-xl-2 col-lg-2 chr_bg">
         <a href="<?php echo $arrActivities[$i]['OwnerUrl'];?>" title="<?php echo $strLogoLinkTitle;?>" target="_blank">
          <img class="img-fluid" src="<?php echo $strLogoFile;?>" alt="<?php echo $strAltLogo;?>">
         </a>
        </div>
<!-- -- -- Poste ou Diplôme -- -- -->
        <label class="col-xl-3 col-lg-3"><?php echo $strRoleLabel;?></label>
        <div class="col-xl-9 col-lg-9 chr_libelle"><?php echo $arrActivities[$i]['Label'];?></div>
<!-- -- -- Poste ou Diplôme -- -- -->
        <label class="col-xl-3 col-lg-3">Durée</label>
        <div class="col-xl-9 col-lg-9 chr_duration"><?php echo $strDateDiff;?></div>
<!-- -- -- Timing -- -- -->
        <div class="col-xl-2 col-lg-2 chr_timing">
         <div class="row">
          <div class="col-xl-12 col-lg-12"><?php echo $strDateEnd;?></div>
          <div class="col-xl-12 col-lg-12">
           <img class="img-fluid" src="../media/pics/arrow.png">
          </div>
          <div class="col-xl-12 col-lg-12"><?php echo $datStart->format("d/m/Y");?></div>
         </div>
        </div>
<!-- -- -- Informations détaillées -- -- -->
        <div class="col-xl-10 col-lg-10 chr_infoscell">
         <div class="row chr_infos">
          <div class="offset-xl-1 col-xl-10 offset-lg-1 col-lg-10 details">En détails...</div>
          <div class="offset-xl-1 col-xl-10 offset-lg-1 col-lg-10 chr_infos">
           <?php echo $arrActivities[$i]['Content'];?>
          </div>
         </div>
        </div>
       </div>
<?php
    }?>
      </div>

<!-- -- -- Fin : chronologie -- -- -->
     </div>
<?php
}