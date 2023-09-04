<?php 
require 'environment.php';

$config = array();

if(ENVIRONMENT == 'development') {
    define("BASE_URL", "http://localhost/Controle_de_ordem_de_Servico/");//criado para ser utilizado ao pegar arquivos de imagem, css, javascript..
    $config['dbname'] = 'controle_de_os';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
}else{
    define("BASE_URL", "http://hostgator/Controle_de_ordem_de_Servico/");
    $config['dbname'] = 'controle_de_os';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'saulogator';
    $config['dbpass'] = '123';
}

$options = [PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"];

global $db;
try{
    $db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass'],$options);

}catch(PDOException $e) {
    echo "ERRO:".$e->getMessage();
    exit;
}