<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestItems extends Model
{
  use HasFactory;
  protected $table = "test_items";
  protected $primaryKey = 'id'; // Specify the primary key column
  public $incrementing = true;
  protected $keyType = 'string';
  protected $fillable = [
    "title",
    "content",
  ];

}
