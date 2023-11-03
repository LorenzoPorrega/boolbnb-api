<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller {
    //
    public function index() {
        // recupero dati dal db
        $apartments = Apartment::all();

        // restituisco in formato JSON
        return response()->json($apartments);
    }
}