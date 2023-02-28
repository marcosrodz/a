<?php 

require_once("verifica_sessao.php");

$hostname = "localhost";
$db_name =  "sistema_venda";
$username = "root";
$password = "";

$conn = mysqli_connect($hostname, $username, $password, $db_name);

if (!$conn)
{
    die(mysqli_error());
}
else 
{   
    $_SESSION["conexao"] = $conn;    
}