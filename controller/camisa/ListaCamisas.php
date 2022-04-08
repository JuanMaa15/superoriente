<?php

require_once ("../../models/DAO/CamisaDAO.php");

$camisadao = new CamisaDAO();

$listaCamisas = $camisadao->listaCamisas();
$listaCamisasId = $camisadao->listaCamisasId();



if (isset($_POST['tipo_dotacion'])) {

    $cont = "<div class='row'>";

    $tipo_dotacion = $_POST['tipo_dotacion'];

    for ($i=0; $i < count($listaCamisas); $i++) { 
        
        if ($listaCamisas[$i]->getTipo_dotacion() == $tipo_dotacion ) {
            $cont .= "<div class='col-6'>"
            . "<div class='my-2'>"
                . "<div class='form-check'>"
                ."<input class='form-check-input' type='radio' value='" . $listaCamisas[$i]->getId_camisa() . "' id='flexCheckChecked'>"  
                ."</div>"
            ."</div>"
            ."<div class='bloque-dotacion dotacion-agregada bg-light py-4 px-5'>"
             ."<div class='col d-flex justify-content-center align-items-center'>"
                ."<i class='fa-solid fa-shirt'></i>"
            ."</div>"
            ."<div class='text-center'>"
                ."<p>Camisa: " . $listaCamisas[$i]->getNombre() . "</p>"
                ."<p>Talla: " . $listaCamisas[$i]->getTalla() . "</p>"
             . "</div>"
        . "</div>";

        }
    }

    $cont .= "</div>";

    echo $cont;

}else{


    
    $lista = "<table class='table table-striped'>"
    . "<thead>"
        . "<tr>"
            . "<th scope='col'>Código camisa</th>"
            . "<th scope='col'>Camisa</th>"
            . "<th scope='col'>Tipo de dotacion</th>"
            . "<th scope='col'>Talla</th>"
            . "<th scope='col'>Cantidad</th>"
            . "<th scope='col'>Estado</th>"
            ."<th scope='col' colspan='2' class='text-center'>Opciones</th>"
        . "</tr>"
    . "</thead>"
    . "<tbody>";   

    if (isset($_POST['busqueda'])) {

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

                    . "<td>" . $estado .  "</td>"
                    . "<td class='text-center'><button class='btn btn-verde' id='btn-editar-camisa' type='button' value='" . $listaCamisas[$i]->getId_camisa() . "' data-bs-toggle='modal' data-bs-target='#editar-camisas'>Editar</button></td>"
                    . "<td class='text-center'><button class='btn btn-verde' id='btn-asignar-camisa' type='button' value='" . $listaCamisas[$i]->getId_camisa() . "' data-bs-toggle='modal' data-bs-target='#asignar-camisas'>Asignar</button></td>"
                    ."</tr>"; 

            }

        }else{

        for ($i=0; $i < count($listaCamisas); $i++) { 

            if (str_contains($listaCamisas[$i]->getId_camisa(), $busqueda) || str_contains($listaCamisas[$i]->getNombre(), $busqueda) || str_contains($listaCamisas[$i]->getTipo_dotacion(), $busqueda)){
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

                        . "<td>" . $estado .  "</td>"
                        . "<td class='text-center'><button class='btn btn-verde' id='btn-editar-camisa' type='button' value='" . $listaCamisas[$i]->getId_camisa() . "' data-bs-toggle='modal' data-bs-target='#editar-camisas'>Editar</button></td>"
                        . "<td class='text-center'><button class='btn btn-verde' id='btn-asignar-camisa' type='button' value='" . $listaCamisas[$i]->getId_camisa() . "' data-bs-toggle='modal' data-bs-target='#asignar-camisas'>Asignar</button></td>"
                        ."</tr>";
                        
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

                . "<td>" . $estado .  "</td>"
                . "<td class='text-center'><button class='btn btn-verde' id='btn-editar-camisa' type='button' value='" . $listaCamisas[$i]->getId_camisa() . "' data-bs-toggle='modal' data-bs-target='#editar-camisas'>Editar</button></td>"
                . "<td class='text-center'><button class='btn btn-verde' id='btn-asignar-camisa' type='button' value='" . $listaCamisas[$i]->getId_camisa() . "' data-bs-toggle='modal' data-bs-target='#asignar-camisas'>Asignar</button></td>"
                ."</tr>"; 
    }

}

        $lista .= "</tbody>"
            . "</table>";
            
        echo $lista;
    
}
