<?php

require_once ("../../models/DAO/EpsDAO.php");

$epsdao = new EpsDAO();

$listaEpss = $epsdao->listaEpss();

$lista = "<table class='table table-striped'>"
        . "<thead>"
            . "<tr>"
                . "<th scope='col'>Código EPS</th>"
                . "<th scope='col'>EPS</th>"
                ."<th scope='col' class='px-5'>Opciones</th>"
            . "</tr>"
        . "</thead>"
        . "<tbody>";

for ($i=0; $i < count($listaEpss); $i++) { 
    $lista .= "<tr>"
               . "<td>" . $listaEpss[$i]->getId_eps() .  "</td>"
               . "<td>" . $listaEpss[$i]->getNombre() .  "</td>"
               . "<td class='text-center'><button class='btn btn-verde' id='btn-editar-eps' type='button' value='" . $listaEpss[$i]->getId_eps() . "' data-bs-toggle='modal' data-bs-target='#editar-epss'>Editar</button></td>"

            ."</tr>"; 
}

$lista .= "</tbody>"
        . "</table>";
        
echo $lista;