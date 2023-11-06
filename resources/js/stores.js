import axios from "axios";
// function myFunction(){
//     axios.get()
// }

let stores = {
    "type": "FeatureCollection",
    "features": [{
        "type": "Feature",
        "geometry": {
            "type": "Point",
            "coordinates": [
                4.892951,
                52.373564
            ]
        },
        "properties": {
            "address": "Valkensteeg 3, 1012 MH",
            "city": "Amsterdam"
        }
    },
    {
        "type": "Feature",
        "geometry": {
            "type": "Point",
            "coordinates": [
                4.891881,
                52.369741
            ]
        },
        "properties": {
            "address": "Rokin 92I 1012 KZ",
            "city": "Amsterdam"
        }
    },
    {
        "type": "Feature",
        "geometry": {
            "type": "Point",
            "coordinates": [
                4.901278,
                52.369070
            ]
        },
        "properties": {
            "address": "Waterlooplein 29A, 1011 NX",
            "city": "Amsterdam"
        }
    },
    {
        "type": "Feature",
        "geometry": {
            "type": "Point",
            "coordinates": [
                4.894093,
                52.371760
            ]
        },
        "properties": {
            "address": "Pieter Jacobszstraat 10D, 1012 HL",
            "city": "Amsterdam"
        }
    },
    {
        "type": "Feature",
        "geometry": {
            "type": "Point",
            "coordinates": [
                4.900800,
                52.372008
            ]
        },
        "properties": {
            "address": "Nieuwmarkt 107, 1011 MA",
            "city": "Amsterdam"
        }
    },
    {
        "type": "Feature",
        "geometry": {
            "type": "Point",
            "coordinates": [
                4.4787379,
                51.9202978
            ]
        },
        "properties": {
            "address": "Coolsingel 105, 3012 AG",
            "city": "Rotterdam"
        }
    },
    {
        "type": "Feature",
        "geometry": {
            "type": "Point",
            "coordinates": [
                4.476373,
                51.915708
            ]
        },
        "properties": {
            "address": "Witte de Withstraat 63 3012 BN",
            "city": "Rotterdam"
        }
    },
    {
        "type": "Feature",
        "geometry": {
            "type": "Point",
            "coordinates": [
                4.468606,
                51.922971
            ]
        },
        "properties": {
            "address": "Weena 691, 3013 AM ",
            "city": "Rotterdam"
        }
    },
    {
        "type": "Feature",
        "geometry": {
            "type": "Point",
            "coordinates": [
                4.483948,
                51.925560
            ]
        },
        "properties": {
            "address": "Goudsesingel 411, 3032 EN",
            "city": "Rotterdam"
        }
    },
    {
        "type": "Feature",
        "geometry": {
            "type": "Point",
            "coordinates": [
                4.472817,
                51.929622
            ]
        },
        "properties": {
            "address": "Paap Dirckstraat 68, 3032 SW",
            "city": "Rotterdam"
        }
    },
    {
        "type": "Feature",
        "geometry": {
            "type": "Point",
            "coordinates": [
                10.79197,
                45.15787
            ]
        },
        "properties": {
            "address": "Corso Umberto I 44, 46100 SW",
            "city": "Mantova"
        }
    }
    ]
};

function myFunction() {
    axios.get('http://127.0.0.1:8000/api/coordinates/')
        .then((response) => {
            console.log(response);
            const data = response["data"]["data"]["features"]
            for (let i = 0; i < data.length; i++) {
                let point = data[i]
                stores["features"].push(point)
                console.log(point)
            }
            createmap()
        })
}
myFunction()
function createmap() {


    const apiKey = '9GGMAIWofgnTAUXbZTCGx0V0SDSxAx9I';
    const map = tt.map({
        key: '9GGMAIWofgnTAUXbZTCGx0V0SDSxAx9I',
        container: 'map',
        center: [10.79197, 45.15787],
        zoom: 9
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