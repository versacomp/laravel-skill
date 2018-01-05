<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'quantity', 'price'];

    public function __construct(array $attributes = [])
    {
        $this->created_at = Carbon::now();
        $this->item_total = $attributes['quantity'] * $attributes['price'];
        parent::__construct($attributes);
    }
}
