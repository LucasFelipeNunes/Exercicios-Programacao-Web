<!-- index.php -->
<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="./src/output.css">

    <title>Login</title>
</head>

<body>
    <section class="">
        <div class="container">
            <a href="sair.php">
            <button class="bg-blue-400 hover:bg-blue-600 p-2 text-white">sair</button>
            </a>
        </div>
        <form action="api/ativos.php" method="post">
            <div class="grid grid-cols-6 p-5 gap-5">
                <div>
                    <label for="codigoNegociacao" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Código Negociação</label>
                    <input type="text" name="codigoNegociacao" placeholder="Código Negociação" max-length="10"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="name@company.com" required="">
                </div>
                <div>
                    <label for="ativo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ativo</label>
                    <select name="ativo" id="ativo"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="Ação">Ação</option>
                        <option value="FII">FII</option>
                    </select>
                </div>
                <div>
                    <label for="cotacao" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">cotacao</label>
                    <input type="number" step="0.01" name="cotacao" placeholder="cotacao"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="name@company.com" required="">
                </div>
                <div>
                    <label for="pVp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">pVp</label>
                    <input type="number" step="0.01" name="pVp" placeholder="pVp"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="name@company.com" required="">
                </div>
                <div>
                    <label for="dividendYield" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">dividendYield</label>
                    <input type="number" step="0.01" name="dividendYield" placeholder="dividendYield"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="name@company.com" required="">
                </div>
                <div class="flex justify-center items-center">
                    <button type="submit" class="bg-blue-400 hover:bg-blue-600 p-2 text-white">Enviar</button>
                </div>
            </div>
        </form>

        <form method="get" action="exibirAtivo.php">
           
            <div class="mb-5">
                <label for="filtrar" class="block mb-2 text-sm font-medium text-gray-900">Filtrar Ativos</label>
                <div>
                    <input type="radio" name="filtraAtivo" id="Ação" value="Ação">Ação</input>
                    <input type="radio" name="filtraAtivo" id="FII" value="FII">FII</input>
                </div>
            </div>
            <button class="bg-blue-400 hover:bg-blue-600 p-2 text-white mt-2 w-fit" type="submit">Buscar</button>

        </form>

        
        
        <div class="container mx-auto h-screen my-10 overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Codigo de Negociacão
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Ativo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Cotação
                        </th>
                        <th scope="col" class="px-6 py-3">
                            P/VP
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Dividendos
                        </th>
                    </tr>
                    
                </thead>
                <tbody>
                <?php
                        
                        $link = "http://localhost/prova/api/ativos.php?" . $_SERVER['QUERY_STRING'];
                        $json = file_get_contents($link);
                        $resultados = json_decode($json);
                        foreach ($resultados as $resultado) {
                    ?>
                    <tr>
                    <td scope="col" class="px-6 py-3">
                                <?= $resultado->ati_codigo_negociacao; ?>
                            </td>
                            <td scope="col" class="px-6 py-3">
                                <?= $resultado->ati_ativo; ?>
                            </td>
                            <td scope="col" class="px-6 py-3">
                                <?= "R$ " . number_format($resultado->ati_cotacao, 2, ',', '.'); ?>
                            </td>
                            <td scope="col" class="px-6 py-3">
                                <?= number_format($resultado->ati_p_vp, 2, ',', '.'); ?>
                            </td>
                            <td scope="col" class="px-6 py-3">
                                <?= number_format($resultado->ati_dividend_yield, 2, ',', '.') . "%"; ?>
                            </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
    
    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>