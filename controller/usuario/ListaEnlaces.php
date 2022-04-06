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
                    ."<td><a href='informacionEmpleado.html?doc=" . $listaUsuarios[$i]->getId_usuario() . "'><i class='far fa-folder'></i> Más información </a></td>";
                    
    
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

    $id = intval($_POST['id']);

    switch ($_POST['opc']) {
        case 'estado':

            $listaUsuarios = $usuariodao->ListaEstadoUsuario($id);

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
                            ."<input type='text' class='d-none' value='" . $id . "' name='estado'>"
                            ."<button type='submit' class='btn btn-verde' name='btn-reporte-estado''>Descargar Reporte</button>"
                            ."</form>"
                            
                            . "</div>"
                            . "</div>";
        
        break;

        case 'contrato':

            $listaUsuarios = $usuariodao->ListaTipoContratoUsuario($id);

            $lista = "<table class='table table-striped'>"
            ."<thead>"
            ."<tr>"
                ."<th scope='col' class='pe-5'>Tipo_documento</th>"
                ."<th scope='col' class='pe-5'>Nro_documento</th>"
                ."<th scope='col' class='pe-5'>Nombre</th>"
                ."<th scope='col' class='pe-5'>Apellido</th>"
                ."<th scope='col' class='pe-5'>Tipo de contrato</th>"
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
                ."<td>" . $listaUsuarios[$i]->getTipo_contrato() . "</td>"
                ."<td><a href='hojavida.php?doc=" . $listaUsuarios[$i]->getId_usuario() . "'><i class='far fa-folder'></i> Más información </a></td>";
            
            }

            $lista .= "</tbody>"
                    . "</table>";
        
            $btnDescargar = "<div class='row'>"
                            ."<div class='col'>"
                            ."<form method='POST' action='../../controller/reportes/ReporteContratoUsuario.php'>"
                            ."<input type='text' class='d-none' value='" . $id . "' name='contrato'>"
                            ."<button type='submit' class='btn btn-verde' name='btn-reporte-contrato''>Descargar Reporte</button>"
                            ."</form>"
                            
                            . "</div>"
                            . "</div>";
        
        break;

        case 'casa':

            $listaUsuarios = $usuariodao->ListaCasaUsuario($id);

            $lista = "<table class='table table-striped'>"
            ."<thead>"
            ."<tr>"
                ."<th scope='col' class='pe-5'>Tipo_documento</th>"
                ."<th scope='col' class='pe-5'>Nro_documento</th>"
                ."<th scope='col' class='pe-5'>Nombre</th>"
                ."<th scope='col' class='pe-5'>Apellido</th>"
                ."<th scope='col' class='pe-5'>Casa</th>"
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
                ."<td>" . $listaUsuarios[$i]->getTipo_casa() . "</td>"
                ."<td><a href='hojavida.php?doc=" . $listaUsuarios[$i]->getId_usuario() . "'><i class='far fa-folder'></i> Más información </a></td>";
            
            }

            $lista .= "</tbody>"
                    . "</table>";
        
            $btnDescargar = "<div class='row'>"
                            ."<div class='col'>"
                            ."<form method='POST' action='../../controller/reportes/ReporteCasaUsuario.php'>"
                            ."<input type='text' class='d-none' value='" . $id . "' name='tipo_casa'>"
                            ."<button type='submit' class='btn btn-verde' name='btn-reporte-casa''>Descargar Reporte</button>"
                            ."</form>"
                            
                            . "</div>"
                            . "</div>";
        
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


