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
            <div class="col-10 ps-0 py-5 position-relative">
                <div class="bg-verde-tpt col w-100 d-flex justify-content-end position-fixed top-0 end-0">
                    <div class="nav-item dropdown py-3">
                        <a class="navbar-brand dropdown-toggle text-white" href="#" id="menu-desplegable-listas">
                            Listas de empleados
                        </a>
                        <ul class="dropdown-menu" id="menu-desplegado">
                            <li><a class="dropdown-item" href="#lista-enlaces">Lista de empleados</a></li>
                            <li><a class="dropdown-item" href="#reportes-empleados-fechas">Reporte inicio</a></li>
                            <li><a class="dropdown-item" href="#reportes-empleados-salario">Reporte por salario</a></li>
                        </ul>
                    </div>

                </div>
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
                    <div id="lista-enlaces" class="my-5  px-5">
                        <div class="row justify-content-around">
                            <div class="col">
                                <h2>Lista de empleados</h2>
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    <div class="col">
                                        <select class="form-select" id="filtro-empleado">
                                            <option selected value="todos">Todos</option>
                                            <?php
                                                for ($i=0; $i < count($listaEstados); $i++) { 
                                                    ?>
                                                        <option  value="estado <?php echo $listaEstados[$i]->getId_estado(); ?>">Empleado <?php echo strtolower($listaEstados[$i]->getNombre()); ?></option>
                                                       
                                                    <?php
                                                }

                                                for ($i=0; $i < count($listaTipoContratos); $i++) { 
                                                    ?>
                                                        <option  value="contrato <?php echo $listaTipoContratos[$i]->getId_tipo_contrato(); ?>">Contrato <?php echo strtolower($listaTipoContratos[$i]->getNombre()); ?></option>
                                                       
                                                    <?php
                                                }

                                                for ($i=0; $i < count($listaCasas); $i++) { 
                                                    ?>
                                                        <option  value="casa <?php echo $listaCasas[$i]->getId_casa(); ?>">Tipo de casa <?php echo strtolower($listaCasas[$i]->getNombre()); ?></option>
                                                       
                                                    <?php
                                                }
                                            ?>
                                            
                                        </select>
                                    </div>
                                    <div class="col">
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
                    <div id="reportes-empleados-fechas" class="my-5 px-5">
                        <div class="row">
                            <div class="col">
                                <h2>Reportes de entrada de los empleados</h2>
                            </div>
                        </div>
                        <div class="row justify-content-center py-4">
                            <div class="col-4">
                                <label for="">Fecha inicio</label>
                                <input type="date" class="form-control" id="fecha_inicio">
                                <small class="text-danger"></small>
                            </div>
                            <div class="col-4">
                                <label for="">Fecha fin</label>
                                <input type="date" class="form-control" id="fecha_fin">
                                <small class="text-danger"></small>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-4">
                                <button class="btn btn-verde w-100" id="btn-buscar-fecha">Buscar</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col"> 
                                <div id="lista-intervalo-fecha">

                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div id="reportes-empleados-salario" class="my-5 px-5">
                        <div class="row">
                            <div class="col">
                                <h2>Reportes empleados por salario</h2>
                            </div>
                        </div>
                        <div class="row justify-content-center py-4">
                            <div class="col-4">
                                <input type="text" class="form-control" id="inicio_salario" placeholder="Desde...">
                                <small class="text-danger"></small>
                            </div>
                            <div class="col-4">
                        
                                <input type="text" class="form-control" id="fin_salario" placeholder="Hasta">
                                <small class="text-danger"></small>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-4">
                                <button class="btn btn-verde w-100" id="btn-buscar-salario">Buscar</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col"> 
                                <div id="lista-intervalo-salario">

                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div id="reportes-empleados-cargo" class="my-5 px-5">
                        <div class="row">
                            <div class="col">
                                <h2>Reportes por sección, area o cargo de los empleados</h2>
                            </div>
                        </div>
                        <div class="row  align-items-center py-4">
                            <div class="col ">
                                <div class=" row justify-content-center flex-column align-items-center">
                                    <div class="col-4 mt-3 form-check">
                                        <input type="radio" class="form-check-input" id="opc-seccion" name="opcTrabajo" value="seccion">
                                        <label class="form-check-label" for="opc-seccion">
                                            Sección
                                        </label>
                                    </div>
                                    <div class="col-4 my-2 form-check">
                                        <input class="form-check-input"  type="radio" id="opc-area" name="opcTrabajo" value="area">
                                        <label class="form-check-label" for="opc-area">
                                            Area
                                        </label>
                                    </div>
                                    <div class="col-4 mb-3 form-check">
                                        <input class="form-check-input" type="radio" id="opc-cargo" name="opcTrabajo" value="cargo">
                                        <label class="form-check-label" for="opc-cargo">
                                            Cargo
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="row justify-content-center">
                                    <h4 id="text_info">Seleccionar una opción</h4>
                                    <div class="col-8 d-none" id="campo-seccion">
                                        <select class="form-select" id="seccion_reporte">
                                            <option value="">Sección</option>
                                            <?php
                                                            
                                                for ($i=0; $i < count($listaSecciones); $i++):
                                                    ?>
                                                        <option value="<?php echo $listaSecciones[$i]->getId_seccion(); ?>"><?php echo $listaSecciones[$i]->getNombre(); ?></option>
                                                    <?php
                                                endfor;
                                            ?>
                                        </select>
                                        <small class="text-danger"></small>
                                    </div>

                                    <div class="col-8 d-none" id="campo-area">
                                        <select id="area_reporte" class="form-select">
                                            <option value="">Area</option>
                                            <?php
                                                            
                                                for ($i=0; $i < count($listaAreas); $i++):
                                                        ?>
                                                            <option value="<?php echo $listaAreas[$i]->getId_area(); ?>"><?php echo $listaAreas[$i]->getNombre(); ?></option>
                                                        <?php
                                                    endfor;
                                            ?>
                                        </select>
                                        <small class="text-danger"></small>
                                    </div>

                                    <div class="col-8 d-none" id="campo-cargo">
                                        <select id="cargo_reporte" class="form-select">
                                            <option value="">Cargo</option>
                                            <?php
                                                            
                                                for ($i=0; $i < count($listaCargos); $i++):
                                                        ?>
                                                            <option value="<?php echo $listaCargos[$i]->getId_cargo(); ?>"><?php echo $listaCargos[$i]->getNombre(); ?></option>
                                                        <?php
                                                    endfor;
                                                ?>
                                        </select>
                                        <small class="text-danger"></small>
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-4">
                                <button class="btn btn-verde w-100" id="btn-buscar-opcion-trabajo">Buscar</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col"> 
                                <div id="lista-opcion-trabajo">

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