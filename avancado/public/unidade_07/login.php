<?php require_once("../../conexao/conexao.php"); ?>
<?php
    session_start();
    if( isset($_POST["usuario"]) ){
        $usuario    =   $_POST["usuario"];
        $senha      =   $_POST["senha"];

        //consulta no banco de dados
        $login      =   "SELECT * ";
        $login     .=   " FROM clientes ";
        $login     .=   " WHERE usuario = '{$usuario}' and senha = '{$senha}' ";
        $acesso     =   mysqli_query($conecta, $login);
        if( !$acesso){
            die("falha na consulta ao banco");
        }
        $informacao = mysqli_fetch_assoc($acesso);
        if( empty($informacao) ) {
            $mensagem   = "Login  sem sucesso";
        }else{  
            $_SESSION["user_portal"]    =   $informacao["clienteID"];
            header("location:listagem.php");
        }
    }
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP Integração com MySQL</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/login.css" rel="stylesheet">

    </head>

    <body>
        <?php include_once("../_incluir/topo.php"); ?>
        <?php include_once("../_incluir/funcoes.php"); ?>
        
        <main>  
            <div id="janela_login">
                <form method="post" action="login.php">
                    <h2>Tela login</h2>
                    <input type="text" name="usuario" id="usuario" placeholder="Digite seu usuario" autocomplete="off">
                    <input type="password" name="senha" id="senha" placeholder="Digite sua senha">
                    <input type="submit" value="Login">
                    <?php
                        if( isset($mensagem) ){
                    ?>
                        <p><?php echo $mensagem; ?></p>
                    <?php
                        }
                    ?>
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