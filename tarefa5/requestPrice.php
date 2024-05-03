<?php

    /* Alunos:  Luiz Gustavo Duarte Chagas, 
                Lucas Felipe da Silva Nunes, 
                José Antônio de Carvalho Bueno Barreira Motta*/ 

    $idade = (int) $_POST["idade"];

    $plano = (int) $_POST["plano"];
    
    function generatePrice($idade, $plano) {
        $ENFERMARIA = 1;
        switch ($idade) {
            case $idade < 19:
                return $plano == $ENFERMARIA ? 193.00 : 283.00;
                break;
            case $idade < 24:
                return $plano == $ENFERMARIA ? 221.00 : 325.00;
                break;
            case $idade < 29:
                return $plano == $ENFERMARIA ? 255.00 : 373.00;
                break;
            case $idade < 39:
                return $plano == $ENFERMARIA ? 337.00 : 494.00;
                break;
            case $idade < 54:
                return $plano == $ENFERMARIA ? 616.00 : 902.00;
                break;
            default:
                return $plano == $ENFERMARIA ? 800.00 : 1200.00;
                break;
        }
    }

    $response = array(
        'idade' => $idade,
        'plano' => $plano == 1 ? "enfermaria" : "apartamento" ,
        'preco' => generatePrice($idade, $plano)
    );
    
    Header( "Content-type: application/json" );
    echo(json_encode($response));
    
?>