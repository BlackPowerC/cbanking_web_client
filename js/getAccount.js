/**
 * Created by jordy on 03/04/18.
 */

/*
 * Ce fichier contient une requête ajax pour
 * récupérer les infos sur un compte bancaire
 */

var links = document.querySelectorAll(".account-link") ;
var request = new XMLHttpRequest() ;

var cleanDOM = function cleanDOM () {

    var ul_operation = document.getElementById("operations") ;
    var li_list = ul_operation.querySelectorAll('li') ;
    for(var i=0; i< li_list.length; i++) {

        ul_operation.removeChild(li_list[i]) ;
    }
}

/* Cette fonction parse la réponse JSON et modifie le DOM */
var changeDOM = function (account_json) {

    cleanDOM() ;
    var result = JSON.parse(account_json) ;
    // Modification du DOM
    // L'id du compte
    document.getElementById("id").innerHTML = "Compte N° "+result.id;
    // Le nom du client
    document.getElementById("customer").innerHTML = result.customer.name;
    // Le nom de l'employé
    document.getElementById("employee").innerHTML = result.employee.name;
    // La date de création
    document.getElementById("creationDate").innerHTML = result.dateCreation;
    // Les opérations
    var ul_operation = document.getElementById("operations") ;
    for(var i=0; i<result.operations.length; i++)
    {
        var li = document.createElement('li') ;
        var operation = result.operations[i] ;
        li.innerHTML = operation.type+" de "+ operation.amount+" fait par l'employé "+operation.employee.name+ " le "+operation.date ;
        ul_operation.appendChild(li) ;
    }
};

for(var i=0; i<links.length; i++) {

    var link = links[i] ;
    link.addEventListener('click', function (e) {
        e.preventDefault() ;
        request.open('GET', this.href, true) ;
        request.onreadystatechange = function () {

            if(request.readyState === 4) {
                changeDOM(request.responseText) ;
            }
        } ;
        request.send() ;
    }) ;
}