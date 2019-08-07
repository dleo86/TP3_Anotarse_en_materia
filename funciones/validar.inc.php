<?php
function ControlesValidos(){
    $MensajeError='';
   
    $_POST['email']=trim($_POST['email']); //limpio espacios al login
    if (strlen($_POST['email'])<3){
        //la longitud del login es menor a 3 caracteres
        $MensajeError.='La longitud del mail debe ser mayor a 3 caracteres <br />';
    }
  
    return $MensajeError;
}
/*
function ControlarUsuarioRepetido($Email) {
    //require_once 'funciones/funciones_conexion.inc.php';
//esta funcion toma un parametro, llamado $Email
//le es brindado desde la llamada de la funcion en el script principal con el $_POST['Email']
     $MensajeError = '';
    //me conecto
    $linkConexion = ConexionBD();
    //la consulta debe traer un registro si ese mail ya fue cargado
    $SQL = "SELECT Id FROM usuarios WHERE Email = '{$Email}'  ";
    $rs = mysqli_query($linkConexion, $SQL);
    $data = mysqli_fetch_array($rs);
    //si el conjunto de registros contiene valores, ese mail ya se registro
    if ($data != false) {
        $MensajeError = 'Este correo ya ha sido registrado. <br />';  
    }
    //$MensajeError = Activacion($Email);
    //devuelvo el mensaje, cargado o vacio segun encuentre o no ese mail
    return $MensajeError;
}

function Activacion($User) {
    //aseguro el dato q voy a actualizar en la tabla: q sea 0 o 1.   && !mysqli_query($MiConexion, $sSQL)
        $MensajeError = 'Este correo ya ha sido registrado 2. <br />';
        $anio = date(Y);
        $hoy = date("Y-m-d H:i:s"); 
        $SQL = "UPDATE empleado SET Activo = 1 WHERE login= '{$User}'"; 
        //$SQL = "INSERT INTO logs (FechaLog,Id_Evento,Email) VALUES ('{$hoy}', 1,'{$Email}')"; 
        $MiConexion = ConexionBD();
        if (!mysqli_query($MiConexion, $SQL)) {
            return false;
        } else {
            return true;
        } 
}*/

function DatosUsuarioCorrecto($User,$Pass) {
    $MensajeError='';
    //genero la consulta sql con los parametros enviados
    //entre comillas simples cada parametro por ser cadenas
    //si fueran numeros no haria falta q lleven comillas simples
    $SQL = "SELECT email, clave FROM usuario WHERE email='{$User}' AND clave = '{$Pass}' ";
    //genero la conexion AND activo = 1
    $linkConexion = ConexionBD();
    $rs = mysqli_query($linkConexion, $SQL);
    //por ser un solo registro el q debo traer, no aplico while
    $data = mysqli_fetch_array($rs);
    //si $data trajo algo, entonces cargo mis valores
    if ($data != false) {
        return true;
    }else{
        $MensajeError='Usuario incorrecto o inactivo';
        return false;
    }
}

?>