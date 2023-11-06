@extends('layouts.app')
@section('content')
    @vite(['resources/scss/style.css', 'resources/js/stores.js'])
    <div class="container">
        <h1>Edit Post</h1>
        {{-- @dd($apartment) --}}
        <h2>{{ $apartment['title'] }}</h2>
        <div class="container-img-show">
            <img class="img-show" src="{{ asset('storage/' . $apartment->images[0]) }}" alt="">
        </div>
        {{-- <ul class="form-control" id="input">
            <li><input type="text" id="address" value=""></li>
        </ul> --}}
        <h5>{{ $apartment->address }}
            <input type="text" value="{{ $apartment->address }}" id="via">
        </h5>
        <input type="text"value="{{ $apartment->latitude }}" id="latitude">
        <input type="text" value="{{ $apartment->longitude }}" id="longitude">
    </div>
    <div class="container">
        <div class='control-panel' style="display: none">
            <div class='heading'>
                <img src='img/logo.png'>
            </div>
            <div id='store-list'></div>
        </div>
        <div class='map' id='map'></div>
    </div>
    <script>
        const via = document.getElementById("via").value
        const latitude = document.getElementById("latitude").value
        const longitude = document.getElementById("longitude").value
        stores["features"] = [{
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
        console.log(via.value)
    </script>
@endsection
