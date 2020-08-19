<?php
include("Dao/conexion.php");
$p1=$_SESSION['p1'];
$p2=$_SESSION['p2'];
$p3=$_SESSION['p3'];
$a1=$_SESSION['a1'];
$a2=$_SESSION['a2'];
$dni=$_SESSION['dni'];

?>
<!DOCTYPE html>
<html lang="es" ng-app="moduloProducto">

<head>
<script src="js/angular.js"></script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $p1." ".$a1." ".$a2 ?></title>
 
  
  <script src="js/voluntario.js"></script>
  
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  
  
  
  

</head>

<body id="page-top" ng-controller="ctrlProducto">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-0">
          <img src="img/volu.jpg" alt="" style="width: 40px;">
        </div>
        <div class="sidebar-brand-text mx-3">Voluntariado <sup>digital</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Panel de control</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->

      <li class="nav-item" ng-click="MostrarSesiones()" >
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-book"></i>
          <span>Sesiones</span>
        </a>
        
      </li>
      <li class="nav-item" ng-click="CrearSesion()">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-book"></i>
          <span>Nueva Sesion</span>
        </a>
        
      </li>
      <li class="nav-item" ng-click="indicadores()" id="indicadores">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-book"></i>
          <span>Indicadores</span>
        </a>
        
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="file/manual.pdf"  target="blank" >
          <i class="fas fa-fw fa-book"></i>
          <span>Descargar Manual</span>
        </a>
        
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item" style="display: none;">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading" style="display: none;">
        Addons
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item" style="display: none;">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item" style="display: none;">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item" style="display: none;">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

        

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

          
            

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $p1 . " " . $p2; ?></span>
                <!-- <img class="img-profile rounded-circle" src="" alter="NO hay imagen"> -->
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
         <div class="container-fluid">
                <div ng-switch="vista">
                <div ng-switch-when="sesiones">
          
          <div class="d-sm-flex align-items-center justify-content-between mb-4" >
          <h1 class="h3 mb-0 text-gray-800">VOLUNTARIO</h1>
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="display:none;">
          <i class="fas fa-download fa-sm text-white-50"></i> Generar Reporte</a>
          </div>

      
         <div class="row">
         <div class="col-xl-6 col-md-6 mb-4" ng-repeat="sesiones in sesionesmios" >
          <div class="card border-left-info border-bottom-info shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center" >
                <div>
                  <img src="img/volu.jpg" alt="" style="width: 100px;">
                </div>
                <div class="col mr-2"  >
                  <input type="text" value="{{sesiones.id}}" style="display:none">
                  <div class="text-md font-weight-bold text-primary text-uppercase mb-4">{{sesiones.titulo}}</div>
                  <div class="text-xs font-weight-bold text-gray-500  mb-2">Nombre: {{sesiones.nombre}}</div>
                  <div class="h6 mb-0 font-weight-bold text-gray-500">Fecha: {{sesiones.fecha}} </div>
                  <div class="h6 mb-0 font-weight-bold text-gray-500">Horas: {{sesiones.horas}} </div>
                  <div class="h6 mb-0 font-weight-bold text-gray-500">Inicio-Fin: {{sesiones.i_f}}</div>
                </div>
                <div class="col-auto">
                  <a href="#" data-toggle="modal" data-target="#Sesiones" ng-click="BuscarSesion(sesiones)"><i class="fas fa-eye fa-2x text-grey-1000" title="Ver Sesion"></i></a>
                  
                </div>
              </div>
            </div>
          </div>
         </div>
        

       
         
        </div><!---fin de -->  
</div> <!-- fin de sesiones-->
<div ng-switch-when="crearsesiones">
            <div class="row">

            
               <div class="col-lg-12 mb-4">
                  <div class="card shadow mb-4">
                  <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-info" >CREA TU NUEVA SESIÓN : {{sesiones.titulo}}
                    <div class="form-group">
                    <input type="text" value="" class="form-control form-control-user" style="width: 13%;float: right;"
                    id="fecha" name="fecha" ng-init="sesiones.fecha='<?php echo date("yy-m-d"); ?>'" ng-model="sesiones.fecha">
                  </div>
                  </h6>
                 </div>
                 <div class="card-body">
                  <div class="row" style="text-align: center;">
                    <div class="col-lg-7 ">
                    <h4 class="small font-weight-bold" ng-model="crearsesion" >Nombre de la sesión</h4>
                    <div class="form-group">
                    <input type="text"  
                    style="text-align: left;display:none;" id="id_volu" name="id_volu" ng-init="sesiones.id_volu='<?php echo $_SESSION['dni'];?>'" ng-model="sesiones.id_volu">
                    <select id="titulo" class="form-control" ng-init="sesiones.titulo=''"  ng-model="sesiones.titulo" >
                        
                         <option value="{{titulos.titulo}}"  ng-repeat="titulos in SesionesTitulos">{{titulos.titulo}}</option>
                       </select>
                    </div>
                    </div>
                    <div class="col-lg-2 ">
                      <h4 class="small font-weight-bold">Número de horas </h4>
                      <div class="form-group">
                        <input type="text" class="form-control form-control-user" style="text-align: center;" id="nro_horas" name="nro_horas"
                        ng-init="sesiones.nro_horas='1'" ng-model="sesiones.nro_horas">
                      </div>
                      </div>
                      <div class="col-lg-3 ">
                        <h4 class="small font-weight-bold">Hora de inicio / Hora de fin</h4>
                        <div class="form-group">
                          <input type="text" class="form-control form-control-user" style="text-align: center;" placeholder="Ejemplo: 13:00 / 15:30" 
                          id="finicio_ffinal" name="finicio_ffinal" ng-init="sesiones.finicio_ffinal='13:00-14:00'" ng-model="sesiones.finicio_ffinal">
                        </div>
                        <div class="form-group">
                        <button class=" btn btn-info"  style="float: right;" ng-click="NuevaSesion(sesiones)" style="cursor:pointer;">Siguiente</button>
                    </div>
                        </div>
                  </div>
                  </div>
               
                  </div>
              </div>
           </div>
</div> <!-- fin de crear sesiones-->

<div ng-switch-when="inscritos">
              <div class="card-body">
                  <div class="card-header py-5">
                      <h6 class="m-0 font-weight-bold text-info">Inscritos para la Session : {{f_titulo(UltimaSesion)}}
                          <div class="form-group">
                             <a class="btn btn-info" href="#" data-toggle="modal" data-target="#Tablats" style="float: right;" ng-click="ListarUsuarios()">Agregar</a>
                           </div>
                    </h6>
                  </div>
                  <div >
                  <table id="mtable" class="table table-striped table-condensed table-bordered dt-responsive nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                <th>Id</th>
                                <th>Tipo Documento</th>
                                <th>Nro Documento</th>
                                <th>Nombres</th>
                                <th>Especialidad</th>
                                <th>Promocion</th>
                                
                                </tr>
                            </thead>
                            
                            <tbody>
                                <tr ng-repeat="usuarios in listausuarios">
                                <td>{{usuarios.id}}</td>
                                <td>Dni</td>
                                <td>{{usuarios.dni}}</td>
                                <td>{{usuarios.nombres}}  </td>
                                <td>{{usuarios.puesto}}</td>
                                <td>{{usuarios.pro}}</td>
                                
                                </tr>
                                
                            
                            </tbody>
                            </table>
                 </div>
                 <button class="btn btn-info"  type="button" ng-click="verAutoevaluacion()">Siguiente</button>      
        </div>            
</div> <!-- fin de crear Inscritos-->

<div ng-switch-when="comentarios">
              <div class="card-body">
                  <div class="card-header py-5">
                      <h6 class="m-0 font-weight-bold text-info"  >Autoevaluacion para la sesion  : {{f_titulo(UltimaSesion)}}
                     </h6>
                </div>
              <div class="row">

            
                  <div class="col-lg-6 mb-4"><!-- pregunta 1-->
                   <label for=""> 1.- Considerando tu experiencia completa con el programa, ¿qué posibilidades existen de recomendárselo a un amigo o colega?</label>
                  </div>
                  <div class="form-group col-md-6 mb-4" style="text-align:center;">
                  <input type="text" ng-init="evaluacion.id_volu='<?php echo $_SESSION["dni"]?>'" value="{{evaluacion.id_volu}}" style="display:none;">
                  <input type="text" ng-model="evaluacion.id=f_id(UltimaSesion)" style="display:none;">
                  <input type="text" ng-model="evaluacion.titulo=f_titulo(UltimaSesion)"  style="display:none;">
      
                          <select id="inputState" class="form-control" ng-init="evaluacion.pre1=' '" ng-model="evaluacion.pre1">
                         
                            <option value="0" >pesimo 0%</option>
                            <option value="50">Regular 50%</option>
                            <option value="100">Excelente 100%</option>
                          </select>
    
                  </div>

                  <div class="col-lg-6 mb-4"><!-- pregunta 2-->
                   <label for=""> 2.-¿te sentiste comodo con los alumnos  de technical School? </label>
                  </div>
                  <div class="form-group col-md-6 mb-4" style="text-align:center;">
      
                          <select id="inputState" class="form-control" ng-init="evaluacion.pre2=' '" ng-model="evaluacion.pre2" >
                         
                            <option value="si" >Si</option>
                            <option value="no">No</option>
                            <option value="regular">Regular</option>
                          </select>
    
                  </div>

                  <div class="col-lg-6 mb-4"><!-- pregunta 3-->
                   <label for=""> 3.-¿Crees que pueda ser una nueva forma de exponer charlas on line para el futuro?</label>
                  </div>
                  <div class="form-group col-md-6 mb-4" style="text-align:center;">
      
                          <select id="inputState" class="form-control" ng-init="evaluacion.pre3=''" ng-model="evaluacion.pre3">
                          
                            <option value="si" >Si</option>
                            <option value="no">No</option>
                            <option value="puede ser">Puede ser</option>
                          </select>
    
                  </div>

                  <div class="col-lg-10 mb-4"><!-- pregunta 4-->
                   <label for=""> 4: Dejanos tu comentario acerca de la sesion de hoy dia </label>
                  </div>
                  <div class="form-group col-md-6 mb-4" style="text-align:center;">
      
                          <textarea name="" id="" cols="50" rows="5" ng-init="evaluacion.pre4=' '" ng-model="evaluacion.pre4"></textarea>
    
                  </div>



                  <div class="col-lg-10 mb-4"><!-- Boton  de continuar-->
                  <button class="btn btn-info" ng-click="Califiaciones1(evaluacion)">Calificar estudiantes</button>
                   <button class="btn btn-info" ng-click="GuardarAutoevaluacion(evaluacion)" style="display:none;">Terminar sesion</button>
                  </div>
                  
                 
                  
                    

            </div>
                            
        </div>            
</div> <!-- fin de crear comentarios-->


<div ng-switch-when="caliestudiante1">
              <div class="card-body">
                  <div class="card-header py-1">
                      <h6 class="m-0 font-weight-bold text-info"  >Calificar al estudiante :{{listausuarios[0].nombres}}
                     </h6>
                </div>
              <div class="row">

            
                  <div class="col-lg-6 mb-4"><!-- pregunta 1-->
                   <label for=""> 1.-cual es su nivel de  Estatus : </label>
                  </div>
                  <div class="form-group col-md-6 mb-4" style="text-align:center;">
                  <input type="text" ng-init="alumno1.id_volu='<?php echo $_SESSION["dni"]?>'" value="{{alumno1.id_volu}}" style="display:none;">
                  <input type="text" ng-value="alumno1.id_estu='{{listausuarios[0].dni}}'" style="display:none;" >
                  <input type="text" ng-model="alumno1.id=f_id(UltimaSesion)" style="display:none;">
                  
                  <input type="text" ng-model="alumno1.titulo=f_titulo(UltimaSesion)"  style="display:none;">
      
                          <select id="inputState" class="form-control" ng-init="alumno1.estatus=' '" ng-model="alumno1.estatus">
                         
                            <option value="100" >Muy bien </option>
                            <option value="50">Regular</option>
                            <option value="0">Pesimo</option>
                          </select>
    
                  </div>

                  <div class="col-lg-6 mb-4"><!-- pregunta 1-->
                   <label for=""> 2.-Como fue su  Comportamiento: : </label>
                  </div>
                  <div class="form-group col-md-6 mb-4" style="text-align:center;">
                       
                          <select id="inputState" class="form-control" ng-init="alumno1.comportamiento=' '" ng-model="alumno1.comportamiento">
                         
                            <option value="100" >Muy bien </option>
                            <option value="50">Regular</option>
                            <option value="0">Pesimo</option>
                          </select>
    
                  </div>
                  <div class="col-lg-6 mb-4"><!-- pregunta 1-->
                   <label for=""> Cual  su capacidad  de liderazgo </label>
                  </div>
                  <div class="form-group col-md-6 mb-4" style="text-align:center;">
      
                          <select id="inputState" class="form-control" ng-init="alumno1.liderazgo=' '" ng-model="alumno1.liderazgo">
                         
                            <option value="100" >Muy bien </option>
                            <option value="50">Regular</option>
                            <option value="0">Pesimo</option>
                          </select>
    
                  </div>

                  

                  

                  <div class="col-lg-10 mb-4"><!-- pregunta 4-->
                   <label for=""> Dejale un comentario al estudiante : {{listausuarios[0].nombres}} </label>
                  </div>
                  <div class="form-group col-md-6 mb-4" style="text-align:center;">
      
                          <textarea name="" id="" cols="50" rows="5" ng-init="alumno1.opinion=' '" ng-model="alumno1.opinion"></textarea>
    
                  </div>



                  <div class="col-lg-10 mb-4"><!-- Boton  de continuar-->
                   <button class="btn btn-info" ng-click="Califiaciones2(alumno1)">Siguiente</button>
                  </div>
                  
                 
                  
                    

            </div>
                            
        </div>            
</div> <!-- fin de crear caliestudiante1-->


<div ng-switch-when="caliestudiante2">
              <div class="card-body">
                  <div class="card-header py-1">
                      <h6 class="m-0 font-weight-bold text-info"  >Calificar al estudiante :{{listausuarios[1].nombres}}
                     </h6>
                </div>
              <div class="row">

            
                  <div class="col-lg-6 mb-4"><!-- pregunta 1-->
                   <label for=""> 1.-cual es su nivel de  Estatus : </label>
                  </div>
                  <div class="form-group col-md-6 mb-4" style="text-align:center;">
                  <input type="text" ng-init="alumno2.id_volu='<?php echo $_SESSION["dni"]?>'" value="{{alumno2.id_volu}}" style="display:none;">
                  <input type="text" ng-value="alumno2.id_estu='{{listausuarios[1].dni}}'" style="display:none;" >
                  <input type="text" ng-model="alumno2.id=f_id(UltimaSesion)" style="display:none;">
                  
                  <input type="text" ng-model="alumno2.titulo=f_titulo(UltimaSesion)"  style="display:none;">
                  
      
                          <select id="inputState" class="form-control" ng-init="alumno2.estatus=' '" ng-model="alumno2.estatus">
                         
                            <option value="100" >Muy bien </option>
                            <option value="50">Regular</option>
                            <option value="0">Pesimo</option>
                          </select>
    
                  </div>

                  <div class="col-lg-6 mb-4"><!-- pregunta 1-->
                   <label for=""> 2.-Como fue su  Comportamiento: : </label>
                  </div>
                  <div class="form-group col-md-6 mb-4" style="text-align:center;">
                       
                          <select id="inputState" class="form-control" ng-init="alumno2.comportamiento=' '" ng-model="alumno2.comportamiento">
                         
                            <option value="100" >Muy bien </option>
                            <option value="50">Regular</option>
                            <option value="0">Pesimo</option>
                          </select>
    
                  </div>
                  <div class="col-lg-6 mb-4"><!-- pregunta 1-->
                   <label for=""> 3:-Cual  su capacidad  de liderazgo </label>
                  </div>
                  <div class="form-group col-md-6 mb-4" style="text-align:center;">
      
                          <select id="inputState" class="form-control" ng-init="alumno2.liderazgo=' '" ng-model="alumno2.liderazgo">
                         
                            <option value="100" >Muy bien </option>
                            <option value="50">Regular</option>
                            <option value="0">Pesimo</option>
                          </select>
    
                  </div>

                  

                  

                  <div class="col-lg-10 mb-4"><!-- pregunta 4-->
                   <label for=""> Dejale un comentario al estudiante : {{listausuarios[1].nombres}} </label>
                  </div>
                  <div class="form-group col-md-6 mb-4" style="text-align:center;">
      
                          <textarea name="" id="" cols="50" rows="5" ng-init="alumno2.opinion=' '" ng-model="alumno2.opinion"></textarea>
    
                  </div>



                  <div class="col-lg-10 mb-4"><!-- Boton  de continuar-->
                   <button class="btn btn-info" ng-click="Califiaciones3(alumno2)">Siguiente</button>
                  </div>
                  
                 
                  
                    

            </div>
                            
        </div>            
</div> <!-- fin de crear caliestudiante2-->


<div ng-switch-when="caliestudiante3">
              <div class="card-body">
                  <div class="card-header py-1">
                      <h6 class="m-0 font-weight-bold text-info"  >Calificar al estudiante :{{listausuarios[2].nombres}}
                     </h6>
                </div>
              <div class="row">

            
                  <div class="col-lg-6 mb-4"><!-- pregunta 1-->
                   <label for=""> 1.-cual es su nivel de  Estatus : </label>
                  </div>
                  <div class="form-group col-md-6 mb-4" style="text-align:center;">
                  <input type="text" ng-init="alumno3.id_volu='<?php echo $_SESSION["dni"]?>'" value="{{alumno3.id_volu}}" style="display:none;">
                  <input type="text" ng-value="alumno3.id_estu='{{listausuarios[2].dni}}'" style="display:none;" >
                  <input type="text" ng-model="alumno3.id=f_id(UltimaSesion)" style="display:none;">
                  
                  <input type="text" ng-model="alumno3.titulo=f_titulo(UltimaSesion)"  style="display:none;">
                  
      
                          <select id="inputState" class="form-control" ng-init="alumno3.estatus=' '" ng-model="alumno3.estatus">
                         
                            <option value="100" >Muy bien </option>
                            <option value="50">Regular</option>
                            <option value="0">Pesimo</option>
                          </select>
    
                  </div>

                  <div class="col-lg-6 mb-4"><!-- pregunta 1-->
                   <label for=""> 2.-Como fue su  Comportamiento: : </label>
                  </div>
                  <div class="form-group col-md-6 mb-4" style="text-align:center;">
                       
                          <select id="inputState" class="form-control" ng-init="alumno3.comportamiento=' '" ng-model="alumno3.comportamiento">
                         
                            <option value="100" >Muy bien </option>
                            <option value="50">Regular</option>
                            <option value="0">Pesimo</option>
                          </select>
    
                  </div>
                  <div class="col-lg-6 mb-4"><!-- pregunta 1-->
                   <label for=""> 3:-Cual  su capacidad  de liderazgo </label>
                  </div>
                  <div class="form-group col-md-6 mb-4" style="text-align:center;">
      
                          <select id="inputState" class="form-control" ng-init="alumno3.liderazgo=' '" ng-model="alumno3.liderazgo">
                         
                            <option value="100" >Muy bien </option>
                            <option value="50">Regular</option>
                            <option value="0">Pesimo</option>
                          </select>
    
                  </div>

                  

                  

                  <div class="col-lg-10 mb-4"><!-- pregunta 4-->
                   <label for=""> Dejale un comentario al estudiante : {{listausuarios[2].nombres}} </label>
                  </div>
                  <div class="form-group col-md-6 mb-4" style="text-align:center;">
      
                          <textarea name="" id="" cols="50" rows="5" ng-init="alumno3.opinion=' '" ng-model="alumno3.opinion"></textarea>
    
                  </div>



                  <div class="col-lg-10 mb-4"><!-- Boton  de continuar-->
                   <button class="btn btn-info" ng-click="Terminarsesion(alumno3)">Terminar sesion</button>
                  </div>
                  
                 
                  
                    

            </div>
                            
        </div>            
</div> <!-- fin de crear caliestudiante3-->
  <div ng-switch-when="indicadores">

 
            <div class="col-xl-12 col-lg-7">

              <!-- Area Chart -->
              <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-info">Sesiones</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
              <div class="chart-pie pt-4">
                <canvas id="alex"></canvas>
              </div>
              <hr>
              <!-- escribir texto -->
            </div>
          </div>
          </div>
          
 </div>






                  </div> <!-- fin de vista-->
       </div>
</div>
  

      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Technical School 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿List@ para salir  <?php echo $p1." ".$a1?> ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="Dao/ofsesion.php">Cerrar sesion</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Tabla de personas -->
  <div class="modal fade" id="Tablats" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
      <div class="modal-content" >
        <div class="modal-header" >
          <h5 class="modal-title" id="exampleModalLabel"></h5>Selecciona</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="card-body" >
          <div class="table-responsive">
            <table class="table table-bordered  " id="estudiantes" width="100%" cellspacing="0 " >
              <thead>
                <tr>
                  <th style="display:none">Nro </th>
                  <th style="display:none">Nro </th>
                  <th style="display:none">Nro </th>
                  <th>Nro </th>
                  <th>Nombre y Apellidos</th>
                  <th>Accion</th>
                </tr>
              </thead>
              <tfoot >
                <tr>
                  <th style="display:none">Nro </th>
                  <th style="display:none">Nro </th>
                  <th style="display:none">Nro </th>
                  <th>Nro </th>
                  <th>Nombre y Apellidos</th>
                  <th>Accion</th>
                </tr>
              </tfoot>
              
              <tbody> 
              
                <tr ng-repeat="sesionesM in estudiantes">
                <td ng-model="sesionesM.titulo=f_titulo(UltimaSesion)" style="display:none;"></td>
                <td  ng-model="sesionesM.id=f_id(UltimaSesion)" style="display:none;" > </td> 
                <td  ng-model="sesionesM.volu='<?php echo $_SESSION['dni'] ?>'"  style="display:none;">Voluntario</td> 
                <td>{{$index +1}}</td>
                <td>{{sesionesM.p1}} {{sesionesM.a1}} {{sesionesM.a2}}</td>
                <td ng-click="AgregarMentor(sesionesM)" ><button type="button" class="btn btn-info">Agregar</button></td>
                
                </tr>
               
               
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal" >Cerrar</button>
          <button class="btn btn-info"  type="button" data-dismiss="modal"  >Aceptar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Mostrar una sesion completa -->
  <div class="modal fade" id="Sesiones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
      <div class="modal-content" >
        <div class="modal-header" >
          <h5 class="modal-title" id="exampleModalLabel"></h5>Mostrando tu sesion</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="col-xl-12 col-md-10 mb-4" ng-repeat="sesiones in BuscarSesionID" >
          <div class="card border-left-info border-bottom-info shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center" >
                <div>
                  <img src="img/volu.jpg" alt="" style="width: 150px;">
                </div>
                <div class="col mr-2"  >
                  <div class="text-md font-weight-bold text-info text-uppercase mb-4" style="text-align:center;">{{sesiones.titulo}}</div>
                  <div class="text-md  font-weight-bold text-gray-500  mb-2">Nombre: {{sesiones.nombre}}</div>
                  <div class="text-md  font-weight-bold text-gray-500">Fecha: {{sesiones.fecha}} </div>
                  <div class="text-md  font-weight-bold text-gray-500">Horas: {{sesiones.horas}} </div>
                  <div class="text-md font-weight-bold text-gray-500">Inicio-Fin: {{sesiones.i_f}}</div>
                  <br>
                  <div class="text-md font-weight-bold text-info text-uppercase mb-2">Autoevaluaciones</div>
                  <div class="text-md font-weight-bold text-gray-500  mb-2">Pregunta1:{{sesiones.p1}} %</div>
                  <div class="text-md  font-weight-bold text-gray-500  mb-2">Pregunta2:{{sesiones.p2}}</div>
                  <div class="text-md  font-weight-bold text-gray-500  mb-2">Pregunta3: {{sesiones.p3}} </div>
                  <div class="text-md  font-weight-bold text-gray-500  mb-2">Pregunta4: {{sesiones.p4}} </div>
                  
                </div>
                
                
              </div>
            </div>
          </div>
         </div>
        
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal" >Cerrar</button>
          <button class="btn btn-info"  type="button" data-dismiss="modal"  >Aceptar</button>
        </div>
      </div>
    </div>
  </div>


  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>
<!-- tablas -->

<!-- charts js -->

  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/graficos/voluntario.js"></script> 
  <script src="js/graficos/tablas.js"></script> 

  <!-- tablas -->

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  


</body>
<script>
var dni='<?php echo $dni;?>';
</script>

</html>
