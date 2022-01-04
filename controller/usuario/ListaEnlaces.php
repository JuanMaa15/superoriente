<?php

require_once ("../../models/DAO/UsuarioDAO.php");


$usuariodao = new UsuarioDAO();

$listaUsuarios = $usuariodao->listaUsuarios();

$lista =  "<table class='table table-striped'>"
            ."<thead>"
            ."<tr>"
                ."<th scope='col' class='pe-5'>Tipo_documento</th>"
                ."<th scope='col' class='pe-5'>Nro_documento</th>"
                ."<th scope='col' class='pe-5'>Nombre</th>"
                ."<th scope='col' class='pe-5'>Apellido</th>"
                ."<th scope='col' class='pe-5'><i class='far fa-folder'></i> Carpeta</th>"
                
            ."</tr>"
            ."</thead>"
            ."<tbody>";

for ($i=0 ; $i < count($listaUsuarios); $i++) { 
    
    $lista .= "<tr>"
                ."<td>" . $listaUsuarios[$i]->getTipo_documento() . "</td>"
                ."<td>" . $listaUsuarios[$i]->getId_usuario() . "</td>"
                ."<td>" . $listaUsuarios[$i]->getNombre() . "</td>"
                ."<td>" . $listaUsuarios[$i]->getApellido() . "</td>"
                ."<td><a href='hojavida.php?doc=" . $listaUsuarios[$i]->getId_usuario() . "'><i class='far fa-folder'></i> Más información </a></td>";
                

}


$lista .= "</tbody>"
        . "</table>";


echo $lista;


