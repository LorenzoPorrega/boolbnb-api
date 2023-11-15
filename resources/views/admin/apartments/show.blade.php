@extends('layouts.app')
@section('content')
    @vite(['resources/scss/style.css'])
    <div class="container">
        <div class="position-relative">
            <div class="position-absolute top-0 end-0">
                <a href="{{ route('admin.apartments.index') }}">
                    <button class="btn btn-info">Back</button>
                </a>
            </div>
            <h1>Show Page</h1>
            {{-- @dd($apartment) --}}
            <h2><strong>Titolo: </strong>{{ $apartment['title'] }}</h2>

            {{--  --}}
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                    @foreach ($apartment->images as $key => $image)
                        <button type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide-to="{{ $key }}" class="{{ $key === 0 ? 'active' : '' }}"
                            aria-current="true" aria-label="Slide {{ $key + 1 }}"></button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach ($apartment->images as $key => $image)
                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                            <img src="{{ asset('storage/' . $image) }}" class="d-block w-100"
                                alt="Slide {{ $key + 1 }}">
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            {{--  --}}
            {{-- <ul class="form-control" id="input">
            <li><input type="text" id="address" value=""></li>
        </ul> --}}
            <h5><strong>Prezzo per notte: </strong>{{ $apartment->price }} €
                <h5><strong>Numero di stanze: </strong>{{ $apartment->rooms_num }}
                    <h5><strong>Numero di letti: </strong>{{ $apartment->beds_num }}
                        <h5><strong>Numero di bagni: </strong>{{ $apartment->bathroom_num }}
                            <h5><strong>Metri quadrati: </strong>{{ $apartment->square_meters }} m<sup>2</sup>
                                <h5><strong>Aggiunto il: </strong>{{ $apartment->created_at }}
                                    <h5><strong>Indirizzo: </strong>{{ $apartment->address }}
                                        <input class="input-none" type="text" value="{{ $apartment->address }}"
                                            id="via">
                                    </h5>
                                    <h5> <strong>Servizi:</strong></h5>
                                    <div class="container">
                                        <div class="row row-cols-3 row-cols-md-6 g-3">
                                            @foreach ($apartment->amenities as $amenity)
                                                <div class="col">
                                                    <div class="card h-100">
                                                        <div
                                                            class="card-body d-flex justify-content-start align-items-center">
                                                            <div>
                                                                {!! $amenity->icon !!}
                                                            </div>
                                                            <h5 class="card-title mb-0 ms-2">{{ $amenity->name }}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <input class="input-none" type="text"value="{{ $apartment->latitude }}"
                                        id="latitude">
                                    <input class="input-none" type="text" value="{{ $apartment->longitude }}"
                                        id="longitude">

                                    <div class="container-map position-relative">
                                        <div class='control-panel' style="display: none">
                                            {{-- <div class='heading'>
                    <img src='/images/boolbnb-logo-2.png'>
                </div> --}}
                                            <div id='store-list'></div>
                                        </div>
                                        <div class='map' id='map'></div>
                                    </div>
        </div>
    </div>
    <style>
        .carousel {
            max-width: 500px;
            max-height: 600px;
        }

        .carousel-inner {
            height: 100%
        }

        .carousel-inner img {
            height: 600px;
            object-fit: cover;
        }
    </style>
    <script>
        const via = document.getElementById("via").value
        const latitude = document.getElementById("latitude").value
        const longitude = document.getElementById("longitude").value
        let stores = {
            "type": "FeatureCollection",
            "features": [{
                "type": "Feature",
                "geometry": {
                    "type": "Point",
                    "coordinates": [
                        longitude,
                        latitude
                    ]
                },
                "properties": {
                    "address": via,
                    "city": via
                }
            }, ]
        }

        function createmap() {


            const apiKey = '9GGMAIWofgnTAUXbZTCGx0V0SDSxAx9I';
            const map = tt.map({
                key: '9GGMAIWofgnTAUXbZTCGx0V0SDSxAx9I',
                container: 'map',
                center: [longitude, latitude],
                zoom: 10
            });

            const markersCity = [];
            const list = document.getElementById('store-list');

            stores.features.forEach(function(stores, index) {
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
                    const cityStoresListHeading = list.appendChild(document.createElement(
                        'h3'));
                    cityStoresListHeading.innerHTML = city;
                    cityStoresList = list.appendChild(document.createElement('div'));
                    cityStoresList.id = city;
                    cityStoresList.className = 'list-entries-container';
                    cityStoresListHeading.addEventListener('click', function(e) {
                        map.fitBounds(getMarkersBoundsForCity(e.target.innerText), {
                            padding: 50
                        });
                    });
                }

                const details = buildLocation(cityStoresList, address);

                marker.getElement().addEventListener('click', function() {
                    const activeItem = document.getElementsByClassName('selected');
                    if (activeItem[0]) {
                        activeItem[0].classList.remove('selected');
                    }
                    details.classList.add('selected');
                    openCityTab(city);
                });

                details.addEventListener('click', function() {
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
                    for (let activeCityIndex = 0; activeCityIndex < citiesListDiv
                        .length; activeCityIndex++) {
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
            ttSearchBox.on("tomtom.searchbox.resultselected", function(data) {
                //recupero l'input
                const adderessInput = document.getElementById("address")
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
        console.log(via.value)
        createmap()
    </script>
@endsection
