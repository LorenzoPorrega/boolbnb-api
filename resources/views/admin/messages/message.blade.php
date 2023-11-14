@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row p-4 box-messages">
            <div class="col">
                <h3 class="mb-4">Messages received</h3>
                {{-- messages list --}}
                @foreach ($messages->reverse() as $message)
                <div class="box-message mb-1 p-3 ms-2 position-relative">
                    <h4 class="py-1"><strong>From: </strong>{{ $message->name }}</h4>
                    <p><strong>Content: </strong>{{ $message->message }}</p>
                    <p class="box-time">{{$message->created_at}}</p>
                </div>
            @endforeach


            </div>

        </div>
    </div>

    <style lang="scss">
        .box-message {
            border: 2px solid rgb(14, 66, 179);
            border-radius: 1rem;
            .box-time{
                position: absolute;
                right: .7rem;
                bottom: -.5rem
            }
        }
    </style>
@endsection
