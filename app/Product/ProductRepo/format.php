<?php
namespace App\Product\ProductRepo;

use App\Product\ProductRepo\productInterface;

class format implements productInterface{
    
    public function output($result){
        return "<h1>Total : $result</h1>";
    }
}
