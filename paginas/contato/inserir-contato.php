<header>
    <h3>Inserir Contato</h3>
</header>
<?php
  $nomeContato = mysqli_real_escape_string($conexao, $_POST["nomeContato"]); 
  $emailContato = mysqli_real_escape_string($conexao, $_POST["emailContato"]); 
  $telefoneContato = mysqli_real_escape_string($conexao, $_POST["telefoneContato"]); 
  $sexoContato = mysqli_real_escape_string($conexao, $_POST["sexoContato"]); 
  $enderecoContato = mysqli_real_escape_string($conexao, $_POST["enderecoContato"]); 
  $dataNascContato = mysqli_real_escape_string($conexao, $_POST["dataNascContato"]); 
  $sql = "INSERT INTO dbcontatos (
   nomeContato,
   emailContato,
   enderecoContato, 
   telefoneContato, 
   sexoContato,
   dataNascContato)
   VALUES(
    '{$nomeContato}',
    '{$emailContato}',
    '{$telefoneContato}',
    '{$enderecoContato}',
    '{$sexoContato}',
    '{$dataNascContato}'
   )
   ";
    mysqli_query($conexao,$sql) or die ("Erro ao executar a consulta!" . mysqli_error($conexao));
    echo "O registro foi inserido com sucesso!";
?>