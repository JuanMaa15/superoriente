<?php

require_once ("../../models/DAO/CamisaDAO.php");
require_once ("../../models/DAO/TipoDotacionDAO.php");
require_once ("../../models/DAO/TipoCamisaDAO.php");
require_once ("../../models/DAO/GeneroDAO.php");


$id_camisa = intval($_POST['id']);

$camisadao = new CamisaDAO();
$camisadto = $camisadao->listaCamisa($id_camisa);

$tipoDotaciondao = new TipoDotacionDAO();
$listaTiposDotaciones = $tipoDotaciondao->listaTiposDotaciones();

$tipoCamisadao = new TipoCamisaDAO();
$listaTiposCamisas = $tipoCamisadao->listaTiposCamisas();

$generodao = new GeneroDAO();
$listaGeneros = $generodao->listaGeneros();

$cbxTiposCamisas = "<select class='form-select' id='tipo-camisa-act'>";
        
        for ($i=0; $i < count($listaTiposCamisas); $i++) { 
                if ($listaTiposCamisas[$i]->getId_tipo_camisa() == $camisadto->getNombre()) {
                        $cbxTiposCamisas .= "<option selected value='" . $listaTiposCamisas[$i]->getId_tipo_camisa() . "'>" . $listaTiposCamisas[$i]->getNombre() . "</option>";
                }else{
                        $cbxTiposCamisas .= "<option value='" . $listaTiposCamisas[$i]->getId_tipo_camisa() . "'>" . $listaTiposCamisas[$i]->getNombre() . "</option>";
   
                }
        }

$cbxTiposCamisas .= "</select>";

$cbxTiposDotaciones = "<select class='form-select' id='tipo-dotacion-camisa-act'>";
        
        for ($i=0; $i < count($listaTiposDotaciones); $i++) { 
                if ($listaTiposDotaciones[$i]->getId_tipo_dotacion() == $camisadto->getTipo_dotacion()) {
                        $cbxTiposDotaciones .= "<option selected value='" . $listaTiposDotaciones[$i]->getId_tipo_dotacion() . "'>" . $listaTiposDotaciones[$i]->getNombre() . "</option>";
                }else{
                        $cbxTiposDotaciones .= "<option value='" . $listaTiposDotaciones[$i]->getId_tipo_dotacion() . "'>" . $listaTiposDotaciones[$i]->getNombre() . "</option>";
   
                }
        }

$cbxTiposDotaciones .= "</select>";


$cbxEstado = "<select class='form-select' id='estado-camisa-act'>";
        
        if ($camisadto->getEstado() == 1) {
            $cbxEstado .= "<option selected value='1'>Disponible</option>"
            . "<option value='0'>Agotada</option>";
        }else{
            $cbxEstado .= "<option value='1'>Disponible</option>"
            . "<option selected value='0'>Agotada</option>";
        }

$cbxEstado .= "</select>";

$cbxGenero = "<select class='form-select' id='genero-camisa-act'>";
        
        for ($i=0; $i < count($listaGeneros); $i++) { 
                if ($listaGeneros[$i]->getId_genero() == $camisadto->getGenero()) {
                        $cbxGenero .= "<option selected value='" . $listaGeneros[$i]->getId_genero() . "'>" . $listaGeneros[$i]->getNombre() . "</option>";
                }else{
                        $cbxGenero .= "<option value='" . $listaGeneros[$i]->getId_genero() . "'>" . $listaGeneros[$i]->getNombre() . "</option>";
   
                }
        }

$cbxGenero .= "</select>";


$tallas = ['XS','S','M','L','XL','XXL'];

$cbxTalla = "<select class='form-select' id='talla-camisa-act'>";

        for ($i=0; $i < count($tallas); $i++) { 
            
            if ($camisadto->getTalla() == $tallas[$i]) {
                $cbxTalla .= "<option selected value='" . $tallas[$i] . "'>" . $tallas[$i] . "</option>";
            }else{
                $cbxTalla .= "<option value='" . $tallas[$i] . "'>" . $tallas[$i] . "</option>";

            }
        }

$cbxTalla .= "</select>";

$form = "<form>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Código de la camisa</label>"
        ."<input class='form-control' type='text' id='id-camisa-act' value='" . $camisadto->getId_camisa() . "' readonly>"
        ."<small class='text-danger'></small>"
        ."</div>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Tipo de camisa</label>"
        . $cbxTiposCamisas
        ."<small class='text-danger'></small>"
        ."</div>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Tipo de dotación</label>"
        .$cbxTiposDotaciones
        ."<small class='text-danger'></small>"
        ."</div>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Talla</label>"
        .$cbxTalla
        ."<small class='text-danger'></small>"
        ."</div>"
        
        ."<div class='my-2'>"
        ."<label class='form-label'>Cantidad</label>"
        ."<input class='form-control' type='number' id='cantidad-camisa-act' value='" . $camisadto->getCantidad() . "'>"
        ."<small class='text-danger'></small>"
        ."</div>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Genero</label>"
        .$cbxGenero
        ."<small class='text-danger'></small>"
        ."</div>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Estado</label>"
        .$cbxEstado
        ."<small class='text-danger'></small>"
        ."</div>"
        ."</form>";

echo $form;  