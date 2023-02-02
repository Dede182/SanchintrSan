<?php
namespace App\Product;

use App\Product\ProductRepo\priceRepo;
use App\Product\ProductRepo\productInterface;

class productReport
{
    protected $repo;

    public function __construct(priceRepo $repo)
    {
        $this->repo = $repo;
    }

    public function between($startDate,$endDate,productInterface $format){

        $total = $this->repo->queryBetween($startDate,$endDate);
        return $format->output($total);

    }

};
