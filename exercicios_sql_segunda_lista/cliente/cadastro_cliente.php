<?php 

require_once("../includes.php");

if (isset($_POST["salvarCliente"]))
{
    $conn = $_SESSION["conexao"];

    $retorno_valida_campos = valida_campos();

    if ($retorno_valida_campos)
    {
        $nome_cliente = $_POST["nome_cliente"];

        $sql = "INSERT INTO CLIENTE (nome_cliente) VALUES ('{$nome_cliente}')";
    
        $result = mysqli_query($conn, $sql);

        if (!mysqli_affected_rows($conn) == 1)
        {
            ?>
            <script>
                window;location.href = "form_cliente.php";
                alert("Erro ao inserir cliente");
            </script>
            <?php 
        }
        else 
        {
            $idcliente = mysqli_insert_id($conn);

            if ($_POST["tipo_pessoa"] == "pf")
            {
                $cpf = $_POST["cpf"];
                $rg  = $_POST["rg"];
                $data_nascimento = $_POST["data_nascimento"];

                $sql = "INSERT INTO PESSOA_FISICA (idcliente, cpf, rg, data_nascimento)
                VALUES ('{$idcliente}', '{$cpf}', '{$rg}', '{$data_nascimento}')";
            }
            else if ($_POST["tipo_pessoa"] == "pj")
            {
                $razao_social = $_POST["razao_social"];
                $cnpj         = $_POST["cnpj"];
                $inscricao_estadual = $_POST["inscricao_estadual"];

                $sql = "INSERT INTO PESSOA_JURIDICA (idcliente, razao_social, cnpj, inscricao_estadual)
                VALUES ('{$idcliente}', '{$razao_social}', '{$cnpj}', '{$inscricao_estadual}')";
            }

            $result = mysqli_query($conn, $sql);

            if(
                (!mysqli_affected_rows($conn) == 1) && 
                ($_POST["tipo_pessoa"] == "pf")
            )
            {
                $mensagem = "Erro ao tentar cadastrar dos dados da pessoa física";
                mensagem_valida_form($mensagem);
            }
            else if(
                (!mysqli_affected_rows($conn) == 1) && 
                ($_POST["tipo_pessoa"] == "pj")
            )
            {
                $mensagem = "Erro ao tentar cadastrar dos dados da pessoa juridica";
                mensagem_valida_form($mensagem);
            }
            else 
            {
                $mensagem = "Cliente cadastrado com sucesso";
                mensagem_valida_form($mensagem);
            }

        }
    }
}

function valida_campos()
{
    if ($_POST["nome_cliente"] == "")
    {
        $mensagem = "Você precisa preencher o campo nome!";
        mensagem_valida_form($mensagem);
        return false;
    }
    else if ($_POST["tipo_pessoa"] == "")
    {
        $mensagem = "Você precisa preencher o campo tipo pessoa!";
        mensagem_valida_form($mensagem);
        return false;
    }
    else 
    {
        if ($_POST["tipo_pessoa"] == "pf")
        {
            if ($_POST["rg"] == "")
            {
                $mensagem = "Você precisa preencher o campo rg!";
                mensagem_valida_form($mensagem);
                return false;
            }
            else if ($_POST["cpf"] == "")
            {
                $mensagem = "Você precisa preencher o campo cpf!";
                mensagem_valida_form($mensagem);
                return false;
            }
            else if ($_POST["data_nascimento"] == "")
            {
                $mensagem = "Você precisa preencher o campo data de nascimento!";
                mensagem_valida_form($mensagem);
                return false;
            }            
        }
        else if ($_POST["tipo_pessoa"] == "pj")
        {
            if ($_POST["razao_social"] == "")
            {
                $mensagem = "Você precisa preencher o campo razao social!";
                mensagem_valida_form($mensagem);
                return false;
            }
            else if ($_POST["cnpj"] == "")
            {
                $mensagem = "Você precisa preencher o campo cnpj!";
                mensagem_valida_form($mensagem);
                return false;
            }
            else if ($_POST["inscricao_estadual"] == "")
            {
                $mensagem = "Você precisa preencher o campo inscricao_estadual!";
                mensagem_valida_form($mensagem);
                return false;
            }  
        }
    }

    return true;
}

function mensagem_valida_form($mensagem)
{
    ?>
    <script>
        window.location.href = "form_cliente.php";
        var msg = <?php echo json_encode($mensagem) ?>;
        alert(msg);
    </script>
    <?php
}