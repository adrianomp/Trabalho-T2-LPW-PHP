<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Navegação</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Eco Escambo</a>
        </div>
 
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php if (!$logado) { ?>
                    <li>
                        <a href="logar_usuario.php">Login</a>
                    </li>
                    <li>
                        <a href="cadastrar_usuario.php">Cadastro</a>
                    </li>
                <?php } else { ?>
                    <li>
                        <a href="minhas_ofertas.php">Minhas Ofertas</a>
                    </li>
                    <li>
                        <a href="cadastrar_oferta.php">Cadastrar Oferta</a>
                    </li>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>