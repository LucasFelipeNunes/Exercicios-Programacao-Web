<?php
    $filename = "bandas-rock-anos-70.txt";

    $dados = file($filename, FILE_IGNORE_NEW_LINES);

    header('Content-Type: application/json');
    $json=json_encode($dados);

    echo "<pre>";
    echo $json;
    echo "</pre>";
?>