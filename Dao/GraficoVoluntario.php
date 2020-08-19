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
//  get para extraer toda las  Los titulos de las sesiones
    if ($_GET['action'] == 'ExtraerTitulosSesiones') {
        
        $cservice->TCharlasLis(); 
        exit;
    }

    // buscar sesion cuando le da click al ojito
    if ($_GET['action'] == 'BuscarSesion') {
        
        $cservice->BuscarSesion(); 
        exit;
    }

    // evaluacion para los estudiantes

    if ($_GET['action'] == 'calificacionA') {
        
        $cservice-> alumnoA(); 
        exit;
    }
   
    
 }


class Seciones
{

    

  
    

    public function all()
    {
        $con = Conex::getInstance();
        try {
            $sql = "SELECT au.id,au.dni,concat(au.p1,' ',au.a1,' ',au.a2) AS nombre
            FROM usuariots au
            WHERE tipo='estudiante'";
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
            $sql = "insert into autoevaluacion(id_autoevaluacion,id_volu,pregunta1,pregunta2,pregunta3,pregunta4,titulo) 
            values(:id,:id_volu,:pre1,:pre2,:pre3,:pre4,:titulo)";
            $rs  = Conex::getInstance()->db->prepare($sql);
           
            $rs->bindValue(":id", $producto->id);
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
            $sql = "insert into mentoroficial(id_volu,id_estu,id_sesion,titulo)
             values(:id_volu,:id_estu,:id_sesion,:titulo)";
            $rs  = Conex::getInstance()->db->prepare($sql);
           
            $rs->bindValue(":id_volu", $producto->volu);
            $rs->bindValue(":id_estu", $producto->dni);
            $rs->bindValue(":id_sesion", $producto->id);
            $rs->bindValue(":titulo", $producto->titulo);
            echo  $producto = json_encode(file_get_contents("php://input"));
            
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
            $sql = "SELECT s.id,s.id_voluntario as voluntario,s.titulo,s.fecha,s.nro_horas AS horas,
            s.finicio_ffinal AS i_f,CONCAT(u.p1,' ',u.a1,' ',u.a2)AS nombre
            
             FROM sesiones s
                        inner join usuariots u
                        on u.dni=s.id_voluntario
                         where id_voluntario=:id_volu ";
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



    public function TCharlasLis() 
    {
       
        try {
            $sql = " SELECT * from charlas";
            $rs  = Conex::getInstance()->db->prepare($sql);
            $rs->execute();
            $result = $rs->fetchAll(PDO::FETCH_OBJ);
            return (print_r(json_encode($result)));
        } catch (Exception $ex) {
            print "Ocurrio en error";
            echo "Error: " . $ex->getMessage();
        }
    }

    public function BuscarSesion() 
    {
       
        $producto = json_decode(file_get_contents("php://input"));
        
        try {
            $sql = " SELECT s.id,s.id_voluntario as voluntario,s.titulo,s.fecha,s.nro_horas AS horas,
            s.finicio_ffinal AS i_f,CONCAT(u.p1,' ',u.a1,' ',u.a2)AS nombre,
            au.pregunta1 AS p1,au.pregunta2 AS p2,au.pregunta3 AS p3,au.pregunta4 AS p4
            
             FROM sesiones s
                        inner join usuariots u
                        on u.dni=s.id_voluntario
                        INNER JOIN autoevaluacion au
                        ON s.id=au.id_autoevaluacion     
                         where  s.titulo=:titulo
                         and s.id=:id
                         
                         ";
            $rs  = Conex::getInstance()->db->prepare($sql);
            $rs->bindValue(":titulo", $producto->titulo);
            $rs->bindValue(":id", $producto->id);
            // $rs->bindValue(":id_volu", $producto->voluntario);
            
           
   
            $rs->execute();
            $result = $rs->fetchAll(PDO::FETCH_OBJ);
            return (print_r(json_encode($result)));
        } catch (Exception $ex) {
            print "Ocurrio en error";
            echo "Error: " . $ex->getMessage();
        }
   
}


// evaluacion para los estudiantes
public function alumnoA()
{
    $producto = json_decode(file_get_contents("php://input"));
    
    try {
        $sql = "insert into comentarios(id_sesion,id_volu,id_estu,titulo,liderazgo,estatus,comportamiento,opinion) 
        values(:id,:id_volu,:id_estu,:titulo,:liderazgo,:estatus,:comportamiento,:opinion)";
        $rs  = Conex::getInstance()->db->prepare($sql);
       
        $rs->bindValue(":id", $producto->id);
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