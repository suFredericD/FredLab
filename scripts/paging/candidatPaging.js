/*********************************************************************************************
 *   FredLab Projects Incorporated
 *                Projet :   FredLab
 *                  Page :   candidatPaging.js
 *                Chemin :   https://www.fred-lab.com/scripts/paging/candidatPaging.js
 *        Page référente :   index.php
 *                  Type :   page de script
 *              Contexte :   JavaScript
 *              Fonction :   script de mise en page et animation de la page candidat.php
 *   Date mise en oeuvre :   15/11/2019
 *          Dernière MàJ :   16/12/2019
 *********************************************************************************************/
/* *** *** *** CONSTANTES *** *** *** */
const rowLinksContainer = document.getElementById("rowLinks");
const lnkBref = document.getElementById("lnkBref");         // Bouton : rubrique Bref
const divBrefTitle = document.getElementById("bref");       // Bloc : rubrique Bref
const lnkThema = document.getElementById("lnkThema");       // Bouton : rubrique Thématique
const divThemaTitle = document.getElementById("thema");     // Bloc : rubrique Thématique
const lnkChrono = document.getElementById("lnkChrono");     // Bouton : rubrique Chronologie
const divChronoTitle = document.getElementById("chrono");   // Bloc : rubrique Chronologie

const arrLinks = [lnkBref, lnkThema, lnkChrono];                    // Tableau des boutons de rubriques
const arrTitles = [divBrefTitle, divThemaTitle, divChronoTitle];    // Tableau des blocs de rubriques
const strLinkBaseClasse = divBrefTitle.className;                   // Classe de base des boutons de rubriques

const arrSubjectsLabels = document.getElementsByClassName("col-xl-12 sublabel");
const arrSubjectsBlocks = document.getElementsByClassName("row subcertif");
/* *** *** *** VARIABLES *** *** *** */
var arrDisplaySubjects = new Array();           // Controller : display catégories de certifications
for ( i = 1 ; i <= arrSubjectsLabels.length ; i++ ) {
    arrDisplaySubjects[i] = false;
}
var arrDisplayCursus = new Array();             // Controller : display types de cursus affiché
for ( i = 1 ; i <= arrTitles.length ; i++ ) {
    arrDisplayCursus[i] = false;
}
/* *** *** *** INITIALISATIONS *** *** *** */

/* *** *** *** ANIMATIONS *** *** *** */
// Animation du titre header
const intAmimationStartDelay = 500;
$( document ).ready(function() {
    var itvAnimeTitle = setInterval(function(){
        $("#main_title").toggle("pulsate",intAmimationStartDelay);
        $("#main_title").show("pulsate",intAmimationStartDelay);
    }, 4000);
});
/* *** *** *** FONCTIONS *** *** *** */
//  Fonction d'affichage des rubriques du cursus sélectionnées
//  EvenListener        : click
//  Paramètres          : none
//            strBlocId : id du bloc sélectionné
//  Valeur de retour    : none
function fctDisplayCursus(strLinkId){
    for ( i = 0 ; i < arrLinks.length ; i++ ) {
        var strBlocId = "#" + arrTitles[i].id;
        if ( arrLinks[i].id === strLinkId ){
            if ( arrDisplayCursus[i] != true ) {    // Affichage du bloc sélectionné
                $(strBlocId).show("fold", 1850);
                arrDisplayCursus[i] = true;
            } else {                                // Masquage du bloc affiché quand reclic sur label
                $(strBlocId).hide("fold", 1050);
                arrDisplayCursus[i] = false;
            }
        } else {                                    // Masquage du bloc affiché pour remplacement
            if ( arrDisplayCursus[i] != false ) {
                $(strBlocId).hide("fold", 1050);
                arrDisplayCursus[i] = false;
            }
        }
    }
}
//  Fonction d'affichage du bloc du sujet sélectionné dans la section Certifications
//  EvenListener        : click on arrSubjectsLabels
//  Paramètres          : none
//  Valeur de retour    : none
function fctDisplaySubject(intIndex){
    var strIndex = "#subject" + intIndex;
    if ( arrDisplaySubjects[intIndex] != true ) {
        $(strIndex).show("fold", 1550);
        arrDisplaySubjects[intIndex] = true;
    } else {
        $(strIndex).hide("fold", 1050);
        arrDisplaySubjects[intIndex] = false;
    }
}
/* *** *** *** EVENT LISTENERS *** *** *** */
for ( i = 0 ; i < arrLinks.length ; i++ ) {                 // Clic : boutons d'afficahge des cursus
    arrLinks[i].addEventListener("click", function(e){
        fctDisplayCursus(e.target.id);
    });
}
for ( i = 0 ; i < arrSubjectsLabels.length ; i++ ) {        // Clic : boutons d'affichage des catégories de certifications
    arrSubjectsLabels[i].addEventListener("click", function(e){
        fctDisplaySubject(e.target.id);
    });
}
/* *** *** *** APPELS DE FONCTIONS *** *** *** */