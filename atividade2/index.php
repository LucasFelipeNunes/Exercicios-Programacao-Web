<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecione</title>
</head>
<body>
    <?php $forma = ''?>
    <form action="#" method="post">
        <select name="forma" id="forma">
            <option value="quadrado">
                Quadrado
            </option>
            <option value="retangulo">
                Retangulo
            </option>
            <option value="paralelogramo">
                Paralelogramo
            </option>
            <option value="trapezio">
                Trapézio
            </option>
        </select>
        <button type="submit">Selecionar</button>
    </form>
    <?php
        if(isset($_POST['forma']) || $forma !== '') {
    ?>
        <form action="#" method="post">
            <?php
            $campos = array();
            $forma = $_POST['forma'];
            switch ($_POST['forma']) {
                case 'quadrado':
                    $campos = array('lado', 'quadrado');
                    break;
                case 'retangulo':
                    $campos = array('base', 'altura', 'retangulo');
                    break;
                case 'paralelogramo':
                    $campos = array('base', 'lado', 'paralelogramo');
                    break;
                case 'trapezio':
                    $campos = array('base-maior', 'base-menor', 'lado-esquerdo', 'lado-direito', 'trapezio');
                    break;
            }
            ?>
            <?php
                for($i = 0; $i < count($campos); $i++) {
                    if($i === count($campos) - 1) {
                        echo "<input type='hidden' name='forma' value='$forma'>";
                    } else {
                        ?>
                        <input type="number" name="<?= $campos[$i] ?>" placeholder="<?= $campos[$i] ?>" required><br>
                        <?php
                    }
                }
            ?>
            <input type="submit" name="Enviar"></input>
        </form>
        <?php
        if(isset($_POST['Enviar'])) {
            echo "<br>Perímetro: <br>";
            require_once 'calcularPerimetro.php';
            $calcularPerimetro = new CalcularPerimetro();
            switch ($_POST['forma']) {
                case 'quadrado':
                    echo $calcularPerimetro->areaQuadrado($_POST['lado']);
                    break;
                case 'retangulo':
                    echo $calcularPerimetro->areaRetangulo($_POST['altura'], $_POST['base']);
                    break;
                case 'paralelogramo':
                    echo $calcularPerimetro->areaParalelogramo($_POST['lado'], $_POST['base']);
                    break;
                case 'trapezio':
                    echo $calcularPerimetro->areaTrapezio($_POST['lado-esquerdo'], $_POST['base-menor'], $_POST['lado-direito'], $_POST['base-maior']);
                    break;
            }
        }
        }
    ?>
</body>
</html>