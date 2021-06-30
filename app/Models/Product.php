<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function validateProductFormData()
    {
        return request()->validate([
            'product_name' => "bail|string|required|unique:product",
            'qunatity' => "bail|numeric|min:1|required",
            'price' => "bail|numeric|required",
        ]);
    }
}
