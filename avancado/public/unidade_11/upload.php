<?php require_once("../../conexao/conexao.php"); ?>
<?php require_once("../../public/_incluir/funcao_upload.php")?>
<?php

    if(isset($_POST["enviar"])){
        $mensagem   =   publicarArquivo($_FILES['upload']);
    }
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP Integração com MySQL</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
    </head>

    <body>
        <?php include_once("../_incluir/topo.php"); ?>
        <?php include_once("../_incluir/funcoes.php"); ?>  
        
        <main>  
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <input type="file" name="upload" id="upload"><br><BR>
                <input type="submit" name="enviar" value="enviar"><br>
                <?php
                    if(isset($mensagem)){
                        echo $mensagem;
                    }
                ?>
            </form>
        </main>

        <?php include_once("../_incluir/rodape.php"); ?>  
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>