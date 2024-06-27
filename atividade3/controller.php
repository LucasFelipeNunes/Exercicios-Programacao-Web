<?php
    require_once('model.php');
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $nome = $_POST['nome'];
        $disciplina = $_POST['disciplina'];
        $nota1 = $_POST['nota1'];
        $nota2 = $_POST['nota2'];
        $nota3 = $_POST['nota3'];
        if($nota1 != "" && $nota2 != "" && $nota3 != ""){
            $media = Media::calcular($nota1, $nota2, $nota3);
        } else{
            $media=-1;
        }
    }
    include "view.php";
?>