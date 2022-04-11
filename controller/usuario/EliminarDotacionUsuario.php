<?php

require_once ("../../models/DAO/UsuarioDAO.php");
require_once ("../../models/DAO/CamisaDAO.php");
require_once ("../../models/DAO/PantalonDAO.php");
require_once ("../../models/DAO/ZapatoDAO.php");
require_once ("../../models/DAO/OtraVestimentaDAO.php");

if (isset($_POST['id']) && isset($_POST['opc'])) {

    $cant_disponibles = intval($_POST['cant_disp']);
    $id_usuario = intval($_POST['id']);
    $id_dotacion = intval($_POST['id_dotacion']);  

    $usuariodao = new UsuarioDAO();
    
    switch ($_POST['opc']) {
        case 'camisa':
            
            $camisadto = new CamisaDTO();
            $camisadto->setId_camisa($id_dotacion);
            $camisadto->setCantidad($cant_disponibles);

            $camisadao = new CamisaDAO();
            $usuariodao->eliminarCamisaEmpleado($id_usuario);
            $camisadao->actualizarCantidadCamisa($camisadto);
            
        break;

        case 'pantalon':

            $pantalondto = new PantalonDTO();
            $pantalondto->setId_pantalon($id_dotacion);
            $pantalondto->setCantidad($cant_disponibles);

            $pantalondao = new PantalonDAO();
            $usuariodao->eliminarPantalonEmpleado($id_usuario);
            $pantalondao->actualizarCantidadPantalon($pantalondto);

        break;

        case 'zapato':
            $zapatodto = new ZapatoDTO();
            $zapatodto->setId_zapato($id_dotacion);
            $zapatodto->setCantidad($cant_disponibles);

            $zapatodao = new ZapatoDAO();
            $usuariodao->eliminarZapatoEmpleado($id_usuario);
            $zapatodao->actualizarCantidadZapato($zapatodto);
            
        break;

        case 'otros':
            $otraVestimentadto = new OtraVestimentaDTO();
            $otraVestimentadto->setId_vestimenta($id_dotacion);
            $otraVestimentadto->setCantidad($cant_disponibles);

            $otraVestimentadao = new OtraVestimentaDAO();
            $usuariodao->eliminarVestimentaEmpleado($id_usuario);
            $otraVestimentadao->actualizarCantidadVestimenta($otraVestimentadto);
            
        break;
        
        default:
            # code...
            break;
    }

}else{

    echo "Error, está entrando a una sección de forma indebida";
}