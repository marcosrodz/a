<?php 
require_once("../includes.php");

if (!isset($_GET["idcliente"]))
{
   header("Location: ../cliente/lista_cliente.php");
}
?>

<script src="angular/endereco.js"></script>

<body ng-app="myApp">

    <div ng-controller="endereco">
        <form action="cadastro_endereco.php" method="POST">            
                    
            <div class="mb-3">
                <input type="hidden" name="idcliente" class="form-control" value="<?php 
                    echo $_GET["idcliente"]; 
                ?>">
                <label class="form-label">Cep</label>
                <input type="text" name="cep" class="form-control" placeholder="Preencha o Cep"
                ng-model="cep" ng-change="buscarEndereco()">
            </div>  
            
            <div class="mb-3">               
                <label class="form-label">Logradouro</label>
                <input type="text" name="logradouro" class="form-control" placeholder="Preencha o Logradouro"
                ng-model="logradouro">
            </div>   

            <div class="mb-3">               
                <label class="form-label">Número</label>
                <input type="text" name="numero_endereco" class="form-control" placeholder="Preencha o Número">
            </div>  

            <div class="mb-3">               
                <label class="form-label">Bairro</label>
                <input type="text" name="nome_bairro" class="form-control" placeholder="Preencha o Bairro"
                ng-model="nome_bairro">
            </div> 

            <div class="mb-3">               
                <label class="form-label">Cidade</label>
                <input type="text" name="nome_cidade" class="form-control" placeholder="Preencha a Cidade"
                ng-model="nome_cidade">
            </div> 

            <div class="mb-3">               
                <label class="form-label">Estado</label>
                <input type="text" name="nome_estado" class="form-control" placeholder="Preencha o Estado"
                ng-model="nome_estado">
            </div> 

            <button type="submit" name="salvarEndereco" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</body>        