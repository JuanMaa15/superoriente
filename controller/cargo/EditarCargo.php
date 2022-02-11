<?php

require_once ("../../models/DAO/CargoDAO.php");
require_once ("../../models/DAO/SeccionDAO.php");
require_once ("../../models/DAO/AreaDAO.php");


$id_cargo = intval($_POST['id']);

$cargodao = new CargoDAO();

$cargodto = $cargodao->listaCargo($id_cargo);

$secciondao = new SeccionDAO();
$listaSecciones = $secciondao->listaSecciones();

$cbxSeccion = "<select class='form-select' id='seccion-cargo-act'>";
        
        for ($i=0; $i < count($listaSecciones); $i++) { 
                if ($listaSecciones[$i]->getId_seccion() == $cargodto->getSeccion()) {
                        $cbxSeccion .= "<option selected value='" . $listaSecciones[$i]->getId_seccion() . "'>" . $listaSecciones[$i]->getNombre() . "</option>";
                }else{
                        $cbxSeccion .= "<option value='" . $listaSecciones[$i]->getId_seccion() . "'>" . $listaSecciones[$i]->getNombre() . "</option>";
   
                }
        }

$cbxSeccion .= "</select>";

$areadao = new AreaDAO();
$listaAreas = $areadao->listaAreas();

$cbxArea = "<select class='form-select' id='area-cargo-act'>";
        
        for ($i=0; $i < count($listaAreas); $i++) { 
                if ($listaAreas[$i]->getId_area() == $cargodto->getArea()) {
                        $cbxArea .= "<option selected value='" . $listaAreas[$i]->getId_area() . "'>" . $listaAreas[$i]->getNombre() . "</option>";
                }else{
                        $cbxArea .= "<option value='" . $listaAreas[$i]->getId_area() . "'>" . $listaAreas[$i]->getNombre() . "</option>";
   
                }
        }

$cbxArea .= "</select>";



$form = "<form>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Código de cargo</label>"
        ."<input class='form-control' type='text' id='id-cargo-act' value='" . $cargodto->getId_cargo() . "' readonly>"
        ."<small class='text-danger'></small>"
        ."</div>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Cargo</label>"
        ."<input class='form-control' type='text' id='nombre-cargo-act' value='" . $cargodto->getNombre() . "'>"
        ."<small class='text-danger'></small>"
        ."</div>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Sección</label>"
        .$cbxSeccion
        ."<small class='text-danger'></small>"
        ."</div>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Area</label>"
        .$cbxArea
        ."<small class='text-danger'></small>"
        ."</div>"
        ."</form>";

echo $form;  