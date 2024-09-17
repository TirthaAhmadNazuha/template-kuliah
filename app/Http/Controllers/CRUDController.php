<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

abstract class CRUDController extends Controller
{
  protected $modelClass;
  protected $data = [];

  public function __construct($modelClass, $data = [])
  {
    $this->modelClass = $modelClass;
    $this->data = $data;
    $this->data['primary'] = $this->getModel()->getKeyName();
  }

  /**
   * 
   * @return Model
   */
  protected function getModel()
  {
    return app($this->modelClass);
  }

  public function index()
  {
    $model = $this->getModel();
    $items = $model::all()->map(function ($product) use ($model) {
      // Convert the product to an array
      $productArray = $product->toArray();
      $productArray['_id'] = $productArray[$model->getKeyName()];

      // Format the 'created_at' field if it exists
      if (isset($productArray['created_at'])) {
        $productArray['created_at'] = Carbon::parse($productArray['created_at'])->format('Y-m-d H:i:s');
      }

      // Format the 'updated_at' field if it exists
      if (isset($productArray['updated_at'])) {
        $productArray['updated_at'] = Carbon::parse($productArray['updated_at'])->format('Y-m-d H:i:s');
      }

      // Return the modified array
      return $productArray;
    });
    return view($this->data['name_route'] . '.index', ['items' => $items, 'data' => $this->data]);
  }

  public function create()
  {
    return view($this->data['name_route'] . '.edit-add', ['data' => $this->data]);
  }

  protected function shouldAddTimestamps(QueryException $e)
  {
    // Check if the exception is related to missing columns
    return str_contains($e->getMessage(), 'Unknown column');
  }

  public function store(Request $request)
  {
    try {
      $this->getModel()::create($request->all());
      return redirect()->route($this->data['name_route'] . '.index')->with('msg', 'Berhasil ditambahkan');
    } catch (QueryException $e) {
      if ($this->shouldAddTimestamps($e)) {
        Schema::table($this->getModel()->getTable(), function (Blueprint $table) {
          $table->timestamps(); // Adds both 'created_at' and 'updated_at'
        });

        $this->getModel()::create($request->all());
        return redirect()->route($this->data['name_route'] . '.index')->with('msg', 'Berhasil ditambahkan');
      } else {
        return redirect()->route($this->data['name_route'] . '.index')->with('msg', 'Gagal ditambahkan');
      }
    }
  }

  public function edit($id)
  {
    $model = $this->getModel();
    $item = $model::findOrFail($id)->toArray();
    $item['_id'] = $item[$model->getKeyName()];
    unset($item['created_at']);
    unset($item['updated_at']);
    return view($this->data['name_route'] . '.edit-add', ['item' => $item, 'data' => $this->data]);

  }

  public function update(Request $request, $id)
  {
    $item = $this->getModel()::findOrFail($id);
    $item->update($request->all());
    return redirect()->route($this->data['name_route'] . '.index')->with('msg', 'Berhasil diubah');
  }

  public function destroy($id)
  {
    $item = $this->getModel()::findOrFail($id);
    $item->delete();
    return redirect()->back()->with('msg', 'Berhasil dihapus');
  }
}
