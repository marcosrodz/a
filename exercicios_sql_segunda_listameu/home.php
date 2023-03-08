<?php 
require_once("verifica_usuario_logado.php");

?>

<ul>
    <li><a href="form_cliente.php">Cadastrar Cliente</a></li>
    <li><a href="lista_cliente.php"></a></li>
    <li><a href=""></a></li>
    <li><a href="logout.php">Sair</a></li>
</ul>   

<?php 

echo "bem vindo :".$_SESSION["usuario_logado"];