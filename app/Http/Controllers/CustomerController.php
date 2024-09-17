<?php

namespace App\Http\Controllers;

use App\Models\Customer;

class CustomerController extends CRUDController
{
  public function __construct()
  {
    parent::__construct(
      Customer::class,
      [
        'title' => 'Customer',
        'columns' => ['id customer', 'nama', 'alamat', 'no telfon', 'tanggal dibuat', 'tanggal diupdate'],
        'fillable_types' => [
          ['name' => 'nama', 'placeholder' => 'Nama Customer Kamu', 'type' => 'text'],
          ['name' => 'alamat', 'placeholder' => 'Alamatnya ya', 'type' => 'textarea'],
          ['name' => 'no_telfon', 'placeholder' => 'No Telfon', 'type' => 'text'],
        ],
        'name_route' => 'customer',
      ]
    );
  }
}
