<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Panel de Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

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
         require_once 'funciones/validar.inc.php';
         if (!empty($_POST['btnLogin'])) {
              echo "Ingreso con el boton";  
              $_SESSION['Mensaje'] = ControlesValidos();
              $_SESSION['Mensaje'].= DatosUsuarioCorrecto($_POST['email'],$_POST['clave']);
              //si la funcion devuelve los mensajes, los mostrare mas abajo
              //si la funcion devuelve un mensaje vacio, entonces ya puedo loguear
              if (!empty($_SESSION['Mensaje'])) {
                  $_SESSION['email']=$_POST['email']; 
                  header('Location: index.php');
                  exit;
              }
              else{
                  header('Location: login.php');
                  exit;
              }
        }
     ?>

</head>

<body>
    <?php
          //  if (!empty($_SESSION['Mensaje'])) {
            //    echo $_SESSION['Mensaje'];
           // }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ingreso al Panel</h3>
                    </div>
					
					
					<!--MENSAJE DE ERROR -->
					<div class="alert alert-danger">
                              <a href="#" class="alert-link"><?php if (!empty($_SESSION['Mensaje'])) echo "Error: Datos incorrectos";?></a> 
                            </div>
                    
					<!--FIN MENSAJE DE ERROR -->
					
					
					<div class="panel-body">
                        <form role="form" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" value="<?php echo!empty($_POST['email']) ? $_POST['email'] : ''; ?>">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="clave" type="password" value="<?php echo!empty($_POST['clave']) ? $_POST['clave'] : ''; ?>">
                                </div>
                                
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" name="btnLogin" value="btnLogin" class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
<?php 
//destruyo aqui directamente toda variable de sesion mientras no se encuentre logueado
session_destroy();
$_SESSION = array(); ?>