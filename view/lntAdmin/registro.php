<?php
    session_start();
    require_once ('../../config/conexion.php');
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
    require_once ('../../models/DAO/CesantiaDAO.php');
    require_once ('../../models/DAO/ClaseRiesgoDAO.php');
    require_once ('../../models/DAO/TipoDotacionDAO.php');
    require_once ('../../models/DAO/LugarResidenciaDAO.php');


    // Instanciar los objetos
    $perfildao = new PerfilDAO();
    //$estadodao = new EstadoDAO();
    $tipoContratodao = new TipoContratoDAO();
    $tipoDocumentodao = new TipoDocumentoDAO();
    $generodao = new GeneroDAO();
    $estadoCivildao = new EstadoCivilDAO();
    $casadao = new CasaDAO();
    $estadodao = new EstadoDAO();
    $tipoSangredao = new TipoSangreDAO();

    $nivelAcademicodao = new NivelAcademicoDAO();
    $epsdao = new EpsDAO();
    $sucursaldao = new SucursalDAO();
    $areadao = new AreaDAO();
    $secciondao = new SeccionDAO();
    $cargodao = new CargoDAO();
    $pensiondao = new PensionDAO();
    $tipoDotaciondao = new TipoDotacionDAO();
    $cesantiadao = new CesantiaDAO();
    $claseRiesgodao = new ClaseRiesgoDAO();
    $lugarResidenciadao = new LugarResidenciaDAO();


    // Traer las listas de las tablas necesarias para realizar un registro

    $listaPerfiles = $perfildao->listaPerfiles();
    //$listaEstados = $estadodao->listaEstados();
    $listaTiposContratos = $tipoContratodao->listaTiposContratos();
    $listaTiposDocumentos = $tipoDocumentodao->listaTiposDocumentos();
    $listaGeneros = $generodao->listaGeneros();
    $listaEstados = $estadodao->listaEstados();
    $listaEstadosCiviles = $estadoCivildao->listaEstadosCiviles();
    $listaCasas = $casadao->listaCasas();
    $listaTipoSangre = $tipoSangredao->listaTiposSangre();

    $listaNivelesAcademicos = $nivelAcademicodao->listaNivelesAcademicos();
    $listaEps = $epsdao->listaEpss();
    $listaSucursales = $sucursaldao->listaSucursales();
    $listaAreas = $areadao->listaAreas();
    $listaSeccion = $secciondao->listaSecciones();
    $listaCargos = $cargodao->listaCargos();
    $listaPensiones = $pensiondao->listaPensiones();
    $listaTiposDotaciones = $tipoDotaciondao->listaTiposDotaciones();
    $listaCesantias = $cesantiadao->listaCesantias();
    $listaClasesRiesgos = $claseRiesgodao->listaClasesRiesgos();
    $listaLugaresResidencia = $lugarResidenciadao->ListaLugaresResidencia();


    if (isset($_SESSION['id_admin'])) {

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperOriente - Admin</title>
    <link rel="shortcut icon" href="../img/logo.png" type="image/ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4240342587.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../../public/js/jquery.js"></script>

</head>
<body>
    <!--------------- Body form -------- -->
    <div class="container-fluid ps-0">
        <div class="py-3">
            <?php include_once("menu2.php"); ?>
         </div>
        <div class="row justify-content-center">
            <?php include_once("menu.php"); ?>
            <div class="col-10 ps-0 py-5" id="cuerpo-pagina">
                <div class="row pb-4">
                    <div class="col">
                        <h2 class="text-center">Registrar Empleado</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-9">
                        <div class="card text-center">
                            <div class="card-header bg-light">
                                <h4>Ingresa un empleado <span class="text-danger fs-6"> (Campos importantes * )</span></h4>
                            </div>
                            <div class="card-body">
                                <div class="form-registro my-3">
                                    <form method="post" action="" id="form-registro-empleado" enctype="multipart/form-data">
                                        <div class="d-flex overflow-hidden" id="cont-campos">
                                            <div id="datos-personales" class="cont-registro">
                                                <h3>Datos Personales</h3>
                                                <div class="row align-items-end">
                                                    
                                                    <div class=" col my-3">
                                                        <select id="tipo_documento" class="form-select">
                                                            <option value="">Tipo de documento *</option>
                                                            <?php
                                                            
                                                                for ($i=0; $i < count($listaTiposDocumentos); $i++) { 
                                                                    ?>
                                                                        <option value="<?php echo $listaTiposDocumentos[$i]->getId_tipo_documento() ?>"><?php echo $listaTiposDocumentos[$i]->getTipo_documento() ?></option>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </select> 
                                                        <small class="text-danger"></small>  
                                                    </div>
                                                    <div class="col my-3">
                                                        <input class="form-control" type="text" id="id_empleado" placeholder="Número de documento *">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <div class="col my-3">
                                                        <label for="fecha_expedicion" class="form-label">Fecha de expedición</label>
                                                        <input class="form-control" type="date" id="fecha_expedicion" placeholder="Fecha de expedición *">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                <div class=" col my-3">
                                                        <input class="form-control" type="text" id="lugar_expedicion" placeholder="Lugar expedición *">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="col my-3">
                                                        <input class="form-control" type="text" id="nombre" placeholder="Nombre *">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <div class=" col my-3">
                                                        <input class="form-control" type="text" id="apellido" placeholder="Apellido *">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col my-3">
                                                        <input class="form-control" type="text" id="telefono_fijo" placeholder="Teléfono Fijo">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <div class="col my-3">
                                                        <input class="form-control" type="text" id="telefono_movil" placeholder="Teléfono Móvil">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <div class="col my-3">
                                                        <select id="estrato" class="form-select">
                                                            <option value="">Estrato * </option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                        </select>
                                                    </div>
                                                    <div class="col my-3">
                                                        <select class="form-select" id="tipo_casa">
                                                            <option value="">Tipo de vivienda *</option>
                                                            <?php
                                                                for ($i=0; $i < count($listaCasas); $i++) { 
                                                                    ?>
                                                                        <option value="<?php echo $listaCasas[$i]->getId_casa() ?>"><?php echo $listaCasas[$i]->getNombre() ?></option>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </select>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- <div class=" col my-3">
                                                        <input class="form-control" type="text" id="cargo" placeholder="Cargo">
                                                        <small class="text-danger"></small>
                                                    </div> -->
                                                </div>
                                                <div class="row align-items-end">
                                                     <div class="col mt-1 mb-3">
                                                        <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                                                        <input class="form-control fecha_nacimiento" type="date" id="fecha_nacimiento"  placeholder="Fecha de nacimiento *">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <div class="col my-3">
                                                        <input class="form-control" type="number" id="edad" placeholder="Edad *" readonly>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <div class=" col my-3">
                                                        
                                                        <select class="form-select" id="genero">
                                                            <option value="">Seleccionar género *</option>
                                                            <?php
                                                                for ($i=0; $i < count($listaGeneros); $i++) { 
                                                                    ?>
                                                                        <option value="<?php echo $listaGeneros[$i]->getId_genero() ?>"><?php echo $listaGeneros[$i]->getNombre() ?></option>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </select>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    
                                                    <div class="col my-3">
                                                        <select class="form-select" id="nivel_academico">
                                                                <option value="">Seleccionar nivel academico *</option>
                                                                <?php
                                                                        for ($i=0; $i < count($listaNivelesAcademicos); $i++) { 
                                                                            ?>
                                                                            <option value="<?php echo $listaNivelesAcademicos[$i]->getId_nivel_academico(); ?>"> <?php echo $listaNivelesAcademicos[$i]->getNombre(); ?></option>
                                                                            <?php
                                                                        }
                                                                ?>
                                                        </select>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    
                                                    <div class="col my-3">
                                                        <input class="form-control" type="text" id="area_academica" placeholder="Area academica">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <div class="col my-3">
                                                        <select class="form-select" id="estado_civil">
                                                            <option value="">Seleccionar estado civil *</option>
                                                            <?php
                                                                for ($i=0; $i < count($listaEstadosCiviles); $i++) { 
                                                                    ?>
                                                                        <option value="<?php echo $listaEstadosCiviles[$i]->getId_estado_civil(); ?>"><?php echo $listaEstadosCiviles[$i]->getNombre(); ?></option>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </select>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <div class="col my-3">
                                                        <select class="form-select" id="eps">
                                                            <option value="">Seleccionar EPS *</option>
                                                            <?php
                                                                    for ($i=0; $i < count($listaEps); $i++) { 
                                                                        ?>
                                                                        <option value="<?php echo $listaEps[$i]->getId_eps(); ?>"> <?php echo $listaEps[$i]->getNombre(); ?></option>
                                                                        <?php
                                                                    }
                                                            ?>
                                                        </select>                                              
                                                        <small class="text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col my-3">
                                                        <input class="form-control" type="text" id="nro_cuenta" placeholder="Numero cuenta de bancolombia *">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <div class="col my-3">
                                                         <select class="form-select" id="tipo_sangre">
                                                            <option value="">Seleccionar tipo de sangre con su rh *</option>
                                                            <?php
                                                                for ($i=0; $i < count($listaTipoSangre); $i++) { 
                                                                    ?>
                                                                        <option value="<?php echo $listaTipoSangre[$i]->getId_tipo_sangre_rh(); ?>"><?php echo $listaTipoSangre[$i]->getNombre(); ?></option>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </select>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <div class="col my-3">
                                                        <select class="form-select" id="lugar_residencia">
                                                            <option value="">Lugar de residencia</option>
                                                            <?php
                                                                for ($i=0; $i < count($listaLugaresResidencia); $i++) { 
                                                                    ?>
                                                                        <option value="<?php echo $listaLugaresResidencia[$i]->getId_lugar_residencia(); ?>"><?php echo $listaLugaresResidencia[$i]->getNombre(); ?></option>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </select>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                <div class=" col my-3">
                                                        <input class="form-control" type="text" id="direccion" placeholder="Dirección">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    
                                                    <div class="col mt-1 mb-3">
                                                        <textarea class="form-control" id="antecedentes" placeholder="Antecedentes"></textarea>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mt-1 mb-3">
                                                        <textarea class="form-control" id="practica_deporte" placeholder="¿Practica deporte? ¿Cual?"></textarea>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <div class="col mt-1 mb-3">
                                                        <textarea class="form-control" id="consumo_cigarros" placeholder="¿Cuantos cigarrillos se fuma a la semana?"></textarea>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mt-1 mb-3">
                                                        <textarea class="form-control" id="consumo_licor" placeholder="¿Cuantas copas de licor se toma a la semana?"></textarea>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <div class="col mt-1 mb-3">
                                                        <textarea class="form-control" id="consumo_spa" placeholder="¿Con que frecuencia consume sustancias alucinogenas?"></textarea>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col my-3">
                                                        <input class="form-control" type="email" id="correo" placeholder="Correo Electrónico *">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <div class="col my-3">
                                                        <input class="form-control" type="password" id="pass" placeholder="Contraseña *">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col my-3">
                                                        <input class="form-control" type="text" id="nombre_persona_emergencia" placeholder="En caso de emergencia llamar a...">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <div class="col my-3">
                                                        <input class="form-control" type="text" id="telefono_emergencia" placeholder="Teléfono Fijo (Persona de emergencia)">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col my-3">
                                                        <input class="form-control" type="text" id="celular_emergencia" placeholder="Teléfono Móvil(Persona de emergencia)">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <div class="col my-3">
                                                        <input class="form-control" type="text" id="parentesco_emergencia" placeholder="Parentesco (Persona de emergencia)">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                </div>
                                                <!-- <div class="row">
                                                    <div class="col my-3">
                                                        <label for="">Agregar una foto</label>
                                                        <input class="form-control" type="file" name="foto" id="foto">
                                                        <small class="text-danger"></small>
                                                    </div>
                                
                                                </div> -->
                                            </div>
                                            
                                            <div id="datos-laborales" class="cont-registro">
                                                <h3>Datos laborales</h3>
                                                <div class="row  align-items-end">
                                                    <div class=" col my-3">
                                                        <select class="form-select" id="sucursal">
                                                            <option value="">Seleccionar sucursal *</option>
                                                            <?php
                                                                    for ($i=0; $i < count($listaSucursales); $i++) { 
                                                                        ?>
                                                                        <option value="<?php echo $listaSucursales[$i]->getId_sucursal(); ?>"> <?php echo $listaSucursales[$i]->getNombre(); ?></option>
                                                                        <?php
                                                                    }
                                                            ?>
                                                        </select>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <div class="col my-3">
                                                    
                                                        <select id="tipo_contrato" class="form-select">
                                                            <option value="" selected>Tipo de contrato *</option>
                                                            <?php
                                                            
                                                                for ($i=0; $i < count($listaTiposContratos); $i++) { 
                                                                    ?>
                                                                        <option value="<?php echo $listaTiposContratos[$i]->getId_tipo_contrato(); ?>"><?php echo $listaTiposContratos[$i]->getNombre(); ?></option>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </select> 
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <div class=" col my-3">
                                                        <label for="fecha_ingreso" class="form-label">Fecha de ingreso</label>
                                                        <input class="form-control" type="date" id="fecha_ingreso" placeholder="Fecha de ingreso *">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row align-items-end">
                                                    <div class=" col my-3">
                                                        <label for="fecha_retiro" class="form-label">Fecha de retiro</label>
                                                        <input class="form-control" type="date" id="fecha_retiro" placeholder="Fecha_retiro">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <div class=" col my-3">
                                                        <textarea class="form-control" type="text" id="motivo_retiro" placeholder="Motivo del retiro"></textarea>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class=" col my-3">
                                                        <input class="form-control" type="text" id="salario" placeholder="Salario *">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <div class=" col my-3">
                                                        <input class="form-control" type="text" id="valor_dia" placeholder="Valor día *" readonly>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <div class=" col my-3">
                                                        <input class="form-control" type="text" id="valor_hora" placeholder="Valor Hora *" readonly>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class=" col-4 my-3">
                                                         <select id="cesantia" class="form-select">
                                                            <option value="" selected>Cesantía *</option>
                                                            <?php
                                                            
                                                                for ($i=0; $i < count($listaCesantias); $i++) { 
                                                                    ?>
                                                                        <option value="<?php echo $listaCesantias[$i]->getId_cesantia(); ?>"><?php echo $listaCesantias[$i]->getNombre(); ?></option>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </select>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <div class=" col-4 my-3">
                                                    <select id="clase-riesgo" class="form-select">
                                                            <option value="" selected>Clase de riesgo *</option>
                                                            <?php
                                                            
                                                                for ($i=0; $i < count($listaClasesRiesgos); $i++) { 
                                                                    ?>
                                                                        <option value="<?php echo $listaClasesRiesgos[$i]->getId_clase_riesgo(); ?>"><?php echo $listaClasesRiesgos[$i]->getNombre(); ?></option>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </select>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <div class=" col-4 my-3">
                                                        <input class="form-control" type="text" id="porcentaje_riesgo" placeholder="Porcentaje de riesgo" readonly>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class=" col my-3">
                                                        <select id="seccion" class="form-select">
                                                            <option value="" selected>Sección *</option>
                                                            <?php
                                                            
                                                                for ($i=0; $i < count($listaSeccion); $i++) { 
                                                                    ?>
                                                                        <option value="<?php echo $listaSeccion[$i]->getId_seccion(); ?>"><?php echo $listaSeccion[$i]->getNombre(); ?></option>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </select>
                                                        
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <div class=" col my-3">
                                                        <select id="area" class="form-select">
                                                            <option value="">Area</option>
                                                            
                                                            <?php
                                                            
                                                            for ($i=0; $i < count($listaAreas); $i++) { 
                                                                    ?>
                                                                        <option value="<?php echo $listaAreas[$i]->getId_area(); ?>" class="d-none opc-area"><?php echo $listaAreas[$i]->getNombre(); ?></option>
                                                                    <?php
                                                                }
                                                            ?>
                                                            

                                                        </select>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <div class=" col my-3">
                                                        <select id="cargo" class="form-select">
                                                            <option value="">Cargo</option>
                                                            
                                                        </select>
                                                        
                                                        <small class="text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class=" col my-3">
                                                        <select class="form-select" id="pension">
                                                                <option value="">Seleccionar pension *</option>
                                                                <?php
                                                                    for ($i=0; $i < count($listaPensiones); $i++) { 
                                                                        ?>
                                                                            <option value="<?php echo $listaPensiones[$i]->getId_pension(); ?>"><?php echo $listaPensiones[$i]->getNombre(); ?></option>
                                                                        <?php
                                                                    }
                                                                ?>
                                                        </select>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <div class=" col my-3">
                                                        <select class="form-select" id="tipo_dotacion">
                                                            <option value="">Tipo de dotación *</option>
                                                            <?php
                                                                for ($i=0; $i < count($listaTiposDotaciones); $i++) { 
                                                                    ?>
                                                                        <option value="<?php echo $listaTiposDotaciones[$i]->getId_tipo_dotacion(); ?>"><?php echo $listaTiposDotaciones[$i]->getNombre(); ?></option>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </select>
                                                        <small class="text-danger"></small>
                                                    </div>

                                                    <div class="col my-3">

                                                        <select id="perfil" class="form-select">
                                                            <option value="" selected>Seleccione perfil *</option>
                                                            <?php
                                                            
                                                                for ($i=0; $i < count($listaPerfiles); $i++) { 
                                                                    ?>
                                                                        <option value="<?php echo $listaPerfiles[$i]->getId_perfil() ?>"><?php echo $listaPerfiles[$i]->getPerfil() ?></option>
                                                                    <?php
                                                                }
                                                            ?>
                                                        
                                                        </select>
                                                        <small class="text-danger"></small>
                                                        
                                                    </div>
                            
                                                </div>
                                                <div class="row my-3">
                                                    <div class="col-4">
                                                        <select class="form-select" id="talla_camisa">
                                                            <option value="">Camisa</option>
                                                            <option value="XS">XS</option>
                                                            <option value="S">S</option>
                                                            <option value="M">M</option>
                                                            <option value="L">L</option>
                                                            <option value="XL">XL</option>
                                                            <option value="XXL">XXL</option>
                                                        </select>
                                                        <small class="text-danger"></small>

                                                    </div>
                                                    <div class="col-4">
                                                        <select class="form-select" id="talla_pantalon">
                                                            <option value="">Pantalon</option>
                                                            <?php
                                                            for ($i=4; $i < 45; $i++) : 
                                                                if ($i % 2 == 0) :
                                                                    ?>
                                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                                    <?php
                                                                endif;
                                                            endfor;
                                                            ?>
                                                        </select>
                                                        <small class="text-danger"></small>

                                                    </div>
                                                    <div class="col-4">
                                                        <select class="form-select" id="talla_zapato">
                                                            <option value="">Zapato</option>
                                                            <?php
                                                            for ($i=34; $i < 43; $i++) : 
                                                            
                                                                    ?>
                                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                                    <?php
                                    
                                                            endfor;
                                                            ?>
                                                        </select>
                                                        <small class="text-danger"></small>

                                                    </div>
                                                </div>
                                                <div class="row justify-content-center">
                                                    <div class=" col-4 my-3">
                                                        <select class="form-select" id="estado">
                                                            <option value="">Seleccionar estado *</option>
                                                            <?php
                                                                for ($i=0; $i < count($listaEstados); $i++) { 
                                                                    ?>
                                                                        <option value="<?php echo $listaEstados[$i]->getId_estado(); ?>"><?php echo $listaEstados[$i]->getNombre(); ?></option>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </select>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="datos-familiares" class="cont-registro">
                                                <h3>Datos familiares <span class="fs-4">(Personas con las que vive)</span></h3>
                                                <div id="cont-familiares">
                                
                                                </div>
                                                
                                                <div class="row mt-3 justify-content-center" id="opc-familiar">
                                                    <div class="col-4">
                                                        <button type="button" class="btn btn-verde" id="agregar-familiar">Agregar familiar</button>
                                                    </div>
                                                    <div class="col-4 d-none cont-remover-familiar">
                                                        <button type="button" class="btn btn-verde" id="remover-familiar">Remover familiar</button>
                                                    </div>
                                                </div>

                                                <h3 class="mt-5">Hijos</h3>
                                                <div id="cont-hijos">
                                                    
                                                </div>
                                                
                                                <div class="row mt-3 justify-content-center" id="opc-hijo">
                                                    <div class="col-4">
                                                        <button type="button" class="btn btn-verde" id="agregar-hijo">Agregar hijo(a)</button>
                                                    </div>
                                                    <div class="col-4 d-none cont-remover-hijo">
                                                        <button type="button" class="btn btn-verde" id="remover-hijo">Remover hijo(a)</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                       
                                        
                                        <div class="row">
                                            <div class="col my-2 d-flex justify-content-between">
                                                <input type="button" class="btn btn-verde px-5" id="btn-atras" value="< Volver" disabled></input>
                                                <input type="button" class="btn btn-verde px-5" id="btn-registrar-empleado" value="Siguiente >"></input>
                                            </div>
                                           
                                        </div>
                                        <div id="rta-registro-empleado" class="my-2">

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
   

    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    
    <script src="../js/app.js"></script>
</body>
</html>

<?php
        
    }else{
        header("Location: ../../index.php");
    }
?>