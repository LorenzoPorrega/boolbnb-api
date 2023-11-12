<?php

namespace App\Http\Controllers\Api;

use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Apartment;
use App\Models\User;
use App\Models\View;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApartmentController extends Controller
{
    //
    static $latitude = '';
    static $longitude = '';
    //funzione aritmetica, molto interessante ma non funzionante
    public static function pointsWithinRadius($latitude, $longitude, $radius)
    {
        $presetRadius = 6371;

        $lat1 = deg2rad($latitude);
        $lon1 = deg2rad($longitude);

        $results = Apartment::selectRaw(
            "*,
            ($presetRadius * ACOS(
                COS(RADIANS(latitude)) * COS($lat1) * COS(RADIANS(longitude) - $lon1) +
                SIN(RADIANS(latitude)) * SIN($lat1)
            )) AS distance"
        )
            ->having('distance', '<', $radius)
            ->orderBy('distance')
            ->get();

        return $results;
    }
    //funzione semplice che converte correttamente il valore del raggio e filtra 
    //la tabella appartamenti e prende tutti dentro il raggio dato 
    public static function getDataWithinRadius($latitude, $longitude, $radius)
    {
        // Convert radius from kilometers to meters
        $radiusMeters = $radius * 1000;

        // Define the SQL query to retrieve data within the radius
        $query = "SELECT * FROM apartments
                WHERE ST_Distance_Sphere(point(latitude, longitude), point(?, ?)) <= ?";

        // Execute the query with the given parameters
        $data = DB::select($query, [$latitude, $longitude, $radiusMeters]);
        foreach ($data as $dato) {
            $immagini = json_decode($dato->images, true);
            $indirizzo = str_replace("\"", "", $dato->address);
            $dato->images = $immagini;
            $dato->address = $indirizzo;
        }
        return $data;
    }
    //con esso in teoria dovrebbe filtrare per raggio e anche per sponsorizzazione!!
    public static function megaFilter($latitude, $longitude, $radius)
    {

        $radiusMeters = $radius * 1000;
        $query = " SELECT *
        FROM `sponsorship_apartment`
        JOIN `sponsorships` ON `sponsorship_apartment`.`sponsorship_id` = `sponsorships`.`id`
        RIGHT OUTER JOIN `apartments` ON `sponsorship_apartment`.`apartment_id` = `apartments`.`id`
        WHERE ST_Distance_Sphere(point(latitude, longitude), point(?, ?)) <= ?
        ORDER BY `sponsorships`.`id` DESC";
        // $data = Apartment::join('sponsorship_apartment', 'sponsorship_apartment.apartment_id', '=', 'apartments.id')
        //     ->join('sponsorships', 'sponsorship_apartment.sponsorship_id', '=', 'sponsorships.id')
        //     ->whereRaw('ST_Distance_Sphere(point(latitude, longitude), point(?, ?)) <= ?', [$latitude, $longitude, $radiusMeters])
        //     ->orderByDesc('sponsorships.name')
        //     ->get();

        $data = DB::select($query, [$latitude, $longitude, $radiusMeters]);
        foreach ($data as $dato) {
            $immagini = json_decode($dato->images, true);
            $dato->images = $immagini;
        }
        return $data;
    }
    public static function orderbyPayment()
    {
        $sponsorship_apartments = DB::table('sponsorship_apartment')
            ->join('sponsorships', 'sponsorship_apartment.sponsorship_id', '=', 'sponsorships.id')
            ->rightJoin('apartments', 'sponsorship_apartment.apartment_id', '=', 'apartments.id')
            ->orderByDesc('sponsorships.name')
            ->whereNull('deleted_at')
            ->get();

        return $sponsorship_apartments;
    }
    public static function MasterFilter($latitude, $longitude, $radius)

    {
        $presetRadius = 6371;

        $lat1 = deg2rad($latitude);
        $lon1 = deg2rad($longitude);

        $query3 = Apartment::leftJoin('sponsorship_apartment', 'sponsorship_apartment.apartment_id', '=', 'apartments.id')
            ->leftJoin('sponsorships', 'sponsorship_apartment.sponsorship_id', '=', 'sponsorships.id')
            ->selectRaw("*,
            ($presetRadius * ACOS(
                COS(RADIANS(latitude)) * COS($lat1) * COS(RADIANS(longitude) - $lon1) +
                SIN(RADIANS(latitude)) * SIN($lat1)
            )) AS distance")
            ->having('distance', '<', $radius)
            ->orderByDesc('sponsorships.id')
            ->get();

        // $results = $query->union($query2);
        $results = $query3;
        return $results;
    }


    public function index(Request $request)
    {
        $rooms_num = $request->input('rooms_num');
        $beds_numFilter = $request->input('beds_num');
        $bathroom_numFilter = $request->input('bath_num');
        $freeformAddress = $request->input('freeformAddress');
        // $position = $request->input('position');
        $longitude =  $request->input('longitude');
        $latitude =  $request->input('latitude');
        $raggio = $request->input('distance');

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
        if ($latitude !== "") {
            // $raggio = 80;
            $risultati = ApartmentController::MasterFilter($latitude, $longitude, $raggio);
            $sponsorizzati = [];
            foreach($risultati as $risultato){
                if($risultato->name !== null){
                    $sponsorizzati[]= $risultato;
                }
            }
           
            //$risultati = ApartmentController::pointsWithinRadius($latitude, $longitude, $raggio);
        }

        // Additional filter based on municipality
        // if (!empty($freeformAddress)) {
        //     $apartmentsQuery->where('address', 'LIKE', '%' . $freeformAddress . '%');
        // }

        $filteredApartments = $apartmentsQuery->get();

        //$appartamentiPaganti = ApartmentController::orderbyPayment();

        //solo per fini di Dev restituisco gli appartamenti totali e anche quelli filtrati con anche il raggio scelto.
        return response()->json(['apartments' => $filteredApartments, 'funzione' => $risultati,'sponsorizzati' => $sponsorizzati, 'raggio' => $raggio]);
    }

    public function show($slug)
    {
        /* Commentata perché prende l'ip del server backend, dobbiamo prendere
        l'ip del visitatore in front-end */
        /* $ip = $request->ip(); */

        // Start with the base query
        $showedApartmentQuery = Apartment::query();

        /* $selectedApartmentSlug = $request->input("selectedApartmentSlug"); */
        /* selezioniamo un appartamento trammite Sulg mandato trammite chiamata axios*/
        $showedApartmentQuery->where("slug", $slug);
        //recuperiamo anche le sue relazioni con la tabella amenities
        $showedApartmentQuery->with(['amenities']);
        /*ora con lo slug sempre usato per filtrare l'appartamento faciamo una query
        per poter ricavare l'user_id di chi ha registrato l'appartamento  */
        $hosts= DB::table('apartments')->where('slug', $slug)->select('user_id')->get();
        // $hosts sarà un array contenente un solo elemento poichè c'è un solo proprietario
        // per recuperarlo non possiamo fare $host[0]['user_id'] perche è un oggetto
        $hostId = $hosts[0]->user_id;
        //$hostId è l'id del'host dell'appartamento in show
        $host = DB::table('users')->find($hostId);
        //cancello la passowrd per non restituirla in front-office
        unset($host->password);

        $showedApartment = $showedApartmentQuery->get();

        return response()->json(['showedApartment' => $showedApartment, 'host' => $host]);
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
    public function postPosition(Request $request)
    {
        $latitude =  $request->input('longitude');
        $latitude =  $request->input('latitude');
        $dati = [
            "longitude" => $latitude,
            "latitude" => $latitude
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

    public function saveCostumerIpAdress(Request $request){
        // Da fare:
        // Aggiungere lo slug dell'appartamento correntemente visitato negli argomenti e passare
        // anche quello nella chiamata in front-office
        // Salvare l'ip del visitatore ($ip) nella tabella "views" relazionandolo all'appartamento
        // visitato scrivendo nella colonna "apartment_id".
        $ip = $request->ipAdress;
        $apartmentSlug = $request->showedApartmentSlug;

        $apartment = Apartment::where('slug', $apartmentSlug)->first();
        
        View::create([
            'ip_address' => $ip,
            'apartment_id' => $apartment->id,
            'created_time' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json($ip);
    }
}
