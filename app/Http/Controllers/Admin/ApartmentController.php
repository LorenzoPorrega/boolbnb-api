<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApartmentUpsertRequest;
use App\Models\Amenity;
use Illuminate\Http\Request;
use App\Models\Apartment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ApartmentController extends Controller
{
  // protected function generateSlug($data, $title){
  //   // Counter to start from a number
  //   $counter = 0;

  //   // I establish a do-while cycle
  //   do {
  //     // $slug will be the title of the stored Project + "-<counter-number>" if the counter is higher than zero, otherwise ""
  //     $slug = Str::slug($data["title"]) . ($counter > 0 ? "-" . $counter : "");
  //     // it if there is a slug in DB called the same way than the just created slug
  //     $alreadyExists = Apartment::where("slug", $slug)->first();
  //     // increase the counter
  //     $counter++;
  //   } while ($alreadyExists);

  //   /* if($alreadyExists){
  //       $data["slug"] = $data["slug"] . "";
  //       return redirect()->route("admin.projects.create")->with("message", "This project's title already exists!");
  //   } */

  //   //once the do-while cycle stopped because there where no other slug called the same way I establish the last made slug as the new Project's slug
  //   return $slug;
  // }

  public function getUserId(Request $request = null)
  {
      $user = $request ? $request->user() : Auth::user();
      $id = $user->id;
      return $id;
  }

  /**
   * Display a listing of the resource.
   */
  public function index(){
    $apartments = Apartment::all();
    return view('admin.apartments.index', compact("apartments"));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(){
    $amenities = Amenity::all();
    return view("admin.apartments.create", compact("amenities"));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(ApartmentUpsertRequest $request){
    $data = $request->validated();

    $user_id = $this->getUserId();
    $data["user_id"] = $user_id;
    // $data["id"] = $this->generateSlug($data, $data["title"]);

    $data["images"] = Storage::put("apartments", $data["images"]);

    $apartment = Apartment::create($data);

    // return the show route with the id as the new project's id
    return redirect()->route("admin.apartments.index", [$apartment->id, $user_id]);
  }

  /**
   * Display the specified resource.
   */
  public function show(Apartment $apartment)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Apartment $apartment)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Apartment $apartment)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Apartment $apartment)
  {
    //
  }
}
