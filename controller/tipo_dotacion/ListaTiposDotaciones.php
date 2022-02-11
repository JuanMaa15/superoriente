<?php

require_once ("../../models/DAO/TipoDotacionDAO.php");

$tipoDotaciondao = new TipoDotacionDAO();

$listaDotaciones = $tipoDotaciondao->listaTiposDotaciones();

$lista = "<table class='table table-striped'>"
        . "<thead>"
            . "<tr>"
                . "<th scope='col'>Código tipo de dotación</th>"
                . "<th scope='col'>Tipo de dotación</th>"
                ."<th scope='col' class='px-5'>Opciones</th>"
            . "</tr>"
        . "</thead>"
        . "<tbody>";

for ($i=0; $i < count($listaDotaciones); $i++) { 
    $lista .= "<tr>"
               . "<td>" . $listaDotaciones[$i]->getId_tipo_dotacion() .  "</td>"
               . "<td>" . $listaDotaciones[$i]->getNombre() .  "</td>"
               . "<td class='text-center'><button class='btn btn-verde' id='btn-editar-tipo-dotacion' type='button' value='" . $listaDotaciones[$i]->getId_tipo_dotacion() . "' data-bs-toggle='modal' data-bs-target='#editar-tipos-dotaciones'>Editar</button></td>"

            ."</tr>"; 
}

$lista .= "</tbody>"
        . "</table>";
        
echo $lista;