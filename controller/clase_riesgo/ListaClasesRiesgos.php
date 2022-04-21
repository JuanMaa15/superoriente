<?php

require_once ("../../models/DAO/ClaseRiesgoDAO.php");

$claseRiesgodao = new claseRiesgoDAO();

$listaClasesRiesgos = $claseRiesgodao->listaClasesRiesgos();

$lista = "<table class='table table-striped'>"
        . "<thead>"
            . "<tr>"
                . "<th scope='col'>Código Clase de riesgo</th>"
                . "<th scope='col'>Clases de riesgos</th>"
                . "<th scope='col'>Porcentaje</th>"
                ."<th scope='col' class='px-5'>Opciones</th>"
            . "</tr>"
        . "</thead>"
        . "<tbody>";

for ($i=0; $i < count($listaClasesRiesgos); $i++) { 
    $lista .= "<tr>"
               . "<td>" . $listaClasesRiesgos[$i]->getId_clase_riesgo() .  "</td>"
               . "<td>" . $listaClasesRiesgos[$i]->getNombre() .  "</td>"
               . "<td>" . $listaClasesRiesgos[$i]->getPorcentaje() .  "</td>"
               . "<td class='text-center'><button class='btn btn-verde' id='btn-editar-clase-riesgo' type='button' value='" . $listaClasesRiesgos[$i]->getId_clase_riesgo() . "' data-bs-toggle='modal' data-bs-target='#editar-clases-riesgos'>Editar</button></td>"

            ."</tr>"; 
}

$lista .= "</tbody>"
        . "</table>";
        
echo $lista;