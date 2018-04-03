/**
 * Created by jordy on 03/04/18.
 */

/*
 * Ce fichier contient une requête ajax pour
 * récupérer les infos sur un compte bancaire
 */

var links = document.querySelectorAll(".account-link") ;
var request = new XMLHttpRequest() ;

/* Cette fonction parse la réponse JSON */
var parseAccount = function (account_json) {

    /* La partie opération peut être vide */

}

for(var i=0; i<links.length; i++) {

    var link = links[i] ;
    link.addEventListener('click', function (e) {
        e.preventDefault() ;
        request.open('GET', this.href, true) ;
        request.onreadystatechange = function () {

            if(request.readyState === 4) {

            }
        }
        request.send() ;
    }) ;
}