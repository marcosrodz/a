var app = angular.module("myApp", []);       

app.controller('endereco', function($scope, $http)
{
    $scope.buscarEndereco = function()
    {
        var cep = $scope.cep;

        $http.get("https://viacep.com.br/ws/"+cep+"/json/")
        .then(function(responde){
            
            var dados = responde.data;
            $scope.logradouro = dados.logradouro;
            $scope.nome_bairro = dados.bairro;
            $scope.nome_cidade = dados.localidade;
            $scope.nome_estado = dados.uf;


        });
    }
});