<?php 

require_once("conexao.php");

if (isset($_POST["acessar"])) 
{
    $nome_usuario = $_POST["nome_usuario"];
    $senha = $_POST["senha"];

    if (($nome_usuario == "") || ($senha == ""))
    {    
        ?>
        <script>
            alert("Você precisa preencher usuário e senha");
            window.location.href = "./home/home.php";
        </script>
        <?php
    }
    else 
    {
        $res = verifica_login($nome_usuario, $senha);

        if ($res["verifica_qtde_linhas"])
        {
            while ($usuario = mysqli_fetch_assoc($res["query"])) 
            {
                $_SESSION["usuario_logado"] = $usuario["nome_usuario"];
            }
            
            header("Location: ./home/home.php");
        }
        else 
        {
            ?>
            <script>
                alert("Usuário não encontrado!");
                window.location.href = "index.php";
            </script>
            <?php
        }
    }
}

function verifica_login($nome_usuario, $senha)
{
    $senha = hash("sha256", $senha);

    $conn = $_SESSION["conexao"];

    $sql = "SELECT * FROM usuario 
    WHERE nome_usuario = '{$nome_usuario}' AND senha = '{$senha}'";    

    $query = mysqli_query($conn, $sql);

    $verifica_qtde_linhas = mysqli_num_rows($query) ? true : false;

    $result["verifica_qtde_linhas"] = $verifica_qtde_linhas;
    $result["query"] = $query; 

    return $result;

}