<?php

require_once ('../../models/DAO/UsuarioDAO.php');

if (isset($_POST['tabla'])) {

    $tabla = $_POST['tabla'];

    $usuariodao = new UsuarioDAO();

    

    $datos = "<form>";

    if ($tabla != "estrato" && $tabla != "salario" && $tabla != "fecha" && $tabla != "tbl_hijos") {

        $listadoTabla = $usuariodao->datosTabla($tabla);

        for ($i=0; $i < count($listadoTabla); $i++) { 
            $datos .= "<div class='form-check'>"
            . "<input class='form-check-input radio_listas radio_" . $tabla . "' type='radio' placeholder='" . $listadoTabla[$i]->getNombre_campo() . "' name='flexRadioDefault' value='" . $listadoTabla[$i]->getId_campo() . "'>"
            . "<label class='form-check-label' for='flexRadioDefault1'>"
            . $listadoTabla[$i]->getNombre_campo()
            . "</label>"
          . "</div>";
        
        }
    }else if($tabla == "estrato"){
        for ($i=1; $i <= 6; $i++) { 
            $datos .= "<div class='form-check'>"
            . "<input class='form-check-input radio_listas radio_estrato' type='radio' name='flexRadioDefault' value='" . $i . "'>"
            . "<label class='form-check-label' for='flexRadioDefault1'>"
            . $i
            . "</label>"
          . "</div>";
        
        }
    }else if($tabla == "salario") {
        $datos .= "<div class='pe-1 d-inline-block w-50'>"
        . "<input class='form-control input_salario1 radio_salario1 my-2' type='text' placeholder='Desde'>"
      . "</div>"
      ."<div class='pe-1 d-inline-block w-50'>"
      . "<input class='form-control input_salario2 radio_salario2 my-2' type='text' placeholder='Hasta'>"
    . "</div>";
    
    
    }else if($tabla == "tbl_hijos") {
      
    } 

    

    $datos .= "</form>";
    
    echo $datos;
}