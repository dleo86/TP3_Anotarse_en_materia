<!DOCTYPE html>
<html lang="en">

    <head>
    <?php 
       session_start();
        require_once 'funciones/listado.php';
        require_once 'funciones/funciones_conexion.inc.php';
        //require_once 'funciones/empleados.inc.php';
        //require_once 'funciones/cambiar_formato.php';
          //comienzo a usar sesiones
        //si la session que contiene el valor del login esta vacia, 
       //o algun valor identificando una sesion abierta este vacio...
      if (empty($_SESSION['email'])) { 
       //automaticamente redireccionar al login.php
        header('Location: login.php');
        exit;
      }
//si la sesion contiene valor, es porque se logueo y puedo mostrar el contenido
 ?>
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

    </head>

</head>

<body>
     <?php
          $list = array();
          $list = Listar();
        ?>
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
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Inicio</a>
                        </li>

                        <li>
                            <a href="nuevocurso.php"><i class="fa fa-dashboard fa-fw"></i> Cargar nuevo curso</a>
                        </li>


                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Bienvenido <?php echo $list[0]['nombre']; echo " ";echo $list[0]['apellido']; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Selecciona una acci&oacute;n del menu
                        </div>
                        
                       
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
