<?php


class UsuarioDTO {

    // Variables para traer los datos de otra tabla
    private $id_campo;
    private $nombre_campo;
    // -------

    private $hijos;

    private $tipo_camisa;
    private $tipo_pantalon;
    private $tipo_zapato;

    // Variables de los campos del usuario

    private $id_usuario;
    private $tipo_documento;
    private $fecha_expedicion;
    private $lugar_expedicion;
    private $nombre;
    private $apellido;
    private $telefono_fijo;
    private $telefono_movil;
    private $tipo_casa;
    private $estrato;
    private $genero;
    private $fecha_nacimiento;
    private $edad;
    private $direccion;
    private $lugar_residencia;
    private $nivel_academico;
    private $area_academica;
    private $estado_civil;
    private $eps;
    private $nro_cuenta;
    private $tipo_sangre;
    private $antecedentes;
    private $practica_deporte;
    private $consumo_cigarros;
    private $consumo_licor;
    private $consumo_spa;
    private $correo;
    private $password;
    private $perfil;
    private $nombre_persona_emergencia;
    private $telefono_emergencia;
    private $celular_emergencia;
    private $parentesco_emergencia;
    private $foto;
    
    private $sucursal;
    private $tipo_contrato;
    private $fecha_ingreso;
    private $fecha_retiro;
    private $motivo_retiro;
    private $fecha_actual;
    private $antiguedad;
    private $cesantia;
    private $salario;
    private $valor_dia;
    private $valor_hora;
    private $area;
    private $seccion;
    private $cargo;
    private $clase_riesgo;
    private $pension;
    private $tipo_dotacion;
    private $talla_camisa;
    private $talla_pantalon;
    private $talla_zapato;
    private $estado;
    private $camisa;
    private $pantalon;
    private $zapato;
    private $vestimenta;    

    private $cant_camisa;
    private $cant_pantalon;
    private $cant_zapato;
    private $cant_vestimenta;

    function __construct() {
        
    }

    function constructorUsuarioDotacion($id_usuario, $tipo_documento, $fecha_expedicion, $lugar_expedicion, $nombre, $apellido, $telefono_fijo, $telefono_movil, $tipo_casa, $estrato, $genero, $fecha_nacimiento, $edad, $direccion, $lugar_residencia, $nivel_academico, $area_academica, $estado_civil, $eps, $nro_cuenta, $tipo_sangre, $antecedentes, $practica_deporte, $consumo_cigarros, $consumo_licor, $consumo_spa, $correo, $password, $perfil, $nombre_persona_emergencia, $telefono_emergencia, $celular_emergencia, $parentesco_emergencia, $sucursal, $tipo_contrato, $fecha_ingreso, $fecha_retiro, $motivo_retiro, $salario, $valor_dia, $valor_hora, $fecha_actual, $antiguedad, $cesantia, $area, $seccion, $cargo, $clase_riesgo, $pension, $tipo_dotacion, $estado, $camisa, $pantalon, $zapato, $vestimenta, $talla_camisa, $talla_pantalon, $talla_zapato) {
        $this->id_usuario = $id_usuario;
        $this->tipo_documento = $tipo_documento;
        $this->fecha_expedicion = $fecha_expedicion;
        $this->lugar_expedicion = $lugar_expedicion;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->telefono_fijo = $telefono_fijo;
        $this->telefono_movil = $telefono_movil;
        $this->tipo_casa = $tipo_casa;
        $this->estrato = $estrato;
        $this->genero = $genero;
        $this->fecha_nacimiento = $fecha_nacimiento;
        $this->edad = $edad;
        $this->direccion = $direccion;
        $this->lugar_residencia = $lugar_residencia;
        $this->nivel_academico = $nivel_academico;
        $this->area_academica = $area_academica;
        $this->estado_civil = $estado_civil;
        $this->eps = $eps;
        $this->nro_cuenta = $nro_cuenta;
        $this->tipo_sangre = $tipo_sangre;
        $this->antecedentes = $antecedentes;
        $this->practica_deporte = $practica_deporte;
        $this->consumo_cigarros = $consumo_cigarros;
        $this->consumo_licor = $consumo_licor;
        $this->consumo_spa = $consumo_spa;
        $this->correo = $correo;
        $this->password = $password;
        $this->perfil = $perfil;
        $this->nombre_persona_emergencia = $nombre_persona_emergencia;
        $this->telefono_emergencia = $telefono_emergencia;
        $this->celular_emergencia = $celular_emergencia;
        $this->parentesco_emergencia = $parentesco_emergencia;
        $this->sucursal = $sucursal;
        $this->tipo_contrato = $tipo_contrato;
        $this->fecha_ingreso = $fecha_ingreso;
        $this->fecha_retiro = $fecha_retiro;
        $this->motivo_retiro = $motivo_retiro;
        $this->salario = $salario;
        $this->valor_dia = $valor_dia;
        $this->valor_hora = $valor_hora;
        $this->fecha_actual = $fecha_actual;
        $this->antiguedad = $antiguedad;
        $this->cesantia = $cesantia;
        $this->area = $area;
        $this->seccion = $seccion;
        $this->cargo = $cargo;
        $this->clase_riesgo = $clase_riesgo;
        $this->pension = $pension;
        $this->tipo_dotacion = $tipo_dotacion;
        $this->estado = $estado;
        $this->camisa = $camisa;
        $this->pantalon = $pantalon;
        $this->zapato = $zapato;
        $this->vestimenta = $vestimenta;
        $this->talla_camisa = $talla_camisa;
        $this->talla_pantalon = $talla_pantalon;
        $this->talla_zapato = $talla_zapato;
    }

    // Listado reporte de la dotacuón

    function getTipo_camisa() {
        return $this->tipo_camisa;
    }

    function getTipo_pantalon() {
        return $this->tipo_pantalon;
    }

    function getTipo_zapato() {
        return $this->tipo_zapato;
    }

    function setTipo_camisa($tipo_camisa) {
        $this->tipo_camisa = $tipo_camisa;
    }

    function setTipo_pantalon($tipo_pantalon) {
        $this->tipo_pantalon = $tipo_pantalon;
    }

    function setTipo_zapato($tipo_zapato) {
        $this->tipo_zapato = $tipo_zapato;
    }


    function constructorUsuarioHijos($id_usuario, $tipo_documento, $fecha_expedicion, $lugar_expedicion, $nombre, $apellido, $telefono_fijo, $telefono_movil, $tipo_casa, $estrato, $genero, $fecha_nacimiento, $edad, $direccion, $lugar_residencia, $nivel_academico, $area_academica, $estado_civil, $eps, $nro_cuenta, $tipo_sangre, $antecedentes, $practica_deporte, $consumo_cigarros, $consumo_licor, $consumo_spa, $correo, $password, $perfil, $nombre_persona_emergencia, $telefono_emergencia, $celular_emergencia, $parentesco_emergencia, $sucursal, $tipo_contrato, $fecha_ingreso, $fecha_retiro, $motivo_retiro, $salario, $valor_dia, $valor_hora, $fecha_actual, $antiguedad, $cesantia, $area, $seccion, $cargo, $clase_riesgo, $pension, $tipo_dotacion, $estado, $camisa, $pantalon, $zapato, $vestimenta, $hijos) {
        $this->id_usuario = $id_usuario;
        $this->tipo_documento = $tipo_documento;
        $this->fecha_expedicion = $fecha_expedicion;
        $this->lugar_expedicion = $lugar_expedicion;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->telefono_fijo = $telefono_fijo;
        $this->telefono_movil = $telefono_movil;
        $this->tipo_casa = $tipo_casa;
        $this->estrato = $estrato;
        $this->genero = $genero;
        $this->fecha_nacimiento = $fecha_nacimiento;
        $this->edad = $edad;
        $this->direccion = $direccion;
        $this->lugar_residencia = $lugar_residencia;
        $this->nivel_academico = $nivel_academico;
        $this->area_academica = $area_academica;
        $this->estado_civil = $estado_civil;
        $this->eps = $eps;
        $this->nro_cuenta = $nro_cuenta;
        $this->tipo_sangre = $tipo_sangre;
        $this->antecedentes = $antecedentes;
        $this->practica_deporte = $practica_deporte;
        $this->consumo_cigarros = $consumo_cigarros;
        $this->consumo_licor = $consumo_licor;
        $this->consumo_spa = $consumo_spa;
        $this->correo = $correo;
        $this->password = $password;
        $this->perfil = $perfil;
        $this->nombre_persona_emergencia = $nombre_persona_emergencia;
        $this->telefono_emergencia = $telefono_emergencia;
        $this->celular_emergencia = $celular_emergencia;
        $this->parentesco_emergencia = $parentesco_emergencia;
        $this->sucursal = $sucursal;
        $this->tipo_contrato = $tipo_contrato;
        $this->fecha_ingreso = $fecha_ingreso;
        $this->fecha_retiro = $fecha_retiro;
        $this->motivo_retiro = $motivo_retiro;
        $this->salario = $salario;
        $this->valor_dia = $valor_dia;
        $this->valor_hora = $valor_hora;
        $this->fecha_actual = $fecha_actual;
        $this->antiguedad = $antiguedad;
        $this->cesantia = $cesantia;
        $this->area = $area;
        $this->seccion = $seccion;
        $this->cargo = $cargo;
        $this->clase_riesgo = $clase_riesgo;
        $this->pension = $pension;
        $this->tipo_dotacion = $tipo_dotacion;
        $this->estado = $estado;
        $this->camisa = $camisa;
        $this->pantalon = $pantalon;
        $this->zapato = $zapato;
        $this->vestimenta = $vestimenta;
        $this->hijos = $hijos;
    }

    function getHijos() {
        return $this->hijos;
    }

    function setHijos($hijos) {
        $this->hijos = $hijos;
    }

    // ----------------------------------------------------

    function constructorTabla($id_campo, $nombre_campo) {
        $this->id_campo = $id_campo;
        $this->nombre_campo = $nombre_campo;
    }

    function getId_campo() {
        return $this->id_campo;
    }

    function getNombre_campo() {
        return $this->nombre_campo;
    }

    function setId_campo($id_campo) {
        $this->id_campo = $id_campo;
    }

    function setNombre_campo($nombre_campo) {
        $this->nombre_campo = $nombre_campo;
    }

    
    function constructor($id_usuario, $tipo_documento, $fecha_expedicion, $lugar_expedicion, $nombre, $apellido, $telefono_fijo, $telefono_movil, $tipo_casa, $estrato, $genero, $fecha_nacimiento, $edad, $direccion, $lugar_residencia, $nivel_academico, $area_academica, $estado_civil, $eps, $nro_cuenta, $tipo_sangre, $antecedentes, $practica_deporte, $consumo_cigarros, $consumo_licor, $consumo_spa, $correo, $password, $perfil, $nombre_persona_emergencia, $telefono_emergencia, $celular_emergencia, $parentesco_emergencia, $sucursal, $tipo_contrato, $fecha_ingreso, $fecha_retiro, $motivo_retiro, $salario, $valor_dia, $valor_hora, $fecha_actual, $antiguedad, $cesantia, $area, $seccion, $cargo, $clase_riesgo, $pension, $tipo_dotacion, $estado, $camisa, $pantalon, $zapato, $vestimenta) {
        $this->id_usuario = $id_usuario;
        $this->tipo_documento = $tipo_documento;
        $this->fecha_expedicion = $fecha_expedicion;
        $this->lugar_expedicion = $lugar_expedicion;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->telefono_fijo = $telefono_fijo;
        $this->telefono_movil = $telefono_movil;
        $this->tipo_casa = $tipo_casa;
        $this->estrato = $estrato;
        $this->genero = $genero;
        $this->fecha_nacimiento = $fecha_nacimiento;
        $this->edad = $edad;
        $this->direccion = $direccion;
        $this->lugar_residencia = $lugar_residencia;
        $this->nivel_academico = $nivel_academico;
        $this->area_academica = $area_academica;
        $this->estado_civil = $estado_civil;
        $this->eps = $eps;
        $this->nro_cuenta = $nro_cuenta;
        $this->tipo_sangre = $tipo_sangre;
        $this->antecedentes = $antecedentes;
        $this->practica_deporte = $practica_deporte;
        $this->consumo_cigarros = $consumo_cigarros;
        $this->consumo_licor = $consumo_licor;
        $this->consumo_spa = $consumo_spa;
        $this->correo = $correo;
        $this->password = $password;
        $this->perfil = $perfil;
        $this->nombre_persona_emergencia = $nombre_persona_emergencia;
        $this->telefono_emergencia = $telefono_emergencia;
        $this->celular_emergencia = $celular_emergencia;
        $this->parentesco_emergencia = $parentesco_emergencia;
        $this->sucursal = $sucursal;
        $this->tipo_contrato = $tipo_contrato;
        $this->fecha_ingreso = $fecha_ingreso;
        $this->fecha_retiro = $fecha_retiro;
        $this->motivo_retiro = $motivo_retiro;
        $this->salario = $salario;
        $this->valor_dia = $valor_dia;
        $this->valor_hora = $valor_hora;
        $this->fecha_actual = $fecha_actual;
        $this->antiguedad = $antiguedad;
        $this->cesantia = $cesantia;
        $this->area = $area;
        $this->seccion = $seccion;
        $this->cargo = $cargo;
        $this->clase_riesgo = $clase_riesgo;
        $this->pension = $pension;
        $this->tipo_dotacion = $tipo_dotacion;
        $this->estado = $estado;
        $this->camisa = $camisa;
        $this->pantalon = $pantalon;
        $this->zapato = $zapato;
        $this->vestimenta = $vestimenta;
    }


    function getId_usuario() {
        return $this->id_usuario;
    }

    function getTipo_documento() {
        return $this->tipo_documento;
    }

    function getFecha_expedicion() {
        return $this->fecha_expedicion;
    }

    function getLugar_expedicion() {
        return $this->lugar_expedicion;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getTelefono_fijo() {
        return $this->telefono_fijo;
    }

    function getTelefono_movil() {
        return $this->telefono_movil;
    }

    function getTipo_casa() {
        return $this->tipo_casa;
    }

    function getEstrato() {
        return $this->estrato;
    }

    function getGenero() {
        return $this->genero;
    }

    function getFecha_nacimiento() {
        return $this->fecha_nacimiento;
    }

    function getEdad() {
        return $this->edad;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getLugar_residencia() {
        return $this->lugar_residencia;
    }

    function getNivel_academico() {
        return $this->nivel_academico;
    }

    function getArea_academica() {
        return $this->area_academica;
    }

    function getEstado_civil() {
        return $this->estado_civil;
    }

    function getEps() {
        return $this->eps;
    }

    function getNro_cuenta() {
        return $this->nro_cuenta;
    }

    function getTipo_sangre() {
        return $this->tipo_sangre;
    }

    function getAntecedentes() {
        return $this->antecedentes;
    }

    function getPractica_deporte() {
        return $this->practica_deporte;
    }

    function getConsumo_cigarros() {
        return $this->consumo_cigarros;
    }

    function getConsumo_licor() {
        return $this->consumo_licor;
    }

    function getConsumo_spa() {
        return $this->consumo_spa;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getPassword() {
        return $this->password;
    }

    function getPerfil() {
        return $this->perfil;
    }

    function getNombre_persona_emergencia() {
        return $this->nombre_persona_emergencia;
    }

    function getTelefono_emergencia() {
        return $this->telefono_emergencia;
    }

    function getCelular_emergencia() {
        return $this->celular_emergencia;
    }

    function getParentesco_emergencia() {
        return $this->parentesco_emergencia;
    }

    function getFoto() {
        return $this->foto;
    }

    function getSucursal() {
        return $this->sucursal;
    }

    function getTipo_contrato() {
        return $this->tipo_contrato;
    }

    function getFecha_ingreso() {
        return $this->fecha_ingreso;
    }

    function getFecha_retiro() {
        return $this->fecha_retiro;
    }

    function getMotivo_retiro() {
        return $this->motivo_retiro;
    }

    function getSalario() {
        return $this->salario;
    }

    function getValor_dia() {
        return $this->valor_dia;
    }

    function getValor_hora() {
        return $this->valor_hora;
    }

    function getFecha_actual() {
        return $this->fecha_actual;
    }

    function getAntiguedad() {
        return $this->antiguedad;
    }

    function getCesantia() {
        return $this->cesantia;
    }

    function getArea() {
        return $this->area;
    }

    function getSeccion() {
        return $this->seccion;
    }

    function getCargo() {
        return $this->cargo;
    }

    function getClase_riesgo() {
        return $this->clase_riesgo;
    }

    function getPension() {
        return $this->pension;
    }

    function getTipo_dotacion() {
        return $this->tipo_dotacion;
    }

    // ----------- Tallas del empeleado

    function getTalla_camisa() {
        return $this->talla_camisa;
    }

    function getTalla_pantalon() {
        return $this->talla_pantalon;
    }

    function getTalla_zapato() {
        return $this->talla_zapato;
    }

    // ---------

    function getEstado() {
        return $this->estado;
    }

    function getCamisa() {
        return $this->camisa;
    }

    function getPantalon() {
        return $this->pantalon;
    }

    function getZapato() {
        return $this->zapato;
    }

    function getVestimenta() {
        return $this->vestimenta;
    }


    function getCant_camisa() {
        return $this->cant_camisa;
    }

    function getCant_pantalon() {
        return $this->cant_pantalon;
    }

    function getCant_zapato() {
        return $this->cant_zapato;
    }

    function getCant_vestimenta() {
        return $this->cant_vestimenta;
    }

    // -------------

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setTipo_documento($tipo_documento) {
        $this->tipo_documento = $tipo_documento;
    }

    function setFecha_expedicion($fecha_expedicion) {
        $this->fecha_expedicion = $fecha_expedicion;
    }

    function setLugar_expedicion($lugar_expedicion) {
        $this->lugar_expedicion = $lugar_expedicion;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setTelefono_fijo($telefono_fijo) {
        $this->telefono_fijo = $telefono_fijo;
    }

    function setTelefono_movil($telefono_movil) {
        $this->telefono_movil = $telefono_movil;
    }

    function setTipo_casa($tipo_casa) {
        $this->tipo_casa = $tipo_casa;
    }

    function setEstrato($estrato) {
        $this->estrato = $estrato;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }

    function setFecha_nacimiento($fecha_nacimiento) {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    function setEdad($edad) {
        $this->edad = $edad;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setLugar_residencia($lugar_residencia) {
        $this->lugar_residencia = $lugar_residencia;
    }

    function setNivel_academico($nivel_academico) {
        $this->nivel_academico = $nivel_academico;
    }

    function setArea_academica($area_academica) {
        $this->area_academica = $area_academica;
    }

    function setEstado_civil($estado_civil) {
        $this->estado_civil = $estado_civil;
    }

    function setEps($eps) {
        $this->eps = $eps;
    }

    function setNro_cuenta($nro_cuenta) {
        $this->nro_cuenta = $nro_cuenta;
    }

    function setTipo_sangre($tipo_sangre) {
        $this->tipo_sangre = $tipo_sangre;
    }

    function setAntecedentes($antecedentes) {
        $this->antecedentes = $antecedentes;
    }

    function setPractica_deporte($practica_deporte) {
        $this->practica_deporte = $practica_deporte;
    }

    function setConsumo_cigarros($consumo_cigarros) {
        $this->consumo_cigarros = $consumo_cigarros;
    }

    function setConsumo_licor($consumo_licor) {
        $this->consumo_licor = $consumo_licor;
    }

    function setConsumo_spa($consumo_spa) {
        $this->consumo_spa = $consumo_spa;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setPerfil($perfil) {
        $this->perfil = $perfil;
    }

    function setNombre_persona_emergencia($nombre_persona_emergencia) {
        $this->nombre_persona_emergencia = $nombre_persona_emergencia;
    }

    function setTelefono_emergencia($telefono_emergencia) {
        $this->telefono_emergencia = $telefono_emergencia;
    }

    function setCelular_emergencia($celular_emergencia) {
        $this->celular_emergencia = $celular_emergencia;
    }

    function setParentesco_emergencia($parentesco_emergencia) {
        $this->parentesco_emergencia = $parentesco_emergencia;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function setSucursal($sucursal) {
        $this->sucursal = $sucursal;
    }

    function setTipo_contrato($tipo_contrato) {
        $this->tipo_contrato = $tipo_contrato;
    }

    function setFecha_ingreso($fecha_ingreso) {
        $this->fecha_ingreso = $fecha_ingreso;
    }

    function setFecha_retiro($fecha_retiro) {
        $this->fecha_retiro = $fecha_retiro;
    }

    function setMotivo_retiro($motivo_retiro) {
        $this->motivo_retiro = $motivo_retiro;
    }

    function setSalario($salario) {
        $this->salario = $salario;
    }

    function setValor_dia($valor_dia) {
        $this->valor_dia = $valor_dia;
    }

    function setValor_hora($valor_hora) {
        $this->valor_hora = $valor_hora;
    }

    function setFecha_actual($fecha_actual) {
        $this->fecha_actual = $fecha_actual;
    }

    function setAntiguedad($antiguedad) {
        $this->antiguedad = $antiguedad;
    }

    function setCesantia($cesantia) {
        $this->cesantia = $cesantia;
    }

    function setClase_riesgo($clase_riesgo) {
        $this->clase_riesgo = $clase_riesgo;
    }

    function setPorcentaje_riesgo($porcentaje_riesgo) {
        $this->porcentaje_riesgo = $porcentaje_riesgo;
    }

    function setArea($area) {
        $this->area = $area;
    }

    function setSeccion($seccion) {
        $this->seccion = $seccion;
    }

    function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    function setPension($pension) {
        $this->pension = $pension;
    }

    function setTipo_dotacion($tipo_dotacion) {
        $this->tipo_dotacion = $tipo_dotacion;
    }

    // Tallas del empleado

    function setTalla_camisa($talla_camisa) {
        $this->talla_camisa = $talla_camisa;
    }

    function setTalla_pantalon($talla_pantalon) {
        $this->talla_pantalon = $talla_pantalon;
    }

    function setTalla_zapato($talla_zapato) {
        $this->talla_zapato = $talla_zapato;
    }

    // ---------------

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setCamisa($camisa) {
        $this->camisa = $camisa;
    }

    function setPantalon($pantalon) {
        $this->pantalon = $pantalon;
    }

    function setZapato($zapato) {
        $this->zapato = $zapato;
    }

    function setVestimenta($vestimenta) {
        $this->vestimenta = $vestimenta;
    }

    function setCant_camisa($cant_camisa) {
        $this->cant_camisa = $cant_camisa;
    }

    function setCant_pantalon($cant_pantalon) {
        $this->cant_pantalon = $cant_pantalon;
    }

    function setCant_zapato($cant_zapato) {
        $this->cant_zapato = $cant_zapato;
    }

    function setCant_vestimenta($cant_vestimenta) {
        $this->cant_vestimenta = $cant_vestimenta;
    }
    
}

