<?php
    //criar conexao com o banco de dadas
    //passo 1
    $servidor   =   "localhost";
    $usuario    =   "root";
    $senha      =   "";
    $banco      =   "andes";
    $conecta    =   mysqli_connect($servidor,$usuario,$senha,$banco);
    //passo 2 ver se tem erro
    if(mysqli_connect_errno()){
        die("conexao falhou" . mysqli_connect_errno());
    }

?>