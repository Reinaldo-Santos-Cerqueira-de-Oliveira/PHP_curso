<?php require_once("../../conexao/conexao.php"); ?>
<?php
    //consulta ao banco de dados
    $produto    =   "SELECT produtoID, nomeproduto, tempoentrega, precounitario, imagempequena ";
    $produto   .=   " FROM produtos ";
    $resultado  =   mysqli_query($conecta,$produto);  
    if(!$resultado){
        die("Falha na consulta");
    }  
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Curso PHP Integração com MySQL</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/produtos.css" rel="stylesheet">


    </head>

    <body>
        <header>
            <?php include_once("../_incluir/topo.php"); ?>
            <?php include_once("../_incluir/funcoes.php"); ?>
        </header>

        <main>  
            <div id="listagem_produtos">
                <?php
                    while($linha = mysqli_fetch_assoc($resultado)){
                ?>
                    <ul>
                        <li class="imagem"><img src="<?php echo $linha["imagempequena"]?>"></li>
                        <li><h3><?php echo $linha["nomeproduto"]?></h3></li>
                        <li>Tempo de entrega: <?php echo $linha["tempoentrega"]?> Dias </li>
                        <li>Preço unitario: <?php echo real_format($linha["precounitario"])?></li>
                    </ul>
                <?php        
                    }
                ?>
            </div>

        </main>
        <footer>
            <?php include_once("../_incluir/rodape.php"); ?> 
        </footer>
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>