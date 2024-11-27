<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Contato</title>
    <style>
        /* Estilo global */
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(18, 18, 18);
            color: #ffffff;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        header {
            background-color: #1e1e1e;
            padding: 20px;
            text-align: center;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
            margin-bottom: 20px;
            width: 100%;
            max-width: 600px;
        }

        header h3 {
            color: #f44336; /* Vermelho para dar destaque */
            margin: 0;
            font-size: 24px;
        }

        .message {
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 600px;
            margin-top: 200px;
        }

        .message.success {
            color: greenyellow; /* Azul claro para mensagens de sucesso */
            
        }

        .message.error {
            color: #f44336; /* Vermelho para mensagens de erro */
        }
    </style>
</head>
<body>
    <div>
       

        <?php
        // Conexão com o banco de dados
        $idContato = mysqli_real_escape_string($conexao, $_GET["idContato"]);
        $sql = "DELETE FROM tbcontatos WHERE idContato = '{$idContato}'";

        // Execução da consulta
        if (mysqli_query($conexao, $sql)) {
            echo '<div class="message success">O contato foi excluído com sucesso!</div>';
        } else {
            echo '<div class="message error">Erro ao excluir o contato: ' . mysqli_error($conexao) . '</div>';
        }
        ?>
    </div>
</body>
</html>
