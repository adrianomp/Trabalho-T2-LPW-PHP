<?php
session_start();

//Post para fazer logout
if (isset($_POST['destroisessao'])) {
    session_destroy();
    header("Refresh:0");
}

$logado = isset($_SESSION["usuario"]);

$d = date("H");
if ($d < 12)
    $saudacao = "Bom dia";
elseif ($d < 17)
    $saudacao = "Boa tarde";
else
    $saudacao = "Boa noite";
?>
<!DOCTYPE html>
<html lang="pt">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/heroic-features.css" rel="stylesheet">
        <title>Início</title>
    </head>

    <body>
        <?php
        require_once("menu_superior.php");
        ?>
        
        <div class="container">
            <header class = "jumbotron hero-spacer">               
                <h1>Eco Escambo</h1>
                <?php if ($logado) { ?>
                    <p><?= $saudacao . ',' . $_SESSION["usuario"] ?></p>
                <?php }
                ?>
                <p>Eco escambo é um site de trocas ecológicas, criado pelos alunos Adriano e Victor para disciplina de LPW. </p>
            </header>
            <hr>
            <?php
            include_once('catalogo.php');
            ?>	
            <hr>

            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Criado por Adriano Martins  &  Victor Silva  -  2015</p>
                    </div>
                </div>
            </footer>
        </div>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>