<?php

define("HOST", "localhost");
define("DB", "colegio1");
define("USER", "root");
define("PASS", "");

define('INCLUDE_PATH',"http://localhost/Meus_Projetos/Colegio_3_2/");
define("INCLUDE_PATH_ADMIN", INCLUDE_PATH."PHP/admin/");
define("INCLUDE_PATH_ALUNO", INCLUDE_PATH."PHP/aluno/");

function selecionadoMenu($par){
    $url = explode('/',@$_GET['url'])[0];
    if($url == $par){
        echo 'class="menu-active"';
    }
}

try{
    $pdo = new PDO("mysql:host=".HOST.";dbname=".DB,USER,PASS,array(PDO::
        MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch(Exception $e){
    echo "<h1>erro ao conectar</h1>";
}

