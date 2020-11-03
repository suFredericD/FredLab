/*********************************************************************************************
 *   	FredLab Projects Incorporated
 *                Projet :   FredLab
 *                  Page :   coding.js
 *                Chemin :   http://www.fred-lab.com/scripts/paging/cryptos.js
 *        Page référente :   index.php
 *                  Type :   page de script
 *              Contexte :   JavaScript
 *              Fonction :   script de mise en page et animation de la page crypto_main.php
 *   Date mise en oeuvre :   02/11/2020
 *          Dernière MàJ :   03/11/2020
 *********************************************************************************************/
/* *** *** *** ELEMENTS *** *** *** */
const lnkWallets = document.getElementById("lnkWallets");         // Bouton multiwallets
const lnkExchanges = document.getElementById("lnkExchanges");     // Bouton exchanges
const lnkBrowser = document.getElementById("lnkBrowser");         // Bouton navigateurs
const lnkPTC = document.getElementById("lnkPTC");                 // Bouton PTC
const lnkFaucets = document.getElementById("lnkFaucets");         // Bouton faucets

const secWallets = document.getElementById("secWallets");         // 

/* *** *** *** VARIABLES *** *** *** */
var bolDisplayWallets = false;               // Controller d'affichage : section multiwallets

/* *** *** *** PARAMETRES *** *** *** */
const intDisplayFadeIn = 2000;      // Timer animation show
const intDisplayFadeOut = 1150;     // Timer animation hide

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
//  Fonction d'affichage/masquage de la section 'multiwallets'
//  EvenListener        : lnkWallets
//  Paramètres          : none
//  Valeur de retour    : none
function fctDisplayWallets(){
    if ( bolDisplayWallets != true ) {
        $("#secWallets").show("fold", intDisplayFadeIn);
        bolDisplayWallets = true;
    } else {
        $("#secWallets").hide("fold", intDisplayFadeOut);
        bolDisplayWallets = false;
    }
}
/* *** *** *** APPELS DE FONCTIONS *** *** *** */

/* *** *** *** EVENT LISTENERS *** *** *** */
lnkWallets.addEventListener("click", fctDisplayWallets);       // Clic : bouton multiwallets