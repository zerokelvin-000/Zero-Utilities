<?php
    namespace ZKutils\Vectors;

    require "matrices.php";

    use ZKutils\Matrix\Matrix as matrix;

    trait Vectors_2D{
        public static function scale_vector($vector, $scalar){
            foreach($vector as $index => $object){
                $vector[$index] = $object * $scalar;
            }

            return $vector;
        }

        public static function add_vectors($vector1, $vector2){
            $result = matrix::add([$vector1, $vector2]);

            return $result;
        }

        public static function subtract_vectors($vector1, $vector2){
            $result = matrix::subtract([$vector1, $vector2]);

            return $result;
        }

        public static function multiply_vectors($vector1, $vector2){
            $result = matrix::multiply($vector1, $vector2);

            return $result;
        }
    }

    trait Vectors{
        use Vectors_2D;
    }