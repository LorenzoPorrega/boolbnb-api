{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h1>i tuoi app</h1>
</body>
</html> --}}
@extends('layouts.app')
@section('content')
    {{-- <h2>I tuoi appartamenti</h2> --}}
    <ul class="list-group">

        @foreach ($apartments as $apartment)
            @if ($apartment->user_id == $user_id)
                <li class="list-group-item">
                    <h3>{{ $apartment['title'] }}</h3>
                    <h4>{{ $apartment['adress'] }}</h4>
                    <p>{{ $apartment['description'] }}</p>
                    <img class="img-show" src="{{ asset('storage/' . $apartment->images[0]) }}" alt="">
                    <a href="{{ route('admin.apartments.show', $apartment) }}"><button type=
                    "submit"
                            class="btn btn-primary">Show</button></a>
                    <a href="{{ route('admin.apartments.edit',$apartment->id) }}">Modifica</a>
                    <form action="{{ route('admin.apartments.destroy', $apartment->id) }}" method="POST">
                        @csrf

                        @method('DELETE')

                        <button class="btn btn-danger">Elimina</button>

                    </form>
                </li>
            @endif
        @endforeach

    </ul>
@endsection
