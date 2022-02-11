<?php

require_once ("../../models/DAO/NivelAcademicoDAO.php");

$nivelacademicodao = new NivelAcademicoDAO();

$listaNivelesAcademicos = $nivelacademicodao->listaNivelesAcademicos();

$lista = "<table class='table table-striped'>"
        . "<thead>"
            . "<tr>"
                . "<th scope='col'>Código nivel academico</th>"
                . "<th scope='col'>Nivel academico</th>"
                ."<th scope='col' class='px-5'>Opciones</th>"
            . "</tr>"
        . "</thead>"
        . "<tbody>";

for ($i=0; $i < count($listaNivelesAcademicos); $i++) { 
    $lista .= "<tr>"
               . "<td>" . $listaNivelesAcademicos[$i]->getId_nivel_academico() .  "</td>"
               . "<td>" . $listaNivelesAcademicos[$i]->getNombre() .  "</td>"
               . "<td class='text-center'><button class='btn btn-verde' id='btn-editar-nivel-academico' type='button' value='" . $listaNivelesAcademicos[$i]->getId_nivel_academico() . "' data-bs-toggle='modal' data-bs-target='#editar-niveles-academicos'>Editar</button></td>"

            ."</tr>"; 
}

$lista .= "</tbody>"
        . "</table>";
        
echo $lista;