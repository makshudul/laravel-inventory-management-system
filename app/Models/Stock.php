<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $guarded=[];
    function rel_to_product(){
        return $this->belongsTo(Product::class,'product_code','product_code');
    }
}
