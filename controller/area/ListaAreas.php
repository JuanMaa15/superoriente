<?php

require_once ("../../models/DAO/AreaDAO.php");

$areadao = new AreaDAO();

$listaAreas = $areadao->listaAreas();

$lista = "<table class='table table-striped'>"
        . "<thead>"
            . "<tr>"
                . "<th scope='col'>Código area</th>"
                . "<th scope='col'>Area</th>"
                ."<th scope='col' class='px-5'>Opciones</th>"
            . "</tr>"
        . "</thead>"
        . "<tbody>";

for ($i=0; $i < count($listaAreas); $i++) { 
    $lista .= "<tr>"
               . "<td>" . $listaAreas[$i]->getId_area() .  "</td>"
               . "<td>" . $listaAreas[$i]->getNombre() .  "</td>"
               . "<td class='text-center'><button class='btn btn-verde' id='btn-editar-area' type='button' value='" . $listaAreas[$i]->getId_area() . "' data-bs-toggle='modal' data-bs-target='#editar-areas'>Editar</button></td>"

            ."</tr>"; 
}

$lista .= "</tbody>"
        . "</table>";
        
echo $lista;