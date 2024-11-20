<header>
    <h3>Contatos</h3>
</header>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
}

h3 {
    text-align: center;
}

.novo-contato, .pesquisa {
    text-align: center;
    margin: 20px 0;
}

.novo-contato a, .pesquisa input[type="submit"] {
    text-decoration: none;
    background-color: #007BFF;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.novo-contato a:hover, .pesquisa input[type="submit"]:hover {
    background-color: #0056b3;
}

.pesquisa input[type="text"] {
    padding: 10px;
    width: 300px;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-right: 10px;
}

.tabela-contatos {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
}

.tabela-contatos th, .tabela-contatos td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
}

.tabela-contatos th {
    background-color: #f4f4f4;
    font-weight: bold;
}

.tabela-contatos tr:nth-child(even) {
    background-color: #f9f9f9;
}

.tabela-contatos tr:hover {
    background-color: #f1f1f1;
}

.paginacao {
    text-align: center;
    margin: 20px 0;
}

.paginacao a {
    margin: 0 5px;
    text-decoration: none;
    color: #007BFF;
}

.paginacao a:hover {
    text-decoration: underline;
}

.pagina-atual {
    font-weight: bold;
    color: #333;
}

</style>
<div class="novo-contato">
    <a href="index.php?menuop=cad-contato">Novo Contato</a>
</div>

<div class="pesquisa">
    <form action="index.php?menuop=contatos" method="POST">
        <input type="text" name="txt_pesquisa" placeholder="Pesquisar contato...">
        <input type="submit" value="Pesquisar">
    </form>
</div>

<table class="tabela-contatos">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Sexo</th>
            <th>Data de Nasc.</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $quantidade = 10;
        $pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
        $inicio = ($quantidade * $pagina) - $quantidade;
        $txt_pesquisa = (isset($_POST["txt_pesquisa"])) ? $_POST["txt_pesquisa"] : "";

        $sql = "SELECT
            idContato,
            upper(nomeContato) AS nomeContato,
            lower(emailContato) AS emailContato,
            telefoneContato,
            upper(enderecoContato) AS enderecoContato,
            CASE
                WHEN sexoContato = 'F' THEN 'FEMININO'
                WHEN sexoContato = 'M' THEN 'MASCULINO'
                ELSE 'NÃO ESPECIFICADO'
            END AS sexoContato,
            DATE_FORMAT(dataNascContato, '%d/%m/%Y') AS dataNascContato
        FROM tbcontatos
        WHERE idContato='{$txt_pesquisa}' OR nomeContato LIKE '%{$txt_pesquisa}%'
        ORDER BY nomeContato ASC
        LIMIT $inicio, $quantidade";

        $rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta! " . mysqli_error($conexao));
        while ($dados = mysqli_fetch_assoc($rs)) {
        ?>
        <tr>
            <td><?= $dados["idContato"] ?></td>
            <td><?= $dados["nomeContato"] ?></td>
            <td><?= $dados["emailContato"] ?></td>
            <td><?= $dados["telefoneContato"] ?></td>
            <td><?= $dados["enderecoContato"] ?></td>
            <td><?= $dados["sexoContato"] ?></td>
            <td><?= $dados["dataNascContato"] ?></td>
            <td><a href="index.php?menuop=editar-contato&idcontato=<?= $dados["idContato"] ?>">Editar</a></td>
            <td><a href="index.php?menuop=excluir-contato&idcontato=<?= $dados["idContato"] ?>">Excluir</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<br>

<div class="paginacao">
    <?php
    $sqltotal = "SELECT idContato FROM tbcontatos";
    $qrtotal = mysqli_query($conexao, $sqltotal) or die(mysqli_error($conexao));
    $numtotal = mysqli_num_rows($qrtotal);
    $totalpagina = ceil($numtotal / $quantidade);

    echo "Total de registros: $numtotal <br>";
    echo '<a href="?menuop=contatos&pagina=1">Primeira página</a> ';

    if ($pagina > 6) {
        echo '<a href="?menuop=contatos&pagina=' . ($pagina - 1) . '"> << </a>';
    }

    for ($i = 1; $i <= $totalpagina; $i++) {
        if ($i >= ($pagina - 5) && $i <= ($pagina + 5)) {
            if ($i == $pagina) {
                echo "<span class='pagina-atual'>$i</span> ";
            } else {
                echo "<a href=\"?menuop=contatos&pagina=$i\">$i</a> ";
            }
        }
    }

    if ($pagina < ($totalpagina - 5)) {
        echo '<a href="?menuop=contatos&pagina=' . ($pagina + 1) . '"> >> </a>';
    }

    echo "<a href=\"?menuop=contatos&pagina=$totalpagina\">Última página</a>";
    ?>
</div>
