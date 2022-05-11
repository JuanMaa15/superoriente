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


    if (isset($_SESSION['id_admin'])) {

        $tipoDotaciondao = new TipoDotacionDAO();
        $camisadao = new CamisaDAO();
        $pantalondao = new PantalonDAO();
        $zapatodao = new ZapatoDAO();
        $otraVestimentadao = new OtraVestimentaDAO();
        $usuariodao = new UsuarioDAO();
        $tipoCamisadao = new TipoCamisaDAO();
        $tipoPantalondao = new TipoPantalonDAO();
        $tipoZapatodao = new TipoZapatoDAO();

        $listaTiposDotaciones = $tipoDotaciondao->listaTiposDotaciones();
        $listaCamisas = $camisadao->listaCamisas();
        $listaPantalones = $pantalondao->listaPantalones();
        $listaZapatos = $zapatodao->listaZapatos();
        $listaVestimentas = $otraVestimentadao->listaVestimentas();
        $listaUsuarios = $usuariodao->listaUsuarios();
        $listaTiposCamisas = $tipoCamisadao->listaTiposCamisas();
        $listaTiposPantalones = $tipoPantalondao->listaTiposPantalones();
        $listaTiposZapatos = $tipoZapatodao->listaTiposZapatos();
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
                
                <div class="row">
                    <div class="col text-center">
                        <h2>Reportes de dotación por filtros</h2>
                    </div>
                </div>
                <!-- <div class="row justify-content-center mt-3">
                    <div class="col-10">
                        <div class="row justify-content-end">
                            <div class="col-4">
                                <select class="form-select" id="filtro-camisa">
                                    <option value="">Todas</option>
                                    <?php
                                       /* for ($i=0; $i < count($listaTiposDotaciones); $i++):
                                            ?>
                                                <option value="dotacion <?php echo $listaTiposDotaciones[$i]->getId_tipo_dotacion(); ?>">Dotacion <?php echo $listaTiposDotaciones[$i]->getNombre(); ?></option>
                                            <?php
                                        endfor;
                                    */ ?>
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
                </div> -->


                <div class="row my-3">
                    <div class="col">

                        <div class="row" id="cont-reporte-filtro">
                            
                            
                        </div>
                        <div class="row">
                            <div class="col-3 mb-5 mt-3 h-0 agregar-remover-filtro">
                                <button class="btn btn-verde" id="btn-agregar-filtro">Agregar filtro  +</button>
                                <button class="btn btn-verde mt-2 d-none " id="btn-remover-filtro">Remover filtro  -</button>
                            </div>
                        </div>
                        <div id='rta-filtros-empleado'></div>



                        <div id="cont-seleccionados" >
                                <div class='row my-2'>
                                    <div class='col texto-claro'>
                                        <h6 class='titulo-campos '>Selecciones:</h6>
                                        <div id='filtros-seleccionados'></div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col d-flex justify-content-center">
                                        <button class="btn btn-verde d-none" class="listado-reporte-dotacion" id="btn-generar-listado-reporte">Generar lista</button>
                                    </div>
                                </div>
                                <div class='row mt-4'>
                                    <div class='col'>
                                        <div id='listado-empleado-filtros'></div>
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