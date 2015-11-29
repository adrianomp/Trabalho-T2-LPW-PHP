<html>
    <head>
        <meta charset="UTF-8" />
        <title>Bazar Tem Tudo</title>
    </head>
    <body>

        <div id="corpo">


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





        </div>   



    </body>
</html>
