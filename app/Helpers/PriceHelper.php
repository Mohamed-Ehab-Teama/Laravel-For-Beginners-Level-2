<?php

namespace App\Helpers;

function setPriceToUSD ( $price )
{
    return $price / 50 ;
}


function setCurrency ( $currency )
{
    return strtoupper($currency) ;
}