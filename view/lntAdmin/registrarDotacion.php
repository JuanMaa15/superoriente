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
                    <div class="col-4">
                        <div class="card text-center">
                            <div class="card-header">
                                <h4>Camisas</h4>
                            </div>
                            
                            <div class="card-body">
                                <div class="form-registro my-3">
                                    <form action="">
                                        
                                        <div class="my-3">

                                            <select class="form-select" id="tipo-camisa">
                                                
                                                <option value="" selected>Tipo de camisa</option>
                                                <?php
                                                    for ($i=0; $i < count($listaTiposCamisas); $i++) { 
                                                        ?>
                                                    <option value="<?php echo $listaTiposCamisas[$i]->getId_tipo_camisa(); ?>"><?php echo $listaTiposCamisas[$i]->getNombre(); ?></option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                            <small class="text-danger"></small>
                                        </div>
                                        <div class="my-3">
                                         <select class="form-select cbx-dotacion" id="tipo-dotacion-camisa">
                                             <option value="">Seleccionar un tipo de dotación</option>
                                            <?php
                                                for ($i=0; $i < count($listaTiposDotaciones); $i++) { 
                                                    ?>
                                                    <option value="<?php echo $listaTiposDotaciones[$i]->getId_tipo_dotacion(); ?>"><?php echo $listaTiposDotaciones[$i]->getNombre(); ?></option>
                                                    <?php
                                                }
                                            ?>
                                            </select>
                                            <small class="text-danger"></small>
                                        </div>
                                        <div class="my-3">
                                            <h6 class="text-center">Tallas</h6>
                                            <div class="row justify-content-center" id="cont-check-tallas-camisa" >
                                                <div class="col-3">
                                                    <div class="form-check text-start">
                                                        <input type="checkbox" class="form-check-input checkbox-camisa" id="flexCheckDefault" value="XS">
                                                        <label class="form-check-label" for="flexCheckDefault">XS</label>
                                                    </div>
                                                    <div class="form-check text-start">
                                                        <input type="checkbox" class="form-check-input checkbox-camisa" value="S">
                                                        <label class="form-check-label" for="">S</label>
                                                    </div>
                                                    <div class="form-check text-start">
                                                        <input type="checkbox" class="form-check-input checkbox-camisa" value="M">
                                                        <label class="form-check-label" for="">M</label>
                                                    </div>
                                                    <div class="form-check text-start">
                                                            <input type="checkbox" class="form-check-input checkbox-camisa" id="flexCheckDefault" value="L">
                                                            <label class="form-check-label" for="flexCheckDefault">L</label>
                                                        </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-check text-start">
                                                        <input type="checkbox" class="form-check-input checkbox-camisa" value="XL">
                                                        <label class="form-check-label" for="">XL</label>
                                                    </div>
                                                    <div class="form-check text-start">
                                                        <input type="checkbox" class="form-check-input checkbox-camisa" value="XXL">
                                                        <label class="form-check-label" for="">XXL</label>
                                                    </div>   
                                                    <div class="form-check text-start">
                                                        <input type="checkbox" class="form-check-input checkbox-camisa" id="flexCheckDefault" value="3XL">
                                                        <label class="form-check-label" for="flexCheckDefault">3XL</label>
                                                    </div>
                                                </div>
                                            </div>   
                                            <small class="text-danger"></small>
                                        </div>
                                        <div class="my-3">
                                            <input class="form-control" type="number" id="cantidad-camisa" placeholder="Cantidad">
                                            <small class="text-danger"></small>
                                        </div>
                                        <div class="my-3">

                                            <select class="form-select" id="genero-camisa">
                                                
                                                <option value="" selected>Género</option>
                                                <?php
                                                    for ($i=0; $i < count($listaGeneros); $i++) { 
                                                        ?>
                                                    <option value="<?php echo $listaGeneros[$i]->getId_genero(); ?>"><?php echo $listaGeneros[$i]->getNombre(); ?></option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                            <small class="text-danger"></small>
                                        </div>
                                        <div class="my-3">
                                            <select class="form-select" id="estado-camisa">
                                                <option value="">Seleccionar estado</option>
                                                <option value="1">Disponible</option>
                                                <option value="0">Agotada</option>
                                            </select>
                                            <small class="text-danger"></small>
                                        </div>
                                        
                                        <div class="col my-5">
                                            <button type="button" class="btn btn-mediano btn-verde" id="btn-registrar-camisa">Registrar</button>
                                        </div>
            
                                        <div id="rta-camisa" class="my-2">

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
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
                                    <input type="search"  class="form-control" id="buscador-camisa" placeholder="Buscar">
                                </form>
                            </div>
                        </div>
                        <div id="listado-camisas">
                        
                        </div>
                    </div>
                </div>
                            
                <div class="row my-3">
                    <div class="col-4">
                        <div class="card text-center">
                            <div class="card-header">
                                <h4>Pantalones</h4>
                            </div>
                            
                            <div class="card-body">
                                <div class="form-registro my-3">
                                    <form action="">
                                        
                                        <div class="my-3">
                                            <select class="form-select" id="tipo-pantalon">
                                                
                                                <option value="" selected>Tipo de pantalón</option>
                                                <?php
                                                    for ($i=0; $i < count($listaTiposPantalones); $i++) { 
                                                        ?>
                                                    <option value="<?php echo $listaTiposPantalones[$i]->getId_tipo_pantalon(); ?>"><?php echo $listaTiposPantalones[$i]->getNombre(); ?></option>
                                                        <?php
                                                    }
                                                ?> 
                                        </select>    
                                        
                                        <small class="text-danger"></small>

                                        </div>
                                        <div class="my-3">
                                            <select class="form-select" id="tipo-dotacion-pantalon">
                                             <option value="">Seleccionar un tipo de dotación</option>
                                            <?php
                                                for ($i=0; $i < count($listaTiposDotaciones); $i++) { 
                                                    ?>
                                                    <option value="<?php echo $listaTiposDotaciones[$i]->getId_tipo_dotacion(); ?>"><?php echo $listaTiposDotaciones[$i]->getNombre(); ?></option>
                                                    <?php
                                                }
                                            ?>
                                            </select>
                                            <small class="text-danger"></small>
                                        </div>
                                        <div class="my-3">

                                            <select class="form-select" id="genero-pantalon">
                                                
                                                <option value="" selected>Género</option>
                                                <?php
                                                    for ($i=0; $i < count($listaGeneros); $i++) { 
                                                        ?>
                                                    <option value="<?php echo $listaGeneros[$i]->getId_genero(); ?>"><?php echo $listaGeneros[$i]->getNombre(); ?></option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                            <small class="text-danger"></small>
                                        </div>
                                        <div class="my-3">
                                            <div class="my-3">
                                                <h6 class="text-center">Tallas</h6>
                                                <div id="cont-check-tallas-pantalon">
                                                    <div class="row justify-content-center d-none" id="cont-tallas-hombre">
                                                        <div class="col-4">
                                                            <?php 
                                                                for ($i=28; $i < 34; $i++) { 
                                                                    if ($i % 2 == 0) {
                                                                    ?>
                                                                    
                                                                        <div class="form-check text-start">
                                                                            <input type="checkbox" class="form-check-input checkbox-pantalon" id="flexCheckDefault" value="<?php echo $i ?>">
                                                                            <label class="form-check-label" for="flexCheckDefault"><?php echo $i ?></label>
                                                                        </div>
                                                                        
                                                                    <?php 
                                                                    }
                                                                }
                                                            ?>               
                                                        </div>
                                                        <div class="col-4">
                                                        <?php 
                                                            for ($i=34; $i < 40; $i++) { 
                                                                    if ($i % 2 == 0) {
                                                                    ?>
                                                                    
                                                                        <div class="form-check text-start">
                                                                            <input type="checkbox" class="form-check-input checkbox-pantalon" id="flexCheckDefault" value="<?php echo $i ?>">
                                                                            <label class="form-check-label" for="flexCheckDefault"><?php echo $i ?></label>
                                                                        </div>
                                                                    
                                                                    <?php 
                                                                    }
                                                                }
                                                            ?>
                                                        </div>  
                                                        <div class="col-4">
                                                        <?php 
                                                            for ($i=40; $i < 46; $i++) { 
                                                                    if ($i % 2 == 0) {
                                                                    ?>
                                                                        
                                                                            <div class="form-check text-start">
                                                                                <input type="checkbox" class="form-check-input checkbox-pantalon" id="flexCheckDefault" value="<?php echo $i ?>">
                                                                                <label class="form-check-label" for="flexCheckDefault"><?php echo $i ?></label>
                                                                            </div>
                                                                        
                                                                    <?php 
                                                                    }
                                                                }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="row justify-content-center d-none" id="cont-tallas-mujer">
                                                        <div class="col-4">
                                                            <?php 
                                                                for ($i=4; $i < 10; $i++) { 
                                                                    if ($i % 2 == 0) {
                                                                    ?>
                                                                    
                                                                        <div class="form-check text-start">
                                                                            <input type="checkbox" class="form-check-input checkbox-pantalon" id="flexCheckDefault" value="<?php echo $i ?>">
                                                                            <label class="form-check-label" for="flexCheckDefault"><?php echo $i ?></label>
                                                                        </div>
                                                                        
                                                                    <?php 
                                                                    }
                                                                }
                                                            ?>               
                                                        </div>
                                                        <div class="col-4">
                                                        <?php 
                                                            for ($i=10; $i < 16; $i++) { 
                                                                    if ($i % 2 == 0) {
                                                                    ?>
                                                                    
                                                                        <div class="form-check text-start">
                                                                            <input type="checkbox" class="form-check-input checkbox-pantalon" id="flexCheckDefault" value="<?php echo $i ?>">
                                                                            <label class="form-check-label" for="flexCheckDefault"><?php echo $i ?></label>
                                                                        </div>
                                                                    
                                                                    <?php 
                                                                    }
                                                                }
                                                            ?>
                                                        </div>  
                                                        <div class="col-4">
                                                        <?php 
                                                            for ($i=16; $i < 18; $i++) { 
                                                                    if ($i % 2 == 0) {
                                                                    ?>
                                                                        
                                                                            <div class="form-check text-start">
                                                                                <input type="checkbox" class="form-check-input checkbox-pantalon" id="flexCheckDefault" value="<?php echo $i ?>">
                                                                                <label class="form-check-label" for="flexCheckDefault"><?php echo $i ?></label>
                                                                            </div>
                                                                        
                                                                    <?php 
                                                                    }
                                                                }
                                                            ?>
                                                        </div>
                                                    </div>
                                                        
                                                </div>   
                                                <small class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="my-3">
                                            <input class="form-control" type="number" id="cantidad-pantalon" placeholder="Cantidad">
                                            <small class="text-danger"></small>
                                        </div>
                                        
                                        <div class="my-3">
                                            <select class="form-select" id="estado-pantalon">
                                                <option value="">Seleccionar estado</option>
                                                <option value="1">Disponible</option>
                                                <option value="0">Agotado</option>
                                            </select>
                                            <small class="text-danger"></small>
                                        </div>
                                        
                                        <div class="col my-5">
                                            <button type="button" class="btn btn-mediano btn-verde" id="btn-registrar-pantalon">Registrar</button>
                                        </div>
            
                                        <div id="rta-pantalon" class="my-2">

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
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
                                    <input type="search"  class="form-control" id="buscador-pantalon" placeholder="Buscar">
                                </form>
                            </div>
                        </div>
                        <div id="listado-pantalones">
                            
                        </div>
                    </div>
                </div>

                <div class="row my-3">
                    <div class="col-4">
                        <div class="card text-center">
                            <div class="card-header">
                                <h4>Zapatos</h4>
                            </div>
                            
                            <div class="card-body">
                                <div class="form-registro my-3">
                                    <form action="">
                                        
                                        <div class="my-3">
                                            <select class="form-select" id="tipo-zapato">
                                                    
                                                    <option value="" selected>Tipo de zapato</option>
                                                    <?php
                                                        for ($i=0; $i < count($listaTiposZapatos); $i++) { 
                                                            ?>
                                                        <option value="<?php echo $listaTiposZapatos[$i]->getId_tipo_zapato(); ?>"><?php echo $listaTiposZapatos[$i]->getNombre(); ?></option>
                                                            <?php
                                                        }
                                                    ?> 
                                                    <small class="text-danger"></small>
                                            </select>  
                                        </div>
                                        <div class="my-3">
                                            <select class="form-select" id="tipo-dotacion-zapato">
                                             <option value="">Seleccionar un tipo de dotación</option>
                                            <?php
                                                for ($i=0; $i < count($listaTiposDotaciones); $i++) { 
                                                    ?>
                                                    <option value="<?php echo $listaTiposDotaciones[$i]->getId_tipo_dotacion(); ?>"><?php echo $listaTiposDotaciones[$i]->getNombre(); ?></option>
                                                    <?php
                                                }
                                            ?>
                                            </select>
                                            <small class="text-danger"></small>
                                        </div>
                                        <div class="my-3">
                                        <h6 class="text-center">Tallas</h6>
                                            <div class="row justify-content-center" id="cont-check-tallas-zapato">
                                                <div class="col-4">
                                                    <?php 
                                                        for ($i=34; $i < 37; $i++) { 
                                                            
                                                             ?>
                                                              
                                                                <div class="form-check text-start">
                                                                    <input type="checkbox" class="form-check-input checkbox-zapato" id="flexCheckDefault" value="<?php echo $i ?>">
                                                                    <label class="form-check-label" for="flexCheckDefault"><?php echo $i ?></label>
                                                                </div>
                                                                
                                                            <?php 
                                                            
                                                        }
                                                    ?>               
                                                </div>
                                                <div class="col-4">
                                                <?php 
                                                    for ($i=37; $i < 40; $i++) { 
                                                           
                                                             ?>
                                                            
                                                                <div class="form-check text-start">
                                                                    <input type="checkbox" class="form-check-input checkbox-zapato" id="flexCheckDefault" value="<?php echo $i ?>">
                                                                    <label class="form-check-label" for="flexCheckDefault"><?php echo $i ?></label>
                                                                </div>
                                                             
                                                            <?php 
                                                            
                                                        }
                                                    ?>
                                                </div>  
                                                <div class="col-4">
                                                <?php 
                                                    for ($i=40; $i < 43; $i++) { 
                                                          
                                                             ?>
                                                                
                                                                    <div class="form-check text-start">
                                                                        <input type="checkbox" class="form-check-input checkbox-zapato" id="flexCheckDefault" value="<?php echo $i ?>">
                                                                        <label class="form-check-label" for="flexCheckDefault"><?php echo $i ?></label>
                                                                    </div>
                                                                
                                                            <?php 
                                                            
                                                        }
                                                    ?>
                                                </div>
                                                    
                                                
                                            </div>   
                                            <small class="text-danger"></small>
                                        </div>
                                        <div class="my-3">
                                            <input class="form-control" type="number" id="cantidad-zapato" placeholder="Cantidad">
                                            <small class="text-danger"></small>
                                        </div>
                                        <div class="my-3">
                                            <select class="form-select" id="estado-zapato">
                                                <option value="">Seleccionar estado</option>
                                                <option value="1">Disponible</option>
                                                <option value="0">Agotada</option>
                                            </select>
                                            <small class="text-danger"></small>
                                        </div>
                                        
                                        <div class="col my-5">
                                            <button type="button" class="btn btn-mediano btn-verde" id="btn-registrar-zapato">Registrar</button>
                                        </div>
            
                                        <div id="rta-zapato" class="my-2">

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
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
                                    <input type="search"  class="form-control" id="buscador-zapato" placeholder="Buscar">
                                </form>
                            </div>
                        </div>
                        <div id="listado-zapatos">
                            
                        </div>
                    </div>
                </div>

                <div class="row my-3">
                    <div class="col-4">
                        <div class="card text-center">
                            <div class="card-header">
                                <h4> Otros</h4>
                            </div>
                            
                            <div class="card-body">
                                <div class="form-registro my-3">
                                    <form action="">
                                        
                                        <div class="my-3">
                                            <input class="form-control" type="text" id="nombre-vestimenta" placeholder="Ropa de trabajo">
                                            <small class="text-danger"></small>
                                        </div>
                                        <div class="my-3">
                                        <select class="form-select" id="tipo-dotacion-vestimenta">
                                             <option value="">Seleccionar un tipo de dotación</option>
                                            <?php
                                                for ($i=0; $i < count($listaTiposDotaciones); $i++) { 
                                                    ?>
                                                    <option value="<?php echo $listaTiposDotaciones[$i]->getId_tipo_dotacion(); ?>"><?php echo $listaTiposDotaciones[$i]->getNombre(); ?></option>
                                                    <?php
                                                }
                                            ?>
                                            </select>
                                            <small class="text-danger"></small>
                                        </div> 
                                        <div class="my-3">
                                            <input class="form-control" type="number" id="cantidad-vestimenta" placeholder="Cantidad">
                                            <small class="text-danger"></small>
                                        </div>
                                        <div class="my-3">
                                            <select class="form-select" id="estado-vestimenta">
                                                <option value="">Seleccionar estado</option>
                                                <option value="1">Disponible</option>
                                                <option value="0">Agotada</option>
                                            </select>
                                            <small class="text-danger"></small>
                                        </div>
                                        
                                        <div class="col my-5">
                                            <button type="button" class="btn btn-mediano btn-verde" id="btn-registrar-otra-vestimenta">Registrar</button>
                                        </div>
            
                                        <div id="rta-otra-vestimenta" class="my-2">

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
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
                                    <input type="search"  class="form-control" id="buscador-vestimenta" placeholder="Buscar">
                                </form>
                            </div>
                        </div>
                        <div id="listado-vestimentas">
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12 mb-3">
                        <h3 class="text-center">Gestión de los tipos de ropa</h3>
                    </div>
                    <div class="col">
                        <div class="card text-center">
                            <div class="card-header">
                                <h4>Tipo de camisa</h4>
                            </div>
                            
                            <div class="card-body">
                                <div class="form-registro my-3">
                                    <form action="">
                                        <div class="my-2">
                                            <input type="text" class="form-control" id="nombre-tipo-camisa" placeholder="Tipo de camisa">
                                            <small class="text-center text-danger"></small>
                                        </div>
                                        <div class="my-5">
                                            <button type="button" class="btn btn-mediano btn-verde" id="btn-registrar-tipo-camisa">Registrar</button>
                                        </div>
            
                                        <div id="rta-tipo-camisa" class="my-2">

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="listado-tipos-camisas">
                            
                        </div>
                    </div>

                    <div class="col">
                        <div class="card text-center">
                            <div class="card-header">
                                <h4>Tipo de pantalón</h4>
                            </div>
                            
                            <div class="card-body">
                                <div class="form-registro my-3">
                                    <form action="">
                                        <div class="my-2">
                                            <input type="text" class="form-control" id="nombre-tipo-pantalon" placeholder="Tipo de pantalón">
                                            <small class="text-danger"></small>
                                        </div>
                                        <div class="my-5">
                                            <button type="button" class="btn btn-mediano btn-verde" id="btn-registrar-tipo-pantalon">Registrar</button>
                                        </div>
            
                                        <div id="rta-tipo-pantalon" class="my-2">

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="listado-tipos-pantalones">
                            
                        </div>
                    </div>

                    <div class="col">
                        <div class="card text-center">
                            <div class="card-header">
                                <h4>Tipo de zapato</h4>
                            </div>
                            
                            <div class="card-body">
                                <div class="form-registro my-3">
                                    <form action="">
                                        <div class="my-2">
                                            <input type="text" class="form-control" id="nombre-tipo-zapato" placeholder="Tipo de zapato">
                                            <small class="text-center text-danger"></small>
                                        </div>
                                        <div class="my-5">
                                            <button type="button" class="btn btn-mediano btn-verde" id="btn-registrar-tipo-zapato">Registrar</button>
                                        </div>
            
                                        <div id="rta-tipo-zapato" class="my-2">

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="listado-tipos-zapatos">
                            
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

    <div class="modal fade" id="editar-tipos-zapatos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar tipos de zapatos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="editar-tipo-zapato"></div>
                    <div id="rta-tipo-zapato-act" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id='btn-actualizar-tipo-zapato'>Actualizar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editar-tipos-pantalones" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar tipos de pantalones</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="editar-tipo-pantalon"></div>
                    <div id="rta-tipo-pantalon-act" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id='btn-actualizar-tipo-pantalon'>Actualizar</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="editar-tipos-camisas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar tipos de camisas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="editar-tipo-camisa"></div>
                    <div id="rta-tipo-camisa-act" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id='btn-actualizar-tipo-camisa'>Actualizar</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="editar-vestimentas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar vestimenta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="editar-vestimenta"></div>
                    <div id="rta-vestimenta-act" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id='btn-actualizar-vestimenta'>Actualizar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editar-zapatos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar zapato</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="editar-zapato"></div>
                    <div id="rta-zapato-act" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id='btn-actualizar-zapato'>Actualizar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editar-pantalones" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar pantalón</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="editar-pantalon"></div>
                    <div id="rta-pantalon-act" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id='btn-actualizar-pantalon'>Actualizar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editar-camisas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar camisa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="editar-camisa"></div>
                    <div id="rta-camisa-act" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id='btn-actualizar-camisa'>Actualizar</button>
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