<?php

require_once ("../../models/DAO/TipoPantalonDAO.php");


$tipoPantalondao = new TipoPantalonDAO();

$listaTiposPantalones = $tipoPantalondao->listaTiposPantalones();
$lista =  "<table class='table table-striped'>"
            ."<thead>"
            ."<tr>"
                ."<th scope='col'>Código Tipo de pantalón</th>"
                ."<th scope='col'>Tipo de pantalón</th>"
                
                ."<th scope='col' class='px-5'>Opciones</th>"
            ."</tr>"
            ."</thead>"
            ."<tbody>";

for ($i=0 ; $i < count($listaTiposPantalones); $i++) { 
    
    $lista .= "<tr>"
                ."<td>" . $listaTiposPantalones[$i]->getId_tipo_pantalon() . "</td>"
                ."<td>" . $listaTiposPantalones[$i]->getNombre() . "</td>"
                ."<td class='text-center'><button class='btn btn-verde' id='btn-editar-tipo-pantalon' type='button' value='" . $listaTiposPantalones[$i]->getId_tipo_pantalon() . "' data-bs-toggle='modal' data-bs-target='#editar-tipos-pantalones'>Editar</button></td>"
                ."</tr>";

}


$lista .= "</tbody>"
        . "</table>";


echo $lista;


