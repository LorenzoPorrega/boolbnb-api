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
searchBoxHTML.classList.add("form-control");

input.append(searchBoxHTML);
const collection = document.getElementsByClassName("tt-search-box-input").setAttribute("name", "helloButton");
// const att = document.createAttribute("name");
// att.value = "democlass";

// collection.setAttributeNode(att);