<?php

require_once('../../models/DAO/ClaseRiesgoDAO.php');

if(isset($_POST['id'])) {

    $claseRiesgodao = new ClaseRiesgoDAO();

    $id = intval($_POST['id']);

    if (!empty($id)) {
        $claseRiesgodto = $claseRiesgodao->listaClaseRiesgo($id);
        echo $claseRiesgodto->getPorcentaje();
    }else{
        echo "";
    }

}else{
    echo "Error";
}