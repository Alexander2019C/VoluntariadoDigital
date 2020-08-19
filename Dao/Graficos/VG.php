<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/ts/dirs.php');
require_once (CONEX_PATH."Conex.php");
$cservice = new VOL();



if (isset($_REQUEST['action'])) {

  


    // Obtener top 10 voluntarios con mas sesiones
    if ($_GET['action'] == 'graficos') {
        $dni=($_REQUEST['id_volu']);
        $cservice->VGNIVEL($dni); 
        exit;
        
    }
  

    
 }


class VOL
{

    

  
    
// incio de funcion top 10 personas con mas  horas  de sesiones

       
    public function VGNIVEL($dni)
    {
        

        $producto = json_decode(file_get_contents("php://input"));
        
        try {
            $sql = "SELECT s.nro_horas *0+100 as horas FROM sesiones s WHERE s.id_voluntario=$dni";
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

















