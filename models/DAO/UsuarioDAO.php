<?php

require_once("../../config/conexion.php");
require_once("../../models/DTO/UsuarioDTO.php");

class UsuarioDAO {

    var $ps; /* PreparedStatement */
    var $rs; /* ResultSet */
    var $st; /* Statement */



    

    // -------------- Traer las camisas si lo tiene -----------------
    
    public function traerCamisas ($id_usuario) {

        $cnx = Conexion::conectar();
        $usuariodto = null;

        try {
            $sql = "SELECT tu.*, tc.id_camisa, tc.talla AS talla_camisas, tc.id_tipo_camisa, tc.id_genero, ttc.tipo_camisa, tg.* FROM tbl_usuario AS tu INNER JOIN tbl_camisa AS tc ON tu.id_camisa = tc.id_camisa INNER JOIN tbl_tipo_camisa AS ttc ON tc.id_tipo_camisa = ttc.id_tipo_camisa INNER JOIN tbl_genero AS tg ON tc.id_genero = tg.id_genero WHERE id_usuario = '$id_usuario'";

            $rs = $cnx->query($sql);
            if ($rs->rowCount() == -1) {
                $row = $rs->fetch();

                $usuariodto = new UsuarioDTO();
                $usuariodto->setId_usuario($row['id_usuario']);
                $usuariodto->setNombre($row['nombre']);
                $usuariodto->setApellido($row['apellido']);
                $usuariodto->setCamisa("Camisa: " . $row['tipo_camisa']. " " .$row['genero']. " " . $row['talla_camisas']);
                $usuariodto->setCant_camisa($row['cant_camisa']);
            }else{
                $usuariodto = null;
            }


            return $usuariodto;

        } catch (Exception $ex) {
            echo "Error al traer la camisa ". $ex->getMessage();
        }

        return null;
    }

    // ---------------- Traer las pantalones si lo tiene -----

    public function traerPantalones($id_usuario) {
        $cnx = Conexion::conectar();
        $usuariodto = null;

        try {
            $sql = "SELECT tu.*, tg.*, tp.id_pantalon, tp.talla AS talla_pantalones, tp.id_tipo_pantalon, ttp.tipo_pantalon FROM tbl_usuario AS tu INNER JOIN tbl_pantalon AS tp ON tu.id_pantalon = tp.id_pantalon INNER JOIN tbl_tipo_pantalon AS ttp ON tp.id_tipo_pantalon = ttp.id_tipo_pantalon INNER JOIN tbl_genero AS tg ON tp.id_genero = tg.id_genero WHERE id_usuario = '$id_usuario'";
            $rs = $cnx->query($sql);

            if ($rs->rowCount() == -1) {
                $row = $rs->fetch();

                $usuariodto = new UsuarioDTO();
                $usuariodto->setId_usuario($row['id_usuario']);
                $usuariodto->setNombre($row['nombre']);
                $usuariodto->setApellido($row['apellido']);
                $usuariodto->setPantalon("Pantalon: " . $row['tipo_pantalon']. " " . $row['talla_pantalones']);
                $usuariodto->setCant_pantalon($row['cant_pantalon']);
            }else{
                $usuariodto = null;
            }

            

            return $usuariodto;

        } catch (Exception $ex) {
            echo "Error al traer los pantalones ". $ex->getMessage();
        }

        return null;
    }

    // ---------------- Traer zapatos si lo tiene -----

    public function traerZapatos($id_usuario) {
        $cnx = Conexion::conectar();
        $usuariodto = null;

        try {
            $sql = "SELECT tu.*, tz.id_zapato, tz.talla AS talla_zapatos, tz.id_tipo_zapato, ttz.tipo_zapato FROM tbl_usuario AS tu INNER JOIN tbl_zapato AS tz ON tu.id_zapato = tz.id_zapato INNER JOIN tbl_tipo_zapato AS ttz ON tz.id_tipo_zapato = ttz.id_tipo_zapato WHERE id_usuario = '$id_usuario'";
            $rs = $cnx->query($sql);

            if ($rs->rowCount() == -1) {
                $row = $rs->fetch();

                $usuariodto = new UsuarioDTO();
                $usuariodto->setId_usuario($row['id_usuario']);
                $usuariodto->setNombre($row['nombre']);
                $usuariodto->setApellido($row['apellido']);
                $usuariodto->setZapato("Zapato: " . $row['tipo_zapato']. " " . $row['talla_zapatos']);
                $usuariodto->setCant_zapato($row['cant_zapato']);
            }else{
                $usuariodto = null;
            }

            

            return $usuariodto;

        } catch (Exception $ex) {
            echo "Error al traer los zapatos ". $ex->getMessage();
        }

        return null;
    }

    // -------------------

    public function traerVestimenta($id_usuario) {
        $cnx = Conexion::conectar();
        $usuariodto = null;

        try {
            $sql = "SELECT tu.*, tov.* FROM tbl_usuario AS tu INNER JOIN tbl_otra_vestimenta AS tov ON tu.id_vestimenta = tov.id_vestimenta WHERE id_usuario = '$id_usuario'";
            $rs = $cnx->query($sql);

            if ($rs->rowCount() == -1) {
                $row = $rs->fetch();

                $usuariodto = new UsuarioDTO();
                $usuariodto->setId_usuario($row['id_usuario']);
                $usuariodto->setNombre($row['nombre']);
                $usuariodto->setApellido($row['apellido']);
                $usuariodto->setVestimenta("Otro: " . $row['vestimenta']);
            }else{
                $usuariodto = null;
            }

            
            return $usuariodto;

        } catch (Exception $ex) {
            echo "Error al generar la carta ". $ex->getMessage();
        }

        return null;

    }


    // ---------------- Carta de dotacion -----

    public function cartaDotacion($id_usuario) {
        $cnx = Conexion::conectar();
        $usuariodto = null;

        try {
            $sql = "SELECT tu.*, tc.id_camisa, tc.talla AS talla_camisas, tc.id_tipo_camisa, tc.id_genero, ttc.tipo_camisa, tg.*, tp.id_pantalon, tp.talla AS talla_pantalones, tp.id_tipo_pantalon, ttp.tipo_pantalon, tz.id_zapato, tz.talla AS talla_zapatos, tz.id_tipo_zapato, ttz.tipo_zapato, tov.* FROM tbl_usuario AS tu INNER JOIN tbl_camisa AS tc ON tu.id_camisa = tc.id_camisa INNER JOIN tbl_tipo_camisa AS ttc ON tc.id_tipo_camisa = ttc.id_tipo_camisa INNER JOIN tbl_genero AS tg ON tc.id_genero = tg.id_genero INNER JOIN tbl_pantalon AS tp ON tu.id_pantalon = tp.id_pantalon INNER JOIN tbl_tipo_pantalon AS ttp ON tp.id_tipo_pantalon = ttp.id_tipo_pantalon INNER JOIN tbl_zapato AS tz ON tu.id_zapato = tz.id_zapato INNER JOIN tbl_tipo_zapato AS ttz ON tz.id_tipo_zapato = ttz.id_tipo_zapato INNER JOIN tbl_otra_vestimenta AS tov ON tu.id_vestimenta = tov.id_vestimenta WHERE id_usuario = '$id_usuario'";
            $rs = $cnx->query($sql);

            $row = $rs->fetch();

            $usuariodto = new UsuarioDTO();
            $usuariodto->setId_usuario($row['id_usuario']);
            $usuariodto->setNombre($row['nombre']);
            $usuariodto->setApellido($row['apellido']);
            $usuariodto->setCamisa("Camisa: " . $row['tipo_camisa']. " " .$row['genero']. " " . $row['talla_camisas']);
            $usuariodto->setPantalon("Pantalon: " . $row['tipo_pantalon']. " " . $row['talla_pantalones']);
            $usuariodto->setZapato("Zapato: " . $row['tipo_zapato']. " " . $row['talla_zapatos']);
            $usuariodto->setVestimenta("Otro: " . $row['vestimenta']);

            $usuariodto->setCant_camisa($row['cant_camisa']);
            $usuariodto->setCant_pantalon($row['cant_pantalon']);
            $usuariodto->setCant_zapato($row['cant_zapato']);

            return $usuariodto;

        } catch (Exception $ex) {
            echo "Error al generar la carta ". $ex->getMessage();
        }
    }

    // ------------------ Actualizar foto de perfil ---------------

    public function actualizarFotoPerfil($usuariodto) {
        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_usuario SET foto_perfil = ? WHERE id_usuario = '". $usuariodto->getId_usuario() . "'";
            $ps = $cnx->prepare($sql);

            $foto = $usuariodto->getFoto();

            $ps->bindParam(1, $foto);

            $ps->execute();

            return true;
        } catch (Exception $ex) {
            echo "Error al actualizar la foto de perfil";
        }
    }

    // ----------------------- Registrar un usuario ------------------------------------

    public function registrarUsuario($usuariodto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "INSERT INTO tbl_usuario(id_usuario, id_tipo_documento, fecha_expedicion, lugar_expedicion,  nombre, apellido, telefono_fijo, telefono_movil, id_casa, estrato, id_genero, fecha_nacimiento, edad, direccion, id_lugar_residencia, id_nivel_academico, area_academica, id_estado_civil, id_eps, nro_cuenta, id_tipo_sangre_rh, antecedentes, practica_deporte,consumo_cigarros, consumo_licor, consumo_spa, correo, pass, id_perfil, nombre_persona_emergencia, telefono_emergencia, celular_emergencia, parentesco_emergencia, id_sucursal, id_tipo_contrato, fecha_ingreso, fecha_retiro, motivo_retiro, id_cesantia, salario, valor_dia, valor_hora, id_area, id_seccion, id_cargo, id_clase_riesgo, id_pension, id_tipo_dotacion, talla_camisa, talla_pantalon, talla_zapato, id_estado) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,1)";

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
            $estrato = $usuariodto->getEstrato();
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
            $censatia = $usuariodto->getCesantia();
            $salario = $usuariodto->getSalario();
            $valor_dia = $usuariodto->getValor_dia();
            $valor_hora = $usuariodto->getValor_hora();
            $clase_riesgo = $usuariodto->getClase_riesgo();
            $area = $usuariodto->getArea();
            $seccion = $usuariodto->getSeccion();
            $cargo = $usuariodto->getCargo();
            $pension = $usuariodto->getPension();
            $tipo_dotacion = $usuariodto->getTipo_dotacion();
            $talla_camisa = $usuariodto->getTalla_camisa();
            $talla_pantalon = $usuariodto->getTalla_pantalon();
            $talla_zapato = $usuariodto->getTalla_zapato();
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
            $ps->bindParam(10, $estrato);
            $ps->bindParam(11, $genero);
            $ps->bindParam(12, $fecha_nacimiento);
            $ps->bindParam(13, $edad);
            $ps->bindParam(14, $direccion);
            $ps->bindParam(15, $lugar_residencia);
            $ps->bindParam(16, $nivel_academico);
            $ps->bindParam(17, $area_academica);
            $ps->bindParam(18, $estado_civil);
            $ps->bindParam(19, $eps);
            $ps->bindParam(20, $nro_cuenta);
            $ps->bindParam(21, $tipo_sangre);
            $ps->bindParam(22, $antecedentes);
            $ps->bindParam(23, $practica_deporte);
            $ps->bindParam(24, $consumo_cigarros);
            $ps->bindParam(25, $consumo_licor);
            $ps->bindParam(26, $consumo_spa);
            $ps->bindParam(27, $correo);
            $ps->bindParam(28, $password);
            $ps->bindParam(29, $perfil);
            $ps->bindParam(30, $nombre_persona_emergencia);
            $ps->bindParam(31, $telefono_emergencia);
            $ps->bindParam(32, $celular_emergencia);
            $ps->bindParam(33, $parentesco_emergencia);


            $ps->bindParam(34, $sucursal);
            $ps->bindParam(35, $tipo_contrato);
            $ps->bindParam(36, $fecha_ingreso);
            $ps->bindParam(37, $fecha_retiro);
            $ps->bindParam(38, $motivo_retiro);
            $ps->bindParam(39, $censatia);
            $ps->bindParam(40, $salario);
            $ps->bindParam(41, $valor_dia);
            $ps->bindParam(42, $valor_hora);
            $ps->bindParam(43, $area);
            $ps->bindParam(44, $seccion);
            $ps->bindParam(45, $cargo);
            $ps->bindParam(46, $clase_riesgo);
            $ps->bindParam(47, $pension);
            $ps->bindParam(48, $tipo_dotacion);
            $ps->bindParam(49, $talla_camisa);
            $ps->bindParam(50, $talla_pantalon);
            $ps->bindParam(51, $talla_zapato);

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
            $sql = "SELECT * FROM tbl_usuario AS tu INNER JOIN tbl_tipo_documento AS ttd ON tu.id_tipo_documento = ttd.id_tipo_documento INNER JOIN tbl_tipo_contrato AS ttc ON tu.id_tipo_contrato = ttc.id_tipo_contrato INNER JOIN tbl_perfil AS tp ON tu.id_perfil = tp.id_perfil INNER JOIN tbl_estado AS te ON tu.id_estado = te.id_estado INNER JOIN tbl_casa AS tc ON tu.id_casa = tc.id_casa INNER JOIN tbl_genero AS tg ON tu.id_genero = tg.id_genero INNER JOIN tbl_lugar_residencia AS tls ON tu.id_lugar_residencia = tls.id_lugar_residencia INNER JOIN tbl_estado_civil AS tec ON tu.id_estado_civil = tec.id_estado_civil INNER JOIN tbl_tipo_sangre_rh AS ttsr ON tu.id_tipo_sangre_rh = ttsr.id_tipo_sangre_rh INNER JOIN tbl_nivel_academico AS tna ON tu.id_nivel_academico = tna.id_nivel_academico INNER JOIN tbl_eps AS teps ON tu.id_eps = teps.id_eps INNER JOIN tbl_sucursal AS tsu ON tu.id_sucursal = tsu.id_sucursal INNER JOIN tbl_cesantia AS tces ON tu.id_cesantia = tces.id_cesantia INNER JOIN tbl_seccion AS tsec ON tu.id_seccion = tsec.id_seccion INNER JOIN tbl_area AS tar ON tu.id_area = tar.id_area INNER JOIN tbl_cargo AS tcar ON tu.id_cargo = tcar.id_cargo INNER JOIN tbl_clase_riesgo AS tcr ON tu.id_clase_riesgo = tcr.id_clase_riesgo INNER JOIN tbl_pension AS tpen ON tu.id_pension = tpen.id_pension INNER JOIN tbl_tipo_dotacion AS tpdo ON tu.id_tipo_dotacion = tpdo.id_tipo_dotacion /* INNER JOIN tbl_camisa AS tca ON tu.id_camisa = tca.id_camisa INNER JOIN tbl_pantalon AS tpan ON tu.id_pantalon = tpan.id_pantalon INNER JOIN tbl_zapato AS tza ON tu.id_zapato = tza.id_zapato INNER JOIN tbl_otra_vestimenta AS tov ON tu.id_vestimenta = tov.id_vestimenta */";
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
                    $row['estrato'],
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
                    $row['fecha_actual'],
                    $row['antiguedad'],
                    $row['cesantia'],
                    $row['area'],
                    $row['seccion'],
                    $row['cargo'],
                    $row['clase_riesgo'],
                    $row['pension'],
                    $row['tipo_dotacion'],
                    $row['estado'],
                    $row['id_camisa'],
                    $row['id_pantalon'],
                    $row['id_zapato'],
                    $row['id_vestimenta']
                );

                $lista[$i]->setFoto($row['foto_perfil']);
                $i += 1;
            }

            return $lista;

        } catch (Exception $e) {
            print "Error al traer los datos de los usuarios " . $e->getMessage();
        }

        return null;

    }

    // Lista de todos los usuario con Id

    public function listaUsuariosConId() {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            
            $sql = "SELECT * FROM tbl_usuario";
            $rs = $cnx->query($sql);

            while ($row = $rs->fetch()) {

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
                    $row['estrato'],
                    $row['id_genero'],
                    $row['fecha_nacimiento'],
                    $row['edad'],
                    $row['direccion'],
                    $row['id_lugar_residencia'],
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
                    $row['fecha_actual'],
                    $row['antiguedad'],
                    $row['id_cesantia'],
                    $row['salario'],
                    $row['valor_dia'],
                    $row['valor_hora'],
                    $row['id_area'],
                    $row['id_seccion'],
                    $row['id_cargo'],
                    $row['id_clase_riesgo'],
                    $row['id_pension'],
                    $row['id_tipo_dotacion'],
                    $row['id_estado'],
                    $row['id_camisa'],
                    $row['id_pantalon'],
                    $row['id_zapato'],
                    $row['id_vestimenta']
                );

                $lista[$i]->setTalla_camisa($row['talla_camisa']);
                 $lista[$i]->setTalla_pantalon($row['talla_pantalon']);
                $lista[$i]->setTalla_zapato($row['talla_zapato']);

                $lista[$i]->setFoto($row['foto_perfil']);

                $i++;
            }

            return $lista;

        

          

        } catch (Exception $e) {
            print "Error, al traer los datos del usuario " . $e->getMessage();
        }

        return null;

    }


    // ------------------------ Lista de datos del usuario -------------------

    public function listaUsuario($id_usuario) {

        $cnx = Conexion::conectar();
        $usuariodto = null;

        try {
            
            $sql = "SELECT * FROM tbl_usuario AS tu INNER JOIN tbl_tipo_documento AS ttd ON tu.id_tipo_documento = ttd.id_tipo_documento INNER JOIN tbl_tipo_contrato AS ttc ON tu.id_tipo_contrato = ttc.id_tipo_contrato INNER JOIN tbl_perfil AS tp ON tu.id_perfil = tp.id_perfil INNER JOIN tbl_estado AS te ON tu.id_estado = te.id_estado INNER JOIN tbl_casa AS tc ON tu.id_casa = tc.id_casa INNER JOIN tbl_genero AS tg ON tu.id_genero = tg.id_genero INNER JOIN tbl_lugar_residencia AS tls ON tu.id_lugar_residencia = tls.id_lugar_residencia INNER JOIN tbl_estado_civil AS tec ON tu.id_estado_civil = tec.id_estado_civil INNER JOIN tbl_tipo_sangre_rh AS ttsr ON tu.id_tipo_sangre_rh = ttsr.id_tipo_sangre_rh INNER JOIN tbl_nivel_academico AS tna ON tu.id_nivel_academico = tna.id_nivel_academico INNER JOIN tbl_eps AS teps ON tu.id_eps = teps.id_eps INNER JOIN tbl_sucursal AS tsu ON tu.id_sucursal = tsu.id_sucursal INNER JOIN tbl_cesantia AS tces ON tu.id_cesantia = tces.id_cesantia INNER JOIN tbl_seccion AS tsec ON tu.id_seccion = tsec.id_seccion INNER JOIN tbl_area AS tar ON tu.id_area = tar.id_area INNER JOIN tbl_cargo AS tcar ON tu.id_cargo = tcar.id_cargo INNER JOIN tbl_clase_riesgo AS tcr ON tu.id_clase_riesgo = tcr.id_clase_riesgo INNER JOIN tbl_pension AS tpen ON tu.id_pension = tpen.id_pension INNER JOIN tbl_tipo_dotacion AS tpdo ON tu.id_tipo_dotacion = tpdo.id_tipo_dotacion WHERE id_usuario = '" . $id_usuario . "'";
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
                $row['estrato'],
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
                $row['fecha_actual'],
                $row['antiguedad'],
                $row['cesantia'],
                $row['area'],
                $row['seccion'],
                $row['cargo'],
                $row['clase_riesgo'],
                $row['pension'],
                $row['tipo_dotacion'],
                $row['estado'],
                $row['id_camisa'],
                $row['id_pantalon'],
                $row['id_zapato'],
                $row['id_vestimenta']
            );

            $usuariodto->setTalla_camisa($row['talla_camisa']);
            $usuariodto->setTalla_pantalon($row['talla_pantalon']);
            $usuariodto->setTalla_zapato($row['talla_zapato']);

            $usuariodto->setCant_camisa($row['cant_camisa']);
            $usuariodto->setCant_pantalon($row['cant_pantalon']);
            $usuariodto->setCant_zapato($row['cant_zapato']);

            $usuariodto->setFoto($row['foto_perfil']);
            
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
            
            $sql = "SELECT * FROM tbl_usuario /* AS tu INNER JOIN tbl_tipo_documento AS ttd ON tu.id_tipo_documento = ttd.id_tipo_documento INNER JOIN tbl_tipo_contrato AS ttc ON tu.id_tipo_contrato = ttc.id_tipo_contrato INNER JOIN tbl_perfil AS tp ON tu.id_perfil = tp.id_perfil INNER JOIN tbl_estado AS te ON tu.id_estado = te.id_estado INNER JOIN tbl_casa AS tc ON tu.id_casa = tc.id_casa INNER JOIN tbl_genero AS tg ON tu.id_genero = tg.id_genero INNER JOIN tbl_lugar_residencia AS tls ON tu.id_lugar_residencia = tls.id_lugar_residencia INNER JOIN tbl_estado_civil AS tec ON tu.id_estado_civil = tec.id_estado_civil INNER JOIN tbl_tipo_sangre_rh AS ttsr ON tu.id_tipo_sangre_rh = ttsr.id_tipo_sangre_rh INNER JOIN tbl_nivel_academico AS tna ON tu.id_nivel_academico = tna.id_nivel_academico INNER JOIN tbl_eps AS teps ON tu.id_eps = teps.id_eps INNER JOIN tbl_sucursal AS tsu ON tu.id_sucursal = tsu.id_sucursal INNER JOIN tbl_cesantia AS tces ON tu.id_cesantia = tces.id_cesantia INNER JOIN tbl_seccion AS tsec ON tu.id_seccion = tsec.id_seccion INNER JOIN tbl_area AS tar ON tu.id_area = tar.id_area INNER JOIN tbl_cargo AS tcar ON tu.id_cargo = tcar.id_cargo INNER JOIN tbl_clase_riesgo AS tcr ON tu.id_clase_riesgo = tcr.id_clase_riesgo INNER JOIN tbl_pension AS tpen ON tu.id_pension = tpen.id_pension INNER JOIN tbl_tipo_dotacion AS tpdo ON tu.id_tipo_dotacion = tpdo.id_tipo_dotacion */ /* INNER JOIN tbl_camisa AS tca ON tu.id_camisa = tca.id_camisa INNER JOIN tbl_pantalon AS tpan ON tu.id_pantalon = tpan.id_pantalon INNER JOIN tbl_zapato AS tza ON tu.id_zapato = tza.id_zapato INNER JOIN tbl_otra_vestimenta AS tov ON tu.id_vestimenta = tov.id_vestimenta */ WHERE id_usuario = '" . $id_usuario . "'";
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
                $row['estrato'],
                $row['id_genero'],
                $row['fecha_nacimiento'],
                $row['edad'],
                $row['direccion'],
                $row['id_lugar_residencia'],
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
                $row['fecha_actual'],
                $row['antiguedad'],
                $row['id_cesantia'],
                $row['id_area'],
                $row['id_seccion'],
                $row['id_cargo'],
                $row['id_clase_riesgo'],
                $row['id_pension'],
                $row['id_tipo_dotacion'],
                $row['id_estado'],
                $row['id_camisa'],
                $row['id_pantalon'],
                $row['id_zapato'],
                $row['id_vestimenta']
            );

            $usuariodto->setTalla_camisa($row['talla_camisa']);
            $usuariodto->setTalla_pantalon($row['talla_pantalon']);
            $usuariodto->setTalla_zapato($row['talla_zapato']);

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
            $sql = "UPDATE tbl_usuario SET id_tipo_documento = ?, fecha_expedicion = ?, lugar_expedicion = ?,  nombre = ?, apellido = ?, telefono_fijo = ?, telefono_movil = ?, estrato = ?, id_casa = ?, id_genero = ?, fecha_nacimiento = ?, edad = ?, direccion = ?, id_lugar_residencia = ?, id_nivel_academico = ?, area_academica = ?, id_estado_civil = ?, id_eps = ?, nro_cuenta = ?, id_tipo_sangre_rh = ?, antecedentes = ?, practica_deporte = ?,consumo_cigarros = ?, consumo_licor = ?, consumo_spa = ?, correo = ?, pass = ?, nombre_persona_emergencia = ?, telefono_emergencia = ?, celular_emergencia = ?, parentesco_emergencia = ? WHERE id_usuario = '" . $usuariodto->getId_usuario() . "' ";
            $ps = $cnx->prepare($sql);

    
            $tipo_documento = $usuariodto->getTipo_documento();
            $fecha_expedicion = $usuariodto->getFecha_expedicion();
            $lugar_expedicion = $usuariodto->getLugar_expedicion();        
            $nombre = $usuariodto->getNombre();
            $apellido = $usuariodto->getApellido();
            $telefono_fijo = $usuariodto->getTelefono_fijo();
            $telefono_movil = $usuariodto->getTelefono_movil();
            $estrato = $usuariodto->getEstrato();
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
            $ps->bindParam(8, $estrato);
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
            $sql = "UPDATE tbl_usuario SET id_sucursal = ?, id_tipo_contrato = ?, fecha_ingreso = ?, fecha_retiro = ?, motivo_retiro = ?, salario = ?, valor_dia = ?, valor_hora = ?, id_clase_riesgo = ?, id_area = ?, id_seccion = ?, id_cargo = ?, id_pension = ?, id_tipo_dotacion = ?, id_estado = ?, id_cesantia = ?, id_perfil = ?, talla_camisa = ?, talla_pantalon = ?, talla_zapato = ? WHERE id_usuario = '" . $usuariodto->getId_usuario() . "' ";
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
            $area = $usuariodto->getArea();
            $seccion = $usuariodto->getSeccion();
            $cargo = $usuariodto->getCargo();
            $pension = $usuariodto->getPension();
            $tipo_dotacion = $usuariodto->getTipo_dotacion();
            $estado = $usuariodto->getEstado();
            $cesantia = $usuariodto->getCesantia();
            $perfil = $usuariodto->getPerfil();
            $talla_pantalon = $usuariodto->getTalla_pantalon();
            $talla_camisa = $usuariodto->getTalla_camisa();
            $talla_zapato = $usuariodto->getTalla_zapato();

            $ps->bindParam(1, $sucursal);
            $ps->bindParam(2, $tipo_contrato);
            $ps->bindParam(3, $fecha_ingreso);
            $ps->bindParam(4, $fecha_retiro);
            $ps->bindParam(5, $motivo_retiro);
            $ps->bindParam(6, $salario);
            $ps->bindParam(7, $valor_dia);
            $ps->bindParam(8, $valor_hora);
            $ps->bindParam(9, $clase_riesgo);
            $ps->bindParam(10, $area);
            $ps->bindParam(11, $seccion);
            $ps->bindParam(12, $cargo);
            $ps->bindParam(13, $pension);
            $ps->bindParam(14, $tipo_dotacion);
            $ps->bindParam(15, $estado);
            $ps->bindParam(16, $cesantia);
            $ps->bindParam(17, $perfil);
            $ps->bindParam(18, $talla_camisa);
            $ps->bindParam(19, $talla_pantalon);
            $ps->bindParam(20, $talla_zapato);

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
            $sql = "SELECT * FROM tbl_usuario AS tu INNER JOIN tbl_tipo_documento AS ttd ON tu.id_tipo_documento = ttd.id_tipo_documento INNER JOIN tbl_tipo_contrato AS ttc ON tu.id_tipo_contrato = ttc.id_tipo_contrato INNER JOIN tbl_perfil AS tp ON tu.id_perfil = tp.id_perfil INNER JOIN tbl_estado AS te ON tu.id_estado = te.id_estado INNER JOIN tbl_casa AS tc ON tu.id_casa = tc.id_casa INNER JOIN tbl_genero AS tg ON tu.id_genero = tg.id_genero INNER JOIN tbl_lugar_residencia AS tls ON tu.id_lugar_residencia = tls.id_lugar_residencia INNER JOIN tbl_estado_civil AS tec ON tu.id_estado_civil = tec.id_estado_civil INNER JOIN tbl_tipo_sangre_rh AS ttsr ON tu.id_tipo_sangre_rh = ttsr.id_tipo_sangre_rh INNER JOIN tbl_nivel_academico AS tna ON tu.id_nivel_academico = tna.id_nivel_academico INNER JOIN tbl_eps AS teps ON tu.id_eps = teps.id_eps INNER JOIN tbl_sucursal AS tsu ON tu.id_sucursal = tsu.id_sucursal INNER JOIN tbl_cesantia AS tces ON tu.id_cesantia = tces.id_cesantia INNER JOIN tbl_seccion AS tsec ON tu.id_seccion = tsec.id_seccion INNER JOIN tbl_area AS tar ON tu.id_area = tar.id_area INNER JOIN tbl_cargo AS tcar ON tu.id_cargo = tcar.id_cargo INNER JOIN tbl_clase_riesgo AS tcr ON tu.id_clase_riesgo = tcr.id_clase_riesgo INNER JOIN tbl_pension AS tpen ON tu.id_pension = tpen.id_pension INNER JOIN tbl_tipo_dotacion AS tpdo ON tu.id_tipo_dotacion = tpdo.id_tipo_dotacion WHERE correo = '" . $usuario->getCorreo() . "'";
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
                        $row['estrato'],
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
                        $row['fecha_actual'],
                        $row['antiguedad'],
                        $row['id_cesantia'],
                        $row['salario'],
                        $row['valor_dia'],
                        $row['valor_hora'],
                        $row['area'],
                        $row['seccion'],
                        $row['cargo'],
                        $row['id_clase_riesgo'],
                        $row['pension'],
                        $row['tipo_dotacion'],
                        $row['estado'],
                        $row['id_camisa'],
                        $row['id_pantalon'],
                        $row['id_zapato'],
                        $row['id_vestimenta']
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
            print "Error al iniciar sesión " . $e->getMessage();
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
                    $row['estrato'],
                    $row['id_genero'],
                    $row['fecha_nacimiento'],
                    $row['edad'],
                    $row['direccion'],
                    $row['id_lugar_residencia'],
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
                    $row['fecha_actual'],
                    $row['antiguedad'],
                    $row['id_cesantia'],
                    $row['id_area'],
                    $row['id_seccion'],
                    $row['id_cargo'],
                    $row['id_clase_riesgo'],
                    $row['id_pension'],
                    $row['id_tipo_dotacion'],
                    $row['id_estado'],
                    $row['id_camisa'],
                    $row['id_pantalon'],
                    $row['id_zapato'],
                    $row['id_vestimenta']
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
    



    //  ------------------ Pendiente por actualizar  ------  //




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
                        $row['id_camisa'],
                        $row['id_pantalon'],
                        $row['id_zapato'],
                        $row['id_vestimenta']
                        
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
                    $row['id_camisa'],
                    $row['id_pantalon'],
                    $row['id_zapato'],
                    $row['id_vestimenta']
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
                    $row['id_camisa'],
                    $row['id_pantalon'],
                    $row['id_zapato'],
                    $row['id_vestimenta']
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
                    $row['id_camisa'],
                    $row['id_pantalon'],
                    $row['id_zapato'],
                    $row['id_vestimenta']
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

            $sql = "SELECT * FROM tbl_usuario AS tu INNER JOIN tbl_tipo_documento AS ttd ON tu.id_tipo_documento = ttd.id_tipo_documento INNER JOIN tbl_tipo_contrato AS ttc ON tu.id_tipo_contrato = ttc.id_tipo_contrato INNER JOIN tbl_perfil AS tp ON tu.id_perfil = tp.id_perfil INNER JOIN tbl_estado AS te ON tu.id_estado = te.id_estado INNER JOIN tbl_casa AS tc ON tu.id_casa = tc.id_casa INNER JOIN tbl_genero AS tg ON tu.id_genero = tg.id_genero INNER JOIN tbl_estado_civil AS tec ON tu.id_estado_civil = tec.id_estado_civil INNER JOIN tbl_tipo_sangre_rh AS ttsr ON tu.id_tipo_sangre_rh = ttsr.id_tipo_sangre_rh INNER JOIN tbl_nivel_academico AS tna ON tu.id_nivel_academico = tna.id_nivel_academico INNER JOIN tbl_eps AS teps ON tu.id_eps = teps.id_eps INNER JOIN tbl_sucursal AS tsu ON tu.id_sucursal = tsu.id_sucursal INNER JOIN tbl_seccion AS tsec ON tu.id_seccion = tsec.id_seccion INNER JOIN tbl_area AS tar ON tu.id_area = tar.id_area INNER JOIN tbl_cargo AS tcar ON tu.id_cargo = tcar.id_cargo INNER JOIN tbl_pension AS tpen ON tu.id_pension = tpen.id_pension INNER JOIN tbl_tipo_dotacion AS tpdo ON tu.id_tipo_dotacion = tpdo.id_tipo_dotacion WHERE salario BETWEEN " . $inicio_salario . " AND " . $fin_salario;
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
                        $row['id_camisa'],
                        $row['id_pantalon'],
                        $row['id_zapato'],
                        $row['id_vestimenta']
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
            
            $sql = "SELECT * FROM tbl_usuario AS tu INNER JOIN tbl_tipo_documento AS ttd ON tu.id_tipo_documento = ttd.id_tipo_documento INNER JOIN tbl_tipo_contrato AS ttc ON tu.id_tipo_contrato = ttc.id_tipo_contrato INNER JOIN tbl_perfil AS tp ON tu.id_perfil = tp.id_perfil INNER JOIN tbl_estado AS te ON tu.id_estado = te.id_estado INNER JOIN tbl_casa AS tc ON tu.id_casa = tc.id_casa INNER JOIN tbl_genero AS tg ON tu.id_genero = tg.id_genero INNER JOIN tbl_lugar_residencia AS tls ON tu.id_lugar_residencia = tls.id_lugar_residencia INNER JOIN tbl_estado_civil AS tec ON tu.id_estado_civil = tec.id_estado_civil INNER JOIN tbl_tipo_sangre_rh AS ttsr ON tu.id_tipo_sangre_rh = ttsr.id_tipo_sangre_rh INNER JOIN tbl_nivel_academico AS tna ON tu.id_nivel_academico = tna.id_nivel_academico INNER JOIN tbl_eps AS teps ON tu.id_eps = teps.id_eps INNER JOIN tbl_sucursal AS tsu ON tu.id_sucursal = tsu.id_sucursal INNER JOIN tbl_cesantia AS tces ON tu.id_cesantia = tces.id_cesantia INNER JOIN tbl_seccion AS tsec ON tu.id_seccion = tsec.id_seccion INNER JOIN tbl_area AS tar ON tu.id_area = tar.id_area INNER JOIN tbl_cargo AS tcar ON tu.id_cargo = tcar.id_cargo INNER JOIN tbl_clase_riesgo AS tcr ON tu.id_clase_riesgo = tcr.id_clase_riesgo INNER JOIN tbl_pension AS tpen ON tu.id_pension = tpen.id_pension INNER JOIN tbl_tipo_dotacion AS tpdo ON tu.id_tipo_dotacion = tpdo.id_tipo_dotacion WHERE tu.id_estado = " . $estado;
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
                        $row['estrato'],
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
                        $row['fecha_actual'],
                        $row['antiguedad'],
                        $row['cesantia'],
                        $row['salario'],
                        $row['valor_dia'],
                        $row['valor_hora'],
                        
                        
                        $row['area'],
                        $row['seccion'],
                        $row['cargo'],
                        $row['id_clase_riesgo'],
                        $row['pension'],
                        $row['tipo_dotacion'],
                        $row['estado'],
                        $row['id_camisa'],
                        $row['id_pantalon'],
                        $row['id_zapato'],
                        $row['id_vestimenta']
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
                        $row['id_camisa'],
                        $row['id_pantalon'],
                        $row['id_zapato'],
                        $row['id_vestimenta']
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
            
            $sql = 'SELECT * FROM tbl_usuario AS tu INNER JOIN tbl_tipo_documento AS ttd ON tu.id_tipo_documento = ttd.id_tipo_documento INNER JOIN tbl_tipo_contrato AS ttc ON tu.id_tipo_contrato = ttc.id_tipo_contrato INNER JOIN tbl_perfil AS tp ON tu.id_perfil = tp.id_perfil INNER JOIN tbl_estado AS te ON tu.id_estado = te.id_estado INNER JOIN tbl_casa AS tc ON tu.id_casa = tc.id_casa INNER JOIN tbl_genero AS tg ON tu.id_genero = tg.id_genero INNER JOIN tbl_estado_civil AS tec ON tu.id_estado_civil = tec.id_estado_civil INNER JOIN tbl_tipo_sangre_rh AS ttsr ON tu.id_tipo_sangre_rh = ttsr.id_tipo_sangre_rh INNER JOIN tbl_nivel_academico AS tna ON tu.id_nivel_academico = tna.id_nivel_academico INNER JOIN tbl_eps AS teps ON tu.id_eps = teps.id_eps INNER JOIN tbl_sucursal AS tsu ON tu.id_sucursal = tsu.id_sucursal INNER JOIN tbl_seccion AS tsec ON tu.id_seccion = tsec.id_seccion INNER JOIN tbl_area AS tar ON tu.id_area = tar.id_area INNER JOIN tbl_cargo AS tcar ON tu.id_cargo = tcar.id_cargo INNER JOIN tbl_pension AS tpen ON tu.id_pension = tpen.id_pension INNER JOIN tbl_tipo_dotacion AS tpdo ON tu.id_tipo_dotacion = tpdo.id_tipo_dotacion WHERE tu.fecha_ingreso BETWEEN DateADD("d", -61, GETDATE()) AND tu.fecha_ingreso AND tu.id_estado = 1';
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
                        $row['estrato'],
                        $row['genero'],
                        $row['fecha_nacimiento'],
                        $row['edad'],
                        $row['direccion'],
                        $row['id_lugar_residencia'],
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
                        $row['id_cesantia'],
                        $row['salario'],
                        $row['valor_dia'],
                        $row['valor_hora'],
                        $row['fecha_actual'],
                        $row['antiguedad'],
                        $row['area'],
                        $row['seccion'],
                        $row['cargo'],
                        $row['id_clase_riesgo'],
                        $row['pension'],
                        $row['tipo_dotacion'],
                        $row['estado'],
                        $row['id_camisa'],
                        $row['id_pantalon'],
                        $row['id_zapato'],
                        $row['id_vestimenta']
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
                        $row['id_camisa'],
                        $row['id_pantalon'],
                        $row['id_zapato'],
                        $row['id_vestimenta']
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


    // Listado de empleados por varios filtros

    public function listaUsuarioFiltros($tipo_documento, $tipo_vivienda, $estrato, $genero, $lugar_residencia, $nivel_academico, $estado_civil, $eps, $tipo_sangre_rh, $sucursal, $tipo_contrato, $cesantia, $clase_riesgo, $seccion, $area, $cargo, $pension, $tipo_dotacion, $estado, $salarioF, $fechaF) {
        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;
        
        try {
            $sql = "SELECT * FROM tbl_usuario AS tu INNER JOIN tbl_tipo_documento AS ttd ON tu.id_tipo_documento = ttd.id_tipo_documento INNER JOIN tbl_tipo_contrato AS ttc ON tu.id_tipo_contrato = ttc.id_tipo_contrato INNER JOIN tbl_perfil AS tp ON tu.id_perfil = tp.id_perfil
             INNER JOIN tbl_estado AS te ON tu.id_estado = te.id_estado INNER JOIN tbl_casa AS tc ON tu.id_casa = tc.id_casa 
             INNER JOIN tbl_genero AS tg ON tu.id_genero = tg.id_genero INNER JOIN tbl_lugar_residencia AS tls ON tu.id_lugar_residencia = tls.id_lugar_residencia 
             INNER JOIN tbl_estado_civil AS tec ON tu.id_estado_civil = tec.id_estado_civil INNER JOIN tbl_tipo_sangre_rh AS ttsr ON tu.id_tipo_sangre_rh = ttsr.id_tipo_sangre_rh INNER JOIN tbl_nivel_academico AS tna ON tu.id_nivel_academico = tna.id_nivel_academico 
             INNER JOIN tbl_eps AS teps ON tu.id_eps = teps.id_eps INNER JOIN tbl_sucursal AS tsu ON tu.id_sucursal = tsu.id_sucursal INNER JOIN tbl_cesantia AS tces ON tu.id_cesantia = tces.id_cesantia INNER JOIN tbl_seccion AS tsec ON tu.id_seccion = tsec.id_seccion 
             INNER JOIN tbl_area AS tar ON tu.id_area = tar.id_area INNER JOIN tbl_cargo AS tcar ON tu.id_cargo = tcar.id_cargo INNER JOIN tbl_clase_riesgo AS tcr ON tu.id_clase_riesgo = tcr.id_clase_riesgo INNER JOIN tbl_pension AS tpen ON tu.id_pension = tpen.id_pension 
             INNER JOIN tbl_tipo_dotacion AS tpdo ON tu.id_tipo_dotacion = tpdo.id_tipo_dotacion WHERE id_usuario !='' " . $tipo_documento . " " . $tipo_vivienda . " " . $estrato . " " . $genero . " " . $lugar_residencia . " " . $nivel_academico . " " . $estado_civil .
             " " . $eps . " " . $tipo_sangre_rh . " " . $sucursal . " " . $tipo_contrato . " " . $cesantia . " " . $clase_riesgo . " " . $seccion . " " . $area . " " . $cargo . " " . $pension . " " . $tipo_dotacion . " " . $estado . " " . $salarioF . " " . $fechaF;
             /* INNER JOIN tbl_camisa AS tca ON tu.id_camisa = tca.id_camisa INNER JOIN tbl_pantalon AS tpan ON tu.id_pantalon = tpan.id_pantalon INNER JOIN tbl_zapato AS tza ON tu.id_zapato = tza.id_zapato INNER JOIN tbl_otra_vestimenta AS tov ON tu.id_vestimenta = tov.id_vestimenta */
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
                    $row['estrato'],
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
                    $row['fecha_actual'],
                    $row['antiguedad'],
                    $row['cesantia'],
                    $row['area'],
                    $row['seccion'],
                    $row['cargo'],
                    $row['clase_riesgo'],
                    $row['pension'],
                    $row['tipo_dotacion'],
                    $row['estado'],
                    $row['id_camisa'],
                    $row['id_pantalon'],
                    $row['id_zapato'],
                    $row['id_vestimenta']
                );

                $lista[$i]->setTalla_camisa($row['talla_camisa']);
                $lista[$i]->setTalla_pantalon($row['talla_pantalon']);
                $lista[$i]->setTalla_zapato($row['talla_zapato']);

            
                $i++;
            }

            return $lista;

        } catch (Exception $e) {
            print "Error al traer los datos de los usuarios " . $e->getMessage();
        }

        return null;
    }

    public function listaDotacionFiltros($genero, $sucursal, $tipo_dotacion, $camisa, $pantalon, $zapato) {
        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;
       
        $inner_camisa = "";
        $inner_pantalon = "";
        $inner_zapato = "";
        $talla = "";
        $tipo_ropa = "";    


        if ($camisa != "") {
            $inner_camisa = " INNER JOIN tbl_camisa AS tcma ON tu.id_camisa = tcma.id_camisa INNER JOIN tbl_tipo_camisa AS ttca ON tcma.id_tipo_camisa = ttca.id_tipo_camisa";
            $tipo_ropa = "tipo_camisa";
            $talla = "talla_camisa";
        }else if($pantalon != " "){
            $inner_pantalon = " INNER JOIN tbl_pantalon AS tpn ON tu.id_pantalon = tpn.id_pantalon INNER JOIN tbl_tipo_pantalon AS ttpn ON tpn.id_tipo_pantalon = ttpn.id_tipo_pantalon";
            $tipo_ropa = "tipo_pantalon";
            $talla = "talla_pantalon";
        }else if($zapato != " ") {
            $inner_zapato = " INNER JOIN tbl_zapato AS tzo ON tu.id_zapato = tzo.id_zapato INNER JOIN tbl_tipo_zapato AS ttzo ON tzo.id_tipo_zapato = ttzo.id_tipo_zapato"; 
            $tipo_ropa = "tipo_zapato";
            $talla = "talla_zapato";
        }

      /*   echo $inner_camisa;
        echo $tipo_ropa;
        echo $talla; */
        
        try {
            $sql = "SELECT * FROM tbl_usuario AS tu INNER JOIN tbl_tipo_documento AS ttd ON tu.id_tipo_documento = ttd.id_tipo_documento INNER JOIN tbl_tipo_contrato AS ttc ON tu.id_tipo_contrato = ttc.id_tipo_contrato INNER JOIN tbl_perfil AS tp ON tu.id_perfil = tp.id_perfil
             INNER JOIN tbl_estado AS te ON tu.id_estado = te.id_estado INNER JOIN tbl_casa AS tc ON tu.id_casa = tc.id_casa 
             INNER JOIN tbl_genero AS tg ON tu.id_genero = tg.id_genero INNER JOIN tbl_lugar_residencia AS tls ON tu.id_lugar_residencia = tls.id_lugar_residencia 
             INNER JOIN tbl_estado_civil AS tec ON tu.id_estado_civil = tec.id_estado_civil INNER JOIN tbl_tipo_sangre_rh AS ttsr ON tu.id_tipo_sangre_rh = ttsr.id_tipo_sangre_rh INNER JOIN tbl_nivel_academico AS tna ON tu.id_nivel_academico = tna.id_nivel_academico 
             INNER JOIN tbl_eps AS teps ON tu.id_eps = teps.id_eps INNER JOIN tbl_sucursal AS tsu ON tu.id_sucursal = tsu.id_sucursal INNER JOIN tbl_cesantia AS tces ON tu.id_cesantia = tces.id_cesantia INNER JOIN tbl_seccion AS tsec ON tu.id_seccion = tsec.id_seccion 
             INNER JOIN tbl_area AS tar ON tu.id_area = tar.id_area INNER JOIN tbl_cargo AS tcar ON tu.id_cargo = tcar.id_cargo INNER JOIN tbl_clase_riesgo AS tcr ON tu.id_clase_riesgo = tcr.id_clase_riesgo INNER JOIN tbl_pension AS tpen ON tu.id_pension = tpen.id_pension 
             INNER JOIN tbl_tipo_dotacion AS tpdo ON tu.id_tipo_dotacion = tpdo.id_tipo_dotacion " . " WHERE id_usuario !='' " . $camisa . " " . $pantalon . " " . $zapato . " " . $genero . " " . $sucursal . " " . $tipo_dotacion;
             /* INNER JOIN tbl_camisa AS tca ON tu.id_camisa = tca.id_camisa INNER JOIN tbl_pantalon AS tpan ON tu.id_pantalon = tpan.id_pantalon INNER JOIN tbl_zapato AS tza ON tu.id_zapato = tza.id_zapato INNER JOIN tbl_otra_vestimenta AS tov ON tu.id_vestimenta = tov.id_vestimenta */
            $rs = $cnx->query($sql);

            
            
            
            while ($row = $rs->fetch()) {

                $lista[$i] = new UsuarioDTO();
                $lista[$i]->constructorUsuarioDotacion(
                    $row['id_usuario'],
                    $row['tipo_documento'],
                    $row['fecha_expedicion'],
                    $row['lugar_expedicion'],
                    $row['nombre'],
                    $row['apellido'],
                    $row['telefono_fijo'],
                    $row['telefono_movil'],
                    $row['tipo_casa'],
                    $row['estrato'],
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
                    
                    $row['cesantia'],
                    $row['salario'],
                    $row['valor_dia'],
                    $row['valor_hora'],
                    $row['motivo_retiro'],
                    $row['fecha_actual'],
                    $row['antiguedad'],
                    $row['area'],
                    $row['seccion'],
                    $row['cargo'],
                    $row['clase_riesgo'],
                    $row['pension'],
                    $row['tipo_dotacion'],
                    $row['estado'],
                    "",
                    "",
                   "",
                    $row['id_vestimenta'],
                    $row[$talla],
                    "",
                    ""
                );

            
                $i++;
            }

            return $lista;

        } catch (Exception $e) {
            print "Error al traer los datos de los usuarios " . $e->getMessage();
        }

        return null;
    }

    // Listado de empleados por varios filtros

    public function listaUsuarioFiltroHijos($id_usuario, $tipo_documento, $tipo_vivienda, $estrato, $genero, $lugar_residencia, $nivel_academico, $estado_civil, $eps, $tipo_sangre_rh, $sucursal, $tipo_contrato, $cesantia, $clase_riesgo, $seccion, $area, $cargo, $pension, $tipo_dotacion, $estado, $salarioF, $fechaF) {
        $cnx = Conexion::conectar();
        $usuariodto = null;

        
        try {
            $sql = "SELECT * FROM tbl_hijo AS thj INNER JOIN tbl_usuario AS tu ON thj.id_usuario = tu.id_usuario INNER JOIN tbl_tipo_documento AS ttd ON tu.id_tipo_documento = ttd.id_tipo_documento INNER JOIN tbl_tipo_contrato AS ttc ON tu.id_tipo_contrato = ttc.id_tipo_contrato INNER JOIN tbl_perfil AS tp ON tu.id_perfil = tp.id_perfil
             INNER JOIN tbl_estado AS te ON tu.id_estado = te.id_estado INNER JOIN tbl_casa AS tc ON tu.id_casa = tc.id_casa 
             INNER JOIN tbl_genero AS tg ON tu.id_genero = tg.id_genero INNER JOIN tbl_lugar_residencia AS tls ON tu.id_lugar_residencia = tls.id_lugar_residencia 
             INNER JOIN tbl_estado_civil AS tec ON tu.id_estado_civil = tec.id_estado_civil INNER JOIN tbl_tipo_sangre_rh AS ttsr ON tu.id_tipo_sangre_rh = ttsr.id_tipo_sangre_rh INNER JOIN tbl_nivel_academico AS tna ON tu.id_nivel_academico = tna.id_nivel_academico 
             INNER JOIN tbl_eps AS teps ON tu.id_eps = teps.id_eps INNER JOIN tbl_sucursal AS tsu ON tu.id_sucursal = tsu.id_sucursal INNER JOIN tbl_cesantia AS tces ON tu.id_cesantia = tces.id_cesantia INNER JOIN tbl_seccion AS tsec ON tu.id_seccion = tsec.id_seccion 
             INNER JOIN tbl_area AS tar ON tu.id_area = tar.id_area INNER JOIN tbl_cargo AS tcar ON tu.id_cargo = tcar.id_cargo INNER JOIN tbl_clase_riesgo AS tcr ON tu.id_clase_riesgo = tcr.id_clase_riesgo INNER JOIN tbl_pension AS tpen ON tu.id_pension = tpen.id_pension 
             INNER JOIN tbl_tipo_dotacion AS tpdo ON tu.id_tipo_dotacion = tpdo.id_tipo_dotacion WHERE thj.id_usuario = '". $id_usuario . "' " . $tipo_documento . " " . $tipo_vivienda . " " . $estrato . " " . $genero . " " . $lugar_residencia . " " . $nivel_academico . " " . $estado_civil .
             " " . $eps . " " . $tipo_sangre_rh . " " . $sucursal . " " . $tipo_contrato . " " . $cesantia . " " . $clase_riesgo . " " . $seccion . " " . $area . " " . $cargo . " " . $pension . " " . $tipo_dotacion . " " . $estado . " " . $salarioF . " " . $fechaF;
             /* INNER JOIN tbl_camisa AS tca ON tu.id_camisa = tca.id_camisa INNER JOIN tbl_pantalon AS tpan ON tu.id_pantalon = tpan.id_pantalon INNER JOIN tbl_zapato AS tza ON tu.id_zapato = tza.id_zapato INNER JOIN tbl_otra_vestimenta AS tov ON tu.id_vestimenta = tov.id_vestimenta */
            $rs = $cnx->query($sql);
            
            
            $cant_filas = $rs->rowCount() * -1;   
            

            $usuariodto = new UsuarioDTO();
            $usuariodto->setHijos($cant_filas);

            return $usuariodto;

        } catch (Exception $e) {
            print "Error al traer los datos de los usuarios " . $e->getMessage();
        }

        return null;
    }

    

    // Traer datos de la tabla ingresada

    public function datosTabla($tabla, $campo) {

        $cnx = Conexion::conectar();
        $lista = array();

        try {
            $sql = "SELECT * FROM " . $tabla . " ORDER BY " . $campo;
            $rs = $cnx->query($sql);
            $i = 0;
            while ($row = $rs->fetch()) {
                $lista[$i] = new UsuarioDTO();
                $lista[$i]->constructorTabla(
                    $row[0],
                    $row[1]
                );

                $i++;
            }
          
            return $lista;

        } catch (Exception $ex) {
            echo "Error al traer los datos de la tabla: " . $tabla . " - " . $ex->getMessage();
        }

        return null;

    }

    // Actualizar actomaticamanete la edad, antiguedad y fecha actual

    public function actualizarDatosAuto($id_usuario, $fecha_actual, $antiguedad, $edad) {

        $cnx = Conexion::conectar();

        echo $edad;
        
        try {
            $sql = "UPDATE tbl_usuario SET fecha_actual = '" . $fecha_actual . "', antiguedad = '" . $antiguedad . "', edad = '" . $edad . "' WHERE id_usuario = '" . $id_usuario . "'";  
            $ps = $cnx->prepare($sql);

            $ps->execute();

            return true;
            
        }catch (Exception $ex) {
            echo "Error al actualizar los datos automaticamente " . $ex->getMessage();
        }

        return false;

    }


    // ================================= Registro de Dotaciones ============================

    // --------------- Camisa ----------------


    public function asignarCamisa($usuariodto) {


        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_usuario SET id_camisa = ? WHERE id_usuario = '" . $usuariodto->getId_usuario() . "'";
            $ps = $cnx->prepare($sql);
            
            $camisa = $usuariodto->getCamisa();

            $ps->bindParam(1, $camisa);

            $ps->execute();

            return true;

        } catch (Exception $e) {
            echo "Error al asignar una camisa al empleado ". $e->getMessage();
        }
    }

    // --------------- Pantalón ----------------


    public function asignarPantalon($usuariodto) {


        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_usuario SET id_pantalon = ? WHERE id_usuario = '" . $usuariodto->getId_usuario() . "'";
            $ps = $cnx->prepare($sql);
            
            $pantalon = $usuariodto->getPantalon();

            $ps->bindParam(1, $pantalon);

            $ps->execute();

            return true;

        } catch (Exception $e) {
            echo "Error al asignar un pantalón al empleado ". $e->getMessage();
        }
    }

    // --------------- Zapato ----------------


    public function asignarZapato($usuariodto) {


        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_usuario SET id_zapato = ? WHERE id_usuario = '" . $usuariodto->getId_usuario() . "'";
            $ps = $cnx->prepare($sql);
            
            $zapato = $usuariodto->getZapato();

            $ps->bindParam(1, $zapato);

            $ps->execute();

            return true;

        } catch (Exception $e) {
            echo "Error al asignar un zapato al empleado ". $e->getMessage();
        }
    }

    // --------------- Vestimenta ----------------


    public function asignarVestimenta($usuariodto) {


        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_usuario SET id_vestimenta = ? WHERE id_usuario = '" . $usuariodto->getId_usuario() . "'";
            $ps = $cnx->prepare($sql);
            
            $vestimenta = $usuariodto->getVestimenta();

            $ps->bindParam(1, $vestimenta);

            $ps->execute();

            return true;

        } catch (Exception $e) {
            echo "Error al asignar una vestimenta al empleado ". $e->getMessage();
        }
    }


    // Eliminar toda la dotación de un empleado

    public function eliminarTodaDotacion($id_usuario) {

        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_usuario SET id_camisa = NULL, id_pantalon = NULL, id_zapato = NULL, id_vestimenta = NULL WHERE id_usuario = '" . $id_usuario . "'";
            $ps = $cnx->prepare($sql);

            $ps->execute();

            return true;
        } catch (Exception $ex) {
            echo "Error al eliminar toda a dotacion del empleado" . $ex->getMessage();
        }

        return false;

    }


    // Eliminar camisa del empleado

    public function eliminarCamisaEmpleado($id_usuario) {

        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_usuario SET id_camisa = NULL WHERE id_usuario = '" . $id_usuario . "'";
            $ps = $cnx->prepare($sql);

            $ps->execute();

            return true;
        } catch (Exception $ex) {
            print "Error al eliminar la camisa del empleado";
        }
        
        return false;

    }

    // Eliminar pantalón del empleado

    public function eliminarPantalonEmpleado($id_usuario) {

        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_usuario SET id_pantalon = NULL WHERE id_usuario = '" . $id_usuario . "'";
            $ps = $cnx->prepare($sql);

            $ps->execute();

            return true;
        } catch (Exception $ex) {
            print "Error al eliminar el pantalón del empleado" . $ex->getMessage();
        }
        
        return false;

    }

    // Eliminar zapato del empleado

    public function eliminarZapatoEmpleado($id_usuario) {

        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_usuario SET id_zapato = NULL WHERE id_usuario = '" . $id_usuario . "'";
            $ps = $cnx->prepare($sql);

            $ps->execute();

            return true;
        } catch (Exception $ex) {
            print "Error al eliminar el zapato del empleado" . $ex->getMessage();
        }
        
        return false;

    }

    // Eliminar zapato del empleado

    public function eliminarVestimentaEmpleado($id_usuario) {

        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_usuario SET id_vestimenta = NULL WHERE id_usuario = '" . $id_usuario . "'";
            $ps = $cnx->prepare($sql);

            $ps->execute();

            return true;
        } catch (Exception $ex) {
            print "Error al eliminar la vestimenta del empleado" . $ex->getMessage();
        }
        
        return false;

    }

    // Asignar cantidad de camisas

    public function asignarCantidadCamisas($usuariodto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_usuario SET cant_camisa = ? WHERE id_usuario = '" . $usuariodto->getId_usuario() . "'";
            $ps = $cnx->prepare($sql);

            $cant_camisa = $usuariodto->getCant_camisa();


            $ps->bindParam(1, $cant_camisa);

            $ps->execute();

            return true;

        } catch (Exception $ex) {
            print "Error al asignar la cantidad de camisas a un empleado " . $ex->getMessage();
        }
        
        return false;

    }

    // Asignar cantidad de pantalones

    public function asignarCantidadPantalones($usuariodto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_usuario SET cant_pantalon = ? WHERE id_usuario = '" . $usuariodto->getId_usuario() . "'";
            $ps = $cnx->prepare($sql);

            $cant_pantalon = $usuariodto->getCant_pantalon();

            $ps->bindParam(1, $cant_pantalon);

            $ps->execute();

            return true;

        } catch (Exception $ex) {
            print "Error al asignar la cantidad de pantalones a un empleado " . $ex->getMessage();
        }
        
        return false;

    }


    // Asignar cantidad de zapatos

    public function asignarCantidadZapatos($usuariodto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_usuario SET cant_zapato = ? WHERE id_usuario = '" . $usuariodto->getId_usuario() . "'";
            $ps = $cnx->prepare($sql);

            $cant_zapato = $usuariodto->getCant_zapato();

            $ps->bindParam(1, $cant_zapato);

            $ps->execute();

            return true;

        } catch (Exception $ex) {
            print "Error al asignar la cantidad de zapatos a un empleado " . $ex->getMessage();
        }
        
        return false;

    }

    // Asignar cantidad de otros

    public function asignarCantidadVestimenta($usuariodto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_usuario SET cant_vestimenta = ? WHERE id_usuario = '" . $usuariodto->getId_usuario() . "'";
            $ps = $cnx->prepare($sql);

            $cant_vestimenta = $usuariodto->getVestimenta();

            $ps->bindParam(1, $cant_vestimenta);

            $ps->execute();

            return true;

        } catch (Exception $ex) {
            print "Error al asignar la cantidad de vestimentas a un empleado " . $ex->getMessage();
        }
        
        return false;

    }

}