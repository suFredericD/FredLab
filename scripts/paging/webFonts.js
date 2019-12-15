/*****************************************************************************************************************************
 *   	FredLab Projects Incorporated
 *                Projet :   FredLab
 *                  Page :   webFonts.js
 *                Chemin :   http://www.fred-lab.com/scripts/paging/webFonts.js
 *        Page référente :   index.php
 *                  Type :   page de script
 *              Contexte :   JavaScript
 *              Fonction :   script de mise en page et animation de la page coding.php vue webfonts
 *   Date mise en oeuvre :   15/12/2019
 *          Dernière MàJ :   15/12/2019
 *****************************************************************************************************************************/
/* *** *** *** ELEMENTS *** *** *** */
const btnCloseWelcome = document.getElementById("wft_welclose");

/* *** *** *** PARAMETRES *** *** *** */

/* *** *** *** VARIABLES *** *** *** */

/* *** *** *** INITIALISATIONS *** *** *** */

/* *** *** *** ANIMATIONS *** *** *** */

/* *** *** *** FONCTIONS *** *** *** */
//  Fonction d'affichage/masquage de la section liens utiles
//  EvenListener        : liUtilsLinks, lblUtilsLinks
//  Paramètres          : none
//  Valeur de retour    : none


/* *** *** *** APPELS DE FONCTIONS *** *** *** */

/* *** *** *** EVENT LISTENERS *** *** *** */
btnCloseWelcome.addEventListener("click", function(){
    $("#wft_welcome").hide("fold", 1000);
})