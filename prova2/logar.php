<?php
// iniciar sessão
session_start();

// criando um usuario local

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    require_once('db.php');

    $sql = "SELECT * FROM usu_usuarios WHERE usu_nome = :usuario AND usu_senha = :senha";
    $stm = $db->prepare($sql);
    $stm->bindParam(':usuario', $username, PDO::PARAM_STR); // tipo do parâmetro é String
    $stm->bindParam(':senha', hash('sha512', $password), PDO::PARAM_STR);
    $stm->execute();
    $resultado = $stm->fetch(PDO::FETCH_ASSOC);
    if($resultado>0){
        // Autenticação bem-sucedida
        $_SESSION['user_id'] = $resultado['usu_id']; // armazenar o usuario na sessao
        header('Location: tabela.php'); // redirecionar
        exit;
    } else {
        header('Location: index.php');
    }
}
?>