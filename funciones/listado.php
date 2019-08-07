<?php

function Listar(){
    $Listado=array();
    //me conecto
    $MiConexion=ConexionBD();
    //si todo es correcto...
    if ($MiConexion!=false){
        //le paso la consulta que necesito
        $SQL = "SELECT nombre, apellido, email FROM usuario WHERE email = '{$_SESSION['email']}'";
        //genera el conjunto de registros que devuelve la consulta
        $rs = mysqli_query($MiConexion, $SQL);
        $i=0;  //armo el listado para devolverlo y usarlo en el otro script
        while ($data = mysqli_fetch_array($rs)) {
            $Listado[$i]['nombre'] = $data['nombre'];
            $Listado[$i]['apellido'] = $data['apellido'];
            $i++;
        }
    }
    return $Listado;
}
    


?>