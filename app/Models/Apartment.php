<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

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
        'user_id'
    ];
    
    protected $casts = [
        'images' => 'array'
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
        return $this->belongsToMany(Sponsorship::class);
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
