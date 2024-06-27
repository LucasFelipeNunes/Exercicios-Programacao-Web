<?php

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pesquisaAtivo'])) {
        Api::getAtivo($_GET['pesquisaAtivo']);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && !isset($_GET['pesquisaAtivo'])) {
        Api::getAtivos();
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        Api::cadastrar();
    }

    class Api{
        public static function getAtivos(){
            try{
                require_once('../db.php');
                $sql = "SELECT * FROM ati_ativos";
                
                if(isset($_GET['filtraAtivo'])){
                    $sql = $sql . " WHERE ati_ativo = '" . $_GET['filtraAtivo'] . "'";
                }
                $dados = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

                $json = json_encode($dados);
                header('Content-Type: application/json');
                echo $json;
            } catch(PDOException $erro){
                echo "{$erro}";
            }
        }
        public static function cadastrar(){
            $codigoNegociacao = $_POST['codigoNegociacao'];
            $ativo = $_POST['ativo'];
            $cotacao = $_POST['cotacao'];
            $pvp = $_POST['pVp'];
            $dividendYield = $_POST['dividendYield'];

            require_once('../db.php');

            $sql = "INSERT INTO ati_ativos VALUES (0, :codigoNegociacao, :cotacao, :ativo, :pVp, :dividendYield)";
            $stm = $db->prepare($sql);
            $stm->bindParam(':codigoNegociacao', $codigoNegociacao); // tipo do parâmetro é String
            $stm->bindParam(':cotacao', $cotacao);
            $stm->bindParam(':ativo', $ativo);
            $stm->bindParam(':pVp', $pvp);
            $stm->bindParam(':dividendYield', $dividendYield);
            $stm->execute();
            header('Location: ../tabela.php'); // redirecionar
        }
        public static function getAtivo($codigoNegociacao){
            try {
                require_once ('../db.php');
                $sql = "SELECT * FROM ati_ativos WHERE ati_codigo_negociacao LIKE '%" . $codigoNegociacao . "%'";
                $dados = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            
                $json = json_encode($dados);
                header('Content-Type: application/json');
                echo $json;
            } catch (PDOException $erro) {
                echo "{$erro}";
            }
        }
    }

    
    
    
    
?>