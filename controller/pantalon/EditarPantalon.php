<?php

require_once ("../../models/DAO/PantalonDAO.php");
require_once ("../../models/DAO/TipoDotacionDAO.php");
require_once ("../../models/DAO/TipoPantalonDAO.php");
require_once ("../../models/DAO/GeneroDAO.php");


$id_pantalon = intval($_POST['id']);

$pantalondao = new PantalonDAO();

$pantalondto = $pantalondao->listaPantalon($id_pantalon);

$tipoDotaciondao = new TipoDotacionDAO();
$listaTiposDotaciones = $tipoDotaciondao->listaTiposDotaciones();

$tipoPantalondao = new TipoPantalonDAO();
$listaPantalones = $tipoPantalondao->listaTiposPantalones();

$generodao = new GeneroDAO();
$listaGeneros = $generodao->listaGeneros();


$cbxTiposPantalones = "<select class='form-select' id='tipo-pantalon-act'>";
        
        for ($i=0; $i < count($listaPantalones); $i++) { 
                if ($listaPantalones[$i]->getId_tipo_pantalon() == $pantalondto->getNombre()) {
                        $cbxTiposPantalones .= "<option selected value='" . $listaPantalones[$i]->getId_tipo_pantalon() . "'>" . $listaPantalones[$i]->getNombre() . "</option>";
                }else{
                        $cbxTiposPantalones .= "<option value='" . $listaPantalones[$i]->getId_tipo_pantalon() . "'>" . $listaPantalones[$i]->getNombre() . "</option>";
   
                }
        }

$cbxTiposPantalones .= "</select>";

$cbxTiposDotaciones = "<select class='form-select' id='tipo-dotacion-pantalon-act'>";
        
        for ($i=0; $i < count($listaTiposDotaciones); $i++) { 
                if ($listaTiposDotaciones[$i]->getId_tipo_dotacion() == $pantalondto->getTipo_dotacion()) {
                        $cbxTiposDotaciones .= "<option selected value='" . $listaTiposDotaciones[$i]->getId_tipo_dotacion() . "'>" . $listaTiposDotaciones[$i]->getNombre() . "</option>";
                }else{
                        $cbxTiposDotaciones .= "<option value='" . $listaTiposDotaciones[$i]->getId_tipo_dotacion() . "'>" . $listaTiposDotaciones[$i]->getNombre() . "</option>";
   
                }
        }

$cbxTiposDotaciones .= "</select>";


$cbxEstado = "<select class='form-select' id='estado-pantalon-act'>";
        
        if ($pantalondto->getEstado() == 1) {
            $cbxEstado .= "<option selected value='1'>Disponible</option>"
            . "<option value='0'>Agotado</option>";
        }else{
            $cbxEstado .= "<option value='1'>Disponible</option>"
            . "<option selected value='0'>Agotado</option>";
        }

$cbxEstado .= "</select>";

$cbxGenero = "<select class='form-select' id='genero-pantalon-act'>";
        
        for ($i=0; $i < count($listaGeneros); $i++) { 
                if ($listaGeneros[$i]->getId_genero() == $pantalondto->getGenero()) {
                        $cbxGenero .= "<option selected value='" . $listaGeneros[$i]->getId_genero() . "'>" . $listaGeneros[$i]->getNombre() . "</option>";
                }else{
                        $cbxGenero .= "<option value='" . $listaGeneros[$i]->getId_genero() . "'>" . $listaGeneros[$i]->getNombre() . "</option>";
   
                }
        }

$cbxGenero .= "</select>";


$tallas = ['28','30','32','34','36','38','40','42','44'];


$cbxTalla = "<select class='form-select' id='talla-pantalon-act'>";

        for ($i=0; $i < count($tallas); $i++) { 
            
            if ($pantalondto->getTalla() == $tallas[$i]) {
                $cbxTalla .= "<option selected value='" . $tallas[$i] . "'>" . $tallas[$i] . "</option>";
            }else{
                $cbxTalla .= "<option value='" . $tallas[$i] . "'>" . $tallas[$i] . "</option>";

            }
        }

$cbxTalla .= "</select>";

$form = "<form>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Código del pantalón</label>"
        ."<input class='form-control' type='text' id='id-pantalon-act' value='" . $pantalondto->getId_pantalon() . "' readonly>"
        ."<small class='text-danger'></small>"
        ."</div>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Tipo de pantalón</label>"
        . $cbxTiposPantalones
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
        ."<input class='form-control' type='number' id='cantidad-pantalon-act' value='" . $pantalondto->getCantidad() . "'>"
        ."<small class='text-danger'></small>"
        ."</div>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Género</label>"
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