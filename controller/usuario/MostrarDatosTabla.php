<?php

require_once ('../../models/DAO/UsuarioDAO.php');

if (isset($_POST['tabla'])) {

    $tabla = $_POST['tabla'];

    $usuariodao = new UsuarioDAO();

    if (str_contains($tabla, "tbl_")) {
      $campo = strlen($tabla);
      $campo = substr($tabla, 4, $campo);
    }    

    $datos = "<form>";


    if ($tabla != "estrato" && $tabla != "salario" && $tabla != "fecha" && $tabla != "tbl_hijo" && $tabla != "talla_camisa" && $tabla != "talla_pantalon" && $tabla != "talla_zapato") {

        $listadoTabla = $usuariodao->datosTabla($tabla, $campo);

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
        . "<input class='form-control input_salario radio_salario1 my-2' id='input_salario1' type='text' placeholder='Desde'>"
      . "</div>"
      ."<div class='pe-1 d-inline-block w-50'>"
      . "<input class='form-control input_salario radio_salario2 my-2' id='input_salario2' type='text' placeholder='Hasta'>"
    . "</div>";
    
    
    }else if($tabla == "fecha") {
      $datos .= "<div class='pe-1 d-inline-block w-50'>"
      . "<label class='form-label'>Inicio</label>"
        . "<input class='form-control input_fecha radio_fecha1 my-2' id='input_fecha1' type='date'>"
      . "</div>"
      ."<div class='pe-1 d-inline-block w-50'>"
      . "<label class='form-label'>Fin</label>"
      . "<input class='form-control input_fecha radio_fecha2 my-2' id='input_fecha2' type='date'>"
    . "</div>";
    }else if ($tabla == "tbl_hijo") {
      $datos .= "<div class='pe-1 d-flex justify-content-center'>"
        . "<input class='form-control input_hijo radio_tbl_hijo my-2 w-50' id='input_hijos'<' type='text' placeholder='Nro de hijos'>"
      . "</div>";
    }else if($tabla == "talla_camisa"){
     $datos .= "<div class='form-check'>"
              . "<input class='form-check-input radio_listas radio_talla_camisa' type='radio' name='flexRadioDefault' value='XS'>"
              . "<label class='form-check-label' for='flexRadioDefault1'>" 
              . "XS"
              . "</label>"
            . "</div>"
            ."<div class='form-check'>"
              . "<input class='form-check-input radio_listas radio_talla_camisa' type='radio' name='flexRadioDefault' value='S'>"
              . "<label class='form-check-label' for='flexRadioDefault1'>" 
              . "S"
              . "</label>"
            . "</div>"
            ."<div class='form-check'>"
              . "<input class='form-check-input radio_listas radio_talla_camisa' type='radio' name='flexRadioDefault' value='M'>"
              . "<label class='form-check-label' for='flexRadioDefault1'>" 
              . "M"
              . "</label>"
            . "</div>"
            ."<div class='form-check'>"
              . "<input class='form-check-input radio_listas radio_talla_camisa' type='radio' name='flexRadioDefault' value='L'>"
              . "<label class='form-check-label' for='flexRadioDefault1'>" 
              . "L"
              . "</label>"
            . "</div>"
            ."<div class='form-check'>"
              . "<input class='form-check-input radio_listas radio_talla_camisa' type='radio' name='flexRadioDefault' value='XL'>"
              . "<label class='form-check-label' for='flexRadioDefault1'>" 
              . "XL"
              . "</label>"
            . "</div>"
            ."<div class='form-check'>"
              . "<input class='form-check-input radio_listas radio_talla_camisa' type='radio' name='flexRadioDefault' value='XXL'>"
              . "<label class='form-check-label' for='flexRadioDefault1'>" 
              . "XXL"
              . "</label>"
            . "</div>";
    }else if($tabla == "talla_pantalon") {
      for ($i=28; $i < 45; $i++) { 
        if ($i % 2 == 0) {
          $datos .= "<div class='form-check'>"
              . "<input class='form-check-input radio_listas radio_talla_pantalon' type='radio' name='flexRadioDefault' value='" . $i . "'>"
              . "<label class='form-check-label' for='flexRadioDefault1'>" 
              . $i
              . "</label>"
            . "</div>";
        }
      }
    }else if ($tabla == "talla_zapato") {
      for ($i=34; $i < 43; $i++) { 
          $datos .= "<div class='form-check'>"
              . "<input class='form-check-input radio_listas radio_talla_zapato' type='radio' name='flexRadioDefault' value='" . $i . "'>"
              . "<label class='form-check-label' for='flexRadioDefault1'>" 
              . $i
              . "</label>"
            . "</div>";
      }
    }

    

    $datos .= "</form>";
    
    echo $datos;
}