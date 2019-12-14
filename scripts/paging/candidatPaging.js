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
 *          Dernière MàJ :   14/12/2019
 *********************************************************************************************/
/* *** *** *** DECLARATIONS *** *** *** */
const rowLinksContainer = document.getElementById("rowLinks");
const lnkBref = document.getElementById("lnkBref");
const divBrefTitle = lnkBref.parentNode;
const lnkThema = document.getElementById("lnkThema");
const divThemaTitle = lnkThema.parentNode;
const lnkChrono = document.getElementById("lnkChrono");
const divChronoTitle = lnkChrono.parentNode;

const arrLinks = [lnkBref, lnkThema, lnkChrono];
const arrTitles = [divBrefTitle, divThemaTitle, divChronoTitle];
const strLinkBaseClasse = divBrefTitle.className;

const intAmimationStartDelay = 500;                                        // Délai animation du logo d'accueil
var itvAnimeTitle = setInterval(function(){
    $("#main_title").toggle("pulsate",intAmimationStartDelay);
    $("#main_title").show("pulsate",intAmimationStartDelay);
}, 4000);

/* *** *** *** FONCTIONS *** *** *** */
//  Fonction de redisposition des labels des blocs non-sélectionnés
//  EvenListener        : click
//  Paramètres          : none
//              intBloc : id du bloc sélectionné
//  Valeur de retour    : none
function fctChangeAllLabels(intBloc){
    rowLinksContainer.innerHTML = "";
    switch ( intBloc ){
        case 0:
            arrTitles[0].className = "col-xl-12 cdtrubtitle-on bxshadow";
            arrTitles[1].className = "col-xl-6 cdtrubtitle bxshadow";
            arrTitles[2].className = "col-xl-6 cdtrubtitle bxshadow";
            rowLinksContainer.insertAdjacentElement("afterBegin", arrTitles[1]);
            rowLinksContainer.insertAdjacentElement("beforeEnd", arrTitles[2]);
            rowLinksContainer.insertAdjacentElement("beforeEnd", arrTitles[0]);
            break;
        case 1:
            arrTitles[1].className = "col-xl-12 cdtrubtitle-on bxshadow";
            arrTitles[0].className = "col-xl-6 cdtrubtitle bxshadow";
            arrTitles[2].className = "col-xl-6 cdtrubtitle bxshadow";
            rowLinksContainer.insertAdjacentElement("afterBegin", arrTitles[0]);
            rowLinksContainer.insertAdjacentElement("beforeEnd", arrTitles[2]);
            rowLinksContainer.insertAdjacentElement("beforeEnd", arrTitles[1]);
            break;
        case 2:
            arrTitles[0].className = "col-xl-6 cdtrubtitle bxshadow";
            arrTitles[1].className = "col-xl-6 cdtrubtitle bxshadow";
            arrTitles[2].className = "col-xl-12 cdtrubtitle-on bxshadow";
            rowLinksContainer.insertAdjacentElement("afterBegin", arrTitles[0]);
            rowLinksContainer.insertAdjacentElement("beforeEnd", arrTitles[1]);
            rowLinksContainer.insertAdjacentElement("beforeEnd", arrTitles[2]);
            break;
    }
}
//  Fonction de redisposition du label du bloc 'en bref'
//  EvenListener        : lnkBref.click
//  Paramètres          : none
//  Valeur de retour    : none
function fctChangeBrefLabel(){
    fctChangeAllLabels(0);
}
//  Fonction de redisposition du label du bloc 'en bref'
//  EvenListener        : lnkThemaclick
//  Paramètres          : none
//  Valeur de retour    : none
function fctChangeThemaLabel(){
    fctChangeAllLabels(1);
}
//  Fonction de redisposition du label du bloc 'en bref'
//  EvenListener        : lnkChrono.click
//  Paramètres          : none
//  Valeur de retour    : none
function fctChangeChronoLabel(){
    fctChangeAllLabels(2);
}
/* *** *** *** EVENT LISTENERS *** *** *** */
lnkBref.addEventListener("click", fctChangeBrefLabel);
lnkThema.addEventListener("click", fctChangeThemaLabel);
lnkChrono.addEventListener("click", fctChangeChronoLabel);

/* *** *** *** APPELS DE FONCTIONS *** *** *** */