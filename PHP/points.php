<?php
    namespace ZKutils\Points;

    class Point_2D{
        public float $posx;
        public float $posy;

        public function __construct($posx, $posy){
            $this->posx = $posx;
            $this->posy = $posy;
        }
    };

    class Point_3D{
        public float $posx;
        public float $posy;
        public float $posz;

        public function __construct($posx, $posy, $posz){
            $this->posx = $posx;
            $this->posy = $posy;
            $this->posz = $posz;
        }
    }