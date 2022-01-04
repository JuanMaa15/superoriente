<?php

require_once("../../config/conexion.php");
require_once ("../../models/DAO/EstadoCivilDAO.php");


$estadoCivildao = new EstadoCivilDAO();

$listaEstadosCiviles = $estadoCivildao->listaEstadosCiviles();

$lista =  "<table class='table table-striped'>"
            ."<thead>"
            ."<tr>"
                ."<th scope='col'>Código estado civil</th>"
                ."<th scope='col'>Estado civil</th>"
                
                ."<th scope='col' class='px-5'>Opciones</th>"
            ."</tr>"
            ."</thead>"
            ."<tbody>";

for ($i=0 ; $i < count($listaEstadosCiviles); $i++) { 
    
    $lista .= "<tr>"
                ."<td>" . $listaEstadosCiviles[$i]->getId_estado_civil() . "</td>"
                ."<td>" . $listaEstadosCiviles[$i]->getNombre() . "</td>"
                ."<td class='text-center'><button class='btn btn-verde' id='btn-editar-estado-civil' type='button' value='" . $listaEstadosCiviles[$i]->getId_estado_civil() . "' data-bs-toggle='modal' data-bs-target='#editar-estados-civiles'>Editar</button></td>"
                ."</tr>";

}


$lista .= "</tbody>"
        . "</table>";


echo $lista;


