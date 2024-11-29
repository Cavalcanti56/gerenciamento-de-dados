<h3><i class="bi bi-person-square"> </i>Contatos</h3>
</header>

<div class="novo-contato">
    <a href="index.php?menuop=cad-contato"><i class="bi bi-person-plus"></i>Novo Contato</a>
</div>

<div class="pesquisa">
    <form action="index.php?menuop=contatos" method="POST">
        <input type="text" name="txt_pesquisa" placeholder="Pesquisar contato...">
        <input type="submit" value="Pesquisar">
        
    </form>
</div>
<style>
    body {
    margin: 0;
    padding: 20px;
}

h3 {
    text-align: left;
    color: white;
    margin-bottom: 20px;
}

.novo-contato {
    text-align: left;
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
.pesquisa form {
    display: flex;
    gap: 10px;
}


.pesquisa input[type="text"] {
    padding: 10px;
    width: 300px;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-right: 10px;
}
.pesquisa{
    text-align: left;
    margin: 20px 0;
}

.tabela-contatos {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    margin: 20px 0;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); 
    background-color: #1e1e1e;
}

.tabela-contatos th {
    background-color: #333333; 
    color: #ffffff;
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
    color: #e0e0e0; 
    background-color: #2b2b2b; 
    border-bottom: 1px solid #444444; 
    vertical-align: middle;
}

.tabela-contatos tr:nth-child(even) td {
    background-color: #242424; 
}

.tabela-contatos tr:hover td {
    background-color: #3a3a3a; 
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.tabela-contatos a {
    text-decoration: none;
    padding: 8px 12px;
    border-radius: 4px;
    background-color: #03a9f4; 
    color: white;
    font-size: 12px;
    transition: background-color 0.3s ease;
}

.tabela-contatos a:hover {
    background-color: #0288d1; 
}

.tabela-contatos .btn-excluir {
   background-color: red; 
}

.tabela-contatos .btn-excluir:hover {
    background-color: #c62828; 

}

<style>
    .paginacao {
        background-color: #2c2c2c; 
        padding: 15px;
        border-radius: 8px;
        text-align: center;
        color: #fff; 
        font-family: Arial, sans-serif;
    }

    .paginacao a {
        color: #1e90ff; 
        text-decoration: none;
        margin: 0 5px;
        padding: 5px 10px;
        border: 1px solid #1e90ff; 
        border-radius: 4px;
        transition: background-color 0.3s, color 0.3s;
    }

    .paginacao a:hover {
        background-color: #1e90ff; 
        color: #fff; 
    }

    .paginacao .pagina-atual {
        background-color: #4caf50; 
        color: #fff; 
        font-weight: bold;
        padding: 5px 10px;
        border-radius: 4px;
        margin: 0 5px;
    }

    .paginacao p {
        margin: 10px 0;
        font-size: 14px;
        
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
            <td><a class="btn btn-outline-warning btn-sn" href="index.php?menuop=editar-contato&idContato=<?= $dados['idContato'] ?>"><i class="bi bi-pencil-square"></i></a></td>
            <td><a class="btn btn-outline-danger btn-sn" href="index.php?menuop=excluir-contato&idContato=<?= $dados["idContato"] ?>"><i class="bi bi-trash3"></i></a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<div class="paginacao">
    <?php
    // Consulta total de contatos
    $sqltotal = "SELECT idContato FROM tbcontatos";
    $qrtotal = mysqli_query($conexao, $sqltotal) or die(mysqli_error($conexao));
    $numtotal = mysqli_num_rows($qrtotal);
    $totalpagina = ceil($numtotal / $quantidade);

    // Exibir total de contatos
    echo "<p>Total de contatos: <strong>$numtotal</strong></p>";

    // Link para a primeira página
    echo '<a href="?menuop=contatos&pagina=1" class="link-paginacao">Primeira página</a>';

    // Botão "anterior" caso esteja além da página 2
    if ($pagina > 2) {
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

    // Botão "próximo" caso haja mais de 1 páginas restantes
    if ($pagina < ($totalpagina - 1)) {
        echo '<a href="?menuop=contatos&pagina=' . ($pagina + 1) . '" class="link-paginacao">>></a>';
    }

    // Link para a última página
    echo "<a href=\"?menuop=contatos&pagina=$totalpagina\" class=\"link-paginacao\">Última página</a>";
    ?>
</div>
