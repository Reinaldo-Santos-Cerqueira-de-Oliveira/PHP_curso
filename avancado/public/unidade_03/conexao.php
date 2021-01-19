<?php
    require_once("../../conexao/conexao.php");
        //passo 4 consulta
        $consulta_produtos  =   "SELECT nomeproduto, precounitario, tempoentrega,codigobarra ";
        $consulta_produtos .= " FROM produtos ";
        $consulta_produtos .= " WHERE tempoentrega = 5 ";
    
        $produtos   = mysqli_query($conecta,$consulta_produtos);
    
        if(!$produtos){
            die("Falha na consulta ao banco de dados");
        }
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP Integração com MySQL</title>
    </head>

    <body>
    <!--Passo 5 fazer a mostrar-->
        <ul style="list-style:none">
            <?php
                while ($registro = mysqli_fetch_assoc($produtos)){
            ?>                
                    <li><?php   echo" {$registro['nomeproduto']} "?></li>
                    <li><?php   echo" {$registro['precounitario']} "?></li>
                    <li><?php   echo" {$registro['tempoentrega']} "?></li>
                    <li><?php   echo" {$registro['codigobarra']} "?></li>
            <?php
                }
            ?>
            </ul>
            <?php
                // fechar a consulta
                mysqli_free_result($produtos);
            ?>
            
    </body>
</html>
<!--passo 3 fechamento da conexao-->
<?php

mysqli_close($conecta);

?>