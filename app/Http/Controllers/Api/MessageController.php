<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewMessage;
use App\Models\Apartment;
use App\Models\User;
use App\Models\Message;
use App\Mail\NewMessageReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller {
    //
    public function store (Request $request, $apartmentSlug) {

            // Trova l'appartamento con il dato slug
            $apartment = Apartment::where('slug', $apartmentSlug)->first();

        if ($apartment) {   
            // validazione dati nel form
            $data = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'message' => 'required|max:500'
            ]);


            // Ottenere l'indirizzo IP dell'utente
            $senderIpAddress = $request->ip();

            // salvo dentro la tabella messages nel DB i dati ricevuti
            $newMessage = new Message();

            $newMessage->name = $data["name"];
            $newMessage->email = $data["email"];
            $newMessage->message = $data["message"];
            $newMessage->apartment_id = $apartment->id;
            $newMessage->sender_ip_address = $senderIpAddress;

            // salvo il nuovo contatto nel DB
            $newMessage->save();

            $userId = $apartment["user_id"];

            // Ora puoi accedere all'email dell'utente
            $userEmail = DB::table('users')->where('id', $userId)->select('email')->get();

            // invia mail all'utente che ha compilato il form
            //Mail::to($data['email'])->send(new NewMessage($data));
            // invia mail di avviso messaggio ricevuto, al proprietario dell'appartamento
            Mail::to($userEmail)->send(new NewMessageReceived($data));

            return response()->json([
                'message' => "Thank you {$data['name']} for your message. We will be in touch soon."
            ],201); // è lo status: dati inviati con successo (non è tassativo)
        } else {
            return response()->json(['error' => 'Apartment not found'], 404);
        }
    }

}