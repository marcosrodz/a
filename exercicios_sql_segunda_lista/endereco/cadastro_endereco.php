<?php 

require_once("../includes.php");

if (isset($_POST["salvarEndereco"]))
{
    
   if (!isset($_POST["idcliente"]))
   {
        header("Location: ../cliente/lista_cliente.php");
   }

   $conn = $_SESSION["conexao"];

   $retorna_valida_campos = valida_campos();

   if ($retorna_valida_campos)
   {
       $logradouro      = $_POST["logradouro"];
       $numero_endereco = $_POST["numero_endereco"];
       $nome_bairro     = $_POST["nome_bairro"];
       $nome_cidade     = $_POST["nome_cidade"];
       $nome_estado     = $_POST["nome_estado"];

       $retorno_valida_endereco =  valida_endereco($conn, $logradouro, $numero_endereco);
       
       if ($retorno_valida_endereco)
       {
            $mensagem = "Endereço já cadastrado!";
            mensagem_valida_form($mensagem);
       }
       else 
       {
            $idestado = valida_estado($conn, $nome_estado); 
            
            if (!$idestado)
            {
                $sql = "INSERT INTO ESTADO (nome_estado) VALUES 
                ('{$nome_estado}')";

                $result = mysqli_query($conn, $sql);

                $idestado = mysqli_insert_id($conn);
            }

            $idcidade = valida_cidade($conn, $nome_cidade); 
            
            if (!$idcidade)
            {
                $sql = "INSERT INTO CIDADE (idestado, nome_cidade) VALUES 
                ('{$idestado}', '{$nome_cidade}')";

                $result = mysqli_query($conn, $sql);

                $idcidade = mysqli_insert_id($conn);
            }

            $idbairro = valida_bairro($conn, $nome_bairro);

            if (!$idbairro)
            {
                $sql = "INSERT INTO BAIRRO (idcidade, nome_bairro) VALUES 
                ('{$idcidade}', '{$nome_bairro}')";

                $result = mysqli_query($conn, $sql);

                $idbairro = mysqli_insert_id($conn);
            }

            $idcliente = $_POST["idcliente"];

            $sql = "INSERT INTO ENDERECO (idcliente, idbairro, logradouro, numero_endereco)
            VALUES ('{$idcliente}', '{$idbairro}', '{$logradouro}', '{$numero_endereco}')";
          
            $result = mysqli_query($conn, $sql);

            if (!mysqli_affected_rows($conn) == 1) 
            {
                ?>
                <script>
                    window.location.href= "form_endereco.php";
                    alert("Erro ao cadastrar Endereço");
                </script>
                <?php 
            }
            else 
            {                
                ?>
                <script>
                    window.location.href= "../cliente/lista_cliente.php";
                    alert("Endereço cadastrado");
                </script>
                <?php 
            }
       }
   
    }
}

function valida_campos()
{
    if ($_POST["logradouro"] == "")
    {
       $mensagem = "Você precisa preencher o logradouro";
       mensagem_valida_form($mensagem);
       return false;
    }
    else if ($_POST["nome_bairro"] == "")
    {
       $mensagem = "Você precisa preencher o bairro";
       mensagem_valida_form($mensagem);
       return false;
    }
    else if ($_POST["nome_cidade"] == "")
    {
       $mensagem = "Você precisa preencher a cidade";
       mensagem_valida_form($mensagem);
       return false;
    }
    else if ($_POST["nome_estado"] == "")
    {
       $mensagem = "Você precisa preencher o estado";
       mensagem_valida_form($mensagem);
       return false;
    }

    return true;
}

function mensagem_valida_form($mensagem)
{
    ?>
    <script>
        window.location.href = "form_endereco.php";
        var msg = <?php echo json_encode($mensagem) ?>
        alert(msg);
    </script>
    <?php
}

function valida_endereco($conn, $logradouro, $numero_endereco)
{
    $sql = "SELECT * FROM ENDERECO WHERE logradouro = '{$logradouro}'
    AND numero_endereco = '{$numero_endereco}'";

    $query = mysqli_query($conn, $sql);

    $res = mysqli_num_rows($query) > 0 ? true : false;

    return $res;
}

function valida_estado($conn, $nome_estado)
{
    $sql = "SELECT * FROM ESTADO WHERE nome_estado = '{$nome_estado}'";

    $query = mysqli_query($conn, $sql);

    $res = mysqli_num_rows($query) > 0 ? true : false;

    if ($res)
    {
        while ($res = mysqli_fetch_assoc($query)) 
        {
            $idestado = $res["idestado"];
        }
        return $idestado;
    }
    else 
    {
        return false;
    }
}

valida_cidade($conn, $nome_cidade); 

function valida_cidade($conn, $nome_cidade)
{
    $sql = "SELECT * FROM CIDADE WHERE nome_cidade = '{$nome_cidade}'";

    $query = mysqli_query($conn, $sql);

    $res = mysqli_num_rows($query) > 0 ? true : false;

    if ($res)
    {
        while ($res = mysqli_fetch_assoc($query)) 
        {
            $idcidade = $res["idcidade"];
        }
        return $idcidade;
    }
    else 
    {
        return false;
    }
}

function valida_bairro($conn, $nome_bairro)
{
    $sql = "SELECT * FROM BAIRRO WHERE nome_bairro = '{$nome_bairro}'";

    $query = mysqli_query($conn, $sql);

    $res = mysqli_num_rows($query) > 0 ? true : false;

    if ($res)
    {
        while ($res = mysqli_fetch_assoc($query)) 
        {
            $idbairro = $res["idbairro"];
        }
        return $idbairro;
    }
    else 
    {
        return false;
    }
}