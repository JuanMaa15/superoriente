<?php

require_once ('../../models/DAO/UsuarioDAO.php');

if (isset($_POST['tabla'])) {

    $tabla = $_POST['tabla'];

    $usuariodao = new UsuarioDAO();

    

    $datos = "<form>";

    if ($tabla != "estrato") {

        $listadoTabla = $usuariodao->datosTabla($tabla);

        for ($i=0; $i < count($listadoTabla); $i++) { 
            $datos .= "<div class='form-check'>"
            . "<input class='form-check-input radio_" . $tabla . "' type='radio' name='flexRadioDefault' value='" . $listadoTabla[$i]->getId_campo() . "'>"
            . "<label class='form-check-label' for='flexRadioDefault1'>"
            . $listadoTabla[$i]->getNombre_campo()
            . "</label>"
          . "</div>";
        
        }
    }else{
        for ($i=1; $i <= 6; $i++) { 
            $datos .= "<div class='form-check'>"
            . "<input class='form-check-input' type='radio' name='flexRadioDefault' value='" . $i . "'>"
            . "<label class='form-check-label' for='flexRadioDefault1'>"
            . $i
            . "</label>"
          . "</div>";
        
        }
    }

    

    $datos .= "</form>";
    
    echo $datos;
}