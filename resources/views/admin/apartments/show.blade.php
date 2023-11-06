@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Show Post</h1>
    {{-- @dd($apartment) --}}
    <h2>{{$apartment['title']}}</h2>
    <div class="container-img-show">
        <img class="img-show" src="{{ asset('storage/' . $apartment->images[0]) }}" alt="">
    </div>
    
@endsection