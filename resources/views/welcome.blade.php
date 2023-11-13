@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <div class="container py-5">

            <h1 class="display-5 fw-bold">Dashboard</h1>
            <p class="col-md-8 fs-4">Here you can manage all your apartments</p>
                <a href="{{ route('login') }}" class="btn btn-success btn-lg my-2" type="button">Add 1 apartment</a><br>
                <a href="{{ route('admin.apartments.index') }}" class="btn btn-info btn-lg my-2" type="button">Check your apartments</a><br>
                <a href="http://localhost:5174" class="btn btn-warning btn-lg my-2" type="button">Front Store</a>
        </div>
    </div>

    <div class="content">
        <div class="container text-center my-5">
            <strong>Project made by:</strong>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Andrea Colombo &nbsp; Islam Benguerba &nbsp; Lorenzo Porrega &nbsp; Michele Gresta
        </div>
    </div> 
@endsection
