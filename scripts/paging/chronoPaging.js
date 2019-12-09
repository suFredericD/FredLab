/*********************************************************************************************
 *   FredLab Projetcs Incorporated
 *                Projet :   FredLab
 *                  Page :   chronoPaging.js
 *                Chemin :   http://127.0.0.1:8080/gAm3/scripts/paging/chronoPaging.js
 *        Page référente :   index.php
 *                  Type :   page de script
 *              Contexte :   JavaScript
 *              Fonction :   script de mise en page et animation de la chronologie
 *   Date mise en oeuvre :   08/12/2019
 *          Dernière MàJ :   09/12/2019
 *********************************************************************************************/
/* *** *** *** CONSTANTES *** *** *** */
// Section d'affichage des informations
const secMainDislay = document.getElementById('chr_content');   // Section de travail
// Tableau des fiches d'activité
const arrDivFiles = secMainDislay.getElementsByClassName('row chr_mainrow');
const intDivFiles = arrDivFiles.length;                         // Nombre de fiches d'activité
// Tableau des labels d'activité
const arrDivYearItems = document.getElementsByClassName('col-xl-12 col-lg-12 year_item');
const intDivYearItems = arrDivYearItems.length;                 // Nombre de labels d'activité
// Tableau des boutons des années
const arrBtnYears = document.getElementsByClassName('year_label');
// Div d'affichage de la mini-chronologie
const rowChronoLine = document.getElementById('small_chrono');

const intLastYear = arrBtnYears[0].id;
const intFirstYearId = arrBtnYears.length - 1;
const intFirstYear = arrBtnYears[intFirstYearId].id;
const intYearsNumber = intLastYear - intFirstYear;
/* *** *** *** VARIABLES *** *** *** */
var bolDisplay = false;         // Controller d'affichage blank/full
var intDivLastClick = 0;        // Dernière année cliquée

/* *** *** *** INITIALISATIONS *** *** *** */
// Masquage de tous les labels
for ( i = 0 ; i < intDivYearItems ; i++ ){
    arrDivYearItems[i].style.display = "none";
}

/* *** *** *** FONCTIONS *** *** *** */
//  Fonction de construction de la mini chronologie
//  EvenListener        : none
//  Paramètres          : none
//  Valeur de retour    : none
function displaySmallChrono(){
    for ( i = intLastYear ; i >= intFirstYear ; i-- ) {
        var divChronoItem = document.createElement('div');
        divChronoItem.id = i;
        divChronoItem.className = "col-xl-1 col-lg-1 chh_year"
        divChronoItem.innerHTML = i;
        rowChronoLine.appendChild(divChronoItem);
    }
    rowChronoLine.style.display = "flex";
}
//  Fonction d'affichage/masquage des fiches des activités
//  EvenListener        : click
//  Paramètres          : none
//            intButton : id du bouton cliqué
//  Valeur de retour    : none
function fctDisplayFiles(intYear){
    var strDivYearId = "div" + intYear;                         // Id de l'élément cliqué
    var divYear = document.getElementById(strDivYearId);        // Bloc de l'élément cliqué
    var arrYearItems = divYear.getElementsByTagName('div');     // Tableau des labels d'activités

    if ( bolDisplay != true ) {         // Controller : affichage blank
        for ( i = 0 ; i < arrYearItems.length ; i++ ){
            arrYearItems[i].style.display = "flex";
        }
        // Affichage des fiches sélectionnées
        for ( i = 0 ; i < arrYearItems.length ; i++ ){
            var intItemId = arrYearItems[i].id;
            var strActvityId = "activity" + intItemId.split("-")[1];
            var divToDisplay = document.getElementById(strActvityId);
            divToDisplay.style.display = "flex";
        }
        
        var divYearTitle = document.createElement('div');
        divYearTitle.id = "year_title";
        divYearTitle.className = "col-xl-12 col-lg-12 chi_title";
        divYearTitle.innerHTML = intYear;
        rowChronoLine.insertAdjacentElement("afterend", divYearTitle);

        bolDisplay = true;
        intDivLastClick = intYear;
    } else {                            // Controller : affichage full
        // Masquage de toutes les fiches
        for ( i = 1 ; i <= intDivFiles ; i++ ){
            var strActvityId = "activity" + i;
            var divToHide = document.getElementById(strActvityId);
            divToHide.style.display = "none";
        }
        // Masquage de tous les labels
        for ( i = 0 ; i < intDivYearItems ; i++ ){
            arrDivYearItems[i].style.display = "none";
        }
        if ( intDivLastClick != intYear ) {
            // Affichage des fiches sélectionnées
            for ( i = 0 ; i < arrYearItems.length ; i++ ){
                var intItemId = arrYearItems[i].id;
                var strActvityId = "activity" + intItemId.split("-")[1];
                var divToDisplay = document.getElementById(strActvityId);
                divToDisplay.style.display = "flex";
            }
            document.getElementById("year_title").innerHTML = intYear;
            bolDisplay = true;
            intDivLastClick = intYear;
        } else {
            document.getElementById("year_title").remove();
            bolDisplay = false;
            intDivLastClick = 0;
        }
    }
}
//  Fonction d'affichage des labels des années section gauche au survol
//  EvenListener        : mouseenter
//  Paramètres          : none
//            intButton : id du bouton survolé
//  Valeur de retour    : none
function fctShowYearItems(intYear){
    var strDivYearId = "div" + intYear;
    var divYear = document.getElementById(strDivYearId);
    var arrYearItems = divYear.getElementsByTagName('div');
    // Masquage de tous les labels
    for ( i = 0 ; i < intDivYearItems ; i++ ){
        arrDivYearItems[i].style.display = "none";
    }
    for ( i = 0 ; i < arrYearItems.length ; i++ ){
        arrYearItems[i].style.display = "flex";
    }
    var divBubble = document.createElement('div');
    divBubble.innerHTML = "bleblablable";
    divBubble.style.position = "absolute";
    secMainDislay.insertAdjacentElement("afterbegin", divBubble);
}
//  Fonction de masquage des labels des années section gauche au survol
//  EvenListener        : mouseout
//  Paramètres          : none
//            intButton : id du bouton survolé
//  Valeur de retour    : none
function fctHideYearItems(intYear){
    // Réinitialisation labels des années
    for ( i = 0 ; i < arrBtnYears.length ; i++ ){
        arrBtnYears[i].className = "offset-xl-1 col-xl-10 offset-lg-1 col-lg-10 year_label";
    }
}

/* *** *** *** APPELS DE FONCTIONS *** *** *** */
displaySmallChrono();                                                   // Construction de la mini chronologie
var arrDivSmallChrono = rowChronoLine.getElementsByTagName('div');      // Tableau des boutons de la mini chronologie

/* *** *** *** EVENT LISTENERS *** *** *** */
// Souris clic des labels des années section gauche : affichage des fiches
for ( i = 0 ; i < arrBtnYears.length ; i++ ){
    arrBtnYears[i].addEventListener("click", function(e){
        fctDisplayFiles(e.target.id);
    });
}
// Souris clic des labels des années section haute : affichage des fiches
for ( i = 0 ; i < arrDivSmallChrono.length ; i++ ){
    arrDivSmallChrono[i].addEventListener("click", function(e){
        fctDisplayFiles(e.target.id);
    });
}
// Souris survol des labels des années section gauche : affichage des labels
for ( i = 0 ; i < arrBtnYears.length ; i++ ){
    arrBtnYears[i].addEventListener("mouseenter", function(e){
        fctShowYearItems(e.target.id);
    });
}
// Souris survol des labels des années section gauche : masquage des labels
for ( i = 0 ; i < arrBtnYears.length ; i++ ){
    arrBtnYears[i].addEventListener("mouseout", function(e){
        fctHideYearItems(e.target.id);
    });
}
// Souris survol des labels des années section mini chrono : affichage des labels
for ( i = 0 ; i < arrBtnYears.length ; i++ ){
    arrDivSmallChrono[i].addEventListener("mouseenter", function(e){
        fctShowYearItems(e.target.id);
    });
}