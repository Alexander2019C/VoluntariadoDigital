<?php

include_once ($_SERVER['DOCUMENT_ROOT'].'/ts/dirs.php');
require_once (CONEX_PATH."Conex.php");


$cservice = new Seciones();



if (isset($_REQUEST['action'])) {

    if ($_GET['action'] == 'Msesiones') {
        $cservice->Msesiones();
        exit;
    }

    // buscar sesion cuando le da click al ojito
    if ($_GET['action'] == 'BuscarSesion') {
        
        $cservice->BuscarSesion(); 
        exit;
    }
    
   
    
 }


class Seciones
{

    

  
    

    public function Msesiones()
    {
        
    $producto = json_decode(file_get_contents("php://input"));
        
    try {
        $sql = "SELECT s.id,s.id_voluntario as voluntario,s.titulo,s.fecha,s.nro_horas AS horas,
        s.finicio_ffinal AS i_f,CONCAT(u.p1,' ',u.a1,' ',u.a2)AS nombre,u.tipo,men.id_estu
FROM mentoroficial men
inner JOIN usuariots u
           ON u.dni=men.id_estu
            INNER JOIN sesiones s
            ON s.id=men.id_sesion
            WHERE men.id_estu=:dni ";
        $rs  = Conex::getInstance()->db->prepare($sql);
        $rs->bindValue(":dni", $producto->id_volu);
        
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
            s.finicio_ffinal AS i_f,CONCAT(u.p1,' ',u.a1,' ',u.a2)AS nombre,com.id_estu,
            com.liderazgo AS li,com.estatus AS es,com.comportamiento AS comportamiento,
				com.opinion AS opinion,cha.tarea as tarea
             FROM sesiones s
                        inner join usuariots u
                        on u.dni=s.id_voluntario
                        INNER JOIN comentarios com
                        ON s.id=com.id_sesion  
                        INNER JOIN charlas cha
								ON cha.titulo=s.titulo 
                         
                         where s.id=:id
                         AND com.id_estu=:dni
                         
                         ";
            $rs  = Conex::getInstance()->db->prepare($sql);
            $rs->bindValue(":dni", $producto->id_estu);
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

    
}
?>