<?php

require_once ("../../models/DAO/TipoZapatoDAO.php");


$tipoZapatodao = new TipoZapatoDAO();

$listaTiposZapatos = $tipoZapatodao->listaTiposZapatos();
$lista =  "<table class='table table-striped'>"
            ."<thead>"
            ."<tr>"
                ."<th scope='col'>Código Tipo de zapato</th>"
                ."<th scope='col'>Tipo de zapato</th>"
                
                ."<th scope='col' class='px-5'>Opciones</th>"
            ."</tr>"
            ."</thead>"
            ."<tbody>";

for ($i=0 ; $i < count($listaTiposZapatos); $i++) { 
    
    $lista .= "<tr>"
                ."<td>" . $listaTiposZapatos[$i]->getId_tipo_zapato() . "</td>"
                ."<td>" . $listaTiposZapatos[$i]->getNombre() . "</td>"
                ."<td class='text-center'><button class='btn btn-verde' id='btn-editar-tipo-zapato' type='button' value='" . $listaTiposZapatos[$i]->getId_tipo_zapato() . "' data-bs-toggle='modal' data-bs-target='#editar-tipos-zapatos'>Editar</button></td>"
                ."</tr>";

}


$lista .= "</tbody>"
        . "</table>";


echo $lista;


