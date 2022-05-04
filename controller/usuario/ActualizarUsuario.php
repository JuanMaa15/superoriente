<?php


require_once ("../../models/DAO/UsuarioDAO.php");
require_once ("../../models/DTO/UsuarioDTO.php");


switch ($_POST['opc']) {
    case 'personales':

        // -------------- Datos personales -------------
        $id_usuario = $_POST['id_usuario'];
        $tipo_documento = intval($_POST['tipo_documento']);
        $fecha_expedicion = $_POST['fecha_expedicion'];
        $lugar_expedicion = $_POST['lugar_expedicion']; 
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono_fijo = $_POST['telefono_fijo'];
        $telefono_movil = $_POST['telefono_movil'];
        $estrato = $_POST['estrato'];
        $tipo_casa = $_POST['tipo_casa'];
        $genero = $_POST['genero'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $edad = $_POST['edad'];
        $direccion = $_POST['direccion'];
        $lugar_residencia = $_POST['lugar_residencia'];
        $nivel_academico = $_POST['nivel_academico'];
        $area_academica = $_POST['area_academica'];
        $estado_civil = intval($_POST['estado_civil']);
        $eps = $_POST['eps'];
        $nro_cuenta = $_POST['nro_cuenta'];
        $tipo_sangre = intval($_POST['tipo_sangre']);
        $antecedentes = $_POST['antecedentes'];
        $practica_deporte = $_POST['practica_deporte'];
        $consumo_cigarros = $_POST['consumo_cigarros'];
        $consumo_licor = $_POST['consumo_licor'];
        $consumo_spa = $_POST['consumo_spa'];
        $correo = $_POST['correo'];
        $password = $_POST['password'];
        $nombre_persona_emergencia = $_POST['nombre_persona_emergencia']; 
        $telefono_emergencia = $_POST['telefono_emergencia'];
        $celular_emergencia = $_POST['celular_emergencia'];
        $parentesco_emergencia = $_POST['parentesco_emergencia'];
    

        if (!empty($id_usuario) && !empty($tipo_documento) && !empty($fecha_expedicion) && !empty($lugar_expedicion)
        && !empty($nombre) && !empty($apellido) && !empty($tipo_casa) && !empty($genero) && !empty($fecha_nacimiento) && !empty($edad)
        && !empty($estado_civil) && !empty($eps) && !empty($nro_cuenta) && !empty($tipo_sangre) && !empty($correo)
        && !empty($password)) {
        
            
            echo $estrato;

            // Datos del usuario

            $usuariodto = new UsuarioDTO();

            $usuariodto->setId_usuario($id_usuario);
            $usuariodto->setTipo_documento($tipo_documento);
            $usuariodto->setFecha_expedicion($fecha_expedicion);
            $usuariodto->setLugar_expedicion($lugar_expedicion);
            $usuariodto->setNombre($nombre);
            $usuariodto->setApellido($apellido);
            $usuariodto->setTelefono_fijo($telefono_fijo);
            $usuariodto->setTelefono_movil($telefono_movil);
            $usuariodto->setEstrato($estrato);
            $usuariodto->setTipo_casa($tipo_casa);
            $usuariodto->setGenero($genero);
            $usuariodto->setFecha_nacimiento($fecha_nacimiento);
            $usuariodto->setEdad($edad);
            $usuariodto->setNivel_academico($nivel_academico);
            $usuariodto->setArea_academica($area_academica);
            $usuariodto->setEstado_civil($estado_civil);
            $usuariodto->setEps($eps);
            $usuariodto->setNro_cuenta($nro_cuenta);
            $usuariodto->setTipo_sangre($tipo_sangre);
            $usuariodto->setLugar_residencia($lugar_residencia);
            $usuariodto->setDireccion($direccion);
            $usuariodto->setAntecedentes($antecedentes);
            $usuariodto->setPractica_deporte($practica_deporte);
            $usuariodto->setConsumo_cigarros($consumo_cigarros);
            $usuariodto->setConsumo_licor($consumo_licor);
            $usuariodto->setConsumo_spa($consumo_spa);
            $usuariodto->setCorreo($correo);
            $usuariodto->setPassword($password);
            $usuariodto->setNombre_persona_emergencia($nombre_persona_emergencia);
            $usuariodto->setTelefono_emergencia($telefono_emergencia);
            $usuariodto->setCelular_emergencia($celular_emergencia);
            $usuariodto->setParentesco_emergencia($parentesco_emergencia);

        


            $usuariodao = new UsuarioDAO();

            $resultado = $usuariodao->actualizarDatosPersonales($usuariodto);

            if ($resultado) {
                echo "<div class='alert alert-success' role='alert'>Perfecto!!  Se ha actualizado los datos personales del usuario</div>";

            }else{
                echo "<div class='alert alert-danger' role='alert'>Error! No se pudo actualizar los datos personales del usuario</div>";
            }



        }else{
            echo "Algunos campos importantes están vacíos";
        }

        
    break;
    
    case 'laborales':
        
        $id_usuario = $_POST['id_usuario'];
        $sucursal = $_POST['sucursal'];
        $tipo_contrato = intval($_POST['tipo_contrato']);
        $fecha_ingreso = $_POST['fecha_ingreso'];
        $fecha_retiro = $_POST['fecha_retiro'];
        $motivo_retiro = $_POST['motivo_retiro'];
        $salario = floatval($_POST['salario']); 
        $valor_dia = floatval($_POST['valor_dia']);
        $valor_hora = floatval($_POST['valor_hora']);
        $clase_riesgo = $_POST['clase_riesgo']; 
        $area = $_POST['area'];
        $seccion = $_POST['seccion'];
        $cargo = $_POST['cargo'];
        $pension = $_POST['pension'];
        $estado = $_POST['estado'];
        $cesantia = $_POST['cesantia'];
        $perfil = $_POST['perfil'];
        $tipo_dotacion = $_POST['tipo_dotacion'];
        $talla_camisa = $_POST['talla_camisa'];
        $talla_pantalon = $_POST['talla_pantalon'];
        $talla_zapato = $_POST['talla_zapato'];

        if (!empty($id_usuario) && !empty($sucursal) && !empty($tipo_contrato) && !empty($fecha_ingreso) && !empty($salario)
        && !empty($valor_dia) && !empty($valor_hora) && !empty($area) && !empty($seccion) && !empty($cargo) && !empty($estado)) {

            $usuariodto = new UsuarioDTO();

            $usuariodto->setId_usuario($id_usuario);
            $usuariodto->setSucursal($sucursal);
            $usuariodto->setTipo_contrato($tipo_contrato);
            $usuariodto->setFecha_ingreso($fecha_ingreso);
            $usuariodto->setFecha_retiro($fecha_retiro);
            $usuariodto->setMotivo_retiro($motivo_retiro);
            $usuariodto->setSalario($salario);
            $usuariodto->setValor_dia($valor_dia);
            $usuariodto->setValor_hora($valor_hora);
            $usuariodto->setClase_riesgo($clase_riesgo);
            $usuariodto->setArea($area);
            $usuariodto->setSeccion($seccion);
            $usuariodto->setCargo($cargo);
            $usuariodto->setPension($pension);
            $usuariodto->setEstado($estado);
            $usuariodto->setCesantia($cesantia);
            $usuariodto->setPerfil($perfil);
            $usuariodto->setTipo_dotacion($tipo_dotacion);
            $usuariodto->setTalla_camisa($talla_camisa);
            $usuariodto->setTalla_pantalon($talla_pantalon);
            $usuariodto->setTalla_zapato($talla_zapato);

            $usuariodao = new UsuarioDAO();

            $resultado = $usuariodao->actualizarDatosLaborales($usuariodto);

            if ($resultado) {
                echo "<div class='alert alert-success' role='alert'>Perfecto!!  Se ha actualizado los datos laborales del usuario</div>";

            }else{
                echo "<div class='alert alert-danger' role='alsert'>Error! No se pudo actualizar los datos laborales del usuario</div>";
            }

        }else{
            echo "Algunos campos importantes están vacíos";
        }
     break;
}





