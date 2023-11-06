import axios from "axios";
// function myFunction(){
//     axios.get()
// }

let stores = {
    "type": "FeatureCollection",
    "features": [
        

    // {
    //     "type": "Feature",
    //     "geometry": {
    //         "type": "Point",
    //         "coordinates": [
    //             4.472817,
    //             51.929622
    //         ]
    //     },
    //     "properties": {
    //         "address": "Paap Dirckstraat 68, 3032 SW",
    //         "city": "Rotterdam"
    //     }
    // },
    // {
    //     "type": "Feature",
    //     "geometry": {
    //         "type": "Point",
    //         "coordinates": [
    //             10.79197,
    //             45.15787
    //         ]
    //     },
    //     "properties": {
    //         "address": "Corso Umberto I 44, 46100 SW",
    //         "city": "Mantova"
    //     }
    // }
    ]
};

// function myFunction() {
//     axios.get('http://127.0.0.1:8000/api/coordinates/')
//         .then((response) => {
//             console.log(response);
//             const data = response["data"]["data"]["features"]
//             for (let i = 0; i < data.length; i++) {
//                 let point = data[i]
//                 stores["features"].push(point)
//                 console.log(point)
//             }
//             createmap()
//         })
// }
// myFunction()
createmap()
function createmap() {


    const apiKey = '9GGMAIWofgnTAUXbZTCGx0V0SDSxAx9I';
    const map = tt.map({
        key: '9GGMAIWofgnTAUXbZTCGx0V0SDSxAx9I',
        container: 'map',
        center: [13.208185, 43.711744],
        zoom: 10
    });

    const markersCity = [];
    const list = document.getElementById('store-list');

    stores.features.forEach(function (stores, index) {
        const city = stores.properties.city;
        const address = stores.properties.address;
        const location = stores.geometry.coordinates;
        const marker = new tt.Marker().setLngLat(location).setPopup(new tt.Popup({
            offset: 35
        }).setHTML(address)).addTo(map);
        markersCity[index] = {
            marker,
            city
        };

        let cityStoresList = document.getElementById(city);
        if (cityStoresList === null) {
            const cityStoresListHeading = list.appendChild(document.createElement('h3'));
            cityStoresListHeading.innerHTML = city;
            cityStoresList = list.appendChild(document.createElement('div'));
            cityStoresList.id = city;
            cityStoresList.className = 'list-entries-container';
            cityStoresListHeading.addEventListener('click', function (e) {
                map.fitBounds(getMarkersBoundsForCity(e.target.innerText), {
                    padding: 50
                });
            });
        }

        const details = buildLocation(cityStoresList, address);

        marker.getElement().addEventListener('click', function () {
            const activeItem = document.getElementsByClassName('selected');
            if (activeItem[0]) {
                activeItem[0].classList.remove('selected');
            }
            details.classList.add('selected');
            openCityTab(city);
        });

        details.addEventListener('click', function () {
            const activeItem = document.getElementsByClassName('selected');
            if (activeItem[0]) {
                activeItem[0].classList.remove('selected');
            }
            details.classList.add('selected');
            map.easeTo({
                center: marker.getLngLat(),
                zoom: 18
            });
            closeAllPopups();
            marker.togglePopup();

        });

        function buildLocation(htmlParent, text) {
            const details = htmlParent.appendChild(document.createElement('a'));
            details.href = '#';
            details.className = 'list-entry';
            details.innerHTML = text;
            return details;
        }

        function closeAllPopups() {
            markersCity.forEach(markerCity => {
                if (markerCity.marker.getPopup().isOpen()) {
                    markerCity.marker.togglePopup();
                }
            });
        }

        function getMarkersBoundsForCity(city) {
            const bounds = new tt.LngLatBounds();
            markersCity.forEach(markerCity => {
                if (markerCity.city === city) {
                    bounds.extend(markerCity.marker.getLngLat());
                }
            });
            return bounds;
        }

        function openCityTab(selected_id) {
            const storeListElement = $('#store-list');
            const citiesListDiv = storeListElement.find('div.list-entries-container');
            for (let activeCityIndex = 0; activeCityIndex < citiesListDiv.length; activeCityIndex++) {
                if (citiesListDiv[activeCityIndex].id === selected_id) {
                    storeListElement.accordion('option', {
                        'active': activeCityIndex
                    });
                }
            }
        }
    });

    $('#store-list').accordion({
        'icons': {
            'header': 'ui-icon-plus',
            'activeHeader': 'ui-icon-minus'
        },
        'heightStyle': 'content',
        'collapsible': true,
        'active': false
    });
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
}
// document.body.append(searchBoxHTML)