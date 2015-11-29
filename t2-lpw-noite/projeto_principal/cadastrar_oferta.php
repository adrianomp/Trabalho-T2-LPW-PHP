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
    ?>

    <!DOCTYPE HTML>
    <html lang="pt-BR">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width" />
            <title>Minhas Ofertas</title>
            <link rel="stylesheet" type="text/css" href="css/estilo.css" />
            <link rel="stylesheet" type="text/css" href="css/reset.css" />
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link href="css/heroic-features.css" rel="stylesheet">
        </head>
        <body>
            <?php
            require_once("menu_superior.php");
            ?>
            <p>Cadastrar nova oferta</p>
            <form method="post" action="cadastrar_oferta.php">
                Nome:      <input type="text" name="nome" /><br/>
                Descricao: <input type="text" name="descricao" /><br/>
                Preco:     <input type="text" name="preco" /><br/> 

                <button type="submit" name="enviar">Entrar</button>

            </form> 


        </body>
    </html>	

    <?php
} else {
    echo "Voce não pode fazer isso";
}
?>