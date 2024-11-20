<header>
    <h3>Excluir Contato</h3>
</header>
<?php
$idContato = mysqli_real_escape_string($conexao,$_get["idContato"]);
$sql = "DELETE FROM tbcontatos WHERE idContatos= '{$idContato}";

mysqli_query($conexao,$sql) or die("Erro ao excluir o registro. ". mysqli_error($conexão));
echo "Registro excluir com sucesso!";
?>