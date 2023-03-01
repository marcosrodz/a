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

        <form action="tstCliente.php" method="POST">            
            <br><br>
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
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">CPF</th>
                            <th scope="col">RG</th>
                            <th scope="col">Data de Nascimento</th>
                            <th scope="col">ADD Telefone</th>
                            <th scope="col">Add Email</th>
                            <th scope="col">Endereço</th>    
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                        </tr>
                    </tbody>
                </table>
            </div>              
            </div>  
            
            <!-- Pessoa Juridica -->
            <div ng-show="mostraPJ">
            <div class="mb-3">          
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">CNPJ</th>
                            <th scope="col">RG</th>
                            <th scope="col">Data de Nascimento</th>
                            <th scope="col">ADD Telefone</th>
                            <th scope="col">Add Email</th>
                            <th scope="col">Endereço</th>    
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>a</td>
                            <td>b</td>
                            <td>c</td>
                            <td>d</td>
                        </tr>
                    </tbody>
                </table>
            </div>              
        </form>
    </div>
    
</body>
</html>
