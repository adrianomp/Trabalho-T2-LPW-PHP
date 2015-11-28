<?php
include_once('conectar.php');
SESSION_START();



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
        </head>
        <body>
            <p>Cadastrar nova oferta</p>
            <form method="post" action="minhas_ofertas.php">
                Nome:      <input type="text" name="nome" /><br/>
                Descricao: <input type="text" name="descricao" /><br/>
                Preco:     <input type="text" name="preco" /><br/> 

                <button type="submit" name="enviar">Entrar</button>

            </form> 
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
            echo "	<td>" . $res['nome'] . "</td>";
            echo "	<td>" . $res['descricao'] . "</td>";
            echo "	<td>" . $res['preco'] . "</td>";
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