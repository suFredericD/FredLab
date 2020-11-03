/*********************************************************************************************
 *   	FredLab Projects Incorporated
 *                Projet :   FredLab
 *                  Page :   coding.js
 *                Chemin :   http://www.fred-lab.com/scripts/paging/coding.js
 *        Page référente :   index.php
 *                  Type :   page de script
 *              Contexte :   JavaScript
 *              Fonction :   script de mise en page et animation de la page coding.php
 *   Date mise en oeuvre :   10/12/2019
 *          Dernière MàJ :   02/11/2020
 *********************************************************************************************/
/* *** *** *** ELEMENTS *** *** *** */
const liUtilsLinks = document.getElementById("utils_links");        // Bouton : liens utiles
const secUtilsLinks = document.getElementById("sec_utilslinks");    // Section : liens utiles
const lblUtilsLinks = document.getElementById("ulk_mainlabel");     // Label principal : section liens utiles
// Tableau des labels de catégories de liens utiles
const arrReferersLabels = document.getElementsByClassName("offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 offset-md-1 col-md-10 ulk_reflabel");
const arrReferersBlocks = document.getElementsByClassName("row ulk_referer");

/* *** *** *** PARAMETRES *** *** *** */
const intDisplayFadeIn = 2000;      // Timer animation show
const intDisplayFadeOut = 1150;     // Timer animation hide
/* *** *** *** VARIABLES *** *** *** */
var bolDisplayUtilsLinks = false;               // Controller d'affichage : section liens utiles
var arrDisplayReferers = new Array();           // Controller d'affichage : rubriques des liens utiles

/* *** *** *** INITIALISATIONS *** *** *** */
for ( i = 0 ; i < arrReferersLabels.length ; i++ ) {
    arrDisplayReferers[i] = false;
}

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
//  Fonction d'affichage/masquage de la section 'liens utiles'
//  EvenListener        : liUtilsLinks, lblUtilsLinks
//  Paramètres          : none
//  Valeur de retour    : none
function fctDisplayUtilsLinks(){
    if ( bolDisplayUtilsLinks != true ) {
        $("#sec_utilslinks").show("fold", intDisplayFadeIn);
        bolDisplayUtilsLinks = true;
    } else {
        $("#sec_utilslinks").hide("fold", intDisplayFadeOut);
        bolDisplayUtilsLinks = false;
    }
}
//  Fonction d'affichage/masquage d'une rubrique de la section 'liens utiles'
//  EvenListener        : arrReferersLabels
//  Paramètres          : intRefererId
//  Valeur de retour    : none
function fctDisplayReferersLinks(intRefererId){
    var strRefererId = "#referer" + intRefererId;
    if ( arrDisplayReferers[intRefererId] != false ) {
        $(strRefererId).hide("fold", 1000);
        arrDisplayReferers[intRefererId] = false;
    } else {
        $(strRefererId).show("pulsate", 1000);
        arrDisplayReferers[intRefererId] = true;
    }
}
/* *** *** *** APPELS DE FONCTIONS *** *** *** */

/* *** *** *** EVENT LISTENERS *** *** *** */
liUtilsLinks.addEventListener("click", fctDisplayUtilsLinks);       // Clic : bouton liens utiles
lblUtilsLinks.addEventListener("click", fctDisplayUtilsLinks);      // Clic : label liens utiles

for ( i = 0 ; i < arrReferersLabels.length ; i++ ) {
    arrReferersLabels[i].addEventListener("click", function(e){
        fctDisplayReferersLinks(e.target.id);
    });
}