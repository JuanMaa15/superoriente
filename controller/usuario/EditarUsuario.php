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
require_once ('../../models/DAO/NivelAcademicoDAO.php');
require_once ('../../models/DAO/EpsDAO.php');
require_once ('../../models/DAO/SucursalDAO.php');
require_once ('../../models/DAO/AreaDAO.php');
require_once ('../../models/DAO/SeccionDAO.php');
require_once ('../../models/DAO/CargoDAO.php');
require_once ('../../models/DAO/PensionDAO.php');
require_once('../../models/DAO/LugarResidenciaDAO.php');
require_once('../../models/DAO/ClaseRiesgoDAO.php');
require_once('../../models/DAO/CesantiaDAO.php');
require_once('../../models/DAO/TipoDotacionDAO.php');




$id_usuario = $_POST['id'];

switch ($_POST['opc']) {
        case 'personales':

                $usuariodao = new UsuarioDAO();
                $usuariodto = $usuariodao->listaUsuarioConId($id_usuario);
                

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

                $nivelAcademicodao = new NivelAcademicoDAO();
                $listaNivelesAcademicos = $nivelAcademicodao->listaNivelesAcademicos();

                $epsdao = new EpsDAO();
                $listaEpss = $epsdao->listaEpss();

                $lugarResidenciadao = new LugarResidenciaDAO();
                $listaLugaresResidencia = $lugarResidenciadao->ListaLugaresResidencia();

                

                $cbxTipoDocumento = "<select class='form-select' id='tipo_documento_act'>";

                for ($i=0; $i < count($listaTiposDocumentos); $i++) { 
                        if ($listaTiposDocumentos[$i]->getId_tipo_documento() == $usuariodto->getTipo_documento()) {
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
                                $cbxGenero .= "<option  value='" . $listaGeneros[$i]->getId_genero() . "'>" . $listaGeneros[$i]->getNombre() . "</option>";
                        }  
                }

                $cbxGenero .= "</select>";

                $cbxEstadoCivil = "<select class='form-select' id='estado_civil_act'>";

                for ($i=0; $i < count($listaEstadosCiviles); $i++) { 
                        if ($listaEstadosCiviles[$i]->getId_estado_civil() == $usuariodto->getEstado_civil() ) {
                                $cbxEstadoCivil .= "<option selected value='" . $listaEstadosCiviles[$i]->getId_estado_civil() . "'>" . $listaEstadosCiviles[$i]->getNombre() . "</option>";
                        }else {
                                $cbxEstadoCivil .= "<option  value='" . $listaEstadosCiviles[$i]->getId_estado_civil() . "'>" . $listaEstadosCiviles[$i]->getNombre() . "</option>";
                        }  
                }

                $cbxEstadoCivil .= "</select>";

                $cbxCasa = "<select class='form-select' id='tipo_casa_act'>";

                for ($i=0; $i < count($listaCasas); $i++) { 
                        if ($listaCasas[$i]->getId_casa() == $usuariodto->getTipo_casa() ) {
                                $cbxCasa .= "<option selected value='" . $listaCasas[$i]->getId_casa() . "'>" . $listaCasas[$i]->getNombre() . "</option>";
                        }else {
                                $cbxCasa .= "<option  value='" . $listaCasas[$i]->getId_casa() . "'>" . $listaCasas[$i]->getNombre() . "</option>";
                        }  
                }

                $cbxCasa .= "</select>";

                $cbxTipoSangre = "<select class='form-select' id='tipo_sangre_act'>";

                for ($i=0; $i < count($listaTiposSangre); $i++) { 
                        if ($listaTiposSangre[$i]->getId_tipo_sangre_rh() == $usuariodto->getTipo_sangre() ) {
                                $cbxTipoSangre .= "<option selected value='" . $listaTiposSangre[$i]->getId_tipo_sangre_rh() . "'>" . $listaTiposSangre[$i]->getNombre() . "</option>";
                        }else {
                                $cbxTipoSangre .= "<option  value='" . $listaTiposSangre[$i]->getId_tipo_sangre_rh() . "'>" . $listaTiposSangre[$i]->getNombre() . "</option>";
                        }  
                }

                $cbxTipoSangre .= "</select>";

                $cbxNivelAcademico = "<select class='form-select' id='nivel_academico_act'>";

                for ($i=0; $i < count($listaNivelesAcademicos); $i++) { 
                        if ($listaNivelesAcademicos[$i]->getId_nivel_academico() == $usuariodto->getNivel_academico() ) {
                                $cbxNivelAcademico .= "<option selected value='" . $listaNivelesAcademicos[$i]->getId_nivel_academico() . "'>" . $listaNivelesAcademicos[$i]->getNombre() . "</option>";
                        }else {
                                $cbxNivelAcademico .= "<option  value='" . $listaNivelesAcademicos[$i]->getId_nivel_academico() . "'>" . $listaNivelesAcademicos[$i]->getNombre() . "</option>";
                        }  
                }

                $cbxNivelAcademico .= "</select>";

                $cbxEps = "<select class='form-select' id='eps_act'>";

                for ($i=0; $i < count($listaEpss); $i++) { 
                        if ($listaEpss[$i]->getId_eps() == $usuariodto->getEps() ) {
                                $cbxEps .= "<option selected value='" . $listaEpss[$i]->getId_eps() . "'>" . $listaEpss[$i]->getNombre() . "</option>";
                        }else {
                                $cbxEps .= "<option value='" . $listaEpss[$i]->getId_eps() . "'>" . $listaEpss[$i]->getNombre() . "</option>";
                        }  
                }

                $cbxEps .= "</select>";

                $cbxEstrato = "<select class='form-select' id='estrato_act'>";

                for ($i=1; $i <= 6; $i++) { 
                        if ($i == intval($usuariodto->getEstrato())) {
                                $cbxEstrato .= "<option selected value='" . $i . "'>" . $i . "</option>";
                        }else{
                                $cbxEstrato .= "<option value='" . $i . "'>" . $i . "</option>";
                        }
                }

                $cbxEstrato .= "</select>";

                $cbxlugarResidencia = "<select class='form-select' id='lugar_residencia_act'>";

                for ($i=0; $i < count($listaLugaresResidencia); $i++) { 
                        if ($listaLugaresResidencia[$i]->getId_lugar_residencia() == $usuariodto->getLugar_residencia() ) {
                                $cbxlugarResidencia .= "<option selected value='" . $listaLugaresResidencia[$i]->getId_lugar_residencia() . "'>" . $listaLugaresResidencia[$i]->getNombre() . "</option>";
                        }else {
                                $cbxlugarResidencia .= "<option value='" . $listaLugaresResidencia[$i]->getId_lugar_residencia() . "'>" . $listaLugaresResidencia[$i]->getNombre() . "</option>";
                        }  
                }

                $cbxlugarResidencia .= "</select>";
                

                /* $cbxEps = "<select class='form-select' id='eps_act'>";

                for ($i=0; $i < count($listaEpss); $i++) { 
                        if ($listaEpss[$i]->getId_eps() == $usuariodto->getEps() ) {
                                $cbxEps .= "<option selected value='" . $listaEpss[$i]->getId_eps() . "'>" . $listaEpss[$i]->getNombre() . "</option>";
                        }else {
                                $cbxEps .= "<option selected value='" . $listaEpss[$i]->getId_eps() . "'>" . $listaEpss[$i]->getNombre() . "</option>";
                        }  
                }

                $cbxEps .= "</select>"; */

                

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
                ."<label class='form-label'>Estrato</label>"
                . $cbxEstrato
                ."<small class='text-danger'></small>".
                "</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Tipo de casa</label>"
                . $cbxCasa
                ."<small class='text-danger'></small>".
                "</div>"

                ."<div class='row'>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Fecha de nacimiento</label>"
                ."<input class='form-control' type='date' id='fecha_nacimiento' value='" . $usuariodto->getFecha_nacimiento().  "' >"
                ."<small class='text-danger'></small>"
                ."</div>"

                ."<div class='col my-2'>"
                ."<label class='form-label'>Edad</label>"
                ."<input class='form-control' type='text' id='edad' value='" . $usuariodto->getEdad() .  "' readonly>"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Género</label>"
                . $cbxGenero
                ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Nivel academico</label>"
                . $cbxNivelAcademico
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
                . $cbxEps
                //."<input class='form-control' type='text' id='eps_act' value='" . $usuariodto->getEps() .  "' >"
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
                . $cbxlugarResidencia
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
                ."<textarea class='form-control' type='text' id='antecedentes_act'>" . $usuariodto->getAntecedentes() .  "</textarea>"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."</div>"

                ."<div class='row'>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>¿Practica deporte? ¿Cual?</label>"
                ."<textarea class='form-control' type='text' id='practica_deporte_act'>" . $usuariodto->getPractica_deporte() .  "</textarea>"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>¿Cuantos cigarrillos se fuma a la semana?</label>"
                ."<textarea class='form-control' type='text' id='consumo_cigarros_act'>" . $usuariodto->getConsumo_cigarros() .  "</textarea>"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."</div>"

                ."<div class='row'>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>¿Cuantas copas de licor se toma a la semana?</label>"
                ."<textarea class='form-control' type='text' id='consumo_licor_act' >" . $usuariodto->getConsumo_licor() .  "</textarea>"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>¿Con que frecuencia consume sustancias alucinogenas?</label>"
                ."<textarea class='form-control' type='text' id='consumo_spa_act'>" . $usuariodto->getConsumo_spa() .  "</textarea>"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."</div>"

                ."<div class='row'>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Correo Eletrónico</label>"
                ."<input class='form-control' type='email' id='correo' value='" . $usuariodto->getCorreo() .  "' >"
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

                

                ."</form>";

        break;
        
        case 'laborales':
                
                $perfildao = new PerfilDAO();
                $listaPerfiles = $perfildao->listaPerfiles();

                $estadodao = new EstadoDAO();
                $listaEstados = $estadodao->listaEstados();

                $usuariodao = new UsuarioDAO();
                $usuariodto = $usuariodao->listaUsuarioConId($id_usuario);

                $tipoContratodao = new TipoContratoDAO();
                $listaTipoContratos = $tipoContratodao->listaTiposContratos();

                $sucursaldao = new SucursalDAO();
                $listaSucursales = $sucursaldao->listaSucursales();

                $secciondao = new SeccionDAO();
                $listaSecciones = $secciondao->listaSecciones();

                $areadao = new AreaDAO();
                $listaAreas = $areadao->listaAreas();

                $cargodao = new CargoDAO();
                $listaCargos = $cargodao->listaCargos();

                $pensiondao = new PensionDAO();
                $listaPensiones = $pensiondao->listaPensiones();

                $claseRiesgodao = new ClaseRiesgoDAO();
                $listaClasesRiesgo = $claseRiesgodao->listaClasesRiesgos();

                $cesantiadao = new CesantiaDAO();
                $listaCesantias = $cesantiadao->listaCesantias();

                $tipoDotaciondao = new TipoDotacionDAO();
                $listaTiposDotacion = $tipoDotaciondao->listaTiposDotaciones(); 

                $cbxPerfil = "<select class='form-select' id='perfil_act'>";

                for ($i=0; $i < count($listaPerfiles); $i++) { 
                        if ($listaPerfiles[$i]->getId_perfil() == $usuariodto->getPerfil()) {
                                $cbxPerfil .= "<option selected value='" . $listaPerfiles[$i]->getId_perfil() . "'>" . $listaPerfiles[$i]->getPerfil() . "</option>";
                        }else{
                                $cbxPerfil .= "<option  value='" . $listaPerfiles[$i]->getId_perfil() . "'>" . $listaPerfiles[$i]->getPerfil() . "</option>";
                        }
                }
                
                $cbxPerfil .= "</select>";


                $cbxEstado = "<select class='form-select' id='estado_act'>";

                for ($i=0; $i < count($listaEstados); $i++) { 
                        if ($listaEstados[$i]->getId_estado() == $usuariodto->getEstado()) {
                                $cbxEstado .= "<option selected value='" . $listaEstados[$i]->getId_estado() . "'>" . $listaEstados[$i]->getNombre() . "</option>";
                        }else{
                                $cbxEstado .= "<option  value='" . $listaEstados[$i]->getId_estado() . "'>" . $listaEstados[$i]->getNombre() . "</option>";
                        }
                }
                
                $cbxEstado .= "</select>";

                $cbxTipoContrato = "<select class='form-select' id='tipo_contrato_act'>";

                                for ($i=0; $i < count($listaTipoContratos); $i++) { 
                                        if ($listaTipoContratos[$i]->getId_tipo_contrato() == $usuariodto->getTipo_contrato()) {
                                                $cbxTipoContrato .= "<option selected value='" . $listaTipoContratos[$i]->getId_tipo_contrato() . "'>" . $listaTipoContratos[$i]->getNombre() . "</option>";
                                        }else{
                                                $cbxTipoContrato .= "<option  value='" . $listaTipoContratos[$i]->getId_tipo_contrato() . "'>" . $listaTipoContratos[$i]->getNombre() . "</option>";
                                        }
                                }
                                
                $cbxTipoContrato .= "</select>";

                $cbxSucursal = "<select class='form-select' id='sucursal_act'>";

                                for ($i=0; $i < count($listaSucursales); $i++) { 
                                        if ($listaSucursales[$i]->getId_sucursal() == $usuariodto->getSucursal()) {
                                                $cbxSucursal .= "<option selected value='" . $listaSucursales[$i]->getId_sucursal() . "'>" . $listaSucursales[$i]->getNombre() . "</option>";
                                        }else{
                                                $cbxSucursal .= "<option  value='" . $listaSucursales[$i]->getId_sucursal() . "'>" . $listaSucursales[$i]->getNombre() . "</option>";
                                        }
                                }
                                
                $cbxSucursal .= "</select>";

                $cbxSeccion = "<select class='form-select' id='seccion'>";

                                for ($i=0; $i < count($listaSecciones); $i++) { 
                                        if ($listaSecciones[$i]->getId_seccion() == $usuariodto->getSeccion()) {
                                                $cbxSeccion .= "<option selected value='" . $listaSecciones[$i]->getId_seccion() . "'>" . $listaSecciones[$i]->getNombre() . "</option>";
                                        }else{
                                                $cbxSeccion .= "<option  value='" . $listaSecciones[$i]->getId_seccion() . "'>" . $listaSecciones[$i]->getNombre() . "</option>";
                                        }
                                }
                                
                $cbxSeccion .= "</select>";

                $cbxArea = "<select class='form-select' id='area'>"
                                . "<option value=''>Area</option>";

                                for ($i=0; $i < count($listaAreas); $i++) { 
                                        if ($listaAreas[$i]->getId_area() == $usuariodto->getArea()) {
                                                $cbxArea .= "<option selected class='opc-area' value='" . $listaAreas[$i]->getId_area() . "'>" . $listaAreas[$i]->getNombre() . "</option>";
                                        }else{
                                                $cbxArea .= "<option class='opc-area'  value='" . $listaAreas[$i]->getId_area() . "'>" . $listaAreas[$i]->getNombre() . "</option>";
                                        }
                                }
                                
                $cbxArea .= "</select>";

                $cbxCargo = "<select class='form-select' id='cargo'>";

                                for ($i=0; $i < count($listaCargos); $i++) { 
                                        if ($listaCargos[$i]->getId_cargo() == $usuariodto->getCargo()) {
                                                $cbxCargo .= "<option selected value='" . $listaCargos[$i]->getId_cargo() . "'>" . $listaCargos[$i]->getNombre() . "</option>";
                                        }else{
                                                $cbxCargo .= "<option  value='" . $listaCargos[$i]->getId_cargo() . "'>" . $listaCargos[$i]->getNombre() . "</option>";
                                        }
                                }
                                
                $cbxCargo .= "</select>";

                $cbxPension = "<select class='form-select' id='pension_act'>";

                                for ($i=0; $i < count($listaPensiones); $i++) { 
                                        if ($listaPensiones[$i]->getId_pension() == $usuariodto->getPension()) {
                                                $cbxPension .= "<option selected value='" . $listaPensiones[$i]->getId_pension() . "'>" . $listaPensiones[$i]->getNombre() . "</option>";
                                        }else{
                                                $cbxPension .= "<option  value='" . $listaPensiones[$i]->getId_pension() . "'>" . $listaPensiones[$i]->getNombre() . "</option>";
                                        }
                                }
                                
                $cbxPension .= "</select>";

                $cbxClaseRiesgo = "<select class='form-select' id='clase-riesgo'>";

                                for ($i=0; $i < count($listaClasesRiesgo); $i++) { 
                                        if ($listaClasesRiesgo[$i]->getId_clase_riesgo() == $usuariodto->getClase_riesgo()) {
                                                $cbxClaseRiesgo .= "<option selected value='" . $listaClasesRiesgo[$i]->getId_clase_riesgo() . "'>" . $listaClasesRiesgo[$i]->getNombre() . "</option>";
                                        }else{
                                                $cbxClaseRiesgo .= "<option  value='" . $listaClasesRiesgo[$i]->getId_clase_riesgo() . "'>" . $listaClasesRiesgo[$i]->getNombre() . "</option>";
                                        }
                                }
                                
                $cbxClaseRiesgo .= "</select>";

                $cbxCesantia = "<select class='form-select' id='cesantia_act'>";

                for ($i=0; $i < count($listaCesantias); $i++) { 
                        if ($listaCesantias[$i]->getId_cesantia() == $usuariodto->getCesantia()) {
                                $cbxCesantia .= "<option selected value='" . $listaCesantias[$i]->getId_cesantia() . "'>" . $listaCesantias[$i]->getNombre() . "</option>";
                        }else{
                                $cbxCesantia .= "<option  value='" . $listaCesantias[$i]->getId_cesantia() . "'>" . $listaCesantias[$i]->getNombre() . "</option>";
                        }
                }
                
                $cbxCesantia .= "</select>";

                $cbxTipoDotacion = "<select class='form-select' id='tipo_dotacion_act'>";

                for ($i=0; $i < count($listaTiposDotacion); $i++) { 
                        if ($listaTiposDotacion[$i]->getId_tipo_dotacion() == $usuariodto->getTipo_dotacion()) {
                                $cbxTipoDotacion .= "<option selected value='" . $listaTiposDotacion[$i]->getId_tipo_dotacion() . "'>" . $listaTiposDotacion[$i]->getNombre() . "</option>";
                        }else{
                                $cbxTipoDotacion .= "<option  value='" . $listaTiposDotacion[$i]->getId_tipo_dotacion() . "'>" . $listaTiposDotacion[$i]->getNombre() . "</option>";
                        }
                }
                
                $cbxTipoDotacion .= "</select>";

                $talla_camisa = ['XS','S','M','L','XL','XLL'];

                $cbxCamisa = "<select class='form-select' id='talla_camisa_act'>";

                for ($i=0; $i < count($talla_camisa); $i++) { 
                        if ($talla_camisa[$i] == $usuariodto->getTalla_camisa()) {
                                $cbxCamisa .= "<option selected value='" . $talla_camisa[$i] . "'>" . $talla_camisa[$i] . "</option>";
                        }else{
                                $cbxCamisa .= "<option value='" . $talla_camisa[$i] . "'>" . $talla_camisa[$i] . "</option>";
                        }
                }

                $cbxCamisa .= "</select>";

                $cbxPantalon = "<select class='form-select' id='talla_pantalon_act'>";

                for ($i=28; $i < 45; $i++) { 
                        if($i % 2 == 0) {
                                if ($i == intval($usuariodto->getTalla_pantalon())) {
                                        $cbxPantalon .= "<option selected value='" . $i . "'>" . $i . "</option>";
                                }else{
                                        $cbxPantalon .= "<option value='" . $i . "'>" . $i . "</option>";
                                }
                        }
                        
                }

                $cbxPantalon .= "</select>";

                
                $cbxZapato = "<select class='form-select' id='talla_zapato_act'>";

                for ($i=34; $i < 43; $i++) { 
                        if($i % 2 == 0) {
                                if ($i == intval($usuariodto->getTalla_zapato())) {
                                        $cbxZapato .= "<option selected value='" . $i . "'>" . $i . "</option>";
                                }else{
                                        $cbxZapato .= "<option value='" . $i . "'>" . $i . "</option>";
                                }
                        }
                        
                }

                $cbxZapato .= "</select>";
                                
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
                . $cbxSucursal
                //."<input class='form-control' type='text' id='sucursal_act' value='" . $usuariodto->getSucursal() .  "' >"
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
                ."<label class='form-label'>Salario</label>"
                ."<input class='form-control' type='text' id='salario' value='" . $usuariodto->getSalario() .  "' >"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Valor día</label>"
                ."<input class='form-control' type='text' id='valor_dia' value='" . $usuariodto->getValor_dia() .  "' readonly>"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Valor hora</label>"
                ."<input class='form-control' type='text' id='valor_hora' value='" . $usuariodto->getValor_hora() .  "' readonly>"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."</div>"

                ."<div class='row'>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Cesantía</label>"
                . $cbxCesantia
                ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Clase de riesgo</label>"
                . $cbxClaseRiesgo
                ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Porcentaje riesgo</label>"
                ."<input class='form-control' type='text' id='porcentaje_riesgo' value='' readonly>"
                ."<small class='text-danger'></small>"
                ."</div>"
                
                ."</div>"

                ."<div class='row'>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Sección</label>"
                . $cbxSeccion
                //."<input class='form-control' type='text' id='seccion_act' value='" . $usuariodto->getSeccion() .  "' >"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Area</label>"
                . $cbxArea
                //."<input class='form-control' type='text' id='area_act' value='" . $usuariodto->getArea() .  "' >"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Cargo</label>"
                . $cbxCargo
                //."<input class='form-control' type='text' id='cargo_act' value='" . $usuariodto->getCargo() .  "' >"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."</div>"

                ."<div class='row justify-content-center'>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Pension</label>"
                . $cbxPension
                //."<input class='form-control' type='text' id='pension_act' value='" . $usuariodto->getPension() .  "' >"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Tipo de dotación</label>"
                . $cbxTipoDotacion
                ."<small class='text-danger'></small>"
                ."</div>"
                ."<div class='col-4 my-2'>"
                ."<label class='form-label'>Perfil</label>"
                . $cbxPerfil
                ."<small class='text-danger'></small>"
                ."</div>"
                
                ."</div>"

                ."<div class='row'>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Camisa</label>"
                . $cbxCamisa
                ."<small class='text-danger'></small>"
                ."</div>"

                ."<div class='col my-2'>"
                ."<label class='form-label'>Pantalón</label>"
                . $cbxPantalon
                ."<small class='text-danger'></small>"
                ."</div>"

                ."<div class='col my-2'>"
                ."<label class='form-label'>Zapato</label>"
                . $cbxZapato
                ."<small class='text-danger'></small>"
                ."</div>"
                
                ."</div>"

                ."<div class='row'>"
                ."<div class='col-6 my-2'>"
                ."<label class='form-label'>Estado</label>"
                . $cbxEstado
                ."<small class='text-danger'></small>"
                ."</div>"

                ."<div class='col-6 my-2'>"
                ."<label class='form-label'>Fecha de retiro</label>"
                ."<input class='form-control' type='date' id='fecha_retiro_act' value='" . $usuariodto->getFecha_retiro() .  "' readonly>"
                ."<small class='text-danger'></small>"
                ."</div>"
                
                ."</div>"

                
                ."<div class='row'>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Motivo de retiro</label>"
                ."<input class='form-control' type='text' id='motivo_retiro_act' value='" . $usuariodto->getMotivo_retiro() .  "' readonly>"
                ."<small class='text-danger'></small>"
                ."</div>"
                ."</div>"
                
                ."</form>";
        break;
}


echo $form;