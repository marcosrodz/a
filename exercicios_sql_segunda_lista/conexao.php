<?php 

require_once("verifica_sessao.php");

$hostname = "localhost";
$database = "sistema_venda";
$user = "root";
$password = "";

$conn = mysqli_connect($hostname, $user, $password, $database);

if (!$conn) 
{
    die(mysqli_error());
}
else 
{    
    $_SESSION["conexao"] = $conn;
}