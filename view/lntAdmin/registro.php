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

    if (isset($_SESSION['id_admin'])) {

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperOriente - Iniciar Sesión</title>
    <link rel="shortcut icon" href="../img/logo.png" type="image/ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../../public/js/jquery.js"></script>

</head>
<body>
    <!--------------- Body form -------- -->
    <div class="container-fluid ps-0">
        <div class="row">
            <?php include_once("menu.php"); ?>
            <div class="col-10 ps-0 py-5">
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
                                    <form action="" id="form-registro-empleado">
                                        <div class="d-flex overflow-hidden" id="cont-campos">
                                            <div id="datos-personales" class="cont-registro">
                                                <h3>Datos Personales</h3>
                                                <div class="row">
                                                    
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
                                                        <select class="form-select" id="tipo_casa">
                                                            <option value="">Seleccionar tipo de casa *</option>
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
                                                <div class="row">
                                                    
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
                                                        <input class="form-control" type="number" id="edad" placeholder="Edad *">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <div class="col my-3">
                                                        <input class="form-control" type="text" id="nivel_academico" placeholder="Nivel Academico">
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
                                                         <input class="form-control" type="text" id="eps" placeholder="EPS *">
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
                                                        <input class="form-control" id="lugar_residencia" placeholder="Lugar de residencia"></input>
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
                                            </div>
                                            
                                            <div id="datos-laborales" class="cont-registro">
                                                <h3>Datos laborales</h3>
                                                <div class="row">
                                                    <div class=" col my-3">
                                                        <input class="form-control" type="text" id="sucursal" placeholder="Sucursal *">
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
                                                        <input class="form-control" type="date" id="fecha_ingreso" placeholder="Fecha de ingreso *">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class=" col my-3">
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
                                                        <input class="form-control" type="text" id="valor_dia" placeholder="Valor día *">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <div class=" col my-3">
                                                        <input class="form-control" type="text" id="valor_hora" placeholder="Valor Hora *">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class=" col-9 my-3">
                                                        <input class="form-control" type="text" id="clase_riesgo" placeholder="Clase de riesgo">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <div class=" col-3 my-3">
                                                        <input class="form-control" type="text" id="porcentaje_riesgo" placeholder="Porcentaje de riesgo">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class=" col my-3">
                                                        <input class="form-control" type="text" id="area" placeholder="Area *">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <div class=" col my-3">
                                                        <input class="form-control" type="text" id="seccion" placeholder="Sección *">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <div class=" col my-3">
                                                        <input class="form-control" type="text" id="cargo" placeholder="Cargo *">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class=" col my-3">
                                                        <input class="form-control" type="text" id="pension" placeholder="Pensión">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <div class=" col my-3">
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
                                                <div class="familiar1 border-bottom my-1 pb-1"  >
                                                    <div class="row">
                                                        <div class="col my-3">
                                                            <input class="form-control" type="text" id="id_familiar" placeholder="Nro de documento">
                                                            <small class="text-danger"></small>
                                                            
                                                        </div>
                                                        <div class="col my-3">
                                                            <input class="form-control" type="text" id="nombre-familiar" placeholder="Nombre">
                                                            <small class="text-danger"></small>
                                                            
                                                        </div>
                                                        <div class="col my-3">
                                                            <input class="form-control" type="text" id="apellido-familiar" placeholder="Apellido">
                                                            <small class="text-danger"></small>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col my-3">
                                                            <input class="form-control" type="number" id="edad-familiar" placeholder="Edad">
                                                            <small class="text-danger"></small>
                                                            
                                                        </div>
                                                        <div class="col my-3">
                                                            <input class="form-control" type="text" id="escolaridad-familiar" placeholder="Escolaridad">
                                                            <small class="text-danger"></small>
                                                            
                                                        </div>
                                                        <div class="col my-3">
                                                            <input class="form-control" type="text" id="parentesco-familiar" placeholder="Parentesco">
                                                            <small class="text-danger"></small>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col">
                                                        <button type="button" class="btn btn-verde" id="agregar-familiar">Agregar familiar</button>
                                                    </div>
                                                </div>
                                               <!--  <div class="familiar2 border-bottom my-2 pb-2"  >
                                                    <div class="row">
                                                        <div class="col my-3">
                                                            <input class="form-control" type="text" id="id_familiar" placeholder="Nro de documento">
                                                            <small class="text-danger"></small>
                                                            
                                                        </div>
                                                        <div class="col my-3">
                                                            <input class="form-control" type="text" id="nombre-familiar" placeholder="Nombre">
                                                            <small class="text-danger"></small>
                                                            
                                                        </div>
                                                        <div class="col my-3">
                                                            <input class="form-control" type="text" id="apellido-familiar" placeholder="Apellido">
                                                            <small class="text-danger"></small>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col my-3">
                                                            <input class="form-control" type="number" id="edad-familiar" placeholder="Edad">
                                                            <small class="text-danger"></small>
                                                            
                                                        </div>
                                                        <div class="col my-3">
                                                            <input class="form-control" type="text" id="escolaridad-familiar" placeholder="Escolaridad">
                                                            <small class="text-danger"></small>
                                                            
                                                        </div>
                                                        <div class="col my-3">
                                                            <input class="form-control" type="text" id="parentesco-familiar" placeholder="Parentesco">
                                                            <small class="text-danger"></small>
                                                            
                                                        </div>
                                                    </div>
                                                </div> -->

                                                <h3 class="mt-5">Hijos</h3>
                                                <div class="familiar1 border-bottom my-1 pb-1"  >
                                                    <div class="row">
                                                        <!-- <div class="col my-3">
                                                            <input class="form-control" type="text" id="id_hijo" placeholder="Nro de documento">
                                                            <small class="text-danger"></small>
                                                            
                                                        </div> -->
                                                        <div class="col my-3">
                                                            <input class="form-control" type="text" id="nombre_hijo" placeholder="Nombre">
                                                            <small class="text-danger"></small>
                                                            
                                                        </div>
                                                        <div class="col my-3">
                                                            <input class="form-control" type="text" id="apellido_hijo" placeholder="Apellido">
                                                            <small class="text-danger"></small>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col my-3">
                                                            <input class="form-control" type="number" id="edad_hijo" placeholder="Edad">
                                                            <small class="text-danger"></small>
                                                            
                                                        </div>
                                                        <div class="col my-3">
                                                            <input class="form-control" type="date" id="fecha_nacimiento_hijo" placeholder="Escolaridad">
                                                            <small class="text-danger"></small>
                                                            
                                                        </div>
                                                        <!-- <div class="col my-3">
                                                            <input class="form-control" type="text" id="id_empleado" placeholder="">
                                                            <small class="text-danger"></small>
                                                            
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                       
                                        <div class="row mt-3">
                                            <div class=" col mt-1 mb-3">

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
                                            <div class="col mt-1 mb-3">
                                                <input class="form-control" type="date" id="fecha_nacimiento" placeholder="Fecha de nacimiento *">
                                                <small class="text-danger"></small>
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