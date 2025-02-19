<?php

namespace App\Traits;

trait PriceTrait
{

    //
    protected function setPriceToUSD($price)
    {
        return $price / 50 ;
    }

}