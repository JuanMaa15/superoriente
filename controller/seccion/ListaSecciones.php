<?php

require_once ("../../models/DAO/SeccionDAO.php");

$secciondao = new SeccionDAO();

$listaSecciones = $secciondao->listaSecciones();

$lista = "<table class='table table-striped'>"
        . "<thead>"
            . "<tr>"
                . "<th scope='col'>Código sección</th>"
                . "<th scope='col'>Sección</th>"
                ."<th scope='col' class='px-5'>Opciones</th>"
            . "</tr>"
        . "</thead>"
        . "<tbody>";

for ($i=0; $i < count($listaSecciones); $i++) { 
    $lista .= "<tr>"
               . "<td>" . $listaSecciones[$i]->getId_seccion() .  "</td>"
               . "<td>" . $listaSecciones[$i]->getNombre() .  "</td>"
               . "<td class='text-center'><button class='btn btn-verde' id='btn-editar-seccion' type='button' value='" . $listaSecciones[$i]->getId_seccion() . "' data-bs-toggle='modal' data-bs-target='#editar-secciones'>Editar</button></td>"

            ."</tr>"; 
}

$lista .= "</tbody>"
        . "</table>";
        
echo $lista;