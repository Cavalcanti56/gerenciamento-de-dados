<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gerenciamento de dados</title>
</head>
<body>
    <header>
        <h1>Gerenciamento de dados</h1>
        <nav>
            <a href="index.php?menuop=home">home</a>
            <a href="index.php?menuop=contatos">contatos</a>
            <a href="index.php?menuop=tarefas">tarefas</a>
            <a href="index.php?menuop=eventos">eventos</a>
        </nav>
    </header>
    <main>
    <?php
        $menuop = (isset($_GET["menuop"]))?$_GET["menuop"]:"home";
        switch ($menuop) {
            case 'home':
                include("paginas/home/home.php");
                break;
            
            case 'contatos':
                include("paginas/contatos/contatos.php");
                break;

                case 'cad-contato':
                    include("paginas/contatos/cad-contato.php");
                    break;
                
                case 'inserir-contato':
                    include("paginas/contatos/inserir-contato.php");
                    break;

                case 'editar-contato':
                    include("paginas/contatos/editar-contato.php");
                    break;

                case 'excluir-contato':
                        include("paginas/contatos/excluir-contato.php");
                        break;

                case 'atualizar-contato':
                    include("paginas/contatos/atualizar-contato.php");
                    break;

            case 'tarefas':
                include("paginas/tarefas/tarefas.php");
            break;

            case 'eventos':
                include("paginas/eventos/eventos.php");
            break;

            default:
                include("paginas/home/home.php");
                break;
        }

    ?>
    </main>
    
</body>
</html>