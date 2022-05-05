<?php

require_once ("../../models/DAO/FamiliarDAO.php");

if (isset($_POST)) {
    $familiardao = new FamiliarDAO();
    $id = $_POST['id'];
    $opc = $_POST['opc'];

    $form = "<form>";
    
    switch ($opc) {
        case '1':
            $listaFamiliar = $familiardao->listaFamiliar($id);

            if (count($listaFamiliar) > 0) {
                $form .= "<div class='row my-3'>"
                    . "<h3 class='text-center'>Familiares <span class='fs-5'>(Personas con las que vive)</span></h3>"
                    . "</div>";
                for ($i=0; $i < count($listaFamiliar); $i++) { 
                    $form .= "<div class='familiar" . $i . " border-bottom py-3 cont-familiar-act'>"
                    ."<div class='row '>"
                    ."<div class='col my-2'>"
                    ."<label class='form-label'>Nro de documento</label>"
                    ."<input class='form-control' type='text' id='id_familiar_act" . $i . "' value='" . $listaFamiliar[$i]->getId_Familiar() . "' readonly>"
                    ."<small class='text-danger'></small>"
                    ."</div>"
                    ."<div class='col my-2'>"
                    ."<label class='form-label'>Nombre</label>"
                    ."<input class='form-control' type='text' id='nombre_familiar_act" . $i . "' value='" . $listaFamiliar[$i]->getNombre() . "'>"
                    ."<small class='text-danger'></small>"
                    ."</div>"
                    ."</div>"
                    ."<div class='row'>"
                    ."<div class='col my-2'>"
                    ."<label class='form-label'>Apellido</label>"
                    ."<input class='form-control' type='text' id='apellido_familiar_act" . $i . "' value='" . $listaFamiliar[$i]->getApellido() . "'>"
                    ."<small class='text-danger'></small>"
                    ."</div>"
                    ."<div class='col my-2'>"
                    ."<label class='form-label'>Edad</label>"
                    ."<input class='form-control' type='text' id='edad_familiar_act" . $i . "' value='" . $listaFamiliar[$i]->getEdad() . "'>"
                    ."<small class='text-danger'></small>"
                    ."</div>"
                    ."</div>"
                    ."<div class='row justify-content-center'>"
                    ."<div class='col my-2'>"
                    ."<label class='form-label'>Escolaridad</label>"
                    ."<input class='form-control' type='text' id='escolaridad_familiar_act" . $i . "' value='" . $listaFamiliar[$i]->getEscolaridad() . "'>"
                    ."<small class='text-danger'></small>"
                    ."</div>"
                    ."<div class='col my-2'>"
                    ."<label class='form-label'>Parentesco</label>"
                    ."<input class='form-control' type='text' id='parentesco_familiar_act" . $i . "' value='" . $listaFamiliar[$i]->getParentesco() . "'>"
                    ."<small class='text-danger'></small>"
                    ."</div>"
                    ."</div>"
                    ."</div>";
                }
            
            }else{
                $form .= "<div class='row '>"
                ."<div class='col my-2'>"
                ."<h3 class='text-center'>No hay familiares registrados</h3>"
                ."</div>"
                ."</div>";

            }
        break;
        
        case "2":
           $listaUnFamiliar = $familiardao->listaUnFamiliar($id);

           $form .= "<div class='my-2'>"
                    ."<label class='form-label'>Nro de documento</label>"
                    ."<input class='form-control' type='text' id='id_familiar_act' value='" . $listaUnFamiliar->getId_Familiar() . "' readonly>"
                    ."<small class='text-danger'></small>"
                    ."<div class='my-2'>"
                    ."<label class='form-label'>Nombre</label>"
                    ."<input class='form-control' type='text' id='nombre_familiar_act' value='" . $listaUnFamiliar->getNombre() . "'>"
                    ."<small class='text-danger'></small>"
                    ."</div>" 
                    ."<div class='my-2'>"
                    ."<label class='form-label'>Apellido</label>"
                    ."<input class='form-control' type='text' id='apellido_familiar_act' value='" . $listaUnFamiliar->getApellido() . "'>"
                    ."<small class='text-danger'></small>"
                    ."</div>"
                    ."<div class='my-2'>"
                    ."<label class='form-label'>Edad</label>"
                    ."<input class='form-control' type='text' id='edad_familiar_act' value='" . $listaUnFamiliar->getEdad() . "'>"
                    ."<small class='text-danger'></small>"
                    ."</div>"
                    ."<div class='my-2'>"
                    ."<label class='form-label'>Escolaridad</label>"
                    ."<input class='form-control' type='text' id='escolaridad_familiar_act' value='" . $listaUnFamiliar->getEscolaridad() . "'>"
                    ."<small class='text-danger'></small>"
                    ."</div>"
                    ."<div class=' my-2'>"
                    ."<label class='form-label'>Parentesco</label>"
                    ."<input class='form-control' type='text' id='parentesco_familiar_act' value='" . $listaUnFamiliar->getParentesco() . "'>"
                    ."<small class='text-danger'></small>"
                    ."</div>"
                    ."</div>";

        break;
    }
        
            
            $form .= "</form>";

    echo $form;  
}

      




