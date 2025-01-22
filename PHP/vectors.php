<?php
    namespace ZKutils\Vectors;

    require "matrices.php";
    require "point.php";

    use ZKutils\Point\Point;

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
                // TODO
            }

            return null;
        }

        public function get_position(){
            return $this->position->get_position();
        }

        public function scale($scalar){
            if($this->position->get_point_dimensions() == 2){
                $this->position->set_2D_point(
                    $this->position->x * $scalar,
                    $this->position->y * $scalar
                );
            }
        }

        public function print_position(){
            if($this->position->get_point_dimensions() == 2){
                return $this->get_position()["x"]." ".$this->get_position()["y"];
            }
        }
    }

    $vector = new Vector();
    $vector->set_position(2,6);
    $vector->scale(3);
    echo $vector->print_position();