<?php 

require_once("../includes.php");
$conn = $_SESSION["conexao"];
$sqlPf = "SELECT * FROM CLIENTE C JOIN PESSOA_FISICA PF ON C.IDCLIENTE = PF.IDCLIENTE";
$sqlPj = "SELECT * FROM CLIENTE C JOIN PESSOA_JURIDICA PJ ON C.IDCLIENTE = PJ.IDCLIENTE";
$consultaPf = mysqli_query($conn, $sqlPf);
$consultaPj = mysqli_query($conn, $sqlPj);
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
            <center>
            <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Listar Cliente:</h5>
                    <br>
                    <div class="container text-center">
                        <div class="row">
                            <div class="col">
                                <h6 class="card-subtitle mb-2 text-muted">Físico</h6>
                            </div>
                            <div class="col">
                                <input type="radio" ng-click="pessoa_fisica()" name="tipo_pessoa" value="pf" class="form-control">
                            </div>
                            <div class="col">
                                <h6 class="card-subtitle mb-2 text-muted">Jurídico</h6>
                            </div>
                            <div class="col">
                                <input type="radio" ng-click="pessoa_juridica()" name="tipo_pessoa" value="pj"  class="form-control">                    
                            </div>
                        </div>
                    </div>
                    <br/>
                </div>
            </div>
            </center>
            <br><br>
            <!-- Pessoa Física -->
            <div ng-show="mostraPF">
                <div class="row justify-content-center row-cols-1 row-cols-md-2 mb-3 text-center">
                    <div class="p-3 mb-2 bg-secondary text-white" class="card mb-4 rounded-3 shadow-sm">
                        <h4 class="p-3 mb-2 bg-dark text-white" class="my-0 fw-normal"><b>Pessoas Físicas</b></h4>
                        <div class="card-body">
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
                                <?php
                                    while($resultPf = mysqli_fetch_assoc($consultaPf)) {
                                        print'
                                            <tr>
                                                <td>'.$resultPf["idcliente"].' </td>
                                                <td>'.$resultPf["nome_cliente"].' </td>
                                                <td>'.$resultPf["cpf"].' </td>
                                                <td>'.$resultPf["rg"].' </td>
                                                <td>'.$resultPf["data_nascimento"].' </td>
                                                <td>
                                                    <a href="../telefone/form_telefone.php?idcliente='.$resultPf["idcliente"].'">
                                                        <button class="btn btn-primary">
                                                            Add Telefone
                                                        </button>
                                                    </a>
                                                    </td>
                                                    <td>
                                                        <a href="../email/form_email.php?idcliente='.$resultPf["idcliente"].'">
                                                            <button class="btn btn-success">
                                                                Add Email
                                                            </button>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="../endereco/form_endereco.php?idcliente='.$resultPf["idcliente"].'">
                                                            <button class="btn btn-warning">
                                                                Add endereço
                                                            </button>
                                                        </a>
                                                    </td>
                                                </tr>';
                                        }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>                      
            


            <!-- Pessoa Juridica -->
            <div ng-show="mostraPJ">
            <div class="row justify-content-center row-cols-1 row-cols-md-2 mb-3 text-center">
                        <div class="p-3 mb-2 bg-secondary text-white" class="card mb-4 rounded-3 shadow-sm">
                                <h4 class="p-3 mb-2 bg-dark text-white" class="my-0 fw-normal"><b>Pessoas Jurídica</b></h4>
                                <div class="card-body">
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
                        <?php
                            while($resultPj = mysqli_fetch_assoc($consultaPj)) {
                                print'
                                <tr>
                                    <td>'.$resultPj["idcliente"].' </td>
                                    <td>'.$resultPj["nome_cliente"].' </td>
                                    <td>'.$resultPj["cnpj"].' </td>
                                    <td>'.$resultPj["razao_social"].' </td>
                                    <td>'.$resultPj["inscricao_estadual"].' </td>
                                <td>
                                    <a href="../telefone/form_telefone.php?idcliente='.$resultPj["idcliente"].'">
                                        <button class="btn btn-primary">
                                            Add Telefone
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <a href="../email/form_email.php?idcliente='.$resultPj["idcliente"].'">
                                        <button class="btn btn-success">
                                            Add Email
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <a href="../endereco/form_endereco.php?idcliente='.$resultPj["idcliente"].'">
                                        <button class="btn btn-warning">
                                            Add endereço
                                        </button>
                                    </a>
                                </td>
                                </tr>';
                            }
                        ?>
                    </tbody>
                </table>
                </div></div></div>
            </div>              
        </form>
    </div>
</body>
</div>
</html>