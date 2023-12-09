<?php
require "../config.php";

session_start();
$confirmacao = false;
$confirmacao2 = false;

if(isset($_SESSION["loginADM"])){
    if($_SESSION["loginADM"]){
        $confirmacao = $_SESSION["loginADM"];
    }
}
if(isset($_SESSION["logado"])){
    $confirmacao2 = $_SESSION["logado"];
}

if(!$confirmacao){
    header("location: ".INCLUDE_PATH);
    die();
    //Recommended by the teacher to use die()
}
$usuario = $_SESSION["usuario"];
$senha = $_SESSION["senha"];




?>

<html>
    <head>
        <meta charset="utf-8"/>
        <link href="<?php echo INCLUDE_PATH_ADMIN; ?>../../CSS/estiloAdmin.css" type="text/css" rel="stylesheet"/>
        <title>Page Admin</title>
    </head>
    <body>
        <main>
        <nav id="meu_nav">
                <ul id="atividade">
                    <li>
                        <form method="POST">
                            <input type="submit" name="acao" value="Fazer Logout"/>
                            <?php
                                if(isset($_POST["acao"])){
                                    session_destroy();
                                    header("location: ".INCLUDE_PATH);
                                }
                            ?>
                        </form>    
                    </li>
                </ul>
            </nav>
            <div class="menu">
                <a <?php selecionadoMenu('visual'); ?> href="<?php echo INCLUDE_PATH_ADMIN; ?>visual">Visualização</a>
                <a <?php selecionadoMenu('alterar'); ?> href="<?php echo INCLUDE_PATH_ADMIN; ?>alterar">Alteração</a>

            </div><!--menu-->
            
            <?php 
                $url = isset($_GET["url"]) ? $_GET["url"] : "alterar";

                if(file_exists($url.".php")){
                    include($url.".php");
                }else{
                    include("../404.php");
                    $pagina404 = true;
                }
            ?>
            </main>
        <footer>
            <p>Todos os direitos reservados</p>
        </footer>
        <script src="<?php echo INCLUDE_PATH_ADMIN; ?>../../JS/jquery.js"></script>
        <script src="<?php echo INCLUDE_PATH_ADMIN; ?>../../JS/function.js"></script>
    </body>
</html>