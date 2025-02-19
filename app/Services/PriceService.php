<?php

namespace App\Services;

class PriceService
{

    //
    public function setPriceToUSD($price)
    {
        return $price / 50 ;
    }

}