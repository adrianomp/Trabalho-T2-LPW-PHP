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
        <title>Entrar</title>

    <body>
        <?php
        require_once("menu_superior.php");
        ?>
        <div class="container" style="margin-top:30px">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title"><strong>Login </strong></h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="login.php">
                            <?php
                            if (isset($msgErro)) {
                                ?>
                                <div class="alert alert-danger">
                                    <a class="close" data-dismiss="alert" href="#"></a><?= $msgErro ?>
                                </div>

                                <?php
                            }
                            ?>	
                            <div style="margin-bottom: 12px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="login-username" type="text" class="form-control" name="login" value="" placeholder="Informe seu login">                                        
                            </div>

                            <div style="margin-bottom: 12px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="login-password" type="password" class="form-control" name="senha" placeholder="Informe sua senha">
                            </div>
                            <button type="submit" class="btn btn-success" name="enviar">Entrar</button>
                            <hr style="margin-top:10px;margin-bottom:10px;" >
                            <div class="form-group">
                                <div style="font-size:85%">
                                    Não tem uma conta? 
                                    <a href="cadastrar_usuario.php" onClick="$('#loginbox').hide();
                                            $('#signupbox').show()">
                                        Cadastre-se!
                                    </a>
                                </div>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <?php
    include_once('footer.php');
    ?>	
</html>
