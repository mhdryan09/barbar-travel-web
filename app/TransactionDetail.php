<?php

namespace App;

use App\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
  use SoftDeletes;

  // fillable, mass asiggnment
  // sesuaikan dengan kolom di tabel transaction_details
  protected $fillable = [
    'transactions_id', 'username', 'nationality', 'is_visa', 'doe_passport'
  ];

  protected $hidden = [];


  // relasi dgn tabel transaction
  public function transaction()
  {
    return $this->belongsTo(Transaction::class, 'transactions_id', 'id');
  }
}
