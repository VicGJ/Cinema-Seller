var xhttp = new XMLHttpRequest();
var peli = null;

function searchFilm(pelicula) {
    
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            peli = this.responseXML.getElementsByTagName("pelicula");
            var table = new Array();
            for (i = 0; i < peli.length; i++) {
                var currentFilm;
                currentFilm = peli[i].getElementsByTagName("nombre");
                if (currentFilm.item(0).innerHTML == pelicula) {
                     table.push(peli[i].getElementsByTagName("nombre")[0].childNodes[0]);
                }
            }
            var text = "";
            text = table[0].textContent;
            document.getElementById('demo').innerHTML = text;
        }
        
    };
    xhttp.open("GET", "basededatos/pelicula.xml", true);
    xhttp.send();

    
}