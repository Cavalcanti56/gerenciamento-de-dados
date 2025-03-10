<?php
include("./db/conexao.php");
    
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/estilo-padrao.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Slab:wght@900&display=swap');
    </style>
    <title>Gerenciamento de contatos pessoais</title>
    
    <style>
    body {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 0 !important;
        padding: 0 !important;
        background-color: #3b4147;
        color: white;
        font-family: "Poppins", sans-serif;
        font-weight: 400;
        font-style: normal;
    }
    .custom-navbar {
        max-width: 1500px;
        width: 100%;
        margin: 0 auto;
    }
    main {
        margin-bottom: 60px;
    }
    </style>
</head>
<body>
    <header class="bg-dark custom-navbar">
<div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark custom-navbar">
            <a class="navbar-brand" href="#">
            <!-- adicionar logo -->
             <img src="css/agenda.png" alt="Sistema-Agenda" width="100px" height="100px">
            </a>
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
    <br><br><br>
    <footer class="container-fluid fixed-bottom bg-dark">
        <div class="text-center text-white py-2">Sistema de Gerenciamento de Contatos</div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous" defer></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous" defer></script>
</body>
</html>