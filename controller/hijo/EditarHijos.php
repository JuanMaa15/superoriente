<?php

require_once ("../../models/DAO/HijoDAO.php");

if (isset($_POST)) {
    
    $id = intval($_POST['id']);
    $opc = $_POST['opc'];

    $hijodao = new HijoDAO();


    $form = "<form>";

    switch ($opc) {
        case "1":
            $listaHijo = $hijodao->listaHijo($id);

    
            if (count($listaHijo) > 0) {
                $form .= "<div class='row my-3'>"
                    . "<h3 class='text-center'>Hijos</h3>"
                    . "</div>";
                for ($i=0; $i < count($listaHijo); $i++) { 
                    $form .= "<div class='hijo" . $i . " border-bottom pb-1 pt-2 cont-hijo-act'>"
                    ."<div class='row justify-content-center d-none'>"
                    ."<div class='col'>"
                    ."<label class='form-label'>Código hijo</label>"
                    ."<input class='form-control' type='text' id='id_hijo_act" . $i . "' value='" . $listaHijo[$i]->getId_hijo() . "' readonly>"
                    ."<small class='text-danger'></small>"
                    ."</div>"
                    ."</div>"
                    ."<div class='row '>"    
                    ."<div class='col my-2'>"
                    ."<label class='form-label'>Nombre</label>"
                    ."<input class='form-control' type='text' id='nombre_hijo_act" . $i . "' value='" . $listaHijo[$i]->getNombre() . "'>"
                    ."<small class='text-danger'></small>"
                    ."</div>"
                    ."<div class='col my-2'>"
                    ."<label class='form-label'>Apellido</label>"
                    ."<input class='form-control' type='text' id='apellido_hijo_act" . $i . "' value='" . $listaHijo[$i]->getApellido() . "'>"
                    ."<small class='text-danger'></small>"
                    ."</div>"
                    ."</div>"
                    ."<div class='row'>"
                    ."<div class='col my-2'>"
                    ."<label class='form-label'>Fecha de nacimiento</label>"
                    ."<input class='form-control fecha_nacimiento' type='date' id='fecha_nacimiento_hijo" . $i . "' value='" . $listaHijo[$i]->getFecha_nacimiento() . "'>"
                    ."<small class='text-danger'></small>"
                    ."</div>"
                    ."<div class='col my-2'>"
                    ."<label class='form-label'>Edad</label>"
                    ."<input class='form-control' type='number' id='edad_hijo" . $i . "' value='" . $listaHijo[$i]->getEdad() . "' readonly>"
                    ."<small class='text-danger'></small>"
                    ."</div>"
                    ."</div>"
                    
                    ."</div>";
                }
            
            }else{
                $form .= "<div class='row '>"
                ."<div class='col my-2'>"
                ."<h3 class='text-center'>No hay hijos registrados</h3>"
                ."</div>"
                ."</div>";
    
            }
        break;
        
        case "2":

            $listaUnHijo = $hijodao->listaUnHijo($id);

            $form .= "<div class='my-2 d-none'>"
                    ."<label class='form-label'>Código hijo</label>"
                    ."<input class='form-control' type='text' id='id_hijo_act' value='" . $listaUnHijo->getId_hijo() . "' readonly>"
                    ."<small class='text-danger'></small>"
                    ."</div>"
                    ."<div class='my-2'>"
                    ."<label class='form-label'>Nombre</label>"
                    ."<input class='form-control' type='text' id='nombre_hijo_act' value='" . $listaUnHijo->getNombre() . "'>"
                    ."<small class='text-danger'></small>"
                    ."</div>" 
                    ."<div class=' my-2'>"
                    ."<label class='form-label'>Apellido</label>"
                    ."<input class='form-control' type='text' id='apellido_hijo_act' value='" . $listaUnHijo->getApellido() . "'>"
                    ."<small class='text-danger'></small>"
                    ."</div>"
                    ."<div class='my-2'>"
                    ."<label class='form-label'>Fecha de nacimiento</label>"
                    ."<input class='form-control' type='date' id='fecha_nacimiento_hijo_act' value='" . $listaUnHijo->getFecha_nacimiento() . "'>"
                    ."<small class='text-danger'></small>"
                    ."</div>"
                    ."<div class='my-2'>"
                    ."<label class='form-label'>Edad</label>"
                    ."<input class='form-control' type='text' id='edad_hijo_act' value='" . $listaUnHijo->getEdad() . "' readonly>"
                    ."<small class='text-danger'></small>"
                    ."</div>";
        break;
    }
 
        $form .= "</form>";

    echo $form;        

}




