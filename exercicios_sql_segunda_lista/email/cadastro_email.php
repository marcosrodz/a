<?php 
    require_once("../includes.php");
    $idcliente = $_GET["idcliente"];
    $email = $_GET["email"];
    print $email.'  '.$idcliente;
    $sql_verifica = "SELECT * FROM `email` WHERE idcliente = $idcliente";
    $query = mysqli_query($conn, $sql_verifica);
    $verifica = mysqli_num_rows($query);
    if($verifica != 0){
        ?>
        <script>
            alert("Esse usuário ja possui email cadastrado!!");
            window.location.href = "../cliente/lista_cliente.php";
        </script>
        <?php
    }else{
        $sql = "INSERT INTO email(idcliente, endereco_email) VALUES ('$idcliente','$email')";
        mysqli_query($conn, $sql);
        print"<h1>$verifica";
        header("Location: ../cliente/lista_cliente.php");
    }
?>
