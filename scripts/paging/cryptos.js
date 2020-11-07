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
 *          Dernière MàJ :   07/11/2020
 *********************************************************************************************/
/* *** *** *** ELEMENTS *** *** *** */
const lnkWallets = document.getElementById("lnkWallets");         // Bouton multiwallets
const lnkExchanges = document.getElementById("lnkExchanges");     // Bouton exchanges
const lnkBrowser = document.getElementById("lnkBrowser");         // Bouton navigateurs
const lnkPTC = document.getElementById("lnkPTC");                 // Bouton PTC
const lnkFaucets = document.getElementById("lnkFaucets");         // Bouton faucets
const lnkGames = document.getElementById("lnkGames");             // Bouton jeux

const eltSubTitle = document.getElementById("crySubTitle");       // Sous-tire de section 'contenu'
const eltContent = document.getElementById("cryText");            // Section 'contenu'
/* *** *** *** VARIABLES *** *** *** */
var bolDisplayWallets = false;               // Controller d'affichage : section multiwallets
var bolDisplayExchanges = false;             // Controller d'affichage : section exchanges
var bolDisplayBrowser = false;               // Controller d'affichage : section navigateurs
var bolDisplayPTC = false;                   // Controller d'affichage : section PTC
var bolDisplayFaucets = false;               // Controller d'affichage : section faucets
var bolDisplayGames = false;                 // Controller d'affichage : section jeux

/* *** *** *** PARAMETRES *** *** *** */
const intDisplayFadeIn = 2000;      // Timer animation show
const intDisplayFadeOut = 1150;     // Timer animation hide
const intAmimationMenu = 750;       // Timer animation menu show/hide

const strWelcomeText = eltSubTitle.innerHTML;
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
//  Fonction d'affichage/masquage du header de la section 'contenu'
//  Paramètres          : bolShowHide
//  Valeur de retour    : none
function fctShowHideSubTitle(bolShowHide){
    if(bolShowHide == true){
        $("#crySubTitle").hide("pulsate", intAmimationStartDelay);
    } else {
        $("#crySubTitle").show("pulsate", intAmimationStartDelay);
    }
}
//  Fonction d'affichage/masquage de la section 'multiwallets'
//  EvenListener        : lnkWallets
//  Paramètres          : none
//  Valeur de retour    : none
function fctShowHideWallets(){
    if(bolDisplayWallets == false){
        $("#crRub1").show("fold", intAmimationMenu);
        bolDisplayWallets = true;
        fctShowHideSubTitle(true);
    } else {
        $("#crRub1").hide("fold", intAmimationMenu);
        bolDisplayWallets = false;
        fctShowHideSubTitle(false);
    }
}
//  Fonction d'affichage/masquage de la section 'exchanges'
//  EvenListener        : lnkExchanges
//  Paramètres          : none
//  Valeur de retour    : none
function fctShowHideExchanges(){
    if(bolDisplayExchanges == false){
        $("#crRub2").show("fold", intAmimationMenu);
        bolDisplayExchanges = true;
        fctShowHideSubTitle(true);
    } else {
        $("#crRub2").hide("fold", intAmimationMenu);
        bolDisplayExchanges = false;
        fctShowHideSubTitle(false);
    }
}
//  Fonction d'affichage/masquage de la section 'browsers'
//  EvenListener        : lnkBrowser
//  Paramètres          : none
//  Valeur de retour    : none
function fctShowHideBrowser(){
    if(bolDisplayBrowser == false){
        $("#crRub3").show("fold", intAmimationMenu);
        bolDisplayBrowser = true;
        fctShowHideSubTitle(true);
    } else {
        $("#crRub3").hide("fold", intAmimationMenu);
        bolDisplayBrowser = false;
        fctShowHideSubTitle(false);
    }
}
//  Fonction d'affichage/masquage de la section 'PTC'
//  EvenListener        : lnkPTC
//  Paramètres          : none
//  Valeur de retour    : none
function fctShowHidePTC(){
    if(bolDisplayPTC == false){
        $("#crRub4").show("fold", intAmimationMenu);
        bolDisplayPTC = true;
        fctShowHideSubTitle(true);
    } else {
        $("#crRub4").hide("fold", intAmimationMenu);
        bolDisplayPTC = false;
        fctShowHideSubTitle(false);
    }
}
//  Fonction d'affichage/masquage de la section 'faucets'
//  EvenListener        : lnkFaucets
//  Paramètres          : none
//  Valeur de retour    : none
function fctShowHideFaucets(){
    if(bolDisplayFaucets == false){
        $("#crRub5").show("fold", intAmimationMenu);
        bolDisplayFaucets = true;
        fctShowHideSubTitle(true);
    } else {
        $("#crRub5").hide("fold", intAmimationMenu);
        bolDisplayFaucets = false;
        fctShowHideSubTitle(false);
    }
}
//  Fonction d'affichage/masquage de la section 'jeux'
//  EvenListener        : lnkGames
//  Paramètres          : none
//  Valeur de retour    : none
function fctShowHideGames(){
    if(bolDisplayGames == false){
        $("#crRub6").show("fold", intAmimationMenu);
        bolDisplayGames = true;
        fctShowHideSubTitle(true);
    } else {
        $("#crRub6").hide("fold", intAmimationMenu);
        bolDisplayGames = false;
        fctShowHideSubTitle(false);
    }
}
/* *** *** *** APPELS DE FONCTIONS *** *** *** */

/* *** *** *** EVENT LISTENERS *** *** *** */
lnkWallets.addEventListener("click", fctShowHideWallets);           // click : multiWallets
lnkExchanges.addEventListener("click", fctShowHideExchanges);       // click : exchanges
lnkBrowser.addEventListener("click", fctShowHideBrowser);           // click : browsers
lnkPTC.addEventListener("click", fctShowHidePTC);                   // click : PTC
lnkFaucets.addEventListener("click", fctShowHideFaucets);           // click : faucets
lnkGames.addEventListener("click", fctShowHideGames);               // click : jeux