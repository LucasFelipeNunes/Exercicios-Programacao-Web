<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade 5</title>
    <!-- Alunos:    Luiz Gustavo Duarte Chagas,
                    Lucas Felipe da Silva Nunes, 
                    José Antônio de Carvalho Bueno Barreira Motta  -->
</head>
<body>
    <form method="POST" action="requestPrice.php">
        <label for="idade">Digite sua idade:</label> <br>
        <input type="number" name="idade" id="idade" required> <br>
        <label for="plano">Escolha um plano:</label> <br>
        <input type="radio" id="enfermaria" name="plano" value="1" required>
        <label for="enfermaria">Enfermaria</label><br>
        <input type="radio" id="apartamento" name="plano" value="2">
        <label for="apartamento">Apartamento</label><br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>