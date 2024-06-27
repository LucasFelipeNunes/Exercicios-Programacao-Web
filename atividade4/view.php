<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio 4</title>
</head>
<body>
    <div>
        <div>
            <h1>Simulador para Controle de Estacionamento</h1>
        </div>
        <form method="POST" action="controller.php">
            <label for="qtdVagas">Quantidade de Vagas</label> <br>
            <input type="text" name="qtdVagas" id="qtdVagas"> <br>
            <button type="submit" name="btnVagas">Registrar</button> <br><br>
        </form> <br>
	<form method="POST" action="controller.php">
            <label for="placa">Placa</label> <br>
            <input type="text" name="placa" id="placa"> <br>
            <label for="hora">Hora</label> <br>
            <input type="text" name="hora" id="hora"> <br>
            <input type="text" hidden name="vagas" id="vagas"> <br>
            <button type="submit" name="btnEntrada">Entrada</button>
            <button type="submit" name="btnSaida">Saida</button> <br><br>
	</form>
	<h2>Registros no Banco</h2>
	<p>Placa | Entrada | Saída | Total</p>
	<?php
            require_once('model.php');
            Carro::selecionarRegistros();
	?>
</body>
</html>