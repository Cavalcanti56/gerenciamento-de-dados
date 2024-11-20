<header>
    <h3>Contatos</h3>
</header>
<div>
    <a href="index.php?menuop=cad-contato">Criar Contato</a>
<div class="novo-contato">
    <a href="index.php?menuop=cad-contato">Novo Contato</a>
</div>

<div>
    <form action="index.php?menuop=contatos" method="$_POST">
    <input type="text" name="txt_pesquisa">
    <input type="submit" value="Pesquisar">
    </form>
</div>
<style>
    .novo-contato {
    text-align: center; /* Centraliza o conteúdo */
    margin: 20px; /* Adiciona um espaçamento externo */
}

.novo-contato a {
    text-decoration: none; /* Remove o sublinhado do link */
    background-color: #007BFF; /* Cor de fundo azul */
    color: white; /* Cor do texto branco */
    padding: 10px 20px; /* Adiciona espaçamento interno */
    border-radius: 5px; /* Arredonda os cantos */
    font-family: Arial, sans-serif; /* Define a fonte */
    font-size: 16px; /* Tamanho do texto */
    transition: background-color 0.3s ease; /* Suaviza a transição */
}

.novo-contato a:hover {
    background-color: #0056b3; /* Cor de fundo ao passar o mouse */
    color: #e6e6e6; /* Cor do texto ao passar o mouse */
}

</style>
<table border="1">
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

        $pagina = (isset($_GET['pagina']))?(int)$_GET['pagina']:1;

        $inicio = ($quantidade * $pagina) - $quantidade;
        //(10 *1) - 10 = 0. 
        // 1 - 2 - 3 - 3 - 4

        $txt_pesquisa = (isset($_POST["txt_pesquisa"]))?$_POST["txt_pesquisa"]:"";
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
    WHERE 
    idContato='{$txt_pesquisa}' or
    nomeContato LIKE '%{$txt_pesquisa}%'
    ORDER BY nomeContato ASC

    LIMIT $inicio, $quantidade
    ";
        // ou seja, se estiver na pagina 1 ele vai rodar de 0 a 10, e assim por diante acrescentando 10 registros.

        $rs = mysqli_query($conexao,$sql) or die ("Erro ao executar a consulta!" .mysqli_error($conexao));
        while($dados = mysqli_fetch_assoc($rs)){
        
        ?>
        <tr>
            <td><?= $dados["idContato"]?></td>
            <td><?= $dados["nomeContato"]?></td>
            <td><?= $dados["emailContato"]?></td>
            <td><?= $dados["telefoneContato"]?></td>
            <td><?= $dados["enderecoContato"]?></td>
            <td><?= $dados["sexoContato"]?></td>
            <td><?= $dados["dataNascContato"]?></td>
            <td><a href="index.php?menuop=editar-contato&idcontato=<?=$dados["idcontato"] ?>">Editar</a> </td>
            <td><a href="index.php?menuop=excluir-contato&idcontato=<?=$dados["idcontato"] ?>">Excluir</a> </td>
        </tr>
<?php
        } 
?>
    </tbody>
</table>
<br>

<?php
// esse php foi feito pra que a pagina 1 não traga todas as informações de ume vez, 
//e com o intuito de pegar a quantidade total de dados e 
//dividir 10 em cada pagina, podendo assim ser escolhida.

$sqltotal = "SELECT idContato FROM tbcontatos";
//essa variavel faz com que a pagina não traga tudo de um vez

$qrtotal = mysqli_query($conexao,$sqltotal) or die (mysqli_error($conexao));
// QR significa query result, os resultados da query.

$numtotal = mysqli_num_rows($qrtotal);
// variavel criada para guardar o numero total de linhas
// e o num rows é a quantidade total de linhas.

$totalpagina = ceil($numtotal/$quantidade);
// pra ter a quantidade de paginas.
// o ceil é pra que quando ouver uma certa quantidade de pagina com numero quebrado, ele arredonde.

echo "total de registros:  $numtotal <br>";


echo '<a href="?munuop=contatos&pagina=1">Primeira pagina</a>';

if($pagina>6){
    ?>
        <a href="?menuop=contatos&pagina=<?php echo $pagina-1?>"> << </a>"

    <?php
}

for($i=1;$i<=$totalpagina;$i++){
    //for iniciado em 1 é menor que o 36 

   if($i>=($pagina-5) && $i <= ($pagina+5)){
            if($i==$pagina){
                echo $i;
            }else{
                echo "<a href=\"?menuop=contatos&pagina=$i\">$i</a> ";
                // basicamente todo essa parte do for e if, é onde poderá navegar pelas paginas
                //entt quando tivermos 350 dados, vamos ter uma media de 36 paginas, onde poderá ser escolhida em qual quer navegar.
                //1 é maior igaual a pagina 5.
                // 1 é menor igual a pagina 5.
                //como os calculos bateram ele vai escrever o 1 sem link ate o a pagina 6 ele vai rodar normal.
                //na pagina 7, ela é maior que a 6 entao ela vai escrever " << ".

            }
   }
}

if($pagina< ($totalpagina-5)){
    ?>
        <a href="?menuop=contatos&pagina=<?php echo $pagina-1?>"> << </a>"

    <?php
}


echo "<a href=\"?munuop=contatos&pagina=$totalpagina\">Ultima pagina</a>";
// pra caso você queira ir direto pra ultima pagina.

?>
    