<?php

require_once ("../../models/DAO/UsuarioDAO.php");
require_once ("../../models/DTO/UsuarioDTO.php");

$usuariodao = new UsuarioDAO();

if (isset($_POST['opc'])) {

    switch ($_POST['opc']) {
        case 'fecha':
            
                $fecha_inicio = $_POST['fecha_inicio'];
                $fecha_fin = $_POST['fecha_fin'];

                $listaUsuarios = $usuariodao->ListaFechaUsuario($fecha_inicio, $fecha_fin);

                $btnDescargar = "";

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

                if (count($listaUsuarios) > 0) {
                        
                    for ($i=0 ; $i < count($listaUsuarios); $i++) { 
                        
                        $lista .= "<tr>"
                                    
                                    ."<td>" . $listaUsuarios[$i]->getId_usuario() . "</td>"
                                    ."<td>" . $listaUsuarios[$i]->getNombre() . "</td>"
                                    ."<td>" . $listaUsuarios[$i]->getApellido() . "</td>"
                                    ."<td>" . $listaUsuarios[$i]->getFecha_ingreso() . "</td>"
                                    ."<td>" . $listaUsuarios[$i]->getFecha_retiro() . "</td>"
                                    ."</tr>";


                    }

                    
                    $btnDescargar = "<div class='row'>"
                                ."<div class='col'>"
                                ."<form method='POST' action='../../controller/reportes/ReporteIngresoUsuarios.php'>"
                                ."<input type='date' class='d-none' value='" . $fecha_inicio . "' name='fecha_inicio'>"
                                ."<input type='date' class='d-none' value='" . $fecha_fin . "' name='fecha_fin'>"
                                ."<button type='submit' class='btn btn-verde' name='btn-reporte-ingreso'>Descargar Reporte</button>"
                                ."</form>"
                                
                                . "</div>"
                                . "</div>";

                }else{

                    $lista .= "<tr>"
                        ."<td colspan='5' class='py-4 text-center'>No hay registros entre las fechas ingresadas</td>"
                        ."</tr>";

                }



                $lista .= "</tbody>"
                        . "</table>";



                echo $lista , $btnDescargar;

        break;
        case 'salario':
            
            $inicio_salario = floatval($_POST['inicio_salario']);
            $fin_salario = floatval($_POST['fin_salario']);

            $listaUsuarios = $usuariodao->ListaSalarioUsuario($inicio_salario, $fin_salario);

            $btnDescargar = "";

            $lista =  "<table class='table table-striped'>"
                        ."<thead>"
                        ."<tr>"
                            ."<th scope='col' class='pe-5'>Nro_documento</th>"
                            ."<th scope='col' class='pe-5'>Nombre</th>"
                            ."<th scope='col' class='pe-5'>Apellido</th>"
                            ."<th scope='col' class='pe-5'>Salario</th>"
                        ."</tr>"
                        ."</thead>"
                        ."<tbody>";

            if (count($listaUsuarios) > 0) {
                    
                for ($i=0 ; $i < count($listaUsuarios); $i++) { 
                    
                    $lista .= "<tr>"
                                
                                ."<td>" . $listaUsuarios[$i]->getId_usuario() . "</td>"
                                ."<td>" . $listaUsuarios[$i]->getNombre() . "</td>"
                                ."<td>" . $listaUsuarios[$i]->getApellido() . "</td>"
                                ."<td>" . $listaUsuarios[$i]->getSalario() . "</td>"
                                ."</tr>";


                }

                
                $btnDescargar = "<div class='row'>"
                            ."<div class='col'>"
                            ."<form method='POST' action='../../controller/reportes/ReporteSalarioUsuario.php'>"
                            ."<input type='text' class='d-none' value='" . $inicio_salario . "' name='inicio_salario'>"
                            ."<input type='text' class='d-none' value='" . $fin_salario . "' name='fin_salario'>"
                            ."<button type='submit' class='btn btn-verde' name='btn-reporte-salario'>Descargar Reporte</button>"
                            ."</form>"
                            
                            . "</div>"
                            . "</div>";

            }else{

                $lista .= "<tr>"
                    ."<td colspan='5' class='py-4 text-center'>No hay registros entre los datos ingresados</td>"
                    ."</tr>";

            }



            $lista .= "</tbody>"
                    . "</table>";



            echo $lista , $btnDescargar;

        break;

        case "opc_trabajo":
            
            $seleccionado = $_POST['seleccionado'];

            if ($seleccionado == "seccion") {

                $id_seccion = $_POST['seccion'];

                if (!empty($id_seccion) && preg_match('/[0-9]+/', $id_seccion)) {

                    $id_seccion = intval($id_seccion);
                    
                    $listaUsuarios = $usuariodao->ListaSeccionUsuario($id_seccion);

                    $btnDescargar = "";

                    $lista =  "<table class='table table-striped'>"
                                ."<thead>"
                                ."<tr>"
                                    ."<th scope='col' class='pe-5'>Nro_documento</th>"
                                    ."<th scope='col' class='pe-5'>Nombre</th>"
                                    ."<th scope='col' class='pe-5'>Apellido</th>"
                                    ."<th scope='col' class='pe-5'>Sección</th>"
                                ."</tr>"
                                ."</thead>"
                                ."<tbody>";

                    if (count($listaUsuarios) > 0) {
                            
                        for ($i=0 ; $i < count($listaUsuarios); $i++) { 
                            
                            $lista .= "<tr>"
                                        
                                        ."<td>" . $listaUsuarios[$i]->getId_usuario() . "</td>"
                                        ."<td>" . $listaUsuarios[$i]->getNombre() . "</td>"
                                        ."<td>" . $listaUsuarios[$i]->getApellido() . "</td>"
                                        ."<td>" . $listaUsuarios[$i]->getSeccion() . "</td>"
                                        ."</tr>";


                        }

                        
                        $btnDescargar = "<div class='row'>"
                                    ."<div class='col'>"
                                    ."<form method='POST' action='../../controller/reportes/ReporteOpcTrabajoUsuario.php'>"
                                    ."<input type='text' class='d-none' value='" . $id_seccion . "' name='opc_seccion'>"
                                    ."<input type='text' class='d-none' value='seccion' name='opc' readonly>"
                                    ."<button type='submit' class='btn btn-verde' name='btn-reporte-opcion-trabajo'>Descargar Reporte</button>"
                                    ."</form>"
                                    
                                    . "</div>"
                                    . "</div>";

                    }else{

                        $lista .= "<tr>"
                            ."<td colspan='5' class='py-4 text-center'>No hay registros entre los datos ingresados</td>"
                            ."</tr>";

                    }



                    $lista .= "</tbody>"
                            . "</table>";



                 echo $lista , $btnDescargar;

                }else{
                    echo "Datos incorrectos";
                }

            }else if ($seleccionado == "area"){

                $id_area = $_POST['area'];

                if (!empty($id_area) && preg_match('/[0-9]+/', $id_area)) {

                    $id_area = intval($id_area);
                    
                    $listaUsuarios = $usuariodao->ListaAreaUsuario($id_area);

                    $btnDescargar = "";

                    $lista =  "<table class='table table-striped'>"
                                ."<thead>"
                                ."<tr>"
                                    ."<th scope='col' class='pe-5'>Nro_documento</th>"
                                    ."<th scope='col' class='pe-5'>Nombre</th>"
                                    ."<th scope='col' class='pe-5'>Apellido</th>"
                                    ."<th scope='col' class='pe-5'>Area</th>"
                                ."</tr>"
                                ."</thead>"
                                ."<tbody>";

                    if (count($listaUsuarios) > 0) {
                            
                        for ($i=0 ; $i < count($listaUsuarios); $i++) { 
                            
                            $lista .= "<tr>"
                                        
                                        ."<td>" . $listaUsuarios[$i]->getId_usuario() . "</td>"
                                        ."<td>" . $listaUsuarios[$i]->getNombre() . "</td>"
                                        ."<td>" . $listaUsuarios[$i]->getApellido() . "</td>"
                                        ."<td>" . $listaUsuarios[$i]->getArea() . "</td>"
                                        ."</tr>";


                        }

                        
                        $btnDescargar = "<div class='row'>"
                                    ."<div class='col'>"
                                    ."<form method='POST' action='../../controller/reportes/ReporteOpcTrabajoUsuario.php'>"
                                    ."<input type='text' class='d-none' value='" . $id_area . "' name='opc_area'>"
                                    ."<input type='text' class='d-none' value='area' name='opc' readonly>"
                                    ."<button type='submit' class='btn btn-verde' name='btn-reporte-opcion-trabajo'>Descargar Reporte</button>"
                                    ."</form>"
                                    
                                    . "</div>"
                                    . "</div>";

                    }else{

                        $lista .= "<tr>"
                            ."<td colspan='5' class='py-4 text-center'>No hay registros entre los datos ingresados</td>"
                            ."</tr>";

                    }



                    $lista .= "</tbody>"
                            . "</table>";



                 echo $lista , $btnDescargar;

                }else{
                    echo "Datos incorrectos";
                }

            }else if ($seleccionado == "cargo") {

                $id_cargo = $_POST['cargo'];

                if (!empty($id_cargo) && preg_match('/[0-9]+/', $id_cargo)) {

                    $id_cargo = intval($id_cargo);
                    
                    $listaUsuarios = $usuariodao->ListaCargoUsuario($id_cargo);

                    $btnDescargar = "";

                    $lista =  "<table class='table table-striped'>"
                                ."<thead>"
                                ."<tr>"
                                    ."<th scope='col' class='pe-5'>Nro_documento</th>"
                                    ."<th scope='col' class='pe-5'>Nombre</th>"
                                    ."<th scope='col' class='pe-5'>Apellido</th>"
                                    ."<th scope='col' class='pe-5'>Cargo</th>"
                                ."</tr>"
                                ."</thead>"
                                ."<tbody>";

                    if (count($listaUsuarios) > 0) {
                            
                        for ($i=0 ; $i < count($listaUsuarios); $i++) { 
                            
                            $lista .= "<tr>"
                                        
                                        ."<td>" . $listaUsuarios[$i]->getId_usuario() . "</td>"
                                        ."<td>" . $listaUsuarios[$i]->getNombre() . "</td>"
                                        ."<td>" . $listaUsuarios[$i]->getApellido() . "</td>"
                                        ."<td>" . $listaUsuarios[$i]->getCargo() . "</td>"
                                        ."</tr>";


                        }

                        
                        $btnDescargar = "<div class='row'>"
                                    ."<div class='col'>"
                                    ."<form method='POST' action='../../controller/reportes/ReporteOpcTrabajoUsuario.php'>"
                                    ."<input type='text' class='d-none' value='" . $id_cargo . "' name='opc_cargo'>"
                                    ."<input type='text' class='d-none' value='cargo' name='opc' readonly>"
                                    ."<button type='submit' class='btn btn-verde' name='btn-reporte-opcion-trabajo'>Descargar Reporte</button>"
                                    ."</form>"
                                    
                                    . "</div>"
                                    . "</div>";

                    }else{

                        $lista .= "<tr>"
                            ."<td colspan='5' class='py-4 text-center'>No hay registros entre los datos ingresados</td>"
                            ."</tr>";

                    }



                    $lista .= "</tbody>"
                            . "</table>";



                 echo $lista , $btnDescargar;

                }else{
                    echo "Datos incorrectos";
                }
                
            }else{
                echo "La opción seleccionada no es correcta";
            }

        break;
        default:
            # code...
        break;
    }
}


?>