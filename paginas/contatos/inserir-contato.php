<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inserir Contato</title>
  <style>
    h3 {
      display: flex;
      flex-direction: column;
      align-items: center;
      color: white;
      margin-top: 50px;
      display: flex;
    }
    p {
      display: flex;
      flex-direction: column;
      align-items: center;
      color: white;
    }
    div.sucess {
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
  </style>
</head>
<body>
  <div>
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
        ";mysqli_query($conexao,$sql) or die ("Erro ao criar o contato!" . mysqli_error($conexao));
          echo "<div class='sucess'>O contato foi criado com sucesso!</div>";

      ?>

  </div>
</body>
</html>




