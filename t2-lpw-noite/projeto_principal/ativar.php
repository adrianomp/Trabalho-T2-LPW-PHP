<?php

//Função para splitar dois dados, usei para separar as informações da data/hora
function splitaString($dados, $separador) {
    $partes = explode($separador, $dados);
    return $partes;
}

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
    $dataHoraAtualServidor = date('Y-m-d H:i');
    $dataHoraCadastradaNoBanco = $data[0]['data_ts'];

    $dataHoraAtualServidorSplitada = splitaString($dataHoraAtualServidor, " ");
    $dataHoraCadastradaNoBancoSplitada = splitaString($dataHoraCadastradaNoBanco, " ");

    $dataAtualServidor = $dataHoraAtualServidorSplitada[0];
    $dataCadastradaNoBanco = $dataHoraCadastradaNoBancoSplitada[0];

    if ($dataAtualServidor != $dataCadastradaNoBanco) {
        echo "Token expirado, o token gerado tem validade de uma hora";
    } else {
        $horarioAtualCompletoServidor = $dataHoraAtualServidorSplitada[1];
        $horarioCompletoCadastradoNoBanco = $dataHoraCadastradaNoBancoSplitada[1];

        $horarioAtualCompletoServidorSplitada = splitaString($horarioAtualCompletoServidor, ':');
        $horarioCompletoCadastradoNoBancoSplitada = splitaString($horarioCompletoCadastradoNoBanco, ':');

        $horaAtualServidor = $horarioAtualCompletoServidorSplitada[0];
        $horaCadastradaNoBanco = $horarioCompletoCadastradoNoBancoSplitada[0];

        $minutosAtualServidor = $horarioAtualCompletoServidorSplitada[1];
        $minutosCadastradaNoBanco = $horarioCompletoCadastradoNoBancoSplitada[1];

        $diferencaDeHorario = ($horaAtualServidor * 60 + $minutosAtualServidor) - ($horaCadastradaNoBanco * 60 + $minutosCadastradaNoBanco);

// Se a diferença entre o horário que o token for gerado e o horário que o usuário tentou validar o email, for superior a 60 minutos, o token irá expirar
        if ($diferencaDeHorario > 60) {
            echo "Token expirado, o token gerado tem validade de uma hora";
        } else {
//Ativa o usuário, caso o mesmo valide o email em menos de 60 minutos
            if ($valido === true) {
                $sql = "update cadastro set ativo='1' where id_cadastro='$id'";
                $query = $pdo->prepare($sql);
                $query->execute();
                $msgErro = "Cadastro ativado com sucesso!";
                require_once("logar_usuario.php");
            } else {
                echo "Informacoes invalidas";
            }
        }
    }
}
?>
		