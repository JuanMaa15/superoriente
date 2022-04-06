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
        <div class="container mt-4 mb-5">
            <div class="row">
                <div class="col my-2">
                    <a href="personal.php" class="texto-verde-oscuro fs-5"> << Volver al directorio</a>
                </div>
            </div>
            <div class="row justify-content-center py-3 border position-relative bg-light" id="cont-foto-perfil-nombre">
                <div class="col-6 d-flex flex-column justify-content-center align-items-center">
                    <div class="cont-foto-empleado my-3">
                        <img src="../img/logo.png">
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
                                    <h4 class="fs-6 titulo-campos"> Género</h4>
                                    <p class="my-1"><?php echo $listaUsuario->getGenero(); ?></p>
                                </div>
                            </div>
                            <div class="row">
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
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> Area académica</h4>
                                    <p class="my-1"><?php echo $listaUsuario->getArea_academica(); ?></p>
                                </div>
                            </div>
                            <div class="row">
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
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> Tipo de sangre y RH</h4>
                                    <p class="my-1"><?php echo $listaUsuario->getTipo_sangre(); ?></p>
                                </div>
                            </div>
                            <div class="row">
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
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> ¿Practica deporte? ¿Cual?</h4>
                                    <p class="my-1"><?php echo $listaUsuario->getPractica_deporte(); ?></p>
                                </div>
                            </div>

                            <div class="row">
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
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> Correo Eletrónico</h4>
                                    <p class="my-1"><?php echo $listaUsuario->getCorreo(); ?></p>
                                </div>
                            </div>

                            <div class="row">
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
                                <div class="col-3 my-2">
                                    <h4 class="fs-6 titulo-campos"> Teléfono Móvil (Persona de emergencia)</h4>
                                    <p class="my-1"><?php echo $listaUsuario->getCelular_emergencia(); ?></p>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                
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
                                <h4 class="fs-6 titulo-campos"> Motivo del retiro</h4>
                                <p class="my-1"><?php echo $listaUsuario->getMotivo_retiro(); ?></p>
                            </div>
                            <div class="col-3 my-2">
                                <h4 class="fs-6 titulo-campos"> Salario</h4>
                                <p class="my-1"><?php echo $listaUsuario->getSalario(); ?></p>
                            </div>
                            <div class="col-3 my-2">
                                <h4 class="fs-6 titulo-campos"> Valor del día</h4>
                                <p class="my-1"><?php echo $listaUsuario->getValor_dia(); ?></p>
                            </div>
                            <div class="col-3 my-2">
                                <h4 class="fs-6 titulo-campos"> Valor de la hora</h4>
                                <p class="my-1"><?php echo $listaUsuario->getValor_hora(); ?></p>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-3 my-2">
                                <h4 class="fs-6 titulo-campos"> Clase de riesgo</h4>
                                <p class="my-1"><?php echo $listaUsuario->getClase_riesgo(); ?></p>
                            </div>
                            <div class="col-3 my-2">
                                <h4 class="fs-6 titulo-campos"> Porcentaje de riesgo</h4>
                                <p class="my-1"><?php echo $listaUsuario->getPorcentaje_riesgo(); ?></p>
                            </div>
                            <div class="col-3 my-2">
                                <h4 class="fs-6 titulo-campos"> Sección</h4>
                                <p class="my-1"><?php echo $listaUsuario->getSeccion(); ?></p>
                            </div>
                            <div class="col-3 my-2">
                                <h4 class="fs-6 titulo-campos"> Area</h4>
                                <p class="my-1"><?php echo $listaUsuario->getArea(); ?></p>
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
            </div>

            <div id="cont-familiares" class="my-4 d-none cont-gestion-empleado">
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
                                        <?php
                                    }
                                
                                ?>
                            </tbody>
                            
                          </table>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-3">
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
                                    <div class="col my-3">
                                        <button type="button" class="btn w-100 btn-verde" id="btn-registrar-familiar">Registrar</button>
                                    </div>
       
                                    <div id="rta-familiar" class="my-2">

                                    </div>
                                </form>
                            </div>
                        </div>
                    
                    </div>
                    <div class="col-9">
                        <table class="table table-striped">
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Fecha de nacimiento</th>
                                <th>Edad</th>
                                
                            </tr>
                            <tr>
                                <td>Carlos</td>
                                <td>Henao</td>
                                <td>1975-01-23</td>
                                <td>45</td>
                            </tr>
                          </table>
                    </div>
                </div>
            </div>
        </div>
        

        </div>
       
          
    </main>
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