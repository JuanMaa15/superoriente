<?php
    session_start();

    if (isset($_SESSION['id_admin'])) {

        require_once ("../../models/DAO/SeccionDAO.php");
        require_once ("../../models/DAO/AreaDAO.php");

        $secciondao = new SeccionDAO();
        $areadao = new AreaDAO();

        $listaSecciones = $secciondao->listaSecciones();
        $listaAreas = $areadao->listaAreas(); 

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

    <script src="https://kit.fontawesome.com/4240342587.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/style.css">
    <script src="../../public/js/jquery.js"></script>

</head>
<body>
    <!--------------- Body form -------- -->
    <div class="container-fluid ps-0">
        <div class="row justify-content-center">
            <?php include_once("menu.php");?>
            <div class="col-10 ps-0" id="cont-cuerpo-doc">
                <div class="container mt-4 px-5 position-relative">
                    <div class="bg-verde-tpt col w-100 d-flex justify-content-end position-fixed top-0 end-0" id="menu-gestion">
                        <div class="nav-item dropdown py-3">
                            <a class="navbar-brand dropdown-toggle text-white" href="#" id="menu-desplegable-listas">
                                Lista de gestión de tablas
                            </a>
                            <ul class="dropdown-menu" id="menu-desplegado">
                                <li><a class="dropdown-item" href="#gestion-documento-identidad">Documento de identidad</a></li>
                                <li><a class="dropdown-item" href="#gestion-tipo-contrato">Tipo de contrato</a></li>
                                <li><a class="dropdown-item" href="#gestion-estado-civil">Estado civil</a></li>
                                <li><a class="dropdown-item" href="#gestion-seccion">Sección de trabajo</a></li>
                                <li><a class="dropdown-item" href="#gestion-area">Area de trabajo</a></li>
                                <li><a class="dropdown-item" href="#gestion-cargo">Cargo</a></li>
                                <li><a class="dropdown-item" href="#gestion-sucursal">Sucursal</a></li>
                                <li><a class="dropdown-item" href="#gestion-eps">EPS</a></li>
                                <li><a class="dropdown-item" href="#gestion-nivel-academico">Nivel academico</a></li>
                                <li><a class="dropdown-item" href="#gestion-pension">Pensión</a></li>
                                <li><a class="dropdown-item" href="#gestion-tipo-dotacion">Tipo de dotación</a></li>
                            </ul>
                        </div>

                    </div>
                    <div class="row mt-5 pt-5">
                        <div class="col">
                            <h2 class="mb-3 text-center">Gestión de información</h2>
                        </div>

                    </div>
                    
                </div>
                <div class="container mt-4 px-5">
                    <div class="row my-3" id="gestion-documento-identidad">
                        <div class="col-4">
                            <div class="card text-center">
                                <div class="card-header">
                                    <h4>Documentos de identidad</h4>
                                </div>
                                
                                <div class="card-body">
                                    <div class="form-registro my-3">
                                        <form action="">
                                            
                                            <div class="my-5">
                                                <input class="form-control" type="text" id="nombre-tipo-documento" placeholder="Tipo de documento">
                                                <small class="text-danger"></small>
                                            </div>
                                            
                                            <div class="col my-5">
                                                <button type="button" class="btn btn-mediano btn-verde" id="btn-registrar-tipo-documento">Registrar</button>
                                            </div>
               
                                            <div id="rta-tipo-documento" class="my-2">

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-8">
                                <div id="listado-tipos-documentos">

                                </div>
                            </div>
                    </div>
                    <div class="row my-3" id="gestion-tipo-contrato">
                        <div class="col-4">
                            <div class="card text-center">
                                <div class="card-header">
                                    <h4>Tipo de contrato</h4>
                                </div>
                                
                                <div class="card-body">
                                    <div class="form-registro my-3">
                                        <form action="">
                                            
                                            <div class="my-5">
                                                <input class="form-control" type="text" id="nombre-tipo-contrato" placeholder="Tipo de contrato">
                                                <small class="text-danger"></small>
                                            </div>
                                            
                                            <div class="col my-5">
                                                <button type="button" class="btn btn-mediano btn-verde" id="btn-registrar-tipo-contrato">Registrar</button>
                                            </div>
               
                                            <div id="rta-tipo-contrato" class="my-2">

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-8">
                                <div id="listado-tipos-contratos">

                                </div>
                            </div>
                    </div>
                    <div class="row my-3" id="gestion-genero">
                        <div class="col-4">
                            <div class="card text-center">
                                <div class="card-header">
                                    <h4>Género</h4>
                                </div>
                                
                                <div class="card-body">
                                    <div class="form-registro my-3">
                                        <form action="">
                                            
                                            <div class="my-5">
                                                <input class="form-control" type="text" id="nombre-genero" placeholder="Género">
                                                <small class="text-danger"></small>
                                            </div>
                                            
                                            <div class="col my-5">
                                                <button type="button" class="btn btn-mediano btn-verde" id="btn-registrar-genero">Registrar</button>
                                            </div>
               
                                            <div id="rta-genero" class="my-2">

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-8">
                                <div id="listado-generos">

                                </div>
                            </div>
                    </div>
                    <div class="row mt-3 mb-5" id="gestion-estado-civil">
                        <div class="col-4">
                            <div class="card text-center">
                                <div class="card-header">
                                    <h4>Estado civil</h4>
                                </div>
                                
                                <div class="card-body">
                                    <div class="form-registro my-3">
                                        <form action="">
                                            
                                            <div class="my-5">
                                                <input class="form-control" type="text" id="nombre-estado-civil" placeholder="Estado civil">
                                                <small class="text-danger"></small>
                                            </div>
                                            
                                            <div class="col my-5">
                                                <button type="button" class="btn btn-mediano btn-verde" id="btn-registrar-estado-civil">Registrar</button>
                                            </div>
               
                                            <div id="rta-estado-civil" class="my-2">

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-8">
                                <div id="listado-estados-civiles">

                                </div>
                            </div>
                    </div>

                    <div class="row mt-3 mb-5" id="gestion-seccion">
                        <div class="col-4">
                            <div class="card text-center">
                                <div class="card-header">
                                    <h4>Sección de trabajo</h4>
                                </div>
                                
                                <div class="card-body">
                                    <div class="form-registro my-3">
                                        <form action="">
                                            
                                            <div class="my-5">
                                                <input class="form-control" type="text" id="nombre-seccion" placeholder="Sección">
                                                <small class="text-danger"></small>
                                            </div>
                                            
                                            <div class="col my-5">
                                                <button type="button" class="btn btn-mediano btn-verde" id="btn-registrar-seccion">Registrar</button>
                                            </div>
               
                                            <div id="rta-seccion" class="my-2">

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-8">
                                <div id="listado-secciones">

                                </div>
                            </div>
                    </div>

                    <div class="row mt-3 mb-5" id="gestion-area">
                        <div class="col-4">
                            <div class="card text-center">
                                <div class="card-header">
                                    <h4>Area de trabajo</h4>
                                </div>
                                
                                <div class="card-body">
                                    <div class="form-registro my-3">
                                        <form action="">
                                            
                                            <div class="my-5">
                                                <input class="form-control" type="text" id="nombre-area" placeholder="Area">
                                                <small class="text-danger"></small>
                                            </div>
                                            
                                            <div class="col my-5">
                                                <button type="button" class="btn btn-mediano btn-verde" id="btn-registrar-area">Registrar</button>
                                            </div>
               
                                            <div id="rta-area" class="my-2">

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-8">
                                <div id="listado-areas">

                                </div>
                        </div>
                    </div>

                    <div class="row mt-3 mb-5" id="gestion-cargo">
                        <div class="col-4">
                            <div class="card text-center">
                                <div class="card-header">
                                    <h4>Cargo</h4>
                                </div>
                                
                                <div class="card-body">
                                    <div class="form-registro my-3">
                                        <form action="">
                                            
                                            <div class="mt-5 mb-3">
                                                <input class="form-control" type="text" id="nombre-cargo" placeholder="Cargo">
                                                <small class="text-danger"></small>
                                            </div>

                                            <div class="my-3">
                                                <select class="form-select" id="seccion-cargo">
                                                    <option value="" selected>Seleccione la sección de trabajo</option>
                                                    <?php
                                                        for ($i=0; $i < count($listaSecciones); $i++):
                                                            ?>
                                                                <option value="<?php echo $listaSecciones[$i]->getId_seccion() ?>"> <?php echo $listaSecciones[$i]->getNombre() ?></option>
                                                            <?php
                                                        endfor;
                                                    ?>
                                                </select>
                                                <small class="text-danger"></small>
                                            </div>

                                            <div class="mt-3 mb-5">
                                                <select class="form-select" id="area-cargo">
                                                    <option value="" selected>Seleccione el area de trabajo</option>
                                                    <?php
                                                        for ($i=0; $i < count($listaAreas); $i++):
                                                            ?>
                                                                <option value="<?php echo $listaAreas[$i]->getId_area() ?>"> <?php echo $listaAreas[$i]->getNombre() ?></option>
                                                            <?php
                                                        endfor;
                                                    ?>
                                                </select>
                                                <small class="text-danger"></small>
                                            </div>
                                            
                                            <div class="col my-5">
                                                <button type="button" class="btn btn-mediano btn-verde" id="btn-registrar-cargo">Registrar</button>
                                            </div>
               
                                            <div id="rta-cargo" class="my-2">

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-8">
                                <div id="listado-cargos">

                                </div>
                            </div>
                    </div>

                    <div class="row mt-3 mb-5" id="gestion-sucursal">
                        <div class="col-4">
                            <div class="card text-center">
                                <div class="card-header">
                                    <h4>Sucursal</h4>
                                </div>
                                
                                <div class="card-body">
                                    <div class="form-registro my-3">
                                        <form action="">
                                            
                                            <div class="my-5">
                                                <input class="form-control" type="text" id="nombre-sucursal" placeholder="Sucursal">
                                                <small class="text-danger"></small>
                                            </div>
                                            
                                            <div class="col my-5">
                                                <button type="button" class="btn btn-mediano btn-verde" id="btn-registrar-sucursal">Registrar</button>
                                            </div>
               
                                            <div id="rta-sucursal" class="my-2">

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-8">
                                <div id="listado-sucursales">

                                </div>
                            </div>
                    </div>

                    <div class="row mt-3 mb-5" id="gestion-eps">
                        <div class="col-4">
                            <div class="card text-center">
                                <div class="card-header">
                                    <h4>EPS</h4>
                                </div>
                                
                                <div class="card-body">
                                    <div class="form-registro my-3">
                                        <form action="">
                                            
                                            <div class="my-5">
                                                <input class="form-control" type="text" id="nombre-eps" placeholder="EPS">
                                                <small class="text-danger"></small>
                                            </div>
                                            
                                            <div class="col my-5">
                                                <button type="button" class="btn btn-mediano btn-verde" id="btn-registrar-eps">Registrar</button>
                                            </div>
               
                                            <div id="rta-eps" class="my-2">

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-8">
                                <div id="listado-epss">

                                </div>
                            </div>
                    </div>

                    <div class="row mt-3 mb-5" id="gestion-nivel-academico">
                        <div class="col-4">
                            <div class="card text-center">
                                <div class="card-header">
                                    <h4>Nivel Academico</h4>
                                </div>
                                
                                <div class="card-body">
                                    <div class="form-registro my-3">
                                        <form action="">
                                            
                                            <div class="my-5">
                                                <input class="form-control" type="text" id="nombre-nivel-academico" placeholder="Nivel academico">
                                                <small class="text-danger"></small>
                                            </div>
                                            
                                            <div class="col my-5">
                                                <button type="button" class="btn btn-mediano btn-verde" id="btn-registrar-nivel-academico">Registrar</button>
                                            </div>
               
                                            <div id="rta-nivel-academico" class="my-2">

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-8">
                                <div id="listado-niveles-academicos">

                                </div>
                            </div>
                    </div>

                    <div class="row mt-3 mb-5" id="gestion-pension">
                        <div class="col-4">
                            <div class="card text-center">
                                <div class="card-header">
                                    <h4>Pensión</h4>
                                </div>
                                
                                <div class="card-body">
                                    <div class="form-registro my-3">
                                        <form action="">
                                            
                                            <div class="my-5">
                                                <input class="form-control" type="text" id="nombre-pension" placeholder="Pensión">
                                                <small class="text-danger"></small>
                                            </div>
                                            
                                            <div class="col my-5">
                                                <button type="button" class="btn btn-mediano btn-verde" id="btn-registrar-pension">Registrar</button>
                                            </div>
               
                                            <div id="rta-pension" class="my-2">

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-8">
                                <div id="listado-pensiones">

                                </div>
                            </div>
                    </div>

                    <div class="row mt-3 mb-5" id="gestion-tipo-dotacion">
                        <div class="col-4">
                            <div class="card text-center">
                                <div class="card-header">
                                    <h4>Tipo de dotación</h4>
                                </div>
                                
                                <div class="card-body">
                                    <div class="form-registro my-3">
                                        <form action="">
                                            
                                            <div class="my-5">
                                                <input class="form-control" type="text" id="nombre-tipo-dotacion" placeholder="Tipo de dotación">
                                                <small class="text-danger"></small>
                                            </div>
                                            
                                            <div class="col my-5">
                                                <button type="button" class="btn btn-mediano btn-verde" id="btn-registrar-tipo-dotacion">Registrar</button>
                                            </div>
               
                                            <div id="rta-tipo-dotacion" class="my-2">

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-8">
                                <div id="listado-tipos-dotaciones">

                                </div>
                            </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
   
    <div class="modal fade" id="editar-tipo-documentos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="editar-tipo-documento"></div>
                    <div id="rta-tipo-documento-act" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id='btn-actualizar-tipo-documento'>Actualizar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editar-tipos-contratos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar tipo de contrato</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="editar-tipo-contrato"></div>
                    <div id="rta-tipo-contrato-act" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id='btn-actualizar-tipo-contrato'>Actualizar</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="editar-generos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar genero</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="editar-genero"></div>
                    <div id="rta-genero-act" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id='btn-actualizar-genero'>Actualizar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editar-estados-civiles" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Estado civil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="editar-estado-civil"></div>
                    <div id="rta-estado-civil-act" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id='btn-actualizar-estado-civil'>Actualizar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editar-secciones" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar sección</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="editar-seccion"></div>
                    <div id="rta-seccion-act" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id='btn-actualizar-seccion'>Actualizar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editar-areas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar area</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="editar-area"></div>
                    <div id="rta-area-act" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id='btn-actualizar-area'>Actualizar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editar-cargos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar cargo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="editar-cargo"></div>
                    <div id="rta-cargo-act" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id='btn-actualizar-cargo'>Actualizar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editar-sucursales" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar sucursal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="editar-sucursal"></div>
                    <div id="rta-sucursal-act" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id='btn-actualizar-sucursal'>Actualizar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editar-epss" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar EPS</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="editar-eps"></div>
                    <div id="rta-eps-act" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id='btn-actualizar-eps'>Actualizar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editar-niveles-academicos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar nivel academico</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="editar-nivel-academico"></div>
                    <div id="rta-nivel-academico-act" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id='btn-actualizar-nivel-academico'>Actualizar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editar-pensiones" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar pensión</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="editar-pension"></div>
                    <div id="rta-pension-act" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id='btn-actualizar-pension'>Actualizar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editar-tipos-dotaciones" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar tipo de dotación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="editar-tipo-dotacion"></div>
                    <div id="rta-tipo-dotacion-act" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id='btn-actualizar-tipo-dotacion'>Actualizar</button>
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