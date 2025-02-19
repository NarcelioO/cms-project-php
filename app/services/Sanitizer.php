<?php 


namespace app\services;

class Sanitizer{

    public static function email($value)
    {
        return filter_var($value, FILTER_SANITIZE_EMAIL);

    }

   
    
    public static function string($value, $min = 1, $max = INF)
    {
        // if(empty($data)){
        //     echo "O campo esta vazio";
        // }
        return htmlspecialchars(strip_tags(trim($value)), ENT_QUOTES, 'UTF-8');

        // return self::length($data, $min, $max) ? $data : false;
        
    }
}