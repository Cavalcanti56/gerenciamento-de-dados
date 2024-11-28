<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Contatos</title>
    <style>
        /* Estilos globais */
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            gap: 50px;
        }

        header h3 {
            text-align: center;
            color: #00bcd4;
            margin-bottom: 20px;
        }

        /* Estilo do formulário */
        form {
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.4);
            max-width: 400px;
            width: 100%;
        }

        /* Estilo dos campos */
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
        select {
            padding: 10px;
            font-size: 14px;
            border: 1px solid #333333;
            border-radius: 5px;
            background-color: #2c2c2c;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <header>
        <h3>Cadastro de Contatos</h3>
    </header>
    <form action="index.php?menuop=inserir-contato" method="post">
        <div>
            <label for="nomeContato">Nome:</label>
            <input type="text" name="nomeContato" id="nomeContato">
        </div>
        <div>
            <label for="emailContato">E-mail:</label>
            <input type="email" name="emailContato" id="emailContato">
        </div>
        <div>
            <label for="telefoneContato">Telefone:</label>
            <input type="text" name="telefoneContato" id="telefoneContato" placeholder="(99)99999-9999">
        </div>
        <div>
            <label for="enderecoContato">Endereço:</label>
            <input type="text" name="enderecoContato" id="enderecoContato">
        </div>
        <div>
            <label for="sexoContato">Sexo (M ou F):</label>
            <select name="sexoContato" id="sexoContato">
                <option value=" " selected>Selecione o sexo:</option>
                <option value="F">Feminino</option>
                <option value="M">Masculino</option>
            </select>
        </div>
        <div>
            <label for="dataNascContato">Data de Nascimento:</label>
            <input type="date" name="dataNascContato" id="dataNascContato">
        </div>
        <div>
            <input type="submit" value="Adicionar" name="btnAdicionar">
        </div>
    </form>
</body>
</html>
