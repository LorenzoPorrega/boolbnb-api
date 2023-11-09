@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <form action="{{ route('admin.sponsorship.sponsored') }}" method='POST'>
                @csrf
                <input type="hidden" name="apartment_id" value="{{ $apartment->id }}">
                <select class="form-select" name="sponsorship_id" id="sponsorship_id">
                    <option selected disabled>Choose your sponsorship</option>
                    @foreach ($sponsorships as $singleSponsorship)
                        <option value="{{ $singleSponsorship->id }}" required> {{ $singleSponsorship->price }} € -
                            {{ $singleSponsorship->duration_hours }} hours of sponsor</option>
                    @endforeach
                </select>
                <div id="dropin-container"></div>
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
    </script>
    {{-- style --}}
    <style>
        .form-select {
            max-width: 600px
        }
    </style>
@endsection
