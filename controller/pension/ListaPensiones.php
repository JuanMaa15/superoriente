<?php

require_once ("../../models/DAO/PensionDAO.php");

$pensiondao = new PensionDAO();

$listaPensiones = $pensiondao->listaPensiones();

$lista = "<table class='table table-striped'>"
        . "<thead>"
            . "<tr>"
                . "<th scope='col'>Código pensión</th>"
                . "<th scope='col'>Pensión</th>"
                ."<th scope='col' class='px-5'>Opciones</th>"
            . "</tr>"
        . "</thead>"
        . "<tbody>";

for ($i=0; $i < count($listaPensiones); $i++) { 
    $lista .= "<tr>"
               . "<td>" . $listaPensiones[$i]->getId_pension() .  "</td>"
               . "<td>" . $listaPensiones[$i]->getNombre() .  "</td>"
               . "<td class='text-center'><button class='btn btn-verde' id='btn-editar-pension' type='button' value='" . $listaPensiones[$i]->getId_pension() . "' data-bs-toggle='modal' data-bs-target='#editar-pensiones'>Editar</button></td>"

            ."</tr>"; 
}

$lista .= "</tbody>"
        . "</table>";
        
echo $lista;