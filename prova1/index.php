<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prova #1</title>
    <style>
        .hidden{
            display: none;
        }
    </style>
</head>
<body>
<h1>Pesquisa de Satisfação</h1>
<form action="controller.php" method="post">
    <div id="desejaResponder">
        <p>Deseja responder a pesquisa?</p>
        <select id="simNao" name="simNao" required>
            <option value="Nao">Não</option>
            <option value="Sim">Sim</option>
        </select><br/><br/>
        <button onclick="proximaQuestao('desejaResponder', 'nomeData')">Proximo</button>
    </div>
    
    <div id="nomeData" class="hidden">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome"><br><br>
        
        <label for="data">Data de Nascimento:</label><br>
        <input type="date" id="data" name="data"><br><br>
        
        <select class="hidden" name="proximo" id="proximo"><option value="a" ></option></select>
        <button onclick="proximaQuestao('nomeData', 'questao1')">Proximo</button>
    </div>
    <div id="questao1" class="hidden">
        <p>Avalie seu nível de satisfação com a empresa quanto aos seguintes aspectos:</p>

        <label for="tempo_atendimento">a) Tempo de Atendimento:</label>
        <select id="tempo_atendimento" name="tempo_atendimento" required>
            <option value="">Selecione uma opção</option>
            <option value="0">Ruim</option>
            <option value="40">Regular</option>
            <option value="60">Bom</option>
            <option value="80">Muito Bom</option>
            <option value="100">Ótimo</option>
        </select>
        <br><br>
        <button onclick="proximaQuestao('questao1', 'questao2')">Próxima Pergunta</button>
    </div>
        
    <div id="questao2" class="hidden">

        <label for="educacao_vendedor">b) Educação do Vendedor:</label>
        <select id="educacao_vendedor" name="educacao_vendedor" required>
            <option value="">Selecione uma opção</option>
            <option value="0">Ruim</option>
            <option value="40">Regular</option>
            <option value="60">Bom</option>
            <option value="80">Muito Bom</option>
            <option value="100">Ótimo</option>
        </select>
        <br><br>
        <button onclick="proximaQuestao('questao2', 'questao3')">Próxima Pergunta</button>
        
    </div>
        <div id="questao3" class="hidden">

        <label for="clareza_informacoes">c) Clareza das Informações Prestadas:</label>
        <select id="clareza_informacoes" name="clareza_informacoes" required>
            <option value="">Selecione uma opção</option>
            <option value="0">Ruim</option>
            <option value="40">Regular</option>
            <option value="60">Bom</option>
            <option value="80">Muito Bom</option>
            <option value="100">Ótimo</option>
        </select>
        <br><br>
        <button onclick="proximaQuestao('questao3', 'questao4')">Próxima Pergunta</button>
        
    </div>
        <div id="questao4" class="hidden">

        <label for="instrucoes_entrega">d) Instruções Claras e Corretas sobre a Entrega:</label>
        <select id="instrucoes_entrega" name="instrucoes_entrega" required>
            <option value="">Selecione uma opção</option>
            <option value="0">Ruim</option>
            <option value="40">Regular</option>
            <option value="60">Bom</option>
            <option value="80">Muito Bom</option>
            <option value="100">Ótimo</option>
        </select>
        <br><br>
        <button onclick="proximaQuestao('questao4', 'questao5')">Próxima Pergunta</button>
        
    </div>
        <div id="questao5" class="hidden">

        <label for="instrucoes_montagem">e) Instruções Claras e Corretas sobre a Montagem:</label>
        <select id="instrucoes_montagem" name="instrucoes_montagem" required>
            <option value="">Selecione uma opção</option>
            <option value="0">Ruim</option>
            <option value="40">Regular</option>
            <option value="60">Bom</option>
            <option value="80">Muito Bom</option>
            <option value="100">Ótimo</option>
        </select>
        <br><br>
        <button onclick="proximaQuestao('questao5', 'questao6')">Próxima Pergunta</button>
        
    </div>
        <div id="questao6" class="hidden">

        <label for="atendimento_entregador">f) Atendimento do Entregador:</label>
        <select id="atendimento_entregador" name="atendimento_entregador" required>
            <option value="">Selecione uma opção</option>
            <option value="0">Ruim</option>
            <option value="40">Regular</option>
            <option value="60">Bom</option>
            <option value="80">Muito Bom</option>
            <option value="100">Ótimo</option>
        </select>
        <br><br>
        <button onclick="proximaQuestao('questao6', 'questao7')">Próxima Pergunta</button>
        
    </div>
        <div id="questao7" class="hidden">

        <label for="conformidade_entrega">g) Conformidade da Entrega:</label>
        <select id="conformidade_entrega" name="conformidade_entrega" required>
            <option value="">Selecione uma opção</option>
            <option value="0">Ruim</option>
            <option value="40">Regular</option>
            <option value="60">Bom</option>
            <option value="80">Muito Bom</option>
            <option value="100">Ótimo</option>
        </select>
        <br><br>
        
        <button type="submit" value="Enviar">Enviar</button>
    </div>
</form>

<script>
    function proximaQuestao(idAtual, idProxima) {
        let atual = document.getElementById(idAtual);
        let proxima = document.getElementById(idProxima);
        let select = atual.querySelector('select');
        if (select.value !== "" && select.value != 'Nao') {
            proxima.classList.remove("hidden");
        } else {
            if(select.value !== "Nao"){
                alert("Por favor, responda a pergunta antes de avançar.");
            } else{
                window.location.href = "no-answer.html";
            }
        }
    }
</script>
</body>
</html>