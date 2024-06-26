<?php 

$servename = "localhost";
$username = "root";
$password = "";
$dbname = "imobiliaria";
$conn = mysqli_connect($servename, $username, $password, $dbname);
if(!$conn){
    die("Erro ao conectar ao banco de dados: ". mysqli_connect_error());
}
$sql = "SELECT * FROM imoveis";
$resultados = mysqli_query($conn, $sql);
//array para armazenar as informações do banco
$usuarios = array();
if(mysqli_num_rows($resultados) > 0){
    while($linha = mysqli_fetch_assoc($resultados)){
        $usuarios[] = $linha;
    }
}
mysqli_close($conn);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <h1 class="titulo">Imobiliaria Club</h1>
    <?php include 'cabecalho.php'?>

    <h1>Lista de Imoveis</h1>
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>uf</th>
                    <th>cidade</th>
                    <th>bairro</th>
                    <th>tipoLogradouro</th>
                    <th>logradouro</th>
                    <th>numero</th>
                    <th>complemento</th>
                    <th>tipoImovel</th>
                    <th>aluguelVenda</th>
                    <th>preco</th>
                    <th>descricao</th>
                    <th>imagem</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if (mysqli_num_rows($resultados) > 0) {
                    while($row = mysqli_fetch_assoc($resultados)){
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['uf']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['cidade']) . "</td>";
                        echo "<td>" . ($row['aluguelVenda'] ? "Alugueç" : "Venda") . "</td>";
                        echo "<td><img src='" . htmlspecialchars($row['imagem']) . "' alt='Imagem do Imovel' width='100'></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan = '4'> Nenhum Imovel encontrado</td></tr>";
                }
                        ?>

            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
