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
        $rooms_num = $request->input('rooms_num');
        $beds_numFilter = $request->input('beds_num');
        $bathroom_numFilter = $request->input('bath_num');
        $freeformAddress = $request->input('freeformAddress');
        // $position = $request->input('position');
        $latitude=  $request->input('longitude');
        $latitude=  $request->input('latitude');

        // Start with the base query
        $apartmentsQuery = Apartment::query();

        // Apply filters based on request parameters
        if (!empty($rooms_num)) {
            $apartmentsQuery->where('rooms_num', "like", $rooms_num);
        }

        if (!empty($beds_numFilter)) {
            $apartmentsQuery->where('beds_num', "like", $beds_numFilter);
        }

        if (!empty($bathroom_numFilter)) {
            $apartmentsQuery->where('bathroom_num', "like", $bathroom_numFilter);
        }

        // Additional filter based on municipality
        if (!empty($freeformAddress)) {
            $apartmentsQuery->where('address', 'LIKE', '%' . $freeformAddress . '%');
        }

        $filteredApartments = $apartmentsQuery->get();

        return response()->json(['apartments' => $filteredApartments]);
    }

    public function show($slug){
        $showedApartmentQuery = Apartment::query();

        /* $selectedApartmentSlug = $request->input("selectedApartmentSlug"); */

        $showedApartmentQuery->where("slug", $slug);

        $showedApartment = $showedApartmentQuery->get();

        return response()->json(['singleApartment' => $showedApartment]);
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

   /*  public function filter($request)
    {
        $query = json_decode($request, true);
        $citta = $query["address"]["municipality"];
        $data =  DB::table('apartments')
            ->where('address', 'LIKE', "%{$citta}%")
            ->get();
        return response()->json(['data' => $data]);
    } */
    public function postPosition(Request $request){
        $latitude=  $request->input('longitude');
        $latitude=  $request->input('latitude');
        $dati =[
            "longitude"=>$latitude,
            "latitude"=>$latitude
        ];
        //$data = preg_match_all('/(\w+)="([^"]+)"/', $request, $matches);
        // $data = 'ciao';
        
        //$data ='{"lng":"12.492395","lat" :"41.889429"}';
        //preg_match_all('/(\w+)="([^"]+)"/', $request, $matches);
        //$arraynuovo = preg_match_all('/(\w+)="([^"]+)"/', $request, $matches);
        //$array = json_decode($request,true);
        //dd($arraynuovo);
    
        return response()->json(['data' => $dati]);
    }
}
