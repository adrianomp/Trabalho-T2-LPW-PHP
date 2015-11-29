<?php
//Conexão com o banco
include_once('conectar.php');

function validaEmail($email) {
    $conta = "/^[a-zA-Z0-9\._-]+@";
    $domino = "[a-zA-Z0-9\._-]+.";
    $extensao = "([a-zA-Z]{2,4})$/";
    $pattern = $conta . $domino . $extensao;
    if (preg_match($pattern, $email))
        return true;
    else
        return false;
}

function validaSenha($senha) {
    $uppercase = preg_match('@[A-Z]@', $senha);
    $lowercase = preg_match('@[a-z]@', $senha);
    $number = preg_match('@[0-9]@', $senha);

    if (!$uppercase || !$lowercase || !$number || strlen($senha) < 6) {
        return false;
    }
    return true;
}


function validaUsuarioDuplicado($login,$pdo) {
    $sql = "select * from cadastro where login = '$login'";
    $query = $pdo->prepare($sql);
    $query->execute();
    $data = $query->fetchAll();
    if($data){
        return false;
    }
    return true;
   
}

// Recebe os dados do post, recebe a senha com hash, cria um user id randomico(Token para validar o email),gera a data atual para fazer com que o token expire e define a conta como inativa
if (isset($_POST['enviar'])) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $uid = uniqid(rand(), true);
    date_default_timezone_set('America/Sao_Paulo');
    $data_ts = date('Y-m-d H:i');
    $ativo = 0;

    //valida usuario duplicado
    if (validaUsuarioDuplicado($login,$pdo) == true) {
        //valida email
        if (validaEmail($email) == true) {
            //valida senha
            if (validaSenha($senha) == true) {

                $senha = md5($senha);
                $sql = "insert into cadastro ( id_cadastro, nome, email, login, senha,
data_ts, uid,
ativo ) ";
                $sql .= "values
('', '$nome','$email','$login','$senha','$data_ts','$uid','$ativo')";


                $stmt = $pdo->prepare($sql);
                $stmt->execute();

                $id = $pdo->lastInsertId();


// Criar as variaveis para validar o email
                $url = sprintf('id=%s&email=%s&uid=%s&key=%s', $id, md5($email), md5($uid), md5($data_ts));

                $mensagem = 'Para confirmar seu cadastro acesse o link:' . "\n";
                $mensagem .= sprintf('http://pswfaeterj2015.16mb.com/T2/ativar.php?%s', $url);


// O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822.
// O return-path deve ser ser o mesmo e-mail do remetente.
                $headers = "MIME-Version: 1.1\r\n";
                $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
                $headers .= "From: cadastro@pswfaeterj2015.16mb.com\r\n"; // remetente
                $headers .= "Return-Path: cadastro@pswfaeterj2015.16mb.com"; // return-path
                $envio = mail($email, "Confirmacao de cadastro", $mensagem, $headers);

                if ($envio) {
                    echo "Mensagem enviada com sucesso";
                } else {
                    echo "A mensagem não pode ser enviada";
                }
            } else {
                $msgErroSenha = "A senha tenha ao menos 6 caracteres, combinado o uso de letras com números, e entre as letras caixa baixa e alta!";
                require_once("cadastrar_usuario.php");
            }
        } else {
            $msgErroEmail = "Email no formato invalido!";
            require_once("cadastrar_usuario.php");
        }
    } else {
        $msgErroUsuario = "Usuário já existe!";
        require_once("cadastrar_usuario.php");
    }
}
?>

