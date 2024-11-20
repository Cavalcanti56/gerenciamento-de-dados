<header>
    <h3>Contatos</h3>
</header>

<div class="novo-contato">
    <a href="index.php?menuop=cad-contato">Novo Contato</a>
</div>

<div class="pesquisa">
    <form action="index.php?menuop=contatos" method="POST">
        <input type="text" name="txt_pesquisa" placeholder="Pesquisar contato...">
        <input type="submit" value="Pesquisar">
    </form>
</div>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
}

h3 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
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
    border-collapse: separate;
    border-spacing: 0;
    margin: 20px 0;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.tabela-contatos th {
    background-color: #007BFF;
    color: white;
    padding: 15px;
    text-align: left;
    font-size: 14px;
    position: sticky;
    top: 0;
    z-index: 1;
}

.tabela-contatos td {
    padding: 12px;
    font-size: 13px;
    color: #333;
    background-color: #f9f9f9;
    border-bottom: 1px solid #ddd;
    vertical-align: middle;
}

.tabela-contatos tr:nth-child(even) td {
    background-color: #f3f3f3;
}

.tabela-contatos tr:hover td {
    background-color: #e9f5ff;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.tabela-contatos a {
    text-decoration: none;
    padding: 8px 12px;
    border-radius: 4px;
    background-color: #28a745;
    color: white;
    font-size: 12px;
    transition: background-color 0.3s ease;
}

.tabela-contatos a:hover {
    background-color: #218838;
}

.tabela-contatos .btn-excluir {
    background-color: #dc3545;
}

.tabela-contatos .btn-excluir:hover {
    background-color: #c82333;
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
        $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
        $inicio = ($quantidade * $pagina) - $quantidade;
        $txt_pesquisa = isset($_POST["txt_pesquisa"]) ? $_POST["txt_pesquisa"] : "";

        $sql = "SELECT
            idContato,
            UPPER(nomeContato) AS nomeContato,
            LOWER(emailContato) AS emailContato,
            telefoneContato,
            UPPER(enderecoContato) AS enderecoContato,
            CASE
                WHEN sexoContato = 'F' THEN 'Feminino'
                WHEN sexoContato = 'M' THEN 'Masculino'
                ELSE 'Não Especificado'
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

<div class="paginacao">
    <?php
    $sqltotal = "SELECT idContato FROM tbcontatos";
    $qrtotal = mysqli_query($conexao, $sqltotal) or die(mysqli_error($conexao));
    $numtotal = mysqli_num_rows($qrtotal);
    $totalpagina = ceil($numtotal / $quantidade);

    echo "<p>Total de registros: $numtotal</p>";
    echo '<a href="?menuop=contatos&pagina=1">Primeira página</a>';

    if ($pagina > 6) {
        echo '<a href="?menuop=contatos&pagina=' . ($pagina - 1) . '"> << </a>';
    }

    for ($i = 1; $i <= $totalpagina; $i++) {
        if ($i >= ($pagina - 5) && $i <= ($pagina + 5)) {
            if ($i == $pagina) {
                echo "<span class='pagina-atual'>$i</span>";
            } else {
                echo "<a href=\"?menuop=contatos&pagina=$i\">$i</a>";
            }
        }
    }

    if ($pagina < ($totalpagina - 5)) {
        echo '<a href="?menuop=contatos&pagina=' . ($pagina + 1) . '"> >> </a>';
    }

    echo "<a href=\"?menuop=contatos&pagina=$totalpagina\">Última página</a>";
    ?>
</div>
