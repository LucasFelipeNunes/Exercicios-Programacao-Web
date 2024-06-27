<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="controller.php" method="post">
        <div>
            <label for="nome">Nome</label> <br>
            <input type="text" id="nome" name="nome"> <br> <br>
        </div>
        <div>
            <label for="disciplina">Disciplina</label> <br>
            <input type="text" id="disciplina" name="disciplina"> <br> <br>
        </div>
        <div>
            <label for="nota1">Nota da Avaliação 1</label> <br>
            <input type="number" step="any" min="0" max="10" id="nota1" name="nota1"> <br> <br>
        </div>
        <div>
            <label for="nota1">Nota da Avaliação 2</label> <br>
            <input type="number" step="any" min="0" max="10" id="nota2" name="nota2"> <br> <br>
        </div>
        <div>
            <label for="nota1">Nota da Avaliação 3</label> <br>
            <input type="number" step="any" min="0" max="10" id="nota3" name="nota3"> <br> <br>
        </div>
        <button type="submit">Calcular Média</button> <br>
    </form>
    <div>
    <?php
        if(isset($media)){
            if($media == -1){
                echo "<br>Erro ao Calcular Média";
            } else{
                echo '<br><b>RESULTADO</b><br><b>Aluno: </b>' . $nome . '<br><b>Disciplina: </b>' . $disciplina . '<br><b>Média: </b>' . number_format($media, 2);
            }
        } 
    ?>
    </div>
</body>
</html>