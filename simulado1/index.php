<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulado</title>
</head>
<body>
    <form method="POST" action="recebe.php">
        <label for="codigoBarras">Digite o código de barras:</label>
        <input type="number" name="codigoBarras" min="1000000000000" max="9999999999999" id="codigoBarras">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>