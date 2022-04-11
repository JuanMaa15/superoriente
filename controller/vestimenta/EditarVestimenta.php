<?php

require_once ("../../models/DAO/OtraVestimentaDAO.php");
require_once ("../../models/DAO/TipoDotacionDAO.php");



$id_vestimenta = intval($_POST['id']);

$otraVestimentadao = new OtraVestimentaDAO();

$otraVestimentadto = $otraVestimentadao->listaVestimenta($id_vestimenta);

$tipoDotaciondao = new TipoDotacionDAO();
$listaTiposDotaciones = $tipoDotaciondao->listaTiposDotaciones();

$cbxTiposDotaciones = "<select class='form-select' id='tipo-dotacion-vestimenta-act'>";
        
        for ($i=0; $i < count($listaTiposDotaciones); $i++) { 
                if ($listaTiposDotaciones[$i]->getId_tipo_dotacion() == $otraVestimentadto->getTipo_dotacion()) {
                        $cbxTiposDotaciones .= "<option selected value='" . $listaTiposDotaciones[$i]->getId_tipo_dotacion() . "'>" . $listaTiposDotaciones[$i]->getNombre() . "</option>";
                }else{
                        $cbxTiposDotaciones .= "<option value='" . $listaTiposDotaciones[$i]->getId_tipo_dotacion() . "'>" . $listaTiposDotaciones[$i]->getNombre() . "</option>";
   
                }
        }

$cbxTiposDotaciones .= "</select>";


$cbxEstado = "<select class='form-select' id='estado-vestimenta-act'>";
        
        if ($otraVestimentadto->getEstado() == 1) {
            $cbxEstado .= "<option selected value='1'>Disponible</option>"
            . "<option value='0'>Agotada</option>";
        }else{
            $cbxEstado .= "<option value='1'>Disponible</option>"
            . "<option selected value='0'>Agotada</option>";
        }

$cbxEstado .= "</select>";


$form = "<form>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Código de la vestimenta</label>"
        ."<input class='form-control' type='text' id='id-vestimenta-act' value='" . $otraVestimentadto->getId_vestimenta() . "' readonly>"
        ."<small class='text-danger'></small>"
        ."</div>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Vestimenta</label>"
        ."<input class='form-control' type='text' id='nombre-vestimenta-act' value='" . $otraVestimentadto->getNombre() . "'>"
        ."<small class='text-danger'></small>"
        ."</div>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Tipo de dotación</label>"
        .$cbxTiposDotaciones
        ."<small class='text-danger'></small>"
        ."</div>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Cantidad</label>"
        ."<input class='form-control' type='number' id='cantidad-vestimenta-act' value='" . $otraVestimentadto->getCantidad() . "'>"
        ."<small class='text-danger'></small>"
        ."</div>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Estado</label>"
        .$cbxEstado
        ."<small class='text-danger'></small>"
        ."</div>"
        ."</form>";

echo $form;  