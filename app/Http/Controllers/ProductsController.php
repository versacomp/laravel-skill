<?php

namespace App\Http\Controllers;

use App\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    protected $data_file = 'products.json';
    protected $data = [];

    public function index()
    {
        return view('welcome');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required'
        ]);

        $product = new Product(request(['name', 'quantity', 'price']));

        if (file_exists($this->data_file)) {
            $this->loadData();
            $this->saveData($product);
        } else {
            $this->initData();
        }

        return redirect('/');
    }

    private function initData()
    {
        file_put_contents($this->data_file, @'
[
  {
    "name": "product1234",
    "quantity": 2,
    "price": 25.0000
  },
  {
    "name": "product234234",
    "quantity": 33,
    "price": 19.0000
  },
  {
    "name": "product23432",
    "quantity": 24,
    "price": 26.0000
  }
]
        ');
    }

    private function loadData()
    {
        $this->data = json_decode(file_get_contents($this->data_file));
    }

    private function saveData($product)
    {
        array_push($this->data, $product);
        file_put_contents($this->data_file, json_encode($this->data));
    }
}
