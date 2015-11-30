<?php
include_once('conectar.php');
SESSION_START();
$logado = isset($_SESSION["usuario"]);


if (isset($_SESSION["usuario"])) {

    $ofertante = $_SESSION["usuario"];

    $sql = "select * from catalogo_itens where ofertante = '$ofertante'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
            <table class="tabela1">
                <colgroup>
                    <col class="coluna1"/>
                    <col class="coluna2"/>
                    <col class="coluna3"/>
                </colgroup>
                <caption>Minhas Ofertas Cadastradas</caption>   
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descricao</th>
                        <th>Preco</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //se a tabela nao estiver vazia, percorremos linha por linha pegando os valores
                    if (count($resultado)) {
                        foreach ($resultado as $res) {
                            echo "<tr>";
                            echo " <td>" . $res['nome'] . "</td>";
                            echo " <td>" . $res['descricao'] . "</td>";
                            echo " <td>" . $res['preco'] . "</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>   
            </table>

        </body>
    </html> 

    <?php
} else {
    echo "Voce não pode fazer isso";
}
?>