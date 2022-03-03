<?php
    require_once ('../../models/DAO/UsuarioDAO.php');
    require_once ('../../models/DAO/FamiliarDAO.php');
    require_once ('../../models/DAO/HijoDAO.php');
    session_start();
    

    if (isset($_SESSION['id_admin'])) {

        $usuariodao = new UsuarioDAO();
        $familiardao = new FamiliarDAO();
        $hijodao = new HijoDAO();

        $listaUsuario = $usuariodao->listaUsuario($_GET['doc']);
        $listaFamiliar = $familiardao->listaFamiliar($_GET['doc']);
        $listaHijo = $hijodao->listaHijo($_GET['doc']);
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
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-8 py-2 border">
                    <div class="cabeza-documento bg-verde-tpt">
                        <div class="row py-3">
                            <div class="col d-flex justify-content-center">
                                <img src="../img/logo.png" class="w-30">
                            </div>
                        </div>
                    </div>     
                    <div class="cuerpo-documento">
                        <div class="row"> 
                            <div class="col">
                                <h3 class="text-center my-3">Datos personales</h3>
                                <div class="row justify-content-center">
                                    <div class="col">
                                        <p><b>Tipo de documento:</b> <?php echo $listaUsuario->getTipo_documento(); ?></p>
                                        <p>Lugar de expedición: <?php echo $listaUsuario->getLugar_expedicion(); ?></p>
                                        <p>Edad: <?php echo $listaUsuario->getEdad(); ?></p>
                                        <p>Correo Electrónico: <?php echo $listaUsuario->getCorreo(); ?></p>
                                        <p>Género: <?php echo $listaUsuario->getGenero(); ?></p>
                                        <p>Estado civil: <?php echo $listaUsuario->getEstado_civil(); ?></p>
                                        <p>Fecha de Nacimiento: <?php echo $listaUsuario->getFecha_nacimiento(); ?></p>
                                        <p>EPS: <?php echo $listaUsuario->getEps(); ?></p>
                                        <p>Nro de cuenta: <?php echo $listaUsuario->getNro_cuenta(); ?></p>
                                        <p>Tipo de sangre: <?php echo $listaUsuario->getTipo_sangre(); ?></p>
                                    </div>
                                    <div class="col">
                                        <p>Documento: <?php echo $listaUsuario->getId_usuario(); ?></p>
                                        <p>Fecha de expedición: <?php echo $listaUsuario->getFecha_expedicion(); ?> </p>
                                        <p>Nombre: <?php echo $listaUsuario->getNombre(). " " . $listaUsuario->getApellido(); ?> </p>
                                        <p>Telefono Fijo: <?php echo $listaUsuario->getTelefono_fijo(); ?></p>
                                        <p>Telefono Móvil: <?php echo $listaUsuario->getTelefono_movil(); ?></p>
                                        <p>Dirección: <?php echo $listaUsuario->getDireccion(); ?></p>
                                        <p>Lugar residencia: <?php echo $listaUsuario->getLugar_residencia(); ?></p>
                                        <p>Area academico: <?php echo $listaUsuario->getArea_academica() ?></p>
                                        <p>Nivel academico: <?php echo $listaUsuario->getNivel_academico(); ?></p>
                                        <p>Tipo de casa: <?php echo $listaUsuario->getTipo_casa(); ?></p>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row my-3"> 
                            <div class="col">
                                <div class="row justify-content-center">
                                    <div class="col">
                                        <p>Antecedentes: <?php echo $listaUsuario->getAntecedentes(); ?></p>
                                        <p>Consumo de cigarros: <?php echo $listaUsuario->getConsumo_cigarros(); ?></p>
                                        <p>Consumo de spa: <?php echo $listaUsuario->getConsumo_spa(); ?></p>
                                    </div>
                                    <div class="col">
                                        <p>Practica deporte: <?php echo $listaUsuario->getPractica_deporte(); ?></p>
                                        <P>Consumo licor: <?php echo $listaUsuario->getConsumo_licor(); ?></P>
                                        
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="row my-3 border-bottom"> 
                            <div class="col">
                                <div class="row justify-content-center">
                                    <div class="col">
                                        <p>Nombre de persona de emergencia: <?php echo $listaUsuario->getNombre_persona_emergencia(); ?></p>
                                        <p>Teléfono: <?php echo $listaUsuario->getTelefono_emergencia() ?></p>

                                    </div>
                                    <div class="col">
                                        <p>Celular: <?php echo $listaUsuario->getCelular_emergencia(); ?></p>
                                        <P>Parentesco: <?php echo $listaUsuario->getParentesco_emergencia(); ?></P>
                                        
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="row border-bottom">
                            <div class="col-12">
                                <h3 class="text-center my-3">Datos laborales</h3>
                            </div>
                            <div class="col">
                                <p>Sucursal: <?php echo $listaUsuario->getSucursal(); ?> </p>
                                <p>Fecha retiro: <?php echo $listaUsuario->getFecha_retiro() ?></p>
                                <p>Valor día: <?php echo $listaUsuario->getValor_dia(); ?></p>
                                <p>Porcentaje riesgo:<?php echo $listaUsuario->getPorcentaje_riesgo(); ?> </p>
                                <p>Cargo: <?php echo $listaUsuario->getCargo(); ?></p>
                                
                            </div>
                            <div class="col">
                                <p>Tipo contrato: <?php echo $listaUsuario->getTipo_contrato(); ?></p>
                                <p>Motivo retiro: <?php echo $listaUsuario->getMotivo_retiro(); ?></p>
                                <p>Valor hora: <?php echo $listaUsuario->getValor_hora(); ?></p>
                                <p>Area: <?php echo $listaUsuario->getArea(); ?></p>
                                <p>Pensión: <?php echo $listaUsuario->getPension(); ?></p>
                            </div>
                            <div class="col">
                                 <p>Fecha ingreso: <?php echo $listaUsuario->getFecha_ingreso(); ?></p>
                                <p>Salario: <?php echo $listaUsuario->getSalario(); ?></p>
                                <p>Clase de riesgo: <?php echo $listaUsuario->getClase_riesgo(); ?></p>
                                <p>Sección: <?php echo $listaUsuario->getSeccion(); ?></p>
                                <p>Estado: <?php echo $listaUsuario->getEstado(); ?></p>
                            </div>
                        </div>
                        <div class="row border-bottom">
                            <div class="row-12">
                                <h3 class="text-center my-3">Datos familiares <span class="fs-5">(Personas con las que vive).</span></h3>
                            </div>
                            <div class="row">
                                <?php
                                    for ($i=0; $i < count($listaFamiliar); $i++) { 
                                        ?>
                                        <div class="col-4">
                                            <p>Nro documento: <?php echo $listaFamiliar[$i]->getId_familiar(); ?></p>
                                            <p>Edad: <?php echo $listaFamiliar[$i]->getEdad(); ?></p>
                                        </div>
                                        <div class="col-4">
                                            <p>Nombre: <?php echo $listaFamiliar[$i]->getNombre(); ?></p>
                                            <p>Escolaridad: <?php echo $listaFamiliar[$i]->getEscolaridad(); ?></p>
                                        </div>
                                        <div class="col-4">
                                            <p>Apellido: <?php echo $listaFamiliar[$i]->getApellido(); ?></p>
                                            <p>Parentesco: <?php echo $listaFamiliar[$i]->getParentesco(); ?></p>
                                        </div>
                                        <?php
                                    }
                                ?>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="row-12">
                                <h3 class="text-center my-3">Hijos</h3>
                            </div>
                            <div class="row">
                                <?php
                                    for ($i=0; $i < count($listaHijo); $i++) { 
                                        ?>
                                        <div class="col">
                                            <p>Nombre: <?php echo $listaHijo[$i]->getNombre(); ?></p>
                                            <p>Edad: <?php echo $listaHijo[$i]->getEdad(); ?></p>
                                        </div>
                                        <div class="col">
                                            <p>Apellido: <?php echo $listaHijo[$i]->getApellido (); ?></p>
                                            <p>Fecha nacimiento: <?php echo $listaHijo[$i]->getFecha_nacimiento(); ?></p>
                                        </div>
                                        <?php
                                    }
                                ?>
                            </div>
                            
                        </div>
                    </div>  
                </div>
            </div>
        </div>
        <a href="personal.php" class="btn btn-verde position-fixed top-0 start-0 ms-3 mt-3">
                << Volver
        </a>

        </div>
        <div class="cont-opciones-editar d-flex flex-column p-3 position-fixed top-0 end-0 me-3 mt-3">
            <button class="opcion-editar btn btn-verde my-2" id="btn-editar-datos-personales" value="<?php echo $_GET['doc']; ?>" data-bs-toggle="modal" data-bs-target="#modificar-datos-personales">
                <i class="far fa-edit"></i> Editar datos personales
            </button>
            <button class="opcion-editar btn btn-verde my-2" id="btn-editar-datos-laborales" value="<?php echo $_GET['doc']; ?>" data-bs-toggle="modal" data-bs-target="#modificar-datos-laborales">
                <i class="far fa-edit"></i> Editar datos laborales
            </button>
            <button class="opcion-editar btn btn-verde my-2" id="btn-editar-datos-familiares" value="<?php echo $_GET['doc']; ?>" data-bs-toggle="modal" data-bs-target="#modificar-datos-familiares">
                <i class="far fa-edit"></i> Editar datos familiares
            </button>
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
    </main>
    
    

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