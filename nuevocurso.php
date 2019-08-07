<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- jQuery -->
        <script src="bower_components/jquery/dist/jquery.min.js"></script>

        <title>Panel</title>

        <!-- Bootstrap Core CSS -->
        <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
       <?php
         session_start();
         require_once 'funciones/funciones_conexion.inc.php';
         require_once 'funciones/insertar.php';
         require_once 'funciones/listado.php';
        
         $list = array();
         $list = Listar();

         $Listar_Carr = array();
         $Listar_D = array();
         $Listar_A = array();
         $arreglo = array();

        $Listar_Carr = Listar_Carrera();
        $cntCarrera = count($Listar_Carr);

        $Listar_D = Listar_Dia();
        $cntDia = count($Listar_D);

        $Listar_A = Listar_Aula();
        $cntAula = count($Listar_A);
        $valor = 2;

         if (!empty($_POST['btnCurso'])) {
            $arreglo = Insertar($list[0]['nombre'], $list[0]['apellido'], $_POST['nombre'],$_POST['carrera'],$_POST['dia'],$_POST['desde1'],$_POST['hasta1'],$_POST['aula'],$_POST['MiArchivo']);
           if (!empty($arreglo)) {
              $_SESSION['MensajeOk'] = 'Registrado';
              $valor = 1;
           } else {
              $_SESSION['MensajeError'] = 'Faltan completar datos';
              $valor = 3;
           }
        }
        
    
        ?>

    </head>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">Admin Gestor</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Mi Perfil</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Configuraciones</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.php"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Inicio</a>
                        </li>

                        <li>
                            <a href="nuevoCurso.php"><i class="fa fa-dashboard fa-fw"></i> Cargar nuevo curso</a>
                        </li>


                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper">
           
			<div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Formulario para un nuevo curso
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <?php if ($valor == 1){ ?>
                            <div class="alert alert-success">
                                Los datos ingresados son correctos. <a href="#" class="alert-link">Registrado</a>.
                            </div><?php } ?>
                            <?php if ($valor == 2){ ?>
                            <div class="alert alert-warning">
                                Complete todos los datos. <a href="#" class="alert-link">Importante</a>.
                            </div><?php } ?>
                            <?php if ($valor == 3){ ?>
                            <div class="alert alert-danger">
                                Faltan completar datos. <a href="#" class="alert-link">Error</a>.
                            </div><?php } ?>
                        </div>
                        <!-- .panel-body -->
                        <div class="col-lg-6">

                            <!-- /.panel -->
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                    <form role="form" method="post">

                         <div class="form-group">
                                        <label>Nombre del curso (*)</label>
                                        <input type="text" class="form-control" name="nombre" value="<?php echo!empty($_POST['nombre']) ? $_POST['nombre'] : ''; ?>">

                                    
                                    <div class="form-group">
                                        <label>Carrera asociada (*)</label>
                                        <select name= "carrera"class="form-control">    
                                          <?php
                                            for ($i = 0; $i < $cntCarrera; $i++){
                                               $seleccionado = !empty($_POST['carrera']) && $_POST['carrera'] == $Listar_Carr[$i]['ID'] ? 'selected' : '';
                                           ?>
                                         <option  value="<?php echo  $Listar_Carr[$i]['CARRERA'] ?>"   <?php echo $seleccionado; ?> >
                                              <?php echo $Listar_Carr[$i]['CARRERA'] /* Mayusculas o minusculas afectan!*/?>
                                         </option>
                                    <?php } ?>
											
                                        </select>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label>Un dia de la semana (*)</label>
                                        <select name= "dia" class="form-control">
                                            <?php
                                            for ($i = 0; $i < $cntDia; $i++){
                                               $seleccionado = !empty($_POST['nombre']) && $_POST['nombre'] == $Listar_D[$i]['ID'] ? 'selected' : '';
                                           ?>
                                         <option  value="<?php echo  $Listar_D[$i]['NOMBRE'] ?>"   <?php echo $seleccionado; ?> >
                                              <?php echo $Listar_D[$i]['NOMBRE'] /* Mayusculas o minusculas afectan!*/?>
                                         </option>
                                    <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Hora Desde (*)</label>
                                        <select name="desde1" class="form-control">
                                            <option value='NULL'>Elige un item</option>
                                    
                                            <option value="07">07:00</option>
                                            <option value="08">08:00</option>
                                            <option value="09">09:00</option>
                                            <option value="10">10:00</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Hora Hasta (*)</label>
                                        <select name="hasta1"class="form-control">
                                            <option value='NULL'>Elige un item</option>
                                            <option value="10">10:00</option>
                                            <option value="12">12:00</option>
                                            <option value="13">13:00</option>
                                            <option value="14">14:00</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Aula (*)</label>
                                        <select name= "aula" class="form-control">
                                            <?php
                                            for ($i = 0; $i < $cntAula; $i++){
                                               $seleccionado = !empty($_POST['nombre']) && $_POST['nombre'] == $Listar_A[$i]['ID'] ? 'selected' : '';
                                           ?>
                                         <option  value="<?php echo  $Listar_A[$i]['NOMBRE'] ?>"   <?php echo $seleccionado; ?> >
                                              <?php echo $Listar_A[$i]['NOMBRE'] /* Mayusculas o minusculas afectan!*/?>
                                         </option>
                                         <?php } ?>
                                            
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Subir Programa de la materia formato PDF</label>
                                        <input type="file" name="MiArchivo">
                                    </div>
                                    <button type="submit" class="btn btn-default" name="btnCurso" value="btnCurso">Guardar</button>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                     </form>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
