<?php

require_once ("../../models/DAO/TipoCamisaDAO.php");


$tipoCamisadao = new TipoCamisaDAO();

$listaTiposCamisas = $tipoCamisadao->listaTiposCamisas();
$lista =  "<table class='table table-striped'>"
            ."<thead>"
            ."<tr>"
                ."<th scope='col'>Código Tipo de camisa</th>"
                ."<th scope='col'>Tipo de camisa</th>"
                
                ."<th scope='col' class='px-5'>Opciones</th>"
            ."</tr>"
            ."</thead>"
            ."<tbody>";

for ($i=0 ; $i < count($listaTiposCamisas); $i++) { 
    
    $lista .= "<tr>"
                ."<td>" . $listaTiposCamisas[$i]->getId_tipo_camisa() . "</td>"
                ."<td>" . $listaTiposCamisas[$i]->getNombre() . "</td>"
                ."<td class='text-center'><button class='btn btn-verde' id='btn-editar-tipo-camisa' type='button' value='" . $listaTiposCamisas[$i]->getId_tipo_camisa() . "' data-bs-toggle='modal' data-bs-target='#editar-tipos-camisas'>Editar</button></td>"
                ."</tr>";

}


$lista .= "</tbody>"
        . "</table>";


echo $lista;


