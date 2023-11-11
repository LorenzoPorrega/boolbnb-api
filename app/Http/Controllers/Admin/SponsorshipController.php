<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SponsorshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataRaw = $request;
        $data = $dataRaw;
        return redirect()->route("admin.apartments.index");
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $apartment = Apartment::where('slug', $slug)->firstOrFail();
        $sponsorships = Sponsorship::all();

        if ($apartment->user_id != Auth::id()) {
            return abort(404);
        }

        return view('admin.sponsorships.sponsorship', ['apartment'=> $apartment, 'sponsorships' => $sponsorships]);
    }

    public function sponsored(Request $request){
        $apartmentId = $request->input('apartment_id');
        $sponsorshipId = $request->input('sponsorship_id');

        $apartment = Apartment::find($apartmentId);
        $sponsorship = Sponsorship::find($sponsorshipId);

        if ($apartment && $sponsorship) {
            $apartment->sponsorships()->attach($sponsorship->id, 
            [
                'start_time' => now(),
                'end_time' => now()->addHours($sponsorship->duration_hours)
            ]);
        } else {
            return abort(404);
        }
        return view('admin.sponsorships.sponsored');
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sponsorship $sponsorship)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sponsorship $sponsorship)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sponsorship $sponsorship)
    {
        //
    }
}
