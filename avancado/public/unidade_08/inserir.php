<?php require_once("../../conexao/conexao.php"); ?>
<?php
    if(isset($_POST["nometransportadora"])){
        $nome               =   $_POST["nometransportadora"];
        $endereco           =   $_POST["endereco"];
        $telefone           =   $_POST["telefone"];
        $cidade             =   $_POST["cidade"];
        $estados            =   $_POST["estados"];
        $cep                =   $_POST["cep"];
        $cnpj               =   $_POST["cnpj"];

        $inserir            =   "INSERT INTO transportadoras ";
        $inserir           .=   "(nometransportadora, endereco, telefone, cidade, estadoID, cep, cnpj) ";
        $inserir           .=   "VALUES ";
        $inserir           .=   "('$nome','$endereco','$telefone','$cidade',$estados,'$cep','$cnpj')";
        $operecao_inserir   =   mysqli_query($conecta, $inserir);
        if(!$operecao_inserir){
            die("falha na consulta ao banco");  
        }
    }

    $select         =   "SELECT estadoID, nome FROM estados ";
    $lista_estados  =   mysqli_query($conecta,$select);
    if( !$lista_estados){
        die("Erro na consulta ao banco");
    }  
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP Integração com MySQL</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="../unidade_09/_css/alteracao.css" rel="stylesheet">

    </head>

    <body>
        <?php include_once("../_incluir/topo.php"); ?>
        <?php include_once("../_incluir/funcoes.php"); ?> 
        
        <main>  
            <div id="janela_formulario">
                <form action="inserir.php" method="post">
                    <input type="text" name="nometransportadora" id="nometransportadora" placeholder="Nome da transportadora">
                    <input type="text" name="endereco" id="endereco" placeholder="Endereço">
                    <input type="text" name="telefone" id="telefone" placeholder="Telefone">
                    <input type="text" name="cidade" id="cidade" placeholder="Cidade">
                    <select name="estados" id="estados" >
                        <?php
                            while ($linha = mysqli_fetch_assoc($lista_estados)){
                        ?>
                                <option value="<?php echo $linha["estadoID"]?>">
                                    <?php echo $linha["nome"]?>
                                </option>
                        <?php
                            }
                        ?>
                    </select>
                    <input type="text" name="cep" id="cep" placeholder="CEP">
                    <input type="text" name="cnpj" id="cnpj" placeholder="CNPJ">
                    <input type="submit" value="Cadastrar">
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