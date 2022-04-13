<?php

require_once ("../../models/DAO/CesantiaDAO.php");

$cesantidao = new CesantiaDAO();

$listaCesantias = $cesantidao->listaCesantias();

$lista = "<table class='table table-striped'>"
        . "<thead>"
            . "<tr>"
                . "<th scope='col'>Código Cesantías</th>"
                . "<th scope='col'>Cesantías</th>"
                ."<th scope='col' class='px-5'>Opciones</th>"
            . "</tr>"
        . "</thead>"
        . "<tbody>";

for ($i=0; $i < count($listaCesantias); $i++) { 
    $lista .= "<tr>"
               . "<td>" . $listaCesantias[$i]->getId_cesantia() .  "</td>"
               . "<td>" . $listaCesantias[$i]->getNombre() .  "</td>"
               . "<td class='text-center'><button class='btn btn-verde' id='btn-editar-cesantia' type='button' value='" . $listaCesantias[$i]->getId_cesantia() . "' data-bs-toggle='modal' data-bs-target='#editar-cesantias'>Editar</button></td>"

            ."</tr>"; 
}

$lista .= "</tbody>"
        . "</table>";
        
echo $lista;