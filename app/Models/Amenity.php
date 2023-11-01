<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    use HasFactory;

    // Relazione many-to-many con Apartment tramite una tabella ponte 'apartment_amenity'
    public function apartments() {
        return $this->belongsToMany('Apartment', 'apartment_amenity');
    }

}


