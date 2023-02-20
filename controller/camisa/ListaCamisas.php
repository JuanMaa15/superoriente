<?php

require_once ("../../models/DAO/CamisaDAO.php");
require_once ("../../models/DAO/UsuarioDAO.php");


$camisadao = new CamisaDAO();

$listaCamisas = $camisadao->listaCamisas();
$listaCamisasId = $camisadao->listaCamisasId();



if (isset($_POST['tipo_dotacion'])) {

    $cont = "<div class='row'>";
    $validar_existencias = false;

    $tipo_dotacion = $_POST['tipo_dotacion'];
    $id_usuario = $_POST['id_usuario'];

    $usuariodao = new UsuarioDAO();
    $usuariodto = $usuariodao->listaUsuarioConId($id_usuario);

    for ($i=0; $i < count($listaCamisas); $i++) { 
        
        if ($listaCamisas[$i]->getTipo_dotacion() == $tipo_dotacion && $listaCamisasId[$i]->getGenero() == $usuariodto->getGenero()) {
            if ($listaCamisas[$i]->getCantidad() > 0) {
                $cont .= "<div class='col-6'>"
                        ."<div class='my-2'>"
                            . "<div class='form-check'>"
                                . "<input class='form-check-input input-agregar-dotacion' type='radio' value='" . $listaCamisas[$i]->getId_camisa() . "' name='flexRadioDefault'>"
                                . "<input class='form-control d-none' type='text' value='" . $listaCamisas[$i]->getCantidad() . "'>"  
                            ."</div>"
                        ."</div>"
                        ."<div class='bloque-dotacion dotacion-agregada bg-light py-4 px-5'>"
                            ."<div class='col d-flex justify-content-center align-items-center'>"
                                ."<i class='fa-solid fa-shirt'></i>"
                            ."</div>"
                            ."<div class='text-center'>"
                                ."<p>Camisa: " . $listaCamisas[$i]->getNombre() . "</p>"
                                ."<p>Talla: " . $listaCamisas[$i]->getTalla() . "</p>"
                            ."</div>"
                        . "</div>"
                    . "</div>";

                    $validar_existencias = true;
            } else{
                $cont .= "<div class='col-6'>"
                ."<div class='my-2'>"
                    . "<div class='form-check'>"
                        . "<input class='form-check-input input-agregar-dotacion' type='radio' value='" . $listaCamisas[$i]->getId_camisa() . "' name='flexRadioDefault' disabled>"
                        . "<input class='form-control d-none' type='text' value='" . $listaCamisas[$i]->getCantidad() . "'>"  
                    ."</div>"
                ."</div>"
                ."<div class='bloque-dotacion dotacion-agregada dotacion-agotada bg-light py-4 px-5'>"
                    ."<div class='col d-flex justify-content-center align-items-center'>"
                        ."<i class='fa-solid fa-shirt'></i>"
                    ."</div>"
                    ."<div class='text-center'>"
                        ."<p>Camisa: " . $listaCamisas[$i]->getNombre() . "</p>"
                        ."<p>Talla: " . $listaCamisas[$i]->getTalla() . "</p>"
                        ."<p class='text-danger texto-encima'>Agotada</p>"
                    ."</div>"
                . "</div>"
            . "</div>";
            }

        }
    }

    if (!$validar_existencias) {
        $cont .= "<div='col'>"
        ."<h4 class='text-center py-4'>No hay camisas disponibles para este tipo de dotación</h4>"
        ."</div>";
    }

    $cont .= "</div>"
            ."</div>";

    echo $cont;

}else{


    
    $lista = "<table class='table table-striped'>"
    . "<thead>"
        . "<tr>"
            . "<th scope='col'>Código camisa</th>"
            . "<th scope='col'>Referencia</th>"
            . "<th scope='col'>Tipo de dotacion</th>"
            . "<th scope='col'>Talla</th>"
            . "<th scope='col'>Cantidad</th>"
            . "<th scope='col'>Genero</th>"
            . "<th scope='col'>Estado</th>"
            ."<th scope='col' colspan='2' class='text-center'>Opciones</th>"
        . "</tr>"
    . "</thead>"
    . "<tbody>";   

    if (isset($_POST['busqueda'])) {

        
        $modo = $_POST['modo'];

        $lista = "<table class='table table-striped'>"
        . "<thead>"
            . "<tr>"
                . "<th scope='col'>Código camisa</th>"
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

        $busqueda = $_POST['busqueda'];
        $validar_existencias = false;



        if (empty($busqueda)) {

        for ($i=0; $i < count($listaCamisas); $i++) { 

            if ($listaCamisas[$i]->getEstado() == 1) {
                $estado = "Disponible";

            }else{
                $estado = "Agotada";
            }

            $lista .= "<tr>"
                    . "<td>" . $listaCamisas[$i]->getId_camisa() .  "</td>"
                    . "<td>" . $listaCamisas[$i]->getNombre() .  "</td>"
                    . "<td>" . $listaCamisas[$i]->getTipo_dotacion() .  "</td>"
                    . "<td>" . $listaCamisas[$i]->getTalla() .  "</td>"
                    . "<td>" . $listaCamisas[$i]->getCantidad() .  "</td>"
                    . "<td>" . $listaCamisas[$i]->getGenero() .  "</td>"
                    . "<td>" . $estado .  "</td>";

            switch ($modo) {
                case 'registrar':
                    
                break;
                case 'editar':
                    $lista .= "<td class='text-center'><button class='btn btn-verde' id='btn-editar-camisa' type='button' value='" . $listaCamisas[$i]->getId_camisa() . "' data-bs-toggle='modal' data-bs-target='#editar-camisas'>Editar</button></td>";

                break;
                case 'asignar':
                    $lista .= "<td class='text-center'><button class='btn btn-verde' id='btn-asignar-camisa' type='button' value='" . $listaCamisas[$i]->getId_camisa() . "' data-bs-toggle='modal' data-bs-target='#asignar-camisas'>Asignar</button></td>"
                    . "<td class='text-center'><button class='btn btn-verde' id='btn-asignar-especial-camisa' type='button' value='" . $listaCamisas[$i]->getId_camisa() . "' data-bs-toggle='modal' data-bs-target='#asignar-camisas'>Asignacion especial</button></td>";

                break;
                
                    
             $lista .= "</tr>"; 

            }

        }

        }else{

        for ($i=0; $i < count($listaCamisas); $i++) { 

            if (str_contains($listaCamisas[$i]->getId_camisa(), $busqueda) || str_contains($listaCamisas[$i]->getNombre(), $busqueda) || str_contains($listaCamisas[$i]->getTipo_dotacion(), $busqueda) || str_contains($listaCamisas[$i]->getTalla(), $busqueda)){
                if ($listaCamisas[$i]->getEstado() == 1) {
                    $estado = "Disponible";

                }else{
                    $estado = "Agotada";
                }

                $lista .= "<tr>"
                        . "<td>" . $listaCamisas[$i]->getId_camisa() .  "</td>"
                        . "<td>" . $listaCamisas[$i]->getNombre() .  "</td>"
                        . "<td>" . $listaCamisas[$i]->getTipo_dotacion() .  "</td>"
                        . "<td>" . $listaCamisas[$i]->getTalla() .  "</td>"
                        . "<td>" . $listaCamisas[$i]->getCantidad() .  "</td>"
                        . "<td>" . $listaCamisas[$i]->getGenero() .  "</td>"
                        . "<td>" . $estado .  "</td>";
                        
                switch ($modo) {
                    case 'registrar':
                        
                    break;
                    case 'editar':
                        $lista .= "<td class='text-center'><button class='btn btn-verde' id='btn-editar-camisa' type='button' value='" . $listaCamisas[$i]->getId_camisa() . "' data-bs-toggle='modal' data-bs-target='#editar-camisas'>Editar</button></td>";
    
                    break;
                    case 'asignar':
                        $lista .= "<td class='text-center'><button class='btn btn-verde' id='btn-asignar-camisa' type='button' value='" . $listaCamisas[$i]->getId_camisa() . "' data-bs-toggle='modal' data-bs-target='#asignar-camisas'>Asignar</button></td>"
                        . "<td class='text-center'><button class='btn btn-verde' id='btn-asignar-especial-camisa' type='button' value='" . $listaCamisas[$i]->getId_camisa() . "' data-bs-toggle='modal' data-bs-target='#asignar-camisas'>Asignacion especial</button></td>";
    
                    break;
                    
                        
                    $lista .= "</tr>"; 
    
                }
                        
                $validar_existencias = true;
            }    
        

        }

            if (!$validar_existencias) {
                $lista .= "<tr>"
                ."<td colspan='7' class='text-center py-4'>No se encontraron camisas con esos datos</td>"
                ."</tr>";
            }

        }    

    }else if(isset($_POST['opc']) && isset($_POST['id'])){
            $id = intval($_POST['id']);
            $validar_existencias = false;

            switch($_POST['opc']) {
            case "dotacion":
                
                for ($i=0; $i < count($listaCamisas); $i++) { 

                    if ($listaCamisasId[$i]->getTipo_dotacion() == $id){

                        if ($listaCamisas[$i]->getEstado() == 1) {
                            $estado = "Disponible";
                
                        }else{
                            $estado = "Agotada";
                        }
                
                        $lista .= "<tr>"
                                . "<td>" . $listaCamisas[$i]->getId_camisa() .  "</td>"
                                . "<td>" . $listaCamisas[$i]->getNombre() .  "</td>"
                                . "<td>" . $listaCamisas[$i]->getTipo_dotacion() .  "</td>"
                                . "<td>" . $listaCamisas[$i]->getTalla() .  "</td>"
                                . "<td>" . $listaCamisas[$i]->getCantidad() .  "</td>"
                                . "<td>" . $listaCamisas[$i]->getGenero() .  "</td>"
                                . "<td>" . $estado .  "</td>"
                                . "<td class='text-center'><button class='btn btn-verde' id='btn-editar-camisa' type='button' value='" . $listaCamisas[$i]->getId_camisa() . "' data-bs-toggle='modal' data-bs-target='#editar-camisas'>Editar</button></td>"
                                . "<td class='text-center'><button class='btn btn-verde' id='btn-asignar-camisa' type='button' value='" . $listaCamisas[$i]->getId_camisa() . "' data-bs-toggle='modal' data-bs-target='#asignar-camisas'>Asignar</button></td>"
                                ."</tr>"; 

                        $validar_existencias = true;

                    }
                } 

            break;
                case "estado":
                    for ($i=0; $i < count($listaCamisas); $i++) { 

                        if ($listaCamisasId[$i]->getEstado() == $id){

                            if ($listaCamisas[$i]->getEstado() == 1) {
                                $estado = "Disponible";
                    
                            }else{
                                $estado = "Agotada";
                            }
                    
                            $lista .= "<tr>"
                                    . "<td>" . $listaCamisas[$i]->getId_camisa() .  "</td>"
                                    . "<td>" . $listaCamisas[$i]->getNombre() .  "</td>"
                                    . "<td>" . $listaCamisas[$i]->getTipo_dotacion() .  "</td>"
                                    . "<td>" . $listaCamisas[$i]->getTalla() .  "</td>"
                                    . "<td>" . $listaCamisas[$i]->getCantidad() .  "</td>"
                                    . "<td>" . $listaCamisas[$i]->getGenero() .  "</td>"
                                    . "<td>" . $estado .  "</td>"
                                    . "<td class='text-center'><button class='btn btn-verde' id='btn-editar-camisa' type='button' value='" . $listaCamisas[$i]->getId_camisa() . "' data-bs-toggle='modal' data-bs-target='#editar-camisas'>Editar</button></td>"
                                    . "<td class='text-center'><button class='btn btn-verde' id='btn-asignar-camisa' type='button' value='" . $listaCamisas[$i]->getId_camisa() . "' data-bs-toggle='modal' data-bs-target='#asignar-camisas'>Asignar</button></td>"
                                    ."</tr>"; 

                            $validar_existencias = true;

                        }
                    
                    } 
                    
                break;

            }

        if (!$validar_existencias) {
            $lista .= "<tr>"
            ."<td colspan='7' class='text-center py-4'>No se encontraron camisas con ese filtro</td>"
            ."</tr>";
        }

    }else{

        $modo = $_POST['modo'];

        $lista = "<table class='table table-striped'>"
                . "<thead>"
                    . "<tr>"
                        . "<th scope='col'>Código camisa</th>"
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

        for ($i=0; $i < count($listaCamisas); $i++) { 

                if ($listaCamisas[$i]->getEstado() == 1) {
                    $estado = "Disponible";

                }else{
                    $estado = "Agotada";
                }

            $lista .= "<tr>"
                    . "<td>" . $listaCamisas[$i]->getId_camisa() .  "</td>"
                    . "<td>" . $listaCamisas[$i]->getNombre() .  "</td>"
                    . "<td>" . $listaCamisas[$i]->getTipo_dotacion() .  "</td>"
                    . "<td>" . $listaCamisas[$i]->getTalla() .  "</td>"
                    . "<td>" . $listaCamisas[$i]->getCantidad() .  "</td>"
                    . "<td>" . $listaCamisas[$i]->getGenero() .  "</td>"
                    . "<td>" . $estado .  "</td>";

                    switch ($modo) {
                        case 'registrar':
                            
                        break;
                        case 'editar':
                            $lista .= "<td class='text-center'><button class='btn btn-verde' id='btn-editar-camisa' type='button' value='" . $listaCamisas[$i]->getId_camisa() . "' data-bs-toggle='modal' data-bs-target='#editar-camisas'>Editar</button></td>";

                        break;
                        case 'asignar':
                            $lista .= "<td class='text-center'><button class='btn btn-verde' id='btn-asignar-camisa' type='button' value='" . $listaCamisas[$i]->getId_camisa() . "' data-bs-toggle='modal' data-bs-target='#asignar-camisas'>Asignar</button></td>"
                            . "<td class='text-center'><button class='btn btn-verde' id='btn-asignar-especial-camisa' type='button' value='" . $listaCamisas[$i]->getId_camisa() . "' data-bs-toggle='modal' data-bs-target='#asignar-camisas'>Asignacion especial</button></td>";


                        break;
                
                    }

            $lista .= "</tr>"; 
        }

    }

        $lista .= "</tbody>"
            . "</table>";
            
        echo $lista;
    
}

