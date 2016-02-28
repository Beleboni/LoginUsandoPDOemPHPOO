<?php

include_once 'php/LogarAdmin.php';
session_start();



if (isset($_POST['logar'])):
    $logar = new LogarAdmin();
    $logar->setUsuario($_POST['usuario']);
    $logar->setSenha($_POST['senha']);
    $logar->logar();

    if ($logar->getErro()):
        $erro = $logar->getErro();
    else:
        header("Location:logado.php");
    endif;


endif;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>   
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
        <title>Portal de Noticias</title>
        <link href="style_login.css" rel="stylesheet" type="text/css" />
    </head>

    <body>

        <h2>
            <span id="logo">Portal NetNoticias</span>
            <br />
            Digite seu usuário e senha
        </h2>


        <div id="login">

            <form action="" method="POST">

                <label for="usuario">Usuário:</label>    
                <input type="text" name="usuario" class="input" />

                <label for="senha">Senha:</label>    
                <input type="text" name="senha"class="input" />

                <label for="submit"></label>    
                <input type="submit" name="logar" value="ok" class="input_submit" />

            </form>

            <?php echo isset($erro) ? '<div id="erro">' . $erro . '</div>' : ""; ?>

        </div>
    </body>
</html>