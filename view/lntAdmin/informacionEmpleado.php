<?php
    require_once ('../../models/DAO/UsuarioDAO.php');
    require_once ('../../models/DAO/FamiliarDAO.php');
    require_once ('../../models/DAO/HijoDAO.php');
    require_once ('../../models/DAO/CamisaDAO.php');
    require_once ('../../models/DAO/PantalonDAO.php');
    require_once ('../../models/DAO/ZapatoDAO.php');
    require_once ('../../models/DAO/OtraVestimentaDAO.php');
    require_once ('../../models/DAO/NivelAcademicoDAO.php');
    require_once ('../../models/DAO/HistorialContratoDAO.php');
    require_once ('../../models/DAO/TipoDocumentoDAO.php');
    require_once ('../../models/DAO/HistorialDotacionDAO.php');
    require_once ('../../models/DAO/HistorialCargoDAO.php');
    require_once ('../../models/DAO/DocumentoDAO.php');

    session_start();
    

    if (isset($_SESSION['id_admin'])) {

        $usuariodao = new UsuarioDAO();
        $familiardao = new FamiliarDAO();
        $hijodao = new HijoDAO();
        $camisadao = new CamisaDAO();
        $pantalondao = new PantalonDAO();
        $zapatodao = new ZapatoDAO();
        $otraVestimentadao = new OtraVestimentaDAO();
        $nivelAcademicodao = new NivelAcademicoDAO();
        $historialContratodao = new HistorialContratoDAO();
        $tipoDocumentodao = new TipoDocumentoDAO();
        $historialDotaciondao = new HistorialDotacionDAO();
        $historialCargodao = new HistorialCargoDAO();
        $documentodao = new DocumentoDAO();

        $listaUsuario = $usuariodao->listaUsuario($_GET['doc']);
        $listaFamiliar = $familiardao->listaFamiliar($_GET['doc']);
        $listaHijo = $hijodao->listaHijo($_GET['doc']);
        $listaCamisas = $camisadao->listaCamisas();
        $listaPantalones = $pantalondao->listaPantalones();
        $listaZapatos = $zapatodao->listaZapatos();
        $listaVestimenta = $otraVestimentadao->listaVestimentas();
        $listaNivelesAcademicos = $nivelAcademicodao->listaNivelesAcademicos();
        $listaHistorialContratos = $historialContratodao->listaHistorialContratos($_GET['doc']);
        $listaTiposDocumento = $tipoDocumentodao->listaTiposDocumentos();
        $listaHistorialDotaciones = $historialDotaciondao->listaHistorialDotaciones($_GET['doc']);
        $listaHistorialCargos = $historialCargodao->listaHistorialCargo($_GET['doc']);
        $listaDocumentos = $documentodao->listaDocumentos($_GET['doc']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperOriente - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4240342587.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../../public/js/jquery.js"></script>

    
</head>
<body>
    <!--------------- Body form ----------- -->

    <main>
        <div class="container mt-4 mb-5">
            <div class="row">
                <div class="col my-2">
                    <a href="personal.php" class="texto-verde-oscuro fs-5"> << Volver al directorio</a>
                </div>
            </div>
            <div class="row justify-content-center py-3 border position-relative bg-light" id="cont-foto-perfil-nombre">
                <div class="col-6 d-flex flex-column justify-content-center align-items-center">
                    <div class="cont-foto-empleado my-3">

                        <?php if (!empty($listaUsuario->getFoto())) : ?>
                            <img src="<?=$listaUsuario->getFoto(); ?>">
                        <?php else: ?>
                            <img src="../img/foto-perfil.png" class="w-100">
                        <?php endif;?>
                    </div>
                    <p class="fs-3 texto-negro-opaco"><?php echo $listaUsuario->getNombre() . ' ' . $listaUsuario->getApellido() ?></p>
                </div>
            </div>
            <div id="nav-info-empleado" class="border">
                <div class="row">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item seleccionado">
                                        <a class="nav-link enlace-info-empleado" aria-current="page" id="enlace-perfil" href="#">Perfil</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link enlace-info-empleado" id="enlace-familiares" href="#">Familiares</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link enlace-info-empleado" id="enlace-dotacion" href="#">Dotación</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link enlace-info-empleado" id="enlace-documentos" href="#">Documentos</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>     
            </div>
            <div id="cont-perfil" class="my-4 cont-gestion-empleado">
                <div class="row my-4">
                   
                    <div class="col bg-light p-4 border position-relative">
                        <div id="datos-personales-buscados" class="d-none"></div>
                        <div id="info-datos-personales">
                            <h3 class="titulo-perfil">Datos personales</h3>
                            <div class="row">
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> Tipo de documento</h4>
                                    <p class="my-1"><?php echo $listaUsuario->getTipo_documento(); ?></p>
                                </div>
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> Número de documento</h4>
                                    <p class="my-1"><?php echo $listaUsuario->getId_usuario(); ?></p>
                                </div>
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> Fecha de expedición (Doc)</h4>
                                    <p class="my-1"><?php echo $listaUsuario->getFecha_expedicion(); ?></p>
                                </div>
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> Lugar de expedición</h4>
                                    <p class="my-1"><?php echo $listaUsuario->getLugar_expedicion(); ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> Teléfono fijo</h4>
                                    <p class="my-1"><?php echo $listaUsuario->getTelefono_fijo(); ?></p>
                                </div>
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> Teléfono móvil</h4>
                                    <p class="my-1"><?php echo $listaUsuario->getTelefono_movil(); ?></p>
                                </div>
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> Casa</h4>
                                    <p class="my-1"><?php echo $listaUsuario->getTipo_casa(); ?></p>
                                </div>
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> Estrato</h4>
                                    <p class="my-1"><?php echo $listaUsuario->getEstrato(); ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> Género</h4>
                                    <p class="my-1"><?php echo $listaUsuario->getGenero(); ?></p>
                                </div>
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> Edad</h4>
                                    <p class="my-1"><?php echo $listaUsuario->getEdad(); ?></p>
                                </div>
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> Fecha de nacimiento</h4>
                                    <p class="my-1"><?php echo $listaUsuario->getFecha_nacimiento(); ?></p>
                                </div>
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> Nivel académico</h4>
                                    <p class="my-1"><?php echo $listaUsuario->getNivel_academico(); ?></p>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> Area académica</h4>
                                    <p class="my-1"><?php echo $listaUsuario->getArea_academica(); ?></p>
                                </div>
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> Estado civil</h4>
                                    <p class="my-1"><?php echo $listaUsuario->getEstado_civil(); ?></p>
                                </div>
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> EPS</h4>
                                    <p class="my-1"><?php echo $listaUsuario->getEps(); ?></p>
                                </div>
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> Número de cuenta</h4>
                                    <p class="my-1"><?php echo $listaUsuario->getNro_cuenta(); ?></p>
                                </div>
                                
                            </div>
                            <div class="row">
                             <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> Tipo de sangre y RH</h4>
                                    <p class="my-1"><?php echo $listaUsuario->getTipo_sangre(); ?></p>
                                </div>
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> Lugar de residencia</h4>
                                    <p class="my-1"><?php echo $listaUsuario->getLugar_residencia(); ?></p>
                                </div>
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> Dirección</h4>
                                    <p class="my-1"><?php echo $listaUsuario->getDireccion(); ?></p>
                                </div>
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> Antecedentes</h4>
                                    <p class="my-1"><?php echo $listaUsuario->getAntecedentes(); ?></p>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> ¿Practica deporte? ¿Cual?</h4>
                                    <p class="my-1"><?php echo $listaUsuario->getPractica_deporte(); ?></p>
                                </div>
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> ¿Cuanto cigarros se fuma a la semana?</h4>
                                    <p class="my-1"><?php echo $listaUsuario->getConsumo_cigarros(); ?></p>
                                </div>
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> ¿Cuantas copas de licor se toma a la semana?</h4>
                                    <p class="my-1"><?php echo $listaUsuario->getConsumo_licor(); ?></p>
                                </div>
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> ¿Con que frecuencia consume sustancias alucinogenas?</h4>
                                    <p class="my-1"><?php echo $listaUsuario->getConsumo_spa(); ?></p>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> Correo Eletrónico</h4>
                                    <p class="my-1"><?php echo $listaUsuario->getCorreo(); ?></p>
                                </div>
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> Perfil</h4>
                                    <p class="my-1"><?php echo $listaUsuario->getPerfil(); ?></p>
                                </div>
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> En caso de emergencia llamar a...</h4>
                                    <p class="my-1"><?php echo $listaUsuario->getNombre_persona_emergencia(); ?></p>
                                </div>
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> Teléfono fijo (Persona de emergencia)</h4>
                                    <p class="my-1"><?php echo $listaUsuario->getTelefono_emergencia(); ?></p>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> Teléfono Móvil (Persona de emergencia)</h4>
                                    <p class="my-1"><?php echo $listaUsuario->getCelular_emergencia(); ?></p>
                                </div>
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> Parentesco (Persona de emergencia)</h4>
                                    <p class="my-1"><?php echo $listaUsuario->getParentesco_emergencia(); ?></p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="position-absolute top-0 end-0 mt-3 me-5 pe-5">
                            <form action="" class="me-3">
                                <input type="search" class="form-control" placeholder="Buscar campos" id="buscador-campo-usuario">
                                <input type="text" id="doc" value="<?php echo $_GET['doc']; ?>" class="d-none">
                            </form>
                        </div>

                        <div class="position-absolute top-0 end-0 mt-3 me-3">
                            <button type="button" class="btn-editar-perfil px-3" id="btn-editar-datos-personales" value="<?php echo $_GET['doc']; ?>" data-bs-toggle="modal" data-bs-target="#modificar-datos-personales">Editar</button>
                        </div>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col bg-light p-4 border position-relative">
                        <h3 class="titulo-perfil">Datos laborales</h3>
                        <div class="row">
                            <div class="col-3 my-2">
                                <h4 class="fs-6 titulo-campos"> Sucursal</h4>
                                <p class="my-1"><?php echo $listaUsuario->getSucursal(); ?></p>
                            </div>
                            <div class="col-3 my-2">
                                <h4 class="fs-6 titulo-campos"> Tipo de contrato</h4>
                                <p class="my-1"><?php echo $listaUsuario->getTipo_contrato(); ?></p>
                            </div>
                            <div class="col-3 my-2">
                                <h4 class="fs-6 titulo-campos"> Fecha de ingreso</h4>
                                <p class="my-1"><?php echo $listaUsuario->getFecha_ingreso(); ?></p>
                            </div>
                            <div class="col-3 my-2">
                                <h4 class="fs-6 titulo-campos"> Fecha de retiro</h4>
                                <p class="my-1"><?php echo $listaUsuario->getFecha_retiro(); ?></p>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-3 my-2">
                                <h4 class="fs-6 titulo-campos">Antiguedad</h4>
                                <p class="my-1"><?php echo $listaUsuario->getAntiguedad(); ?></p>
                            </div>
                            <div class="col-3 my-2">
                                <h4 class="fs-6 titulo-campos"> Cesantía</h4>
                                <p class="my-1"><?php echo $listaUsuario->getCesantia(); ?></p>
                            </div>
                            <div class="col-3 my-2">
                                <h4 class="fs-6 titulo-campos"> Salario</h4>
                                <p class="my-1"><?php echo $listaUsuario->getSalario(); ?></p>
                            </div>
                            <div class="col-3 my-2">
                                <h4 class="fs-6 titulo-campos"> Valor del día</h4>
                                <p class="my-1"><?php echo $listaUsuario->getValor_dia(); ?></p>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-3 my-2">
                                <h4 class="fs-6 titulo-campos"> Valor de la hora</h4>
                                <p class="my-1"><?php echo $listaUsuario->getValor_hora(); ?></p>
                            </div>
                            
                            <div class="col-3 my-2">
                                <h4 class="fs-6 titulo-campos"> Sección</h4>
                                <p class="my-1"><?php echo $listaUsuario->getSeccion(); ?></p>
                            </div>
                            <div class="col-3 my-2">
                                <h4 class="fs-6 titulo-campos"> Area</h4>
                                <p class="my-1"><?php echo $listaUsuario->getArea(); ?></p>
                            </div>
                            <div class="col-3 my-2">
                                <h4 class="fs-6 titulo-campos"> Clase de riesgo</h4>
                                <p class="my-1"><?php echo $listaUsuario->getClase_riesgo(); ?></p>
                            </div>
                            
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-3 my-2">
                                <h4 class="fs-6 titulo-campos"> Cargo</h4>
                                <p class="my-1"><?php echo $listaUsuario->getCargo(); ?></p>
                            </div>
                            <div class="col-3 my-2">
                                <h4 class="fs-6 titulo-campos"> Pensión</h4>
                                <p class="my-1"><?php echo $listaUsuario->getPension(); ?></p>
                            </div>
                            <div class="col-3 my-2">
                                <h4 class="fs-6 titulo-campos"> Estado</h4>
                                <p class="my-1"><?php echo $listaUsuario->getEstado(); ?></p>
                            </div>
                            <div class="col-3 my-2">
                                <h4 class="fs-6 titulo-campos"> Tipo de dotacion</h4>
                                <p class="my-1"><?php echo $listaUsuario->getTipo_dotacion(); ?></p>
                            </div>
                            
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-3 my-2">
                                <h4 class="fs-6 titulo-campos">Camisa</h4>
                                <p class="my-1"><?php echo $listaUsuario->getTalla_camisa(); ?></p>
                            </div>
                            <div class="col-3 my-2">
                                <h4 class="fs-6 titulo-campos">Pantalón</h4>
                                <p class="my-1"><?php echo $listaUsuario->getTalla_pantalon(); ?></p>
                            </div>
                            <div class="col-3 my-2">
                                <h4 class="fs-6 titulo-campos">Zapato</h4>
                                <p class="my-1"><?php echo $listaUsuario->getTalla_zapato(); ?></p>
                            </div>
                            
                        </div>
                        <div class="position-absolute top-0 end-0 mt-3 me-3">
                            <button type="button" class="btn-editar-perfil px-3" id="btn-editar-datos-laborales" value="<?php echo $_GET['doc']; ?>" data-bs-toggle="modal" data-bs-target="#modificar-datos-laborales">Editar</button>
                        </div>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-12 bg-light p-4 border position-relative">
                        <h3 class="titulo-perfil">Datos familiares</h3>
                        <div class="row">
                            <div class="col">
                                <h4 class="fs-5 mb-3">Personas con las que vive</h4>
                            </div>
                        </div>
                        <?php 
                            
                            for ($i=0; $i < count($listaFamiliar); $i++) { 
                               ?>
                            <div class="row my-4">
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> Número de documento</h4>
                                    <p class="my-1"><?php echo $listaFamiliar[$i]->getId_familiar(); ?></p>
                                </div>
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> Nombre</h4>
                                    <p class="my-1"><?php echo $listaFamiliar[$i]->getNombre(); ?></p>
                                </div>
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> Apellido</h4>
                                    <p class="my-1"><?php echo $listaFamiliar[$i]->getApellido(); ?></p>
                                </div>
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> Edad</h4>
                                    <p class="my-1"><?php echo $listaFamiliar[$i]->getEdad(); ?></p>
                                </div>
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> Escolaridad</h4>
                                    <p class="my-1"><?php echo $listaFamiliar[$i]->getEscolaridad(); ?></p>
                                </div>
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> Parentesco</h4>
                                    <p class="my-1"><?php echo $listaFamiliar[$i]->getParentesco(); ?></p>
                                </div>
                            </div>
                        <?php
                            } 

                            if (!count($listaFamiliar) > 0) {
                                ?>
                                 <div class="col my-2 text-center">
                                    <h4 class="fs-6 titulo-campos"> No hay registros</h4>
                                    
                                </div>
                                <?php
                            }
                            ?>
                        
                        <div class="row">
                            <div class="col">
                                <h4 class="fs-5 my-3">Hijos</h4>
                            </div>
                        </div>
                        <?php 
                            for ($i=0; $i < count($listaHijo); $i++) { 
                                ?>
                                     <div class="row my-4">
                                        <div class="col-3 my-2">
                                            <h4 class="fs-6 titulo-campos"> Nombre</h4>
                                            <p class="my-1"><?php echo $listaHijo[$i]->getNombre(); ?></p>
                                        </div>
                                        <div class="col-3 my-2">
                                            <h4 class="fs-6 titulo-campos"> Apellido</h4>
                                            <p class="my-1"><?php echo $listaHijo[$i]->getApellido(); ?></p>
                                        </div>
                                        <div class="col-3 my-2">
                                            <h4 class="fs-6 titulo-campos"> Edad</h4>
                                            <p class="my-1"><p class="my-1"><?php echo $listaHijo[$i]->getEdad(); ?></p></p>
                                        </div>
                                        <div class="col-3 my-2">
                                            <h4 class="fs-6 titulo-campos"> Fechad de nacimiento</h4>
                                            <p class="my-1"><p class="my-1"><?php echo $listaHijo[$i]->getFecha_nacimiento(); ?></p></p>
                                        </div>
                                    </div>
                                <?php
                                
                            }

                            if (!count($listaHijo) > 0) {
                                ?>
                                    <div class="col my-2 text-center">
                                        <h4 class="fs-6 titulo-campos"> No hay registros</h4>
                                    </div>
                                <?php
                            }

                            if (count($listaFamiliar) > 0 || count($listaHijo)) {

                                $btn = '';
                            }else{
                                $btn = 'disabled="disabled"';
                            }
                        ?>

                       
                        <div class="position-absolute top-0 end-0 mt-3 me-3">
                            <button type="button" class="btn-editar-perfil px-3" id="btn-editar-datos-familiares" value="<?php echo $_GET['doc']; ?>" data-bs-toggle="modal" data-bs-target="#modificar-datos-familiares" <?php echo $btn ?>>Editar</button>
                        </div>
                    </div>
                </div>
                <div class="row my-4 justify-content-center">
                    <div class="col-12">
                        <h2 class="titulo-perfil">Foto de perfil</h2>
                    </div>
                    <div class="col-4 my-3 ">
                        <form action="../../controller/usuario/ActualizarFotoPerfil.php" method="POST" enctype="multipart/form-data">
                            <div class="d-none">
                                <input type="text" value="<?=$_GET['doc']?>" name="id_usuario">
                            </div>
                            <div class="my-2">
                                <input type="file" class="form-control" name="archivo">
                            </div>
                            <div class="my-3 text-center">
                                <input type="submit" value="Enviar" class="btn btn-verde">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row my-4 justify-content-center">
                     <div class="col-12">
                        <h3 class="titulo-perfil">Historial de contratos</h3>
                     </div>
                     <div class="col-10">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Tipo de contrato</th>
                                <th scope="col">fecha de inicio</th>
                                <th scope="col">fecha de fin</th>
                                <th scope="col" class="text-center">Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    for ($i=0; $i < count($listaHistorialContratos); $i++) { 
                                        ?>
                                        <tr>
                                            <td><?php echo $listaHistorialContratos[$i]->getTipo_contrato(); ?></td>
                                            <td><?php echo $listaHistorialContratos[$i]->getFecha_inicio(); ?></td>
                                            <?php if ($listaHistorialContratos[$i]->getFecha_fin() == "1900-01-01") :
                                            ?>
                                                <td> - </td>
                                            <?php else: ?>
                                                <td><?php echo $listaHistorialContratos[$i]->getFecha_fin(); ?></td>
                                            <?php endif; ?>
                                            <td><button class="btn btn-danger" type="button"  id="btn-ventana-eliminar-historial-contratos" value="<?php echo $listaHistorialContratos[$i]->getId_historial_contrato(); ?>" data-bs-toggle="modal" data-bs-target="#eliminar-historial-contratos">Eliminar </button></td>
                                        </tr>
                                        <?php
                                    }
                                
                                ?>
                            </tbody>
                            
                          </table>
                    </div>
                          
                </div>
                <div class="row my-4 justify-content-center">
                     <div class="col-12">
                        <h3 class="titulo-perfil">Historial de cargos</h3>
                     </div>
                     <div class="col-10">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Sección</th>
                                    <th scope="col">Area</th>
                                    <th scope="col">Cargo</th>
                                    <th scope="col">Fecha de inicio</th>
                                    <th scope="col">Fecha de fin</th>
                                    <th scope="col" class="text-center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    for ($i=0; $i < count($listaHistorialCargos); $i++) { 
                                        ?>
                                        <tr>
                                            <td><?php echo $listaHistorialCargos[$i]->getSeccion(); ?></td>
                                            <td><?php echo $listaHistorialCargos[$i]->getArea(); ?></td>
                                            <td><?php echo $listaHistorialCargos[$i]->getCargo(); ?></td>
                                            <td><?php echo $listaHistorialCargos[$i]->getFecha_inicio(); ?></td>
                                            
                                            <?php if ($listaHistorialCargos[$i]->getFecha_fin() == "1900-01-01") :
                                            ?>
                                                <td> - </td>
                                            <?php else: ?>
                                                <td><?php echo $listaHistorialCargos[$i]->getFecha_fin(); ?></td>
                                            <?php endif; ?>
                                            <td><button class="btn btn-danger" type="button"  id="btn-ventana-eliminar-historial-cargos" value="<?php echo $listaHistorialCargos[$i]->getId_historial_cargo(); ?>" data-bs-toggle="modal" data-bs-target="#eliminar-historial-cargos">Eliminar </button></td>
                                        </tr>
                                        <?php

                                    }
                                
                                ?>
                            </tbody>
                            
                          </table>
                    </div>
                          
                </div>
            </div>

            <div id="cont-familiares" class="my-4 d-none cont-gestion-empleado">
                <div class="row mb-3">
                    <div class="col">
                        <h3 class="titulo-perfil">Gestionar familiares e hijos</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="card">
                            <div class="card-header">
                                Personas con las que vive
                            </div>
                            <div class="card-body">
                                <form action="">
                                            
                                    <div class="my-3">
                                        <input class="form-control" type="text" id="id_familiar" placeholder="Nro de documento">
                                        <small class="text-danger"></small>
                                    </div>
                                        <select class="form-select" id="tipo_documento_familiar">
                                            <option value="">Tipo de documento</option>
                                            <?php
                                                for ($i=0; $i < count($listaTiposDocumento); $i++) { 
                                                    ?>
                                                        <option value="<?php echo $listaTiposDocumento[$i]->getId_tipo_documento(); ?>"><?php echo $listaTiposDocumento[$i]->getTipo_documento(); ?></option>
                                                    <?php
                                                }
                                            ?>
                                            
                                        </select>
                                        <small class="text-danger"></small>
                                    <div class="my-3">
                                        <input class="form-control" type="text" id="nombre-familiar" placeholder="Nombre">
                                        <small class="text-danger"></small>
                                    </div>
                                    <div class="my-3">
                                        <input class="form-control" type="text" id="apellido-familiar" placeholder="Apellido">
                                        <small class="text-danger"></small>
                                    </div>
                                    <div class="my-3">
                                        <input class="form-control" type="text" id="edad-familiar" placeholder="Edad">
                                        <small class="text-danger"></small>
                                    </div>
                                    <div class="my-3">
                                        <input class="form-control" type="text" id="escolaridad-familiar" placeholder="Escolaridad">
                                        <small class="text-danger"></small>
                                    </div>
                                    <div class="my-3">
                                        <input class="form-control" type="text" id="parentesco-familiar" placeholder="Parentesco">
                                        <small class="text-danger"></small>
                                    </div>
                                    
                                    <div class="col my-3">
                                        <button type="button" class="btn w-100 btn-verde" id="btn-registrar-familiar">Registrar</button>
                                    </div>
       
                                    <div id="rta-familiar" class="my-2">

                                    </div>
                                </form>
                            </div>
                        </div>
                    
                    </div>
                    <div class="col-8">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Nro de documento</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Escolaridad</th>
                                <th scope="col">Parentesco</th>
                                <th scope="col" colspan="2" class="text-center">Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    for ($i=0; $i < count($listaFamiliar); $i++) { 
                                        ?>
                                        <td><?php echo $listaFamiliar[$i]->getId_familiar(); ?></td>
                                        <td><?php echo $listaFamiliar[$i]->getNombre(); ?></td>
                                        <td><?php echo $listaFamiliar[$i]->getApellido(); ?></td>
                                        <td><?php echo $listaFamiliar[$i]->getEdad(); ?></td>
                                        <td><?php echo $listaFamiliar[$i]->getEscolaridad(); ?></td>
                                        <td><?php echo $listaFamiliar[$i]->getParentesco(); ?></td>
                                        <td><button class="btn btn-verde" type="button" id="btn-editar-familiar" value="<?php echo $listaFamiliar[$i]->getId_familiar(); ?>" data-bs-toggle="modal" data-bs-target="#editar-familiares">Editar</button></td>
                                        <td><button class="btn btn-danger" type="button"  id="btn-ventana-eliminar-familiar" data-bs-toggle="modal" data-bs-target="#eliminar-familiares">Eliminar  </button></td>
                                        <?php
                                    }
                                
                                ?>
                            </tbody>
                            
                          </table>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-4">
                        <div class="card">
                            <div class="card-header">
                                Hijos
                            </div>
                            <div class="card-body">
                                <form action="">
                                    <div class="my-3">
                                        <input class="form-control" type="text" id="nombre_hijo" placeholder="Nombre">
                                        <small class="text-danger"></small>
                                    </div>
                                    <div class="my-3">
                                        <input class="form-control" type="text" id="nro_documento_hijo" placeholder="Nro de documento">
                                        <small class="text-danger"></small>
                                    </div>
                                    <div class="my-3">
                                        <select id="tipo_documento_hijo" class="form-select">
                                            <option value="">Tipo de documento</option>
                                            <?php
                                                for ($i=0; $i < count($listaTiposDocumento); $i++) { 
                                                    ?>
                                                        <option value="<?php echo $listaTiposDocumento[$i]->getId_tipo_documento(); ?>"><?php echo $listaTiposDocumento[$i]->getTipo_documento(); ?></option>
                                                    <?php
                                                }
                                            ?>
                                            
                                        </select>
                                        <small class="text-danger"></small>
                                    </div>
                                    <div class="my-3">
                                        <input class="form-control" type="text" id="apellido_hijo" placeholder="Apellido">
                                        <small class="text-danger"></small>
                                    </div>
                                    <div class="my-3">
                                        <input class="form-control" type="date" id="fecha_nacimiento_hijo" placeholder="Fecha de nacimiento">
                                        <small class="text-danger"></small>
                                    </div>
                                    <div class="my-3">
                                        <input class="form-control" type="text" id="edad_hijo" placeholder="Edad" readonly>
                                        <small class="text-danger"></small>
                                    </div>
                                    <!--} <div class="my-3">
                                        <select class="form-select" id="escolaridad_hijo">
                                        <option selected value="">Escolaridad</option>
                                        <?php
                                        /*
                                            for ($i=0; $i < count($listaNivelesAcademicos); $i++) { 
                                                ?>
                                                <option value="<?php echo $listaNivelesAcademicos[$i]->getId_nivel_academico(); ?>"><?php echo $listaNivelesAcademicos[$i]->getNombre(); ?></option>
                                                <?php
                                            }*/
                                        ?>
                                        </select>
                                        <small class="text-danger"></small>
                                    </div> -->
                                    
                                    <div class="col my-3">
                                        <button type="button" class="btn w-100 btn-verde" id="btn-registrar-hijo">Registrar</button>
                                    </div>
       
                                    <div id="rta-hijo" class="my-2">

                                    </div>
                                </form>
                            </div>
                        </div>
                    
                    </div>
                    <div class="col-8">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido</th>
                                    <th scope="col">Fecha de nacimiento</th>
                                    <th scope="col">Edad</th>
                                    <th scope="col" colspan="2" class="text-center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    for ($i=0; $i < count($listaHijo); $i++) { 
                                        ?>  
                                        <tr>
                                            <td><?php echo $listaHijo[$i]->getNombre() ?></td>
                                            <td><?php echo $listaHijo[$i]->getApellido() ?></td>
                                            <td><?php echo $listaHijo[$i]->getFecha_nacimiento() ?></td>
                                            <td><?php echo $listaHijo[$i]->getEdad() ?></td>
                                            <td><button class="btn btn-verde" type="button" id="btn-editar-hijo" value="<?php echo $listaHijo[$i]->getId_hijo() ?>" data-bs-toggle="modal" data-bs-target="#editar-hijos">Editar</button></td>
                                            <td><button class="btn btn-danger" type="button" id="btn-ventana-eliminar-hijo" data-bs-toggle="modal" data-bs-target="#eliminar-hijos">Eliminar</button></td>
                                        </tr>
                                            
                                        <?php
                                    }
                                ?>
                            </tbody>
                            
                          </table>
                    </div>
                </div>
            </div>

            <div id="cont-dotacion" class="my-3 d-none cont-gestion-empleado ">
                <div class="row mb-2 align-items-center">
                    <div class="col">
                        <h2 class="titulo-perfil">Gestionar dotación del empleado</h2>
                        <h5 class="texto-claro">Dotación <?php echo $listaUsuario->getTipo_dotacion(); ?></h5>
                        <input type="text" id="campo-tipo-dotacion-empleado" class="d-none" value="<?php echo $listaUsuario->getTipo_dotacion(); ?>">
                        <!-- <input type="text" class="d-none" value="echo $listaPantalones[$i]->getId_pantalon(); "> -->
               
                    </div>
                    <div class="col d-flex justify-content-end">
                        <?php
                            if ($listaUsuario->getCamisa() != null || $listaUsuario->getPantalon() != null || $listaUsuario->getZapato() != null || $listaUsuario->getVestimenta() != null) :
                            ?>
                                <button type="button" class="btn btn-danger me-2" data-bs-toggle="modal" data-bs-target="#eliminar-toda-dotacion">Limpiar</button>
                                <a  class="btn btn-verde me-2" href="../../controller/usuario/CartaDotacion.php?id=<?=$_GET['doc'];?>" target="_blank">Carta</a>
                          <?php
                            endif;
                        ?>
                         <button type="button" class="btn btn-verde" id="btn-mantener-historial">Mantener historial</button>

                    </div>
                </div>
                
                <div class="row">

                                    

                    <?php
                        if ($listaUsuario->getCamisa() == null) :
                            ?>
                                <div class="col">
                                    <div class="bloque-dotacion bg-light p-5" id="bloque-agregar-camisa-empleado" data-bs-toggle="modal" data-bs-target="#modal-agregar-camisa">
                                        <div class="col d-flex justify-content-center align-items-center">
                                            <i class="fa-solid fa-shirt"></i>
                                        </div>
                                        <h5 class="text-center mt-5"><i class="fa-solid fa-circle-plus"></i> Agregar Camisa</h5>
                                    </div>
                                    
                                </div>
                            <?php
                        else:

                            for ($i=0; $i < count($listaCamisas); $i++) :
                            
                                if ($listaUsuario->getCamisa() == $listaCamisas[$i]->getId_camisa()) :

                            ?>
                            <div class="col">
                                <div class="bloque-dotacion dotacion-agregada bg-light py-4 px-5">
                                    <div class="col d-flex justify-content-center align-items-center">
                                        <i class="fa-solid fa-shirt"></i>
                                    </div>
                                    <div class="text-center">
                                        <p>Camisa: <?php echo $listaCamisas[$i]->getNombre(); ?></p>
                                        <p>Talla: <?php echo $listaCamisas[$i]->getTalla(); ?></p>
                                        <p>Cant: <?php echo $listaUsuario->getCant_camisa(); ?></p>
                                        <input type="text" class="d-none" value="<?php echo $listaCamisas[$i]->getCantidad(); ?>" id="cant-disponibles-camisa">
                                        <input type="text" class="d-none" value="<?php echo $listaCamisas[$i]->getId_camisa(); ?>">
                                        <input type="text" class="d-none" value="<?php echo $listaUsuario->getCant_camisa(); ?>" id="cant-camisa">
                                        <input type="text" class="d-none" value="<?php echo $listaCamisas[$i]->getNombre(); ?>" id="nombre-camisa">
                                        <input type="text" class="d-none" value="<?php echo $listaCamisas[$i]->getTalla(); ?>" id="talla-camisa">
                                        <button class="btn btn-verde" id="btn-editar-camisa-empleado" value="<?php echo $listaUsuario->getId_usuario(); ?>" data-bs-toggle="modal" data-bs-target="#modal-editar-camisas">Editar</button>
                                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-eliminar-camisas">Eliminar</button>    
                                    </div>

                                </div>
                                
                            </div>
                            <?php
                                endif;
                            endfor;
                        endif;
                    ?>
                    
                    <?php

                        if ($listaUsuario->getPantalon() == null):
                            ?>
                            <div class="col">
                                <div class="bloque-dotacion bg-light p-5" id="bloque-agregar-pantalon-empleado" data-bs-toggle="modal" data-bs-target="#modal-agregar-pantalon">
                                    <div class="col d-flex justify-content-center align-items-center">
                                        <i class="fa-solid fa-table-columns"></i>
                                    </div>
                                    <h5 class="text-center mt-5"><i class="fa-solid fa-circle-plus"></i> Agregar Pantalón</h5>
                                </div>
                                
                            </div>
                            <?php
                        else:
                            for ($i=0; $i < count($listaPantalones); $i++) :
                            
                                if ($listaUsuario->getPantalon() == $listaPantalones[$i]->getId_pantalon()) :

                            ?>
                            <div class="col">
                                <div class="bloque-dotacion dotacion-agregada bg-light py-4 px-5">
                                    <div class="col d-flex justify-content-center align-items-center">
                                        <i class="fa-solid fa-table-columns"></i>
                                    </div>
                                    <div class="text-center">
                                        <p>Pantalón: <?php echo $listaPantalones[$i]->getNombre(); ?></p>
                                        <p>Talla: <?php echo $listaPantalones[$i]->getTalla(); ?></p>
                                        <p>Cantidad: <?php echo $listaUsuario->getCant_pantalon(); ?></p>
                                        <input type="text" class="d-none" value="<?php echo $listaPantalones[$i]->getCantidad(); ?>" id="cant-disponibles-pantalon">
                                        <input type="text" class="d-none" value="<?php echo $listaPantalones[$i]->getId_pantalon(); ?>">
                                        <input type="text" class="d-none" value="<?php echo $listaUsuario->getCant_pantalon(); ?>" id="cant-pantalon">
                                        <input type="text" class="d-none" value="<?php echo $listaPantalones[$i]->getNombre(); ?>" id="nombre-pantalon">
                                        <input type="text" class="d-none" value="<?php echo $listaPantalones[$i]->getTalla(); ?>" id="talla-pantalon">
                                        <button class="btn btn-verde" id="btn-editar-pantalon-empleado" value="<?php echo $listaUsuario->getId_usuario(); ?>" data-bs-toggle="modal" data-bs-target="#modal-editar-pantalones">Editar</button>
                                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-eliminar-pantalones">Eliminar</button>    
                                    </div>

                                </div>
                                
                            </div>
                            <?php
                                endif;
                            endfor;
                        endif;
                    ?>
                    
                    
                    <?php

                        if($listaUsuario->getZapato() == null) :
                            ?>
                                <div class="col">
                                    <div class="bloque-dotacion bg-light p-5" id="bloque-agregar-zapato-empleado" data-bs-toggle="modal" data-bs-target="#modal-agregar-zapatos">
                                        <div class="col d-flex justify-content-center align-items-center">
                                            <i class="fa-solid fa-shoe-prints"></i>
                                        </div>
                                        <h5 class="text-center mt-5"><i class="fa-solid fa-circle-plus"></i> Agregar Zapatos</h5>
                                    </div> 
                                </div>
                            <?php
                            else:
                                for ($i=0; $i < count($listaZapatos); $i++):
                                
                                    if ($listaUsuario->getZapato() == $listaZapatos[$i]->getId_zapato()):

                                ?>
                                <div class="col">
                                    <div class="bloque-dotacion dotacion-agregada bg-light py-4 px-5">
                                        <div class="col d-flex justify-content-center align-items-center">
                                            <i class="fa-solid fa-shoe-prints"></i>
                                        </div>
                                        <div class="text-center">
                                            <p>Zapatos: <?php echo $listaZapatos[$i]->getNombre(); ?></p>
                                            <p>Talla: <?php echo $listaZapatos[$i]->getTalla(); ?></p>
                                            <input type="text" class="d-none" value="<?php echo $listaZapatos[$i]->getCantidad(); ?>" id="cant-disponibles-zapatos">
                                            <input type="text" class="d-none" value="<?php echo $listaZapatos[$i]->getId_zapato(); ?>">
                                            <input type="text" class="d-none" value="<?php echo $listaUsuario->getCant_zapato(); ?>" id="cant-zapato">
                                            <input type="text" class="d-none" value="<?php echo $listaZapatos[$i]->getNombre(); ?>" id="nombre-zapato">
                                            <input type="text" class="d-none" value="<?php echo $listaZapatos[$i]->getTalla(); ?>" id="talla-zapato">
                                            <button class="btn btn-verde" id="btn-editar-zapato-empleado" value="<?php echo $listaUsuario->getId_usuario(); ?>" data-bs-toggle="modal" data-bs-target="#modal-editar-zapatos">Editar</button>
                                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-eliminar-zapatos">Eliminar</button>    
                                        </div>

                                    </div>
                                    
                                </div>
                                <?php
                                    endif;
                                endfor;
                
                        endif;

                    ?>

                    <?php

                        if ($listaUsuario->getVestimenta() == null):
                            ?>
                            <div class="col">
                                <div class="bloque-dotacion bg-light p-5" id="bloque-agregar-otros-empleado" data-bs-toggle="modal" data-bs-target="#modal-agregar-otros">
                                    <div class="col d-flex justify-content-center align-items-center">
                                        <i class="fa-solid fa-person-booth"></i>
                                    </div>
                                    <h5 class="text-center mt-5"><i class="fa-solid fa-circle-plus"></i> Agregar Otro</h5>
                                </div>
                                
                            </div>
                            <?php
                        else:

                            for ($i=0; $i < count($listaVestimenta); $i++):
                                
                                if ($listaUsuario->getVestimenta() == $listaVestimenta[$i]->getId_vestimenta()):

                            ?>
                            <div class="col">
                                <div class="bloque-dotacion dotacion-agregada bg-light py-4 px-5">
                                    <div class="col d-flex justify-content-center align-items-center">
                                        <i class="fa-solid fa-person-booth"></i>
                                    </div>
                                    <div class="text-center">
                                        <p class=" my-4 py-2">Vestimenta: <?php echo $listaVestimenta[$i]->getNombre(); ?></p>
                                        <input type="text" class="d-none" value="<?php echo $listaVestimenta[$i]->getCantidad(); ?>" id="cant-disponibles-vestimenta">
                                        <input type="text" class="d-none" value="<?php echo $listaVestimenta[$i]->getId_vestimenta(); ?>">
                                        <button class="btn btn-verde" id="btn-editar-vestimenta-empleado" value="<?php echo $listaUsuario->getId_usuario(); ?>" data-bs-toggle="modal" data-bs-target="#modal-editar-vestimentas">Editar</button>
                                        <button class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#modal-eliminar-otros">Eliminar</button>    
                                    </div>

                                </div>
                                
                            </div>
                            <?php
                                endif;
                            endfor;

                        endif;
                    ?>
                    
                </div>        
                <div class="row my-5 justify-content-center">
                    <div class="col-12">
                        <h3 class="titulo-perfil">Historial dotacion</h3>
                    </div>
                    <div class="col-10 mt-3">
                        
                        
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Dotacion</th>
                                    <th scope="col">Camisa</th>
                                    <th scope="col">Pantalon</th>
                                    <th scope="col">Zapatos</th>
                                    <th scope="col">Otro</th>
                                    <th scope="col">fecha</th>
                                    <th scope="col" colspan="2" class="text-center">Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        for ($i=0; $i < count($listaHistorialDotaciones); $i++) { 
                                            ?>
                                            <tr>

                                                <td><?php echo $listaHistorialDotaciones[$i]->getTipo_dotacion(); ?></td>
                                                <td><?php echo $listaHistorialDotaciones[$i]->getCamisa(); ?></td>
                                                <td><?php echo $listaHistorialDotaciones[$i]->getPantalon(); ?></td>
                                                <td><?php echo $listaHistorialDotaciones[$i]->getZapato(); ?></td>
                                                <td><?php echo $listaHistorialDotaciones[$i]->getVestimenta(); ?></td>
                                                <td><?php echo $listaHistorialDotaciones[$i]->getFecha(); ?></td>
                                                <td><button class="btn btn-danger" type="button"  id="btn-ventana-eliminar-familiar">Eliminar  </button></td>
                                            </tr>
                                            <?php
                                        }
                                    
                                    ?>
                                </tbody>
                                
                            </table>
                        
                    </div>
                </div>
            </div>

            <div id="cont-documentos" class="my-3 d-none cont-gestion-empleado">
                <div class="row">
                    <div class="col">
                        <h2 class="titulo-perfil">Documentos</h2>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-verde px-3" id="btn-adjuntar-documentos" value="" data-bs-toggle="modal" data-bs-target="#adjuntar-documento">Adjuntar documento +</button>
                    </div>
                </div>
                <div class="row mt-5">
                    <?php if (count($listaDocumentos) >= 1) :
                            for ($i=0; $i < count($listaDocumentos); $i++) :
                            ?>
                                <div class="col-3 p-3 border">
                                    <div class="cont-documentos">
                                        <div class="cont-nombre-documento d-flex flex-column justidy-content-center align-items-center">
                                            <div class="cont-icono-archivo">
                                                <i class="fa-solid fa-file"></i>
                                            </div>
                                            <h4><?=$listaDocumentos[$i]->getNombre();?></h4>
                                        </div>
                                        <div class="gestion-documento d-flex justify-content-around">
                                            <a class="btn-gestion-documento" href="<?=$listaDocumentos[$i]->getRuta();?>" download>
                                                <i class="fa-solid fa-download"></i>
                                            </a>
                                           
                                            <a class="btn-gestion-documento" href="<?=$listaDocumentos[$i]->getRuta();?>" target="_blank">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                           
                                            <button type="button" class="btn-gestion-documento" id="btn-eliminar-documento" value="<?=$listaDocumentos[$i]->getId_documento(); ?>">
                                                    <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                         
                                        </div>
                                    </div>
                                </div>
                            <?php    
                            endfor;
                    else: ?>
                        <div class="col text-center mt-4">
                            <h4>No hay archivos adjuntos</h4>
                        </div>
                    <?php endif; ?>
                    
                    
                </div>
            </div>
        </div>
        

        </div>
       
          
    </main>


    <!-- Formulario para adjuntar un documento -->
            
    <div class="modal modal-delete fade" id="adjuntar-documento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Adjuntar documento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="../../controller/usuario/subirDocumento.php" method="POST" enctype="multipart/form-data">
                            <div class="d-none">
                                <input type="text" name="id_usuario" value="<?= $_GET['doc']; ?>">
                            </div>
                            <div class="mt-2 mb-3">
                                <input type="text" name="titulo" class="form-control" placeholder="titulo">
                            </div>
                            <div class="my-2">
                                <input type="file" name="archivo" class="form-control" placeholder="titulo">
                            </div>
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </form>
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        
                    </div>
                    
                        
                
                </div>
            </div>
        </div>

     <!-- Confirmacion para eliminar el historial del cargo -->
        
     <div class="modal modal-delete fade" id="eliminar-historial-cargos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar historial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>¿Esta seguro de eliminar el historial al empleado?</div>
                    <div class="mt-3" id="btns-modal-eliminar">
                        <button type="button" class="btn btn-verde" data-bs-dismiss="modal">No</button>
                        <button type="button" class="btn btn-danger" id="btn-eliminar-historial-cargo">Si</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirmacion para todas las dotaciones -->
        
    <div class="modal modal-delete fade" id="eliminar-historial-contratos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar historial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>¿Esta seguro de eliminar el historial al empleado?</div>
                    <div class="mt-3" id="btns-modal-eliminar">
                        <button type="button" class="btn btn-verde" data-bs-dismiss="modal">No</button>
                        <button type="button" class="btn btn-danger" id="btn-eliminar-historial-contrato">Si</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Confirmacion para todas las dotaciones -->
        
    <div class="modal modal-delete fade" id="eliminar-toda-dotacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar dotacion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>¿Esta seguro de eliminar toda la dotación al empleado?</div>
                    <div class="mt-3" id="btns-modal-eliminar">
                        <button type="button" class="btn btn-verde" data-bs-dismiss="modal">No</button>
                        <button type="button" class="btn btn-danger" id="btn-eliminar-dotaciones-empleado" value="<?php echo $listaUsuario->getId_usuario(); ?>">Si</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Confirmacion para eliminar un hijo -->
        
    <div class="modal modal-delete fade" id="eliminar-hijos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar hijo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>¿Esta seguro de eliminar este hijo?</div>
                    <div class="mt-3" id="btns-modal-eliminar">
                        <button type="button" class="btn btn-verde" data-bs-dismiss="modal">No</button>
                        <button type="button" class="btn btn-danger" id="btn-eliminar-hijo">Si</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>


    <!-- Confirmacion para elimina un familiar -->
        
    <div class="modal modal-delete fade" id="eliminar-familiares" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar familiar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>¿Esta seguro de eliminar esta persona?</div>
                    <div class="mt-3" id="btns-modal-eliminar">
                        <button type="button" class="btn btn-verde" data-bs-dismiss="modal">No</button>
                        <button type="button" class="btn btn-danger" id="btn-eliminar-familiar">Si</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <!--  Ventana para editar un hijo -->

    <div class="modal fade" id="editar-hijos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar hijo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="editar-hijo"></div>
                    <div id="rta-actualizar-hijo" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btn-actualizar-hijo">Actualizar</button>
                </div>
            </div>
        </div>
    </div>

   <!--  Ventana para editar un familiar -->

   <div class="modal fade" id="editar-familiares" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar familiar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="editar-familiar"></div>
                    <div id="rta-actualizar-familiar" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btn-actualizar-familiar">Actualizar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-editar-camisas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar camisas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="editar-camisa-tipo-dotacion"></div>
                    <div id="rta-actualizar-camisa" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btn-actualizar-camisa-empleado">Agregar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-editar-pantalones" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar pantalones</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="editar-pantalon-tipo-dotacion"></div>
                    <div id="rta-actualizar-pantalon" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btn-actualizar-pantalon-empleado">Actualizar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-editar-zapatos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar zapatos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="editar-zapato-tipo-dotacion"></div>
                    <div id="rta-actualizar-zapato" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btn-actualizar-zapato-empleado">Agregar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-editar-vestimentas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar vestimenta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="editar-vestimenta-tipo-dotacion"></div>
                    <div id="rta-actualizar-vestimenta" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btn-actualizar-vestimenta-empleado">Agregar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-delete fade" id="modal-eliminar-camisas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar dotación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>¿Esta seguro de eliminar la dotación al empleado?</div>
                    <div class="mt-3">
                        <button type="button" class="btn btn-verde" data-bs-dismiss="modal">No</button>
                        <button type="button" class="btn btn-danger" id="btn-eliminar-camisa-empleado" value="<?php echo $listaUsuario->getId_usuario(); ?>">Si</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-delete fade" id="modal-eliminar-pantalones" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar dotación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>¿Esta seguro de eliminar la dotación al empleado?</div>
                    <div class="mt-3">
                        <button type="button" class="btn btn-verde" data-bs-dismiss="modal">No</button>
                        <button type="button" class="btn btn-danger" id="btn-eliminar-pantalon-empleado" value="<?php echo $listaUsuario->getId_usuario(); ?>">Si</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-delete fade" id="modal-eliminar-zapatos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar dotación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>¿Esta seguro de eliminar la dotación al empleado?</div>
                    <div class="mt-3">
                        <button type="button" class="btn btn-verde" data-bs-dismiss="modal">No</button>
                        <button type="button" class="btn btn-danger" id="btn-eliminar-zapato-empleado" value="<?php echo $listaUsuario->getId_usuario(); ?>">Si</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-delete fade" id="modal-eliminar-otros" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar dotación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>¿Esta seguro de eliminar la dotación al empleado?</div>
                    <div class="mt-3">
                        <button type="button" class="btn btn-verde" data-bs-dismiss="modal">No</button>
                        <button type="button" class="btn btn-danger" id="btn-eliminar-vestimenta-empleado" value="<?php echo $listaUsuario->getId_usuario(); ?>">Si</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-agregar-otros" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar otra ropa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="listado-otros-tipo-dotacion"></div>
                    <div id="rta-agregar-otro-act" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btn-agregar-otra-ropa-empleado">Agregar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-agregar-zapatos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar zapatos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="listado-zapatos-tipo-dotacion"></div>
                    <div id="rta-agregar-zapato-act" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btn-agregar-zapato-empleado">Agregar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-agregar-pantalon" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar pantalón</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="listado-pantalones-tipo-dotacion"></div>
                    <div id="rta-agregar-pantalon-act" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btn-agregar-pantalon-empleado">Agregar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-agregar-camisa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar camisa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="listado-camisas-tipo-dotacion"></div>
                    <div id="rta-agregar-camisa-act" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btn-agregar-camisa-empleado">Agregar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modificar-datos-personales" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog long-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar datos personales</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="editar-datos-personales"></div>
                    <div id="rta-datos-personales-act" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btn-actualizar-datos-personales">Actualizar</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modificar-datos-laborales" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog long-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar datos laborales</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="editar-datos-laborales"></div>
                    <div id="rta-datos-laborales-act" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id='btn-actualizar-datos-laborales'>Actualizar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modificar-datos-familiares" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar datos familiares</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>  
                <div class="modal-body">
                    <div id="editar-datos-familiares"></div>
                    <div id="rta-datos-familiares-act" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id='btn-actualizar-datos-familiares'>Actualizar</button>
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