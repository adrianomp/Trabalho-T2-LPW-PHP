<?php

function Split($dados, $separador) {
    $partes = explode($separador, $dados);
    return $partes;
}

// Novamente, nao irei fazer nenhum tipo de checagem para validar os dados
// em busca de SQL Injection ou coisas do genero. Nao se esqueca voce de fazer
// isso.
// Conectar no banco de dados
include_once('conectar.php');

// Dados vindos pela url
$id = $_GET['id'];
$emailMd5 = $_GET['email'];
$uidMd5 = $_GET['uid'];
$dataMd5 = $_GET['key'];

//Buscar os dados no banco
$sql = "select * from cadastro where id_cadastro = '$id'";


$query = $pdo->prepare($sql);
$query->execute();

$data = $query->fetchAll();


// Comparar os dados que pegamos no banco, com os dados vindos pela url
$valido = true;

if ($emailMd5 !== md5($data[0]['email'])) {
    $valido = false;
}
if ($uidMd5 !== md5($data[0]['uid'])) {
    $valido = false;
}
if ($dataMd5 !== md5($data[0]['data_ts'])) {
    $valido = false;
} else {
    date_default_timezone_set('America/Sao_Paulo');
    $dataHoraAtualServidor = date('Y-m-d H:i:s');
    $dataHoraCadastradaNoBanco = $data[0]['data_ts'];

    $dataHoraAtualServidorSplitada = Split($dataHoraAtualServidor, " ");
    $dataHoraCadastradaNoBancoSplitada = Split($dataHoraCadastradaNoBanco, " ");

    $dataAtualServidor = $dataHoraAtualServidorSplitada[0];
    $dataCadastradaNoBanco = $dataHoraCadastradaNoBancoSplitada[0];

    if ($dataAtualServidor != $dataCadastradaNoBanco) {
        echo "Token expirado, o token gerado tem validade de uma hora";
    } else {
        $horarioAtualCompletoServidor = $dataHoraAtualServidorSplitada[1];
        $horarioCompletoCadastradoNoBanco = $dataHoraCadastradaNoBancoSplitada[1];

        $horarioAtualCompletoServidorSplitada = Split($horarioAtualCompletoServidor, ':');
        $horarioCompletoCadastradoNoBancoSplitada = Split($horarioCompletoCadastradoNoBanco, ':');

        $horaAtualServidor = $horarioAtualCompletoServidorSplitada[0];
        $horaCadastradaNoBanco = $horarioCompletoCadastradoNoBancoSplitada[0];

        if ($horaAtualServidor > $horaCadastradaNoBanco + 1) {
            echo "Token expirado, o token gerado tem validade de uma hora";
        } else {

            if ($valido === true) {
                $sql = "update cadastro set ativo='1' where id_cadastro='$id'";
                $query = $pdo->prepare($sql);
                $query->execute();
                echo "Cadastro ativado com sucesso!";
            } else {
                echo "Informacoes invalidas";
            }
        }
    }
}
?>
	