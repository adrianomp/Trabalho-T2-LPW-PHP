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

        <title>Heroic Features - Start Bootstrap Template</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/heroic-features.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <!-- Navigation -->
        <?php
        require_once("menu_superior.php");
        ?>
        <!-- Page Content -->
        <div class="container">
            <!--Jumbotron Header -->
            <header class = "jumbotron hero-spacer">               
                <h1>Eco Escambo</h1>
                <?php if ($logado) { ?>
                    <p><?= $saudacao . ',' . $_SESSION["usuario"] ?></p>
                <?php }
                ?>
                <p>Eco escambo é um site de escambo feito para escambo </p>
                <p><a class = "btn btn-primary btn-large">Call to action!</a></p>
            </header>

            <hr>

            <!--Title -->
            <!--<div class = "row">
            <div class = "col-lg-12">
            <h3>Latest Features</h3>
            </div>
            </div> -->
            <!--/.row -->

            <!--Page Features -->
            <!--<div class = "row text-center">

            <div class = "col-md-3 col-sm-6 hero-feature">
            <div class = "thumbnail">
            <img src = "http://placehold.it/800x500" alt = "">
            <div class = "caption">
            <h3>Feature Label</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>
            <a href = "#" class = "btn btn-primary">Buy Now!</a> <a href = "#" class = "btn btn-default">More Info</a>
            </p>
            </div>
            </div>
            </div>

            <div class = "col-md-3 col-sm-6 hero-feature">
            <div class = "thumbnail">
            <img src = "http://placehold.it/800x500" alt = "">
            <div class = "caption">
            <h3>Feature Label</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>
            <a href = "#" class = "btn btn-primary">Buy Now!</a> <a href = "#" class = "btn btn-default">More Info</a>
            </p>
            </div>
            </div>
            </div>

            <div class = "col-md-3 col-sm-6 hero-feature">
            <div class = "thumbnail">
            <img src = "http://placehold.it/800x500" alt = "">
            <div class = "caption">
            <h3>Feature Label</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>
            <a href = "#" class = "btn btn-primary">Buy Now!</a> <a href = "#" class = "btn btn-default">More Info</a>
            </p>
            </div>
            </div>
            </div>

            <div class = "col-md-3 col-sm-6 hero-feature">
            <div class = "thumbnail">
            <img src = "http://placehold.it/800x500" alt = "">
            <div class = "caption">
            <h3>Feature Label</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>
            <a href = "#" class = "btn btn-primary">Buy Now!</a> <a href = "#" class = "btn btn-default">More Info</a>
            </p>
            </div>
            </div>
            </div>

            </div> -->
            <!--/.row -->
            <?php
            include_once('catalogo.php');
            ?>	
            <hr>

            <!-- Footer -->
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Criado por Adriano Martins  &  Victor Silva    2015</p>
                    </div>
                </div>
            </footer>

        </div>
        <!-- /.container -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

    </body>

</html>