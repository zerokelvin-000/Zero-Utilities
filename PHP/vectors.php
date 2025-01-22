<?php
    namespace ZKutils\Vectors;

    require "matrices.php";

    use ZKutils\Matrix\Matrix;

    trait Point{
        public float $x;
        public float $y;
        public float $z;

        public function set_2D_point($x, $y){
            $this->x = $x;
            $this->y = $y;
        }
    }

    trait Vector_2D{
        public static function create_vector($x, $y){
            $point = new Point();
            $point->set_2D_point($x, $y);
        }

        public static function scale_vector(Point $original_point, $scalar){
            return new Point($original_point->x * $scalar, $original_point->y * $scalar);
        }

        public static function add_vectors(Point $point1, Point $point2){
            return new Point($point1->posx + $point2->posx, $point1->posy + $point2->posy);
        }

        public static function subtract_vectors(Point $point1, Point $point2){
            return new Point($point1->posx - $point2->posx, $point1->posy - $point2->posy);
        }

        public static function vector_dot_product(Point $point1, Point $point2){
            return new Point();
        }
    }

    class Vector{
        use Vector_2D;

        public Point $position;

        public function set_position($x, $y){
            $this->position = new Point($x, $y);
        }
    }