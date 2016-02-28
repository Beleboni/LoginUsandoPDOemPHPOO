<?php
include_once 'php/LogarAdmin.php';

session_start();
LogarAdmin::verificaLogado();

if (isset($_GET['ac'])):
    /* DESLOGAR DO SISTEMA */
    if ($_GET['ac'] == 'sair'):
        if (isset($_SESSION['logado'])):
            session_destroy();
            header("Location:index.php");
        endif;
    endif; /* DESLOGAR DO SISTEMA */
endif; /* GET[AC] */

?>

 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>   
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
        <title>Portal de Noticias</title>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="lib/tiny_mce/tiny_mce.js"></script>
    </head>

    <body>

            <div id="logo">
               
                <span id="sair"><a href="?ac=sair">sair</a></span>
            </div>
            <div id="bemvindo">Bem Vindo <?php echo $_SESSION['id']; ?> - </div><!--BEM VINDO-->
            <div id="bemvindo">Bem Vindo <?php echo $_SESSION['nome']; ?> - </div>

            

                

    </body>
</html>