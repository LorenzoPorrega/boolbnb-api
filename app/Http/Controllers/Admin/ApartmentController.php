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
use Illuminate\Support\Facades\DB;
use Log;

class ApartmentController extends Controller{

  protected function generateSlug($data, $title){
    // Counter to start from a number
    $counter = 0;
    do {
        //$slug will be the title of the stored Project + "-<counter-number>" if the counter is higher than zero, otherwise ""
      $slug = Str::slug($data["title"]) . ($counter > 0 ? "-" . $counter : "");
        //it if there is a slug in DB called the same way than the just created slug
      $alreadyExists = Apartment::where("slug", $slug)->first();
        //increase the counter
      $counter++;
    } while ($alreadyExists);
     //once the do-while cycle stopped because there where no other slug called the same way I establish the last made slug as the new Project's slug
    return $slug;
  }

  // This function has been rendered obsolete, the Auth::id(); is enough to (safely?) grab the user's id
  /* public function getUserId(Request $request = null)
  {
      $user = $request ? $request->user() : Auth::user();
      $id = $user->id;
      return $id;
  } */

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
    /* $amenities = Amenity::all();
    // Return categories of amenities table non recursively
    $categoriesTitle = DB::table("amenities")->select("category")->groupBy("category")->get(); */
    $categories =  DB::table('amenities')
    ->select('category', DB::raw('GROUP_CONCAT(name ORDER BY name ASC) AS name_list'))
    ->groupBy('category')
    ->orderBy('category', 'asc')
    ->get();

    // Elabora i risultati per ottenere un array di nomi per ogni categoria
    $data = [];

    foreach ($categories as $row) {
        $category = $row->category;
        $names = explode(',', $row->name_list);
        $data[] = [
            'category' => $category,
            'names' => $names,
        ];
    }
    return view("admin.apartments.create", compact("data"));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(ApartmentUpsertRequest $request){
    // Data is validate in the ApartmentUpsertRequest's rules
    $data = $request->validated();

    // the user_id is grabbed via the following method and assign to the corrispending value
    $user_id = Auth::id();
    $data["user_id"] = $user_id;
    /* $user_id = $this->getUserId(); */
    // A slug is generated where slug = title if (!title = already existing title), otherwise a slug is created via title + counter
    $data["slug"] = $this->generateSlug($data, $data["title"]);
    // The provided apartment's images are put in public/storage/apartment dir
    $data["images"] = Storage::putFile("apartments", $data["images"]);

    $apartment = Apartment::create($data);

    if (key_exists("amenities", $data)) {
      $apartment->amenities()->attach($data["amenities"]);
    }

    return redirect()->route("admin.apartments.index");
  }

  /**
   * Display the specified resource.
   */
  public function show(Apartment $apartment)
  {
    //
    // $apartment = Apartment::findOrFail($id);
    // $apartment::findOrFail($apartment['slug']);
    $apartment->where('slug', $apartment->with('slug'));
    return view('admin.apartments.show', ["apartment" => $apartment]);
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
