<?php
    session_start();

    require_once ('../../models/DAO/EstadoDAO.php');
    require_once ('../../models/DAO/TipoContratoDAO.php');
    require_once ('../../models/DAO/CasaDAO.php');
    require_once('../../models/DAO/SeccionDAO.php');
    require_once('../../models/DAO/AreaDAO.php');
    require_once('../../models/DAO/CargoDAO.php');


    if (isset($_SESSION['id_admin'])) {

        // --- Instacia de los objetos ----

        $estadodao = new EstadoDAO();
        $tipoContratodao = new TipoContratoDAO();
        $casadao = new CasaDAO();
        $secciondao = new SeccionDAO();
        $areadao = new AreaDAO();
        $cargodao = new CargoDAO();

        // --- Listas ---

        $listaEstados = $estadodao->listaEstados();
        $listaTipoContratos = $tipoContratodao->listaTiposContratos();
        $listaCasas = $casadao->listaCasas();
        $listaSecciones = $secciondao->listaSecciones();
        $listaAreas = $areadao->listaAreas();
        $listaCargos = $cargodao->listaCargos();
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
        <div class="row justify-content-center">
            <?php include_once("menu.php"); ?>
            <div class="col-10 ps-0 py-5 position-relative" id="cuerpo-pagina">
                <!-- <div class="row pb-4">
                    <div class="col">
                        <h2 class="text-center">Lista Empleados</h2>
                    </div>
                </div>
                <div class="row px-5">
                    <div class="col overflow-auto">
                        <div id="listado-usuarios"></div>
                    </div>
                </div> -->
                    <div class="row">
                        <div class="col">
                            <h2>Gestión de personal</h2>
                        </div>
                    </div>
                    <div id="lista-enlaces" class="my-5  px-5">
                        <div class="row justify-content-around">
                            <div class="col">
                                <h2>Lista de empleados</h2>
                            </div>
                            <div class="col-8">
                                <div class="row justify-content-end">
                                    
                                    <div class="col-6">
                                        <form class="d-flex">
                                            <input class="form-control me-2" type="search" id="buscar_empleado" placeholder="Buscar" aria-label="Search">
                                            <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
                                        </form>
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col overflow-auto">
                                <div id="listado-enlaces"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div id="registro">
                        <div class="row my-5">
                            <div class="col">
                                <h1 class="text-center">Registro</h1>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-3">
                                <a href="registro.php">
                                    <div class="cont-icono p-3">
                                        <div class="icono">
                                            <i class="fa-solid fa-user-plus"></i>
                                        </div>     
                                        <div class="titulo-icono mt-4">
                                            Registrar Usuario
                                        </div>
                                    </div>
                                </a>
                                
                            </div>
                            <!-- <div class="col-3">
                                <a href="#">
                                    <div class="cont-icono p-3">
                                        <div class="icono">
                                            <i class="fa-solid fa-user-tie"></i>
                                        </div>     
                                        <div class="titulo-icono mt-4">
                                            Dotaciones
                                        </div>
                                    </div>
                                </a>
                                
                            </div> -->
                            
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
   

    <!-- <div class="modal fade" id="editar-usuarios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modificar usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="editar-usuario"></div>
                    <div id="rta-usuario-act" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btn-actualizar-usuario">Actualizar</button>
                </div>
            </div>
        </div>
    </div> -->

    
</body>
</html>

<?php
   

    }else{

        header("Location: ../../index.php");
    }    


?>