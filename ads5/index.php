<?php
    try{
        $url = "http://localhost/ads5/api-bandas-rock.php";
        $response = file_get_contents($url);
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
?>