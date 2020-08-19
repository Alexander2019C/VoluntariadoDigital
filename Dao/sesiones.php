<?php

include_once ($_SERVER['DOCUMENT_ROOT'].'/ts/dirs.php');
require_once (CONEX_PATH."Conex.php");


$cservice = new Seciones();



if (isset($_REQUEST['action'])) {

    if ($_GET['action'] == 'listar') {
        $cservice->all();
        exit;
    }
    if ($_GET['action'] == 'guardar') {
        $cservice->store();
        exit;
    }
    if ($_GET['action'] == 'AgregarMentor') {
        
        $cservice->AgregarMentor();
        exit;
    }
    if ($_GET['action'] == 'AgregarMentorOficial') {
        
        $cservice->AgregarMentorOficial();
        exit;
    }
    if ($_GET['action'] == 'usuarios') {
        
        $cservice->Listausuarios();
        exit;
    }
    if ($_GET['action'] == 'usuarioslista') {
        
        $cservice->Listausuariostime();
        exit;
    }
    // eliminartablamentores
    if ($_GET['action'] == 'eliminartablamentores') {
        
        $cservice->EliminarTablaMentores();
        exit;
    }

    if ($_GET['action'] == 'GuardarAutoevaluacion') {
        
        $cservice->GuardarAutoevaluacion();
        exit;
    }
    // obtener la ultima sesion
    if ($_GET['action'] == 'UltimaSesion') {
        
        $cservice->UltimaSesion(); 
        exit;
    }
    if ($_GET['action'] == 'Missesiones') {
        
        $cservice->Missesiones(); 
        exit;
    }

 

    // Obtener resultados para los graficos
    if ($_GET['action'] == 'graficos') {
        
        $cservice->Todografico(); 
        exit;
    }
   
    
 }


class Seciones
{

    

  
    

    public function all()
    {
        $con = Conex::getInstance();
        try {
            $sql = "Select * from usuariots where tipo='estudiante' ";
            $rs  = $con->db->prepare($sql);
            $rs->execute();
            $result = $rs->fetchAll(PDO::FETCH_OBJ);
            return (print_r(json_encode($result)));
        } catch (Exception $ex) {
            print "Ocurrio en error";
            echo "Error: " . $ex->getMessage();
        }
    }

    
    public function Listausuariostime()
    {
        $con = Conex::getInstance();
        try {
            $sql = "Select * from mentores";
            $rs  = $con->db->prepare($sql);
            $rs->execute();
            $result = $rs->fetchAll(PDO::FETCH_OBJ);
            return (print_r(json_encode($result)));
        } catch (Exception $ex) {
            print "Ocurrio en error";
            echo "Error: " . $ex->getMessage();
        }
    }
    public function store()
    {
        $producto = json_decode(file_get_contents("php://input"));
        try {
            $sql = "insert into sesiones(id_voluntario,titulo,fecha,nro_horas,finicio_ffinal) values(:id_volu,:titulo,:fecha,:nro_horas,:finicio_ffinal)";
            $rs  = Conex::getInstance()->db->prepare($sql);
           
            $rs->bindValue(":id_volu", $producto->id_volu);
            $rs->bindValue(":titulo", $producto->titulo);
            $rs->bindValue(":fecha", $producto->fecha);
            $rs->bindValue(":nro_horas", $producto->nro_horas);
            $rs->bindValue(":finicio_ffinal", $producto->finicio_ffinal);
            return $rs->execute();
        } catch (Exception $ex) {
            print "Ocurrio en error";
            echo "Error: " . $ex->getMessage();
        }
    }
    public function AgregarMentor()
    {
        

        $producto = json_decode(file_get_contents("php://input"));
       
        
        try {
            $sql = "insert into mentores(id_volu,id_estu) values(:id_volu,:id_estu)";
            $rs  = Conex::getInstance()->db->prepare($sql);
           
            $rs->bindValue(":id_volu", $producto->volu);
            $rs->bindValue(":id_estu", $producto->dni);
            echo  $producto = json_encode(file_get_contents("php://input"));
            
            return $rs->execute();
        } catch (Exception $ex) {
            print "Ocurrio en error";
            echo "Error: " . $ex->getMessage();
        }
    }



    // guardarautoevaluacion

    public function GuardarAutoevaluacion()
    {
        

        $producto = json_decode(file_get_contents("php://input"));
        
        try {
            $sql = "insert into autoevaluacion(id_volu,pregunta1,pregunta2,pregunta3,pregunta4,titulo) values(:id_volu,:pre1,:pre2,:pre3,:pre4,:titulo)";
            $rs  = Conex::getInstance()->db->prepare($sql);
           
           
            $rs->bindValue(":id_volu", $producto->id_volu);
            $rs->bindValue(":pre1", $producto->pre1);
            $rs->bindValue(":pre2", $producto->pre2);
            $rs->bindValue(":pre3", $producto->pre3);
            $rs->bindValue(":pre4", $producto->pre4);
            $rs->bindValue(":titulo", $producto->titulo);
            
            
            return $rs->execute();
        } catch (Exception $ex) {
            print "Ocurrio en error";
            echo "Error: " . $ex->getMessage();
        }
    }

    public function AgregarMentorOficial()
    {
        

        $producto = json_decode(file_get_contents("php://input"));
        
        try {
            $sql = "insert into mentoroficial(id_volu,id_estu) values(:id_volu,:id_estu)";
            $rs  = Conex::getInstance()->db->prepare($sql);
           
            $rs->bindValue(":id_volu", $producto->volu);
            $rs->bindValue(":id_estu", $producto->dni);
            
            return $rs->execute();
        } catch (Exception $ex) {
            print "Ocurrio en error";
            echo "Error: " . $ex->getMessage();
        }
    }

    public function Listausuarios()
    {
        
        $producto = json_decode(file_get_contents("php://input"));
        
        try {
            $sql = "SELECT us.id,us.dni,CONCAT(us.p1,' ',us.a1,' ',us.a2) AS nombres, 
            us.puesto,us.pro from mentores m
                         inner join usuariots us
                         on us.dni=m.id_estu
                         where m.id_volu=:id_volu order by m.id desc limit 3 ";
            $rs  = Conex::getInstance()->db->prepare($sql);
            $rs->bindValue(":id_volu", $producto->volu);
            $rs->execute();
            $result = $rs->fetchAll(PDO::FETCH_OBJ);
            return (print_r(json_encode($result)));
        } catch (Exception $ex) {
            print "Ocurrio en error";
            echo "Error: " . $ex->getMessage();
        } echo "Error: " . $ex->getMessage();

        
        }
    



        // eliminatablamentor



        public function EliminarTablaMentores()
    {
        

        $producto = json_decode(file_get_contents("php://input"));
        
        try {
            $sql = " delete  from  mentores where id_volu=:id_volu";
            $rs  = Conex::getInstance()->db->prepare($sql);
           
            $rs->bindValue(":id_volu", $producto->id_volu);
           
            
            return $rs->execute();
        } catch (Exception $ex) {
            print "Ocurrio en error";
            echo "Error: " . $ex->getMessage();
        }
    }



    // obtener la ultima sesion



    public function UltimaSesion()
    {
        

        $producto = json_decode(file_get_contents("php://input"));
        
        try {
            $sql = " select titulo ,id from sesiones where id_voluntario=:id_volu order by id desc limit 1 ";
            $rs  = Conex::getInstance()->db->prepare($sql);
            $rs->bindValue(":id_volu", $producto->id_volu);
            $rs->execute();
            $result = $rs->fetchAll(PDO::FETCH_OBJ);
            return (print_r(json_encode($result)));
        } catch (Exception $ex) {
            print "Ocurrio en error";
            echo "Error: " . $ex->getMessage();
        }
    }



//  mis sesiones
    
    public function Missesiones()
    {
        

        $producto = json_decode(file_get_contents("php://input"));
        
        try {
            $sql = " select * from  sesiones
            inner join usuariots
            on usuariots.dni=sesiones.id_voluntario
             where id_voluntario=:id_volu  ";
            $rs  = Conex::getInstance()->db->prepare($sql);
            $rs->bindValue(":id_volu", $producto->id_volu);
            $rs->execute();
            $result = $rs->fetchAll(PDO::FETCH_OBJ);
            return (print_r(json_encode($result)));
        } catch (Exception $ex) {
            print "Ocurrio en error";
            echo "Error: " . $ex->getMessage();
        }
    }




    public function Todografico()
    {
       
        try {
            $sql = " SELECT concat( p.p1 ,' ', p.a1 )AS nombre ,sum(nro_horas) AS horas,COUNT(dni) AS sesion FROM sesiones
            INNER JOIN usuariots AS p
            ON p.dni=sesiones.id_voluntario
            GROUP BY p.id ORDER BY horas DESC LIMIT 10";
            $rs  = Conex::getInstance()->db->prepare($sql);
            $rs->execute();
            $result = $rs->fetchAll(PDO::FETCH_OBJ);
            return (print_r(json_encode($result)));
        } catch (Exception $ex) {
            print "Ocurrio en error";
            echo "Error: " . $ex->getMessage();
        }
    }


    // funciones para calificar a los alumnosn alumnoA1 

   
}
?>