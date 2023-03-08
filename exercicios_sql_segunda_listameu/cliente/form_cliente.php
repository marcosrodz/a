<?php 

require_once("../includes.php");

?>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.js"></script>

<script>
    var app = angular.module("myApp", []);

    app.controller('cliente', function($scope){
        
        $scope.pessoa_fisica = function()
        {
            $scope.mostraPJ = false;
            $scope.mostraPF = true;
        }

        $scope.pessoa_juridica = function()
        {
            $scope.mostraPF = false;
            $scope.mostraPJ = true;
        }
    });    

</script>

<body ng-app="myApp">

    <div ng-controller="cliente">

        <form action="cadastro_cliente.php" method="POST">            
            <br><br>
            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" class="form-control" placeholder="Preencha o Nome" name = "nome_cliente">
            </div>      

            <div class="row">
                <div class="col-md-2">                  
                    <label class="form-label">Pessoa Física</label>
                </div>   
                <div class="col-md-1">         
                    <input type="radio" ng-click="pessoa_fisica()" name="tipo_pessoa" value="pf" class="form-control">
                </div>   
                <div class="col-md-2">         
                    <label class="form-label">Pessoa Juridica</label>
                </div>   
                <div class="col-md-1"> 
                    <input type="radio" ng-click="pessoa_juridica()" name="tipo_pessoa" value="pj"  class="form-control">                    
                </div>
            </div>
            <br><br>
            <!-- Pessoa Física -->
            <div ng-show="mostraPF">
                <div class="mb-3">                    
                    <label class="form-label">RG</label>
                </div>  
                <div class="mb-3">    
                    <input type="text" name="rg" class="form-control" placeholder="Preencha o RG">                   
                </div>
                <div class="mb-3">                    
                    <label class="form-label">CPF</label>
                </div>  
                <div class="mb-3">     
                    <input type="text" name="cpf" class="form-control" placeholder="Preencha o CPF">                    
                </div>
                <div class="mb-3">                    
                    <label class="form-label">Data de Nascimento</label>
                </div>  
                <div class="mb-3">     
                    <input type="date" name="data_nascimento" class="form-control">                   
                </div>
            </div>  
            
            <!-- Pessoa Juridica -->
            <div ng-show="mostraPJ">
                <div class="mb-3">                   
                    <label class="form-label">Razao Social</label>
                </div>  
                <div class="mb-3"> 
                    <input type="text" name="razao_social" class="form-control" placeholder="Preencha a Razão social">                    
                </div>
                <div class="mb-3">                   
                    <label class="form-label">CNPJ</label>
                </div>  
                <div class="mb-3"> 
                    <input type="text" name="cnpj" class="form-control" placeholder="Preencha o CNPJ">                    
                </div>
                <div class="mb-3">                 
                    <label class="form-label">Inscrição Estadual</label>
                </div>  
                <div class="mb-3"> 
                    <input type="text" name="inscricao_estadual" class="form-control" placeholder="Preencha a inscrição estadual">                    
                </div>
            </div>              
            
            <button type="submit" name="salvarCliente" class="btn btn-primary">Salvar</button>
        </form>
    </div>
    
</body>
</html>
