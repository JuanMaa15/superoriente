<?php
    session_start();

    require_once ('../../models/DAO/TipoDotacionDAO.php');
    require_once ('../../models/DAO/PantalonDAO.php');
    require_once ('../../models/DAO/ZapatoDAO.php');
    require_once ('../../models/DAO/OtraVestimentaDAO.php');
    require_once ('../../models/DAO/CamisaDAO.php');
    require_once ('../../models/DAO/PantalonDAO.php');
    require_once ('../../models/DAO/ZapatoDAO.php');
    require_once ('../../models/DAO/OtraVestimentaDAO.php');
    require_once ('../../models/DAO/TipoContratoDAO.php');
    require_once ('../../models/DAO/CasaDAO.php');
    require_once('../../models/DAO/SeccionDAO.php');
    require_once('../../models/DAO/AreaDAO.php');
    require_once('../../models/DAO/CargoDAO.php');
    require_once('../../models/DAO/UsuarioDAO.php');
    require_once('../../models/DAO/TipoCamisaDAO.php');
    require_once('../../models/DAO/TipoPantalonDAO.php');
    require_once('../../models/DAO/TipoZapatoDAO.php');
    require_once('../../models/DAO/GeneroDAO.php');


    if (isset($_SESSION['id_admin'])) {

        // --- Instacia de los objetos ----


        $tipoDotaciondao = new TipoDotacionDAO();
        $camisadao = new CamisaDAO();
        $pantalondao = new PantalonDAO();
        $zapatodao = new ZapatoDAO();
        $otraVestimentadao = new OtraVestimentaDAO();
        $usuariodao = new UsuarioDAO();
        $tipoCamisadao = new TipoCamisaDAO();
        $tipoPantalondao = new TipoPantalonDAO();
        $tipoZapatodao = new TipoZapatoDAO();
        $generodao = new GeneroDAO();

       /*  $estadodao = new EstadoDAO();
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
        $listaCargos = $cargodao->listaCargos(); */

        $listaTiposDotaciones = $tipoDotaciondao->listaTiposDotaciones();
        $listaCamisas = $camisadao->listaCamisas();
        $listaPantalones = $pantalondao->listaPantalones();
        $listaZapatos = $zapatodao->listaZapatos();
        $listaVestimentas = $otraVestimentadao->listaVestimentas();
        $listaUsuarios = $usuariodao->listaUsuarios();
        $listaTiposCamisas = $tipoCamisadao->listaTiposCamisas();
        $listaTiposPantalones = $tipoPantalondao->listaTiposPantalones();
        $listaTiposZapatos = $tipoZapatodao->listaTiposZapatos();
        $listaGeneros = $generodao->listaGeneros();
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
        <div class="py-3">
            <?php include_once("menu2.php"); ?>
         </div>
        <div class="row justify-content-center">
            <?php include_once("menu.php"); ?>
            <div class="col-10 mt-4 ps-0 py-5 position-relative" id="cuerpo-pagina">
                <div class="row align-items-center">
                    <div class="col">
                        <h2>Gestionar dotación</h2>
                    </div>
                    <div class="col-2 d-flex justify-content-end d-none">
                        <button class="btn btn-verde">Reporte dotación</button>
                    </div>
                    <div class="col-3">
                        <div class="accordion accordion-flush" id="cont-acordion-listado">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#listado-asignaciones" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Lista de asignaciones
                                </button>
                                </h2>
                                
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
                <div class="row mt-5 justify-content-center" id="cuerpo-acordion-listado">
                    <div class="col-11">
                        <div class="accordion-item">
                            <div id="listado-asignaciones" class="accordion-collapse collapse" aria-labelledby="#listado-asignaciones" data-bs-parent="#cont-acordion-listado">
                                <div class="accordion-body">
                                    <div class="row justify-content-end">
                                        <div class="col-4">
                                            <form>
                                                <input type="text" class="form-control" placeholder="Buscar empleado" id="buscador-empleado-dotacion">
                                            </form>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col" id="cont-listado-asignaciones">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th scope="col">Doc</th>
                                                        <th scope="col">Nombre</th>
                                                        <th scope="col">Apellido</th>
                                                        <th scope="col">Tipo de dotación</th>
                                                        <th scope="col">Camisa</th>
                                                        <th scope="col">Pantalón</th>
                                                        <th scope="col">Zapatos</th>
                                                        <th scope="col">Vestimenta</th>
                                                        <th scope="col" class="text-center" colspan="2">Opciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        
                                                        $validar_existencias = false;
                                                        for ($i=0; $i < count($listaUsuarios); $i++):
                                                            if ($listaUsuarios[$i]->getCamisa() != null || $listaUsuarios[$i]->getPantalon() != null
                                                            || $listaUsuarios[$i]->getZapato() != null || $listaUsuarios[$i]->getVestimenta() != null) :
                                                                
                                                            $camisa = "";
                                                            $pantalon = "";
                                                            $zapatos = "";
                                                            $vestimenta = "";

                                                                for ($j=0; $j < count($listaCamisas); $j++) { 
                                                                    if ($listaUsuarios[$i]->getCamisa() == $listaCamisas[$j]->getId_camisa()) {
                                                                        $camisa = $listaCamisas[$j]->getNombre();
                                                                    }
                                                                }

                                                                for ($j=0; $j < count($listaPantalones); $j++) { 
                                                                    if ($listaUsuarios[$i]->getPantalon() == $listaPantalones[$j]->getId_pantalon()) {
                                                                        $pantalon = $listaPantalones[$j]->getNombre();
                                                                    }
                                                                }

                                                                for ($j=0; $j < count($listaZapatos); $j++) { 
                                                                    if ($listaUsuarios[$i]->getZapato() == $listaZapatos[$j]->getId_zapato()) {
                                                                        $zapatos = $listaZapatos[$j]->getNombre();
                                                                    }
                                                                }

                                                                for ($j=0; $j < count($listaVestimentas); $j++) { 
                                                                    if ($listaUsuarios[$i]->getVestimenta() == $listaVestimentas[$j]->getId_vestimenta()) {
                                                                        $vestimenta = $listaVestimentas[$j]->getNombre();
                                                                    }
                                                                }
                                                                
                                                                

                                                                ?> 
                                                                    <tr class="text-center">
                                                                        <td><?php echo $listaUsuarios[$i]->getId_usuario(); ?></td>
                                                                        <td><?php echo $listaUsuarios[$i]->getNombre(); ?></td>
                                                                        <td><?php echo $listaUsuarios[$i]->getApellido(); ?></td>
                                                                        <td><?php echo $listaUsuarios[$i]->getTipo_dotacion(); ?></td>
                                                                        <td><?php echo $camisa ?></td>
                                                                        <td><?php echo $pantalon; ?></td>
                                                                        <td><?php echo $zapatos; ?></td>
                                                                        <td><?php echo $vestimenta; ?></td>
                                                                        <td><a href="informacionEmpleado.php?doc=<?php echo $listaUsuarios[$i]->getId_usuario(); ?>" class="btn btn-verde">Gestionar</a></td>
                                                                        <td><button value="<?php echo $listaUsuarios[$i]->getId_usuario(); ?>" class="btn btn-danger btn-ventana-eliminar-dotacion" data-bs-toggle="modal" data-bs-target="#eliminar-toda-dotacion">Eliminar</button></td>
                                                                    </tr>
                                                                <?php       
                                                                
                                                                $validar_existencias = true;
                                                            endif;
                                                        endfor;

                                                        if(!$validar_existencias) {
                                                            ?>
                                                            <tr>
                                                                <td colspan='9' class='text-center py-4'>Aún no hay empleados con ropa de trabajo</td>
                                                            </tr>

                                                        <?php
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="row  bg-light mt-5 mb-3">
                    <div class="col-3">
                        <div class="cont-info-rapida p-5" id="acordion-cant-camisas">
                            <div class="row">
                                <div class="col">
                                    <h3><?php
                                        $cant_total_camisas = 0;
                                        for ($i=0; $i < count($listaCamisas); $i++) :
                                            $cant_total_camisas += $listaCamisas[$i]->getCantidad(); 
                                        endfor;
                                    echo $cant_total_camisas; ?></h3>
                                    <span class="fs-6">Camisas</span>
                                </div>
                                <div class="col d-flex justify-content-center align-items-center">
                                    <i class="fa-solid fa-shirt"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="cont-info-rapida p-5 " id="acordion-cant-pantalones">
                                <div class="row">
                                    <div class="col">
                                    <h3><?php
                                        $cant_total_pantalones = 0;
                                        for ($i=0; $i < count($listaPantalones); $i++) :
                                            $cant_total_pantalones += $listaPantalones[$i]->getCantidad(); 
                                        endfor;
                                    echo $cant_total_pantalones; ?></h3>
                                        <span class="fs-6">Pantalones</span>
                                    </div>
                                    <div class="col d-flex justify-content-center align-items-center">
                                        <i class="fa-solid fa-table-columns"></i>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="cont-info-rapida p-5" id="acordion-cant-zapatos">
                            <div class="row">
                                <div class="col">
                                <h3><?php
                                        $cant_total_zapatos = 0;
                                        for ($i=0; $i < count($listaZapatos); $i++) :
                                            $cant_total_zapatos += $listaZapatos[$i]->getCantidad(); 
                                        endfor;
                                    echo $cant_total_zapatos; ?></h3>
                                    <span class="fs-6">Zapatos</span>
                                </div>
                                <div class="col d-flex justify-content-center align-items-center">
                                    <i class="fa-solid fa-shoe-prints"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="cont-info-rapida p-5" id="acordion-cant-vestimentas">
                            <div class="row">
                                <div class="col">
                                    <h3><?php
                                        $cant_total_otros = 0;
                                        for ($i=0; $i < count($listaVestimentas); $i++) :
                                            $cant_total_otros += $listaVestimentas[$i]->getCantidad(); 
                                        endfor;
                                    echo $cant_total_otros; ?></h3>
                                    <span class="fs-6">Otros</span>
                                </div>
                                <div class="col d-flex justify-content-center align-items-center">
                                    <i class="fa-solid fa-person-booth"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="row mb-5">
                    <div class="col-12 cont-acordion" id="cont-acordion-camisa">
                        <div class="border bg-light py-2 px-3">
                            <h4 class="fs-4">Camisas</h4>
                            <div class="row">
                                <?php 
                           
                                    for ($i=0; $i < count($listaTiposDotaciones); $i++):
                                        $cant_camisas = 0;
                                        for ($j=0; $j < count($listaCamisas); $j++):
                                            if ($listaTiposDotaciones[$i]->getNombre() == $listaCamisas[$j]->getTipo_dotacion()):
                                                    $cant_camisas += $listaCamisas[$j]->getCantidad();
                                            endif;

                                            
                                        endfor;
                                        ?>
                                            <div class="col-3">
                                                <p class="fs-6 titulo-campos"><?php echo $listaTiposDotaciones[$i]->getNombre() . ": " . $cant_camisas; ?></p>
                                                <div class="mt-2">
                                                    <?php
                                                    for ($j=0; $j < count($listaTiposCamisas); $j++):
                                                        $cant_tipo_camisas = 0;
                                                        for ($k=0; $k < count($listaCamisas); $k++) : 
                                                            if ($listaCamisas[$k]->getNombre() == $listaTiposCamisas[$j]->getNombre() && $listaCamisas[$k]->getTipo_dotacion() == $listaTiposDotaciones[$i]->getNombre()):
                                                                $cant_tipo_camisas += $listaCamisas[$k]->getCantidad();
                                                            endif;
                                                        endfor;

                                                        if ($cant_tipo_camisas > 0):
                                                        ?>
                                                            
                                                            <p class="fs-6"><?php echo $listaTiposCamisas[$j]->getNombre() . ": " . $cant_tipo_camisas; ?></p>

                                                        <?php
                                                        endif;
                                                    endfor;
                                                       
                                                    ?>
                                                </div>
                                            </div>
                                        <?php
                                    endfor;
                                ?>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-12 cont-acordion" id="cont-acordion-pantalon">
                        <div class="border bg-light py-2 px-3">
                            <h4 class="fs-4">Pantalones</h4>
                            <div class="row">
                                <?php 
                        
                                    for ($i=0; $i < count($listaTiposDotaciones); $i++):
                                        $cant_pantalones = 0;
                                        for ($j=0; $j < count($listaPantalones); $j++):
                                            if ($listaTiposDotaciones[$i]->getNombre() == $listaPantalones[$j]->getTipo_dotacion()):
                                                    $cant_pantalones += $listaPantalones[$j]->getCantidad();
                                            endif;
                                        endfor;
                                        ?>
                                            <div class="col-3">
                                                <p class="fs-6 titulo-campos"><?php echo $listaTiposDotaciones[$i]->getNombre() . ": " . $cant_pantalones; ?></p>
                                                <div class="mt-2">
                                                    <?php
                                                    for ($j=0; $j < count($listaTiposPantalones); $j++):
                                                        $cant_tipo_pantalones = 0;
                                                        for ($k=0; $k < count($listaPantalones); $k++) : 
                                                            if ($listaPantalones[$k]->getNombre() == $listaTiposPantalones[$j]->getNombre() && $listaPantalones[$k]->getTipo_dotacion() == $listaTiposDotaciones[$i]->getNombre()):
                                                                $cant_tipo_pantalones += $listaPantalones[$k]->getCantidad();
                                                            endif;
                                                        endfor;

                                                        if ($cant_tipo_pantalones > 0) :
                                                        ?>
                                                            <p class="fs-6"><?php echo $listaTiposPantalones[$j]->getNombre() . ": " . $cant_tipo_pantalones; ?></p>

                                                        <?php
                                                        endif;
                                                    endfor;
                                                       
                                                    ?>
                                                </div>
                                            </div>
                                        <?php
                                    endfor;
                                ?>
                                    
                             </div>
                        </div>
                    </div>
                    <div class="col-12 cont-acordion" id="cont-acordion-zapato">
                        <div class="border bg-light py-2 px-3">
                            <h4 class="fs-4">Zapatos</h4>
                            <div class="row">
                                <?php 
                        
                                    for ($i=0; $i < count($listaTiposDotaciones); $i++):
                                        $cant_zapatos = 0;
                                        for ($j=0; $j < count($listaZapatos); $j++):
                                            if ($listaTiposDotaciones[$i]->getNombre() == $listaZapatos[$j]->getTipo_dotacion()):
                                                    $cant_zapatos += $listaZapatos[$j]->getCantidad();
                                            endif;
                                        endfor;
                                        ?>
                                            <div class="col-3">
                                                <p class="fs-6 titulo-campos"><?php echo $listaTiposDotaciones[$i]->getNombre() . ": " . $cant_zapatos; ?></p>
                                                <div class="mt-2">
                                                    <?php
                                                    for ($j=0; $j < count($listaTiposZapatos); $j++):
                                                        $cant_tipo_zapatos = 0;
                                                        for ($k=0; $k < count($listaZapatos); $k++) : 
                                                            if ($listaZapatos[$k]->getNombre() == $listaTiposZapatos[$j]->getNombre() && $listaZapatos[$k]->getTipo_dotacion() == $listaTiposDotaciones[$i]->getNombre()):
                                                                $cant_tipo_zapatos += $listaZapatos[$k]->getCantidad();
                                                            endif;
                                                        endfor;
                                                        if ($cant_tipo_zapatos > 0) :
                                                        ?>
                                                            <p class="fs-6"><?php echo $listaTiposZapatos[$j]->getNombre() . ": " . $cant_tipo_zapatos; ?></p>

                                                        <?php
                                                        endif;
                                                    endfor;
                                                       
                                                    ?>
                                                </div>
                                            </div>
                                        <?php
                                    endfor;
                                ?>
                                    
                             </div>
                        </div>
                    </div>
                    <div class="col-12 cont-acordion" id="cont-acordion-vestimenta">
                        <div class="border bg-light py-2 px-3">
                            <h4 class="fs-4">Otros</h4>
                            <div class="row">
                                <?php 
                        
                                    for ($i=0; $i < count($listaTiposDotaciones); $i++):
                                        $cant_vestimentas = 0;
                                        for ($j=0; $j < count($listaVestimentas); $j++):
                                            if ($listaTiposDotaciones[$i]->getNombre() == $listaVestimentas[$j]->getTipo_dotacion()):
                                                    $cant_vestimentas += $listaVestimentas[$j]->getCantidad();
                                            endif;
                                        endfor;
                                        ?>
                                            <div class="col-3">
                                                <p class="fs-6 titulo-campos"><?php echo $listaTiposDotaciones[$i]->getNombre() . ": " . $cant_vestimentas; ?></p>
                                                
                                            </div>
                                        <?php
                                    endfor;
                                ?>
                                    
                             </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 d-flex justify-content-between mb-2">
                        <h3>Camisas</h3>
                        
                    </div>
                    <div class="col-12">
                        <div class="row justify-content-end">
                            <div class="col-4">
                                <select class="form-select" id="filtro-camisa">
                                    <option value="">Todas</option>
                                    <?php
                                        for ($i=0; $i < count($listaTiposDotaciones); $i++):
                                            ?>
                                                <option value="dotacion <?php echo $listaTiposDotaciones[$i]->getId_tipo_dotacion(); ?>">Dotacion <?php echo $listaTiposDotaciones[$i]->getNombre(); ?></option>
                                            <?php
                                        endfor;
                                    ?>
                                    <option value="estado 1">Estado Disponible</option>
                                    <option value="estado 0">Estado Agotado</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <form>
                                    <input type="search"  class="form-control buscador-camisa-asignar" id="buscador-camisa" placeholder="Buscar">
                                </form>
                            </div>
                        </div>
                        <div id="listado-camisas-asignar">
                        
                        </div>
                    </div>
                </div>
                            
                <div class="row my-3">
                    <div class="col-12">
                        <h3>Pantalones</h3>
                    </div>
                    <div class="col-12">
                        <div class="row justify-content-end">
                            <div class="col-4">
                                 <select class="form-select" id="filtro-pantalon">
                                    <option value="">Todas</option>
                                    <?php
                                        for ($i=0; $i < count($listaTiposDotaciones); $i++):
                                            ?>
                                                <option value="dotacion <?php echo $listaTiposDotaciones[$i]->getId_tipo_dotacion(); ?>">Dotacion <?php echo $listaTiposDotaciones[$i]->getNombre(); ?></option>
                                            <?php
                                        endfor;
                                    ?>
                                    <option value="estado 1">Estado Disponible</option>
                                    <option value="estado 0">Estado Agotado</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <form>
                                    <input type="search"  class="form-control buscador-pantalon-asignar" id="buscador-pantalon" placeholder="Buscar">
                                </form>
                            </div>
                        </div>
                        <div id="listado-pantalones-asignar">
                            
                        </div>
                    </div>
                </div>

                <div class="row my-3">
                    <div class="col-12">
                        <h3>Zapatos</h3>
                    </div>
                    <div class="col-12">
                         <div class="row justify-content-end">
                            <div class="col-4">
                                 <select class="form-select" id="filtro-zapato">
                                    <option value="">Todos</option>
                                    <?php
                                        for ($i=0; $i < count($listaTiposDotaciones); $i++):
                                            ?>
                                                <option value="dotacion <?php echo $listaTiposDotaciones[$i]->getId_tipo_dotacion(); ?>">Dotacion <?php echo $listaTiposDotaciones[$i]->getNombre(); ?></option>
                                            <?php
                                        endfor;
                                    ?>
                                    <option value="estado 1">Estado Disponible</option>
                                    <option value="estado 0">Estado Agotado</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <form>
                                    <input type="search"  class="form-control buscador-zapato-asignar" id="buscador-zapato" placeholder="Buscar">
                                </form>
                            </div>
                        </div>
                        <div id="listado-zapatos-asignar">
                            
                        </div>
                    </div>
                </div>

                <div class="row my-3">
                    <div class="col-12">
                        <h3>Otros</h3>
                    </div>
                    <div class="col-12">
                        <div class="row justify-content-end">
                            <div class="col-4">
                                 <select class="form-select" id="filtro-vestimenta">
                                    <option value="">Todos</option>
                                    <?php
                                        for ($i=0; $i < count($listaTiposDotaciones); $i++):
                                            ?>
                                                <option value="dotacion <?php echo $listaTiposDotaciones[$i]->getId_tipo_dotacion(); ?>">Dotacion <?php echo $listaTiposDotaciones[$i]->getNombre(); ?></option>
                                            <?php
                                        endfor;
                                    ?>
                                    <option value="estado 1">Estado Disponible</option>
                                    <option value="estado 0">Estado Agotado</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <form>
                                    <input type="search"  class="form-control buscador-vestimenta-asignar" id="buscador-vestimenta" placeholder="Buscar">
                                </form>
                            </div>
                        </div>
                        <div id="listado-vestimentas-asignar">
                        </div>
                    </div>
                </div>
               
                        
                 </div>

                </div>
                
            </div>
           

        </div>
        
    </div>

    <div class="modal fade" id="asignar-vestimentas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog long-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Asignar Otra Vestimenta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="">Empleados</h3>
                        </div>
                        <div class="col-4">
                            <form>
                                <input type="search" class="form-control" id="buscador-empleado-vestimenta" placeholder="Buscar">
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" id="rta-asignar-vestimenta">

                        </div>
                    </div>
                    
                    <div id="datos-vestimenta-empleado">

                    </div>
                    <div class="text-danger">
                                    
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btn-asignar-vestimenta-empleado">Asignar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="asignar-zapatos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog long-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Asignar Zapato</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="">Empleados</h3>
                        </div>
                        <div class="col-4">
                            <form>
                                <input type="search" class="form-control" id="buscador-empleado-zapato" placeholder="Buscar">
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" id="rta-asignar-zapato">

                        </div>
                    </div>
                    
                    <div id="datos-zapato-empleado">

                    </div>
                    <div class="text-danger">
                                    
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btn-asignar-zapato-empleado">Asignar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="asignar-pantalones" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog long-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Asignar Pantalón</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="">Empleados</h3>
                        </div>
                        <div class="col-4">
                            <form>
                                <input type="search" class="form-control" id="buscador-empleado-pantalon" placeholder="Buscar">
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" id="rta-asignar-pantalon">

                        </div>
                    </div>
                    
                    <div id="datos-pantalon-empleado">

                    </div>
                    <div class="text-danger">
                                    
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btn-asignar-pantalon-empleado">Asignar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="asignar-camisas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog long-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Asignar Camisa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="">Empleados</h3>
                        </div>
                        <div class="col-4">
                            <form>
                                <input type="search" class="form-control" id="buscador-empleado-camisa" placeholder="Buscar">
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" id="rta-asignar-camisa">

                        </div>
                    </div>
                    
                    <div id="datos-camisa-empleado">

                    </div>
                    <div class="text-danger">
                                    
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btn-asignar-camisa-empleado">Asignar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-delete fade" id="eliminar-toda-dotacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar dotacion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>¿Esta seguro de eliminar toda la dotación al empleado?</div>
                    <div class="mt-3" id="btns-modal-eliminar">
                        <button type="button" class="btn btn-verde" data-bs-dismiss="modal">No</button>
                        <button type="button" class="btn btn-danger" id="btn-eliminar-dotaciones-empleado">Si</button>
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