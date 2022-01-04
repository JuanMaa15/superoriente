<?php

require_once ("../../models/DAO/GeneroDAO.php");


$generodao = new GeneroDAO();

$listaGeneros = $generodao->listaGeneros();

$lista =  "<table class='table table-striped'>"
            ."<thead>"
            ."<tr>"
                ."<th scope='col'>Código género</th>"
                ."<th scope='col'>Género</th>"
                
                ."<th scope='col' class='px-5'>Opciones</th>"
            ."</tr>"
            ."</thead>"
            ."<tbody>";

for ($i=0 ; $i < count($listaGeneros); $i++) { 
    
    $lista .= "<tr>"
                ."<td>" . $listaGeneros[$i]->getId_genero() . "</td>"
                ."<td>" . $listaGeneros[$i]->getNombre() . "</td>"
                ."<td class='text-center'><button class='btn btn-verde' id='btn-editar-genero' type='button' value='" . $listaGeneros[$i]->getId_genero() . "' data-bs-toggle='modal' data-bs-target='#editar-generos'>Editar</button></td>"
                ."</tr>";

}


$lista .= "</tbody>"
        . "</table>";


echo $lista;


