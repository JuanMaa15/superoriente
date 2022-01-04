<?php


class UsuarioDTO {



    private $id_usuario;
    private $tipo_documento;
    private $fecha_expedicion;
    private $lugar_expedicion;
    private $nombre;
    private $apellido;
    private $telefono_fijo;
    private $telefono_movil;
    private $tipo_casa;
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
    
    private $sucursal;
    private $tipo_contrato;
    private $fecha_ingreso;
    private $fecha_retiro;
    private $motivo_retiro;
    private $salario;
    private $valor_dia;
    private $valor_hora;
    private $clase_riesgo;
    private $porcentaje_riesgo;
    private $area;
    private $seccion;
    private $cargo;
    private $pension;
    private $estado;
    
    function __construct() {
        
    }

    
    function constructor($id_usuario, $tipo_documento, $fecha_expedicion, $lugar_expedicion, $nombre, $apellido, $telefono_fijo, $telefono_movil, $tipo_casa, $genero, $fecha_nacimiento, $edad, $direccion, $lugar_residencia, $nivel_academico, $area_academica, $estado_civil, $eps, $nro_cuenta, $tipo_sangre, $antecedentes, $practica_deporte, $consumo_cigarros, $consumo_licor, $consumo_spa, $correo, $password, $perfil, $nombre_persona_emergencia, $telefono_emergencia, $celular_emergencia, $parentesco_emergencia, $sucursal, $tipo_contrato, $fecha_ingreso, $fecha_retiro, $motivo_retiro, $salario, $valor_dia, $valor_hora, $clase_riesgo, $porcentaje_riesgo, $area, $seccion, $cargo, $pension, $estado) {
        $this->id_usuario = $id_usuario;
        $this->tipo_documento = $tipo_documento;
        $this->fecha_expedicion = $fecha_expedicion;
        $this->lugar_expedicion = $lugar_expedicion;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->telefono_fijo = $telefono_fijo;
        $this->telefono_movil = $telefono_movil;
        $this->tipo_casa = $tipo_casa;
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
        $this->clase_riesgo = $clase_riesgo;
        $this->porcentaje_riesgo = $porcentaje_riesgo;
        $this->area = $area;
        $this->seccion = $seccion;
        $this->cargo = $cargo;
        $this->pension = $pension;
        $this->estado = $estado;
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

    function getClase_riesgo() {
        return $this->clase_riesgo;
    }

    function getPorcentaje_riesgo() {
        return $this->porcentaje_riesgo;
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

    function getPension() {
        return $this->pension;
    }

    function getEstado() {
        return $this->estado;
    }

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

    function setEstado($estado) {
        $this->estado = $estado;
    }




    
}

