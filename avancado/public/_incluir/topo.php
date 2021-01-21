<header>
    <div id="header_central">
        <?php
            if(isset($_SESSION["user_portal"])){
                $user           =   $_SESSION["user_portal"];
                $saudação       =   " SELECT nomecompleto ";
                $saudação      .=   " FROM clientes ";
                $saudação      .=   " WHERE clienteID = '{$user}' ";
                $saudação_login =   mysqli_query($conecta,$saudação);
                if(!$saudação_login){
                    die(" Falha na consulta ao banco");
                }
                $saudação_login =   mysqli_fetch_assoc($saudação_login);
                $nome = $saudação_login["nomecompleto"];
        ?>
        <div id="header_saudacao">
            <h5>Bem vindo, <?php echo $nome ?> - <a href="logout.php">Logout</a></h5>
        </div>
        <?php
            }
        ?>
        <img src="/../PHP_curso/avancado/public/_assets/logo_andes.gif">
        <img src="/../PHP_curso/avancado/public/_assets/text_bnwcoffee.gif">
    </div>
</header>