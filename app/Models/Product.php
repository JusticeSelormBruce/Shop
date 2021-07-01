<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function validateProductFormData()
    {
        return request()->validate([
            'name' => "bail|string|required",
            'quantity' => "bail|numeric|required",
            'price' => "bail|numeric|required",
        ]);
    }

    public static function AppendDataToProduts($content)
    {
        $filename = 'products.json';
        $data = file_get_contents($filename);
        $request_array = json_decode($data);

        $request = array(
            'name' => $content['name'],
            'quantity' => $content['quantity'],
            'price' => $content['price'],
            'datetime' => \Carbon\Carbon::now()->toDateTimeString(),
            'total' => (int)$content['quantity'] * (int)$content['price']

        );
        $request_array[] = $request;
        $result = json_encode($request_array, JSON_PRETTY_PRINT);
        file_put_contents($filename, $result);

    }
  
}
