<?php

require_once ("../../models/DAO/CargoDAO.php");

$cargodao = new CargoDAO();

$listaCargos = $cargodao->listaCargos();

$lista = "table class='table table-striped'"
        . "<thead>"
            . "<tr>"
                . "<th scope='col'>Código cargo</th>"
                . "<th scope='col'>Cargo</th>"
                ."<th scope='col' class='px-5'>Opciones</th>"
            . "</tr>"
        . "</thead>"
        . "<tbody>";

for ($i=0; $i < count($listaCargos); $i++) { 
    $lista .= "<tr>"
               . "<td>" . $listaCargos[$i]->getId_cargo() .  "</td>"
               . "<td>" . $listaCargos[$i]->getNombre() .  "</td>"
               . "<td class='text-center'><button class='btn btn-verde' id='btn-editar-cargo' type='button' value='" . $listaCargos[$i]->getId_cargo() . "' data-bs-toggle='modal' data-bs-target='#editar-cargos'>Editar</button></td>"

            ."</tr>"; 
}

$lista .= "</tbody>"
        . "</table>";
        
echo $lista;