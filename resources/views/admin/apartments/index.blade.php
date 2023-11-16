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
    <style>
        .img-show {
            height: 50px;
            width: 50px;
        }

        .border-sponsor {
            border: 3px solid rgb(133, 100, 0)
        }

        .sponsor-circle-red {
            background-color: red;
            height: 1rem;
            width: 1rem;
            border-radius: 50%;
            margin: 0 auto;
        }

        .sponsor-circle-green {
            background-color: green;
            height: 1rem;
            width: 1rem;
            border-radius: 50%;
            margin: 0 auto;
        }

        .card {
            box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
        }

        .card .card-header {
            font-weight: 500;
        }

        .card-header {
            padding: 1rem 1.35rem;
            margin-bottom: 0;
            background-color: rgba(33, 40, 50, 0.03);
            border-bottom: 1px solid rgba(33, 40, 50, 0.125);
        }

        .table-billing-history th,
        .table-billing-history td {
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
            padding-left: 1.375rem;
            padding-right: 1.375rem;
        }

        .table> :not(caption)>*>*,
        .dataTable-table> :not(caption)>*>* {
            padding: 0.75rem 0.75rem;
            background-color: var(--bs-table-bg);
            border-bottom-width: 1px;
            box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
        }
    </style>

    <div class="container py-5">
        <!-- Billing history card-->
        <div class="card mb-4">
            <div class="card-header">Your Apartments</div>
            <div class="card-body p-0">
                <!-- Billing history table-->
                <div class="table-responsive table-billing-history">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th class="border-gray-200" scope="col">Image</th>
                                <th class="border-gray-200" scope="col">Title</th>
                                <th class="border-gray-200" scope="col">Address</th>
                                <th class="border-gray-200" scope="col">Sponsorships</th>
                                <th class="border-gray-200" scope="col">Functionality</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($apartments as $apartment)
                                <tr class="align-middle">
                                    <td>
                                        <a href="{{ route('admin.apartments.show', $apartment->slug) }}">
                                            <img src="{{ asset('storage/' . $apartment->images[0]) }}"
                                                @if ($apartment->isSponsored()) class="border-sponsor img-show" @else class="img-show" @endif>
                                        </a>
                                    </td>
                                    <td>{{ $apartment['title'] }}</td>
                                    <td>{{ $apartment['address'] }}</td>
                                    <td>
                                        <div
                                            @if ($apartment->isSponsored()) class="sponsor-circle-green" @else class="sponsor-circle-red" @endif>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-container d-flex gap-3 my-2">
                                            {{-- show button --}}
                                            <a class="d-none d-sm-block" href="{{ route('admin.apartments.show', $apartment->slug) }}"><button
                                                    type="submit" class="btn btn-primary">Show</button></a>
                                            {{-- sponsorship button --}}
                                            @if (!$apartment->isSponsored())
                                                <a class="d-none d-sm-block" href="{{ route('admin.sponsorship.show', $apartment->slug) }}">
                                            @endif
                                            <button type="submit" class="btn btn-warning"
                                                @if ($apartment->isSponsored()) disabled @endif>
                                                @if ($apartment->isSponsored())
                                                    Sponsored
                                                @else
                                                    Sponsor
                                                @endif
                                            </button>
                                            @if (!$apartment->isSponsored())
                                                </a>
                                            @endif
                                            {{-- edit button --}}
                                                {{-- inizio drop menu mobile --}}
                                            <div class="dropdown d-block d-sm-none">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    Menu
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{ route('admin.apartments.edit', $apartment->slug) }}"><button
                                                                type="submit" class="btn btn-info">Modifica</button></a>
                                                    </li>
                                                    <li><button class="dropdown-item" type="button"><a
                                                                href="{{ route('admin.message.show', $apartment->slug) }}"><button
                                                                    type="submit"
                                                                    class="btn btn-success">Messages</button></a></button>
                                                    </li>
                                                    <li> <button type="button" class="btn btn-danger"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            Delete
                                                        </button></li>
                                                    <li> <a href="{{ route('admin.apartments.show', $apartment->slug) }}"><button
                                                                type="submit" class="btn btn-primary">Show</button></a>
                                                    </li>
                                                    <li>
                                                        @if (!$apartment->isSponsored())
                                                            <a
                                                                href="{{ route('admin.sponsorship.show', $apartment->slug) }}">
                                                        @endif
                                                        <button type="submit" class="btn btn-warning"
                                                            @if ($apartment->isSponsored()) disabled @endif>
                                                            @if ($apartment->isSponsored())
                                                                Sponsored
                                                            @else
                                                                Sponsor
                                                            @endif
                                                        </button>
                                                        @if (!$apartment->isSponsored())
                                                            </a>
                                                        @endif
                                                    </li>
                                                </ul>
                                            </div>
                                            {{-- fine drop menu mobile --}}


                                            <a class="d-none d-sm-block"  href="{{ route('admin.apartments.edit', $apartment->slug) }}"><button
                                                    type="submit" class="btn btn-info">Modifica</button></a>
                                            {{-- Messages --}}
                                            <a class="d-none d-sm-block"  href="{{ route('admin.message.show', $apartment->slug) }}"><button
                                                    type="submit" class="btn btn-success">Messages</button></a>
                                            <!-- Button trigger modal -->
                                            <button  type="button" class="btn btn-danger d-none d-sm-block" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal_{{ $apartment->id }}">
                                                Delete
                                            </button>
                                            <form action="{{ route('admin.apartments.destroy', $apartment->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal_{{ $apartment->id }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Deleting
                                                                    the
                                                                    selected
                                                                    apartment
                                                                </h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete the selected apartment?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger">Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
