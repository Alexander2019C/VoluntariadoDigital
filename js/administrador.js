var app = angular.module('moduloProducto', []);
var total=0;
app.controller("ctrlProducto", ['$scope', '$http', function ($scope, $http) {

    var listasesiones = [];
    var listausuarios = [];
    var UltimaSesion = [];
    var Missesiones=[];
    
        
     
        
            $http({
                method: 'post',
                url: 'Dao/sesiones.php?action=listar'
            }).then(function (response) {
                
                
                
                $scope.listasesiones = response.data;
                // $scope.Missesiones(sesiones);
            
             
                
            });
        

      

        
     $scope.vista="sesiones";


    //  vistas
    $scope.CrearSesion= function () { 
        
        $scope.vista="crearsesiones"; 
    }
  
    $scope.Califiaciones1= function (evaluacion) { 
        $scope.GuardarAutoevaluacionopcion1 (evaluacion);
        
        $scope.vista="caliestudiante1"; 
    }
    $scope.Califiaciones2= function (alumno1) { 
        $scope.CaliA(alumno1);
        $scope.vista="caliestudiante2"; 
    }
    $scope.Califiaciones3= function (alumno2) { 
        $scope.CaliB(alumno2);
        $scope.vista="caliestudiante3"; 
    }
  




// vista evaluacion
$scope.  verAutoevaluacion= function () {
        if(total==0){
            alert("Por favor seleccione a los estudiantes a su cargo");
        }
        else{
    $scope.vista="comentarios"; 
}
}



    $scope.NuevaSesion = function (sesiones) {
        if(sesiones.titulo==''){
            alert("Por favor llene el titulo para proseguir");
        }
        else{

        
        $scope.cat = sesiones;
        
        $http({
            method: 'POST',
            url: 'Dao/sesiones.php?action=guardar',
            data : $scope.cat,
        }).then(function (response) {
            
            $scope.UltimaSesion(sesiones);
           
        });
        
        
        $scope.vista="inscritos"; 
       
        
    } 
}

   
    $scope.AgregarMentor = function (sesionesM) {
        
        total++;
       
        if (total>3){
            alert("Ya completaste tus estudiantes");
            
        }else{
            $scope.cat = sesionesM;
            
            $http({
                method: 'POST',
                url: 'Dao/sesiones.php?action=AgregarMentor',
                data : $scope.cat
            }).then(function (response) {
                
                $scope.AgregarOficicial(sesionesM);
            });
            
            
           
        }
        
        
    } 
    $scope.AgregarOficicial = function (sesionesM) {
        
        $scope.cat = sesionesM;
        
        $http({
            method: 'POST',
            url: 'Dao/sesiones.php?action=AgregarMentorOficial',
            data : $scope.cat
        }).then(function (response) {
            $scope.Listarusuarios(sesionesM);
            
        });
       
        
    } 

    $scope.Listarusuarios = function (sesionesM) {
        $scope.cat = sesionesM;
        $http({
            method: 'POST',
            url: 'Dao/sesiones.php?action=usuarios',
            data : $scope.cat
        }).then(function (response) {
            $scope.listausuarios = response.data;
            
        });
        
        
    } 


 
    // funciones para eliminar tablas completas
    $scope.EliminarMentores = function (evaluacion) {
        
        $scope.cat = evaluacion;
        $http({
            method: 'POST',
            url: 'Dao/sesiones.php?action=eliminartablamentores',
            data : $scope.cat
        }).then(function (response) {
            $scope.listausuarios = response.data;
            
        });
        // setTimeout(function(){
       
        //     location.reload();
        //     },1000);
        
    } 
    


    // Guardar Autoevaluacion

    $scope.GuardarAutoevaluacionopcion1 = function (evaluacion) {
        $scope.cat = evaluacion;
        $http({
            method: 'POST',
            url: 'Dao/sesiones.php?action=GuardarAutoevaluacion',
            data : $scope.cat
        }).then(function (response) {
           
        });
       
        
        
        
    } 

    $scope.GuardarAutoevaluacion = function (evaluacion) {
        $scope.cat = evaluacion;
        $http({
            method: 'POST',
            url: 'Dao/sesiones.php?action=GuardarAutoevaluacion',
            data : $scope.cat
        }).then(function (response) {
            $scope.EliminarMentores(evaluacion);
        });
        setTimeout(function(){
            location.reload();
        },1000);
         
        
        
        
    } 
    
    //  funcion para llamar a la ultima sesion insertada  por el dni del volutario
    $scope.UltimaSesion = function (sesiones) {
        $scope.cat = sesiones;
        $http({
            method: 'POST',
            url: 'Dao/sesiones.php?action=UltimaSesion',
            data : $scope.cat
        }).then(function (response) {
            $scope.UltimaSesion = response.data;
            
        });
        
        
    } 

    // rrecorrer el array  para sacar el ultimo con su respectivo id

$scope.f_titulo = function (UltimaSesion) {
    var total = "";
    for (var i = 0; i < UltimaSesion.length; i++) {
        var factura = $scope.UltimaSesion[i];
        total = factura.titulo;
    }
    return total;
}


// // mis sesiones

//     $scope.Missesiones = function (sesiones) {
//         $scope.cat = sesiones;
//         $http({
//             method: 'post',
//             url: 'Dao/sesiones.php?action=Missesiones',
//             data : $scope.cat
//         }).then(function (response) {
//             alert(response);
            
//         });
        
        
//     } 

    $scope.remove = function (sesionesM) {
        // Al modelo le hemos pasado "dato" que es el texto que contiene el elemento donde se hizo "click"
        // guardamos en la variable pos el index del array que tiene el texto que hemos recogido del elemento donde se hizo click
        var pos = $scope.listasesiones.indexOf(sesionesM);
        // removemos del array tareas el indice que guarda al elemento donde se hizo click
        $scope.listasesiones.splice(pos);
    }




    // califiacion para los estudiantes  Terminarsesion
    $scope.CaliA = function (alumno1) {
        $scope.cat=alumno1;
        $http({
            method: 'POST',
            url: 'Dao/sesionesdos.php?action=calificacionA',
            data:$scope.cat
            
        }).then(function (response) {
          
         
        });
        
        
    } 

    $scope.CaliB= function (alumno2) {
        $scope.cat=alumno2;
        $http({
            method: 'POST',
            url: 'Dao/sesionesdos.php?action=calificacionA',
            data:$scope.cat
            
        }).then(function (response) {
          
         
        });
        
        
    } 
    $scope.Terminarsesion= function (alumno3,evaluacion) {
        $scope.cat=alumno3;
        $http({
            method: 'POST',
            url: 'Dao/sesionesdos.php?action=calificacionA',
            data:$scope.cat
            
        }).then(function (response) {
           
         
        });
        $scope.EliminarMentores(evaluacion);
       setTimeout(function(){
           location.reload();
       },1000);
        
    } 


 

}]);