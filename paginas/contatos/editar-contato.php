<?php
$idContato = $_GET['idContato'];

$sql = "SELECT * FROM tbcontatos WHERE idContato = '{$idContato}'";
$rs = mysqli_query($conexao, $sql) or die("Erro ao recuperar os dados do registro: " . mysqli_error($conexao));
$dados = mysqli_fetch_assoc($rs);
?>




<header>
    <h3>Editar Contato</h3>
</header>

<div class="formulario-editar">
    <form action="index.php?menuop=atualizar-contato" method="post">
        <div>
            <label for="idContato">ID</label>
            <input type="text" name="idContato" id="idContato" value="<?= $dados["idContato"] ?>" readonly>
        </div>
        <div>
            <label for="nomeContato">Nome</label>
            <input type="text" name="nomeContato" id="nomeContato" value="<?= $dados["nomeContato"] ?>" required>
        </div>
        <div>
            <label for="emailContato">E-mail</label>
            <input type="email" name="emailContato" id="emailContato" value="<?= $dados["emailContato"] ?>" required>
        </div>
        <div>
            <label for="telefoneContato">Telefone</label>
            <input type="text" name="telefoneContato" id="telefoneContato" value="<?= $dados["telefoneContato"] ?>" required>
        </div>
        <div>
            <label for="enderecoContato">Endereço</label>
            <input type="text" name="enderecoContato" id="enderecoContato" value="<?= $dados["enderecoContato"] ?>" required>
        </div>
        <div>
            <label for="sexoContato">Sexo</label>
            <input type="text" name="sexoContato" id="sexoContato" value="<?= $dados["sexoContato"] ?>" required>
        </div>
        <div>
            <label for="dataNascContato">Data de Nascimento</label>
            <input type="date" name="dataNascContato" id="dataNascContato" value="<?= $dados["dataNascContato"] ?>" required>
        </div>
        <div>
            <input type="submit" value="Atualizar" name="btnAtualizar">
        </div>
    </form>
</div>
