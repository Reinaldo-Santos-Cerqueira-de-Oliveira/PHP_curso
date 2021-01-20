<?php require_once("../../conexao/conexao.php"); ?>
<?php
    //testar o parametro vindo de listagem
    if(isset($_GET["codigo"])){
        $produtoID = $_GET["codigo"];
    }else{
        header("Location:listagem.php");
    }
    //consulta ao banco
    $consulta   =   "SELECT * ";
    $consulta  .=   " FROM produtos ";
    $consulta  .=   " WHERE produtoID = {$produtoID} ";
    $detalhe    =   mysqli_query($conecta, $consulta);

    if(!$detalhe){
        die("falha ao conectar com o banco");
    }else{
        $dados_detalhes =   mysqli_fetch_assoc($detalhe);
        $nomeproduto    =   $dados_detalhes["nomeproduto"];
        $descricao      =   $dados_detalhes["descricao"];
        $codigobarra    =   $dados_detalhes["codigobarra"];
        $tempoentrega   =   $dados_detalhes["tempoentrega"];
        $precorevenda   =   $dados_detalhes["precorevenda"];
        $precounitario  =   $dados_detalhes["precounitario"];
        $imagemgrande   =   $dados_detalhes["imagemgrande"];
        $imagempequena  =   $dados_detalhes["imagempequena"];
        $descontinuado  =   $dados_detalhes["descontinuado"];
        $estoque        =   $dados_detalhes["estoque"];
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
        <link href="_css/produto_detalhe.css" rel="stylesheet">

    </head>

    <body>
        <?php include_once("../_incluir/topo.php"); ?>
        <?php include_once("../_incluir/funcoes.php"); ?> 
        
        <main>  
            <div id="detalhe_produto">
                <ul>
                    <li class="imagem"><img src="<?php echo $imagemgrande?>" alt=""></li>
                    <li><h2><?php echo $nomeproduto?></h2></li>
                    <li><?php echo $descricao?></li>
                    <li>Codigo de barras: <?php echo $codigobarra?></li>
                    <li>Tempo de entrega: <?php echo $tempoentrega?> dias</li>
                    <li>Preço de revenda: <?php echo real_format($precorevenda)?></li>
                    <li>Preço unitario: <?php echo real_format($precounitario)?></li>
                    <li>Estoque: <?php echo $estoque?> unidades</li>
                </ul>
            </div>
        </main>

        <?php include_once("../_incluir/rodape.php"); ?>
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>