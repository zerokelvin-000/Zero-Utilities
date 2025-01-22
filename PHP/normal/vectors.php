<?php
    namespace ZKutils\Vectors;

    require "matrices.php";
    require "point.php";
    require "utils.php";
    require "trigonometry.php";

    use ZKutils\Point\Point;
    use ZKutils\Utils\Theorems;
    use ZKutils\Trigonometry\Trigonometry;

    class Vector{
        public Point $position;

        public function __construct(float $x, float $y, float $z = null){
            $this->position = new Point;

            $this->set_position($x, $y, $z);
        }

        public function set_position($x, $y, $z = null){
            if(!$x || !$y){
                return null;
            }

            if($x && $y && !$z){
                $this->position->set_2D_point($x, $y);
            }

            if($x && $y && $z){
                $this->position->set_3D_point($x, $y, $z);
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
                $vector = new Vector(0,0);

                $vector->set_position(
                    $this->position->x + $target->position->x,
                    $this->position->y + $target->position->y
                );
            }
            
            if($this->position->get_point_dimensions() == 3){
                $vector = new Vector(0,0,0);

                $vector->set_position(
                    $this->position->x + $target->position->x,
                    $this->position->y + $target->position->y,
                    $this->position->z + $target->position->z
                );
            }

            return $vector;
        }

        public function subtract(Vector $target){
            if($this->position->get_point_dimensions() != $target->get_dimensions()){
                return null;
            }
            
            if($this->position->get_point_dimensions() == 2){
                $vector = new Vector(0,0);

                $vector->set_position(
                    $this->position->x - $target->position->x,
                    $this->position->y - $target->position->y
                );
            }
            
            if($this->position->get_point_dimensions() == 3){
                $vector = new Vector(0,0,0);

                $vector->set_position(
                    $this->position->x - $target->position->x,
                    $this->position->y - $target->position->y,
                    $this->position->z - $target->position->z
                );
            }

            return $vector;
        }

        public function scale($scalar){
            if($this->position->get_point_dimensions() == 2){
                $this->position->set_2D_point(
                    $this->position->x * $scalar,
                    $this->position->y * $scalar
                );
            }

            if($this->position->get_point_dimensions() == 3){
                $this->position->set_3D_point(
                    $this->position->x * $scalar,
                    $this->position->y * $scalar,
                    $this->position->z * $scalar
                );
            }
        }

        public function module(){
            if($this->position->get_point_dimensions() == 2){
                return Theorems::pythagoras($this->position->x, $this->position->y);
            }

            if($this->position->get_point_dimensions() == 3){
                return Theorems::pythagoras($this->position->x, $this->position->y, $this->position->z);
            }

            return 0;
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
            
            if($this->position->get_point_dimensions() == 3){
                $result += $this->position->x * $target->position->x;
                $result += $this->position->y * $target->position->y;
                $result += $this->position->z * $target->position->z;
            }

            return $result;
        }

        public function print_position(){
            if($this->position->get_point_dimensions() == 2){
                return $this->position->x ." ". $this->position->y;
            }

            if($this->position->get_point_dimensions() == 3){
                return $this->position->x ." ". $this->position->y ." ". $this->position->z;
            }
        }

        public function angle(Vector $second_vector){
            $product = $this->scalar_product($second_vector);
            $module1 = $this->module();
            $module2 = $second_vector->module();

            if($module1 == 0 || $module2 == 0){
                return null;
            }

            $angle = Trigonometry::acos_rad($product / ($module1 * $module2));

            return Trigonometry::rad2deg($angle);
        }
    }

    $vector = new Vector(10,2);
    $vector1 = new Vector(-4,-9);
    echo $vector->angle($vector1);