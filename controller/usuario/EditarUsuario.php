<?php

require_once ("../../models/DAO/UsuarioDAO.php");
require_once ('../../models/DAO/PerfilDAO.php');
require_once ('../../models/DAO/TipoContratoDAO.php');
require_once ('../../models/DAO/TipoDocumentoDAO.php');
require_once ('../../models/DAO/EstadoDAO.php');
require_once ('../../models/DAO/GeneroDAO.php');
require_once ('../../models/DAO/EstadoCivilDAO.php');
require_once ('../../models/DAO/CasaDAO.php');
require_once ('../../models/DAO/TipoSangreDAO.php');

$id_usuario = $_POST['id'];

switch ($_POST['opc']) {
        case 'personales':

                $usuariodao = new UsuarioDAO();
                $usuariodto = $usuariodao->listaUsuario($id_usuario);
                
                $perfildao = new PerfilDAO();
                $listaPerfiles = $perfildao->listaPerfiles();

                $tipoDocumentodao = new TipoDocumentoDAO();
                $listaTiposDocumentos = $tipoDocumentodao->listaTiposDocumentos();

                $generodao = new GeneroDAO();
                $listaGeneros = $generodao->listaGeneros();

                $estadoCivildao = new EstadoCivilDAO();
                $listaEstadosCiviles = $estadoCivildao->listaEstadosCiviles();

                $casadao = new CasaDAO();
                $listaCasas = $casadao->listaCasas();

                $tipoSangredao = new TipoSangreDAO();
                $listaTiposSangre = $tipoSangredao->listaTiposSangre();

                $cbxPerfil = "<select class='form-select' id='perfil_act'>";

                for ($i=0; $i < count($listaPerfiles); $i++) { 
                        if ($listaPerfiles[$i]->getPerfil() == $usuariodto->getPerfil()) {
                                $cbxPerfil .= "<option selected value='" . $listaPerfiles[$i]->getId_perfil() . "'>" . $listaPerfiles[$i]->getPerfil() . "</option>";
                        }else{
                                $cbxPerfil .= "<option  value='" . $listaPerfiles[$i]->getId_perfil() . "'>" . $listaPerfiles[$i]->getPerfil() . "</option>";
                        }
                }
                
                $cbxPerfil .= "</select>";

                $cbxTipoDocumento = "<select class='form-select' id='tipo_documento_act'>";

                for ($i=0; $i < count($listaTiposDocumentos); $i++) { 
                        if ($listaTiposDocumentos[$i]->getTipo_documento() == $usuariodto->getTipo_documento()) {
                                $cbxTipoDocumento .= "<option selected value='" . $listaTiposDocumentos[$i]->getId_tipo_documento() . "'>" . $listaTiposDocumentos[$i]->getTipo_documento() . "</option>";
                        }else{
                                $cbxTipoDocumento .= "<option value='" . $listaTiposDocumentos[$i]->getId_tipo_documento() . "'>" . $listaTiposDocumentos[$i]->getTipo_documento() . "</option>";
                        }
                }
                
                $cbxTipoDocumento .= "</select>";

                $cbxGenero = "<select class='form-select' id='genero_act'>";

                for ($i=0; $i < count($listaGeneros); $i++) { 
                        if ($usuariodto->getGenero() == $listaGeneros[$i]->getId_genero()) {
                                $cbxGenero .= "<option selected value='" . $listaGeneros[$i]->getId_genero() . "'>" . $listaGeneros[$i]->getNombre() . "</option>";
                        }else {
                                $cbxGenero .= "<option selected value='" . $listaGeneros[$i]->getId_genero() . "'>" . $listaGeneros[$i]->getNombre() . "</option>";
                        }  
                }

                $cbxGenero .= "</select>";

                $cbxEstadoCivil = "<select class='form-select' id='estado_civil_act'>";

                for ($i=0; $i < count($listaEstadosCiviles); $i++) { 
                        if ($listaEstadosCiviles[$i]->getId_estado_civil() == $usuariodto->getNombre() ) {
                                $cbxEstadoCivil .= "<option selected value='" . $listaEstadosCiviles[$i]->getId_estado_civil() . "'>" . $listaEstadosCiviles[$i]->getNombre() . "</option>";
                        }else {
                                $cbxEstadoCivil .= "<option selected value='" . $listaEstadosCiviles[$i]->getId_estado_civil() . "'>" . $listaEstadosCiviles[$i]->getNombre() . "</option>";
                        }  
                }

                $cbxEstadoCivil .= "</select>";

                $cbxCasa = "<select class='form-select' id='tipo_casa_act'>";

                for ($i=0; $i < count($listaCasas); $i++) { 
                        if ($listaCasas[$i]->getId_casa() == $usuariodto->getTipo_casa() ) {
                                $cbxCasa .= "<option selected value='" . $listaCasas[$i]->getId_casa() . "'>" . $listaCasas[$i]->getNombre() . "</option>";
                        }else {
                                $cbxCasa .= "<option selected value='" . $listaCasas[$i]->getId_casa() . "'>" . $listaCasas[$i]->getNombre() . "</option>";
                        }  
                }

                $cbxCasa .= "</select>";

                $cbxTipoSangre = "<select class='form-select' id='tipo_sangre_act'>";

                for ($i=0; $i < count($listaTiposSangre); $i++) { 
                        if ($listaTiposSangre[$i]->getId_tipo_sangre_rh() == $usuariodto->getTipo_sangre() ) {
                                $cbxTipoSangre .= "<option selected value='" . $listaTiposSangre[$i]->getId_tipo_sangre_rh() . "'>" . $listaTiposSangre[$i]->getNombre() . "</option>";
                        }else {
                                $cbxTipoSangre .= "<option selected value='" . $listaTiposSangre[$i]->getId_tipo_sangre_rh() . "'>" . $listaTiposSangre[$i]->getNombre() . "</option>";
                        }  
                }

                $cbxTipoSangre .= "</select>";

                $form = "<form>"
                ."<div class='row'>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Tipo documento</label>"
                . $cbxTipoDocumento
                ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Nro de documento</label>"
                ."<input class='form-control' type='text' id='id_empleado_act' value='" . $usuariodto->getId_usuario() .  "' readonly>"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Fecha de expedición</label>"
                ."<input class='form-control' type='date' id='fecha_expedicion_act' value='" . $usuariodto->getFecha_expedicion() .  "'>"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."</div>"

                ."<div class='row'>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Lugar de expedición</label>"
                ."<input class='form-control' type='text' id='lugar_expedicion_act' value='" . $usuariodto->getLugar_expedicion() .  "' >"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."</div>"

                ."<div class='row'>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Nombre</label>"
                ."<input class='form-control' type='text' id='nombre_act' value='" . $usuariodto->getNombre() .  "' >"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Apellido</label>"
                ."<input class='form-control' type='text' id='apellido_act' value='" . $usuariodto->getApellido() .  "' >"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."</div>"

                ."<div class='row'>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Teléfono fijo</label>"
                ."<input class='form-control' type='text' id='telefono_fijo_act' value='" . $usuariodto->getTelefono_fijo() .  "' >"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Teléfono Móvil</label>"
                ."<input class='form-control' type='text' id='telefono_movil_act' value='" . $usuariodto->getTelefono_movil() .  "' >"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Tipo de casa</label>"
                . $cbxCasa
                ."<small class='text-danger'></small>".
                "</div>"

                ."<div class='row'>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Género</label>"
                . $cbxGenero
                ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Edad</label>"
                ."<input class='form-control' type='text' id='edad_act' value='" . $usuariodto->getEdad() .  "' >"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Nivel academico</label>"
                ."<input class='form-control' type='text' id='nivel_academico_act' value='" . $usuariodto->getNivel_academico() .  "' >"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."</div>"

                ."<div class='row'>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Area academica</label>"
                ."<input class='form-control' type='text' id='area_academica_act' value='" . $usuariodto->getArea_academica() .  "' >"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Estado civil</label>"
                . $cbxEstadoCivil
                ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>EPS</label>"
                ."<input class='form-control' type='text' id='eps_act' value='" . $usuariodto->getEps() .  "' >"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."</div>"

                ."<div class='row'>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Número de cuenta de bancolombia</label>"
                ."<input class='form-control' type='text' id='nro_cuenta_act' value='" . $usuariodto->getNro_cuenta() .  "' >"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Tipo de sangre con su rh</label>"
                . $cbxTipoSangre
                ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Lugar de residencia</label>"
                ."<input class='form-control' type='text' id='lugar_residencia_act' value='" . $usuariodto->getLugar_residencia() .  "' >"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."</div>"

                ."<div class='row'>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Dirección</label>"
                ."<input class='form-control' type='text' id='direccion_act' value='" . $usuariodto->getDireccion() .  "' >"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Antecendes</label>"
                ."<textarea class='form-control' type='text' id='antecedentes_act' value='" . $usuariodto->getAntecedentes() .  "' ></textarea>"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."</div>"

                ."<div class='row'>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>¿Practica deporte? ¿Cual?</label>"
                ."<textarea class='form-control' type='text' id='practica_deporte_act' value='" . $usuariodto->getPractica_deporte() .  "' ></textarea>"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>¿Cuantos cigarrillos se fuma a la semana?</label>"
                ."<textarea class='form-control' type='text' id='consumo_cigarros_act' value='" . $usuariodto->getConsumo_cigarros() .  "' ></textarea>"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."</div>"

                ."<div class='row'>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>¿Cuantas copas de licor se toma a la semana?</label>"
                ."<textarea class='form-control' type='text' id='consumo_licor_act' value='" . $usuariodto->getConsumo_licor() .  "' ></textarea>"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>¿Con que frecuencia consume sustancias alucinogenas?</label>"
                ."<textarea class='form-control' type='text' id='consumo_spa_act' value='" . $usuariodto->getConsumo_spa() .  "' ></textarea>"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."</div>"

                ."<div class='row'>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Correo Eletrónico</label>"
                ."<input class='form-control' type='text' id='correo_act' value='" . $usuariodto->getCorreo() .  "' >"
                 ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Contraseña</label>"
                ."<input class='form-control' type='text' id='pass_act' value='" . $usuariodto->getPassword() .  "' >"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."</div>"

                ."<div class='row'>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Nombre de persona de emergencia</label>"
                ."<input class='form-control' type='text' id='nombre_persona_emergencia_act' value='" . $usuariodto->getNombre_persona_emergencia() .  "' >"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Teléfono</label>"
                ."<input class='form-control' type='text' id='telefono_emergencia_act' value='" . $usuariodto->getTelefono_emergencia().  "' >"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."</div>"

                ."<div class='row'>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Celular</label>"
                ."<input class='form-control' type='text' id='celular_emergencia_act' value='" . $usuariodto->getCelular_emergencia() .  "' >"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Parentesco</label>"
                ."<input class='form-control' type='text' id='parentesco_emergencia_act' value='" . $usuariodto->getParentesco_emergencia().  "' >"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."</div>"

                ."<div class='row'>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Perfil</label>"
                . $cbxPerfil
                ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Fecha de nacimiento</label>"
                ."<input class='form-control' type='text' id='fecha_nacimiento_act' value='" . $usuariodto->getFecha_nacimiento().  "' >"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."</div>"

                ."</form>";

        break;
        
        case 'laborales':
                
                
                $estadodao = new EstadoDAO();
                $listaEstados = $estadodao->listaEstados();

                $usuariodao = new UsuarioDAO();
                $usuariodto = $usuariodao->listaUsuario($id_usuario);

                $tipoContratodao = new TipoContratoDAO();
                $listaTipoContratos = $tipoContratodao->listaTiposContratos();

                $cbxEstado = "<select class='form-select' id='estado_act'>";

                for ($i=0; $i < count($listaEstados); $i++) { 
                        if ($listaEstados[$i]->getNombre() == $usuariodto->getNombre()) {
                                $cbxEstado .= "<option selected value='" . $listaEstados[$i]->getId_estado() . "'>" . $listaEstados[$i]->getNombre() . "</option>";
                        }else{
                                $cbxEstado .= "<option  value='" . $listaEstados[$i]->getId_estado() . "'>" . $listaEstados[$i]->getNombre() . "</option>";
                        }
                }
                
                $cbxEstado .= "</select>";

                $cbxTipoContrato = "<select class='form-select' id='tipo_contrato_act'>";

                                for ($i=0; $i < count($listaTipoContratos); $i++) { 
                                        if ($listaTipoContratos[$i]->getNombre() == $usuariodto->getNombre()) {
                                                $cbxTipoContrato .= "<option selected value='" . $listaTipoContratos[$i]->getId_tipo_contrato() . "'>" . $listaTipoContratos[$i]->getNombre() . "</option>";
                                        }else{
                                                $cbxTipoContrato .= "<option  value='" . $listaTipoContratos[$i]->getId_tipo_contrato() . "'>" . $listaTipoContratos[$i]->getNombre() . "</option>";
                                        }
                                }
                                
                $cbxTipoContrato .= "</select>";

                                
                $form = "<form>"
                ."<div class='row'>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Nro de documento</label>"
                ."<input class='form-control' type='text' id='id_empleado_act' value='" . $usuariodto->getId_usuario() .  "' readonly>"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."</div>"

                ."<div class='row'>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Sucursal</label>"
                ."<input class='form-control' type='text' id='sucursal_act' value='" . $usuariodto->getSucursal() .  "' >"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Tipo de contrato</label>"
                . $cbxTipoContrato
                ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Fecha de ingreso</label>"
                ."<input class='form-control' type='date' id='fecha_ingreso_act' value='" . $usuariodto->getFecha_ingreso() .  "' >"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."</div>"

                ."<div class='row'>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Fecha de retiro</label>"
                ."<input class='form-control' type='text' id='fecha_retiro_act' value='" . $usuariodto->getFecha_retiro() .  "' >"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Motivo de retiro</label>"
                ."<input class='form-control' type='text' id='motivo_retiro_act' value='" . $usuariodto->getMotivo_retiro() .  "' >"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."</div>"

                ."<div class='row'>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Salario</label>"
                ."<input class='form-control' type='text' id='salario_act' value='" . $usuariodto->getSalario() .  "' >"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Valor día</label>"
                ."<input class='form-control' type='text' id='valor_dia_act' value='" . $usuariodto->getValor_dia() .  "' >"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Valor hora</label>"
                ."<input class='form-control' type='text' id='valor_hora_act' value='" . $usuariodto->getValor_hora() .  "' >"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."</div>"

                ."<div class='row'>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Clase de riesgo</label>"
                ."<input class='form-control' type='text' id='clase_riesgo_act' value='" . $usuariodto->getClase_riesgo() .  "' >"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Porcentaje riesgo</label>"
                ."<input class='form-control' type='text' id='porcentaje_riesgo_act' value='" . $usuariodto->getPorcentaje_riesgo() .  "' >"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Pension</label>"
                ."<input class='form-control' type='text' id='pension_act' value='" . $usuariodto->getPension() .  "' >"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."</div>"

                ."<div class='row'>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Area</label>"
                ."<input class='form-control' type='text' id='area_act' value='" . $usuariodto->getArea() .  "' >"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Sección</label>"
                ."<input class='form-control' type='text' id='seccion_act' value='" . $usuariodto->getSeccion() .  "' >"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Cargo</label>"
                ."<input class='form-control' type='text' id='cargo_act' value='" . $usuariodto->getCargo() .  "' >"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."</div>"

                ."<div class='row justify-content-center'>"
                ."<div class='col-4 my-2'>"
                ."<label class='form-label'>Estado</label>"
                . $cbxEstado
                ."<small class='text-danger'></small>"
                ."</div>"
                
                ."</div>"
                
                ."</form>";
        break;
}


echo $form;