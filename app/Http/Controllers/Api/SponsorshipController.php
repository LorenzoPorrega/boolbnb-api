<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SponsorshipController extends Controller
{
    public function fetchSponsored()
    {
        $apartmentIds = DB::table('sponsorship_apartment')
            ->where('end_time', '>', now())
            ->pluck('apartment_id');

        $sponsoredApartments = [];

        foreach ($apartmentIds as $apartmentId) {
            $apartment = Apartment::find($apartmentId);

            if ($apartment) {
                $sponsoredApartments[] = $apartment;
            }
        }

        return ['sponsoredApartments' => $sponsoredApartments];
    }
}
