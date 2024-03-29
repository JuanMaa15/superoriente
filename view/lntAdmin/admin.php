<?php
    session_start();

    if (isset($_SESSION['id_admin'])) {

        require_once('../../models/DAO/UsuarioDAO.php');

        $usuariodao = new UsuarioDAO();

        $listaUsuario = $usuariodao->listaUsuarios();
        $listaUsuarioActivos = $usuariodao->ListaEstadoUsuario(1);
        $listaUsuarioInactivos = $usuariodao->ListaEstadoUsuario(2);
        $listaNuevosEmpleados = $usuariodao->ListaEmpleadosNuevos();
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
<!--     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">-->
    <script src="https://kit.fontawesome.com/4240342587.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../../public/js/jquery.js"></script>

</head>
<body style="overflow: hidden; padding-right: 17px;" class="modal-open">
    <!--------------- Body form -------- -->
    <div class="container-fluid ps-0">
        <div class="py-3">
            <?php include_once("menu2.php"); ?>
         </div>
        <div class="row justify-content-center">
            <?php include_once("menu.php");?>
            <div class="col-10 ps-0" id="cuerpo-pagina">
                
                
                <div class="container mt-4 px-5">

                    <div class="row justify-content-center my-5">
                        <div class="col">
                            <div class="cont-info-rapida p-3">
                                <div class="row">
                                    <div class="col">
                                        <h3><?php echo count($listaUsuario); ?></h3>
                                        <span class="fs-6">Empleados</span>
                                    </div>
                                    <div class="col d-flex justify-content-center align-items-center">
                                        <i class="fa-solid fa-user-tie"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="cont-info-rapida p-3">
                                <div class="row">
                                    <div class="col">
                                        <h3><?php echo count($listaUsuarioActivos); ?></h3>
                                        <span class="fs-6">Activos</span>
                                    </div>
                                    <div class="col d-flex justify-content-center align-items-center">
                                    <i class="fa-solid fa-user-gear"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="cont-info-rapida">
                                 <div class="row p-3">
                                    <div class="col">
                                        <h3><?php echo count($listaUsuarioInactivos); ?></h3>
                                        <span class="fs-6">Inactivos</span>
                                    </div>
                                    <div class="col d-flex justify-content-center align-items-center">
                                     <i class="fa-solid fa-user-large-slash"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-5">
                            <div class="cont-nuevos-empleados px-3">

                                <div class="row border-bottom-black justify-content-around align-items-center">
                            
                                    <div class="col-5">
                                        <h5 class="pt-3 pb-1">Nuevos empleados</h5>
                                    </div>
                                    <div class="col-4">
                                        <a href="personal.php" class="btn btn-verde">Ver todos</a>
                                    </div>
                                </div>
                                <div class="row pt-2">
                                    <div class="col">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th scope="col">Nro de documento</th>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Apellido</th>
                                                <th scope="col">Días</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $alerta1 = "";
                                                    $alerta2 = "";
                                                    $alerta3 = "";
                                                    for ($i=0; $i < count($listaNuevosEmpleados); $i++):
                                                        $fecha_actual = date_create(date('dmy'));
                                                        $fecha_ingreso = date_create($listaNuevosEmpleados[$i]->getFecha_ingreso());

                                                        $contador = date_diff($fecha_actual, $fecha_ingreso);

                                                        ?>
                                                            
                                                            <tr>
                                                                <td><?php echo $listaNuevosEmpleados[$i]->getId_usuario(); ?></td>
                                                                <td><?php echo $listaNuevosEmpleados[$i]->getNombre(); ?></td>
                                                                <td><?php echo $listaNuevosEmpleados[$i]->getApellido(); ?></td>
                                                                <td><?php echo $contador->format('%a'); ?></td>

                                                            </tr>
                                                        <?php

                                                        if ($contador->format('%a') == '30') {
                                                            $alerta1 .= " - " . $listaNuevosEmpleados[$i]->getNombre() . " " . $listaNuevosEmpleados[$i]->getApellido();
                                                        }else if ($contador->format('%a') == '45') {
                                                            $alerta2 .= " - " . $listaNuevosEmpleados[$i]->getNombre() . " " . $listaNuevosEmpleados[$i]->getApellido();

                                                        }else if($contador->format('%a') == '60'){
                                                            $alerta3 .= " - " . $listaNuevosEmpleados[$i]->getNombre() . " " . $listaNuevosEmpleados[$i]->getApellido();

                                                        }
                                                    endfor;
                                                ?>
                                              
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-7">

                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col">
                        <h2 class="mb-3">Registrar un nuevo empleado</h2>
                        </div>
                    </div>
                    <div class="row align-items-center border-bottom pb-4">
                        <div class="col">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis dignissim mauris. Nam
                                dui nisl, vehicula nec ultricies vitae, aliquam a neque. Donec aliquam gravida aliquet. Pellentesq
                               ue pretium, ante a fringilla vulputate, elit diam convallis nulla, id tincidunt diam lacus dictum
                                purus. Vivamus vel eros congue, molestie diam et, ultricies erat.</p>
                        </div>
                        <div class="col-4 px-5">
                            <a href="registro.php" id="btn-img-registro" class="btn-img position-relative d-block w-100">
                                <div class="cont-img">
                                    <img class="w-100" src="../img/img-registro.jpg">
                                </div>
                                <div class="cont-descripcion p-2 position-absolute top-100 start-0  bg-negro-tpt w-100">
                                    <h5 class="text-white">Registrar Empleado</h5>
                                </div>
                            </a>
                            
                        </div>

                    </div> -->

                    <!-- <div class="row mt-5">
                        <div class="col">
                        <h2 class="mb-3">Generar reportes</h2>
                        </div>
                    </div>
                    <div class="row align-items-center border-bottom pb-4">
                        <div class="col">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis dignissim mauris. Nam
                                dui nisl, vehicula nec ultricies vitae, aliquam a neque. Donec aliquam gravida aliquet. Pellentesq
                               ue pretium, ante a fringilla vulputate, elit diam convallis nulla, id tincidunt diam lacus dictum
                                purus. Vivamus vel eros congue, molestie diam et, ultricies erat.</p>
                        </div>
                        <div class="col-4 px-5">
                            <a href="registro.php" id="btn-img-registro" class="btn-img position-relative d-block w-100">
                                <div class="cont-img">
                                    <img class="w-100" src="../img/img-registro.jpg">
                                </div>
                                <div class="cont-descripcion p-2 position-absolute top-100 start-0  bg-negro-tpt w-100">
                                    <h5 class="text-white">Registrar Empleado</h5>
                                </div>
                            </a>
                            
                        </div>

                    </div> -->

                    <!-- <div class="row my-4 justify-content-center">
                        
                        <div class="col px-5">
                            <a href="#" id="btn-img-carta" class="btn-img position-relative d-block w-100">
                                <div class="cont-img">
                                    <img class="w-100" src="../img/img-contrato.jpg">
                                </div>
                                <div class="cont-descripcion p-2 position-absolute top-100 start-0  bg-negro-tpt w-100">
                                    <h5 class="text-white">Carta Laboral</h5>
                                </div>
                            </a>
                        </div>
                        
                    </div> -->
                </div>
            </div>

        </div>
    </div>
    
    <?php
        if ($alerta1 != "") {
            ?>

            <div class="trama">

            </div>
            <div class="alerta-modal">
                <div class="modal-encabezado border-bottom">
                    <div class="icono-salir" id="icono-salir-modal">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                    <div class="titulo-periodo-evaluacion">
                        <h5>30 días</h5>
                    </div>
                </div>
                <div class="modal-cuerpo border-bottom">
                    Estas personas llevan 30 días de periodo de prueba: <?php echo $alerta1; ?>
                </div>
                <div class="modal-pie d-flex justify-content-end">
                    <button type="button" class="btn btn-secondary btn-salir-modal" id="salir-alerta">Close</button>
                </div>
            </div>

            
            <?php
        }

        if ($alerta2 != "") {
            ?>
            <div class="trama">

            </div>
            <div class="alerta-modal">
                <div class="modal-encabezado border-bottom">
                    <div class="icono-salir" id="icono-salir-modal">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                    <div class="titulo-periodo-evaluacion">
                        <h5>45 días</h5>
                    </div>
                </div>
                <div class="modal-cuerpo border-bottom">
                    Estas personas llevan 45 días de periodo de prueba: <?php echo $alerta2; ?>
                </div>
                <div class="modal-pie d-flex justify-content-end">
                    <button type="button" class="btn btn-secondary btn-salir-modal" id="salir-alerta">Close</button>
                </div>
            </div>
            <?php
        } 

        if ($alerta3 != "") {
            ?>
            <div class="trama">

            </div>
            <div class="alerta-modal">
                <div class="modal-encabezado border-bottom">
                    <div class="icono-salir" id="icono-salir-modal">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                    <div class="titulo-periodo-evaluacion">
                        <h5>60 días</h5>
                    </div>
                </div>
                <div class="modal-cuerpo border-bottom">
                    Estas personas llevan 60 días de periodo de prueba: <?php echo $alerta3; ?>
                </div>
                <div class="modal-pie d-flex justify-content-end">
                    <button type="button" class="btn btn-secondary btn-salir-modal" id="salir-alerta">Close</button>
                </div>
            </div>
            <?php
        }
    ?>
   
    


    

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