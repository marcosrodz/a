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