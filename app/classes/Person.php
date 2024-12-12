<?php 

namespace app\classes;

class Person{
    public static string $name;
    
    public function __construct( public int $age, public string $gender)
    {
        
    }

    public function walk():string{
        var_dump($this);
        die;
    }
}

