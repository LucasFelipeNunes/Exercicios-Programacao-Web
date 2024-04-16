<?php
class Carro {
    public static function registrarQtdVagas($qtdVagas) {
        try {
            $conecta = new PDO("mysql:host=127.0.0.1;port=3307;dbname=carros", "root", "");
            $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $textoQuery = "SELECT COUNT(*) AS total FROM qtdVagas";
            $prepara = $conecta->prepare($textoQuery);
            $prepara->execute();
            $resultado = $prepara->fetch(PDO::FETCH_ASSOC);
            if($resultado['total'] == 1) {
                $textoUpdate = "UPDATE qtdVagas SET qtdVagas = :qtdVagas";
                $prepara = $conecta->prepare($textoUpdate);
                $prepara->bindParam(':qtdVagas', $qtdVagas);
                $prepara->execute();
            } else if($resultado['total'] == 0) {
                $textoInsert = "INSERT INTO qtdVagas (qtdVagas) VALUE (:qtdVagas)";
                $prepara = $conecta->prepare($textoInsert);
                $prepara->bindParam(':qtdVagas', $qtdVagas);
                $prepara->execute();
            }
        } catch(PDOException $erro) {
            echo "Registro de Quantidade de Vagas mal-sucedido. Erro: " . $erro->getMessage();
        }
    }

    public static function registrarEntrada($placa, $horaEntrada) {
        try {
            $conecta = new PDO("mysql:host=127.0.0.1;port=3307;dbname=carros", "root", "");
            $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $consultaContagem = $conecta->query("SELECT COUNT(*) AS total FROM carros WHERE horaSaida IS NULL");
            $contagem = $consultaContagem->fetch(PDO::FETCH_ASSOC);
            $totalRegistros = $contagem['total'];

            $consultaVagas = $conecta->query("SELECT qtdVagas AS qtdVagas FROM qtdVagas WHERE id = 1");
            $contagemVagas = $consultaVagas->fetch(PDO::FETCH_ASSOC);
            $qtdVagas = $contagemVagas['qtdVagas'];

            if ($totalRegistros >= $qtdVagas) {
                echo 'Quantidade máxima de veículos atingida';
            } else {
                $consultaPlaca = $conecta->prepare("SELECT COUNT(*) AS total FROM carros WHERE placa = :placa");
                $consultaPlaca->bindParam(':placa', $placa);
                $consultaPlaca->execute();
                $resultado = $consultaPlaca->fetch(PDO::FETCH_ASSOC);

                if ($resultado['total'] > 0) {
                    echo "A placa já existe na tabela.";
                    return;
                }

                $texto = "INSERT INTO carros (placa, horaEntrada, horaSaida, total) VALUES (:placa, :horaEntrada, NULL, NULL)";
                $stmt = $conecta->prepare($texto);
                $stmt->bindParam(':placa', $placa);
                $stmt->bindParam(':horaEntrada', $horaEntrada);
                $stmt->execute();
            }
        } catch(PDOException $erro) {
            echo "Registro de entrada mal-sucedido. Erro: " . $erro->getMessage();
        }
    }

    public static function registrarSaida($placa, $horaSaida, $total) {
        try {
            $conecta = new PDO("mysql:host=127.0.0.1;port=3307;dbname=carros", "root", "");
            $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $texto = "UPDATE carros SET horaSaida = :horaSaida, total = :total WHERE placa = :placa";
            $stmt = $conecta->prepare($texto);
            $stmt->bindParam(':placa', $placa);
            $stmt->bindParam(':horaSaida', $horaSaida);
            $stmt->bindParam(':total', $total);
            $stmt->execute();
        } catch(PDOException $erro) {
            echo "Registro de saída mal-sucedido. Erro: " . $erro->getMessage();
        }
    }

    public static function calcularTotal($horaEntrada, $horaSaida) {
        return $horaSaida - $horaEntrada;
    }

    public static function encontrarEntrada($placa) {
        try {
            $conecta = new PDO("mysql:host=127.0.0.1;port=3307;dbname=carros", "root", "");
            $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $texto = "SELECT horaEntrada FROM carros WHERE placa = :placa";
            $stmt = $conecta->prepare($texto);
            $stmt->bindParam(':placa', $placa);
            $stmt->execute();
            $linha = $stmt->fetch(PDO::FETCH_ASSOC);
            return $linha["horaEntrada"];
        } catch(PDOException $erro) {
            echo "Erro ao encontrar entrada. Erro: " . $erro->getMessage();
            return null;
        }
    }
    public static function selecionarRegistros() {
        try {
            $conecta = new PDO("mysql:host=127.0.0.1;port=3307;dbname=carros", "root", "");
            $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $texto = "SELECT * FROM carros";
            $resultado = $conecta->query($texto);
            if ($resultado->rowCount() > 0) {
                while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    echo $linha["placa"] . " | " . $linha["horaEntrada"] . " | " . $linha["horaSaida"] . " | " . $linha["total"] . "<br>";
                }
            }
        } catch(PDOException $erro) {
            echo "Erro ao selecionar registros. Erro: " . $erro->getMessage();
        }
    }
}
?>
