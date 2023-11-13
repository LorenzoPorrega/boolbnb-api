@extends('layouts.app')
@section('content')
    <div class="container my-5 text-center">
        <div class="row py-5">
            <h1 class="py-3">Congratulations!</h1>
            <h2 class="py-3">Sponsor activated correctly</h2>
            <a href="{{ Route('admin.apartments.index') }}">
                <button class="btn btn-info">Back to the site</button>
            </a>
        </div>
    </div>
@endsection
