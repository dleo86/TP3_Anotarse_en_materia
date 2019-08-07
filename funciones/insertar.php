<?php
function Listar_Carrera() {
    $Listado = array();
    $MiConexion = ConexionBD();
    if ($MiConexion != false) {
                $SQL = "SELECT id, carrera FROM lugar";

        $rs = mysqli_query($MiConexion, $SQL);
        $i = 0;
        while ($data = mysqli_fetch_array($rs)) {
             $Listado[$i]['ID'] = $data['id'];
            $Listado[$i]['CARRERA'] = utf8_encode($data['carrera']);
            $i++;
        }
    }

    return $Listado;
}
function Listar_Dia() {
    $Listado = array();
    $MiConexion = ConexionBD();
    if ($MiConexion != false) {
                $SQL = "SELECT id, nombre FROM dia";

        $rs = mysqli_query($MiConexion, $SQL);
        $i = 0;
        while ($data = mysqli_fetch_array($rs)) {
             $Listado[$i]['ID'] = $data['id'];
            $Listado[$i]['NOMBRE'] = utf8_encode($data['nombre']);
            $i++;
        }
    }

    return $Listado;
}

function Listar_Aula() {
    $Listado = array();
    $MiConexion = ConexionBD();
    if ($MiConexion != false) {
                $SQL = "SELECT id, nombre FROM aula";

        $rs = mysqli_query($MiConexion, $SQL);
        $i = 0;
        while ($data = mysqli_fetch_array($rs)) {
             $Listado[$i]['ID'] = $data['id'];
            $Listado[$i]['NOMBRE'] = utf8_encode($data['nombre']);
            $i++;
        }
    }

    return $Listado;
}

function Insertar($Nom_us,$Ap_us,$Nombre,$carrera,$dia,$Desde,$Hasta,$aula,$archivo){
    //echo "entro a sql";
    if ($Desde != 'NULL' && $Hasta != 'NULL'){
         $SQL = "INSERT INTO curso (nom_us,ap_us,nombre,carrera,dia,desde,hasta,aula,archivo) VALUES ('{$Nom_us}','{$Ap_us}','{$Nombre}','{$carrera}','{$dia}','{$Desde}','{$Hasta}','{$aula}','{$archivo}')";
     } else{
        return false;
     }       
    $linkConexion=ConexionBD();
    if (!mysqli_query($linkConexion, $SQL)){
        return false;
    }else {
        return true;
    }
}

?>