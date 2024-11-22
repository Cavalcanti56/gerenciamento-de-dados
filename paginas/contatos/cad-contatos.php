<header>
    <h3>Cadastro de Contatos</h3>
<div>
    <form action="index.php?menuop=inserir-contato" method="post">
<div>
    <label for="nomeContato">Nome:</label>
    <input type="text" name= "nomeContato">
</div>
<div>
    <label for="emailContato">E-mail:</label>
    <input type="email" name= "emailContato">
</div>
<div>
    <label for="telefoneContato">Telefone:</label>
    <input type="text" name= "telefoneContato" placeholder="(99)99999-9999">
</div>
<div>
    <label for="enderecoContato">Endereço:</label>
    <input type="text" name= "enderecoContato">
</div>
<div>
    <label for="sexoContato">Sexo (M ou F):</label>
    <input type="text" name= "sexoContato">
</div>
<div>
    <label for="dataNascContato">Data de Nascimento:</label>
    <input type="date" name= "dataNascContato">
    <div>
        <input type="submit" value="Adicionar" name = "btnAdicionar">
    </div>
</div>
    </form>
</div>