<?php

require_once ("../../models/DAO/FamiliarDAO.php");


$id_usuario = intval($_POST['id']);

$familiardao = new FamiliarDAO();

$listaFamiliar = $familiardao->listaFamiliar($id_usuario);

$form = "<form>";

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
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Nombre</label>"
                ."<input class='form-control' type='text' id='nombre_familiar_act" . $i . "' value='" . $listaFamiliar[$i]->getNombre() . "'>"
                ."</div>"
                ."</div>"
                ."<div class='row'>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Apellido</label>"
                ."<input class='form-control' type='text' id='apellido_familiar_act" . $i . "' value='" . $listaFamiliar[$i]->getApellido() . "'>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Edad</label>"
                ."<input class='form-control' type='text' id='edad_familiar_act" . $i . "' value='" . $listaFamiliar[$i]->getEdad() . "'>"
                ."</div>"
                ."</div>"
                ."<div class='row justify-content-center'>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Escolaridad</label>"
                ."<input class='form-control' type='text' id='escolaridad_familiar_act" . $i . "' value='" . $listaFamiliar[$i]->getEscolaridad() . "'>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Parentesco</label>"
                ."<input class='form-control' type='text' id='parentesco_familiar_act" . $i . "' value='" . $listaFamiliar[$i]->getParentesco() . "'>"
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
        
        $form .= "</form>";

echo $form;        




