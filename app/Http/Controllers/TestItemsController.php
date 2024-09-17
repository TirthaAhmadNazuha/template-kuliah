<?php

namespace App\Http\Controllers;

use App\Models\TestItems;

class TestItemsController extends CRUDController
{
  public function __construct()
  {
    parent::__construct(
      TestItems::class,
      [
        'title' => 'Test Item',
        'columns' => ['id', 'title', 'content', 'tanggal dibuat', 'tanggal diupdate'],
        'fillable_types' => [
          ['name' => 'title', 'placeholder' => 'Judul', 'type' => 'text'],
          ['name' => 'content', 'placeholder' => 'Konten', 'type' => 'textarea'],
        ],
        'name_route' => 'test-items',
      ]
    );
  }
}
