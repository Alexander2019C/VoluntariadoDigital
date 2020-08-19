var app = angular.module('Estudiante', []);
var total=0;
app.controller("CEstudiante", ['$scope', '$http', function ($scope, $http) {

    var Msesiones = [];
    var BuscarSesionID=[];
    
        
     
        
            $http({
                method: 'post',
                url: 'Dao/GraficoEstudiante.php?action=Msesiones',
                data:  {id_volu:dni}
            }).then(function (response) {
                $scope.Msesiones = response.data;
            });
            $scope.vista="sesiones";
       
      

        //  Buscar sesion Voluntario por su ID
$scope.BuscarSesion= function (sesiones) {
    $scope.cat=sesiones;
        $http({
            method: 'POST',
            url: 'Dao/GraficoEstudiante.php?action=BuscarSesion',
            data:$scope.cat
        }).then(function (response) {
            $scope.BuscarSesionID = response.data;
         
        });
    
    
}
// vistas
$scope.indicadores= function () {
    $scope.vista="indicadores"; 
}
$scope.sesiones= function () {
    $scope.vista="sesiones"; 
}
     
 

}]);