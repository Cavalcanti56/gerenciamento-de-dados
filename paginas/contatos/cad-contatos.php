<?php

session_start();
$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $resposta = $_POST['resposta'];

$mensagem = "Contato inserido com sucesso: $resposta";
$_SESSION['mensagem'] = $mensagem;

header("location: {$_SERVER['PHP_SELF']}");
exit();


}

$menuop = isset($_GET['menuop']) ? $_GET['menuop'] : 'home';

switch ($menuop) {
    case 'home':
        
        break;
    case 'cad-contato':
        
        break;
    
}
?>


<header>
    <h3>Cadastro de Contatos</h3>
<div>

<?php
if (isset($_SESSION['mensagem'])) {
    echo "<p style='color: green; font-weight: bold;'>{$_SESSION['mensagem']}</p>";
    
    
    unset($_SESSION['mensagem']);
}
?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
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