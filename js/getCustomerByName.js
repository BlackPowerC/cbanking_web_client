/**
 * Created by jordy on 04/04/18.
 */

/* Requête AJAX pour récupérer la client ayant un nom
 * commencant par un mot clé.
 **/

var cleanDOM = function () {

}

var on404 = function () {


}

var on200 = function (customer_json) {


}

var request = new XMLHttpRequest() ;
request.onreadystatechange = function () {

    if(request.readyState === 4) {

        if(request.status === 200) {

            /* modification du DOM avec affichage de la liste */
        }

        else {

            /* modification du DOM avec affichage de not found */
        }
    }
}