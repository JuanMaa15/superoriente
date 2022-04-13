<?php


require_once('../../models/DAO/CamisaDAO.php');

if(isset($_POST['id_tipo_dotacion'])) {

    $id_tipo_dotacion = intval($_POST['id_tipo_dotacion']);

    $camisadao = new CamisaDAO();

    $listaCamisas = $camisadao->listaCamisasId();
    $cont = "<div='row justify-content-center'>";

    for ($i=0; $i < count($listaCamisas); $i++) { 
        $validar = false;
        if ($listaCamisas[$i]->getTipo_dotacion() == $id_tipo_dotacion) {

            if ($listaCamisas[$i]->getTalla() != "XS" && !$validar) {
                $cont .= "<div class='form-check text-start'>"
                    ."<input type='checkbox'class='form-check-input checkbox-camisa' id='flexCheckDefault' value='XS'>"
                    ."<label class='form-check-label' for='flexCheckDefault'>XS</label>"
                ."</div>";
                $validar = true;
                
            }else if($listaCamisas[$i]->getTalla() != "S" && !$validar) {
                $cont .= "<div class='form-check text-start'>"
                ."<input type='checkbox'class='form-check-input checkbox-camisa' id='flexCheckDefault' value='S'>"
                ."<label class='form-check-label' for='flexCheckDefault'>S</label>"
            ."</div>";
            $validar = true;
            }else if($listaCamisas[$i]->getTalla() != "M" && !$validar) {
                $cont .= "<div class='form-check text-start'>"
                ."<input type='checkbox'class='f0orm-check-input checkbox-camisa' id='flexCheckDefault' value='M'>"
                ."<label class='form-check-label' for='flexCheckDefault'>M</label>"
            ."</div>";
            $validar = true;
            }else if($listaCamisas[$i]->getTalla() != "L" && !$validar) {
                $cont .= "<div class='form-check text-start'>"
                ."<input type='checkbox'class='form-check-input checkbox-camisa' id='flexCheckDefault' value='L'>"
                ."<label class='form-check-label' for='flexCheckDefault'>L</label>"
            ."</div>";
            $validar = true;
            }else if($listaCamisas[$i]->getTalla() != "XL" && !$validar) {
                $cont .= "<div class='form-check text-start'>"
                ."<input type='checkbox'class='form-check-input checkbox-camisa' id='flexCheckDefault' value='XL'>"
                ."<label class='form-check-label' for='flexCheckDefault'>XL</label>"
            ."</div>";
            $validar = true;
            }else if($listaCamisas[$i]->getTalla() != "XXL" && !$validar) {
                $cont .= "<div class='form-check text-start'>"
                ."<input type='checkbox'class='form-check-input checkbox-camisa' id='flexCheckDefault' value='XXL'>"
                ."<label class='form-check-label' for='flexCheckDefault'>XXL</label>"
            ."</div>";
            $validar = true;
            }
        }
    }

    echo $cont;

}else{
    echo "Error";
}