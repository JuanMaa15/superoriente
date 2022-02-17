<?php

require_once ("../../models/DAO/CargoDAO.php");

$seccion = $_POST['seccion'];
$area = $_POST['area'];


if (!empty($seccion) && !empty($area)) {
    if (preg_match('/[0-9]+/',$seccion)) {

        if (preg_match('/[0-9]+/',$area)) {

            $cargodao = new CargoDAO();

            $listaCargos = $cargodao->listaCargosId();

            $cbxCargo = "";

            $seccion = intval($seccion);
            $area = intval($area);

            for ($i=0; $i < count($listaCargos); $i++) { 

                if ($listaCargos[$i]->getSeccion() == $seccion && $listaCargos[$i]->getArea() == $area) {
                    $cbxCargo .= "<option value='" . $listaCargos[$i]->getId_cargo() . "'>" . $listaCargos[$i]->getNombre() . "</option>";

                }
            }

             echo $cbxCargo;

        }

    }

}


