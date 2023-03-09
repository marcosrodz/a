<?php
    require_once("../includes.php");
    $idcliente = $_GET["idcliente"];
    $cep = $_GET["cep"];
    $logradouro = $_GET["logradouro"];
    $numero = $_GET["numero_endereco"];
    $bairro = $_GET["nome_bairro"];
    $cidade = $_GET["nome_cidade"];
    $estado = $_GET["nome_estado"];
    print $cep.'  '.$idcliente;

    $sql_verifica_estado = "SELECT * FROM `estado` WHERE nome_estado = '$estado';";
    $query_estado = mysqli_query($conn, $sql_verifica_estado);
    $sql_verifica_cidade = "SELECT * FROM `cidade` WHERE nome_estado = '$cidade';";
    $query_cidade = mysqli_query($conn, $sql_verifica_cidade);
    $sql_verifica_bairro = "SELECT * FROM `bairro` WHERE nome_estado = '$bairro';";
    $query_bairro = mysqli_query($conn, $sql_verifica_bairro);
    $verificaveis = ['$query_estado','$query_cidade','$query_bairro'];
    for ($i=0; $i < 3; $i++) { 
        $verifica = mysqli_num_rows($verificaveis[$i]);
    }
    $verifica = mysqli_num_rows($query);





    // $sql = "INSERT INTO endereco(idcliente, idbairro, logradouro, numero_endereco) VALUES ('$idcliente','$cep','$logradouro','$numero','$bairro','$cidade','$estado')";
    // mysqli_query($conn, $sql);
    // header("Location: ../cliente/lista_cliente.php");
?>