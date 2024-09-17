<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  use HasFactory;
  protected $table = "customer";
  protected $primaryKey = 'id_customer'; // Specify the primary key column
  public $incrementing = true;
  protected $keyType = 'string';
  protected $fillable = [
    "nama",
    "alamat",
    "no_telfon",
  ];

}
