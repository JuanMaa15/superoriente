<?php

require_once ("../../models/DAO/SucursalDAO.php");

$sucursaldao = new SucursalDAO();

$listaSucursales = $sucursaldao->listaSucursales();

$lista = "<table class='table table-striped'>"
        . "<thead>"
            . "<tr>"
                . "<th scope='col'>Código sucursal</th>"
                . "<th scope='col'>Sucursal</th>"
                ."<th scope='col' class='px-5'>Opciones</th>"
            . "</tr>"
        . "</thead>"
        . "<tbody>";

for ($i=0; $i < count($listaSucursales); $i++) { 
    $lista .= "<tr>"
               . "<td>" . $listaSucursales[$i]->getId_sucursal() .  "</td>"
               . "<td>" . $listaSucursales[$i]->getNombre() .  "</td>"
               . "<td class='text-center'><button class='btn btn-verde' id='btn-editar-sucursal' type='button' value='" . $listaSucursales[$i]->getId_sucursal() . "' data-bs-toggle='modal' data-bs-target='#editar-sucursales'>Editar</button></td>"

            ."</tr>"; 
}

$lista .= "</tbody>"
        . "</table>";
        
echo $lista;