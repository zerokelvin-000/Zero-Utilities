<?php
    require "../../normal/point.php";

    use ZKutils\Point\Point;

    class Player{
        private Point $position;
        private float $rotation;

        public function __construct($posx, $posy, $rot){
            $this->position = new Point;
            $this->position->set_2D_point($posx, $posy);
            $this->rotation = $rot;
        }

        public function aim_to(Player $player, $debug = false){
            $target_angle = $this->position->angle_to($player->position);
            $angle_diff = $target_angle - $this->rotation;

            $this->rotation += $angle_diff;

            return $debug ? [$angle_diff, $this->rotation] : $this->rotation;
        }
    }