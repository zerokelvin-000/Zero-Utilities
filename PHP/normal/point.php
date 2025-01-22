<?php
    namespace ZKutils\Point;

    class Point{
        public $x;
        public $y;
        public $z;

        public function set_2D_point($x, $y){
            $this->x = $x;
            $this->y = $y;
        }

        public function set_3D_point($x, $y, $z){
            $this->x = $x;
            $this->y = $y;
            $this->z = $z;
        }

        public function get_point_dimensions(){
            if(!$this->x || !$this->y){
                return null;
            }

            if($this->x && $this->y && !$this->z){
                return 2;
            }

            if($this->x && $this->y && $this->z){
                return 3;
            }

            return null;
        }

        public function get_position(){
            if($this->get_point_dimensions() == 2){
                return ["x" => $this->x, "y" => $this->y];
            }
        
            if($this->get_point_dimensions() == 3){
                return ["x" => $this->x, "y" => $this->y, "z" => $this->z];
            }

            return ["x" => null, "y" => null, "z" => null];
        }

        public function angle_to(Point $target){
            $dx = $target->x - $this->x;
            $dy = $target->y - $this->y;

            return rad2deg(atan2($dy, $dx));
        }
    }