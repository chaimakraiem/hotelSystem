<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
      protected $fillable = [
        'title',
        'description',
        'prix',
        'image',
        'disponibilite',
    ];

    public function reservations()
{
    return $this->hasMany(Reservation::class);
}

}
