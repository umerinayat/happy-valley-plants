<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'plant_product_id',
        'user_id',
        'quantity'
    ];

    public function product()
    {
        return $this->belongsTo(PlantProduct::class, 'plant_product_id');
    }
}
