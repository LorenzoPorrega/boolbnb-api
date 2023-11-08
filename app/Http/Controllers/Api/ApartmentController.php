<?php

namespace App\Http\Controllers\Api;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApartmentController extends Controller
{
    //
    public function index(Request $request)
    {
        // recupero dati dal db
        $apartmentsQuery = Apartment::query();

        $rooms_num = $request->input('rooms_num');
        $beds_numFilter = $request->input('beds_num');
        $bathroom_numFilter = $request->input('bath_num');

        if (!empty($rooms_num)) {
            $apartmentsQuery->where('rooms_num', "like", $rooms_num);
        }

        if (!empty($beds_numFilter)) {
            $apartmentsQuery->where('beds_num', "like", $beds_numFilter);
        }

        if (!empty($bathroom_numFilter)) {
            $apartmentsQuery->where('bathroom_num', "like", $bathroom_numFilter);
        }

        $filteredApartments = $apartmentsQuery->get();



        // restituisco in formato JSON
        return response()->json(['apartments' => $filteredApartments]);
    }

    public function getPositions()
    {
        $apartments = Apartment::all();
        $indirizzo = explode(",", $apartments[0]["address"]);
        $citta = end($indirizzo);
        $data = [
            "type" => "FeatureCollection",
        ];
        $data["features"] = [];
        foreach ($apartments as $apartment) {
            $indirizzo = explode(",", $apartment["address"]);
            $citta = end($indirizzo);
            $feature = [
                "type" => "Feature",
                "geometry" => [
                    "type" => "Point",
                    "coordinates" => [
                        floatval($apartment["longitude"]),
                        floatval($apartment["latitude"])
                    ]
                ],
                "properties" => [
                    "address" =>  $apartment["address"],
                    "city" => $citta
                ]
            ];
            $data["features"][] = $feature;
        }
        //restituisco i dati degli indirizzi di tutti gli abitazioni senza controllo dell utente
        return response()->json(['data' => $data]);
    }

    public function filter($request)
    {
        $query = $request;
        $data=  DB::table('apartments')
            ->where('address', 'LIKE', "%{$query}%")
            ->get();
        return response()->json(['data' => $data]);
    }
}
