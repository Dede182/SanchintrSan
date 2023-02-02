<?php
namespace App\Product\ProductRepo;

use App\Models\Product;

class priceRepo
{
    public function queryBetween($startDate,$endDate){
        return Product::whereBetween('price',[$startDate,$endDate])->sum('price');
    }
}
