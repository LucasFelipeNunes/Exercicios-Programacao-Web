<?php
require_once('model.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnVagas'])) {
	$qtdVagas = $_POST['qtdVagas'];
	Carro::registrarQtdVagas($qtdVagas);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnEntrada'])) {
    	$placa = $_POST['placa'];
    	$horaEntrada = $_POST['hora'];
    	Carro::registrarEntrada($placa, $horaEntrada);
} else if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnSaida'])) {
    $placa = $_POST['placa'];
    $horaEntrada = Carro::encontrarEntrada($placa);
    if ($horaEntrada == null) {
        echo "Carro nao registrado";
    } else {
        $horaSaida = $_POST['hora'];
        $total = Carro::calcularTotal($horaEntrada, $horaSaida);
        Carro::registrarSaida($placa, $horaSaida, $total);
    }
}
include "view.php";
?>

