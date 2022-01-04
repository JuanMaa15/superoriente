<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperOriente - Iniciar Sesión</title>
    <link rel="shortcut icon" href="view/img/logo.png" type="image/ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="view/css/style.css">
    <script src="public/js/jquery.js"></script>

</head>
<body>
    <!--------------- Body form -------- -->

    <div id="seccion-login" class="position-relative">
        <div class="container position-absolute w-100 top-50 start-50 translate-middle">
            <div class="row justify-content-center">
                <div class="col-9">
                    <div class="cont-ingresar">
                        <div class="row">
                            <div class="col-5 bg-verde-tpt d-none-mov">
                                <div class="cont-info-int h-100 w-100 d-flex justify-content-center align-items-center">
                                    <div class="logo-img">
                                        <img class="w-100 " src="view/img/logo.png">
                                    </div>

                                </div>
                            </div>
                            <div class="col bg-blanco-tpt">
                                <div class="form-inicio-sesion py-4 px-4">
                                    <form action="controller/correo/RecuperarClave.php" method="post">
                                        <div class="logo-img-mov">
                                            <img src="view/img/logo.png" class="w-50" alt="Superoriente">
                                        </div>
                                        <h2 class="titulos text-center mt-5 mb-3 text-verde">Recuperar contraseña</h2>
                                        <div class="my-5 position-relative">
                                            <input type="email" class="form-control py-2 ps-5" name="correo-recuperacion" placeholder="Correo Electrónico">
                                            <small class="text-danger"></small>
                                            <label for="" class="label-mov"><i class="fas fa-user"></i></label>
                                            
                                        </div>
                            
                                        <div class="my-2 d-flex justify-content-center">
                                            <button class="btn btn-mediano btn-verde" id="btn-recuperar-contraseña" type="submit">Enviar</button>
                                        </div>
                                        <div class="mb-2 text-center">
                                            <a class="text-negro nav-link" href="index.php"><< Regresar</a>
                                        </div>
                                       
                                        <?php
                                            if (isset($_GET['error'])) {
                                                ?>
                                                    <div class="my-4 d-flex justify-content-center">
                                                        <div class='alert alert-danger w-100' role='alert'>El correo ingresado no está registrado</div>
                                                    </div>
                                                <?php
                                            }
                                        ?>
                                        
                                        
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
    <script src="view/js/app.js"></script>
</body>
</html>