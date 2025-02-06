<?php
    namespace ZKutils\Utils;

    trait Numbers{
        public static function format($n, $decimals = 12){
            return number_format($n, $decimals, ".", "");
        }
    }

    trait Theorems{
        public static function pythagoras($a, $b, $c = 0){
            return sqrt($a ** 2 + $b ** 2 + $c ** 2);
        }
    }