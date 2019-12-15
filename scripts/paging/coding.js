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
 *          Dernière MàJ :   15/12/2019
 *********************************************************************************************/
/* *** *** *** ELEMENTS *** *** *** */
const liUtilsLinks = document.getElementById("utils_links");        // Bouton : liens utiles
const secUtilsLinks = document.getElementById("sec_utilslinks");    // Section : liens utiles
const lblUtilsLins = document.getElementById("ulk_mainlabel");      // Label principal : section liens utiles
// Tableau des labels de catégories de liens utiles
const arrReferersLabels = document.getElementsByClassName("offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 offset-md-1 col-md-10 ulk_reflabel");

/* *** *** *** PARAMETRES *** *** *** */
const intDisplayFadeIn = 2000;      // Timer animation show
const intDisplayFadeOut = 1150;     // Timer animation hide
/* *** *** *** VARIABLES *** *** *** */
var bolDisplayUtilsLinks = false;

/* *** *** *** INITIALISATIONS *** *** *** */
// Animation du titre header
const intAmimationStartDelay = 500;
var itvAnimeTitle = setInterval(function(){
    $("#main_title").toggle("pulsate",intAmimationStartDelay);
    $("#main_title").show("pulsate",intAmimationStartDelay);
}, 4000);
/* *** *** *** FONCTIONS *** *** *** */
//  Fonction d'affichage du bloc liens utiles
//  EvenListener        : none
//  Paramètres          : none
//  Valeur de retour    : none
function fctDisplayUtilsLinks(){
    if ( bolDisplayUtilsLinks != true ) {
        $("#sec_utilslinks").show("puff", intDisplayFadeIn);
        bolDisplayUtilsLinks = true;
    } else {
        $("#sec_utilslinks").hide("pulsate", intDisplayFadeOut);
        bolDisplayUtilsLinks = false;
    }
    
}
/* *** *** *** APPELS DE FONCTIONS *** *** *** */

/* *** *** *** EVENT LISTENERS *** *** *** */
liUtilsLinks.addEventListener("click", fctDisplayUtilsLinks);
lblUtilsLins.addEventListener("click", fctDisplayUtilsLinks);