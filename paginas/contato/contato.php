<header>
    <h3>Contatos</h3>
</header>
<div>
    <a href="index.php?menuop=cad-contato">Novo Contato</a>
</div>
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
        </tr>
    </thead>
    <tbody>
        <?php
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
    FROM dbcontatos";
    
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
        </tr>
<?php
        } 
?>
    </tbody>
</table>