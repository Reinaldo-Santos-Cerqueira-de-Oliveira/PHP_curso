<?php require_once("../../conexao/conexao.php"); ?>
<?php

    if (isset($_POST["nometransportadora"])){
        $nome       = $_POST["nometransportadora"];
        $endereco   = $_POST["endereco"];
        $cidade     = $_POST["cidade"];
        $estado     = $_POST["estados"];
        $cep        =   $_POST["cep"];
        $cnpj       =   $_POST["cnpj"];
        $telefone   =   $_POST["telefone"];
        $tID        =   $_POST["transportadoraID"];

        $alterar            =   " UPDATE transportadoras ";
        $alterar           .=   " SET ";
        $alterar           .=   " nometransportadora = '{$nome}', ";
        $alterar           .=   " endereco = '{$endereco}', ";
        $alterar           .=   " cidade = '{$cidade}', ";
        $alterar           .=   " estadoID = {$estado}, ";
        $alterar           .=   " cep = '{$cep}', ";
        $alterar           .=   " cnpj = '{$cnpj}', ";
        $alterar           .=   " telefone = '{$telefone}' ";
        $alterar           .=   " WHERE transportadoraID = {$tID} ";
        $operacao_alterar   =   mysqli_query($conecta, $alterar);
        if(!$operacao_alterar){
            die("Error na consulta ao banco de dados");
        }else{
            header("location:listagem.php");
        }


    }

    $tr =   "SELECT * FROM transportadoras ";
    if(isset($_GET["codigo"])){
        $id  = $_GET["codigo"];
        $tr .=   " WHERE transportadoraID = {$id} ";
    }else{
        $tr .=   " WHERE transportadoraID = 1 ";
    }
    $con_transportadora    =   mysqli_query($conecta, $tr);
    if(!$con_transportadora){
        die("Falha na consulta ao banco de dados");
    }
    $info_transportadora    = mysqli_fetch_assoc($con_transportadora);

    $estados        =   "SELECT * FROM estados ";
    $lista_estados  =   mysqli_query($conecta, $estados);
    if(!$lista_estados){die("Falha na consulta ao banco de dados");}


?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP Integração com MySQL</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/alteracao.css" rel="stylesheet">

    </head>

    <body>
        <?php include_once("../_incluir/topo.php"); ?>
        <?php include_once("../_incluir/funcoes.php"); ?> 
        
        <main>  
            <div id="janela_formulario">
                <form action="alteracao.php" method="post">
                    <h2>Alterar dados de transportadora</h2>
                    <label for="nometransportadora">Nome da Transportadora</label>
                    <input type="text" name="nometransportadora" id="nometransportadora" value="<?php echo $info_transportadora["nometransportadora"]?>">
                    <label for="endereco">Endereco</label>
                    <input type="text" name="endereco" id="endereco" value="<?php echo $info_transportadora["endereco"]?>">
                    <label for="cidade">Cidade</label>
                    <input type="text" name="cidade" id="cidade" value="<?php echo $info_transportadora["cidade"]?>">
                    <label for="estados">Estados</label>
                    <select name="estados" id="estados">
                        <?php
                            $meu_estado = $info_transportadora["estadoID"];
                            while ($linha = mysqli_fetch_assoc($lista_estados)){
                                $estado_principal   =   $linha["estadoID"];
                                if( $meu_estado == $estado_principal ){ 
                        ?>
                                    <option value="<?php echo $linha["estadoID"]?>" selected>
                                        <?php echo $linha["nome"]?>
                                    </option>
                        <?php
                                }else{

                        ?>
                                    <option value="<?php echo $linha["estadoID"]?>">
                                        <?php echo $linha["nome"]?>
                                    </option>
                        <?php
                                }
                            }
                        ?>
                    </select>
                    <label for="telefone">Telefone</label>
                    <input type="text" name="telefone" id="telefone" value="<?php echo $info_transportadora["telefone"]?>">
                    <label for="cep">CEP</label>
                    <input type="text" name="cep" id="cep" value="<?php echo $info_transportadora["cep"]?>">
                    <label for="cnpj">CNPJ</label>
                    <input type="text" name="cnpj" id="cnpj" value="<?php echo $info_transportadora["cnpj"]?>">
                    <input type="hidden" name="transportadoraID" value="<?php echo $info_transportadora["transportadoraID"]?>">                  
                    <input type="submit" value="Confirmar Alterações">
                </form>
            </div>
        </main>

        <?php include_once("../_incluir/rodape.php"); ?>  
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>