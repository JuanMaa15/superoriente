<?php

require_once("../../config/conexion.php");
require_once("../../models/DTO/DotacionEmpleadoDTO.php");

class DotacionEmpleadoDAO {

    var $ps; /* PreparedStatement */
    var $rs; /* ResultSet */
    var $st; /* Statement */

    // ----------- Registrar Dotacion empleado -------------


    /* public function registrarDotacionEmpleado ($dotacionEmpleadodto) {


        $cnx = Conexion::conectar();

        try {
            $sql = "INSERT INTO tbl_dotacion_empleado (id_usuario, id_tipo_dotacion, fecha) VALUES (?,?, GETDATE())";
            $ps = $cnx->prepare($sql);

            $usuario = $dotacionEmpleadodto->getUsuario();
            $tipo_dotacion

            $ps->bindParam(1, )
        } catch (Exception $ex) {
            //throw $th;
        }
    } */
}