<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
  use SoftDeletes;

  // fillable, mass asiggnment
  // sesuaikan dengan kolom di tabel travel package
  protected $fillable = [
    'travel_packages_id', 'image',
  ];

  protected $hidden = [];

  // relasi dgn tabel travel_package
  public function travel_package()
  {
    return $this->belongsTo(TravelPackage::class, 'travel_packages_id', 'id');
  }
}
