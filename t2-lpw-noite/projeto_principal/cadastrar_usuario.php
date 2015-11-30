<?php
session_start();
$logado = isset($_SESSION["usuario"]);
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/heroic-features.css" rel="stylesheet">
        <title>Cadastrar Usuário</title>
    </head>
    <body>
        <?php
        require_once("menu_superior.php");
        ?>
        <form class="form-horizontal" method="post" action="cadastro.php">
            <fieldset>
                <?php
                if (isset($msgErroEmail)) {
                    ?>
                    <div class="alert alert-danger">
                        <center> <a class="close" data-dismiss="alert" href="#"></a><?= $msgErroEmail ?></center>
                    </div>
                <?php } ?> 
                <?php
                if (isset($msgErroSenha)) {
                    ?>
                    <div class="alert alert-danger">
                        <center> <a class="close" data-dismiss="alert" href="#"></a><?= $msgErroSenha ?></center>
                    </div>
                <?php } ?> 
                <?php
                if (isset($msgErroUsuario)) {
                    ?>
                    <div class="alert alert-danger">
                        <center> <a class="close" data-dismiss="alert" href="#"></a><?= $msgErroUsuario ?></center>
                    </div>
                <?php } ?> 

                <center><legend>Cadastro</legend></center>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="idNome">Nome</label>  
                    <div class="col-md-5">
                        <input id="idNome" name="nome" type="text" placeholder="Informe seu nome" class="form-control input-md" required="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="idDepto">E-mail</label>  
                    <div class="col-md-5">
                        <input id="idDepto" name="email" type="text" placeholder="Informe seu e-mail" class="form-control input-md" required="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="idUsuario">Login</label>  
                    <div class="col-md-5">
                        <input id="idUsuario" name="login" type="text" placeholder="Informe seu login" class="form-control input-md" required="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="idSenha">Senha</label>
                    <div class="col-md-5">
                        <input id="idSenha" name="senha" type="password" placeholder="Informe sua senha" class="form-control input-md" required="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="idConfirmar"></label>
                    <div class="col-md-8">
                        <button id="idConfirmar" type="submit" name="enviar" class="btn btn-primary">Confirmar</button>
                    </div>
                </div>
            </fieldset>
        </form>
        <?php
        include_once('footer.php');
        ?>
    </body>
</html>
