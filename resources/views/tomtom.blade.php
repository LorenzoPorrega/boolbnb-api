<!DOCTYPE html>
<html>

<head>
    <title>Pizzeria locator</title>
    <link href='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.6.0/maps/maps.css' rel='stylesheet' type='text/css'>
    <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.6.0/maps/maps-web.min.js'></script>
    <link href='https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css' rel='stylesheet'>
    <script src='https://code.jquery.com/jquery-1.12.4.js'></script>
    <script src='https://code.jquery.com/ui/1.12.1/jquery-ui.js'></script>

    <link rel="stylesheet" type="text/css"
        href="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox.css" />
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox-web.js">
    </script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.1.2-public-preview.15/services/services-web.min.js">
    </script>

    @vite(['resources/scss/style.css', 'resources/js/stores.js'])
</head>

<body>
    <ul class="form-control" id="input">
        <li></li>
    </ul>
    <div class="container">
        <div class='control-panel'>
            <div class='heading'>
                <img src='img/logo.png'>
            </div>
            <div id='store-list'></div>
        </div>
        <div class='map' id='map'></div>
    </div>
    <script></script>
</body>

</html>
