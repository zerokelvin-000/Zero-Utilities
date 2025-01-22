<?php
    namespace ZKutils\Vectors;

    require "matrices.php";
    require "point.php";
    require "utils.php";

    use ZKutils\Point\Point;
    use ZKutils\Utils\Theorems;

    class Vector{
        public Point $position;

        public function __construct(){
            $this->position = new Point;
        }

        public function set_position($x, $y, $z = null){
            if(!$x || !$y){
                return null;
            }

            if($x && $y && !$z){
                $this->position->set_2D_point($x, $y);
            }

            if($x && $y && $z){
                // TODO: set position per 3D
            }

            return null;
        }

        public function get_position(){
            return $this->position->get_position();
        }

        public function get_dimensions(){
            return $this->position->get_point_dimensions();
        }

        public function add(Vector $target){
            if($this->position->get_point_dimensions() != $target->get_dimensions()){
                return null;
            }
            
            if($this->position->get_point_dimensions() == 2){
                $this->set_position($this->position->x + $target->position->x, $this->position->y + $target->position->y);
            }
        }

        public function subtract(Vector $target){
            if($this->position->get_point_dimensions() != $target->get_dimensions()){
                return null;
            }
            
            if($this->position->get_point_dimensions() == 2){
                $this->set_position($this->position->x - $target->position->x, $this->position->y - $target->position->y);
            }
        }

        public function scale($scalar){
            if($this->position->get_point_dimensions() == 2){
                $this->position->set_2D_point(
                    $this->position->x * $scalar,
                    $this->position->y * $scalar
                );
            }
        }

        public function module(){
            return Theorems::pythagoras($this->position->x, $this->position->y);
        }

        public function scalar_product(Vector $target){
            if($this->position->get_point_dimensions() != $target->get_dimensions()){
                return null;
            }

            $result = 0;
            
            if($this->position->get_point_dimensions() == 2){
                $result += $this->position->x * $target->position->x;
                $result += $this->position->y * $target->position->y;
            }

            return $result;
        }

        public function print_position(){
            if($this->position->get_point_dimensions() == 2){
                return $this->get_position()["x"]." ".$this->get_position()["y"];
            }
        }
    }

    $vector = new Vector();
    $vector->set_position(3,4);
    $vector1 = new Vector();
    $vector1->set_position(4,-3);
    echo $vector->scalar_product($vector1)."<br>";