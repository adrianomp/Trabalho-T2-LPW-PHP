<?php

//Conecta ao banco
include_once('conectar.php');


if (isset($_POST['enviar'])) {

    $login = $_POST['login'];
    $senha = md5($_POST['senha']);
    date_default_timezone_set('America/Sao_Paulo');
    $data_ts = date('Y-m-d H:i');


// faz o select com base no usuário digitado
    $sql = "select * from cadastro where login = '$login'";

    $query = $pdo->prepare($sql);
    $query->execute();
    // atribui o resultado do select a um array
    $data = $query->fetchAll();

//Verifica se retornou dados do banco, baseado no login
    if (array_key_exists(0, $data)) {
// verifica se a senha é a correta
        if ($senha == $data[0]['senha']) {
            if ($data[0]['ativo'] == 0) {
                // Se o status do usuário que tentou se logar for inativo, um novo token será gerado e a data do banco será atualizada, para mais tarde validarmos a expiração
                $sql = "UPDATE cadastro SET data_ts= '$data_ts' WHERE login='$login'";
                $query = $pdo->prepare($sql);
                $query->execute();

                echo 'Usuário inativo, um novo token está sendo mandado para o seu email';

                // Criar as variaveis para validar o email
                $url = sprintf('id=%s&email=%s&uid=%s&key=%s', $data[0]['id_cadastro'], md5($data[0]['email']), md5($data[0]['uid']), md5($data_ts));

                $mensagem = 'Para confirmar seu cadastro acesse o link:' . "\n";
                $mensagem .= sprintf('http://pswfaeterj2015.16mb.com/T2/ativar.php?%s', $url);


// O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822.
// O return-path deve ser ser o mesmo e-mail do remetente.
                $headers = "MIME-Version: 1.1\r\n";
                $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
                $headers .= "From: cadastro@pswfaeterj2015.16mb.com\r\n"; // remetente
                $headers .= "Return-Path: cadastro@pswfaeterj2015.16mb.com"; // return-path
                $envio = mail($data[0]['email'], "Confirmacao de cadastro", $mensagem, $headers);

                if ($envio) {
                    echo "Mensagem enviada com sucesso";
                } else {
                    echo "A mensagem não pode ser enviada";
                }
            } else {
                // cria a sessão na  home
                session_start();
                $_SESSION["usuario"] = $login;
                Header("location: index.php");
            }
        } else {
            $msgErro = "Login/senha incorreto!";
            require_once("index.php");
        }
    } else {
        $msgErro = "Login/senha incorreto!";
        require_once("index.php");
    }
}