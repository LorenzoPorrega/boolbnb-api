<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    public function amenities() {
        return $this->belongsToMany('Amenity', 'apartment_amenity');
    }

    // Relazione many-to-one con User
    public function user() {
        return $this->belongsTo('User');
    }

    // Relazione many-to-many con Sponsorship tramite una tabella ponte 'apartment_sponsorship'
    public function sponsorships() {
        return $this->belongsToMany('Sponsorship', 'apartment_sponsorship');
    }

    // Relazione one-to-many con View
    public function views() {
        return $this->hasMany('View');
    }

    // Relazione one-to-many con Message
    public function messages() {
        return $this->hasMany('Message');
    }
}
