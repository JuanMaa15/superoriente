<?php

require_once ("../../models/DAO/ZapatoDAO.php");

$zapatodao = new ZapatoDAO();

$listaZapatos = $zapatodao->listaZapatos();
$listaZapatosId = $zapatodao->listaZapatosId();


if (isset($_POST['tipo_dotacion'])) {

    $cont = "<div class='row'>";
    $validar_existencias = false;

    $tipo_dotacion = $_POST['tipo_dotacion'];

    for ($i=0; $i < count($listaZapatos); $i++) { 
        
        if ($listaZapatos[$i]->getTipo_dotacion() == $tipo_dotacion ) {
            if ($listaZapatos[$i]->getCantidad() > 0) {
                $cont .= "<div class='col-6'>"
                        ."<div class='my-2'>"
                            . "<div class='form-check'>"
                                . "<input class='form-check-input input-agregar-dotacion' type='radio' value='" . $listaZapatos[$i]->getId_zapato() . "' name='flexRadioDefault'>"
                                . "<input class='form-control d-none' type='text' value='" . $listaZapatos[$i]->getCantidad() . "'>"  
                            ."</div>"
                        ."</div>"
                        ."<div class='bloque-dotacion dotacion-agregada bg-light py-4 px-5'>"
                            ."<div class='col d-flex justify-content-center align-items-center'>"
                                ."<i class='fa-solid fa-shoe-prints'></i>"
                            ."</div>"
                            ."<div class='text-center'>"
                                ."<p>Zapatos: " . $listaZapatos[$i]->getNombre() . "</p>"
                                ."<p>Talla: " . $listaZapatos[$i]->getTalla() . "</p>"
                            ."</div>"
                        . "</div>"
                    . "</div>";

                $validar_existencias = true;
            }
        
        }
    }

    if (!$validar_existencias) {
        $cont .= "<div='col'>"
        ."<h4 class='text-center py-4'>No hay zapatos disponibles para este tipo de dotación</h4>"
        ."</div>";
    }

    $cont .= "</div>"
            ."</div>";

    echo $cont;

}else{

    $lista = "<table class='table table-striped'>"
        . "<thead>"
            . "<tr>"
                . "<th scope='col'>Código zapato</th>"
                . "<th scope='col'>Zapato</th>"
                . "<th scope='col'>Tipo de dotacion</th>"
                . "<th scope='col'>Talla</th>"
                . "<th scope='col'>Cantidad</th>"
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
                . "<th scope='col'>Código zapato</th>"
                . "<th scope='col'>Zapato</th>"
                . "<th scope='col'>Tipo de dotacion</th>"
                . "<th scope='col'>Talla</th>"
                . "<th scope='col'>Cantidad</th>"
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

            for ($i=0; $i < count($listaZapatos); $i++) { 

                if ($listaZapatos[$i]->getEstado() == 1) {
                    $estado = "Disponible";
            
                }else{
                    $estado = "Agotado";
                }
            
                $lista .= "<tr>"
                        . "<td>" . $listaZapatos[$i]->getId_zapato() .  "</td>"
                        . "<td>" . $listaZapatos[$i]->getNombre() .  "</td>"
                        . "<td>" . $listaZapatos[$i]->getTipo_dotacion() .  "</td>"
                        . "<td>" . $listaZapatos[$i]->getTalla() .  "</td>"
                        . "<td>" . $listaZapatos[$i]->getCantidad() .  "</td>"
                        . "<td>" . $estado .  "</td>";
                switch ($modo) {
                    case 'registrar':
                        
                    break;
                    case 'editar':
                        $lista .= "<td class='text-center'><button class='btn btn-verde' id='btn-editar-zapato' type='button' value='" . $listaZapatos[$i]->getId_zapato() . "' data-bs-toggle='modal' data-bs-target='#editar-zapatos'>Editar</button></td>";

                    break;
                    case 'asignar':
                        $lista .= "<td class='text-center'><button class='btn btn-verde' id='btn-asignar-zapato' type='button' value='" . $listaZapatos[$i]->getId_zapato() . "' data-bs-toggle='modal' data-bs-target='#asignar-zapatos'>Asignar</button></td>";

                    break;
            
                }
    
                    $lista .= "</tr>";  
        
            }

        }else{

            for ($i=0; $i < count($listaZapatos); $i++) { 

                if (str_contains($listaZapatos[$i]->getId_zapato(), $busqueda) || str_contains($listaZapatos[$i]->getNombre(), $busqueda) || str_contains($listaZapatos[$i]->getTipo_dotacion(), $busqueda) || str_contains($listaZapatos[$i]->getTalla(), $busqueda)){


                    if ($listaZapatos[$i]->getEstado() == 1) {
                        $estado = "Disponible";
                
                    }else{
                        $estado = "Agotado";
                    }
                
                    $lista .= "<tr>"
                            . "<td>" . $listaZapatos[$i]->getId_zapato() .  "</td>"
                            . "<td>" . $listaZapatos[$i]->getNombre() .  "</td>"
                            . "<td>" . $listaZapatos[$i]->getTipo_dotacion() .  "</td>"
                            . "<td>" . $listaZapatos[$i]->getTalla() .  "</td>"
                            . "<td>" . $listaZapatos[$i]->getCantidad() .  "</td>"
                            . "<td>" . $estado .  "</td>";
                            switch ($modo) {
                                case 'registrar':
                                    
                                break;
                                case 'editar':
                                    $lista .= "<td class='text-center'><button class='btn btn-verde' id='btn-editar-zapato' type='button' value='" . $listaZapatos[$i]->getId_zapato() . "' data-bs-toggle='modal' data-bs-target='#editar-zapatos'>Editar</button></td>";
            
                                break;
                                case 'asignar':
                                    $lista .= "<td class='text-center'><button class='btn btn-verde' id='btn-asignar-zapato' type='button' value='" . $listaZapatos[$i]->getId_zapato() . "' data-bs-toggle='modal' data-bs-target='#asignar-zapatos'>Asignar</button></td>";
            
                                break;
                        
                            }
                
                                $lista .= "</tr>";  

                    $validar_existencias = true;

                }

                
        
            }

            if (!$validar_existencias) {
                $lista .= "<tr>"
                ."<td colspan='7' class='text-center py-4'>No se encontraron zapatos con esos datos</td>"
                ."</tr>";
            }     

        }

        }else if(isset($_POST['opc']) && isset($_POST['id'])){
            $id = intval($_POST['id']);
            $validar_existencias = false;

            switch($_POST['opc']) {
                case "dotacion":
                    
                    for ($i=0; $i < count($listaZapatosId); $i++) { 

                        if ($listaZapatosId[$i]->getTipo_dotacion() == $id){

                            if ($listaZapatos[$i]->getEstado() == 1) {
                                $estado = "Disponible";
                    
                            }else{
                                $estado = "Agotada";
                            }
                    
                            $lista .= "<tr>"
                                    . "<td>" . $listaZapatos[$i]->getId_zapato() .  "</td>"
                                    . "<td>" . $listaZapatos[$i]->getNombre() .  "</td>"
                                    . "<td>" . $listaZapatos[$i]->getTipo_dotacion() .  "</td>"
                                    . "<td>" . $listaZapatos[$i]->getTalla() .  "</td>"
                                    . "<td>" . $listaZapatos[$i]->getCantidad() .  "</td>"
                                    . "<td>" . $estado .  "</td>"
                                    . "<td class='text-center'><button class='btn btn-verde' id='btn-editar-zapato' type='button' value='" . $listaZapatos[$i]->getId_zapato() . "' data-bs-toggle='modal' data-bs-target='#editar-zapatos'>Editar</button></td>"
                                    . "<td class='text-center'><button class='btn btn-verde' id='btn-asignar-zapato' type='button' value='" . $listaZapatos[$i]->getId_zapato() . "' data-bs-toggle='modal' data-bs-target='#asignar-zapatos'>Asignar</button></td>"
                
                                    ."</tr>"; 

                            $validar_existencias = true;
                
                        }
                    } 

                break;
                case "estado":
                    for ($i=0; $i < count($listaZapatosId); $i++) { 

                        if ($listaZapatosId[$i]->getEstado() == $id){

                            if ($listaZapatos[$i]->getEstado() == 1) {
                                $estado = "Disponible";
                    
                            }else{
                                $estado = "Agotada";
                            }
                    
                            $lista .= "<tr>"
                                    . "<td>" . $listaZapatos[$i]->getId_zapato() .  "</td>"
                                    . "<td>" . $listaZapatos[$i]->getNombre() .  "</td>"
                                    . "<td>" . $listaZapatos[$i]->getTipo_dotacion() .  "</td>"
                                    . "<td>" . $listaZapatos[$i]->getTalla() .  "</td>"
                                    . "<td>" . $listaZapatos[$i]->getCantidad() .  "</td>"
                                    
                    
                                    . "<td>" . $estado .  "</td>"
                                    . "<td class='text-center'><button class='btn btn-verde' id='btn-editar-zapato' type='button' value='" . $listaZapatos[$i]->getId_zapato() . "' data-bs-toggle='modal' data-bs-target='#editar-zapatos'>Editar</button></td>"
                                    . "<td class='text-center'><button class='btn btn-verde' id='btn-asignar-zapato' type='button' value='" . $listaZapatos[$i]->getId_zapato() . "' data-bs-toggle='modal' data-bs-target='#asignar-zapatos'>Asignar</button></td>"
                
                                    ."</tr>"; 

                            $validar_existencias = true;
        
                        }
                    
                    } 
                    
                break;
                
            }

            if (!$validar_existencias) {
                $lista .= "<tr>"
                ."<td colspan='7' class='text-center py-4'>No se encontraron zapatos con ese filtro</td>"
                ."</tr>";
            }
        }else{

            $modo = $_POST['modo'];

            $lista = "<table class='table table-striped'>"
                . "<thead>"
                    . "<tr>"
                        . "<th scope='col'>Código zapato</th>"
                        . "<th scope='col'>Referencia</th>"
                        . "<th scope='col'>Tipo de dotacion</th>"
                        . "<th scope='col'>Talla</th>"
                        . "<th scope='col'>Cantidad</th>"
                        . "<th scope='col'>Estado</th>";

            if ($modo != "registrar") {
                $lista .= "<th scope='col' colspan='5' class='text-center'>Opciones</th>";
            }
                    
            $lista .= "</tr>"
                . "</thead>"
                . "<tbody>";

            for ($i=0; $i < count($listaZapatos); $i++) { 

                if ($listaZapatos[$i]->getEstado() == 1) {
                    $estado = "Disponible";
            
                }else{
                    $estado = "Agotado";
                }
            
                $lista .= "<tr>"
                        . "<td>" . $listaZapatos[$i]->getId_zapato() .  "</td>"
                        . "<td>" . $listaZapatos[$i]->getNombre() .  "</td>"
                        . "<td>" . $listaZapatos[$i]->getTipo_dotacion() .  "</td>"
                        . "<td>" . $listaZapatos[$i]->getTalla() .  "</td>"
                        . "<td>" . $listaZapatos[$i]->getCantidad() .  "</td>"
            
                        . "<td>" . $estado .  "</td>";

                    switch ($modo) {
                        case 'registrar':
                            
                        break;
                        case 'editar':
                            $lista .= "<td class='text-center'><button class='btn btn-verde' id='btn-editar-zapato' type='button' value='" . $listaZapatos[$i]->getId_zapato() . "' data-bs-toggle='modal' data-bs-target='#editar-zapatos'>Editar</button></td>";
    
                        break;
                        case 'asignar':
                            $lista .= "<td class='text-center'><button class='btn btn-verde' id='btn-asignar-zapato' type='button' value='" . $listaZapatos[$i]->getId_zapato() . "' data-bs-toggle='modal' data-bs-target='#asignar-zapatos'>Asignar</button></td>";
    
                        break;
                
                    }
        
                        $lista .= "</tr>"; 

            }

            

        }





        $lista .= "</tbody>"
                    . "</table>";
                    
            echo $lista;

}

