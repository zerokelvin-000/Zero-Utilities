<?php
    namespace ZKutils\Matrix;

    trait Matrix{
        public static function add(array $arrays): array{
            if(empty($arrays)){
                return [];
            }
        
            $rows = count($arrays[0]);
            $columns = count($arrays[0][0]);
        
            $result = array_fill(0, $rows, array_fill(0, $columns, 0));
        
            foreach ($arrays as $matrix) {
                if (count($matrix) != $rows || count($matrix[0]) != $columns) {
                    return [];
                }
        
                for ($i = 0; $i < $rows; $i++) {
                    for ($j = 0; $j < $columns; $j++) {
                        $result[$i][$j] += $matrix[$i][$j];
                    }
                }
            }
        
            return $result;
        }
        public static function subtract(array $arrays): array {
            if (empty($arrays)) {
                return [];
            }
        
            $rows = count($arrays[0]);
            $columns = count($arrays[0][0]);
        
            $result = $arrays[0];
        
            for ($k = 1; $k < count($arrays); $k++) {
                $matrix = $arrays[$k];
                
                if (count($matrix) != $rows || count($matrix[0]) != $columns) {
                    return [];
                }
        
                for ($i = 0; $i < $rows; $i++) {
                    for ($j = 0; $j < $columns; $j++) {
                        $result[$i][$j] -= $matrix[$i][$j];
                    }
                }
            }
        
            return $result;
        }

        public static function multiply(array $matrixA, array $matrixB): array{
            if(empty($matrixA) || empty($matrixB)){
                return [];
            }

            $rowsA = count($matrixA);
            $colsA = count($matrixA[0]);
            $rowsB = count($matrixB);
            $colsB = count($matrixB[0]);
        
            if($colsA !== $rowsB){
                return [];
            }
        
            $result = array_fill(0, $rowsA, array_fill(0, $colsB, 0));
        
            for($i = 0; $i < $rowsA; $i++){
                for($j = 0; $j < $colsB; $j++){
                    for($k = 0; $k < $colsA; $k++){
                        $result[$i][$j] += $matrixA[$i][$k] * $matrixB[$k][$j];
                    }
                }
            }
        
            return $result;
        }
        
        public static function prettyMatrix($original_matrix): string{
            if(empty($original_matrix)){
                return false;
            }

            $rows = count($original_matrix);
            $columns = count($original_matrix[0]);

            $result = "";

            if (count($original_matrix) != $rows || count($original_matrix[0]) != $columns) {
                return false;
            }
        
            for ($i = 0; $i < $rows; $i++) {
                for ($j = 0; $j < $columns; $j++) {
                    $result .= "{$original_matrix[$i][$j]} ";
                }
                $result .= "<br>";
            }

            return $result;
        }
    }