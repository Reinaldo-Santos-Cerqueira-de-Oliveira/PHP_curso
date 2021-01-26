<?php
    function enviarMensagem($dados){
        //dados do formulario
        $nome       =   $dados['nome'];
        $email      =   $dados['email'];
        $mensagem   =   $dados['mensagem'];

        //variaveis de envio
        $destino    =   "kingnaldoreinaldo@gmail.com";
        $remetente  =   "reiunaq@outlook.com";
        $assunto    =   "teste";


        //Montar corpo do email
        $mensagem_email      =  "O usuario " . $nome . "envio uma mensagem " . "<br>";
        $mensagem_email     .=  "email do usuario " . $email . " <br>";
        $mensagem_email     .=  "mensagem : " . " <br>";
        $mensagem_email     .=  $mensagem;

        return mail($destino, $assunto, $mensagem, $remetente);
    }
?>