<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    // Relazione many-to-one con Apartment
    public function apartment() {
        return $this->belongsTo(Apartment::class);
    }

}
