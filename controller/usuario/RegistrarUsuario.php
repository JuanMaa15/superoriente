<?php

require ("../../config/correo/CorreoRecuperarClave.php");

require_once ("../../models/DAO/UsuarioDAO.php");
require_once ("../../models/DAO/HistorialContratoDAO.php");
require_once ("../../models/DAO/HistorialCargoDAO.php");
require_once ("../../models/DAO/FamiliarDAO.php");
require_once ("../../models/DAO/HijoDAO.php");

// -------------- Datos personales
$id_usuario = $_POST['id_usuario'];
$tipo_documento = intval($_POST['tipo_documento']);
$fecha_expedicion = $_POST['fecha_expedicion'];
$lugar_expedicion = $_POST['lugar_expedicion']; 
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono_fijo = $_POST['telefono_fijo'];
$telefono_movil = $_POST['telefono_movil'];
$tipo_casa = $_POST['tipo_casa'];
$estrato = $_POST['estrato'];
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
$perfil = $_POST['perfil'];
$nombre_persona_emergencia = $_POST['nombre_persona_emergencia']; 
$telefono_emergencia = $_POST['telefono_emergencia'];
$celular_emergencia = $_POST['celular_emergencia'];
$parentesco_emergencia = $_POST['parentesco_emergencia'];

// foto

/* $imagen = $_FILES['foto'];

$nombre_imagen = $imagen['name'];
$tipo_imagen = $imagen['type']; */

// -------------------- Datos Laborales

$sucursal = $_POST['sucursal'];
$tipo_contrato = intval($_POST['tipo_contrato']);
$fecha_ingreso = $_POST['fecha_ingreso'];
$fecha_retiro = $_POST['fecha_retiro'];
$motivo_retiro = $_POST['motivo_retiro'];
$cesantia = intval($_POST['cesantia']);
$salario = floatval($_POST['salario']); 
$valor_dia = floatval($_POST['valor_dia']);
$valor_hora = floatval($_POST['valor_hora']);
$clase_riesgo = intval($_POST['clase_riesgo']);
$area = $_POST['area'];
$seccion = $_POST['seccion'];
$cargo = $_POST['cargo'];
$pension = $_POST['pension'];
$tipo_dotacion = intval($_POST['tipo_dotacion']);
$talla_camisa = $_POST['talla_camisa'];
$talla_pantalon = $_POST['talla_pantalon'];
$talla_zapato = $_POST['talla_zapato'];
$estado = $_POST['estado'];
$perfil = $_POST['perfil'];

// ----------------- Datos familiares

if (isset($_POST['id_familiar'])) {
    $id_familiar = $_POST['id_familiar'];
    $nombre_familiar = $_POST['nombre_familiar'];
    $apellido_familiar = $_POST['apellido_familiar'];
    $edad_familiar = $_POST['edad_familiar'];
    $escolaridad_familiar = $_POST['escolaridad_familiar'];
    $parentesco_familiar = $_POST['parentesco_familiar'];
}


// -------------- Datos hijos
if (isset($_POST['nombre_hijo'])) {
    $nombre_hijo = $_POST['nombre_hijo'];
    $apellido_hijo  =$_POST['apellido_hijo'];
    $edad_hijo = $_POST['edad_hijo'];
    $fecha_nacimiento_hijo = $_POST['fecha_nacimiento_hijo'];
}


// -------------------------- validar datos (condicional if)

if (!empty($id_usuario) && !empty($tipo_documento) && !empty($fecha_expedicion) && !empty($lugar_expedicion)
    && !empty($nombre) && !empty($apellido) && !empty($tipo_casa) && !empty($genero) && !empty($fecha_nacimiento) && !empty($edad)
    && !empty($estado_civil) && !empty($eps) && !empty($nro_cuenta) && !empty($tipo_sangre) && !empty($correo)
    && !empty($password) && !empty($sucursal) && !empty($tipo_contrato) && !empty($fecha_ingreso) && !empty($cesantia)
    && !empty($salario) && !empty($valor_dia) && !empty($valor_hora) && !empty($area) && !empty($seccion)&& !empty($cargo)
    && !empty($clase_riesgo) && !empty($tipo_dotacion) && !empty($estado) && !empty($perfil)) {

        $usuariodao = new UsuarioDAO();
    
        $resultadoCorreo = $usuariodao->verificarCorreoBd($correo);

        if (!$resultadoCorreo) {

             // Datos del usuario

            $usuariodto = new UsuarioDTO();
            $historialContratodto = new HistorialContratoDTO();
            $historialCargodto = new HistorialCargoDTO();

            $usuariodto->setId_usuario($id_usuario);
            $usuariodto->setTipo_documento($tipo_documento);
            $usuariodto->setFecha_expedicion($fecha_expedicion);
            $usuariodto->setLugar_expedicion($lugar_expedicion);
            $usuariodto->setNombre($nombre);
            $usuariodto->setApellido($apellido);
            $usuariodto->setTelefono_fijo($telefono_fijo);
            $usuariodto->setTelefono_movil($telefono_movil);
            $usuariodto->setTipo_casa($tipo_casa);
            $usuariodto->setEstrato($estrato);
            $usuariodto->setGenero($genero);
            $usuariodto->setFecha_nacimiento($fecha_nacimiento);
            $usuariodto->setEdad($edad);
            $usuariodto->setDireccion($direccion);
            $usuariodto->setLugar_residencia($lugar_residencia);
            $usuariodto->setNivel_academico($nivel_academico);
            $usuariodto->setArea_academica($area_academica);
            $usuariodto->setEstado_civil($estado_civil);
            $usuariodto->setEps($eps);
            $usuariodto->setNro_cuenta($nro_cuenta);
            $usuariodto->setTipo_sangre($tipo_sangre);
            $usuariodto->setAntecedentes($antecedentes);
            $usuariodto->setPractica_deporte($practica_deporte);
            $usuariodto->setConsumo_cigarros($consumo_cigarros);
            $usuariodto->setConsumo_licor($consumo_licor);
            $usuariodto->setConsumo_spa($consumo_spa);
            $usuariodto->setCorreo($correo);
            $usuariodto->setPassword($password);
            $usuariodto->setPerfil($perfil);
            $usuariodto->setNombre_persona_emergencia($nombre_persona_emergencia);
            $usuariodto->setTelefono_emergencia($telefono_emergencia);
            $usuariodto->setCelular_emergencia($celular_emergencia);
            $usuariodto->setParentesco_emergencia($parentesco_emergencia);

            $usuariodto->setSucursal($sucursal);
            $usuariodto->setTipo_contrato($tipo_contrato);
            $usuariodto->setFecha_ingreso($fecha_ingreso);
            $usuariodto->setFecha_retiro($fecha_retiro);
            $usuariodto->setMotivo_retiro($motivo_retiro);
            $usuariodto->setCesantia($cesantia);
            $usuariodto->setSalario($salario);
            $usuariodto->setValor_dia($valor_dia);
            $usuariodto->setValor_hora($valor_hora);
            $usuariodto->setClase_riesgo($clase_riesgo);
            $usuariodto->setArea($area);
            $usuariodto->setSeccion($seccion);
            $usuariodto->setCargo($cargo);
            $usuariodto->setPension($pension);
            $usuariodto->setTipo_dotacion($tipo_dotacion);
            $usuariodto->setTalla_camisa($talla_camisa);
            $usuariodto->setTalla_pantalon($talla_pantalon);
            $usuariodto->setTalla_zapato($talla_zapato);


            // ---------------------

            $historialContratodto->setUsuario($id_usuario);
            $historialContratodto->setTipo_contrato($tipo_contrato);
            $historialContratodto->setFecha_inicio($fecha_ingreso);
            $historialContratodto->setFecha_fin($fecha_retiro);

            $historialContratodao = new HistorialContratoDAO();

            // ------------ Registrar historial cargo ------

            $historialCargodto->setUsuario($id_usuario);
            $historialCargodto->setCargo($cargo);
            
            $historialCargodao = new HistorialCargoDAO();

            /* if ($tipo_imagen == "image/jpg" || $tipo_imagen == "image/jpeg" || $tipo_imagen == "image/png" || $tipo_imagen == "image/gif") {

                if (!is_dir("view/img")) {
                    mkdir("img", 0777);


                }else{
                    move_uploaded_file($archivo['tmp_name'], 'view/img/'. $nombre);

                    $usuariodto->setFoto('../img/'. $nombre);
            
                    header("Refresh: 5; URL=index.php ");
                    echo "Imagen subida correctamente";
                }
            
            }else{
                header("Refresh: 5; URL=index.php");
                echo "Sube una imagen con un formato correcto, por favor";
            } */
            

            $resultado = $usuariodao->registrarUsuario($usuariodto);
            $resultado3 = $historialContratodao->registrarHistorialContrato($historialContratodto);
            $resultado4 = $historialCargodao->registrarHistorialCargo($historialCargodto);
            // Datos de los familiares
            
            $familiardto = new FamiliarDTO();

            if (isset($id_familiar)) {
                for ($i=0; $i < count($id_familiar); $i++) { 
                    if (!empty($id_familiar[$i]) && !empty($nombre_familiar[$i])) {
                        $familiardto->setId_familiar($id_familiar[$i]);
                        $familiardto->setNombre($nombre_familiar[$i]);
                        $familiardto->setApellido($apellido_familiar[$i]);
                        $familiardto->setEdad($edad_familiar[$i]);
                        $familiardto->setEscolaridad($escolaridad_familiar[$i]);
                        $familiardto->setParentesco($parentesco_familiar[$i]);
                        $familiardto->setUsuario($id_usuario);
                
                        $familiardao = new FamiliarDAO();
                        $familiardao->registrarFamiliar($familiardto);
                    }
                }
            }
            
            
            

            // Datos de los hijos 

            $hijodto = new HijoDTO();

            if (isset($nombre_hijo)) {
                for ($i=0; $i < count($nombre_hijo); $i++) { 
                    if (!empty($nombre_hijo[$i])) {
                        $hijodto->setNombre($nombre_hijo[$i]);
                        $hijodto->setApellido($apellido[$i]);
                        $hijodto->setEdad($edad_hijo[$i]);
                        $hijodto->setFecha_nacimiento($fecha_nacimiento_hijo[$i]);
                        $hijodto->setUsuario($id_usuario);
                        
                        $hijodao = new HijoDAO();
                        $hijodao->registrarHijo($hijodto);
                    }
                }
            }


            $correoRecuperacion = new CorreoRecuperacion();

            $asunto = utf8_decode("Bienvenido a la nueva apliacación web de Superoriente");
            $mensaje = "<html><body>Hola, " . $nombre . " te damos la bienvenida a la página de superoriente donde podras realizar diferentes actividades para facilitar la información que solicites <a href='http://localhost:8081/proyecto carta laboral/Desarrollo'>Superoriente</a></body></html>"; 
            $mensaje .= "<div><p>El usuario es tu correo personal y la contraseña es tu número de documento</p></div>";
            $mensaje .= "<div><p>Cualquier inquietud comunicarse al: 302243424</p></div>";
            $mensaje .= "<div><p>Gracias</p></div>"; 

          $resultado2 = $correoRecuperacion->correoRecuperarClave($correo, $asunto, $mensaje, $nombre);
            

            


            if ($resultado2 && $resultado && $resultado3 && $resultado4) {
                echo "<div class='alert alert-success' role='alert'>Perfecto!!  Se ha registrado el usuario</div>";

            }else{
                echo "<div class='alert alert-danger' role='alert'>Error! No se pudo registrar el usuario</div>";
            }

        }else{
            echo "<div class='alert alert-danger' role='alert'>Error! No se pudo registrar el usuario (Verifica que no hayan campos incorrectos)</div>";
        }



   



 }else{

    print "No se pudo registrar el usuario: Algunos campos importantes están vacíos <br>";

    echo "Id_usuario : ". $id_usuario ."<br>" . "Tipo de documento : ". $tipo_documento ."<br>" . "Fecha de expedicion : ". $fecha_expedicion ."<br>" .
    "lugar de expedicion : ". $lugar_expedicion ."<br>" . "nombre : ". $nombre ."<br>" . "Apellido : ". $apellido ."<br>" . "Tipo de casa : ". $tipo_casa ."<br>" .
    "Genero : ". $genero ."<br>" . "edad : ". $edad ."<br>" . "estado_civil : ". $estado_civil ."<br>" . "EPS : ". $eps ."<br>" . "Nro de cuenta : ". $nro_cuenta ."<br>" .
    "Tipo de sangre : ". $tipo_sangre ."<br>" . "correo : ". $correo ."<br>" . "Contraseña : ". $password ."<br>" . "Sucursal : ". $sucursal ."<br>" .
    "Tipo de contrato : ". $tipo_contrato ."<br>" . "fecha de ingreso : ". $fecha_ingreso ."<br>" . "Salario : ". $salario ."<br>" . "Valor día : ". $valor_dia ."<br>" .
    "Valor hora : ". $valor_hora ."<br>" . "Area : ". $area ."<br>" . "seccion : ". $seccion ."<br>" . "Cargo : ". $cargo ."<br>" . "Estado : ". $estado ."<br>" .
    "Perfil : ". $perfil ."<br>";

    //echo "<br>" . $id_familiar. " " . $nombre_familiar;
 }

