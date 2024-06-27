<?php
// iniciar sessão
session_start();

// criando um usuario local

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    require_once('db.php');

    $sql = "INSERT INTO usu_usuarios VALUES (0, :usuario, :senha)";
    $stm = $db->prepare($sql);
    $stm->bindParam(':usuario', $username, PDO::PARAM_STR); // tipo do parâmetro é String
    $stm->bindParam(':senha', hash('sha512', $password) , PDO::PARAM_STR);
    $stm->execute();
    $resultado = $stm->fetch(PDO::FETCH_ASSOC);
    if($resultado>0){
        header('Location: index.php'); // redirecionar
        exit;
    } else {
        header('Location: index.php');
    }
}
?>