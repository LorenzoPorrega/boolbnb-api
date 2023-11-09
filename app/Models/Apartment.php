<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Apartment extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'slug',
        'title',
        'address',
        'price',
        'images',
        'description',
        'rooms_num',
        'beds_num',
        'bathroom_num',
        'visibility',
        'square_meters',
        'longitude',
        'latitude',
        'user_id'
    ];
    
    protected $casts = [
        'images' => 'array',
        'address' => 'array'
    ];

    public function amenities() {
        return $this->belongsToMany(Amenity::class);
    }

    // Relazione many-to-one con User
    public function users() {
        return $this->belongsTo(User::class);
    }

    // Relazione many-to-many con Sponsorship tramite una tabella ponte 'apartment_sponsorship'
    public function sponsorships() {
    return $this->belongsToMany(Sponsorship::class, 'sponsorship_apartment');
    }


    // Relazione one-to-many con View
    public function views() {
        return $this->hasMany(View::class);
    }

    // Relazione one-to-many con Message
    public function messages() {
        return $this->hasMany(Message::class);
    }
};
