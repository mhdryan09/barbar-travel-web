<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
  use SoftDeletes;

  // fillable, mass asiggnment
  // sesuaikan dengan kolom di tabel transaction
  protected $fillable = [
    'travel_packages_id', 'users_id', 'additional_visa', 'transaction_total',
    'transaction_status'
  ];

  protected $hidden = [];

  // relasi dgn tabel transaction_details
  public function details()
  {
    return $this->hasMany(TransactionDetail::class, 'transactions_id', 'id');
  }

  // relasi dgn tabel travel_package
  public function travel_package()
  {
    return $this->belongsTo(TravelPackage::class, 'travel_packages_id', 'id');
  }

  // relasi dgn tabel user
  public function user()
  {
    return $this->belongsTo(User::class, 'users_id', 'id');
  }
}
