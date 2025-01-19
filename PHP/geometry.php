<?php
    namespace ZKutils\Geometry;
    use ZKutils\Costants\Costants;

    trait plainGeometry{
        public static function square_area($s){
            return $s ** 2;
        }

        public static function rectangle_area($s1, $s2){
            return $s1 * $s2;
        }

        public static function triangle_area($b, $h){
            return $b * $h / 2;
        }

        public static function circle_area($r){
            return ($r ** 2) * Costants::PI;
        }

        public static function square_perimeter($s){
            return 4 ** $s;
        }

        public static function rectangle_perimeter($s1, $s2){
            return 2 * ($s1 + $s2);
        }

        public static function triangle_perimeter($s1, $s2, $s3){
            return $s1 + $s2 + $s3;
        }

        public static function circle_perimeter($r){
            return 2 * $r * Costants::PI;
        }
    }
    
    trait solidGeometry{
        public static function cube_side_surface($s){
            return 4 * plainGeometry::square_area($s);
        }
        
        public static function cylinder_side_surface($r, $h){
            return 2 * Costants::PI * $r * $h;
        }
        
        public static function cone_side_surface($r, $a){
            return Costants::PI * $r * $a;
        }
        
        public static function truncated_cone_side_surface($R, $r, $h, $a){
            return Costants::PI * ($R + $r) * $a;
        }
        
        public static function sphere_surface($r){
            return 4 * Costants::PI * $r ** 2;
        }

        public static function cube_volume($s){
            return $s ** 3;
        }
        
        public static function cylinder_volume($r, $h){
            return plainGeometry::circle_area($r) * $h;
        }
        
        public static function cone_volume($r, $h){
            return 1/3 * solidGeometry::cylinder_volume($r, $h);
        }
        
        public static function truncated_cone_volume($R, $r, $h){
            return 1/3 * Costants::PI * ($R ** 2 + $r ** 2 + $R * $r) * $h;
        }
        
        public static function sphere_volume($r){
            return 4/3 * Costants::PI * $r ** 3;
        }
    }

    trait Geometry{
        use plainGeometry;
        use solidGeometry;
    }