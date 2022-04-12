<?php
 
require_once('../../models/DAO/UsuarioDAO.php');
require_once('../../models/DAO/CamisaDAO.php');
require_once('../../models/DAO/PantalonDAO.php');
require_once('../../models/DAO/ZapatoDAO.php');
require_once('../../models/DAO/OtraVestimentaDAO.php');

if (isset($_POST['opc'])) {

    
    $opc = $_POST['opc'];

    switch($opc) {
        case "camisa":

            if (isset($_POST['id_usuario']) && isset($_POST['id_camisa']) && isset($_POST['id_camisa_vieja'])) {

                $id_usuario = $_POST['id_usuario'];
                $id_camisa = $_POST['id_camisa'];
                $cant_camisas = intval($_POST['cant_camisas']);
                $cant_camisas_vieja = intval($_POST['cant_camisas_vieja']) + 1;
                

                if (preg_match('/[0-9]+/', $id_usuario)) {
                    if (preg_match('/[0-9]+/', $id_camisa)) {

                        $id_camisa_vieja = intval($_POST['id_camisa_vieja']);
                        $camisadto = new CamisaDTO();

                        $camisadto->setId_camisa($id_camisa_vieja);
                        $camisadto->setCantidad($cant_camisas_vieja);

                        $camisadao = new CamisaDAO();

                        $resultado1 = $camisadao->actualizarCantidadCamisa($camisadto);


            
                        $id_camisa = intval($id_camisa);
                        $usuariodto = new UsuarioDTO();

                        $usuariodto->setId_usuario($id_usuario);
                        $usuariodto->setCamisa($id_camisa);
                        
                        $camisadto->setId_camisa($id_camisa);
                        $camisadto->setCantidad($cant_camisas);
                        
                        $usuariodao = new UsuarioDAO();
                        $camisadao = new CamisaDAO();
                        
                        $resultado2 = $usuariodao->asignarCamisa($usuariodto);
                        $resultado3 = $camisadao->actualizarCantidadCamisa($camisadto); 

                        if ($resultado1 && $resultado2 && $resultado3) {
                            echo "<div class='alert alert-success' role='alert'>¡La camisa se actualizó correctamente!</div>";
                        
                        }else{
                            echo "<div class='alert alert-danger' role='alert'>Error! No se pudo actualizar la camisa</div>";
                        }
                        
                    }else{
                        echo "<div class='alert alert-danger' role='alert'>Error, datos no validos</div>";
                    }
                }else{
                    echo "<div class='alert alert-danger' role='alert'>Error, datos no validos</div>";
                }
                
            }else{
                echo "Error" . $_POST['id_usuario'], $_POST['id_camisa'], $_POST['id_camisa_vieja'], $_POST['cant_camisas_vieja'];
            }
        break;
        case "pantalon":
            if (isset($_POST['id_usuario']) && isset($_POST['id_pantalon']) && isset($_POST['id_pantalon_viejo'])) {

                $id_usuario = $_POST['id_usuario'];
                $id_pantalon = $_POST['id_pantalon'];
                $cant_pantalones = intval($_POST['cant_pantalones']);
                $cant_pantalones_viejo = intval($_POST['cant_pantalones_viejo']) + 1;
                

                if (preg_match('/[0-9]+/', $id_usuario)) {
                    if (preg_match('/[0-9]+/', $id_pantalon)) {
            
                        $id_pantalon_viejo = intval($_POST['id_pantalon_viejo']);
                        $pantalondto = new PantalonDTO();

                        $pantalondto->setId_pantalon($id_pantalon_viejo);
                        $pantalondto->setCantidad($cant_pantalones_viejo);

                        $pantalondao = new PantalonDAO();

                        $resultado1 = $pantalondao->actualizarCantidadPantalon($pantalondto);


                        $id_pantalon = intval($id_pantalon);
                        $usuariodto = new UsuarioDTO();

                        $usuariodto->setId_usuario($id_usuario);
                        $usuariodto->setPantalon($id_pantalon);
                        
                        $pantalondto->setId_pantalon($id_pantalon);
                        $pantalondto->setCantidad($cant_pantalones);
                        
                        $usuariodao = new UsuarioDAO();
                        
                        $resultado2 = $usuariodao->asignarPantalon($usuariodto);
                        $resultado3 = $pantalondao->actualizarCantidadPantalon($pantalondto); 

                        if ($resultado1 && $resultado2 && $resultado3) {
                            echo "<div class='alert alert-success' role='alert'>¡El pantalon se actualizó correctamente!</div>";
                        
                        }else{
                            echo "<div class='alert alert-danger' role='alert'>Error! No se pudo actualizar el pantalón</div>";
                        }
                        
                    }else{
                        echo "<div class='alert alert-danger' role='alert'>Error, datos no validos</div>";
                    }
                }else{
                    echo "<div class='alert alert-danger' role='alert'>Error, datos no validos</div>";
                }
                
            }

        break;

        case "zapato":
            if (isset($_POST['id_usuario']) && isset($_POST['id_zapato']) && isset($_POST['id_zapato_viejo'])) {

                $id_usuario = $_POST['id_usuario'];
                $id_zapato = $_POST['id_zapato'];
                $cant_zapatos = intval($_POST['cant_zapatos']);
                $cant_zapatos_viejo = intval($_POST['cant_zapatos_viejo']) + 1;
                

                if (preg_match('/[0-9]+/', $id_usuario)) {
                    if (preg_match('/[0-9]+/', $id_zapato)) {
            
                        $id_zapato_viejo = intval($_POST['id_zapato_viejo']);
                        $zapatodto = new ZapatoDTO();

                        $zapatodto->setId_zapato($id_zapato_viejo);
                        $zapatodto->setCantidad($cant_zapatos_viejo);

                        $zapatodao = new ZapatoDAO();

                        $resultado1 = $zapatodao->actualizarCantidadZapato($zapatodto);

                        $id_zapato = intval($id_zapato);
                        $usuariodto = new UsuarioDTO();

                        $usuariodto->setId_usuario($id_usuario);
                        $usuariodto->setZapato($id_zapato);
                        
                        $zapatodto->setId_zapato($id_zapato);
                        $zapatodto->setCantidad($cant_zapatos);
                        
                        $usuariodao = new UsuarioDAO();
                        
                        $resultado2 = $usuariodao->asignarZapato($usuariodto);
                        $resultado3 = $zapatodao->actualizarCantidadZapato($zapatodto); 

                        if ($resultado1 && $resultado2 && $resultado3) {
                            echo "<div class='alert alert-success' role='alert'>¡Los zapatos se actualizó correctamente!</div>";
                        
                        }else{
                            echo "<div class='alert alert-danger' role='alert'>Error! No se pudo actualizar los zapatos</div>";
                        }
                        
                    }else{
                        echo "<div class='alert alert-danger' role='alert'>Error, datos no validos</div>";
                    }
                }else{
                    echo "<div class='alert alert-danger' role='alert'>Error, datos no validos</div>";
                }
                
            }
        break;
        case "vestimenta":
            if (isset($_POST['id_usuario']) && isset($_POST['id_vestimenta']) && isset($_POST['id_vestimenta_vieja'])) {

                $id_usuario = $_POST['id_usuario'];
                $id_vestimenta = $_POST['id_vestimenta'];
                $cant_vestimentas = intval($_POST['cant_vestimentas']);
                $cant_vestimentas_vieja = intval($_POST['cant_vestimentas_vieja']) + 1;
                

                if (preg_match('/[0-9]+/', $id_usuario)) {
                    if (preg_match('/[0-9]+/', $id_vestimenta)) {
            
                        $id_vestimenta_vieja = intval($_POST['id_vestimenta_vieja']);
                        $vestimentadto = new OtraVestimentaDTO();

                        $vestimentadto->setId_vestimenta($id_vestimenta_vieja);
                        $vestimentadto->setCantidad($cant_vestimentas_vieja);

                        $vestimentadao = new OtraVestimentaDAO();

                        $resultado1 = $vestimentadao->actualizarCantidadVestimenta($vestimentadto);

                        $id_vestimenta = intval($id_vestimenta);
                        $usuariodto = new UsuarioDTO();

                        $usuariodto->setId_usuario($id_usuario);
                        $usuariodto->setVestimenta($id_vestimenta);
                        
                        $vestimentadto->setId_vestimenta($id_vestimenta);
                        $vestimentadto->setCantidad($cant_vestimentas);
                        
                        $usuariodao = new UsuarioDAO();
                        
                        $resultado2 = $usuariodao->asignarVestimenta($usuariodto);
                        $resultado3 = $vestimentadao->actualizarCantidadVestimenta($vestimentadto); 

                        if ($resultado1 && $resultado2 && $resultado3) {
                            echo "<div class='alert alert-success' role='alert'>¡La ropa de trabajo se actualizó correctamente!</div>";
                        
                        }else{
                            echo "<div class='alert alert-danger' role='alert'>Error! No se pudo actualizar la ropa de trabajo</div>";
                        }
                        
                    }else{
                        echo "<div class='alert alert-danger' role='alert'>Error, datos no validos</div>";
                    }
                }else{
                    echo "<div class='alert alert-danger' role='alert'>Error, datos no validos</div>";
                }
                
            }
        break;
    }

}else{
    echo "Error, está entrando a una sección de forma indebida";
}