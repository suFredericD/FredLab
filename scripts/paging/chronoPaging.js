/*********************************************************************************************
 *   FredLab Projects Incorporated
 *                Projet :   FredLab
 *                  Page :   chronoPaging.js
 *                Chemin :   http://www.fred-lab.com/scripts/paging/chronoPaging.js
 *        Page référente :   index.php
 *                  Type :   page de script
 *              Contexte :   JavaScript
 *              Fonction :   script de mise en page et animation de la chronologie
 *   Date mise en oeuvre :   08/12/2019
 *          Dernière MàJ :   18/12/2019
 *********************************************************************************************/
/* *** *** *** CONSTANTES *** *** *** */
const lblResumes = document.getElementsByClassName("offset-xl-1 col-xl-10 chr_reslabel");       // Tableau des mini-labels des activités (section gauche)
const secYears = document.getElementById("chr_years");                  // Bloc d'affichage du bandeau des années
const rowDates = document.getElementsByClassName("row row_time");       // Tableau des blocs d'infos des fiches : dates

/* *** *** *** VARIABLES *** *** *** */
var arrDisplayArticles = new Array();                   // Controller : affichage des fiches d'activités
var strLastDisplayedArticle = "";                       // Controller : dernière fiche d'activité affichée
var arrActivitiesDates = new Array();                   // Tableau des dates des activités

/* *** *** *** INITIALISATIONS *** *** *** */
$( document ).ready(function() {                        // Controller : chargement de la page
    // Controller : affichage des fiches d'activités
    for ( i = 1 ; i <= lblResumes.length ; i++ ) {
        arrDisplayArticles[i] = false;
    }
    // Tableau des dates des activités
    for ( i = 1 ; i <= rowDates.length ; i++ ) {
        var intDOMIndex = i - 1;
        var arrDates = rowDates[intDOMIndex].getElementsByClassName("col-xl-12 chr_date");
        arrActivitiesDates[i] = new Array(arrDates[1].innerHTML, arrDates[0].innerHTML);
    }
});
//  Fonction d'affichage du bloc de l'activité sélectionnée
//  EvenListener        : click on lblResumes
//  Paramètres          :
//          strTargetId : id du bloc à afficher
//  Valeur de retour    : none
function fctDisplayActivity(strTargetId){
    var intId = strTargetId.split("res_label")[1];          // Split du paramètre : index du bloc à afficher
    var strDisplayBlocId = "#activity" + intId;             // Id complet du bloc à afficher
    $("#chr_years").show("fold", 1250);
    if (strLastDisplayedArticle != "") {                        // Controller : dernier bloc affiché
        $(strLastDisplayedArticle).hide("fold", 850);
        var intLastArticle = strLastDisplayedArticle.split("#activity")[1];
        arrDisplayArticles[intLastArticle] = false;
        if (strLastDisplayedArticle != strDisplayBlocId ) {     // Controller : dernier bloc différent
            var itvShowNextArticle = setTimeout(function(){
                $(strDisplayBlocId).show("pulsate", 950);
                arrDisplayArticles[intId] = true;
                strLastDisplayedArticle = "#activity" + intId;
            }, 900);
        } else {                                                // Controller : même dernier bloc
            $(strDisplayBlocId).hide("fold", 850);
            arrDisplayArticles[intId] = false;
            strLastDisplayedArticle = "";
            $("#chr_years").hide("pulsate", 850);
        }
    } else {                                                    // Controller : sans affichage initié
        if ( arrDisplayArticles[intId] != true ) {
            $(strDisplayBlocId).show("pulsate", 950);
            arrDisplayArticles[intId] = true;
            strLastDisplayedArticle = "#activity" + intId;
        } else {
            $(strDisplayBlocId).hide("fold", 850);
            arrDisplayArticles[intId] = false;
            strLastDisplayedArticle = "";
            $("#chr_years").hide("pulsate", 850);
        }    
    }
}
/* *** *** *** EVENT LISTENERS *** *** *** */
for ( i = 0 ; i < lblResumes.length ; i++ ) {                   // Clic : mini-labels des activités (section gauche)
    lblResumes[i].addEventListener("click", function(e){
        fctDisplayActivity(e.target.id);
    });
}
/* *** *** *** APPELS DE FONCTIONS *** *** *** */