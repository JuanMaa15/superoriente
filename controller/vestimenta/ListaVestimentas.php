<?php

require_once ("../../models/DAO/OtraVestimentaDAO.php");

$otraVestimentadao = new OtraVestimentaDAO();

$listaVestimentas = $otraVestimentadao->listaVestimentas();
$listaVestimentasId = $otraVestimentadao->listaVestimentasId();

if (isset($_POST['tipo_dotacion'])) {

    $validar_existencias = false;
    $cont = "<div class='row'>";

    $tipo_dotacion = $_POST['tipo_dotacion'];
    

    for ($i=0; $i < count($listaVestimentas); $i++) { 
        
        if ($listaVestimentas[$i]->getTipo_dotacion() == $tipo_dotacion ) {
            if ($listaVestimentas[$i]->getCantidad() > 0) {
                $cont .= "<div class='col-6'>"
                        ."<div class='my-2'>"
                            . "<div class='form-check'>"
                                . "<input class='form-check-input input-agregar-dotacion' type='radio' value='" . $listaVestimentas[$i]->getId_vestimenta() . "' name='flexRadioDefault'>"
                                . "<input class='form-control d-none' type='text' value='" . $listaVestimentas[$i]->getCantidad() . "'>"  
                            ."</div>"
                        ."</div>"
                        ."<div class='bloque-dotacion dotacion-agregada bg-light py-4 px-5'>"
                            ."<div class='col d-flex justify-content-center align-items-center'>"
                                ."<i class='fa-solid fa-person-booth'></i>"
                            ."</div>"
                            ."<div class='text-center'>"
                                ."<p>Ropa de trabajo: " . $listaVestimentas[$i]->getNombre() . "</p>"
                            ."</div>"
                        . "</div>"
                    . "</div>";

                $validar_existencias = true;
            }
            

        }
    }

    if (!$validar_existencias) {
        $cont .= "<div='col'>"
        ."<h4 class='text-center py-4'>No hay otras ropas de trabajo disponibles para este tipo de dotación</h4>"
        ."</div>";
    }

    $cont .= "</div>";

    echo $cont;

    

}else{

    
    $lista = "<table class='table table-striped'>"
            . "<thead>"
                . "<tr>"
                    . "<th scope='col'>Código vestimenta</th>"
                    . "<th scope='col'>Referencia</th>"
                    . "<th scope='col'>Tipo de dotacion</th>"
                    . "<th scope='col'>Cantidad</th>"
                    . "<th scope='col'>Estado</th>"
                    ."<th scope='col' class='text-center' colspan='2'>Opciones</th>"
                . "</tr>"
            . "</thead>"
            . "<tbody>";


    if (isset($_POST['busqueda'])) {

        $modo = $_POST['modo'];

        $lista = "<table class='table table-striped'>"
                . "<thead>"
                    . "<tr>"
                        . "<th scope='col'>Código otra vestimenta</th>"
                        . "<th scope='col'>Referencia</th>"
                        . "<th scope='col'>Tipo de dotacion</th>"
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

            for ($i=0; $i < count($listaVestimentas); $i++) { 

                if ($listaVestimentas[$i]->getEstado() == 1) {
                    $estado = "Disponible";
            
                }else{
                    $estado = "Agotada";
                }
            
                $lista .= "<tr>"
                        . "<td>" . $listaVestimentas[$i]->getId_vestimenta() .  "</td>"
                        . "<td>" . $listaVestimentas[$i]->getNombre() .  "</td>"
                        . "<td>" . $listaVestimentas[$i]->getTipo_dotacion() .  "</td>"
                        . "<td>" . $listaVestimentas[$i]->getCantidad() .  "</td>"
            
                        . "<td>" . $estado .  "</td>";
                        switch ($modo) {
                            case 'registrar':
                                
                            break;
                            case 'editar':
                                $lista .= "<td class='text-center'><button class='btn btn-verde' id='btn-editar-vestimenta' type='button' value='" . $listaVestimentas[$i]->getId_vestimenta() . "' data-bs-toggle='modal' data-bs-target='#editar-vestimentas'>Editar</button></td>";
            
                            break;
                            case 'asignar':
                                $lista .= "<td class='text-center'><button class='btn btn-verde' id='btn-asignar-vestimenta' type='button' value='" . $listaVestimentas[$i]->getId_vestimenta() . "' data-bs-toggle='modal' data-bs-target='#asignar-vestimentas'>Asignar</button></td>";
            
                            break;
                    
                        }
            
                
                    $lista .= "</tr>";
            }

        }else{


            for ($i=0; $i < count($listaVestimentas); $i++) { 

                if (str_contains($listaVestimentas[$i]->getId_vestimenta(), $busqueda) || str_contains($listaVestimentas[$i]->getNombre(), $busqueda) || str_contains($listaVestimentas[$i]->getTipo_dotacion(), $busqueda)){


                    if ($listaVestimentas[$i]->getEstado() == 1) {
                        $estado = "Disponible";
                
                    }else{
                        $estado = "Agotada";
                    }
                
                    $lista .= "<tr>"
                            . "<td>" . $listaVestimentas[$i]->getId_vestimenta() .  "</td>"
                            . "<td>" . $listaVestimentas[$i]->getNombre() .  "</td>"
                            . "<td>" . $listaVestimentas[$i]->getTipo_dotacion() .  "</td>"
                            . "<td>" . $listaVestimentas[$i]->getCantidad() .  "</td>"
                
                            . "<td>" . $estado .  "</td>";
                        switch ($modo) {
                            case 'registrar':
                                
                            break;
                            case 'editar':
                                $lista .= "<td class='text-center'><button class='btn btn-verde' id='btn-editar-vestimenta' type='button' value='" . $listaVestimentas[$i]->getId_vestimenta() . "' data-bs-toggle='modal' data-bs-target='#editar-vestimentas'>Editar</button></td>";
            
                            break;
                            case 'asignar':
                                $lista .= "<td class='text-center'><button class='btn btn-verde' id='btn-asignar-vestimenta' type='button' value='" . $listaVestimentas[$i]->getId_vestimenta() . "' data-bs-toggle='modal' data-bs-target='#asignar-vestimentas'>Asignar</button></td>";
            
                            break;
                    
                        }
            
                
                    $lista .= "</tr>"; 

                    $validar_existencias = true;

                }
            }

            if (!$validar_existencias) {
                $lista .= "<tr>"
                ."<td colspan='7' class='text-center py-4'>No se encontraron vestimentas con esos datos</td>"
                ."</tr>";
            }

            

        }

    }else if(isset($_POST['opc']) && isset($_POST['id'])){
        $id = intval($_POST['id']);
        $validar_existencias = false;

        switch($_POST['opc']) {
            case "dotacion":
                
                for ($i=0; $i < count($listaVestimentasId); $i++) { 

                    if ($listaVestimentasId[$i]->getTipo_dotacion() == $id){

                        if ($listaVestimentas[$i]->getEstado() == 1) {
                            $estado = "Disponible";
                
                        }else{
                            $estado = "Agotada";
                        }
                
                        $lista .= "<tr>"
                                . "<td>" . $listaVestimentas[$i]->getId_vestimenta() .  "</td>"
                                . "<td>" . $listaVestimentas[$i]->getNombre() .  "</td>"
                                . "<td>" . $listaVestimentas[$i]->getTipo_dotacion() .  "</td>"
                                . "<td>" . $listaVestimentas[$i]->getCantidad() .  "</td>"
                                
                
                                . "<td>" . $estado .  "</td>"
                                . "<td class='text-center'><button class='btn btn-verde' id='btn-editar-vestimenta' type='button' value='" . $listaVestimentas[$i]->getId_vestimenta() . "' data-bs-toggle='modal' data-bs-target='#editar-vestimentas'>Editar</button></td>"
                                . "<td class='text-center'><button class='btn btn-verde' id='btn-asignar-vestimenta' type='button' value='" . $listaVestimentas[$i]->getId_vestimenta() . "' data-bs-toggle='modal' data-bs-target='#asignar-vestimentas'>Asignar</button></td>"

                                ."</tr>"; 

                        $validar_existencias = true;
            
                    }
                } 

            break;
            case "estado":
                for ($i=0; $i < count($listaVestimentasId); $i++) { 

                    if ($listaVestimentasId[$i]->getEstado() == $id){

                        if ($listaVestimentas[$i]->getEstado() == 1) {
                            $estado = "Disponible";
                
                        }else{
                            $estado = "Agotada";
                        }
                
                        $lista .= "<tr>"
                                . "<td>" . $listaVestimentas[$i]->getId_vestimenta() .  "</td>"
                                . "<td>" . $listaVestimentas[$i]->getNombre() .  "</td>"
                                . "<td>" . $listaVestimentas[$i]->getTipo_dotacion() .  "</td>"
                                . "<td>" . $listaVestimentas[$i]->getCantidad() .  "</td>"
                                
                
                                . "<td>" . $estado .  "</td>"
                                . "<td class='text-center'><button class='btn btn-verde' id='btn-editar-vestimenta' type='button' value='" . $listaVestimentas[$i]->getId_vestimenta() . "' data-bs-toggle='modal' data-bs-target='#editar-vestimentas'>Editar</button></td>"
                                . "<td class='text-center'><button class='btn btn-verde' id='btn-asignar-vestimenta' type='button' value='" . $listaVestimentas[$i]->getId_vestimenta() . "' data-bs-toggle='modal' data-bs-target='#asignar-vestimentas'>Asignar</button></td>"

                                ."</tr>"; 

                        $validar_existencias = true;
    
                    }
                
                } 
                
            break;
            
        }

        if (!$validar_existencias) {
            $lista .= "<tr>"
            ."<td colspan='7' class='text-center py-4'>No se encontraron vestimentas con ese filtro</td>"
            ."</tr>";

        }

    }else{

        $modo = $_POST['modo'];

        $lista = "<table class='table table-striped'>"
                . "<thead>"
                    . "<tr>"
                        . "<th scope='col'>Código otra vestimenta</th>"
                        . "<th scope='col'>Referencia</th>"
                        . "<th scope='col'>Tipo de dotacion</th>"
                        . "<th scope='col'>Cantidad</th>"
                        . "<th scope='col'>Estado</th>";

            if ($modo != "registrar") {
                $lista .= "<th scope='col' colspan='5' class='text-center'>Opciones</th>";
            }
                    
            $lista .= "</tr>"
                . "</thead>"
                . "<tbody>";

        for ($i=0; $i < count($listaVestimentas); $i++) { 

            if ($listaVestimentas[$i]->getEstado() == 1) {
                $estado = "Disponible";
        
            }else{
                $estado = "Agotada";
            }
        
            $lista .= "<tr>"
                    . "<td>" . $listaVestimentas[$i]->getId_vestimenta() .  "</td>"
                    . "<td>" . $listaVestimentas[$i]->getNombre() .  "</td>"
                    . "<td>" . $listaVestimentas[$i]->getTipo_dotacion() .  "</td>"
                    . "<td>" . $listaVestimentas[$i]->getCantidad() .  "</td>"
        
                    . "<td>" . $estado .  "</td>";

            switch ($modo) {
                case 'registrar':
                    
                break;
                case 'editar':
                    $lista .= "<td class='text-center'><button class='btn btn-verde' id='btn-editar-vestimenta' type='button' value='" . $listaVestimentas[$i]->getId_vestimenta() . "' data-bs-toggle='modal' data-bs-target='#editar-vestimentas'>Editar</button></td>";

                break;
                case 'asignar':
                    $lista .= "<td class='text-center'><button class='btn btn-verde' id='btn-asignar-vestimenta' type='button' value='" . $listaVestimentas[$i]->getId_vestimenta() . "' data-bs-toggle='modal' data-bs-target='#asignar-vestimentas'>Asignar</button></td>";

                break;
        
            }

    
                    $lista .= "</tr>"; 
        }

        

    }




    $lista .= "</tbody>"
            . "</table>";
                
    echo $lista;
}
