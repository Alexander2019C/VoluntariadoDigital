<?php

include_once ($_SERVER['DOCUMENT_ROOT'].'/ts/dirs.php');

require_once (CONEX_PATH."Conex.php");


$cservice = new Seciones();



if (isset($_REQUEST['action'])) {

  


    // Obtener top 10 voluntarios con mas sesiones
    if ($_GET['action'] == 'graficos') {
        
        $cservice->Todografico(); 
        exit;
        
    }
    if ($_GET['action'] == 'top5sesiones') {
        
        $cservice->Top5sesiones(); 
        exit;
       
        
    }
    if ($_GET['action'] == 'top3Shoras') {
        
        $cservice-> Top3Shoras(); 
        exit;
        
        
    }

    // escript para ver el top de 5 estudiantes con el 100% de liderazgo Top5estudiantes  Top3SesionesHoras

    if ($_GET['action'] == 'top5estu100lider') {
        
        $cservice-> Top5estudiantes(); 
        exit;
        
        
    }
    if ($_GET['action'] == 'Top3SesionesHoras') { 
        
        $cservice-> Top3TitulosMasHoras(); 
        exit;
        
        
    }
    if ($_GET['action'] == 'Cantidadhoraspormes') { 
        
        $cservice-> CantidadHorasMes(); 
        exit;
        
        
    }

    
 }


class Seciones
{

    

  
    
// incio de funcion top 10 personas con mas  horas  de sesiones

    public function Todografico()
    {
       
        try {
            $sql = " SELECT concat( p.p1 ,' ', p.a1 )AS nombre ,sum(nro_horas) AS horas,COUNT(dni) AS sesion FROM sesiones
            INNER JOIN usuariots AS p
            ON p.dni=sesiones.id_voluntario
            GROUP BY p.id ORDER BY horas
             DESC LIMIT 10";
            $rs  = Conex::getInstance()->db->prepare($sql);
            $rs->execute();
            $result = $rs->fetchAll(PDO::FETCH_OBJ);
            return (print_r(json_encode($result)));
        } catch (Exception $ex) {
            print "Ocurrio en error";
            echo "Error: " . $ex->getMessage();
        }
    }
//    fin top
// incio top 5 voluntario con mas sesiones

public function Top5sesiones()
{
   
    try {
        $sql = " SELECT concat( p.p1 ,' ', p.a1  )AS nombre ,sum(nro_horas) AS horas,COUNT(dni) AS sesion FROM sesiones
        INNER JOIN usuariots AS p
        ON p.dni=sesiones.id_voluntario
        GROUP BY p.id ORDER BY horas DESC LIMIT 5";
        $rs  = Conex::getInstance()->db->prepare($sql);
        $rs->execute();
        $result = $rs->fetchAll(PDO::FETCH_OBJ);
        return (print_r(json_encode($result)));
    } catch (Exception $ex) {
        print "Ocurrio en error";
        echo "Error: " . $ex->getMessage();
    }
}

public function Top3Shoras()
{
   
    try {
        $sql = " 
        SELECT  CONCAT (p.p1,' ',p.a1, ' ',p.a2) as nombre,titulo,
        SUM((nro_horas)) AS horas FROM sesiones
         INNER JOIN usuariots AS p
         ON p.dni=sesiones.id_voluntario
         GROUP BY sesiones.id_voluntario ORDER BY horas
         DESC LIMIT 3";
        $rs  = Conex::getInstance()->db->prepare($sql);
        $rs->execute();
        $result = $rs->fetchAll(PDO::FETCH_OBJ);
        return (print_r(json_encode($result)));
    } catch (Exception $ex) {
        print "Ocurrio en error";
        echo "Error: " . $ex->getMessage();
    }
}

// funcion para mostrar el top de 5 estudiantes con el 100 % de liderazo
public function Top5estudiantes()
{
   
    try {
        $sql = "SELECT  CONCAT (p.p1,' ',p.a1, ' ',p.a2) as nombre,liderazgo
        FROM comentarios com
                INNER JOIN usuariots AS p
                ON p.dni=com.id_estu
                group by com.id_estu
                
                 LIMIT 5";
        $rs  = Conex::getInstance()->db->prepare($sql);
        $rs->execute();
        $result = $rs->fetchAll(PDO::FETCH_OBJ);
        return (print_r(json_encode($result)));
    } catch (Exception $ex) {
        print "Ocurrio en error";
        echo "Error: " . $ex->getMessage();
    }
}


public function Top3TitulosMasHoras()
{
   
    try {
        $sql = "SELECT sum(nro_horas) AS total,titulo
        from sesiones GROUP BY titulo 
        HAVING titulo!='VOLUNTARIADO DIGITAL 2020'  ORDER BY total DESC LIMIT 3
       ";
        $rs  = Conex::getInstance()->db->prepare($sql);
        $rs->execute();
        $result = $rs->fetchAll(PDO::FETCH_OBJ);
        return (print_r(json_encode($result)));
    } catch (Exception $ex) {
        print "Ocurrio en error";
        echo "Error: " . $ex->getMessage();

    }
}


public function CantidadHorasMes()
{
   
    try {
        $sql = "SELECT month(fecha) AS fecha,sum(nro_horas) AS horas FROM sesiones GROUP BY MONTH(fecha)
        limit 12";
        $rs  = Conex::getInstance()->db->prepare($sql);
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

















