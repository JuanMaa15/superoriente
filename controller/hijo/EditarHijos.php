<?php

require_once ("../../models/DAO/HijoDAO.php");


$id_usuario = intval($_POST['id']);

$hijodao = new HijoDAO();

$listaHijo = $hijodao->listaHijo($id_usuario);

$form = "<form>";

        if (count($listaHijo) > 0) {
            $form .= "<div class='row my-3'>"
                . "<h3 class='text-center'>Hijos</h3>"
                . "</div>";
            for ($i=0; $i < count($listaHijo); $i++) { 
                $form .= "<div class='hijo" . $i . " border-bottom py-3 cont-hijo-act'>"
                ."<div class='row '>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Código hijo</label>"
                ."<input class='form-control' type='text' id='id_hijo_act" . $i . "' value='" . $listaHijo[$i]->getId_hijo() . "' readonly>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Nombre</label>"
                ."<input class='form-control' type='text' id='nombre_hijo_act" . $i . "' value='" . $listaHijo[$i]->getNombre() . "'>"
                ."</div>"
                ."</div>"
                ."<div class='row'>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Apellido</label>"
                ."<input class='form-control' type='text' id='apellido_hijo_act" . $i . "' value='" . $listaHijo[$i]->getApellido() . "'>"
                ."</div>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Edad</label>"
                ."<input class='form-control' type='text' id='edad_hijo_act" . $i . "' value='" . $listaHijo[$i]->getEdad() . "'>"
                ."</div>"
                ."</div>"
                ."<div class='row justify-content-center'>"
                ."<div class='col my-2'>"
                ."<label class='form-label'>Fecha de nacimiento</label>"
                ."<input class='form-control' type='text' id='fecha_nacimiento_hijo_act" . $i . "' value='" . $listaHijo[$i]->getFecha_nacimiento() . "'>"
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
        
        $form .= "</form>";

echo $form;        




