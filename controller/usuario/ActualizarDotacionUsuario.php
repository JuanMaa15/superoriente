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

            if (isset($_POST['id_usuario']) && isset($_POST['id_camisa']) && isset($_POST['id_camisa_vieja']) && isset($_POST['cant_camisas_vieja'])) {

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
                            echo "<div class='alert alert-success' role='alert'>¡La camisa fue actualizar correctamente!</div>";
                        
                        }else{
                            echo "<div class='alert alert-danger' role='alert'>Error! No se pudo actualizar la camisa</div>";
                        }
                        
                    }else{
                        echo "<div class='alert alert-danger' role='alert'>Error, datos no validos</div>";
                    }
                }else{
                    echo "<div class='alert alert-danger' role='alert'>Error, datos no validos</div>";
                }
                
            }
        break;
        case "pantalon":
            if (isset($_POST['id_usuario']) && isset($_POST['id_pantalon'])) {

                $id_usuario = $_POST['id_usuario'];
                $id_pantalon = $_POST['id_pantalon'];
                $cant_pantalones = intval($_POST['cant_pantalones']);

                

                if (preg_match('/[0-9]+/', $id_usuario)) {
                    if (preg_match('/[0-9]+/', $id_pantalon)) {
            
                        $id_pantalon = intval($id_pantalon);
                        $usuariodto = new UsuarioDTO();
                        $pantalondto = new PantalonDTO();

                        $usuariodto->setId_usuario($id_usuario);
                        $usuariodto->setPantalon($id_pantalon);
                        
                        $pantalondto->setId_pantalon($id_pantalon);
                        $pantalondto->setCantidad($cant_pantalones);
                        
                        $usuariodao = new UsuarioDAO();
                        $camisadao = new PantalonDAO();
                        
                        $resultado_usuario = $usuariodao->asignarPantalon($usuariodto);
                        $resultado_pantalon = $camisadao->actualizarCantidadPantalon($pantalondto); 

                        if ($resultado_usuario && $resultado_pantalon) {
                            echo "<div class='alert alert-success' role='alert'>¡El pantalón fue asignado correctamente!</div>";
                        
                        }else{
                            echo "<div class='alert alert-danger' role='alert'>Error! No se pudo asignar el pantalón</div>";
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
            if (isset($_POST['id_usuario']) && isset($_POST['id_zapato'])) {

                $id_usuario = $_POST['id_usuario'];
                $id_zapato = $_POST['id_zapato'];
                $cant_zapatos = intval($_POST['cant_zapatos']);

                

                if (preg_match('/[0-9]+/', $id_usuario)) {
                    if (preg_match('/[0-9]+/', $id_zapato)) {
            
                        $id_zapato = intval($id_zapato);
                        $usuariodto = new UsuarioDTO();
                        $zapatodto = new ZapatoDTO();

                        $usuariodto->setId_usuario($id_usuario);
                        $usuariodto->setZapato($id_zapato);
                        
                        $zapatodto->setId_zapato($id_zapato);
                        $zapatodto->setCantidad($cant_zapatos);
                        
                        $usuariodao = new UsuarioDAO();
                        $zapatodao = new ZapatoDAO();
                        
                        $resultado_usuario = $usuariodao->asignarZapato($usuariodto);
                        $resultado_zapato = $zapatodao->actualizarCantidadZapato($zapatodto); 

                        if ($resultado_usuario && $resultado_zapato) {
                            echo "<div class='alert alert-success' role='alert'>¡El zapato fue asignado correctamente!</div>";
                        
                        }else{
                            echo "<div class='alert alert-danger' role='alert'>Error! No se pudo asignar el zapato</div>";
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
            if (isset($_POST['id_usuario']) && isset($_POST['id_vestimenta'])) {

                $id_usuario = $_POST['id_usuario'];
                $id_vestimenta = $_POST['id_vestimenta'];
                $cant_vestimentas = intval($_POST['cant_vestimentas']);

                

                if (preg_match('/[0-9]+/', $id_usuario)) {
                    if (preg_match('/[0-9]+/', $id_vestimenta)) {
            
                        $id_vestimenta = intval($id_vestimenta);
                        $usuariodto = new UsuarioDTO();
                        $vestimentadto = new OtraVestimentaDTO();

                        $usuariodto->setId_usuario($id_usuario);
                        $usuariodto->setVestimenta($id_vestimenta);
                        
                        $vestimentadto->setId_vestimenta($id_vestimenta);
                        $vestimentadto->setCantidad($cant_vestimentas);
                        
                        $usuariodao = new UsuarioDAO();
                        $vestimentadao = new OtraVestimentaDAO();
                        
                        $resultado_usuario = $usuariodao->asignarVestimenta($usuariodto);
                        $resultado_vestimenta = $vestimentadao->actualizarCantidadVestimenta($vestimentadto); 

                        if ($resultado_usuario && $resultado_vestimenta) {
                            echo "<div class='alert alert-success' role='alert'>¡La vestimenta fue asignado correctamente!</div>";
                        
                        }else{
                            echo "<div class='alert alert-danger' role='alert'>Error! No se pudo asignar la vestimenta</div>";
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