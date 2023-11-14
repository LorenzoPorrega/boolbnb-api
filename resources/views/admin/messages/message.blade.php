@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row p-4 box-messages">
            <div class="col position-relative">
                <h3 class="mb-4">Messages received</h3>
                {{-- messages list --}}
                <div class="box-list pt-4">
                    @foreach ($messages->reverse() as $message)
                        <div class="box-message px-3 ms-2">
                            <div class="row">
                                <div class="col-6 ps-4 d-flex flex-column justify-content-center">
                                    <h4 class="py-1"><strong>From: </strong>{{ $message->name }}</h4>
                                    <p><strong>Content: </strong>{{ $message->message }}</p>
                                </div>
                                <div class="col-6 d-flex align-items-center justify-content-end pe-5">
                                    <p class="box-time m-0 p-0">{{ $message->created_at }}</p>
                                </div>
                            </div>


                        </div>
                        <hr class="mx-4">
                    @endforeach
                </div>

            </div>

        </div>
    </div>

    <style lang="scss">
        .box-time {}

        .box-list {
            border: 2px solid rgb(14, 66, 179);
            border-radius: 1rem;
        }

    </style>
@endsection
