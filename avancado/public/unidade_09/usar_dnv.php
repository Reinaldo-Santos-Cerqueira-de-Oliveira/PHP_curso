<?php
    if(isset($_POST["nometransportadora"])){
        $nometransportadora_alterado    =   $_POST["nometransportadora"]; 
        $endereco_alterado              =   $_POST["endereco"]; 
        $telefone_alterado              =   $_POST["telefone"]; 
        $cidade_alerado                 =   $_POST["cidade"]; 
        $estadoID_alterado              =   $_POST["estados"]; 
        $cep_alterado                   =   $_POST["cep"]; 
        $cnpj_alterado                  =   $_POST["cnpj"];
        $transportadoID_alterado        =   $_POST["transportadoraID"];

        $alterar    =   "UPDATE transportadora ";
        $alterar   .=   "SET ";
        $alterar   .=   " nometransportadora = '{$nometransportadora_alterado}', ";
        $alterar   .=   " endereco = '{$endereco_alterado}', ";
        $alterar   .=   " telefone = '{$telefone_alterado}',  ";
        $alterar   .=   " cidade = '{$cidade_alerado}', ";
        $alterar   .=   " estadoID = '{$estadoID_alterado}', ";
        $alterar   .=   " cep = '{$cep_alterado}', ";
        $alterar   .=   " cnpj = '{$cnpj_alterado}', ";
        $alterar   .=   " transportadoraID = '{$transportadoID_alterado}' ";
        $operacao_alterar   =   mysqli_query($conecta, $alterar);
            if(!$operacao_alterar){
                die("Falha na consulta ao banco");
            }   
    }
?>