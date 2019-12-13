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
 *          Dernière MàJ :   13/12/2019
 *********************************************************************************************/
/* *** *** *** CONSTANTES *** *** *** */
const divSiteTitle = document.getElementById("main_title");
const secMain = document.getElementById("secAccueilMain");                  // Bloc section principale

const lblCandidat = secMain.getElementsByTagName("label")[0];               // Label du bloc 'Espace candidat'
const lnkCandidat = lblCandidat.getElementsByTagName("a")[0];               // Lien  du bloc 'Espace candidat'
const divCandidat = document.getElementById("accCandidat");                 // Bloc 'Espace candidat'

const lblCoding = secMain.getElementsByTagName("label")[1];                 // Label du bloc 'Espace coding'
const lnkCoding = lblCoding.getElementsByTagName("a")[0];                   // Lien  du bloc 'Espace coding'
const divCoding = document.getElementById("accCoding");                     // Bloc 'Espace coding'

const strLinkBaseColor = getComputedStyle(lnkCandidat).color;               // Couleur d'origine des liens de bloc
const strLabelBaseClass = lblCandidat.className;                            // Classe d'origine des labels de bloc

const divLogoSite = document.getElementById("accLogo_cell");                // Cellule : logo du site
const imgLogoSite = document.createElement("img");                          // Image : logo du site
const strLogoSite = "media/logos/Flogo10a_small.png";                       // Fichier source du logo

const intAmimationStartDelay = 5000;                                        // Délai animation du logo d'accueil
/* *** *** *** INITIALISATIONS *** *** *** */
divSiteTitle.style.display = "none";                // Masquage : titre du site

imgLogoSite.id = "accLogo";                         // Logo d'accueil animé
imgLogoSite.src = strLogoSite;
imgLogoSite.className = "img-fluid";
imgLogoSite.alt = "Logo du site";
imgLogoSite.style.display = "none";
divLogoSite.insertAdjacentElement('afterbegin', imgLogoSite);

/* *** *** *** ANIMATIONS DES ELEMENTS *** *** *** */
//$("#main_title").show("pulsate", intAmimationStartDelay);
$("#main_title").show("pulsate",intAmimationStartDelay);
$("#accLogo").show("clip", intAmimationStartDelay);
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
/* *** *** *** FONCTIONS *** *** *** */
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
/* *** *** *** EVENT LISTENERS *** *** *** */
lnkCandidat.addEventListener("click", fctChangeCandidatLabel);
lnkCoding.addEventListener("click", fctChangeCodingLabel);

/* *** *** *** APPELS DE FONCTIONS *** *** *** */