<?php

require_once("../../config/conexion.php");
require_once ("../../models/DAO/TipoDocumentoDAO.php");
require_once ("../../models/DTO/TipoDocumentoDTO.php");



$tipoDocumentodao = new TipoDocumentoDAO();

$listaTiposDocumentos = $tipoDocumentodao->listaTiposDocumentos();

$lista =  "<table class='table table-striped'>"
            ."<thead>"
            ."<tr>"
                ."<th scope='col'>Código Tipo de documento</th>"
                ."<th scope='col'>Tipo de documento</th>"
                
                ."<th scope='col' class='px-5'>Opciones</th>"
            ."</tr>"
            ."</thead>"
            ."<tbody>";

for ($i=0 ; $i < count($listaTiposDocumentos); $i++) { 
    
    $lista .= "<tr>"
                ."<td>" . $listaTiposDocumentos[$i]->getId_Tipo_documento() . "</td>"
                ."<td>" . $listaTiposDocumentos[$i]->getTipo_documento() . "</td>"
                ."<td class='text-center'><button class='btn btn-verde' id='btn-editar-tipo-documento' type='button' value='" . $listaTiposDocumentos[$i]->getId_Tipo_documento() . "' data-bs-toggle='modal' data-bs-target='#editar-tipo-documentos'>Editar</button></td>"
                ."</tr>";

}


$lista .= "</tbody>"
        . "</table>";


echo $lista;


