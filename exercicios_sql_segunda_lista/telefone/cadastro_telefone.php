<?php 
    require_once("../includes.php");
    $idcliente = $_GET["idcliente"];
    $numero_telefone = $_GET["numero_telefone"];
    print $numero_telefone.'  '.$idcliente;
    $sql = "INSERT INTO telefone(idcliente, numero_telefone) VALUES ('$idcliente','$numero_telefone')";
    mysqli_query($conn, $sql);
    header("Location: ../cliente/lista_cliente.php");
?>
