<?php
    session_start();


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
                                            <option value="activos">Activos</option>
                                            <option value="inactivos">Inactivos</option>
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
                </div>
            </div>

        </div>
        
    </div>

    
   

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