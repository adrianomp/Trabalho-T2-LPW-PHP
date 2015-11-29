<?php
session_start();
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
    </head>
    <body>

        <div id="corpo">




            <?php if ($logado) { ?>
                <span><?= $saudacao . ',' . $_SESSION["usuario"] ?></span>

                <form method="post" action="minhas_ofertas.php">
                    <button type="submit" name="ver_minhas_ofertas">Minhas Ofertas</button>
                </form>

                <form method="post" action="index.php">
                    <button type="submit" name="destroisessao">Logout</button>
                </form>

                <?php
            } else {
                if (isset($msgErro)) {
                    ?>
                    <p style="color: red;"><?= $msgErro ?></p>
                <?php } ?> 
                <p>Login</p>
                <form method="post" action="login.php">
                    Login:  <input type="text" name="login" /><br/> 
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
                <?php
                if (isset($msgErroUsuario)) {
                    ?>
                    <p style="color: red;"><?= $msgErroUsuario ?></p>
                <?php } ?>

                <p>Cadastro</p>
                <form method="post" action="cadastro.php">
                    Nome:  <input type="text" name="nome" /><br/>
                    Email: <input type="text" name="email" /><br/>
                    Login: <input type="text" name="login" /><br/> 
                    Senha: <input type="password" name="senha" /><br/>

                    <button type="submit" name="enviar">Entrar</button>

                </form> 


                <?php
            }
            include_once('catalogo.php');
            ?>	


        </div>   



    </body>
</html>
