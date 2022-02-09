<?php

require_once ("../../models/DAO/TipoContratoDAO.php");


$tipoContratodao = new TipoContratoDAO();

$listaTiposContratos = $tipoContratodao->listaTiposContratos();

$lista =  "<table class='table table-striped'>"
            ."<thead>"
            ."<tr>"
                ."<th scope='col'>Código Tipo de contrato</th>"
                ."<th scope='col'>Tipo de contrato</th>"
                
                ."<th scope='col' class='px-5'>Opciones</th>"
            ."</tr>"
            ."</thead>"
            ."<tbody>";

for ($i=0 ; $i < count($listaTiposContratos); $i++) { 
    
    $lista .= "<tr>"
                ."<td>" . $listaTiposContratos[$i]->getId_tipo_contrato() . "</td>"
                ."<td>" . $listaTiposContratos[$i]->getNombre() . "</td>"
                ."<td class='text-center'><button class='btn btn-verde' id='btn-editar-tipo-contrato' type='button' value='" . $listaTiposContratos[$i]->getId_tipo_contrato() . "' data-bs-toggle='modal' data-bs-target='#editar-tipos-contratos'>Editar</button></td>"
                ."</tr>";

}


$lista .= "</tbody>"
        . "</table>";


echo $lista;


