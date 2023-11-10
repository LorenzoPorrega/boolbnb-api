<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewMessage;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller {
    //
    public function store (Request $request, $apartmentId, $senderIpAddress) {

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
        $newMessage->apartment_id = $apartmentId;
        $newMessage->sender_ip_address = $senderIpAddress;

        // salvo il nuovo contatto nel DB
        $newMessage->save();

        // invia mail di conferma all'utente che ha compilato il form
        // Mail::to($data['email'])->send(new NewMessage());

        return response()->json([
            'message' => "Thank you {$data['name']} for your message. We will be in touch soon."
        ],201); // è lo status: dati inviati con successo (non è tassativo)
    }

}