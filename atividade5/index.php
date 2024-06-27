<?php
    try{
        $url = "http://localhost/exercicios-programacao-web/atividade5/api-bandas-rock.php";
        $response = file_get_contents($url);
        echo "Bandas encontradas:" . $response;
    }
    catch(Exception $e){
        echo $e->getMessage();
    }