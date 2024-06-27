<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulário de Financiamento</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header text-center">
            <h1>Formulário de Financiamento</h1>
          </div>
          <div class="card-body">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
              <div class="form-group p-2">
                <label for="valor">Digite o valor a ser financiado:</label>
                <input name="valor" id="valor" type="number" class="form-control" placeholder="Valor financiado">
              </div>
              <div class="form-group p-2">
                <label for="qtdParcelas">Digite a quantidade de parcelas:</label>
                <input name="qtdParcelas" id="qtdParcelas" type="number" class="form-control" placeholder="Quantidade de parcelas">
              </div>
              <div class="form-group p-2">
                <label for="taxaJuros">Digite a taxa de juros ao mês:</label>
                <div class="input-group">
                  <input name="taxaJuros" id="taxaJuros" type="number" class="form-control" placeholder="Taxa de juros">
                  <div class="input-group-append">
                    <span class="input-group-text">%</span>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn ms-2 mt-2 btn-primary">Enviar</button>
              <button type="reset" class="btn mt-2 btn-secondary">Cancelar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
	<div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
					<div class="card-title text-center">
						<h2>Valores Totais</h2>
					</div>
				<?php
					if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['valor']) && isset($_POST['qtdParcelas']) && isset($_POST['taxaJuros']) && is_numeric($_POST['valor']) && is_numeric($_POST['qtdParcelas']) && is_numeric($_POST['valor'])){
						$valor = $_POST['valor'];
						$qtdParcelas = $_POST['qtdParcelas'];
						$taxaJuros = $_POST['taxaJuros'] / 100;
						for($i = 0;$i < $qtdParcelas;$i++){
							$valor += $valor * $taxaJuros;
						}
						$total = number_format($valor, 2, ',', '.');
						$valorParcelado = number_format($valor / $qtdParcelas, 2, ',', '.');
						echo "<p><strong>Valor total do financiamento: </strong>R$ $total</p>";
						echo "<p><strong>Valor de cada parcela: </strong> R$ $valorParcelado</p>";
					}
				?>
				</div>
			</div>
		</div>
	</div>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>