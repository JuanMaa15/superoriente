<?php

require_once("../../config/conexion.php");
require_once("../../models/DTO/UsuarioDTO.php");

class UsuarioDAO {

    var $ps; /* PreparedStatement */
    var $rs; /* ResultSet */
    var $st; /* Statement */

    // ----------------------- Registrar un usuario ------------------------------------

    public function registrarUsuario($usuariodto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "INSERT INTO tbl_usuario(id_usuario, id_tipo_documento, fecha_expedicion, lugar_expedicion,  nombre, apellido, telefono_fijo, telefono_movil, id_casa, id_genero, fecha_nacimiento, edad, direccion, lugar_residencia, id_nivel_academico, area_academica, id_estado_civil, id_eps, nro_cuenta, id_tipo_sangre_rh, antecedentes, practica_deporte,consumo_cigarros, consumo_licor, consumo_spa, correo, pass, id_perfil, nombre_persona_emergencia, telefono_emergencia, celular_emergencia, parentesco_emergencia, id_sucursal, id_tipo_contrato, fecha_ingreso, fecha_retiro, motivo_retiro, salario, valor_dia, valor_hora, clase_riesgo, porcentaje_riesgo, id_area, id_seccion, id_cargo, id_pension, id_tipo_dotacion, id_estado) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,1)";

            $ps = $cnx->prepare($sql);

            $id_usuario = $usuariodto->getId_usuario();
            $tipo_documento = $usuariodto->getTipo_documento();
            $fecha_expedicion = $usuariodto->getFecha_expedicion();
            $lugar_expedicion = $usuariodto->getLugar_expedicion();        
            $nombre = $usuariodto->getNombre();
            $apellido = $usuariodto->getApellido();
            $telefono_fijo = $usuariodto->getTelefono_fijo();
            $telefono_movil = $usuariodto->getTelefono_movil();
            $tipo_casa = $usuariodto->getTipo_casa();
            $genero = $usuariodto->getGenero();
            $fecha_nacimiento = $usuariodto->getFecha_nacimiento();
            $edad = $usuariodto->getEdad();
            $direccion = $usuariodto->getDireccion();
            $lugar_residencia = $usuariodto->getLugar_residencia();
            $nivel_academico = $usuariodto->getNivel_academico();
            $area_academica = $usuariodto->getArea_academica();
            $estado_civil = $usuariodto->getEstado_civil();
            $eps = $usuariodto->getEps();
            $nro_cuenta = $usuariodto->getNro_cuenta();
            $tipo_sangre = $usuariodto->getTipo_sangre();
            $antecedentes = $usuariodto->getAntecedentes();
            $practica_deporte = $usuariodto->getPractica_deporte();
            $consumo_cigarros = $usuariodto->getConsumo_cigarros();
            $consumo_licor = $usuariodto->getConsumo_licor();
            $consumo_spa = $usuariodto->getConsumo_spa();
            $correo = $usuariodto->getCorreo();
            $password = $usuariodto->getPassword();
            $perfil = $usuariodto->getPerfil();
            $nombre_persona_emergencia = $usuariodto->getNombre_persona_emergencia();
            $telefono_emergencia = $usuariodto->getTelefono_emergencia();
            $celular_emergencia = $usuariodto->getCelular_emergencia();
            $parentesco_emergencia = $usuariodto->getParentesco_emergencia();


            $sucursal = $usuariodto->getSucursal();
            $tipo_contrato = $usuariodto->getTipo_contrato();
            $fecha_ingreso = $usuariodto->getFecha_ingreso();
            $fecha_retiro = $usuariodto->getFecha_retiro();
            $motivo_retiro =  $usuariodto->getMotivo_retiro();
            $salario = $usuariodto->getSalario();
            $valor_dia = $usuariodto->getValor_dia();
            $valor_hora = $usuariodto->getValor_hora();
            $clase_riesgo = $usuariodto->getClase_riesgo();
            $porcentaje_riesgo = $usuariodto->getPorcentaje_riesgo();
            $area = $usuariodto->getArea();
            $seccion = $usuariodto->getSeccion();
            $cargo = $usuariodto->getCargo();
            $pension = $usuariodto->getPension();
            $tipo_dotacion = $usuariodto->getTipo_dotacion();
           // $foto = $usuariodto->getFoto();

            $ps->bindParam(1, $id_usuario);
            $ps->bindParam(2, $tipo_documento);
            $ps->bindParam(3, $fecha_expedicion);
            $ps->bindParam(4, $lugar_expedicion);
            $ps->bindParam(5, $nombre);
            $ps->bindParam(6, $apellido);
            $ps->bindParam(7, $telefono_fijo);
            $ps->bindParam(8, $telefono_movil);
            $ps->bindParam(9, $tipo_casa);
            $ps->bindParam(10, $genero);
            $ps->bindParam(11, $fecha_nacimiento);
            $ps->bindParam(12, $edad);
            $ps->bindParam(13, $direccion);
            $ps->bindParam(14, $lugar_residencia);
            $ps->bindParam(15, $nivel_academico);
            $ps->bindParam(16, $area_academica);
            $ps->bindParam(17, $estado_civil);
            $ps->bindParam(18, $eps);
            $ps->bindParam(19, $nro_cuenta);
            $ps->bindParam(20, $tipo_sangre);
            $ps->bindParam(21, $antecedentes);
            $ps->bindParam(22, $practica_deporte);
            $ps->bindParam(23, $consumo_cigarros);
            $ps->bindParam(24, $consumo_licor);
            $ps->bindParam(25, $consumo_spa);
            $ps->bindParam(26, $correo);
            $ps->bindParam(27, $password);
            $ps->bindParam(28, $perfil);
            $ps->bindParam(29, $nombre_persona_emergencia);
            $ps->bindParam(30, $telefono_emergencia);
            $ps->bindParam(31, $celular_emergencia);
            $ps->bindParam(32, $parentesco_emergencia);


            $ps->bindParam(33, $sucursal);
            $ps->bindParam(34, $tipo_contrato);
            $ps->bindParam(35, $fecha_ingreso);
            $ps->bindParam(36, $fecha_retiro);
            $ps->bindParam(37, $motivo_retiro);
            $ps->bindParam(38, $salario);
            $ps->bindParam(39, $valor_dia);
            $ps->bindParam(40, $valor_hora);
            $ps->bindParam(41, $clase_riesgo);
            $ps->bindParam(42, $porcentaje_riesgo);
            $ps->bindParam(43, $area);
            $ps->bindParam(44, $seccion);
            $ps->bindParam(45, $cargo);
            $ps->bindParam(46, $pension);
            $ps->bindParam(47, $tipo_dotacion);

            $ps->execute();

            return true;


        } catch (Exception $e) {
            print "Error al registrar un usuario ". $e->getMessage();
        }

        return false;
    }


    // --------------------  Lista todos los usuarios --------------------------
    
    public function listaUsuarios() {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;
        
        try {
            $sql = "SELECT * FROM tbl_usuario AS tu INNER JOIN tbl_tipo_documento AS ttd ON tu.id_tipo_documento = ttd.id_tipo_documento INNER JOIN tbl_tipo_contrato AS ttc ON tu.id_tipo_contrato = ttc.id_tipo_contrato INNER JOIN tbl_perfil AS tp ON tu.id_perfil = tp.id_perfil INNER JOIN tbl_estado AS te ON tu.id_estado = te.id_estado INNER JOIN tbl_casa AS tc ON tu.id_casa = tc.id_casa INNER JOIN tbl_genero AS tg ON tu.id_genero = tg.id_genero INNER JOIN tbl_estado_civil AS tec ON tu.id_estado_civil = tec.id_estado_civil INNER JOIN tbl_tipo_sangre_rh AS ttsr ON tu.id_tipo_sangre_rh = ttsr.id_tipo_sangre_rh INNER JOIN tbl_nivel_academico AS tna ON tu.id_nivel_academico = tna.id_nivel_academico INNER JOIN tbl_eps AS teps ON tu.id_eps = teps.id_eps INNER JOIN tbl_sucursal AS tsu ON tu.id_sucursal = tsu.id_sucursal INNER JOIN tbl_seccion AS tsec ON tu.id_seccion = tsec.id_seccion INNER JOIN tbl_area AS tar ON tu.id_area = tar.id_area INNER JOIN tbl_cargo AS tcar ON tu.id_cargo = tcar.id_cargo INNER JOIN tbl_pension AS tpen ON tu.id_pension = tpen.id_pension INNER JOIN tbl_tipo_dotacion AS tpdo ON tu.id_tipo_dotacion = tpdo.id_tipo_dotacion";
            $rs = $cnx->query($sql);
            
            
            while ($row = $rs->fetch()) {

                $lista[$i] = new UsuarioDTO();
                $lista[$i]->constructor(
                    $row['id_usuario'],
                    $row['tipo_documento'],
                    $row['fecha_expedicion'],
                    $row['lugar_expedicion'],
                    $row['nombre'],
                    $row['apellido'],
                    $row['telefono_fijo'],
                    $row['telefono_movil'],
                    $row['tipo_casa'],
                    $row['id_genero'],
                    $row['fecha_nacimiento'],
                    $row['edad'],
                    $row['direccion'],
                    $row['lugar_residencia'],
                    $row['nivel_academico'],
                    $row['area_academica'],
                    $row['estado_civil'],
                    $row['eps'],
                    $row['nro_cuenta'],
                    $row['tipo_sangre_rh'],
                    $row['antecedentes'],
                    $row['practica_deporte'],
                    $row['consumo_cigarros'],
                    $row['consumo_licor'],
                    $row['consumo_spa'],
                    $row['correo'],
                    $row['pass'],
                    $row['id_perfil'],
                    $row['nombre_persona_emergencia'],
                    $row['telefono_emergencia'],
                    $row['celular_emergencia'],
                    $row['parentesco_emergencia'],
                    
                    $row['sucursal'],
                    $row['tipo_contrato'],
                    $row['fecha_ingreso'],
                    $row['fecha_retiro'],
                    $row['motivo_retiro'],
                    $row['salario'],
                    $row['valor_dia'],
                    $row['valor_hora'],
                    $row['clase_riesgo'],
                    $row['porcentaje_riesgo'],
                    $row['area'],
                    $row['seccion'],
                    $row['cargo'],
                    $row['pension'],
                    $row['tipo_dotacion'],
                    $row['estado'],
                );

            
                $i += 1;
            }

            return $lista;

        } catch (Exception $e) {
            print "Error al traer los datos de los usuarios " . $e->getMessage();
        }

        return null;

    }

    // ------------------------ Lista de datos del usuario -------------------

    public function listaUsuario($id_usuario) {

        $cnx = Conexion::conectar();
        $usuariodto = null;

        try {
            
            $sql = "SELECT * FROM tbl_usuario AS tu INNER JOIN tbl_tipo_documento AS ttd ON tu.id_tipo_documento = ttd.id_tipo_documento INNER JOIN tbl_tipo_contrato AS ttc ON tu.id_tipo_contrato = ttc.id_tipo_contrato INNER JOIN tbl_perfil AS tp ON tu.id_perfil = tp.id_perfil INNER JOIN tbl_estado AS te ON tu.id_estado = te.id_estado INNER JOIN tbl_casa AS tc ON tu.id_casa = tc.id_casa INNER JOIN tbl_genero AS tg ON tu.id_genero = tg.id_genero INNER JOIN tbl_estado_civil AS tec ON tu.id_estado_civil = tec.id_estado_civil INNER JOIN tbl_tipo_sangre_rh AS ttsr ON tu.id_tipo_sangre_rh = ttsr.id_tipo_sangre_rh INNER JOIN tbl_nivel_academico AS tna ON tu.id_nivel_academico = tna.id_nivel_academico INNER JOIN tbl_eps AS teps ON tu.id_eps = teps.id_eps INNER JOIN tbl_sucursal AS tsu ON tu.id_sucursal = tsu.id_sucursal INNER JOIN tbl_seccion AS tsec ON tu.id_seccion = tsec.id_seccion INNER JOIN tbl_area AS tar ON tu.id_area = tar.id_area INNER JOIN tbl_cargo AS tcar ON tu.id_cargo = tcar.id_cargo INNER JOIN tbl_pension AS tpen ON tu.id_pension = tpen.id_pension INNER JOIN tbl_tipo_dotacion AS tpdo ON tu.id_tipo_dotacion = tpdo.id_tipo_dotacion WHERE id_usuario = '" . $id_usuario . "'";
            $rs = $cnx->query($sql);

            $row = $rs->fetch();
            $usuariodto = new UsuarioDTO();
            $usuariodto->constructor(
                $row['id_usuario'],
                $row['tipo_documento'],
                $row['fecha_expedicion'],
                $row['lugar_expedicion'],
                $row['nombre'],
                $row['apellido'],
                $row['telefono_fijo'],
                $row['telefono_movil'],
                $row['tipo_casa'],
                $row['genero'],
                $row['fecha_nacimiento'],
                $row['edad'],
                $row['direccion'],
                $row['lugar_residencia'],
                $row['nivel_academico'],
                $row['area_academica'],
                $row['estado_civil'],
                $row['eps'],
                $row['nro_cuenta'],
                $row['tipo_sangre_rh'],
                $row['antecedentes'],
                $row['practica_deporte'],
                $row['consumo_cigarros'],
                $row['consumo_licor'],
                $row['consumo_spa'],
                $row['correo'],
                $row['pass'],
                $row['perfil'],
                $row['nombre_persona_emergencia'],
                $row['telefono_emergencia'],
                $row['celular_emergencia'],
                $row['parentesco_emergencia'],

                $row['sucursal'],
                $row['tipo_contrato'],
                $row['fecha_ingreso'],
                $row['fecha_retiro'],
                $row['motivo_retiro'],
                $row['salario'],
                $row['valor_dia'],
                $row['valor_hora'],
                $row['clase_riesgo'],
                $row['porcentaje_riesgo'],
                $row['area'],
                $row['seccion'],
                $row['cargo'],
                $row['pension'],
                $row['tipo_dotacion'],
                $row['estado'],
            );

            return $usuariodto;

        } catch (Exception $e) {
            print "Error, al traer los datos del usuario " . $e->getMessage();
        }

        return null;

    }


    // ------------------------ Lista de datos del usuario con su código -------------------

    public function listaUsuarioConId($id_usuario) {

        $cnx = Conexion::conectar();
        $usuariodto = null;

        try {
            
            $sql = "SELECT * FROM tbl_usuario AS tu INNER JOIN tbl_tipo_documento AS ttd ON tu.id_tipo_documento = ttd.id_tipo_documento INNER JOIN tbl_tipo_contrato AS ttc ON tu.id_tipo_contrato = ttc.id_tipo_contrato INNER JOIN tbl_perfil AS tp ON tu.id_perfil = tp.id_perfil INNER JOIN tbl_estado AS te ON tu.id_estado = te.id_estado INNER JOIN tbl_casa AS tc ON tu.id_casa = tc.id_casa INNER JOIN tbl_genero AS tg ON tu.id_genero = tg.id_genero INNER JOIN tbl_estado_civil AS tec ON tu.id_estado_civil = tec.id_estado_civil INNER JOIN tbl_tipo_sangre_rh AS ttsr ON tu.id_tipo_sangre_rh = ttsr.id_tipo_sangre_rh INNER JOIN tbl_nivel_academico AS tna ON tu.id_nivel_academico = tna.id_nivel_academico INNER JOIN tbl_eps AS teps ON tu.id_eps = teps.id_eps INNER JOIN tbl_sucursal AS tsu ON tu.id_sucursal = tsu.id_sucursal INNER JOIN tbl_seccion AS tsec ON tu.id_seccion = tsec.id_seccion INNER JOIN tbl_area AS tar ON tu.id_area = tar.id_area INNER JOIN tbl_cargo AS tcar ON tu.id_cargo = tcar.id_cargo INNER JOIN tbl_pension AS tpen ON tu.id_pension = tpen.id_pension INNER JOIN tbl_tipo_dotacion AS tpdo ON tu.id_tipo_dotacion = tpdo.id_tipo_dotacion WHERE id_usuario = '" . $id_usuario . "'";
            $rs = $cnx->query($sql);

            $row = $rs->fetch();
            $usuariodto = new UsuarioDTO();
            $usuariodto->constructor(
                $row['id_usuario'],
                $row['id_tipo_documento'],
                $row['fecha_expedicion'],
                $row['lugar_expedicion'],
                $row['nombre'],
                $row['apellido'],
                $row['telefono_fijo'],
                $row['telefono_movil'],
                $row['id_casa'],
                $row['id_genero'],
                $row['fecha_nacimiento'],
                $row['edad'],
                $row['direccion'],
                $row['lugar_residencia'],
                $row['id_nivel_academico'],
                $row['area_academica'],
                $row['id_estado_civil'],
                $row['id_eps'],
                $row['nro_cuenta'],
                $row['id_tipo_sangre_rh'],
                $row['antecedentes'],
                $row['practica_deporte'],
                $row['consumo_cigarros'],
                $row['consumo_licor'],
                $row['consumo_spa'],
                $row['correo'],
                $row['pass'],
                $row['id_perfil'],
                $row['nombre_persona_emergencia'],
                $row['telefono_emergencia'],
                $row['celular_emergencia'],
                $row['parentesco_emergencia'],

                $row['sucursal'],
                $row['id_tipo_contrato'],
                $row['fecha_ingreso'],
                $row['fecha_retiro'],
                $row['motivo_retiro'],
                $row['salario'],
                $row['valor_dia'],
                $row['valor_hora'],
                $row['clase_riesgo'],
                $row['porcentaje_riesgo'],
                $row['id_area'],
                $row['id_seccion'],
                $row['id_cargo'],
                $row['id_pension'],
                $row['id_tipo_dotacion'],
                $row['id_estado'],
            );

            return $usuariodto;

        } catch (Exception $e) {
            print "Error, al traer los datos del usuario " . $e->getMessage();
        }

        return null;

    }


    // --------------------------- Actualizar Usuario -------------------------------

    public function actualizarUsuario($usuariodto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_usuario SET id_tipo_documento = ?, nombre = ?, apellido = ?, cargo = ?, telefono = ?, id_tipo_contrato = ?, sueldo = ?, correo = ?, pass = ?, fecha_inicio = ?, fecha_fin = ?, id_perfil = ? , id_estado = ?, genero = ? WHERE id_usuario = '" . $usuariodto->getId_usuario() . "' ";
            $ps = $cnx->prepare($sql);

    
            $tipo_documento = $usuariodto->getTipo_documento();
            $nombre = $usuariodto->getNombre();
            $apellido = $usuariodto->getApellido();
            $cargo = $usuariodto->getCargo();
            $telefono = $usuariodto->getTelefono();
            $tipo_contrato = $usuariodto->getTipo_Contrato();
            $sueldo = $usuariodto->getSueldo();
            $correo = $usuariodto->getCorreo();
            $password = $usuariodto->getPassword();
            $fecha_inicio = $usuariodto->getFecha_inicio();
            $fecha_fin = $usuariodto->getFecha_fin();
            $perfil = $usuariodto->getPerfil();
            $estado = $usuariodto->getEstado();
            $genero = $usuariodto->getGenero();

            $ps->bindParam(1, $tipo_documento);
            $ps->bindParam(2, $nombre);
            $ps->bindParam(3, $apellido);
            $ps->bindParam(4, $cargo);
            $ps->bindParam(5, $telefono);
            $ps->bindParam(6, $tipo_contrato);
            $ps->bindParam(7, $sueldo);
            $ps->bindParam(8, $correo);
            $ps->bindParam(9, $password);
            $ps->bindParam(10, $fecha_inicio);
            $ps->bindParam(11, $fecha_fin);
            $ps->bindParam(12, $perfil);
            $ps->bindParam(13, $estado);
            $ps->bindParam(14, $genero);

            $ps->execute();

            return true;

        } catch (Exception $e) {
            print "Error al actualizar los datos del usuario " . $e->getMessage();
        }

        return false;

    }

    // --------------------------- Actualizar datos personales -------------------------------

    public function actualizarDatosPersonales($usuariodto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_usuario SET id_tipo_documento = ?, fecha_expedicion = ?, lugar_expedicion = ?,  nombre = ?, apellido = ?, telefono_fijo = ?, telefono_movil = ?, id_casa = ?, id_genero = ?, fecha_nacimiento = ?, edad = ?, direccion = ?, lugar_residencia = ?, id_nivel_academico = ?, area_academica = ?, id_estado_civil = ?, id_eps = ?, nro_cuenta = ?, id_tipo_sangre_rh = ?, antecedentes = ?, practica_deporte = ?,consumo_cigarros = ?, consumo_licor = ?, consumo_spa = ?, correo = ?, pass = ?, id_perfil = ?, nombre_persona_emergencia = ?, telefono_emergencia = ?, celular_emergencia = ?, parentesco_emergencia = ? WHERE id_usuario = '" . $usuariodto->getId_usuario() . "' ";
            $ps = $cnx->prepare($sql);

    
            $tipo_documento = $usuariodto->getTipo_documento();
            $fecha_expedicion = $usuariodto->getFecha_expedicion();
            $lugar_expedicion = $usuariodto->getLugar_expedicion();        
            $nombre = $usuariodto->getNombre();
            $apellido = $usuariodto->getApellido();
            $telefono_fijo = $usuariodto->getTelefono_fijo();
            $telefono_movil = $usuariodto->getTelefono_movil();
            $tipo_casa = $usuariodto->getTipo_casa();
            $genero = $usuariodto->getGenero();
            $fecha_nacimiento = $usuariodto->getFecha_nacimiento();
            $edad = $usuariodto->getEdad();
            $direccion = $usuariodto->getDireccion();
            $lugar_residencia = $usuariodto->getLugar_residencia();
            $nivel_academico = $usuariodto->getNivel_academico();
            $area_academica = $usuariodto->getArea_academica();
            $estado_civil = $usuariodto->getEstado_civil();
            $eps = $usuariodto->getEps();
            $nro_cuenta = $usuariodto->getNro_cuenta();
            $tipo_sangre = $usuariodto->getTipo_sangre();
            $antecedentes = $usuariodto->getAntecedentes();
            $practica_deporte = $usuariodto->getPractica_deporte();
            $consumo_cigarros = $usuariodto->getConsumo_cigarros();
            $consumo_licor = $usuariodto->getConsumo_licor();
            $consumo_spa = $usuariodto->getConsumo_spa();
            $correo = $usuariodto->getCorreo();
            $password = $usuariodto->getPassword();
            $perfil = $usuariodto->getPerfil();
            $nombre_persona_emergencia = $usuariodto->getNombre_persona_emergencia();
            $telefono_emergencia = $usuariodto->getTelefono_emergencia();
            $celular_emergencia = $usuariodto->getCelular_emergencia();
            $parentesco_emergencia = $usuariodto->getParentesco_emergencia();

            $ps->bindParam(1, $tipo_documento);
            $ps->bindParam(2, $fecha_expedicion);
            $ps->bindParam(3, $lugar_expedicion);
            $ps->bindParam(4, $nombre);
            $ps->bindParam(5, $apellido);
            $ps->bindParam(6, $telefono_fijo);
            $ps->bindParam(7, $telefono_movil);
            $ps->bindParam(8, $tipo_casa);
            $ps->bindParam(9, $genero);
            $ps->bindParam(10, $fecha_nacimiento);
            $ps->bindParam(11, $edad);
            $ps->bindParam(12, $direccion);
            $ps->bindParam(13, $lugar_residencia);
            $ps->bindParam(14, $nivel_academico);
            $ps->bindParam(15, $area_academica);
            $ps->bindParam(16, $estado_civil);
            $ps->bindParam(17, $eps);
            $ps->bindParam(18, $nro_cuenta);
            $ps->bindParam(19, $tipo_sangre);
            $ps->bindParam(20, $antecedentes);
            $ps->bindParam(21, $practica_deporte);
            $ps->bindParam(22, $consumo_cigarros);
            $ps->bindParam(23, $consumo_licor);
            $ps->bindParam(24, $consumo_spa);
            $ps->bindParam(25, $correo);
            $ps->bindParam(26, $password);
            $ps->bindParam(27, $perfil);
            $ps->bindParam(28, $nombre_persona_emergencia);
            $ps->bindParam(29, $telefono_emergencia);
            $ps->bindParam(30, $celular_emergencia);
            $ps->bindParam(31, $parentesco_emergencia);

            $ps->execute();

            return true;

        } catch (Exception $e) {
            print "Error al actualizar los datos personales del usuario " . $e->getMessage();
        }

        return false;

    }

    // ---------------------------------- Actualizar datos laborales -----------------------

    public function actualizarDatosLaborales($usuariodto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_usuario SET id_sucursal = ?, id_tipo_contrato = ?, fecha_ingreso = ?, fecha_retiro = ?, motivo_retiro = ?, salario = ?, valor_dia = ?, valor_hora = ?, clase_riesgo = ?, porcentaje_riesgo = ?, id_area = ?, id_seccion = ?, id_cargo = ?, id_pension = ?, id_tipo_dotacion = ?, id_estado = ? WHERE id_usuario = '" . $usuariodto->getId_usuario() . "' ";
            $ps = $cnx->prepare($sql);

    
            $sucursal = $usuariodto->getSucursal();
            $tipo_contrato = $usuariodto->getTipo_contrato();
            $fecha_ingreso = $usuariodto->getFecha_ingreso();
            $fecha_retiro = $usuariodto->getFecha_retiro();
            $motivo_retiro =  $usuariodto->getMotivo_retiro();
            $salario = $usuariodto->getSalario();
            $valor_dia = $usuariodto->getValor_dia();
            $valor_hora = $usuariodto->getValor_hora();
            $clase_riesgo = $usuariodto->getClase_riesgo();
            $porcentaje_riesgo = $usuariodto->getPorcentaje_riesgo();
            $area = $usuariodto->getArea();
            $seccion = $usuariodto->getSeccion();
            $cargo = $usuariodto->getCargo();
            $pension = $usuariodto->getPension();
            $tipo_dotacion = $usuariodto->getTipo_dotacion();
            $estado = $usuariodto->getEstado();

            $ps->bindParam(1, $sucursal);
            $ps->bindParam(2, $tipo_contrato);
            $ps->bindParam(3, $fecha_ingreso);
            $ps->bindParam(4, $fecha_retiro);
            $ps->bindParam(5, $motivo_retiro);
            $ps->bindParam(6, $salario);
            $ps->bindParam(7, $valor_dia);
            $ps->bindParam(8, $valor_hora);
            $ps->bindParam(9, $clase_riesgo);
            $ps->bindParam(10, $porcentaje_riesgo);
            $ps->bindParam(11, $area);
            $ps->bindParam(12, $seccion);
            $ps->bindParam(13, $cargo);
            $ps->bindParam(14, $pension);
            $ps->bindParam(15, $tipo_dotacion);
            $ps->bindParam(16, $estado);

            $ps->execute();

            return true;

        } catch (Exception $e) {
            print "Error al actualizar los datos laborales del usuario " . $e->getMessage();
        }

        return false;

    }


    // -------------------------- Loguearse --------------------------

    public function loginUsuario($usuario) {

        $cnx = Conexion::conectar();

        $usuariodto = null;
        
        try {
            $sql = "SELECT * FROM tbl_usuario AS tu INNER JOIN tbl_tipo_documento AS ttd ON tu.id_tipo_documento = ttd.id_tipo_documento INNER JOIN tbl_tipo_contrato AS ttc ON tu.id_tipo_contrato = ttc.id_tipo_contrato INNER JOIN tbl_perfil AS tp ON tu.id_perfil = tp.id_perfil INNER JOIN tbl_estado AS te ON tu.id_estado = te.id_estado INNER JOIN tbl_casa AS tc ON tu.id_casa = tc.id_casa INNER JOIN tbl_genero AS tg ON tu.id_genero = tg.id_genero INNER JOIN tbl_estado_civil AS tec ON tu.id_estado_civil = tec.id_estado_civil INNER JOIN tbl_tipo_sangre_rh AS ttsr ON tu.id_tipo_sangre_rh = ttsr.id_tipo_sangre_rh INNER JOIN tbl_nivel_academico AS tna ON tu.id_nivel_academico = tna.id_nivel_academico INNER JOIN tbl_eps AS teps ON tu.id_eps = teps.id_eps INNER JOIN tbl_sucursal AS tsu ON tu.id_sucursal = tsu.id_sucursal INNER JOIN tbl_seccion AS tsec ON tu.id_seccion = tsec.id_seccion INNER JOIN tbl_area AS tar ON tu.id_area = tar.id_area INNER JOIN tbl_cargo AS tcar ON tu.id_cargo = tcar.id_cargo INNER JOIN tbl_pension AS tpen ON tu.id_pension = tpen.id_pension INNER JOIN tbl_tipo_dotacion AS tpdo ON tu.id_tipo_dotacion = tpdo.id_tipo_dotacion WHERE correo = '" . $usuario->getCorreo() . "'";
            $rs = $cnx->query($sql);

            $countRows = $rs->rowCount();
            if ($countRows == -1){

                $row = $rs->fetch();

                if ($usuario->getPassword() == $row['pass']) {

                    $usuariodto = new UsuarioDTO();
                    $usuariodto->constructor(
                        $row['id_usuario'],
                        $row['tipo_documento'],
                        $row['fecha_expedicion'],
                        $row['lugar_expedicion'],
                        $row['nombre'],
                        $row['apellido'],
                        $row['telefono_fijo'],
                        $row['telefono_movil'],
                        $row['tipo_casa'],
                        $row['genero'],
                        $row['fecha_nacimiento'],
                        $row['edad'],
                        $row['direccion'],
                        $row['lugar_residencia'],
                        $row['nivel_academico'],
                        $row['area_academica'],
                        $row['estado_civil'],
                        $row['eps'],
                        $row['nro_cuenta'],
                        $row['tipo_sangre_rh'],
                        $row['antecedentes'],
                        $row['practica_deporte'],
                        $row['consumo_cigarros'],
                        $row['consumo_licor'],
                        $row['consumo_spa'],
                        $row['correo'],
                        $row['pass'],
                        $row['id_perfil'],
                        $row['nombre_persona_emergencia'],
                        $row['telefono_emergencia'],
                        $row['celular_emergencia'],
                        $row['parentesco_emergencia'],

                        $row['sucursal'],
                        $row['tipo_contrato'],
                        $row['fecha_ingreso'],
                        $row['fecha_retiro'],
                        $row['motivo_retiro'],
                        $row['salario'],
                        $row['valor_dia'],
                        $row['valor_hora'],
                        $row['clase_riesgo'],
                        $row['porcentaje_riesgo'],
                        $row['area'],
                        $row['seccion'],
                        $row['cargo'],
                        $row['pension'],
                        $row['tipo_dotacion'],
                        $row['estado']
                    );

                    return $usuariodto;
                    
                }else{
                    return null;
                }

            }else{
                print "Correo o contraseña incorrectos";
                return null;
            }

        } catch (Exception $e) {
            print "Error al iniciar sesión " + $e->getMessage();
        }

        return null;

    }

    // ----------------------------- Verificar Correo ------------------------

    public function recuperarClave($correo) {

        $cnx = Conexion::conectar();

        $usuariodto = null;

        try {
            $sql = "SELECT * FROM tbl_usuario WHERE correo = '" . $correo . "'";
            $rs = $cnx->query($sql);

            $countRows = $rs->rowCount();

            if ($countRows == -1) {

                $row = $rs->fetch();

                $usuariodto = new UsuarioDTO();
                $usuariodto->constructor(
                    $row['id_usuario'],
                    $row['id_tipo_documento'],
                    $row['fecha_expedicion'],
                    $row['lugar_expedicion'],
                    $row['nombre'],
                    $row['apellido'],
                    $row['telefono_fijo'],
                    $row['telefono_movil'],
                    $row['id_casa'],
                    $row['id_genero'],
                    $row['fecha_nacimiento'],
                    $row['edad'],
                    $row['direccion'],
                    $row['lugar_residencia'],
                    $row['id_nivel_academico'],
                    $row['area_academica'],
                    $row['id_estado_civil'],
                    $row['id_eps'],
                    $row['nro_cuenta'],
                    $row['id_tipo_sangre_rh'],
                    $row['antecedentes'],
                    $row['practica_deporte'],
                    $row['consumo_cigarros'],
                    $row['consumo_licor'],
                    $row['consumo_spa'],
                    $row['correo'],
                    $row['pass'],
                    $row['id_perfil'],
                    $row['nombre_persona_emergencia'],
                    $row['telefono_emergencia'],
                    $row['celular_emergencia'],
                    $row['parentesco_emergencia'],

                    $row['id_sucursal'],
                    $row['id_tipo_contrato'],
                    $row['fecha_ingreso'],
                    $row['fecha_retiro'],
                    $row['motivo_retiro'],
                    $row['salario'],
                    $row['valor_dia'],
                    $row['valor_hora'],
                    $row['clase_riesgo'],
                    $row['porcentaje_riesgo'],
                    $row['id_area'],
                    $row['id_seccion'],
                    $row['id_cargo'],
                    $row['id_pension'],
                    $row['id_tipo_dotacion'],
                    $row['id_estado'],
                );
                return $usuariodto;

            }else{
                return null;
            }

        } catch (Exception $e) {
            print "Error al traer el los datos" . $e->getMessage();
        }

        return null;

    }

    // ----------------------------- Nueva contraseña -----------------

    public function nuevaClave($usuariodto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_usuario SET pass = ? WHERE id_usuario = '" . $usuariodto->getId_usuario() . "'";
            $ps = $cnx->prepare($sql);

            $password = $usuariodto->getPassword();

            $ps->bindParam(1, $password);

            $ps->execute();

            return true;
 

        } catch (Exception $e) {
            print "Error al modificar la contraseña " . $e->getMessage();
        }

        return false;

    }


    // --------------------------- Reportes --------------------------------
    // ---------------------------------------------------------------------
    

    // ----------------------------- Listas --------------------------------

    
    public function ListaCargoUsuario($id_cargo) {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            
            $sql = "SELECT * FROM tbl_usuario AS tu INNER JOIN tbl_tipo_documento AS ttd ON tu.id_tipo_documento = ttd.id_tipo_documento INNER JOIN tbl_tipo_contrato AS ttc ON tu.id_tipo_contrato = ttc.id_tipo_contrato INNER JOIN tbl_perfil AS tp ON tu.id_perfil = tp.id_perfil INNER JOIN tbl_estado AS te ON tu.id_estado = te.id_estado INNER JOIN tbl_casa AS tc ON tu.id_casa = tc.id_casa INNER JOIN tbl_genero AS tg ON tu.id_genero = tg.id_genero INNER JOIN tbl_estado_civil AS tec ON tu.id_estado_civil = tec.id_estado_civil INNER JOIN tbl_tipo_sangre_rh AS ttsr ON tu.id_tipo_sangre_rh = ttsr.id_tipo_sangre_rh INNER JOIN tbl_nivel_academico AS tna ON tu.id_nivel_academico = tna.id_nivel_academico INNER JOIN tbl_eps AS teps ON tu.id_eps = teps.id_eps INNER JOIN tbl_sucursal AS tsu ON tu.id_sucursal = tsu.id_sucursal INNER JOIN tbl_seccion AS tsec ON tu.id_seccion = tsec.id_seccion INNER JOIN tbl_area AS tar ON tu.id_area = tar.id_area INNER JOIN tbl_cargo AS tcar ON tu.id_cargo = tcar.id_cargo INNER JOIN tbl_pension AS tpen ON tu.id_pension = tpen.id_pension INNER JOIN tbl_tipo_dotacion AS tpdo ON tu.id_tipo_dotacion = tpdo.id_tipo_dotacion WHERE tu.id_cargo =  " . $id_cargo;
            $rs = $cnx->query($sql);

            while($row = $rs->fetch()) {
                
                $lista[$i] = new UsuarioDTO();
                $lista[$i]->constructor(
                    $row['id_usuario'],
                        $row['id_tipo_documento'],
                        $row['fecha_expedicion'],
                        $row['lugar_expedicion'],
                        $row['nombre'],
                        $row['apellido'],
                        $row['telefono_fijo'],
                        $row['telefono_movil'],
                        $row['id_casa'],
                        $row['id_genero'],
                        $row['fecha_nacimiento'],
                        $row['edad'],
                        $row['direccion'],
                        $row['lugar_residencia'],
                        $row['id_nivel_academico'],
                        $row['area_academica'],
                        $row['id_estado_civil'],
                        $row['id_eps'],
                        $row['nro_cuenta'],
                        $row['id_tipo_sangre_rh'],
                        $row['antecedentes'],
                        $row['practica_deporte'],
                        $row['consumo_cigarros'],
                        $row['consumo_licor'],
                        $row['consumo_spa'],
                        $row['correo'],
                        $row['pass'],
                        $row['id_perfil'],
                        $row['nombre_persona_emergencia'],
                        $row['telefono_emergencia'],
                        $row['celular_emergencia'],
                        $row['parentesco_emergencia'],

                        $row['id_sucursal'],
                        $row['id_tipo_contrato'],
                        $row['fecha_ingreso'],
                        $row['fecha_retiro'],
                        $row['motivo_retiro'],
                        $row['salario'],
                        $row['valor_dia'],
                        $row['valor_hora'],
                        $row['clase_riesgo'],
                        $row['porcentaje_riesgo'],
                        $row['area'],
                        $row['seccion'],
                        $row['cargo'],
                        $row['pension'],
                        $row['tipo_dotacion'],
                        $row['estado'],
                );

                $i++;

            }

            return $lista;

            
            
        } catch (Exception $ex) {
            print "Error al traer la lista de los empleados por cargo" . $ex;
        }


        return null;
    }

    public function ListaAreaUsuario($id_area) {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            
            $sql = "SELECT * FROM tbl_usuario AS tu INNER JOIN tbl_tipo_documento AS ttd ON tu.id_tipo_documento = ttd.id_tipo_documento INNER JOIN tbl_tipo_contrato AS ttc ON tu.id_tipo_contrato = ttc.id_tipo_contrato INNER JOIN tbl_perfil AS tp ON tu.id_perfil = tp.id_perfil INNER JOIN tbl_estado AS te ON tu.id_estado = te.id_estado INNER JOIN tbl_casa AS tc ON tu.id_casa = tc.id_casa INNER JOIN tbl_genero AS tg ON tu.id_genero = tg.id_genero INNER JOIN tbl_estado_civil AS tec ON tu.id_estado_civil = tec.id_estado_civil INNER JOIN tbl_tipo_sangre_rh AS ttsr ON tu.id_tipo_sangre_rh = ttsr.id_tipo_sangre_rh INNER JOIN tbl_nivel_academico AS tna ON tu.id_nivel_academico = tna.id_nivel_academico INNER JOIN tbl_eps AS teps ON tu.id_eps = teps.id_eps INNER JOIN tbl_sucursal AS tsu ON tu.id_sucursal = tsu.id_sucursal INNER JOIN tbl_seccion AS tsec ON tu.id_seccion = tsec.id_seccion INNER JOIN tbl_area AS tar ON tu.id_area = tar.id_area INNER JOIN tbl_cargo AS tcar ON tu.id_cargo = tcar.id_cargo INNER JOIN tbl_pension AS tpen ON tu.id_pension = tpen.id_pension INNER JOIN tbl_tipo_dotacion AS tpdo ON tu.id_tipo_dotacion = tpdo.id_tipo_dotacion WHERE tu.id_area =  " . $id_area;
            $rs = $cnx->query($sql);

            while($row = $rs->fetch()) {
                
                $lista[$i] = new UsuarioDTO();
                $lista[$i]->constructor(
                    $row['id_usuario'],
                        $row['id_tipo_documento'],
                        $row['fecha_expedicion'],
                        $row['lugar_expedicion'],
                        $row['nombre'],
                        $row['apellido'],
                        $row['telefono_fijo'],
                        $row['telefono_movil'],
                        $row['id_casa'],
                        $row['id_genero'],
                        $row['fecha_nacimiento'],
                        $row['edad'],
                        $row['direccion'],
                        $row['lugar_residencia'],
                        $row['id_nivel_academico'],
                        $row['area_academica'],
                        $row['id_estado_civil'],
                        $row['id_eps'],
                        $row['nro_cuenta'],
                        $row['id_tipo_sangre_rh'],
                        $row['antecedentes'],
                        $row['practica_deporte'],
                        $row['consumo_cigarros'],
                        $row['consumo_licor'],
                        $row['consumo_spa'],
                        $row['correo'],
                        $row['pass'],
                        $row['id_perfil'],
                        $row['nombre_persona_emergencia'],
                        $row['telefono_emergencia'],
                        $row['celular_emergencia'],
                        $row['parentesco_emergencia'],

                        $row['id_sucursal'],
                        $row['id_tipo_contrato'],
                        $row['fecha_ingreso'],
                        $row['fecha_retiro'],
                        $row['motivo_retiro'],
                        $row['salario'],
                        $row['valor_dia'],
                        $row['valor_hora'],
                        $row['clase_riesgo'],
                        $row['porcentaje_riesgo'],
                        $row['area'],
                        $row['seccion'],
                        $row['cargo'],
                        $row['pension'],
                        $row['tipo_dotacion'],
                        $row['estado'],
                );

                $i++;

            }

            return $lista;

            
            
        } catch (Exception $ex) {
            print "Error al traer la lista de los empleados por area" . $ex;
        }


        return null;
    }


    public function ListaSeccionUsuario($id_seccion) {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            
            $sql = "SELECT * FROM tbl_usuario AS tu INNER JOIN tbl_tipo_documento AS ttd ON tu.id_tipo_documento = ttd.id_tipo_documento INNER JOIN tbl_tipo_contrato AS ttc ON tu.id_tipo_contrato = ttc.id_tipo_contrato INNER JOIN tbl_perfil AS tp ON tu.id_perfil = tp.id_perfil INNER JOIN tbl_estado AS te ON tu.id_estado = te.id_estado INNER JOIN tbl_casa AS tc ON tu.id_casa = tc.id_casa INNER JOIN tbl_genero AS tg ON tu.id_genero = tg.id_genero INNER JOIN tbl_estado_civil AS tec ON tu.id_estado_civil = tec.id_estado_civil INNER JOIN tbl_tipo_sangre_rh AS ttsr ON tu.id_tipo_sangre_rh = ttsr.id_tipo_sangre_rh INNER JOIN tbl_nivel_academico AS tna ON tu.id_nivel_academico = tna.id_nivel_academico INNER JOIN tbl_eps AS teps ON tu.id_eps = teps.id_eps INNER JOIN tbl_sucursal AS tsu ON tu.id_sucursal = tsu.id_sucursal INNER JOIN tbl_seccion AS tsec ON tu.id_seccion = tsec.id_seccion INNER JOIN tbl_area AS tar ON tu.id_area = tar.id_area INNER JOIN tbl_cargo AS tcar ON tu.id_cargo = tcar.id_cargo INNER JOIN tbl_pension AS tpen ON tu.id_pension = tpen.id_pension INNER JOIN tbl_tipo_dotacion AS tpdo ON tu.id_tipo_dotacion = tpdo.id_tipo_dotacion WHERE tu.id_seccion =  " . $id_seccion;
            $rs = $cnx->query($sql);

            while($row = $rs->fetch()) {
                
                $lista[$i] = new UsuarioDTO();
                $lista[$i]->constructor(
                    $row['id_usuario'],
                        $row['id_tipo_documento'],
                        $row['fecha_expedicion'],
                        $row['lugar_expedicion'],
                        $row['nombre'],
                        $row['apellido'],
                        $row['telefono_fijo'],
                        $row['telefono_movil'],
                        $row['id_casa'],
                        $row['id_genero'],
                        $row['fecha_nacimiento'],
                        $row['edad'],
                        $row['direccion'],
                        $row['lugar_residencia'],
                        $row['id_nivel_academico'],
                        $row['area_academica'],
                        $row['id_estado_civil'],
                        $row['id_eps'],
                        $row['nro_cuenta'],
                        $row['id_tipo_sangre_rh'],
                        $row['antecedentes'],
                        $row['practica_deporte'],
                        $row['consumo_cigarros'],
                        $row['consumo_licor'],
                        $row['consumo_spa'],
                        $row['correo'],
                        $row['pass'],
                        $row['id_perfil'],
                        $row['nombre_persona_emergencia'],
                        $row['telefono_emergencia'],
                        $row['celular_emergencia'],
                        $row['parentesco_emergencia'],

                        $row['id_sucursal'],
                        $row['id_tipo_contrato'],
                        $row['fecha_ingreso'],
                        $row['fecha_retiro'],
                        $row['motivo_retiro'],
                        $row['salario'],
                        $row['valor_dia'],
                        $row['valor_hora'],
                        $row['clase_riesgo'],
                        $row['porcentaje_riesgo'],
                        $row['area'],
                        $row['seccion'],
                        $row['cargo'],
                        $row['pension'],
                        $row['tipo_dotacion'],
                        $row['estado'],
                );

                $i++;

            }

            return $lista;

            
            
        } catch (Exception $ex) {
            print "Error al traer la lista de los empleados por sección" . $ex;
        }


        return null;
    }

    public function ListaFechaUsuario($fecha_inicio, $fecha_fin) {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            
            $sql = "SELECT * FROM tbl_usuario WHERE fecha_ingreso BETWEEN '" . $fecha_inicio . "' AND '" . $fecha_fin . "'";
            $rs = $cnx->query($sql);

            while($row = $rs->fetch()) {
                
                $lista[$i] = new UsuarioDTO();
                $lista[$i]->constructor(
                    $row['id_usuario'],
                        $row['id_tipo_documento'],
                        $row['fecha_expedicion'],
                        $row['lugar_expedicion'],
                        $row['nombre'],
                        $row['apellido'],
                        $row['telefono_fijo'],
                        $row['telefono_movil'],
                        $row['id_casa'],
                        $row['id_genero'],
                        $row['fecha_nacimiento'],
                        $row['edad'],
                        $row['direccion'],
                        $row['lugar_residencia'],
                        $row['id_nivel_academico'],
                        $row['area_academica'],
                        $row['id_estado_civil'],
                        $row['id_eps'],
                        $row['nro_cuenta'],
                        $row['id_tipo_sangre_rh'],
                        $row['antecedentes'],
                        $row['practica_deporte'],
                        $row['consumo_cigarros'],
                        $row['consumo_licor'],
                        $row['consumo_spa'],
                        $row['correo'],
                        $row['pass'],
                        $row['id_perfil'],
                        $row['nombre_persona_emergencia'],
                        $row['telefono_emergencia'],
                        $row['celular_emergencia'],
                        $row['parentesco_emergencia'],

                        $row['id_sucursal'],
                        $row['id_tipo_contrato'],
                        $row['fecha_ingreso'],
                        $row['fecha_retiro'],
                        $row['motivo_retiro'],
                        $row['salario'],
                        $row['valor_dia'],
                        $row['valor_hora'],
                        $row['clase_riesgo'],
                        $row['porcentaje_riesgo'],
                        $row['id_area'],
                        $row['id_seccion'],
                        $row['id_cargo'],
                        $row['id_pension'],
                        $row['id_tipo_dotacion'],
                        $row['id_estado'],
                );

                $i++;

            }

            return $lista;

            
            
        } catch (Exception $ex) {
            print "Error al traer la lista de los empleados por fecha" . $ex;
        }


        return null;
    }

    public function ListaSalarioUsuario($inicio_salario, $fin_salario) {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            
            $sql = "SELECT * FROM tbl_usuario WHERE salario BETWEEN " . $inicio_salario . " AND " . $fin_salario;
            $rs = $cnx->query($sql);

            while($row = $rs->fetch()) {
                
                $lista[$i] = new UsuarioDTO();
                $lista[$i]->constructor(
                    $row['id_usuario'],
                    $row['id_tipo_documento'],
                    $row['fecha_expedicion'],
                    $row['lugar_expedicion'],
                    $row['nombre'],
                    $row['apellido'],
                    $row['telefono_fijo'],
                    $row['telefono_movil'],
                    $row['id_casa'],
                    $row['id_genero'],
                    $row['fecha_nacimiento'],
                    $row['edad'],
                    $row['direccion'],
                    $row['lugar_residencia'],
                    $row['id_nivel_academico'],
                    $row['area_academica'],
                    $row['id_estado_civil'],
                    $row['id_eps'],
                    $row['nro_cuenta'],
                    $row['id_tipo_sangre_rh'],
                    $row['antecedentes'],
                    $row['practica_deporte'],
                    $row['consumo_cigarros'],
                    $row['consumo_licor'],
                    $row['consumo_spa'],
                    $row['correo'],
                    $row['pass'],
                    $row['id_perfil'],
                    $row['nombre_persona_emergencia'],
                    $row['telefono_emergencia'],
                    $row['celular_emergencia'],
                    $row['parentesco_emergencia'],

                    $row['id_sucursal'],
                    $row['id_tipo_contrato'],
                    $row['fecha_ingreso'],
                    $row['fecha_retiro'],
                    $row['motivo_retiro'],
                    $row['salario'],
                    $row['valor_dia'],
                    $row['valor_hora'],
                    $row['clase_riesgo'],
                    $row['porcentaje_riesgo'],
                    $row['id_area'],
                    $row['id_seccion'],
                    $row['id_cargo'],
                    $row['id_pension'],
                    $row['id_tipo_dotacion'],
                    $row['id_estado'],
                );

                $i++;

            }

            return $lista;

            
            
        } catch (Exception $ex) {
            print "Error al traer la lista de los empleados por fecha" . $ex;
        }


        return null;
    }

    public function ListaEstadoUsuario($estado) {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            
            $sql = "SELECT * FROM tbl_usuario AS tu INNER JOIN tbl_tipo_documento AS ttd ON tu.id_tipo_documento = ttd.id_tipo_documento INNER JOIN tbl_tipo_contrato AS ttc ON tu.id_tipo_contrato = ttc.id_tipo_contrato INNER JOIN tbl_perfil AS tp ON tu.id_perfil = tp.id_perfil INNER JOIN tbl_estado AS te ON tu.id_estado = te.id_estado INNER JOIN tbl_casa AS tc ON tu.id_casa = tc.id_casa INNER JOIN tbl_genero AS tg ON tu.id_genero = tg.id_genero INNER JOIN tbl_estado_civil AS tec ON tu.id_estado_civil = tec.id_estado_civil INNER JOIN tbl_tipo_sangre_rh AS ttsr ON tu.id_tipo_sangre_rh = ttsr.id_tipo_sangre_rh INNER JOIN tbl_nivel_academico AS tna ON tu.id_nivel_academico = tna.id_nivel_academico INNER JOIN tbl_eps AS teps ON tu.id_eps = teps.id_eps INNER JOIN tbl_sucursal AS tsu ON tu.id_sucursal = tsu.id_sucursal INNER JOIN tbl_seccion AS tsec ON tu.id_seccion = tsec.id_seccion INNER JOIN tbl_area AS tar ON tu.id_area = tar.id_area INNER JOIN tbl_cargo AS tcar ON tu.id_cargo = tcar.id_cargo INNER JOIN tbl_pension AS tpen ON tu.id_pension = tpen.id_pension INNER JOIN tbl_tipo_dotacion AS tpdo ON tu.id_tipo_dotacion = tpdo.id_tipo_dotacion WHERE tu.id_estado = " . $estado;
            $rs = $cnx->query($sql);

            while($row = $rs->fetch()) {
                
                $lista[$i] = new UsuarioDTO();
                $lista[$i]->constructor(
                    $row['id_usuario'],
                        $row['tipo_documento'],
                        $row['fecha_expedicion'],
                        $row['lugar_expedicion'],
                        $row['nombre'],
                        $row['apellido'],
                        $row['telefono_fijo'],
                        $row['telefono_movil'],
                        $row['id_casa'],
                        $row['id_genero'],
                        $row['fecha_nacimiento'],
                        $row['edad'],
                        $row['direccion'],
                        $row['lugar_residencia'],
                        $row['nivel_academico'],
                        $row['area_academica'],
                        $row['id_estado_civil'],
                        $row['eps'],
                        $row['nro_cuenta'],
                        $row['id_tipo_sangre_rh'],
                        $row['antecedentes'],
                        $row['practica_deporte'],
                        $row['consumo_cigarros'],
                        $row['consumo_licor'],
                        $row['consumo_spa'],
                        $row['correo'],
                        $row['pass'],
                        $row['id_perfil'],
                        $row['nombre_persona_emergencia'],
                        $row['telefono_emergencia'],
                        $row['celular_emergencia'],
                        $row['parentesco_emergencia'],

                        $row['sucursal'],
                        $row['id_tipo_contrato'],
                        $row['fecha_ingreso'],
                        $row['fecha_retiro'],
                        $row['motivo_retiro'],
                        $row['salario'],
                        $row['valor_dia'],
                        $row['valor_hora'],
                        $row['clase_riesgo'],
                        $row['porcentaje_riesgo'],
                        $row['area'],
                        $row['seccion'],
                        $row['cargo'],
                        $row['pension'],
                        $row['tipo_dotacion'],
                        $row['estado'],
                );

                $i++;

            }

            return $lista;

            
            
        } catch (Exception $ex) {
            print "Error al traer la lista de los empleados por fecha" . $ex;
        }


        return null;
    }


    public function ListaTipoContratoUsuario($tipo_contrato) {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            
            $sql = "SELECT * FROM tbl_usuario AS tu INNER JOIN tbl_tipo_documento AS ttd ON tu.id_tipo_documento = ttd.id_tipo_documento INNER JOIN tbl_tipo_contrato AS ttc ON tu.id_tipo_contrato = ttc.id_tipo_contrato INNER JOIN tbl_perfil AS tp ON tu.id_perfil = tp.id_perfil INNER JOIN tbl_estado AS te ON tu.id_estado = te.id_estado INNER JOIN tbl_casa AS tc ON tu.id_casa = tc.id_casa INNER JOIN tbl_genero AS tg ON tu.id_genero = tg.id_genero INNER JOIN tbl_estado_civil AS tec ON tu.id_estado_civil = tec.id_estado_civil INNER JOIN tbl_tipo_sangre_rh AS ttsr ON tu.id_tipo_sangre_rh = ttsr.id_tipo_sangre_rh INNER JOIN tbl_nivel_academico AS tna ON tu.id_nivel_academico = tna.id_nivel_academico INNER JOIN tbl_eps AS teps ON tu.id_eps = teps.id_eps INNER JOIN tbl_sucursal AS tsu ON tu.id_sucursal = tsu.id_sucursal INNER JOIN tbl_seccion AS tsec ON tu.id_seccion = tsec.id_seccion INNER JOIN tbl_area AS tar ON tu.id_area = tar.id_area INNER JOIN tbl_cargo AS tcar ON tu.id_cargo = tcar.id_cargo INNER JOIN tbl_pension AS tpen ON tu.id_pension = tpen.id_pension INNER JOIN tbl_tipo_dotacion AS tpdo ON tu.id_tipo_dotacion = tpdo.id_tipo_dotacion WHERE tu.id_tipo_contrato = " . $tipo_contrato;
            $rs = $cnx->query($sql);

            while($row = $rs->fetch()) {
                
                $lista[$i] = new UsuarioDTO();
                $lista[$i]->constructor(
                    $row['id_usuario'],
                        $row['tipo_documento'],
                        $row['fecha_expedicion'],
                        $row['lugar_expedicion'],
                        $row['nombre'],
                        $row['apellido'],
                        $row['telefono_fijo'],
                        $row['telefono_movil'],
                        $row['tipo_casa'],
                        $row['genero'],
                        $row['fecha_nacimiento'],
                        $row['edad'],
                        $row['direccion'],
                        $row['lugar_residencia'],
                        $row['nivel_academico'],
                        $row['area_academica'],
                        $row['estado_civil'],
                        $row['eps'],
                        $row['nro_cuenta'],
                        $row['tipo_sangre_rh'],
                        $row['antecedentes'],
                        $row['practica_deporte'],
                        $row['consumo_cigarros'],
                        $row['consumo_licor'],
                        $row['consumo_spa'],
                        $row['correo'],
                        $row['pass'],
                        $row['perfil'],
                        $row['nombre_persona_emergencia'],
                        $row['telefono_emergencia'],
                        $row['celular_emergencia'],
                        $row['parentesco_emergencia'],

                        $row['sucursal'],
                        $row['tipo_contrato'],
                        $row['fecha_ingreso'],
                        $row['fecha_retiro'],
                        $row['motivo_retiro'],
                        $row['salario'],
                        $row['valor_dia'],
                        $row['valor_hora'],
                        $row['clase_riesgo'],
                        $row['porcentaje_riesgo'],
                        $row['area'],
                        $row['seccion'],
                        $row['cargo'],
                        $row['pension'],
                        $row['tipo_dotacion'],
                        $row['estado'],
                );

                $i++;

            }

            return $lista;

            
            
        } catch (Exception $ex) {
            print "Error al traer la lista de los empleados por tipo de contrato" . $ex;
        }


        return null;
    }

    public function ListaEmpleadosNuevos() {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            
            $sql = 'SELECT * FROM tbl_usuario AS tu INNER JOIN tbl_tipo_documento AS ttd ON tu.id_tipo_documento = ttd.id_tipo_documento INNER JOIN tbl_tipo_contrato AS ttc ON tu.id_tipo_contrato = ttc.id_tipo_contrato INNER JOIN tbl_perfil AS tp ON tu.id_perfil = tp.id_perfil INNER JOIN tbl_estado AS te ON tu.id_estado = te.id_estado INNER JOIN tbl_casa AS tc ON tu.id_casa = tc.id_casa INNER JOIN tbl_genero AS tg ON tu.id_genero = tg.id_genero INNER JOIN tbl_estado_civil AS tec ON tu.id_estado_civil = tec.id_estado_civil INNER JOIN tbl_tipo_sangre_rh AS ttsr ON tu.id_tipo_sangre_rh = ttsr.id_tipo_sangre_rh INNER JOIN tbl_nivel_academico AS tna ON tu.id_nivel_academico = tna.id_nivel_academico INNER JOIN tbl_eps AS teps ON tu.id_eps = teps.id_eps INNER JOIN tbl_sucursal AS tsu ON tu.id_sucursal = tsu.id_sucursal INNER JOIN tbl_seccion AS tsec ON tu.id_seccion = tsec.id_seccion INNER JOIN tbl_area AS tar ON tu.id_area = tar.id_area INNER JOIN tbl_cargo AS tcar ON tu.id_cargo = tcar.id_cargo INNER JOIN tbl_pension AS tpen ON tu.id_pension = tpen.id_pension INNER JOIN tbl_tipo_dotacion AS tpdo ON tu.id_tipo_dotacion = tpdo.id_tipo_dotacion WHERE tu.fecha_ingreso BETWEEN DateADD("d", -30, GETDATE()) AND tu.fecha_ingreso';
            $rs = $cnx->query($sql);

            while($row = $rs->fetch()) {
                
                $lista[$i] = new UsuarioDTO();
                $lista[$i]->constructor(
                    $row['id_usuario'],
                        $row['tipo_documento'],
                        $row['fecha_expedicion'],
                        $row['lugar_expedicion'],
                        $row['nombre'],
                        $row['apellido'],
                        $row['telefono_fijo'],
                        $row['telefono_movil'],
                        $row['tipo_casa'],
                        $row['genero'],
                        $row['fecha_nacimiento'],
                        $row['edad'],
                        $row['direccion'],
                        $row['lugar_residencia'],
                        $row['nivel_academico'],
                        $row['area_academica'],
                        $row['estado_civil'],
                        $row['eps'],
                        $row['nro_cuenta'],
                        $row['tipo_sangre_rh'],
                        $row['antecedentes'],
                        $row['practica_deporte'],
                        $row['consumo_cigarros'],
                        $row['consumo_licor'],
                        $row['consumo_spa'],
                        $row['correo'],
                        $row['pass'],
                        $row['perfil'],
                        $row['nombre_persona_emergencia'],
                        $row['telefono_emergencia'],
                        $row['celular_emergencia'],
                        $row['parentesco_emergencia'],

                        $row['sucursal'],
                        $row['tipo_contrato'],
                        $row['fecha_ingreso'],
                        $row['fecha_retiro'],
                        $row['motivo_retiro'],
                        $row['salario'],
                        $row['valor_dia'],
                        $row['valor_hora'],
                        $row['clase_riesgo'],
                        $row['porcentaje_riesgo'],
                        $row['area'],
                        $row['seccion'],
                        $row['cargo'],
                        $row['pension'],
                        $row['tipo_dotacion'],
                        $row['estado'],
                );

                $i++;

            }

            return $lista;

            
            
        } catch (Exception $ex) {
            print "Error al traer la lista de los nuevos empleados" . $ex;
        }


        return null;
    }


    public function ListaCasaUsuario($casa) {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            
            $sql = "SELECT * FROM tbl_usuario AS tu INNER JOIN tbl_tipo_documento AS ttd ON tu.id_tipo_documento = ttd.id_tipo_documento INNER JOIN tbl_tipo_contrato AS ttc ON tu.id_tipo_contrato = ttc.id_tipo_contrato INNER JOIN tbl_perfil AS tp ON tu.id_perfil = tp.id_perfil INNER JOIN tbl_estado AS te ON tu.id_estado = te.id_estado INNER JOIN tbl_casa AS tc ON tu.id_casa = tc.id_casa INNER JOIN tbl_genero AS tg ON tu.id_genero = tg.id_genero INNER JOIN tbl_estado_civil AS tec ON tu.id_estado_civil = tec.id_estado_civil INNER JOIN tbl_tipo_sangre_rh AS ttsr ON tu.id_tipo_sangre_rh = ttsr.id_tipo_sangre_rh INNER JOIN tbl_nivel_academico AS tna ON tu.id_nivel_academico = tna.id_nivel_academico INNER JOIN tbl_eps AS teps ON tu.id_eps = teps.id_eps INNER JOIN tbl_sucursal AS tsu ON tu.id_sucursal = tsu.id_sucursal INNER JOIN tbl_seccion AS tsec ON tu.id_seccion = tsec.id_seccion INNER JOIN tbl_area AS tar ON tu.id_area = tar.id_area INNER JOIN tbl_cargo AS tcar ON tu.id_cargo = tcar.id_cargo INNER JOIN tbl_pension AS tpen ON tu.id_pension = tpen.id_pension INNER JOIN tbl_tipo_dotacion AS tpdo ON tu.id_tipo_dotacion = tpdo.id_tipo_dotacion WHERE tu.id_casa = " . $casa;
            $rs = $cnx->query($sql);

            while($row = $rs->fetch()) {
                
                $lista[$i] = new UsuarioDTO();
                $lista[$i]->constructor(
                    $row['id_usuario'],
                        $row['tipo_documento'],
                        $row['fecha_expedicion'],
                        $row['lugar_expedicion'],
                        $row['nombre'],
                        $row['apellido'],
                        $row['telefono_fijo'],
                        $row['telefono_movil'],
                        $row['tipo_casa'],
                        $row['genero'],
                        $row['fecha_nacimiento'],
                        $row['edad'],
                        $row['direccion'],
                        $row['lugar_residencia'],
                        $row['nivel_academico'],
                        $row['area_academica'],
                        $row['estado_civil'],
                        $row['eps'],
                        $row['nro_cuenta'],
                        $row['tipo_sangre_rh'],
                        $row['antecedentes'],
                        $row['practica_deporte'],
                        $row['consumo_cigarros'],
                        $row['consumo_licor'],
                        $row['consumo_spa'],
                        $row['correo'],
                        $row['pass'],
                        $row['perfil'],
                        $row['nombre_persona_emergencia'],
                        $row['telefono_emergencia'],
                        $row['celular_emergencia'],
                        $row['parentesco_emergencia'],

                        $row['sucursal'],
                        $row['tipo_contrato'],
                        $row['fecha_ingreso'],
                        $row['fecha_retiro'],
                        $row['motivo_retiro'],
                        $row['salario'],
                        $row['valor_dia'],
                        $row['valor_hora'],
                        $row['clase_riesgo'],
                        $row['porcentaje_riesgo'],
                        $row['area'],
                        $row['seccion'],
                        $row['cargo'],
                        $row['pension'],
                        $row['tipo_dotacion'],
                        $row['estado'],
                );

                $i++;

            }

            return $lista;

            
            
        } catch (Exception $ex) {
            print "Error al traer la lista de los empleados por tipo de casa" . $ex;
        }


        return null;
    }


    public function verificarCorreoBd($correo) {

        $cnx = Conexion::conectar();

        try {
            $sql = "SELECT correo FROM tbl_usuario WHERE correo = '" . $correo . "'";
            $rs = $cnx->query($sql);

            $countRows = $rs->rowCount();

            if ($countRows <= -1) {

                return true;

            }else{
                return false;
            }

        } catch (Exception $ex) {
            print "Error al verificar el correo con la base de datos";     
        }

        return false;

    }

}