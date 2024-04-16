<?php
    if(isset($_POST['tempo_atendimento'])){
        $p1 = intval($_POST['tempo_atendimento']);
        $p2 = intval($_POST['educacao_vendedor']);
        $p3 = intval($_POST['clareza_informacoes']);
        $p4 = intval($_POST['instrucoes_entrega']);
        $p5 = intval($_POST['instrucoes_montagem']);
        $p6 = intval($_POST['atendimento_entregador']);
        $p7 = intval($_POST['conformidade_entrega']);
        $qtdPontos = $p1 + $p2 + $p3 + $p4 + $p5 + $p6 + $p7;
        $grauSatisfacao = ($qtdPontos <= 280) ? "Cliente totalmente insatisfeito com a empresa" : (($qtdPontos >= 420) ? "Cliente extremamente satisfeito" : "Cliente satisfeito com a empresa");
        echo "Pesquisa Encerrada!<br>" .$grauSatisfacao;
        $salvar = "Nome do cliente: " . $_POST['nome'] . "\nData da Pesquisa: " . $_POST['data'] . "\nTotal de pontos: " . $qtdPontos . "\nGrau de satisfacao: " . $grauSatisfacao;

        $arquivo = fopen('pesquisa_satisfacao.txt', 'w');
        fwrite($arquivo, $salvar);
        fclose($arquivo);
    }
?>