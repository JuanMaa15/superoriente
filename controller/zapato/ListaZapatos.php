<?php

require_once ("../../models/DAO/ZapatoDAO.php");

$zapatodao = new ZapatoDAO();

$listaZapatos = $zapatodao->listaZapatos();
$listaZapatosId = $zapatodao->listaZapatosId();

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
                       . "<td>" . $estado .  "</td>"
                       . "<td class='text-center'><button class='btn btn-verde' id='btn-editar-zapato' type='button' value='" . $listaZapatos[$i]->getId_zapato() . "' data-bs-toggle='modal' data-bs-target='#editar-zapatos'>Editar</button></td>"
                       . "<td class='text-center'><button class='btn btn-verde' id='btn-asignar-zapato' type='button' value='" . $listaZapatos[$i]->getId_zapato() . "' data-bs-toggle='modal' data-bs-target='#asignar-zapatos'>Asignar</button></td>"

                    ."</tr>"; 
    
        }

    }else{

        for ($i=0; $i < count($listaZapatos); $i++) { 

            if (str_contains($listaZapatos[$i]->getId_zapato(), $busqueda) || str_contains($listaZapatos[$i]->getNombre(), $busqueda) || str_contains($listaZapatos[$i]->getTipo_dotacion(), $busqueda)){


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
                        . "<td>" . $estado .  "</td>"
                        . "<td class='text-center'><button class='btn btn-verde' id='btn-editar-zapato' type='button' value='" . $listaZapatos[$i]->getId_zapato() . "' data-bs-toggle='modal' data-bs-target='#editar-zapatos'>Editar</button></td>"
                        . "<td class='text-center'><button class='btn btn-verde' id='btn-asignar-zapato' type='button' value='" . $listaZapatos[$i]->getId_zapato() . "' data-bs-toggle='modal' data-bs-target='#asignar-zapatos'>Asignar</button></td>"
          
                        ."</tr>"; 

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
    
                   . "<td>" . $estado .  "</td>"
                   . "<td class='text-center'><button class='btn btn-verde' id='btn-editar-zapato' type='button' value='" . $listaZapatos[$i]->getId_zapato() . "' data-bs-toggle='modal' data-bs-target='#editar-zapatos'>Editar</button></td>"
                   . "<td class='text-center'><button class='btn btn-verde' id='btn-asignar-zapato' type='button' value='" . $listaZapatos[$i]->getId_zapato() . "' data-bs-toggle='modal' data-bs-target='#asignar-zapatos'>Asignar</button></td>"
   
                ."</tr>"; 

    }

    

 }





$lista .= "</tbody>"
            . "</table>";
            
    echo $lista;