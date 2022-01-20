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

if (!isset($_POST['busqueda'])) {
    for ($i=0 ; $i < count($listaUsuarios); $i++) { 
    
        $lista .= "<tr>"
                    ."<td>" . $listaUsuarios[$i]->getTipo_documento() . "</td>"
                    ."<td>" . $listaUsuarios[$i]->getId_usuario() . "</td>"
                    ."<td>" . $listaUsuarios[$i]->getNombre() . "</td>"
                    ."<td>" . $listaUsuarios[$i]->getApellido() . "</td>"
                    ."<td><a href='hojavida.php?doc=" . $listaUsuarios[$i]->getId_usuario() . "'><i class='far fa-folder'></i> Más información </a></td>";
                    
    
    }
}else{

    $busqueda = $_POST['busqueda'];

    if (empty($busqueda)) {
        for ($i=0 ; $i < count($listaUsuarios); $i++) { 
    
            $lista .= "<tr>"
                        ."<td>" . $listaUsuarios[$i]->getTipo_documento() . "</td>"
                        ."<td>" . $listaUsuarios[$i]->getId_usuario() . "</td>"
                        ."<td>" . $listaUsuarios[$i]->getNombre() . "</td>"
                        ."<td>" . $listaUsuarios[$i]->getApellido() . "</td>"
                        ."<td><a href='hojavida.php?doc=" . $listaUsuarios[$i]->getId_usuario() . "'><i class='far fa-folder'></i> Más información </a></td>";
                        
        
        }
    }else{

        $contExistencias = 0;

        for ($i=0 ; $i < count($listaUsuarios); $i++) {
        
            if (str_contains($listaUsuarios[$i]->getTipo_documento(), $busqueda) || str_contains($listaUsuarios[$i]->getId_usuario(), $busqueda) || str_contains($listaUsuarios[$i]->getNombre(), $busqueda) || str_contains($listaUsuarios[$i]->getApellido(), $busqueda)) {
                $lista .= "<tr>"
                        ."<td>" . $listaUsuarios[$i]->getTipo_documento() . "</td>"
                        ."<td>" . $listaUsuarios[$i]->getId_usuario() . "</td>"
                        ."<td>" . $listaUsuarios[$i]->getNombre() . "</td>"
                        ."<td>" . $listaUsuarios[$i]->getApellido() . "</td>"
                        ."<td><a href='hojavida.php?doc=" . $listaUsuarios[$i]->getId_usuario() . "'><i class='far fa-folder'></i> Más información </a></td>";

                $contExistencias++;
            }
                   
        }

        if ($contExistencias <= 0) {
            $lista .= "<tr>"
            ."<td colspan='5' class='text-center py-4'>No se encontraron empleados con esos datos</td>"
            ."</tr>";
        }

    }

   
}


$lista .= "</tbody>"
        . "</table>";


$btnDescargar = "";

if (isset($_POST['opc'])) {

    switch ($_POST['opc']) {
        case 'activos':

            $listaUsuarios = $usuariodao->ListaEstadoUsuario(1);

            $lista = "<table class='table table-striped'>"
            ."<thead>"
            ."<tr>"
                ."<th scope='col' class='pe-5'>Tipo_documento</th>"
                ."<th scope='col' class='pe-5'>Nro_documento</th>"
                ."<th scope='col' class='pe-5'>Nombre</th>"
                ."<th scope='col' class='pe-5'>Apellido</th>"
                ."<th scope='col' class='pe-5'>Estado</th>"
                ."<th scope='col' class='pe-5'><i class='far fa-folder'></i> Carpeta</th>"
                
            ."</tr>"
            ."</thead>"
            ."<tbody>";

            for ($i=0; $i < count($listaUsuarios); $i++) { 
                $lista .= "<tr>"
                ."<td>" . $listaUsuarios[$i]->getTipo_documento() . "</td>"
                ."<td>" . $listaUsuarios[$i]->getId_usuario() . "</td>"
                ."<td>" . $listaUsuarios[$i]->getNombre() . "</td>"
                ."<td>" . $listaUsuarios[$i]->getApellido() . "</td>"
                ."<td>" . $listaUsuarios[$i]->getEstado() . "</td>"
                ."<td><a href='hojavida.php?doc=" . $listaUsuarios[$i]->getId_usuario() . "'><i class='far fa-folder'></i> Más información </a></td>";
            
            }

            $lista .= "</tbody>"
                    . "</table>";
        
            $btnDescargar = "<div class='row'>"
                            ."<div class='col'>"
                            ."<form method='POST' action='../../controller/reportes/ReporteEstadoUsuario.php'>"
                            ."<input type='text' class='d-none' value='1' name='estado'>"
                            ."<button type='submit' class='btn btn-verde' name='btn-reporte-estado''>Descargar Reporte</button>"
                            ."</form>"
                            
                            . "</div>"
                            . "</div>";
        
        break;
        case 'inactivos':
            $listaUsuarios = $usuariodao->ListaEstadoUsuario(2);

            $lista = "<table class='table table-striped'>"
            ."<thead>"
            ."<tr>"
                ."<th scope='col' class='pe-5'>Tipo_documento</th>"
                ."<th scope='col' class='pe-5'>Nro_documento</th>"
                ."<th scope='col' class='pe-5'>Nombre</th>"
                ."<th scope='col' class='pe-5'>Apellido</th>"
                ."<th scope='col' class='pe-5'>Estado</th>"
                ."<th scope='col' class='pe-5'><i class='far fa-folder'></i> Carpeta</th>"
                
            ."</tr>"
            ."</thead>"
            ."<tbody>";

            for ($i=0; $i < count($listaUsuarios); $i++) { 
                $lista .= "<tr>"
                ."<td>" . $listaUsuarios[$i]->getTipo_documento() . "</td>"
                ."<td>" . $listaUsuarios[$i]->getId_usuario() . "</td>"
                ."<td>" . $listaUsuarios[$i]->getNombre() . "</td>"
                ."<td>" . $listaUsuarios[$i]->getApellido() . "</td>"
                ."<td>" . $listaUsuarios[$i]->getEstado() . "</td>"
                ."<td><a href='hojavida.php?doc=" . $listaUsuarios[$i]->getId_usuario() . "'><i class='far fa-folder'></i> Más información </a></td>";
            }

            $btnDescargar = "<div class='row'>"
                            ."<div class='col'>"
                            ."<form method='POST' action='../../controller/reportes/ReporteEstadoUsuario.php'>"
                            ."<input type='text' class='d-none' value='2' name='estado'>"
                            ."<button type='submit' class='btn btn-verde' name='btn-reporte-estado''>Descargar Reporte</button>"
                            ."</form>"
                            
                            . "</div>"
                            . "</div>";

            $lista .= "</tbody>"
            . "</table>";
        break;

        
        case "todos":
            $listaUsuarios = $usuariodao->listaUsuarios();

            $lista = "<table class='table table-striped'>"
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

            for ($i=0; $i < count($listaUsuarios); $i++) { 
                $lista .= "<tr>"
                ."<td>" . $listaUsuarios[$i]->getTipo_documento() . "</td>"
                ."<td>" . $listaUsuarios[$i]->getId_usuario() . "</td>"
                ."<td>" . $listaUsuarios[$i]->getNombre() . "</td>"
                ."<td>" . $listaUsuarios[$i]->getApellido() . "</td>"
                ."<td><a href='hojavida.php?doc=" . $listaUsuarios[$i]->getId_usuario() . "'><i class='far fa-folder'></i> Más información </a></td>";
            }

            $lista .= "</tbody>"
            . "</table>";

            
        break;
        
        default:
     
            break;
    }

}

echo $lista ." ". $btnDescargar;


