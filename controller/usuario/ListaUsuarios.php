<?php

require_once ("../../models/DAO/UsuarioDAO.php");
require_once ("../../models/DTO/UsuarioDTO.php");

$usuariodao = new UsuarioDAO();

$listaUsuarios = $usuariodao->listaUsuarios();

$lista =  "<table class='table table-striped'>"
            ."<thead>"
            ."<tr>"
                ."<th scope='col' class='pe-5'>Tipo_documento</th>"
                ."<th scope='col' class='pe-5'>Nro_documento</th>"
                ."<th scope='col' class='pe-5'>Nombre</th>"
                ."<th scope='col' class='pe-5'>Apellido</th>"
                ."<th scope='col' class='pe-5'>Telefono</th>"
                ."<th scope='col' class='pe-5'>Género</th>"
                ."<th scope='col' class='pe-5'>Cargo</th>"
                ."<th scope='col' class='pe-5'>Tipo_contrato</th>"
                ."<th scope='col' class='pe-5'>Sueldo</th>"
                ."<th scope='col' class='pe-5'>Correo</th>"
                ."<th scope='col' class='pe-5'>Contraseña</th>"
                ."<th scope='col' class='pe-5'>Fecha_inicio</th>"
                ."<th scope='col' class='pe-5'>Fecha_fin</th>"
                ."<th scope='col' class='pe-5'>Perfil</th>"
                ."<th scope='col' class='pe-5'>Estado</th>"
                ."<th scope='col' class='px-5'>Opciones</th>"
            ."</tr>"
            ."</thead>"
            ."<tbody>";

for ($i=0 ; $i < count($listaUsuarios); $i++) { 
    
    $lista .= "<tr>"
                ."<td>" . $listaUsuarios[$i]->getTipo_documento() . "</td>"
                ."<td>" . $listaUsuarios[$i]->getId_usuario() . "</td>"
                ."<td>" . $listaUsuarios[$i]->getNombre() . "</td>"
                ."<td>" . $listaUsuarios[$i]->getApellido() . "</td>"
                ."<td>" . $listaUsuarios[$i]->getTelefono() . "</td>"
                ."<td>" . $listaUsuarios[$i]->getGenero() . "</td>"
                ."<td>" . $listaUsuarios[$i]->getCargo() . "</td>"
                ."<td>" . $listaUsuarios[$i]->getTipo_contrato() . "</td>"
                ."<td>" . $listaUsuarios[$i]->getSueldo() . "</td>"
                ."<td>" . $listaUsuarios[$i]->getCorreo() . "</td>"
                ."<td>" . $listaUsuarios[$i]->getPassword() . "</td>"
                ."<td>" . $listaUsuarios[$i]->getFecha_inicio() . "</td>"
                ."<td>" . $listaUsuarios[$i]->getFecha_fin() . "</td>"
                ."<td>" . $listaUsuarios[$i]->getPerfil() . "</td>"
                ."<td>" . $listaUsuarios[$i]->getEstado() . "</td>"

                ."<td class='text-center'><button class='btn btn-verde' type='button' id='btn-editar-usuario' value='" . $listaUsuarios[$i]->getId_usuario() . "' data-bs-toggle='modal' data-bs-target='#editar-usuarios'>Editar</button></td>"
                ."</tr>";

}


$lista .= "</tbody>"
        . "</table>";


echo $lista;


