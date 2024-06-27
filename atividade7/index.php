<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <style>
        .hidden{
            display: none;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .message {
            margin-bottom: 10px;
        }
        .atendente {
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 5px;
        }
        .consumidor {
            background-color: #d9edf7;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<?php
    session_start();
    date_default_timezone_set('America/Sao_Paulo');
    if (!isset($_SESSION['mensagens'])) {
        $_SESSION['mensagens'] = [
            ['tipo' => 'Atendente', 'mensagem' => 'Olá! Em que posso ajudar?'],
            ['tipo' => 'Consumidor', 'mensagem' => 'Tenho uma dúvida sobre um produto.'],
            ['tipo' => 'Atendente', 'mensagem' => 'Claro! Qual é sua dúvida?']
        ];
    }
    if (isset($_POST['apagar'])) {
        $_POST['mensagem'] = '';
    }
    if(isset($_POST['enviar'])) {
        $mensagem = $_POST['msgConsumidor'] !== '' ? $_POST['msgConsumidor'] : $_POST['msgAtendente'];
        $tipo = $_POST['msgConsumidor']  !== '' ? 'Consumidor' : 'Atendente';
        $_SESSION['mensagens'][] = ['tipo' => $tipo, 'mensagem' => $mensagem];
    }
    if(isset($_POST['apagarTudo'])) {
        $_SESSION['mensagens'] = [];
    }
    if(isset($_POST['Salvar'])) {
        $file = 'chat.txt';
        $current = file_get_contents('./'.$file);
        $current .= PHP_EOL . PHP_EOL . 'Chat salvo às ' . date('H:i:s') . PHP_EOL . PHP_EOL;
        foreach ($_SESSION['mensagens'] as $mensagem) {
            $current .= $mensagem['tipo'] . ': ' . $mensagem['mensagem'] . PHP_EOL;
        }
        file_put_contents($file, $current);
    }
    if(isset($_POST['apagarUma'])) {
        $index = $_POST['index'];
        unset($_SESSION['mensagens'][$index]);
        $_SESSION['mensagens'] = array_values($_SESSION['mensagens']);
    }
?>
<body>
    <div class="container">
        <h1>Chat</h1>
        <div id="chat">
            <?php
            $mensagens = $_SESSION['mensagens'];
            for ($i = 0;$i < count($_SESSION['mensagens']); $i++) {
                if ($mensagens[$i]['tipo'] === 'Atendente') {
                    echo '<form method="POST" class="atendente message"><p>' . $mensagens[$i]['mensagem'] . '</p><input class="hidden" name="index" value="' . $i . '"><button name="apagarUma">Apagar</button></form>';
                } else {
                    echo '<form method="POST" class="consumidor message"><p>' . $mensagens[$i]['mensagem'] . '</p><input class="hidden" name="index" value="' . $i . '"><button name="apagarUma">Apagar</button></form>';
                }
            }
            ?>
        </div>
        <form method="post">
        
            <textarea name="msgConsumidor" rows="3" cols="50" placeholder="Input do Consumidor"></textarea><br>
            <textarea name="msgAtendente" rows="3" cols="50" placeholder="Input do Atendente"></textarea><br>
            <input type="submit" name="enviar" value="Enviar">
            <button name="apagar">Apagar</button>
            <br> <br>
            <button name="apagarTudo">Apagar todas as mensagens</button>
            <br><br>
            <button name="Salvar">Salvar Conversa</button>
        </form>
    </div>
</body>
</html>

