@extends('layouts.app')
@section('content')
    <div class="container py-3">
        <div class="row">
            {{-- pricing section --}}
            <div class="pricing-header py-3 mx-auto text-center">
                <h2 class="display-4 fw-normal pricing-title">
                    Sponsorhips Pricing
                </h2>
                <p class="fs-5 pricing-text-primary">
                Choose the pricing plan that best suits your needs and enjoy your exclusive benefits.
                </p>
            </div>
            <div class="row row-cols-1 row-cols-md-3 my-3 text-center">
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm border-secondary">
                        <div class="card-header py-3 bg-secondary">
                            <h4 class="my-0 fw-normal pricing-text-primary">Silver</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">$2,99<small class="text-body-secondary fw-light"></small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                            <li>24 Hours Premium Sponsorship</li>
                            <li>Unlimited apartments included</li>
                            <li>Email support</li>
                            <li>Help center access</li>
                            </ul>
                            <button type="button" class="w-75 btn btn-lg btn-outline-secondary"
                            onclick="selectSponsorship(1)">
                                Sign up
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm border-warning">
                        <div class="card-header py-3 bg-warning">
                            <h4 class="my-0 fw-normal pricing-text-primary">Gold</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">$5,99<small class="text-body-secondary fw-light"></small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                            <li>72 Hours Premium Sponsorship</li>
                            <li>Unlimited apartments included</li>
                            <li>Priority email support</li>
                            <li>Help center access</li>
                            </ul>
                            <button type="button" class="w-75 btn btn-lg btn-outline-warning"
                            onclick="selectSponsorship(2)">
                                Get started
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm border-info">
                        <div class="card-header py-3 bg-info">
                            <h4 class="my-0 fw-normal pricing-text-primary">Platinum</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">$9,99<small class="text-body-secondary fw-light"></small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                            <li>144 Hours Premium Sponsorship</li>
                            <li>Unlimited apartments included</li>
                            <li>Phone and email support</li>
                            <li>Help center access</li>
                            </ul>
                            <button type="button" class="w-75 btn btn-lg btn-outline-info"
                            onclick="selectSponsorship(3)">
                                Contact us
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <form action="{{ route('admin.sponsorship.sponsored') }}" method='POST'>
                @csrf
                <div id="dropin-container"></div>
                <div class="my-3">
                    <input type="hidden" name="apartment_id" value="{{ $apartment->id }}">
                    <select class="form-select" name="sponsorship_id" id="sponsorship_id">
                        <option selected disabled>Selected sponsorship</option>
                        @foreach ($sponsorships as $singleSponsorship)
                            <option value="{{ $singleSponsorship->id }}" required> {{ $singleSponsorship->sponsorship_price }} € -
                                {{ $singleSponsorship->duration_hours }} hours of sponsor</option>
                        @endforeach
                    </select>
                </div>
                <button id="submit-button" class="btn btn-success">Purchase</button>
            </form>
            
        </div>
    </div>

    {{-- scripts --}}
    <script src="https://js.braintreegateway.com/web/dropin/1.40.2/js/dropin.js"></script>
    <script>
        let button = document.querySelector('#submit-button');

        braintree.dropin.create({
            authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b',
            selector: '#dropin-container'
        }, function(err, instance) {
            button.addEventListener('click', function() {
                instance.requestPaymentMethod(function(err, payload) {
                    if (err) {
                        // Gestione degli errori se si verifica un problema nella richiesta del metodo di pagamento
                        console.error(err);
                        // Puoi mostrare un messaggio di errore all'utente o gestire l'errore in base alle tue esigenze
                    } else {
                        // Il pagamento è andato a buon fine e hai il payload con le informazioni sul metodo di pagamento
                        // Di solito, a questo punto, dovresti inviare il payload al tuo server per elaborare il pagamento
                        // Ecco un esempio di come potresti farlo utilizzando jQuery per una richiesta AJAX
                        $.ajax({
                            url: '{{ route('admin.sponsorship.sponsored') }}', // Sostituisci con l'URL del tuo server per elaborare il pagamento
                            method: 'POST',
                            data: {
                                paymentMethodNonce: payload.nonce,
                                apartment_id: {{ $apartment->id }},
                                sponsorship_id: document.querySelector(
                                    'select[name="sponsorship_id"]').value
                            },
                            success: function(response) {
                                // Gestisci la risposta dal server dopo il pagamento
                                console.log(response);
                                // Puoi mostrare un messaggio di conferma all'utente o effettuare altre azioni in base alla risposta
                            },
                            error: function(xhr, status, error) {
                                // Gestione degli errori nella richiesta AJAX
                                console.error(error);
                                // Puoi mostrare un messaggio di errore all'utente o gestire l'errore in base alle tue esigenze
                            }
                        });
                    }
                });

            })
        });
        function selectSponsorship(optionNumber) {
            // Imposta il valore della select in base all'opzione selezionata
            document.getElementById('sponsorship_id').value = optionNumber;
        }
    </script>
    {{-- style --}}
    <style>
        .form-select {
            max-width: 300px;
        }

        .pricing-title {
            color: rgb(55, 55, 236);
        }
        .pricing-subtitle {
            color: rgb(32, 32, 155);
        }
        .pricing-text-primary {
            color: rgb(25, 25, 25);
        }
    </style>
@endsection
