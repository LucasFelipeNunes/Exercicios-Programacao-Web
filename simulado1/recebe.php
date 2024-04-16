<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $codigoBarras = (string)$_POST['codigoBarras'];
        $ultimoDigito = $codigoBarras[12];
        $soma = 0;
        for ($i = 0; $i < 12; $i++) { 
            $soma += (int)$codigoBarras[$i] * (($i % 2 != 0) ? 3 : 1);
        }
        if((floor($soma / 10) + 1) * 10 - $soma != $ultimoDigito){
            echo "Recusado";
        }else{
            echo "OK";
        }
    }
    include "index.php";
?>