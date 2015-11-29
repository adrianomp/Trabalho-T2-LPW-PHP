<html>
    <head>
        <meta charset="UTF-8" />
        <title>Bazar Tem Tudo</title>
    </head>
    <body>
        <div id="corpo">

            <?php
            if (isset($msgErro)) {
                ?>
                <p style="color: red;"><?= $msgErro ?></p>
                <?php
            }
            ?>	
            <p>Login</p>
            <form method="post" action="login.php">
                Login:  <input type="text" name="login" /><br/> 
                Senha: <input type="password" name="senha" /><br/>
                <button type="submit" name="enviar">Entrar</button>

            </form>




        </div>   



    </body>
</html>
