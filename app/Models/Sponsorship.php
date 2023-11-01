<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    use HasFactory;
    // Relazione many-to-many con Apartment tramite una tabella ponte 'apartment_sponsorship'
    public function apartments() {
        return $this->belongsToMany('Apartment', 'apartment_sponsorship');
    }
}
