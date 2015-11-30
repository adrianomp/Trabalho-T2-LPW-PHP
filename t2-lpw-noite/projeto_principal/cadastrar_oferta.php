<?php
include_once('conectar.php');
SESSION_START();
$logado = isset($_SESSION["usuario"]);


if (isset($_SESSION["usuario"])) {

    $ofertante = $_SESSION["usuario"];

    if (isset($_POST['enviar'])) {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        $sql = "insert into catalogo_itens ( ofertante, nome, descricao, preco) ";
        $sql .= "values('$ofertante','$nome','$descricao','$preco')";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        echo 'Oferta cadastrada com sucesso';
    }
}
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
        <title>Cadastrar Oferta</title>
    </head>
    <body>
        <?php
        require_once("menu_superior.php");
        ?>

        <form class="form-horizontal" method="post" action="cadastrar_oferta.php">
            <fieldset>
                <center><legend>Nova Oferta</legend></center>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="idNome">Nome</label>  
                    <div class="col-md-5">
                        <input id="idNome" name="nome" type="text" placeholder="Informe o nome do produto" class="form-control input-md" required="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="idDepto">Descrição</label>  
                    <div class="col-md-5">
                        <input id="idDepto" name="descricao" type="text" placeholder="Informe a descrição" class="form-control input-md" required="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="idUsuario">Preço</label>  
                    <div class="col-md-5">
                        <input id="idUsuario" name="preco" type="text" placeholder="Informe o preço" class="form-control input-md" required="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="idConfirmar"></label>
                    <div class="col-md-8">
                        <button id="idConfirmar" type="submit" name="enviar" class="btn btn-primary">Cadastrar Oferta</button>
                    </div>
                </div>


            </fieldset>
        </form>	
        <?php
        include_once('footer.php');
        ?>
    </body>
</html>


