<header>
    <h3>Inserir Contato</h3>
</header>
<?php
 
  $nomeContato = mysqli_real_escape_string($conexao, $_POST["nomeContato"]); 
  $emailContato = mysqli_real_escape_string($conexao, $_POST["emailContato"]); 
  $telefoneContato = mysqli_real_escape_string($conexao, $_POST["telefoneContato"]); 
  $enderecoContato = mysqli_real_escape_string($conexao, $_POST["enderecoContato"]); 
  $sexoContato = mysqli_real_escape_string($conexao, $_POST["sexoContato"]); 
  $dataNascContato = mysqli_real_escape_string($conexao, $_POST["dataNascContato"]); 

//   Foi utilizada uma função para limpar a string de caracteres inválidos para o BD, previnindo o SQL Injection.

  $sql = "INSERT INTO tbcontatos (
   nomeContato,
   emailContato,
   enderecoContato, 
   telefoneContato, 
   sexoContato,
   dataNascContato
   )

   VALUES (
    '{$nomeContato}',
    '{$emailContato}',
    '{$telefoneContato}',
    '{$enderecoContato}',
    '{$sexoContato}',
    '{$dataNascContato}'
   )
   ";
    mysqli_query($conexao,$sql) or die ("Erro ao criar o contato!" . mysqli_error($conexao));
    echo "O contato foi inserido com sucesso!";
?>