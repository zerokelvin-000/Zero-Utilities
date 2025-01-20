<?php
    namespace ZKutils\Vectors;

    require "matrices.php";
    require "points.php";

    use ZKutils\Points\Point_2D;
    use ZKutils\Matrix\Matrix;

    trait Vectors_2D{
        public static function scale_vector(Point_2D $original_point, $scalar){
            return new Point_2D($original_point->posx * $scalar, $original_point->posy * $scalar);
        }

        public static function add_vectors(Point_2D $point1, Point_2D $point2){
            return new Point_2D($point1->posx + $point2->posx, $point1->posy + $point2->posy); 

            return $result;
        }

        public static function subtract_vectors(Point_2D $point1, Point_2D $point2){
            return new Point_2D($point1->posx - $point2->posx, $point1->posy - $point2->posy); 

            return $result;
        }

        public static function vector_magnitude(Point_2D $point1, Point_2D $point2){
            self::subtract_vectors($point1, $point2);
        }
    }

    class Vectors{
        use Vectors_2D;
    }