<?php 
    require_once("../includes.php");
    if (!isset($_GET["produto"]))
    {
    header("Location: ../produto/form_produto.php");
    }else{
        $descricao = $_GET["descricao"];
        $valor = $_GET["valor"];
        $produto = $_GET["produto"];
        $sql = "INSERT INTO produto(nome_produto, descricao_produto, preco) VALUES ('$produto','$descricao','$valor')";
        mysqli_query($conn, $sql);
        }
?>
<script>
    alert("Produto cadastrado com sucesso!!");
    window.location.href = "../produto/lista_produto.php";
</script>