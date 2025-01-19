<?php
    namespace ZKutils\Utils;

    trait Numbers{
        public static function format($n, $decimals = 12){
            return number_format($n, $decimals, ".", "");
        }
    }