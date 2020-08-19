<?php

include_once ($_SERVER['DOCUMENT_ROOT'].'/ts/dirs.php');
require_once (CONEX_PATH."Conex.php");


$cservice = new Seciones2();



if (isset($_REQUEST['action'])) {

   
    // califiaciones para los estudiantes
    if ($_GET['action'] == 'calificacionA') {
        
        $cservice-> alumnoA(); 
        exit;
    }

    
 }


class Seciones2
{

    

    // funciones para calificar a los alumnosn alumnoA1 

    public function alumnoA()
    {
        $producto = json_decode(file_get_contents("php://input"));
        
        try {
            $sql = "insert into comentarios(id_volu,id_estu,titulo,liderazgo,estatus,comportamiento,opinion) 
            values(:id_volu,:id_estu,:titulo,:liderazgo,:estatus,:comportamiento,:opinion)";
            $rs  = Conex::getInstance()->db->prepare($sql);
           
           
            $rs->bindValue(":id_volu", $producto->id_volu);
            $rs->bindValue(":id_estu", $producto->id_estu);
            $rs->bindValue(":titulo", $producto->titulo);
            $rs->bindValue(":liderazgo", $producto->liderazgo);
            $rs->bindValue(":estatus", $producto->estatus);
            $rs->bindValue(":comportamiento", $producto->comportamiento);
            $rs->bindValue(":opinion", $producto->opinion);
            
            
            return $rs->execute();
        } catch (Exception $ex) {
            print "Ocurrio en error";
            echo "Error: " . $ex->getMessage();
        }
    }

}
?>