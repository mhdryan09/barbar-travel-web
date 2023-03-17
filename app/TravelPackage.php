<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravelPackage extends Model
{
    use SoftDeletes;

    // fillable, mass asiggnment
    // sesuaikan dengan kolom di tabel travel package
    protected $fillable = [
        'title', 'slug', 'location', 'about', 'featured_event', 'language', 'foods', 'departure_date', 'duration', 'type', 'price'
    ];

    protected $hidden = [];

    // relasi dgn tabel galleries
    public function galleries()
    {
        // 1 paket travel punya banyak gambar
        return $this->hasMany(Gallery::class, 'travel_packages_id', 'id');
    }
}
