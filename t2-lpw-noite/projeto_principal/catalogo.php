<?php
//inclui as bibliotecas
include_once('conectar.php');
//determina o numero de registros que serão mostrados na tela
$maximo = 10;
//pega o valor da pagina atual
$pagina = isset($_GET['pagina']) ? ($_GET['pagina']) : '1';

//subtraimos 1, porque os registros sempre começam do 0 (zero), como num array
$inicio = $pagina - 1;
//multiplicamos a quantidade de registros da pagina pelo valor da pagina atual 
$inicio = $maximo * $inicio;

//fazemos um select na tabela que iremos utilizar para saber quantos registros ela possui
$sql = "SELECT COUNT(*) AS 'total_itens' FROM catalogo_itens";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$strCount = $stmt->fetchAll(PDO::FETCH_ASSOC);




//iniciamos uma var que será usada para armazenar a qtde de registros da tabela  
$total = 0;
if (count($strCount)) {
    foreach ($strCount as $row) {
        //armazeno o total de registros da tabela para fazer a paginação
        $total = $row["total_itens"];
    }
}
//guardo o resultado na variavel pra exibir os dados na pagina		

$sql = "SELECT * FROM catalogo_itens ORDER BY descricao LIMIT $inicio,$maximo";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE HTML>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width" />
        <title>Catalogo</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css" />
        <link rel="stylesheet" type="text/css" href="css/reset.css" />
    </head>
    <body>
        <table class="tabela1">
            <colgroup>
                <col class="coluna1"/>
                <col class="coluna2"/>
                <col class="coluna3"/>
            </colgroup>
            <caption>Catalogo</caption>			
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
                        if ($logado) {
                            echo "	<td>" . $res['descricao'] . "</td>";
                            echo "	<td>" . $res['preco'] . "</td>";
                        } else {
                            echo "	<td>Para ver a descrição, faça login</td>";
                            echo "	<td>Para ver o preço, faça login</td>";
                        }
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>			
        </table>
        <!-- depois de preencher a tabela com os valores, criamos os botoes de paginação -->		
        <div id="alignpaginacao">
            <?php
            //determina de quantos em quantos links serão adicionados e removidos
            $max_links = 6;
            //dados para os botões
            $previous = $pagina - 1;
            $next = $pagina + 1;
            //usa uma funcção "ceil" para arrendondar o numero pra cima, ex 1,01 será 2
            $pgs = ceil($total / $maximo);
            //se a tabela não for vazia, adiciona os botões
            if ($pgs > 1) {
                echo "<br/>";
                //botao anterior
                if ($previous > 0) {
                    echo "<div id='botaoanterior'><a href=" . $_SERVER['PHP_SELF'] . "?pagina=$previous><input type='submit'  name='bt-enviar' id='bt-enviar' value='Anterior' class='button' /></a></div>";
                } else {
                    echo "<div id='botaoanteriorDis'><a href=" . $_SERVER['PHP_SELF'] . "?pagina=$previous><input type='submit'  name='bt-enviar' id='bt-enviar' value='Anterior' class='button' disabled='disabled'/></a></div>";
                }

                echo "<div id='numpaginacao'>";
                for ($i = $pagina - $max_links; $i <= $pgs; $i++) {
                    if ($i <= 0) {
                        //enquanto for negativo, não faz nada
                    } else {
                        //senão adiciona os links para outra pagina
                        if ($i != $pagina) {
                            if ($i == $pgs) { //se for o final da pagina, coloca tres pontinhos
                                echo "<a href=" . $_SERVER['PHP_SELF'] . "?pagina=" . ($i) . ">$i</a> ...";
                            } else {
                                echo "<a href=" . $_SERVER['PHP_SELF'] . "?pagina=" . ($i) . ">$i</a>";
                            }
                        } else {
                            if ($i == $pgs) { //se for o final da pagina, coloca tres pontinhos
                                echo "<span class='current'> " . $i . "</span> ...";
                            } else {
                                echo "<span class='current'> " . $i . "</span>";
                            }
                        }
                    }
                }

                echo "</div>";

                //botao proximo
                if ($next <= $pgs) {
                    echo " <div id='botaoprox'><a href=" . $_SERVER['PHP_SELF'] . "?pagina=$next><input type='submit'  name='bt-enviar' id='bt-enviar' value='Proxima' class='button'/></a></div>";
                } else {
                    echo " <div id='botaoproxDis'><a href=" . $_SERVER['PHP_SELF'] . "?pagina=$next><input type='submit'  name='bt-enviar' id='bt-enviar' value='Proxima' class='button' disabled='disabled'/></a></div>";
                }
            }
            ?>	
        </div>
    </body>
</html>	