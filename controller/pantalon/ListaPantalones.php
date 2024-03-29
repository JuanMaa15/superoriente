<?php

require_once ("../../models/DAO/PantalonDAO.php");
require_once ("../../models/DAO/UsuarioDAO.php");

$pantalondao = new PantalonDAO();

$listaPantalones = $pantalondao->listaPantalones();
$listaPantalonesId = $pantalondao->listaPantalonesId();
$validar_existencias = false;


if (isset($_POST['tipo_dotacion'])) {

    $cont = "<div class='row'>";

    $tipo_dotacion = $_POST['tipo_dotacion'];
    $id_usuario = $_POST['id_usuario'];

    $usuariodao = new UsuarioDAO();
    $usuariodto = $usuariodao->listaUsuarioConId($id_usuario);

    for ($i=0; $i < count($listaPantalones); $i++) { 
        
        if ($listaPantalones[$i]->getTipo_dotacion() == $tipo_dotacion && $listaPantalonesId[$i]->getGenero() == $usuariodto->getGenero()) {
            if ($listaPantalones[$i]->getCantidad() > 0) {
                $cont .= "<div class='col-6'>"
                        ."<div class='my-2'>"
                            . "<div class='form-check'>"
                                . "<input class='form-check-input input-agregar-dotacion' type='radio' value='" . $listaPantalones[$i]->getId_pantalon() . "' name='flexRadioDefault'>"
                                . "<input class='form-control d-none' type='text' value='" . $listaPantalones[$i]->getCantidad() . "'>"  
                            ."</div>"
                        ."</div>"
                        ."<div class='bloque-dotacion dotacion-agregada bg-light py-4 px-5'>"
                            ."<div class='col d-flex justify-content-center align-items-center'>"
                                ."<i class='fa-solid fa-table-columns'></i>"
                            ."</div>"
                            ."<div class='text-center'>"
                                ."<p>Pantalón: " . $listaPantalones[$i]->getNombre() . "</p>"
                                ."<p>Talla: " . $listaPantalones[$i]->getTalla() . "</p>"
                            ."</div>"
                        . "</div>"
                    . "</div>";

                $validar_existencias = true;
            }else{
                $cont .= "<div class='col-6'>"
                        ."<div class='my-2'>"
                            . "<div class='form-check'>"
                                . "<input class='form-check-input input-agregar-dotacion' type='radio' value='" . $listaPantalones[$i]->getId_pantalon() . "' name='flexRadioDefault' disabled>"
                                . "<input class='form-control d-none' type='text' value='" . $listaPantalones[$i]->getCantidad() . "'>"  
                            ."</div>"
                        ."</div>"
                        ."<div class='bloque-dotacion dotacion-agregada dotacion-agotada bg-light py-4 px-5'>"
                            ."<div class='col d-flex justify-content-center align-items-center'>"
                                ."<i class='fa-solid fa-table-columns'></i>"
                            ."</div>"
                            ."<div class='text-center'>"
                                ."<p>Pantalón: " . $listaPantalones[$i]->getNombre() . "</p>"
                                ."<p>Talla: " . $listaPantalones[$i]->getTalla() . "</p>"
                                ."<p class='text-danger texto-encima'>Agotado</p>"
                            ."</div>"
                        . "</div>"
                    . "</div>";

            }
            

        }
    }

    if (!$validar_existencias) {
        $cont .= "<div='col'>"
        ."<h4 class='text-center py-4'>No hay pantalones disponibles para este tipo de  dotación</h4>"
        ."</div>";
    }

    $cont .= "</div>";

    echo $cont;

}else{

    $lista = "<table class='table table-striped'>"
        . "<thead>"
            . "<tr>"
                . "<th scope='col'>Código pantalón</th>"
                . "<th scope='col'>Referencia</th>"
                . "<th scope='col'>Tipo de dotacion</th>"
                . "<th scope='col'>Talla</th>"
                . "<th scope='col'>Cantidad</th>"
                . "<th scope='col'>Genero</th>"
                . "<th scope='col'>Estado</th>"
                ."<th scope='col' colspan='5' class='text-center'>Opciones</th>"
            . "</tr>"
        . "</thead>"
        . "<tbody>";





if (isset($_POST['busqueda'])) {

   
    $busqueda = $_POST['busqueda'];
    $validar_existencias = false;

    $modo = $_POST['modo'];

            $lista = "<table class='table table-striped'>"
                . "<thead>"
                    . "<tr>"
                        . "<th scope='col'>Código pantalón</th>"
                        . "<th scope='col'>Referencia</th>"
                        . "<th scope='col'>Tipo de dotacion</th>"
                        . "<th scope='col'>Talla</th>"
                        . "<th scope='col'>Cantidad</th>"
                        . "<th scope='col'>Genero</th>"
                        . "<th scope='col'>Estado</th>";

            if ($modo != "registrar") {
                $lista .= "<th scope='col' colspan='5' class='text-center'>Opciones</th>";
            }
                    
            $lista .= "</tr>"
                . "</thead>"
                . "<tbody>";
    

    if (empty($busqueda)) {

        for ($i=0; $i < count($listaPantalones); $i++) { 

            if ($listaPantalones[$i]->getEstado() == 1) {
                $estado = "Disponible";
        
            }else{
                $estado = "Agotado";
            }
        
            $lista .= "<tr>"
                       . "<td>" . $listaPantalones[$i]->getId_pantalon() .  "</td>"
                       . "<td>" . $listaPantalones[$i]->getNombre() .  "</td>"
                       . "<td>" . $listaPantalones[$i]->getTipo_dotacion() .  "</td>"
                       . "<td>" . $listaPantalones[$i]->getTalla() .  "</td>"
                       . "<td>" . $listaPantalones[$i]->getCantidad() .  "</td>"
                       . "<td>" . $listaPantalones[$i]->getGenero() .  "</td>"
                       . "<td>" . $estado .  "</td>";
                       switch ($modo) {
                        case 'registrar':
                            
                        break;
                        case 'editar':
                            $lista .= "<td class='text-center'><button class='btn btn-verde' id='btn-editar-pantalon' type='button' value='" . $listaPantalones[$i]->getId_pantalon() . "' data-bs-toggle='modal' data-bs-target='#editar-pantalones'>Editar</button></td>";
    
                        break;
                        case 'asignar':
                            $lista .= "<td class='text-center'><button class='btn btn-verde' id='btn-asignar-pantalon' type='button' value='" . $listaPantalones[$i]->getId_pantalon() . "' data-bs-toggle='modal' data-bs-target='#asignar-pantalones'>Asignar</button></td>"
                            . "<td class='text-center'><button class='btn btn-verde' id='btn-asignar-especial-pantalon' type='button' value='" . $listaPantalones[$i]->getId_pantalon() . "' data-bs-toggle='modal' data-bs-target='#asignar-pantalones'>Asignar</button></td>";
    
                        break;
                
                    }
        
                    $lista .= "</tr>"; 
        }

    }else{

        for ($i=0; $i < count($listaPantalones); $i++) { 

            if (str_contains($listaPantalones[$i]->getId_pantalon(), $busqueda) || str_contains($listaPantalones[$i]->getNombre(), $busqueda) || str_contains($listaPantalones[$i]->getTipo_dotacion(), $busqueda)){

                if ($listaPantalones[$i]->getEstado() == 1) {
                    $estado = "Disponible";
            
                }else{
                    $estado = "Agotado";
                }
            
                $lista .= "<tr>"
                        . "<td>" . $listaPantalones[$i]->getId_pantalon() .  "</td>"
                        . "<td>" . $listaPantalones[$i]->getNombre() .  "</td>"
                        . "<td>" . $listaPantalones[$i]->getTipo_dotacion() .  "</td>"
                        . "<td>" . $listaPantalones[$i]->getTalla() .  "</td>"
                        . "<td>" . $listaPantalones[$i]->getCantidad() .  "</td>"
                        . "<td>" . $listaPantalones[$i]->getGenero() .  "</td>"
                        . "<td>" . $estado .  "</td>";
                        switch ($modo) {
                            case 'registrar':
                                
                            break;
                            case 'editar':
                                $lista .= "<td class='text-center'><button class='btn btn-verde' id='btn-editar-pantalon' type='button' value='" . $listaPantalones[$i]->getId_pantalon() . "' data-bs-toggle='modal' data-bs-target='#editar-pantalones'>Editar</button></td>";
        
                            break;
                            case 'asignar':
                                $lista .= "<td class='text-center'><button class='btn btn-verde' id='btn-asignar-pantalon' type='button' value='" . $listaPantalones[$i]->getId_pantalon() . "' data-bs-toggle='modal' data-bs-target='#asignar-pantalones'>Asignar</button></td>"
                                . "<td class='text-center'><button class='btn btn-verde' id='btn-asignar-especial-pantalon' type='button' value='" . $listaPantalones[$i]->getId_pantalon() . "' data-bs-toggle='modal' data-bs-target='#asignar-pantalones'>Asignar</button></td>";
        
                            break;
                    
                        }
            
                        $lista .= "</tr>";

                $validar_existencias = true;

            }
        }

        if (!$validar_existencias) {
            $lista .= "<tr>"
            ."<td colspan='7' class='text-center py-4'>No se encontraron pantalones con esos datos</td>"
            ."</tr>";
        }

        

    }
    

        }else if(isset($_POST['opc']) && isset($_POST['id'])){
            $id = intval($_POST['id']);
            $validar_existencias = false;

            switch($_POST['opc']) {
                case "dotacion":
                    
                    for ($i=0; $i < count($listaPantalonesId); $i++) { 

                        if ($listaPantalonesId[$i]->getTipo_dotacion() == $id){

                            if ($listaPantalonesId[$i]->getEstado() == 1) {
                                $estado = "Disponible";
                    
                            }else{
                                $estado = "Agotada";
                            }
                    
                            $lista .= "<tr>"
                                    . "<td>" . $listaPantalones[$i]->getId_pantalon() .  "</td>"
                                    . "<td>" . $listaPantalones[$i]->getNombre() .  "</td>"
                                    . "<td>" . $listaPantalones[$i]->getTipo_dotacion() .  "</td>"
                                    . "<td>" . $listaPantalones[$i]->getTalla() .  "</td>"
                                    . "<td>" . $listaPantalones[$i]->getCantidad() .  "</td>"
                                    . "<td>" . $listaPantalones[$i]->getGenero() .  "</td>"
                                    . "<td>" . $estado .  "</td>"
                                    . "<td class='text-center'><button class='btn btn-verde' id='btn-editar-pantalon' type='button' value='" . $listaPantalonesId[$i]->getId_pantalon() . "' data-bs-toggle='modal' data-bs-target='#editar-pantalones'>Editar</button></td>"
                                    . "<td class='text-center'><button class='btn btn-verde' id='btn-asignar-pantalon' type='button' value='" . $listaPantalones[$i]->getId_pantalon() . "' data-bs-toggle='modal' data-bs-target='#asignar-pantalones'>Asignar</button></td>"
                
                                    ."</tr>"; 

                            $validar_existencias = true;
                
                        }
                    } 

                break;
                case "estado":
                    for ($i=0; $i < count($listaPantalonesId); $i++) { 

                        if ($listaPantalonesId[$i]->getEstado() == $id){

                            if ($listaPantalones[$i]->getEstado() == 1) {
                                $estado = "Disponible";
                    
                            }else{
                                $estado = "Agotada";
                            }
                    
                            $lista .= "<tr>"
                                    . "<td>" . $listaPantalones[$i]->getId_pantalon() .  "</td>"
                                    . "<td>" . $listaPantalones[$i]->getNombre() .  "</td>"
                                    . "<td>" . $listaPantalones[$i]->getTipo_dotacion() .  "</td>"
                                    . "<td>" . $listaPantalones[$i]->getTalla() .  "</td>"
                                    . "<td>" . $listaPantalones[$i]->getCantidad() .  "</td>"
                                    . "<td>" . $listaPantalones[$i]->getGenero() .  "</td>"
                                    . "<td>" . $estado .  "</td>"
                                    . "<td class='text-center'><button class='btn btn-verde' id='btn-editar-pantalon' type='button' value='" . $listaPantalonesId[$i]->getId_pantalon() . "' data-bs-toggle='modal' data-bs-target='#editar-pantalones'>Editar</button></td>"
                                    . "<td class='text-center'><button class='btn btn-verde' id='btn-asignar-pantalon' type='button' value='" . $listaPantalones[$i]->getId_pantalon() . "' data-bs-toggle='modal' data-bs-target='#asignar-pantalones'>Asignación especial</button></td>"

                                    ."</tr>"; 

                            $validar_existencias = true;
        
                        }
                    
                    } 
                    
                break;
                
            }

            if (!$validar_existencias) {
                $lista .= "<tr>"
                ."<td colspan='7' class='text-center py-4'>No se encontraron pantalones con ese filtro</td>"
                ."</tr>";

            }
        }else{

            $modo = $_POST['modo'];

            $lista = "<table class='table table-striped'>"
                . "<thead>"
                    . "<tr>"
                        . "<th scope='col'>Código pantalón</th>"
                        . "<th scope='col'>Referencia</th>"
                        . "<th scope='col'>Tipo de dotacion</th>"
                        . "<th scope='col'>Talla</th>"
                        . "<th scope='col'>Cantidad</th>"
                        . "<th scope='col'>Genero</th>"
                        . "<th scope='col'>Estado</th>";

            if ($modo != "registrar") {
                $lista .= "<th scope='col' colspan='5' class='text-center'>Opciones</th>";
            }
                    
            $lista .= "</tr>"
                . "</thead>"
                . "<tbody>";

            for ($i=0; $i < count($listaPantalones); $i++) { 

                if ($listaPantalones[$i]->getEstado() == 1) {
                    $estado = "Disponible";
            
                }else{
                    $estado = "Agotado";
                }
            
                $lista .= "<tr>"
                        . "<td>" . $listaPantalones[$i]->getId_pantalon() .  "</td>"
                        . "<td>" . $listaPantalones[$i]->getNombre() .  "</td>"
                        . "<td>" . $listaPantalones[$i]->getTipo_dotacion() .  "</td>"
                        . "<td>" . $listaPantalones[$i]->getTalla() .  "</td>"
                        . "<td>" . $listaPantalones[$i]->getCantidad() .  "</td>"
                        . "<td>" . $listaPantalones[$i]->getGenero() .  "</td>"
                        . "<td>" . $estado .  "</td>";

                switch ($modo) {
                    case 'registrar':
                        
                    break;
                    case 'editar':
                        $lista .= "<td class='text-center'><button class='btn btn-verde' id='btn-editar-pantalon' type='button' value='" . $listaPantalones[$i]->getId_pantalon() . "' data-bs-toggle='modal' data-bs-target='#editar-pantalones'>Editar</button></td>";

                    break;
                    case 'asignar':
                        $lista .= "<td class='text-center'><button class='btn btn-verde' id='btn-asignar-pantalon' type='button' value='" . $listaPantalones[$i]->getId_pantalon() . "' data-bs-toggle='modal' data-bs-target='#asignar-pantalones'>Asignar</button></td>"
                        ."<td class='text-center'><button class='btn btn-verde' id='btn-asignar-especial-pantalon' type='button' value='" . $listaPantalones[$i]->getId_pantalon() . "' data-bs-toggle='modal' data-bs-target='#asignar-pantalones'>Asignación especial</button></td>";

                    break;
            
                }
    
                $lista .= "</tr>";

            }

            

        }





        $lista .= "</tbody>"
                    . "</table>";
                    
        echo $lista;

}


