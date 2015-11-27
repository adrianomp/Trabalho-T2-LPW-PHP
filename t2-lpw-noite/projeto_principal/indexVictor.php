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
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Bazar Tem Tudo</title>
        
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Heroic Features - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/heroic-features.css" rel="stylesheet">
    </head>
    <body>
            <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Início</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    
                    <li>
                        <a href="#">Login</a>
                    </li>
                    <li>
                        <a href="#">Catálogo</a>
                    </li>
                    <li>
                        <a href="#">Cadastro</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
            <!-- /.container -->
    </nav>
            
             <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
            <h1>ECO ESCAMBO</h1>
            <p>É um sistema para trocas ecológica. Utilizadores cadastram produtos que eles ofertam para uma possível troca. 
                Ao navegar no site, o utilizador-interessado manifesta interesse em adquirir um produto. O utilizador-ofertante recebe um 
                e-mail indicando o interesse no produto com um link para visualização do produtos ofertados pelo utilizador-interessado. 
                Caso o ofertante, por sua vez, se interesse por um ou mais itens do interessado, ele submete uma proposta de troca ecológica.
                O interessado inicial analisa a proposta e, se for aceita, estabelece-se o compromisso da troca ecológica e os produtos saem 
                da visualização. Efetivada a troca, cada um avalia seu vendedor ou o denuncia por descumprimento de acordo.</p>
            <p><a class="btn btn-primary btn-large">NADA AINDA!</a>
            </p>
        </header>

        <hr>
        
        
        
        
  

        
        

        <!-- <div id="corpo">




            <?php if ($logado) { ?>
                <span><?= $saudacao . ',' . $_SESSION["usuario"] ?></span>
                <?php
            } else {
                if (isset($msgErro)) {
                    ?>
                    <p style="color: red;"><?= $msgErro ?></p>
                <?php } ?> 
                <p>Login</p>
                <form method="post" action="login.php">
                    Login: <input type="text" name="login" /><br/> 
                    Senha: <input type="password" name="senha" /><br/>
                    <button type="submit" name="enviar">Entrar</button>

                </form>
        <?php
                if (isset($msgErroEmail)) {
                    ?>
                    <p style="color: red;"><?= $msgErroEmail ?></p>
                <?php } ?> 
                <?php
                if (isset($msgErroSenha)) {
                    ?>
                    <p style="color: red;"><?= $msgErroSenha ?></p>
                <?php } ?>

                <p>Cadastro</p>
                <form method="post" action="cadastro.php">
                    Nome: <input type="text" name="nome" /><br/>
                    Email: <input type="text" name="email" /><br/>
                    Login: <input type="text" name="login" /><br/> 
                    Senha: <input type="password" name="senha" /><br/>

                    <button type="submit" name="enviar">Entrar</button>

                </form> 


            <?php } ?>	
            
            <form method="post" action="index.php">
                <button type="submit" name="destroisessao">Logout</button>
            </form>
        </div>   
        
        -->
        
                <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Últimos Produtos</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="images\coposdec1.jpg" alt="">
                    <div class="caption">
                        <h3>Copos Decorados</h3>
                        <p>Copos de 90ml biodegradáveis utilizados para bebidas quentes.</p>
                        <p>
                            <a href="#" class="btn btn-primary">Trocar</a> 
                        </p>
                    </div>
                </div>
            </div>
            
            
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="images\embalagem1.png" alt="">
                    <div class="caption">
                        <h3>Embalagem de Alimentos</h3>
                        <p>Embalagem 100% biodegradável confeccionada com papel cartão.</p>
                        <p>
                            <a href="#" class="btn btn-primary">Trocar</a> 
                        </p>
                    </div>
                </div>
            </div>
               <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="images\copos1.jpg" alt="">
                    <div class="caption">
                        <h3>Copos Biodegradáveis</h3>
                        <p>Copos de 100ml feitos de mandioca para bebidas quentes ou frias.</p>
                        <p>
                            <a href="#" class="btn btn-primary">Trocar</a> 
                        </p>
                    </div>
                </div>
            </div>

            
            
            
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="images\bambu1.png" alt="">
                    <div class="caption">
                        <h3>Teclado de Bambu</h3>
                        <p>Teclado artesanal e wireless. Feito de bambu.</p>
                        <p>
                            <a href="#" class="btn btn-primary">Trocar</a> 
                        </p>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.row -->

        <hr>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        

   <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Criado por Adriano Martins e Victor Silva 2015</p>
                </div>
            </div>
        </footer>
 <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    </body>
</html>
