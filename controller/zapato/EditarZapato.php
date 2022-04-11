<?php

require_once ("../../models/DAO/ZapatoDAO.php");
require_once ("../../models/DAO/TipoDotacionDAO.php");
require_once ("../../models/DAO/TipoZapatoDAO.php");


$id_zapato = intval($_POST['id']);

$zapatodao = new ZapatoDAO();

$zapatodto = $zapatodao->listaZapato($id_zapato);

$tipoDotaciondao = new TipoDotacionDAO();
$listaTiposDotaciones = $tipoDotaciondao->listaTiposDotaciones();

$tipoZapatodao = new TipoZapatoDAO();
$listaTiposZapatos = $tipoZapatodao->listaTiposZapatos();

$cbxTiposZapatos = "<select class='form-select' id='tipo-zapato-act'>";
        
        for ($i=0; $i < count($listaTiposZapatos); $i++) { 
                if ($listaTiposZapatos[$i]->getId_tipo_zapato() == $zapatodto->getNombre()) {
                        $cbxTiposZapatos .= "<option selected value='" . $listaTiposZapatos[$i]->getId_tipo_zapato() . "'>" . $listaTiposZapatos[$i]->getNombre() . "</option>";
                }else{
                        $cbxTiposZapatos .= "<option value='" . $listaTiposZapatos[$i]->getId_tipo_zapato() . "'>" . $listaTiposZapatos[$i]->getNombre() . "</option>";
   
                }
        }

$cbxTiposZapatos .= "</select>";

$cbxTiposDotaciones = "<select class='form-select' id='tipo-dotacion-zapato-act'>";
        
        for ($i=0; $i < count($listaTiposDotaciones); $i++) { 
                if ($listaTiposDotaciones[$i]->getId_tipo_dotacion() == $zapatodto->getTipo_dotacion()) {
                        $cbxTiposDotaciones .= "<option selected value='" . $listaTiposDotaciones[$i]->getId_tipo_dotacion() . "'>" . $listaTiposDotaciones[$i]->getNombre() . "</option>";
                }else{
                        $cbxTiposDotaciones .= "<option value='" . $listaTiposDotaciones[$i]->getId_tipo_dotacion() . "'>" . $listaTiposDotaciones[$i]->getNombre() . "</option>";
   
                }
        }

$cbxTiposDotaciones .= "</select>";


$cbxEstado = "<select class='form-select' id='estado-zapato-act'>";
        
        if ($zapatodto->getEstado() == 1) {
            $cbxEstado .= "<option selected value='1'>Disponible</option>"
            . "<option value='0'>Agotado</option>";
        }else{
            $cbxEstado .= "<option value='1'>Disponible</option>"
            . "<option selected value='0'>Agotado</option>";
        }

$cbxEstado .= "</select>";


$tallas = ['34','35','36','37','38','39','40','41','42'];


$cbxTalla = "<select class='form-select' id='talla-zapato-act'>";

        for ($i=0; $i < count($tallas); $i++) { 
            
            if ($zapatodto->getTalla() == $tallas[$i]) {
                $cbxTalla .= "<option selected value='" . $tallas[$i] . "'>" . $tallas[$i] . "</option>";
            }else{
                $cbxTalla .= "<option value='" . $tallas[$i] . "'>" . $tallas[$i] . "</option>";

            }
        }

$cbxTalla .= "</select>";

$form = "<form>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Código del zapato</label>"
        ."<input class='form-control' type='text' id='id-zapato-act' value='" . $zapatodto->getId_zapato() . "' readonly>"
        ."<small class='text-danger'></small>"
        ."</div>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Tipo de zapato</label>"
        . $cbxTiposZapatos
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
        ."<input class='form-control' type='number' id='cantidad-zapato-act' value='" . $zapatodto->getCantidad() . "'>"
        ."<small class='text-danger'></small>"
        ."</div>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Estado</label>"
        .$cbxEstado
        ."<small class='text-danger'></small>"
        ."</div>"
        ."</form>";

echo $form;  