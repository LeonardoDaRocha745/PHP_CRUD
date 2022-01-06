<?php  
// aqui criaremos uma variável onde será armazenado o endereço do banco de dados
$hostname = "localhost";
// nome do bando de dados
$bancodedados = "crud_clientes";
//usuario do phpmyadmin
$usuario = "root";
$senha = "";

$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);

if($mysqli -> connect_errno){
echo "Não foi possivel fazer a conexão: Erro:". $mysqli-> connect_errno . " " .$mysqli-> connect_error; 
}





