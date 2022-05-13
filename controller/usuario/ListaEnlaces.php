<?php

require_once ("../../models/DAO/UsuarioDAO.php");



$usuariodao = new UsuarioDAO();


$listaUsuarios = $usuariodao->listaUsuarios();


if (isset($_POST['busqueda_dotacion'])) {

    require_once ("../../models/DAO/UsuarioDAO.php");
    require_once ("../../models/DAO/CamisaDAO.php");
    require_once ("../../models/DAO/PantalonDAO.php");
    require_once ("../../models/DAO/ZapatoDAO.php");
    require_once ("../../models/DAO/OtraVestimentaDAO.php");

    $busqueda = $_POST['busqueda_dotacion'];

    $camisadao = new CamisaDAO();
    $pantalondao = new PantalonDAO();
    $zapatodao = new ZapatoDAO();
    $vestimentadao = new OtraVestimentaDAO();

    $listaCamisas = $camisadao->listaCamisas();
    $listaPantalones = $pantalondao->listaPantalones();
    $listaZapatos = $zapatodao->listaZapatos();
    $listaVestimentas = $vestimentadao->listaVestimentas();

    $lista =  "<table class='table table-striped'>"
    ."<thead>"
    ."<tr class='text-center'>"
        ."<th scope='col'>Doc</th>"
        ."<th scope='col'>Nombre</th>"
        ."<th scope='col'>Apellido</th>"
        ."<th scope='col'>Tipo de dotacion</th>"
        ."<th scope='col'>Camisa</th>"
        ."<th scope='col'>Pantalon</th>"
        ."<th scope='col'>Zapato</th>"
        ."<th scope='col'>Vestimenta</th>"
        ."<th scope='col' class='text-center' colspan='2'>Opciones</th>"
    ."</tr>"
    ."</thead>"
    ."<tbody>"; 

    $validar_existencias = false;

    for ($i=0; $i < count($listaUsuarios); $i++){

        $camisa = "";
        $pantalon = "";
        $zapatos = "";
        $vestimenta = "";

        if ($listaUsuarios[$i]->getCamisa() != null || $listaUsuarios[$i]->getPantalon() != null
        || $listaUsuarios[$i]->getZapato() != null || $listaUsuarios[$i]->getVestimenta() != null) {
            
            for ($j=0; $j < count($listaCamisas); $j++) { 
                if ($listaUsuarios[$i]->getCamisa() == $listaCamisas[$j]->getId_camisa()) {
                    $camisa = $listaCamisas[$j]->getNombre();
                }
            }

            for ($j=0; $j < count($listaPantalones); $j++) { 
                if ($listaUsuarios[$i]->getPantalon() == $listaPantalones[$j]->getId_pantalon()) {
                    $pantalon = $listaPantalones[$j]->getNombre();
                }
            }

            for ($j=0; $j < count($listaZapatos); $j++) { 
                if ($listaUsuarios[$i]->getZapato() == $listaZapatos[$j]->getId_zapato()) {
                    $zapatos = $listaZapatos[$j]->getNombre();
                }
            }

            for ($j=0; $j < count($listaVestimentas); $j++) { 
                if ($listaUsuarios[$i]->getVestimenta() == $listaVestimentas[$j]->getId_vestimenta()) {
                    $vestimenta = $listaVestimentas[$j]->getNombre();
                }
            }

            if (str_contains($listaUsuarios[$i]->getId_usuario(), $busqueda) || str_contains($listaUsuarios[$i]->getNombre(), $busqueda) || str_contains($listaUsuarios[$i]->getApellido(), $busqueda)
            || str_contains($listaUsuarios[$i]->getTipo_dotacion(), $busqueda) || str_contains($camisa, $busqueda) || str_contains($pantalon, $busqueda) || str_contains($zapatos, $busqueda)
            || str_contains($vestimenta, $busqueda)) {

                $lista .= "<tr class='text-center'>"
                ."<td>" . $listaUsuarios[$i]->getId_usuario() . "</td>"
                ."<td>" . $listaUsuarios[$i]->getNombre() ."</td>"
                ."<td>" . $listaUsuarios[$i]->getApellido(). "</td>"
                ."<td>" . $listaUsuarios[$i]->getTipo_dotacion() . "</td>"
                ."<td>" . $camisa . "</td>"
                ."<td>" . $pantalon . "</td>"
                ."<td>" . $zapatos . "</td>"
                ."<td>" . $vestimenta ."</td>"
                . "<td><a href='informacionEmpleado.php?doc=" . $listaUsuarios[$i]->getId_usuario() . "' class='btn btn-verde'>Gestionar</a></td>"
                . "<td><button value='" . $listaUsuarios[$i]->getId_usuario() . "' class='btn btn-danger btn-ventana-eliminar-dotacion' data-bs-toggle='modal' data-bs-target='#eliminar-toda-dotacion'>Eliminar</button></td>"
                . "</tr>";

                $validar_existencias = true;

            }       

                
        }
    }    

    $lista .= "</tbody>"
                ."</table>";

    if(!$validar_existencias) {
        $lista .= "<tr class='text-center'>"
         ."<td colspan='8' class='text-center py-4'>Aún no hay empleados con ropa de trabajo</td>"
    ."</tr>";
    }

    echo $lista;

}else if(isset($_POST['cant_registros'])){

    $cant_registros = intval($_POST['cant_registros']);
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

    if (empty($cant_registros)){
        for ($i=0 ; $i < count($listaUsuarios); $i++) { 

            $lista .= "<tr>"
                    ."<td>" . $listaUsuarios[$i]->getTipo_documento() . "</td>"
                    ."<td>" . $listaUsuarios[$i]->getId_usuario() . "</td>"
                    ."<td>" . $listaUsuarios[$i]->getNombre() . "</td>"
                    ."<td>" . $listaUsuarios[$i]->getApellido() . "</td>"
                    ."<td><a href='informacionEmpleado.php?doc=" . $listaUsuarios[$i]->getId_usuario() . "'><i class='far fa-folder'></i> Más información </a></td>";
                

        }
    }else{

        if (count($listaUsuarios) >= $cant_registros ) {
            for ($i=0 ; $i < $cant_registros; $i++) { 

                $lista .= "<tr>"
                        ."<td>" . $listaUsuarios[$i]->getTipo_documento() . "</td>"
                        ."<td>" . $listaUsuarios[$i]->getId_usuario() . "</td>"
                        ."<td>" . $listaUsuarios[$i]->getNombre() . "</td>"
                        ."<td>" . $listaUsuarios[$i]->getApellido() . "</td>"
                        ."<td><a href='informacionEmpleado.php?doc=" . $listaUsuarios[$i]->getId_usuario() . "'><i class='far fa-folder'></i> Más información </a></td>";
                    
        
            }
        }else{
            $lista .= "<td colspan='5' class='text-center'>Cantidad de resgistros no valida</td>"; 
        }
    
    }

    $lista .= "</tbody>"
    . "</table>"
    . "<div class='row'>"
        . "<div class='col d-flex justify-content-end'>"
            . "<div class='texto-claro'>Cantidad: " . count($listaUsuarios) . "</div>"
        ."</div>"
    ."</div>";

    echo $lista;

}else{

    
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
                    ."<td><a href='informacionEmpleado.php?doc=" . $listaUsuarios[$i]->getId_usuario() . "'><i class='far fa-folder'></i> Más información </a></td>";
                

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
                            ."<td><a href='informacionEmpleado.php?doc=" . $listaUsuarios[$i]->getId_usuario() . "'><i class='far fa-folder'></i> Más información </a></td>";
                            

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
                            ."<td><a href='informacionEmpleado.php?doc=" . $listaUsuarios[$i]->getId_usuario() . "'><i class='far fa-folder'></i> Más información </a></td>";

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

}








