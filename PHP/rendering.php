<?php
    namespace ZKutils\Rendering;

    require "utils.php";
    require "trigonometry.php";

    use ZKutils\Trigonometry\Trigonometry as trig;
    use ZKutils\Utils\Numbers as nms;

    trait Rendering_2D{
        public static function rotate_point_a_by_b($ax, $ay, $bx, $by, $angle){
            $distx = $bx - $ax;
            $disty = $by - $ay;

            $radius = sqrt($distx**2 + $disty**2);

            $px = $ax + $radius*trig::cos_deg($angle);
            $py = $ay + $radius*trig::sin_deg($angle);

            return [nms::format($px), nms::format($py)];
        }
    }