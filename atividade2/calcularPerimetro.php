<?php
    class CalcularPerimetro{
        function __constructor(){

        }
        public function areaRetangulo($altura, $base){
            return 2 * ($base + $altura);
        }
        public function areaQuadrado($lado){
            return 4 * $lado;
        }
        public function areaParalelogramo($lado, $base){
            return 2 * ($base + $lado);
        }
        public function areaTrapezio($ladoEsquerdo, $baseMenor, $ladoDireito, $baseMaior){
            return $baseMaior + $baseMenor + $ladoEsquerdo + $ladoDireito;
        }
    }