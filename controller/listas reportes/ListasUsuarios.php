<?php

require_once ("../../models/DAO/UsuarioDAO.php");
require_once ("../../models/DTO/UsuarioDTO.php");

$usuariodao = new UsuarioDAO();

$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];

$listaUsuarios = $usuariodao->ListaFechaUsuario($fecha_inicio, $fecha_fin);

$lista =  "<table class='table table-striped'>"
            ."<thead>"
            ."<tr>"
                ."<th scope='col' class='pe-5'>Nro_documento</th>"
                ."<th scope='col' class='pe-5'>Nombre</th>"
                ."<th scope='col' class='pe-5'>Apellido</th>"
                ."<th scope='col' class='pe-5'>fecha de ingreso</th>"
                ."<th scope='col' class='pe-5'>fecha de fin</th>"
            ."</tr>"
            ."</thead>"
            ."<tbody>";

for ($i=0 ; $i < count($listaUsuarios); $i++) { 
    
    $lista .= "<tr>"
                
                ."<td>" . $listaUsuarios[$i]->getId_usuario() . "</td>"
                ."<td>" . $listaUsuarios[$i]->getNombre() . "</td>"
                ."<td>" . $listaUsuarios[$i]->getApellido() . "</td>"
                ."<td>" . $listaUsuarios[$i]->getFecha_ingreso() . "</td>"
                ."<td>" . $listaUsuarios[$i]->getFecha_retiro() . "</td>"
                ."</tr>";

}


$lista .= "</tbody>"
        . "</table>";


echo $lista;


?>