{{--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
            <li class="list-group-item">
                <h3><strong>Titolo: </strong>{{ $apartment['title'] }}</h3>
                <h4><strong>Indirizzo: </strong>{{ $apartment['address'] }}</h4>
                <p><strong>Descrizione: </strong>{{ $apartment['description'] }}</p>
                <img class="img-show" src="{{ asset('storage/' . $apartment->images[0]) }}" alt="">
                <div class="btn-container d-flex gap-3 my-2">
                    <a href="{{ route('admin.apartments.show', $apartment->slug) }}"><button type="submit"
                            class="btn btn-primary">Show</button></a>
                    <a href="{{ route('admin.apartments.edit', $apartment->slug) }}"><button type="submit"
                            class="btn btn-info">Modifica</button></a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Delete
                    </button>        
                    <form action="{{ route('admin.apartments.destroy', $apartment->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Deleting the selected apartment</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete the selected apartment?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>

                    

                    

                </div>
            </li>
        @endforeach
    </ul>
@endsection
