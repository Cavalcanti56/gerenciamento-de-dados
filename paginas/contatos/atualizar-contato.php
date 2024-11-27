<style>
  div.message-up{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-color: #1e1e1e;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
    width: 100%;
    color: greenyellow;
  }
  h3.up {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 55px;
    padding-bottom: 20px;
  }
</style>

<header>
  <h3 class="up">Editar Contato</h3>
</header>
<?php
  $idContato =   mysqli_real_escape_string($conexao,$_POST["idContato"]);
  $nomeContato = mysqli_real_escape_string($conexao, $_POST["nomeContato"]); 
  $emailContato = mysqli_real_escape_string($conexao, $_POST["emailContato"]); 
  $telefoneContato = mysqli_real_escape_string($conexao, $_POST["telefoneContato"]); 
  $sexoContato = mysqli_real_escape_string($conexao, $_POST["sexoContato"]); 
  $enderecoContato = mysqli_real_escape_string($conexao, $_POST["enderecoContato"]); 
  $dataNascContato = mysqli_real_escape_string($conexao, $_POST["dataNascContato"]); 
  
  $sql = "UPDATE tbcontatos SET
  nomeContato = '{$nomeContato}',
  emailContato = '{$emailContato}',
  telefoneContato = '{$telefoneContato}',
  enderecoContato = '{$enderecoContato}',
  sexoContato = '{$sexoContato}',
  dataNascContato = '{$dataNascContato}'
  WHERE idContato = '{$idContato}'
  ";
    mysqli_query($conexao,$sql) or die ("Erro ao atualizar contato!" . mysqli_error($conexao));
    echo '<div class="message-up">O contato foi atualizado com sucesso!</div>';
?>