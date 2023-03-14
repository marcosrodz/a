<?php 

require_once("../includes.php");

if (isset($_POST["salvarTelefone"]))
{
    $numero_telefone = $_POST["numero_telefone"];

    if ($numero_telefone == "")
    {
        ?>
        <script>
            window.location.href = "form_telefone.php";            
            alert("Preencha o campo telefone para o cadastro");
        </script>
        <?php
    }
    else
    {
        if (!isset($_POST["idcliente"]))
        {
            header("Location: ../cliente/lista_cliente.php");
        }
        else 
        {            
            $conn = $_SESSION["conexao"];  
            
            $idcliente = $_POST["idcliente"];
            
            $sql = "INSERT INTO TELEFONE (idcliente, numero_telefone) 
            VALUES ('{$idcliente}', '{$numero_telefone}')";         
         
            $result = mysqli_query($conn, $sql);
            
            if(!mysqli_affected_rows($conn) == 1)
            {
                ?>
                <script>
                    window.location.href = "form_telefone.php";            
                    alert("Erro ao cadastrar telefone");
                </script>
                <?php
            }
            else 
            {
                ?>
                <script>
                    window.location.href = "../cliente/lista_cliente.php";            
                    alert("Telefone Cadastrado Com Sucesso!");
                </script>
                <?php
            }
        }       
    }    
}