/*********************************************************************************************
 *   FredLab Projects Incorporated
 *                Projet :   FredLab
 *                  Page :   acueilPaging.js
 *                Chemin :   https://www.fred-lab.com/scripts/paging/acueilPaging.js
 *        Page référente :   index.php
 *                  Type :   page de script
 *              Contexte :   JavaScript
 *              Fonction :   script de mise en page et animation de la page d'accueil
 *   Date mise en oeuvre :   14/11/2019
 *          Dernière MàJ :   02/11/2020
 *********************************************************************************************/
/* *** *** *** CONSTANTES *** *** *** */
const divSiteTitle = document.getElementById("main_title");                 // Bloc : titre du site
const secMain = document.getElementById("secAccueilMain");                  // Bloc : section principale

const lblCandidat = secMain.getElementsByTagName("label")[0];               // Label du bloc 'Espace candidat'
const lnkCandidat = lblCandidat.getElementsByTagName("a")[0];               // Lien  du bloc 'Espace candidat'
const divCandidat = document.getElementById("accCandidat");                 // Bloc : Espace candidat

const lblCoding = secMain.getElementsByTagName("label")[1];                 // Label du bloc 'Espace coding'
const lnkCoding = lblCoding.getElementsByTagName("a")[0];                   // Lien  du bloc 'Espace coding'
const divCoding = document.getElementById("accCoding");                     // Bloc : Espace coding

const lblCrypto = secMain.getElementsByTagName("label")[2];                 // Label du bloc 'Espace crypto'
const lnkCrypto = lblCoding.getElementsByTagName("a")[0];                   // Lien  du bloc 'Espace crypto'
const divCrypto = document.getElementById("accCrypto");                     // Bloc : Espace crypto

const strLinkBaseColor = getComputedStyle(lnkCandidat).color;               // Couleur d'origine des liens de bloc
const strLabelBaseClass = lblCandidat.className;                            // Classe d'origine des labels de bloc

const divLogoSite = document.getElementById("accLogo_cell");                // Bloc : logo du site
const imgLogoSite = document.createElement("img");                          // Image : logo du site
const strLogoSite = "media/logos/Flogo10a_small.png";                       // Fichier source du logo

const intAmimationStartDelay = 5000;                                        // Délai animation du logo d'accueil
/* *** *** *** MASQUAGES *** *** *** */
divSiteTitle.style.display = "none";                                // Titre du site
imgLogoSite.style.display = "none";                                 // Logo d'acceuil animé
document.getElementById("accWelcome").style.display = "none";       // Titre d'accueil
document.getElementById("accWelcomeSub").style.display = "none";    // Sous-titre d'accueil
document.getElementById("acc_welcometext").style.display = "none";  // Texte d'accueil

/* *** *** *** INITIALISATIONS *** *** *** */
imgLogoSite.id = "accLogo";                         // Logo d'accueil animé : styles
imgLogoSite.src = strLogoSite;
imgLogoSite.className = "img-fluid";
imgLogoSite.alt = "Logo du site";
divLogoSite.insertAdjacentElement('afterbegin', imgLogoSite);
$( document ).ready(function() {
    var itvIntroButtonClose = setTimeout(function(){
        fctInsertCloseButton();                        // Bouton de fermeture du paragraphe d'accueil
    }, 6000);
});
/* *** *** *** AFFICHAGE DES ELEMENTS *** *** *** */
$("#main_title").show("pulsate",intAmimationStartDelay);    // Affichage : titre du site
$("#accLogo").show("clip", intAmimationStartDelay);         // Affichage : logo d'acceuil animé
$("#accWelcome").fadeIn(intAmimationStartDelay);
$("#accWelcomeSub").fadeIn(intAmimationStartDelay);
$("#acc_welcometext").show("slide", intAmimationStartDelay);
$('[data-toggle="meBubble"]').tooltip();
/* *** *** *** ANIMATIONS DES ELEMENTS *** *** *** */
var intDegrees = 10;
var itvLogoAnimeTimeOut = setTimeout(function(){
    var itvLogoAnime = setInterval(function(){
        imgLogoSite.style.transform = "rotateY(" + intDegrees + "deg)";
        intDegrees += 10;
        if ( intDegrees > 360 ) {
            intDegrees = 0;
        }    
    },100);
},intAmimationStartDelay);
var itvAnimeTitleDelay = setInterval(function(){
    $("#main_title").toggle();
    var itvAnimeTitle = setInterval(function(){
        $("#main_title").show("pulsate",500);
    }, 1000);
}, 4000);

/* *** *** *** FONCTIONS *** *** *** */
//  Fonction de création du bouton de fermeture du paragraphe d'accueil
//  Paramètres          : none
//  Valeur de retour    : none
function fctInsertCloseButton(){
    var btnCloseIntro = document.createElement("div");
    var icoCloseIntro = document.createElement("span");
    btnCloseIntro.id = "acc_welcomeclose";
    btnCloseIntro.className = "col-xl-1 btn_close";
    btnCloseIntro.style.display = "none";
    icoCloseIntro.className = "far fa-times-circle fa-2x";

    btnCloseIntro.insertAdjacentElement("afterbegin", icoCloseIntro);
    document.getElementById("acc_welcometext").insertAdjacentElement("beforeend", btnCloseIntro);
    $("#acc_welcomeclose").show("pulsate", 2000);
}
//  Fonction de redisposition des labels des blocs non-sélectionnés
//  EvenListener        : none
//  Paramètres          :
//              intBloc : id du bloc sélectionné
//  Valeur de retour    : none
function fctChangeLabels(intBloc){
    var intLabelNumber = secMain.getElementsByTagName("label").length;      // Nombre total d'items
    for ( i = 0 ; i < intLabelNumber ; i++ ) {
        var lblToChange = secMain.getElementsByTagName("label")[i];         // Label à modifier
        var lnkToChange = lblToChange.getElementsByTagName("a")[0];         // Label à modifier
        if ( i != intBloc ) {       // Changement des blocs non-sélectionnés
            lblToChange.className = strLabelBaseClass;          // Rétablissement classe d'origine
            lnkToChange.style.color = strLinkBaseColor;         // Rétablissement couleur d'origine
        } else {                    // Changement du bloc sélectionné
            lblToChange.className = "col-xl-12 col-lg-12";      // Changement de la classe
            lnkToChange.style.color = "#000";                   // Changement de la couleur
            lnkToChange.style.borderTopLeftRadius = "25px";     // Changement de la bordure
            lnkToChange.style.borderBottomRightRadius = "25px"; // Changement de la bordure
        }
    }
}
//  Fonction de redisposition du label du bloc 'Espace candidat'
//  EvenListener        : click
//  Paramètres          : none
//  Valeur de retour    : none
function fctChangeCandidatLabel(){
    fctChangeLabels(0);
    fctHideBlocs();
}
//  Fonction de redisposition du label du bloc 'Espace coding'
//  EvenListener        : click
//  Paramètres          : none
//  Valeur de retour    : none
function fctChangeCodingLabel(){
    fctChangeLabels(1);
}
//  Fonction de redisposition du label du bloc 'Espace crypto'
//  EvenListener        : click
//  Paramètres          : none
//  Valeur de retour    : none
function fctChangeCryptoLabel(){
    fctChangeLabels(2);
}
/* *** *** *** EVENT LISTENERS *** *** *** */
lnkCandidat.addEventListener("click", fctChangeCandidatLabel);      // Clic : label Candidat
lnkCoding.addEventListener("click", fctChangeCodingLabel);          // Clic : label Codeur
lnkCrypto.addEventListener("click", fctChangeCryptoLabel);          // Clic : label Codeur
var itvCloseButtonclick = setTimeout(function(){                    // Clic : fermeture paragraphe d'intro
    document.getElementById("acc_welcomeclose").addEventListener("click", function(){
        $("#acc_welcometext").hide("fold", 1850);
    });
}, 6100);
/* *** *** *** APPELS DE FONCTIONS *** *** *** */