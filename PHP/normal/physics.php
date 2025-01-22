<?php
    namespace ZKutils\Physics;

    trait Physics{
        public static function final_velocity($vi, $a, $t){
            return $vi + $a * $t;
        }
        
        public static function uniformly_accelerated_motion($vi, $a, $t){
            return $vi * $t + 1/2 * $a * ($t ** 2);
        }
    }

    echo Physics::uniformly_accelerated_motion(10, 2, 4);