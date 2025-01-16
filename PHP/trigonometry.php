<?php
    trait DegRad{
        public static function deg2rad($degrees){
            return deg2rad($degrees);
        }

        public static function rad2deg($radians){
            return rad2deg($radians);
        }
    }

    trait DirectTrigonometry{
        public static function sin_deg($angle){
            return sin(DegRad::deg2rad($angle));
        }

        public static function sin_rad($angle){
            return sin($angle);
        }

        public static function cos_deg($angle){
            return cos(DegRad::deg2rad($angle));
        }

        public static function cos_rad($angle){
            return cos($angle);
        }

        public static function tan_deg($angle){
            return tan(DegRad::deg2rad($angle));
        }

        public static function tan_rad($angle){
            return tan($angle);
        }

        public static function cot_deg($angle){
            return DirectTrigonometry::cos_deg($angle) / DirectTrigonometry::sin_deg($angle) ?? null;
        }

        public static function cot_rad($angle){
            return DirectTrigonometry::cos_rad($angle) / DirectTrigonometry::sin_rad($angle) ?? null;
        }

        public static function sec_deg($angle){
            return 1 / DirectTrigonometry::cos_deg($angle) ?? null;
        }

        public static function sec_rad($angle){
            return 1 / DirectTrigonometry::cos_rad($angle) ?? null;
        }

        public static function csc_deg($angle){
            return 1 / DirectTrigonometry::sin_deg($angle) ?? null;
        }

        public static function csc_rad($angle){
            return 1 / DirectTrigonometry::sin_rad($angle) ?? null;
        }
    }

    trait InverseTrigonometry{
        public static function asin_deg($angle){
            return asin(DegRad::deg2rad($angle));
        }

        public static function asin_rad($angle){
            return asin($angle);
        }

        public static function acos_deg($angle){
            return acos(DegRad::deg2rad($angle));
        }

        public static function acos_rad($angle){
            return acos($angle);
        }

        public static function atan_deg($angle){
            return atan(DegRad::deg2rad($angle));
        }

        public static function atan_rad($angle){
            return atan($angle);
        }

        public static function arccsc_deg($angle){
            return InverseTrigonometry::asin_deg(DegRad::deg2rad(1 / $angle));
        }

        public static function arccsc_rad($angle){
            return InverseTrigonometry::asin_rad(1 / $angle);
        }

        public static function arcsec_deg($angle){
            return InverseTrigonometry::acos_deg(DegRad::deg2rad(1 / $angle));
        }

        public static function arcsec_rad($angle){
            return InverseTrigonometry::acos_rad(1 / $angle);
        }

        public static function arcot_deg($angle){
            return InverseTrigonometry::atan_deg(DegRad::deg2rad(1 / $angle));
        }

        public static function arcot_rad($angle){
            return InverseTrigonometry::atan_rad(1 / $angle);
        }
    }

    trait Trigonometry{
        use DegRad;
        use DirectTrigonometry;
        use InverseTrigonometry;
    }

    echo Trigonometry::sec_rad(1.05);