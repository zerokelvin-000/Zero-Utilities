<?php
    namespace ZKutils\Array;

    use InvalidArgumentException;

    trait Zarray{
        public static function zeros(array $shape){
            if(count($shape) != 2){
                throw new InvalidArgumentException("La dimensione di 'shape' deve essere 2.");
            }

            $output = [];

            for($y = 0; $y < $shape[1]; $y++){
                $row = array_fill(0, $shape[0], (int) 0);

                $output[] = $row;
            }

            return $output;
        }

        public static function ones(array $shape){
            if(count($shape) != 2){
                throw new InvalidArgumentException("La dimensione di 'shape' deve essere 2.");
            }

            $output = [];

            for($y = 0; $y < $shape[1]; $y++){
                $row = array_fill(0, $shape[0], (int) 1);

                $output[] = $row;
            }

            return $output;
        }

        public static function convert(array $original_array, $dtype = "i" | "f" | "s" | "b"){
            $output = [];
            foreach($original_array as $element){
                switch($dtype){
                    case "i":
                        $output[] = (int) $element;
                        break;

                    case "f":
                        $output[] = (float) $element;
                        break;

                    case "s":
                        $output[] = (string) $element;
                        break;

                    case "b":
                        $output[] = (bool) $element;
                        break;
                    
                    default:
                        throw new InvalidArgumentException("Datatype '$dtype' non riconosciuto.");
                        break;
                }
            }
            return $output;
        }

        public static function arange($start, $stop, $step){
            $output = [];

            for($x = $start; $x < $stop; $x += $step){
                $output[] = $x;
            }

            return $output;
        }

        public static function scramble(array $array) {
            $count = count($array);
        
            for($i = $count - 1; $i > 0; $i--){  
                $j = rand(0, $i);
                [$array[$i], $array[$j]] = [$array[$j], $array[$i]];
            }
        
            return $array;
        }

        public static function concatenate(array ...$arrays){
            return array_merge($arrays);
        }
    }

    echo json_encode(
        zarray::concatenate([1,2,3,4], [3,6,1])
        , JSON_PRETTY_PRINT
    )."<br>";