var app = angular.module("myApp", []);       

app.controller('endereco', function($scope, $http)
{
    $scope.buscarEndereco = function()
    {
        var cep = $scope.cep;

        $http.get("https://viacep.com.br/ws/"+cep+"/json/")
        .then(function(response) {

            var dados = response.data;
            $scope.logradouro  = dados.logradouro;
            $scope.nome_bairro = dados.bairro;
            $scope.nome_cidade = dados.localidade;
            $scope.nome_estado = dados.uf;
           
        },
        function(error) 
        {
            if (error.status === 404) 
            {
                alert('Cep não encontrado');
            }
        }); //callback para tratameno de falhas
        
    }
   
});