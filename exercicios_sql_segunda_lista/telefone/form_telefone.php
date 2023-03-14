<?php 
require_once("../includes.php");

if (!isset($_GET["idcliente"]))
{
    header("Location: ../cliente/lista_cliente.php");
}
?>

<form action="cadastro_telefone.php" method="POST">            
            
    <div class="mb-3">
        <input type="hidden" name="idcliente" class="form-control" value="<?php 
            echo $_GET["idcliente"]; 
        ?>">
        <label class="form-label">Nome</label>
        <input type="text" name="numero_telefone" class="form-control" placeholder="Preencha o Telefone">
    </div>     

    <button type="submit" name="salvarTelefone" class="btn btn-primary">Salvar</button>
</form>