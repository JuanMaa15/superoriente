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
        <div class="row justify-content-center" id="cuerpo-pagina">
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
                    <div id="lista-enlaces" class="my-5  px-5 d-none">
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
                               <!--  <div id="listado-enlaces"></div> -->
                            </div>
                        </div>
                    </div>
                    <div class="row d-none">
                        <div class="col">
                            <div id="reportes-empleados-fechas" class="my-5 py-3 px-5 cont-lista-reporte">
                                <div class="row ">
                                    <div class="col">
                                        <h3>Reportes de entrada de los empleados</h3>
                                    </div>
                                </div>
                                <div class="row justify-content-center py-4">
                                    <div class="col">
                                        <label for="">Fecha inicio</label>
                                        <input type="date" class="form-control" id="fecha_inicio">
                                        <small class="text-danger"></small>
                                    </div>
                                    <div class="col">
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
                        </div>
                        <div class="col">
                            <div id="reportes-empleados-salario" class="my-5 py-3 px-5 cont-lista-reporte">
                                <div class="row">
                                    <div class="col">
                                        <h3>Reportes empleados por salario</h3>
                                    </div>
                                </div>
                                <div class="row justify-content-center py-4">
                                    <div class="col">
                                        <input type="text" class="form-control" id="inicio_salario" placeholder="Desde...">
                                        <small class="text-danger"></small>
                                    </div>
                                    <div class="col">
                                
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
                        </div>
                    </div>
                    

                    

                    <div id="reportes-empleados-cargo" class="my-5 px-5 cont-lista-reporte py-3 d-none">
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
                                <button class="btn btn-verde w-100 listado-reporte-empleado" id="btn-buscar-opcion-trabajo">Buscar</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col"> 
                                <div id="lista-opcion-trabajo">

                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div id="reportes-empleado" class="my-4">
                        <div class="row">
                            <div class="col text-center">
                                <h2>Reportes del empleado con filtros</h2>
                            </div>
                        </div>
                        
                        <div class="row" id="cont-filtros-reporte">
                                
                        </div>
                        
                        
                        
                        <div class="row">
                            <!-- <div class="col-3 mb-5 mt-3 h-0 agregar-remover-filtro">
                                <button class="btn btn-verde" id="btn-agregar-filtro-empleado">Agregar filtro  +</button>
                                <button class="btn btn-verde mt-2 d-none " id="btn-remover-filtro">Remover filtro  -</button>
                            </div> -->
                            <div class="col-3 my-3">
                                <div class="form-check my-3">
                                    <input class="form-check-input listado-campos-usuario" type="checkbox" value="tbl_area" id="listado-campos0">
                                    <label class="form-check-label" for="flexCheckDefault">Area</label>
                                </div>
                                <div class="form-check my-3">
                                    <input class="form-check-input listado-campos-usuario" type="checkbox" value="tbl_cargo" id="listado-campos1">
                                    <label class="form-check-label" for="flexCheckDefault">Cargo</label>
                                </div>
                                <div class="form-check my-3">
                                    <input class="form-check-input listado-campos-usuario" type="checkbox" value="tbl_cesantia" id="listado-campos2">
                                    <label class="form-check-label" for="flexCheckDefault">Cesantía</label>
                                </div>
                                <div class="form-check my-3">
                                    <input class="form-check-input listado-campos-usuario" type="checkbox" value="tbl_clase_riesgo" id="listado-campos3">
                                    <label class="form-check-label" for="flexCheckDefault">Clase de riesgo</label>
                                </div>
                                <div class="form-check my-3">
                                    <input class="form-check-input listado-campos-usuario" type="checkbox" value="tbl_eps" id="listado-campos4">
                                    <label class="form-check-label" for="flexCheckDefault">EPS</label>
                                </div>
                                <div class="form-check my-3">
                                    <input class="form-check-input listado-campos-usuario" type="checkbox" value="tbl_estado" id="listado-campos5">
                                    <label class="form-check-label" for="flexCheckDefault">Estado</label>
                                </div>
                            </div>
                            <div class="col-3 mb-5 my-3">
                                <div class="form-check my-3">
                                    <input class="form-check-input listado-campos-usuario" type="checkbox" value="tbl_estado_civil" id="listado-campos6">
                                    <label class="form-check-label" for="flexCheckDefault">Estado civil</label>
                                </div>
                                <div class="form-check my-3">
                                    <input class="form-check-input listado-campos-usuario" type="checkbox" value="estrato" id="listado-campos7">
                                    <label class="form-check-label" for="flexCheckDefault">Estrato</label>
                                </div>
                                <div class="form-check my-3">
                                    <input class="form-check-input listado-campos-usuario" type="checkbox" value="fecha" id="listado-campos8">
                                    <label class="form-check-label" for="flexCheckDefault">Fecha</label>
                                </div>
                                <div class="form-check my-3">
                                    <input class="form-check-input listado-campos-usuario" type="checkbox" value="tbl_genero" id="listado-campos9">
                                    <label class="form-check-label" for="flexCheckDefault">Género</label>
                                </div>
                                <div class="form-check my-3">
                                    <input class="form-check-input listado-campos-usuario" type="checkbox" value="tbl_hijo" id="listado-campos10">
                                    <label class="form-check-label" for="flexCheckDefault">Hijos</label>
                                </div>
                                
                            </div>
                            <div class="col-3 my-3">
                                <div class="form-check my-3">
                                    <input class="form-check-input listado-campos-usuario" type="checkbox" value="tbl_lugar_residencia" id="listado-campos11">
                                    <label class="form-check-label" for="flexCheckDefault">Lugar de residencia</label>
                                </div>
                                <div class="form-check my-3">
                                    <input class="form-check-input listado-campos-usuario" type="checkbox" value="tbl_nivel_academico" id="listado-campos12">
                                    <label class="form-check-label" for="flexCheckDefault">Nivel academico</label>
                                </div>
                                <div class="form-check my-3">
                                    <input class="form-check-input listado-campos-usuario" type="checkbox" value="tbl_pension" id="listado-campos13">
                                    <label class="form-check-label" for="flexCheckDefault">Pensión</label>
                                </div>
                                <div class="form-check my-3">
                                    <input class="form-check-input listado-campos-usuario" type="checkbox" value="salario" id="listado-campos14">
                                    <label class="form-check-label" for="flexCheckDefault">Salario</label>
                                </div>
                                <div class="form-check my-3">
                                    <input class="form-check-input listado-campos-usuario" type="checkbox" value="tbl_seccion" id="listado-campos15">
                                    <label class="form-check-label" for="flexCheckDefault">Sección</label>
                                </div>
                                
                            </div>
                            <div class="col-3 my-3">
                                <div class="form-check my-3">
                                    <input class="form-check-input listado-campos-usuario" type="checkbox" value="tbl_sucursal" id="listado-campos16">
                                    <label class="form-check-label" for="flexCheckDefault">Sucursal</label>
                                </div>
                                <div class="form-check my-3">
                                    <input class="form-check-input listado-campos-usuario" type="checkbox" value="tbl_tipo_contrato" id="listado-campos17">
                                    <label class="form-check-label" for="flexCheckDefault">Tipo de contrato</label>
                                </div>
                                <div class="form-check my-3">
                                    <input class="form-check-input listado-campos-usuario" type="checkbox" value="tbl_tipo_dotacion" id="listado-campos18">
                                    <label class="form-check-label" for="flexCheckDefault">Tipo de dotación</label>
                                </div>
                                <div class="form-check my-3">
                                    <input class="form-check-input listado-campos-usuario" type="checkbox" value="tbl_tipo_sangre_rh" id="listado-campos19">
                                    <label class="form-check-label" for="flexCheckDefault">Tipo de sangre y RH</label>
                                </div>
                                <div class="form-check my-1">
                                    <input class="form-check-input listado-campos-usuario" type="checkbox" value="tbl_casa" id="listado-campos20">
                                    <label class="form-check-label" for="flexCheckDefault">Tipo de vivienda</label>
                                </div>
                                
                                
                            </div>
                        
                        </div>

                        <div class="row my-2">
                            
                            <div id="listado-datos0" class="col-3 my-2 ms-1 d-none">

                            </div>
                            
                          
                            <div id="listado-datos1" class="col-3 my-2 ms-1 d-none">

                            </div>
                        
                        
                            <div id="listado-datos2" class="col-3 my-2 ms-1 d-none">

                            </div>
                        
                
                            <div id="listado-datos3" class="col-3 my-2 ms-1 d-none">

                            </div>
                        
                        
                            <div id="listado-datos4" class="col-3 my-2 ms-1 d-none">

                            </div>
                        
                        
                            <div id="listado-datos5" class="col-3 my-2 ms-1 d-none">

                            </div>
                        
                    
                            <div id="listado-datos6" class="col-3 my-2 ms-1 d-none">

                            </div>
                    
                        
                            <div id="listado-datos7" class="col-3 my-2 ms-1 d-none">

                            </div>
                        
                            <div id="listado-datos8" class="col-3 my-2 ms-1 d-none">

                            </div>
                        
                        
                            <div id="listado-datos9" class="col-3 my-2 ms-1 d-none">

                            </div>
                    
                        
                            <div id="listado-datos10" class="col-3 my-2 ms-1 d-none">

                            </div>
                    
                    
                            <div id="listado-datos11" class="col-3 my-2 ms-1 d-none">

                            </div>
                    
                        
                            <div id="listado-datos12" class="col-3 my-2 ms-1 d-none">

                            </div>
                        
                    
                            <div id="listado-datos13" class="col-3 my-2 ms-1 d-none">

                            </div>
                    
                    
                            <div id="listado-datos14" class="col-3 my-2 ms-1 d-none">

                            </div>
                    
                        
                            <div id="listado-datos15" class="col-3 my-2 ms-1 d-none">

                            </div>
                        
                        
                            <div id="listado-datos16" class="col-3 my-2 ms-1 d-none">

                            </div>
                        
                        
                        
                            <div id="listado-datos17" class="col-3 my-2 ms-1 d-none">

                            </div>
                        
                    
                            <div id="listado-datos18" class="col-3 my-2 d-none">

                            </div>
                    
                    
                            <div id="listado-datos19" class="col-3 my-2 d-none">

                            </div>
                    
                        
                            <div id="listado-datos20" class="col-3 my-2 d-none">

                            </div>
                        
                            <div id="listado-datos21" class="col-3 my-2 d-none">

                            </div>
                        
                          
                            
                        </div>

                        <div class='row my-2'>
                            <div class='col texto-claro'>
                                <h6 class='titulo-campos '>Selecciones:</h6>
                                <div id='filtros-seleccionados'></div>
                            </div>
                        </div>
                        <div id='rta-filtros-empleado'></div>
                        <div class='row mt-2'>
                            <div class='col d-flex justify-content-center'>
                                <button class='btn btn-verde listado-reporte-empleado' id='btn-generar-listado-reporte'>Generar lista</button>
                            </div>
                        </div>
                        <div class='row mt-4'>
                            <div class='col'>
                                <div id='listado-empleado-filtros'></div>
                            </div>
                        </div>

                        <div class="my-3 d-flex justify-content-center d-none">
                            <button class="text-center btn btn-verde" id="btn-mostrar-reporte">Enviar</button>
                        </div>
                        
                        <div class="row">
                            <div class="">

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