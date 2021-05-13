<?php

function discountPercentage($selling, $discount){
    $percentage = (($selling - $discount) / $selling ) * 100;
    return (int)$percentage ;
}
