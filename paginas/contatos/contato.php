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
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    padding: 10px;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 5px;
    justify-content: center;
    align-items: center;
    font-family: Arial, sans-serif;
}

.paginacao p {
    margin: 0;
    font-size: 14px;
    color: #333;
}

.link-paginacao {
    text-decoration: none;
    color: #007bff;
    padding: 5px 10px;
    border: 1px solid #007bff;
    border-radius: 3px;
    transition: background-color 0.3s, color 0.3s;
}

.link-paginacao:hover {
    background-color: #007bff;
    color: #fff;
}

.pagina-atual {
    font-weight: bold;
    color: #fff;
    background-color: #007bff;
    padding: 5px 10px;
    border-radius: 3px;
    border: 1px solid #007bff;
}


</style>

<table class="tabela-contatos">
    <thead>
        <tr>
            
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

        $txt_pesquisa = (isset($_POST["txt_pesquisa"])) ? $_POST["txt_pesquisa"] : "";

        $sql = "SELECT 
            idContato,
            upper(nomeContato) AS nomeContato,
            lower(emailContato) AS emailContato,
            telefoneContato,
            upper(enderecoContato) AS enderecoContato,
            CASE
                WHEN sexoContato='F' THEN 'FEMININO'
                WHEN sexoContato='M' THEN 'MASCULINO'
            ELSE
                'NÃO ESPECIFICADO'
            END AS sexoContato,
            DATE_FORMAT(dataNascContato, '%d/%m/%Y') AS dataNascContato
            FROM tbcontatos 
            WHERE
            idContato='{$txt_pesquisa}' or
            nomeContato LIKE '%{$txt_pesquisa}%' 
            LIMIT $inicio, $quantidade
            ";

        $rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta! " . mysqli_error($conexao));
        while ($dados = mysqli_fetch_assoc($rs)) {
        ?>
        <tr>
            
            <td><?= $dados["nomeContato"] ?></td>
            <td><?= $dados["emailContato"] ?></td>
            <td><?= $dados["telefoneContato"] ?></td>
            <td><?= $dados["enderecoContato"] ?></td>
            <td><?= $dados["sexoContato"] ?></td>
            <td><?= $dados["dataNascContato"] ?></td>
            <td><a href="index.php?menuop=editar-contato&idContato=<?= $dados['idContato'] ?>">Editar</a></td>
            <td><a href="index.php?menuop=excluir-contato&idContato=<?= $dados["idContato"] ?>">Excluir</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<div class="paginacao">
    <?php
    // Consulta total de contatos
    $quantidade = 10;
    $pagina = ( isset($_GET['pagina']) ) ?(int)$_GET['pagina']:1;
    $inicio = ($quantidade * $pagina) - $quantidade;

    $sqltotal = "SELECT idContato FROM tbcontatos";
    $qrtotal = mysqli_query($conexao, $sqltotal) or die(mysqli_error($conexao));
    $numtotal = mysqli_num_rows($qrtotal);
    $totalpagina = ceil($numtotal / $quantidade);

    // Exibir total de contatos
    echo "<p>Total de contatos: <strong>$numtotal</strong></p>";

    // Link para a primeira página
    echo '<a href="?menuop=contatos&pagina=1" class="link-paginacao">Primeira página</a>';

    // Botão "anterior" caso esteja além da página 6
    if ($pagina > 6) {
        echo '<a href="?menuop=contatos&pagina=' . ($pagina - 1) . '" class="link-paginacao"><<</a>';
    }

    // Gerar os números das páginas com limite de ±5 páginas em relação à atual
    for ($i = 1; $i <= $totalpagina; $i++) {
        if ($i >= ($pagina - 5) && $i <= ($pagina + 5)) {
            if ($i == $pagina) {
                echo "<span class='pagina-atual'>$i</span>";
            } else {
                echo "<a href=\"?menuop=contatos&pagina=$i\" class=\"link-paginacao\">$i</a>";
            }
        }
    }

    // Botão "próximo" caso haja mais de 5 páginas restantes
    if ($pagina < ($totalpagina - 5)) {
        echo '<a href="?menuop=contatos&pagina=' . ($pagina + 1) . '" class="link-paginacao">>></a>';
    }

    // Link para a última página
    echo "<a href=\"?menuop=contatos&pagina=$totalpagina\" class=\"link-paginacao\">Última página</a>";
    ?>
</div>
