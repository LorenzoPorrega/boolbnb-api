{{-- metodo per avere la auto compilazione dell'indirizzo 
unica pecca  è che pare sia poco modificabile a primo impatto --}}

<!DOCTYPE html>
<html class="use-all-space">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
    <title>SearchBox</title>
    <link rel="stylesheet" type="text/css"
        href="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox.css" />
    <link rel="stylesheet" type="text/css" href="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.6.0/maps/maps.css" />
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.1.2/maps/maps-web.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.1.2-public-preview.15/services/services-web.min.js">
    </script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox-web.js">
    </script>

</head>

<body>
    <ul class="form-control" id="input"></ul>
    <script>
        var options = {
            searchOptions: {
                key: "9GGMAIWofgnTAUXbZTCGx0V0SDSxAx9I",
                language: "it-IT",
                limit: 5,
            },
            autocompleteOptions: {
                key: "9GGMAIWofgnTAUXbZTCGx0V0SDSxAx9I",
                language: "en-GB",
            },
        }
        var ttSearchBox = new tt.plugins.SearchBox(tt.services, options)
        var searchBoxHTML = ttSearchBox.getSearchBoxHTML()
        const input = document.getElementById('input')
        searchBoxHTML.classList.add("form-control");
        input.append(searchBoxHTML);
        //   document.body.append(searchBoxHTML)
    </script>
    <style>
        #map {
            height: 500px width: 500px;

        }
    </style>
    <div id="map"></div>
    <script>
        //le coordinate vanno messe al contrario di qelle di google maps 
        var speedyPizzaCoordinates = [10.79197, 45.15787]
        var map = tt.map({
            container: "map",
            key: "9GGMAIWofgnTAUXbZTCGx0V0SDSxAx9I",
            center: speedyPizzaCoordinates,
            zoom: 15,
            scrollZoom: {
                around: 'center'
            }

        })
        map.scrollZoom.enable({
            around: 'center'
        });

        var marker = new tt.Marker().setLngLat(speedyPizzaCoordinates).addTo(map)
        var popupOffsets = {
            top: [0, 0],
            bottom: [0, -70],
            'bottom-right': [0, -70],
            'bottom-left': [0, -70],
            left: [25, -35],
            right: [-25, -35],
        }

        var popup = new tt.Popup({
            offset: popupOffsets
        }).setHTML(
            "your company name, your company address"
        )
        marker.setPopup(popup).togglePopup()
        // map.addControl(plugin, [speedyPizzaCoordinates])
        // map.scrollZoom.enable({ around: 'center' });
    </script>
</body>
<!DOCTYPE html>

</html>

</html>
