/*********************************************************************************************
 *   FredLab Projetcs Incorporated
 *                Projet :   FredLab
 *                  Page :   acueilPaging.js
 *                Chemin :   http://127.0.0.1:8080/gAm3/scripts/paging/acueilPaging.js
 *        Page référente :   index.php
 *                  Type :   page de script
 *              Contexte :   JavaScript
 *              Fonction :   script de mise en page et animation
 *   Date mise en oeuvre :   14/11/2019
 *          Dernière MàJ :   14/11/2019
 *********************************************************************************************/
/* *** *** *** DECLARATIONS *** *** *** */
const secMain = document.getElementById("secAccueilMain");              // Bloc section principale

const lblCandidat = secMain.getElementsByTagName("label")[0];           // Label du bloc 'Espace candidat'
const lnkCandidat = lblCandidat.getElementsByTagName("a")[0];           // Lien  du bloc 'Espace candidat'
const divCandidat = document.getElementById("accCandidat");             // Bloc 'Espace candidat'

const lblCoding = secMain.getElementsByTagName("label")[1];             // Label du bloc 'Espace coding'
const lnkCoding = lblCoding.getElementsByTagName("a")[0];               // Lien  du bloc 'Espace coding'
const divCoding = document.getElementById("accCoding");                 // Bloc 'Espace coding'

const strLinkBaseColor = getComputedStyle(lnkCandidat).color;           // Couleur d'origine des liens de bloc
const strLabelBaseClass = lblCandidat.className;                        // Classe d'origine des labels de bloc
/* *** *** *** FONCTIONS *** *** *** */
//  Fonction de redisposition des labels des blocs non-sélectionnés
//  EvenListener        : none
//  Paramètres          :
//              intBloc : id du bloc sélectionné
//  Valeur de retour    : none
function fctChangeLabels(intBloc){
    var intLabelNumber = secMain.getElementsByTagName("label").length;      // Nombre total d'items
    for ( i=0 ; i < intLabelNumber ; i++ ) {
        var lblToChange = secMain.getElementsByTagName("label")[i];         // Label à modifier
        var lnkToChange = lblToChange.getElementsByTagName("a")[0];         // Label à modifier
        if ( i != intBloc ) {       // Changement des blocs non-sélectionnés
            lblToChange.className = strLabelBaseClass;          // Rétablissement classe d'origine
            lnkToChange.style.color = strLinkBaseColor;         // Rétablissement couleur d'origine
            lnkToChange.style.borderRadius = "0px";             // Rétablissement bordure d'origine
        } else {                    // Changement du bloc sélectionné
            lblToChange.className = "col-xl-12 col-lg-12";      // Changement de la classe
            lnkToChange.style.color = "#000";                   // Changement de la couleur
            lnkToChange.style.borderRadius = "25px";            // Changement de la bordure
        }
    }
}
//  Fonction de redisposition du label du bloc 'Espace candidat'
//  EvenListener        : click
//  Paramètres          : none
//  Valeur de retour    : none
function fctChangeCandidatLabel(){
    fctChangeLabels(0);
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