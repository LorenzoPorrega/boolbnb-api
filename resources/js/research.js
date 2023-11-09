var options = {
    searchOptions: {
        key: "9GGMAIWofgnTAUXbZTCGx0V0SDSxAx9I",
        language: "it-IT",
        limit: 5,
    },
    autocompleteOptions: {
        key: "9GGMAIWofgnTAUXbZTCGx0V0SDSxAx9I",
        language: "it-IT",
    },
}
var ttSearchBox = new tt.plugins.SearchBox(tt.services, options)
var searchBoxHTML = ttSearchBox.getSearchBoxHTML()
const input = document.getElementById('input')
searchBoxHTML.classList.add("form-control","m-0", "border-0", "p-0");


input.append(searchBoxHTML);
ttSearchBox.on("tomtom.searchbox.resultselected", function (data) {
    //recupero l'input
    const adderessInput =  document.getElementById("address")
    // assegno tutto il valore della via 
    // posizione paese ecc.....
    //converto il data in ujna stringa che verra poi ri convertito in php
    adderessInput.value = JSON.stringify(data);
    console.log(adderessInput.value)
    console.log(adderessInput.getAttribute("value"))
    console.log(data)
    console.log(data["data"]["result"])
})

//Stampare i dati direttamente nel codice JavaScript: questo metodo è il più diretto. Puoi utilizzare json_encode() 
//per convertire i dati in formato JSON e quindi stampare i dati direttamente nel codice JavaScript. Tuttavia, questo metodo potrebbe non essere il più leggibile.

//Stampare i dati nella pagina e utilizzare JavaScript per accedervi: questo metodo prevede di stampare i 
//dati nella pagina HTML e quindi utilizzare JavaScript per accedervi. Questo metodo è utile se vuoi evitare di utilizzare AJAX e non hai bisogno di una risposta asincrona dal server.