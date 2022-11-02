<?php
class Helper
{
    // <!-- currencyload -->
    public static function currency_load()
    {
        if (session()->has('system_default_currency_info') == false) {
            session()->put('system_default_currency_info', \App\Models\Currency::find(1));
        }
    }
    // currency converter

    public static function currency_converter($amount)
    {
        return format_price (convert_price($amount));
    }
}

// convert price
if (!function_exists('convert_price')) {
    function convert_price($total)
    {
        Helper::currency_load();
        $system_default_currency_info = session('system_default_currency_info');
        $price = floatval($total) / floatval($system_default_currency_info->exchange_rate);
        if (\Illuminate\Support\Facades\Session::has('currency_exchange_rate')) {
            $exchange = session('currency_exchange_rate');
        } else {
            $exchange = $system_default_currency_info->exchange_rate;
        }
        $price = floatval($total) * floatval($exchange);
        return $price;
    }
}
//currency symbol
if (!function_exists('convert_symbol')) {
    function currency_symbol()
    {
        Helper::currency_load();
        if (session()->has('currency_symbol')) {
            $symbol = session('currency_symbol');
        } else {
            $system_default_currency_info = session('system_default_currency_info');
            $symbol = $system_default_currency_info->symbol;
        }
        return $symbol;
    }
}
//formatprice
if(!function_exists('format_price')){
    function format_price($price){
        return currency_symbol(). number_format($price,2);
    }
}


