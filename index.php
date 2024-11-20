<<<<<<< HEAD
<?php
    include("./db/conexao.php");
    session_start();

        $rs = mysqli_query($conexao, $sql);
        $dados = mysqli_fetch_assoc($rs);
        $linha = mysqli_num_rows($rs);
?>
<!DOCTYPE html>
<html lang="PT-BR">
=======
<!DOCTYPE html>
<html lang="pt-BR">
>>>>>>> da05fb76ee3cc0f1930d79998cb88a4605fe3390
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo-padrao.css">
    <title>Gerenciamento de Contatos Pessoais</title>
</head>
<body>
    <header class="bg-dark">
<<<<<<< HEAD
<div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">
            <!-- adicionar logo -->
             <img src="css/agenda.png" alt="Sistema-Agenda" width="100px" height="100px">
            </a>
            <div class="collapse navbar-collapse" id="conteudonavbarsuportado">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"><a class="nav-link" href="index.php?menuop=home">home</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?menuop=contatos">contatos</a></li>
                </ul>
            </div>
        </nav>
    </div>
    </header>
    <main>
<div class="container">
    <?php
        $menuop = (isset($_GET['menuop']))?$_GET['menuop']:'home';
        switch($menuop){
            case 'home':
                include("./paginas/home/home.php");
                break;
            case 'contatos':
                include("./paginas/contatos/contato.php");
                break;
            case 'cad-contato':
                include("./paginas/contatos/cad-contatos.php");
                break;   
            case 'inserir-contato':
                    include("./paginas/contatos/inserir-contato.php");
                    break;  
            case 'editar-contato':
                    include("./paginas/contatos/editar-contato.php");
                    break; 
            case 'atualizar-contato':
                    include("./paginas/contatos/atualizar-contato.php");
                    break;                                       
            case 'excluir-contato':
                    include("./paginas/contatos/excluir-contato.php");
                    break;
            default:
                include("paginas/home/home.php");
                break;
        }

    ?>
    </div>
    </main>
    <footer class="container-fluid fixed-bottom bg-dark">
        <div class="text-center text-white py-2">Sistema de Agenda</div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous" defer></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous" defer></script>
=======
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#">
                    <img src="css/agenda.png" alt="Sistema-Agenda" width="100px" height="100px">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudonavbarsuportado" aria-controls="conteudonavbarsuportado" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="conteudonavbarsuportado">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active"><a class="nav-link" href="index.php?menuop=home">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?menuop=contatos">Contatos</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <main>
        <div class="container">
            <?php
                $menuop = (isset($_GET["menuop"])) ? $_GET["menuop"] : "home";
                switch ($menuop) {
                    case 'home':
                        include("paginas/home/home.php");
                        break;
                    case 'contato':
                        include("paginas/contato/contato.php");
                        break;
                    case 'cad-contato':
                        include("paginas/contato/cad-contato.php");
                        break;
                    case 'inserir-contato':
                        include("paginas/contato/inserir-contato.php");
                        break;
                    case 'editar-contato':
                        include("paginas/contato/editar-contato.php");
                        break;
                    case 'excluir-contato':
                        include("paginas/contato/excluir-contato.php");
                        break;
                    case 'atualizar-contato':
                        include("paginas/contato/atualizar-contato.php");
                        break;
                    default:
                        include("paginas/home/home.php");
                        break;
                }
            ?>
        </div>
    </main>
    <footer class="container-fluid fixed-bottom bg-dark text-white text-center py-3">
        <p class="mb-0">&copy; 2024 Sistema de Gerenciamento de Contatos. Todos os direitos reservados.</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
