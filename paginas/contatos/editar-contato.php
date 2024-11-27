<?php
$idContato = $_GET['idContato'];

$sql = "SELECT * FROM tbcontatos WHERE idContato = '{$idContato}'";
$rs = mysqli_query($conexao, $sql) or die("Erro ao recuperar os dados do registro: " . mysqli_error($conexao));
$dados = mysqli_fetch_assoc($rs);
?>
<style>
        /* Estilos globais */
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #ffffff;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        header h3 {
            color: #00bcd4;
            font-size: 24px;
            margin: 0;
        }

        .formulario-editar {
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.4);
            max-width: 400px;
            width: 100%;
        }

        form div {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 14px;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="submit"] {
            padding: 10px;
            font-size: 14px;
            border: 1px solid #333333;
            border-radius: 5px;
            background-color: #2c2c2c;
            color: #ffffff;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="date"]:focus {
            border-color: #00bcd4;
            outline: none;
        }

        input[type="submit"] {
            background-color: #00bcd4;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #008c9e;
        }
    </style>
</head>
<body>
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
</body>