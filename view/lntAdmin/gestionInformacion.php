<?php
    session_start();

    $_SESSION['id_admin'] = "1214124";
    $_SESSION['nombre_admin'] = "Carlos";

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
            <?php include_once("menu.php");?>
            <div class="col-10 ps-0">
                <div class="container mt-4 px-5">
                    <div class="row ">
                        <div class="col">
                            <h2 class="mb-3 text-center">Gestión de información</h2>
                        </div>

                    </div>
                    
                </div>
                <div class="container mt-4 px-5">
                    <div class="row my-3">
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
                    <div class="row my-3">
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
                    <div class="row mt-3 mb-5">
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