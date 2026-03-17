<?php

if (!function_exists('getPriceFormat')) {
    function getPriceFormat($amount)
    {
        return '₹ ' . number_format((float)$amount, 2);
    }
}
