<?php

require_once('../../models/DAO/UsuarioDAO.php');
require_once('../../models/DAO/CamisaDAO.php');
require_once('../../models/DAO/PantalonDAO.php');
require_once('../../models/DAO/ZapatoDAO.php');
require_once('../../models/DAO/OtraVestimentaDAO.php');
require_once('../../models/DAO/GeneroDAO.php');

if (isset($_POST['id']) && isset($_POST['id_dotacion'])) {

    $id_usuario = $_POST['id'];
    $id_dotacion = intval($_POST['id_dotacion']);
    
    $usuariodao = new UsuarioDAO();
    $usuariodto = $usuariodao->listaUsuarioConId($id_usuario);
    $cont = "<div class='row'>";

    $generodao = new GeneroDAO();
    $listaGeneros = $generodao->listaGeneros();

    $genero = "";
    

    switch ($_POST['opc']) {
        case 'camisa':
            
            $camisadao = new CamisaDAO();
            $listaCamisas = $camisadao->listaCamisas();
            $listaCamisasId = $camisadao->listaCamisasId();
            for ($i=0; $i < count($listaCamisas); $i++) { 

                for ($j=0; $j < count($listaGeneros); $j++) { 
                    if ($listaGeneros[$j]->getNombre() == $listaCamisas[$i]->getGenero()) {
                        $genero = $listaGeneros[$j]->getId_genero();
                    }
                }

                
                if ($listaCamisasId[$i]->getTipo_dotacion() == $usuariodto->getTipo_dotacion() && $genero == $usuariodto->getGenero()) {
                    if ($listaCamisas[$i]->getId_camisa() == $usuariodto->getCamisa()) {

                        

                        $cont .= "<div class='col-6'>"
                            ."<div class='my-2'>"
                                . "<div class='form-check'>"
                                    . "<input class='form-check-input input-agregar-dotacion' type='radio' value='" . $listaCamisas[$i]->getId_camisa() . "' name='flexRadioDefault' checked>"
                                    . "<input class='form-control d-none' type='text' value='" . $listaCamisas[$i]->getCantidad() . "'>"  
                                ."</div>"
                            ."</div>"
                            ."<div class='bloque-dotacion dotacion-agregada bg-light py-4 px-5'>"
                                ."<div class='col d-flex justify-content-center align-items-center'>"
                                    ."<i class='fa-solid fa-shirt'></i>"
                                ."</div>"
                                ."<div class='text-center'>"
                                    ."<p>Camisa: " . $listaCamisas[$i]->getNombre() . "</p>"
                                    ."<p>Talla: " . $listaCamisas[$i]->getTalla() . "</p>"
                                ."</div>"
                            . "</div>"
                        . "</div>";
    
                    }else{
                        if ($listaCamisasId[$i]->getCantidad() > 0){
                            $cont .= "<div class='col-6'>"
                                ."<div class='my-2'>"
                                    . "<div class='form-check'>"
                                        . "<input class='form-check-input input-agregar-dotacion' type='radio' value='" . $listaCamisas[$i]->getId_camisa() . "' name='flexRadioDefault'>"
                                        . "<input class='form-control d-none' type='text' value='" . $listaCamisas[$i]->getCantidad() . "'>"  
                                    ."</div>"
                                ."</div>"
                                ."<div class='bloque-dotacion dotacion-agregada bg-light py-4 px-5'>"
                                    ."<div class='col d-flex justify-content-center align-items-center'>"
                                        ."<i class='fa-solid fa-shirt'></i>"
                                    ."</div>"
                                    ."<div class='text-center'>"
                                        ."<p>Camisa: " . $listaCamisas[$i]->getNombre() . "</p>"
                                        ."<p>Talla: " . $listaCamisas[$i]->getTalla() . "</p>"
                                    ."</div>"
                                . "</div>"
                            . "</div>";
                        }else{
                            $cont .= "<div class='col-6'>"
                            ."<div class='my-2'>"
                                . "<div class='form-check'>"
                                    . "<input class='form-check-input input-agregar-dotacion' type='radio' value='" . $listaCamisas[$i]->getId_camisa() . "' name='flexRadioDefault' disabled>"
                                    . "<input class='form-control d-none' type='text' value='" . $listaCamisas[$i]->getCantidad() . "'>"  
                                ."</div>"
                            ."</div>"
                            ."<div class='bloque-dotacion dotacion-agregada dotacion-agotada bg-light py-4 px-5'>"
                                ."<div class='col d-flex justify-content-center align-items-center'>"
                                    ."<i class='fa-solid fa-shirt'></i>"
                                ."</div>"
                                ."<div class='text-center'>"
                                    ."<p>Camisa: " . $listaCamisas[$i]->getNombre() . "</p>"
                                    ."<p>Talla: " . $listaCamisas[$i]->getTalla() . "</p>"
                                    ."<p class='texto-encima text-danger'>Agotada</p>"
                                ."</div>"
                            . "</div>"
                        . "</div>";
                        }

    
                    }
                }
                
            }

           
        break;

        case "pantalon":
            
            $pantalondao = new PantalonDAO();
            $listaPantalones = $pantalondao->listaPantalones();
            $listaPantalonesId = $pantalondao->listaPantalonesId();

            for ($i=0; $i < count($listaPantalones); $i++) { 

                for ($j=0; $j < count($listaGeneros); $j++) { 
                    if ($listaGeneros[$j]->getNombre() == $listaPantalones[$i]->getGenero()) {
                        $genero = $listaGeneros[$j]->getId_genero();
                    }
                }

                if ($listaPantalonesId[$i]->getTipo_dotacion() == $usuariodto->getTipo_dotacion() && $genero == $usuariodto->getGenero()) {
                    if ($listaPantalones[$i]->getId_pantalon() == $usuariodto->getPantalon()) {
                        
                        $cont .= "<div class='col-6'>"
                            ."<div class='my-2'>"
                                . "<div class='form-check'>"
                                    . "<input class='form-check-input input-agregar-dotacion' type='radio' value='" . $listaPantalones[$i]->getId_pantalon() . "' name='flexRadioDefault' checked>"
                                    . "<input class='form-control d-none' type='text' value='" . $listaPantalones[$i]->getCantidad() . "'>"  
                                ."</div>"
                            ."</div>"
                            ."<div class='bloque-dotacion dotacion-agregada bg-light py-4 px-5'>"
                                ."<div class='col d-flex justify-content-center align-items-center'>"
                                    ."<i class='fa-solid fa-table-columns'></i>"
                                ."</div>"
                                ."<div class='text-center'>"
                                    ."<p>Pantalón: " . $listaPantalones[$i]->getNombre() . "</p>"
                                    ."<p>Talla: " . $listaPantalones[$i]->getTalla() . "</p>"
                                ."</div>"
                            . "</div>"
                        . "</div>";
    
                    }else{
                        if ($listaPantalones[$i]->getCantidad() > 0) {
                            $cont .= "<div class='col-6'>"
                            ."<div class='my-2'>"
                                . "<div class='form-check'>"
                                    . "<input class='form-check-input input-agregar-dotacion' type='radio' value='" . $listaPantalones[$i]->getId_pantalon() . "' name='flexRadioDefault'>"
                                    . "<input class='form-control d-none' type='text' value='" . $listaPantalones[$i]->getCantidad() . "'>"  
                                ."</div>"
                            ."</div>"
                            ."<div class='bloque-dotacion dotacion-agregada bg-light py-4 px-5'>"
                                ."<div class='col d-flex justify-content-center align-items-center'>"
                                    ."<i class='fa-solid fa-table-columns'></i>"
                                ."</div>"
                                ."<div class='text-center'>"
                                    ."<p>Pantalón: " . $listaPantalones[$i]->getNombre() . "</p>"
                                    ."<p>Talla: " . $listaPantalones[$i]->getTalla() . "</p>"
                                ."</div>"
                            . "</div>"
                        . "</div>";
                        }else{
                            $cont .= "<div class='col-6'>"
                            ."<div class='my-2'>"
                                . "<div class='form-check'>"
                                    . "<input class='form-check-input input-agregar-dotacion ' type='radio' value='" . $listaPantalones[$i]->getId_pantalon() . "' name='flexRadioDefault' disabled>"
                                    . "<input class='form-control d-none' type='text' value='" . $listaPantalones[$i]->getCantidad() . "'>"  
                                ."</div>"
                            ."</div>"
                            ."<div class='bloque-dotacion dotacion-agregada dotacion-agotada bg-light py-4 px-5'>"
                                ."<div class='col d-flex justify-content-center align-items-center'>"
                                    ."<i class='fa-solid fa-table-columns'></i>"
                                ."</div>"
                                ."<div class='text-center'>"
                                    ."<p>Pantalón: " . $listaPantalones[$i]->getNombre() . "</p>"
                                    ."<p>Talla: " . $listaPantalones[$i]->getTalla() . "</p>"
                                    ."<p class='texto-encima text-danger'>Agotada</p>"
                                ."</div>"
                            . "</div>"
                        . "</div>";
                        }
                        
    
                    }
                }
                
            }

        break;
        case "zapato":
            $zapatodao = new ZapatoDAO();
            $listaZapatos = $zapatodao->listaZapatos();
            $listaZapatosId = $zapatodao->listaZapatosId();

            for ($i=0; $i < count($listaZapatos); $i++) { 
                if ($listaZapatosId[$i]->getTipo_dotacion() == $usuariodto->getTipo_dotacion()) {
                    if ($listaZapatos[$i]->getId_zapato() == $usuariodto->getZapato()) {

                        $cont .= "<div class='col-6'>"
                            ."<div class='my-2'>"
                                . "<div class='form-check'>"
                                    . "<input class='form-check-input input-agregar-dotacion' type='radio' value='" . $listaZapatos[$i]->getId_zapato() . "' name='flexRadioDefault' checked>"
                                    . "<input class='form-control d-none' type='text' value='" . $listaZapatos[$i]->getCantidad() . "'>"  
                                ."</div>"
                            ."</div>"
                            ."<div class='bloque-dotacion dotacion-agregada bg-light py-4 px-5'>"
                                ."<div class='col d-flex justify-content-center align-items-center'>"
                                    ."<i class='fa-solid fa-shoe-prints'></i>"
                                ."</div>"
                                ."<div class='text-center'>"
                                    ."<p>Zapato: " . $listaZapatos[$i]->getNombre() . "</p>"
                                    ."<p>Talla: " . $listaZapatos[$i]->getTalla() . "</p>"
                                ."</div>"
                            . "</div>"
                        . "</div>";
    
                    }else{
    
                        $cont .= "<div class='col-6'>"
                            ."<div class='my-2'>"
                                . "<div class='form-check'>"
                                    . "<input class='form-check-input input-agregar-dotacion' type='radio' value='" . $listaZapatos[$i]->getId_zapato() . "' name='flexRadioDefault'>"
                                    . "<input class='form-control d-none' type='text' value='" . $listaZapatos[$i]->getCantidad() . "'>"  
                                ."</div>"
                            ."</div>"
                            ."<div class='bloque-dotacion dotacion-agregada bg-light py-4 px-5'>"
                                ."<div class='col d-flex justify-content-center align-items-center'>"
                                    ."<i class='fa-solid fa-shoe-prints'></i>"
                                ."</div>"
                                ."<div class='text-center'>"
                                    ."<p>Pantalón: " . $listaZapatos[$i]->getNombre() . "</p>"
                                    ."<p>Talla: " . $listaZapatos[$i]->getTalla() . "</p>"
                                ."</div>"
                            . "</div>"
                        . "</div>";
    
                    }
                }
                
            }

        break;
        case "otros":

            $otraVestimentadao = new OtraVestimentaDAO();
            $listaVestimentas = $otraVestimentadao->listaVestimentas();
            $listaVestimentasId = $otraVestimentadao->listaVestimentasId();

            for ($i=0; $i < count($listaVestimentas); $i++) { 
                if ($listaVestimentasId[$i]->getTipo_dotacion() == $usuariodto->getVestimenta()) {
                    if ($listaVestimentas[$i]->getId_vestimenta() == $usuariodto->getVestimenta()) {

                        $cont .= "<div class='col-6'>"
                            ."<div class='my-2'>"
                                . "<div class='form-check'>"
                                    . "<input class='form-check-input input-agregar-dotacion' type='radio' value='" . $listaVestimentas[$i]->getId_vestimenta() . "' name='flexRadioDefault' checked>"
                                    . "<input class='form-control d-none' type='text' value='" . $listaVestimentas[$i]->getCantidad() . "'>"  
                                ."</div>"
                            ."</div>"
                            ."<div class='bloque-dotacion dotacion-agregada bg-light py-4 px-5'>"
                                ."<div class='col d-flex justify-content-center align-items-center'>"
                                    ."<i class='fa-solid fa-person-booth'></i>"
                                ."</div>"
                                ."<div class='text-center'>"
                                    ."<p>Ropa de trabajo: " . $listaVestimentas[$i]->getNombre() . "</p>"
                                ."</div>"
                            . "</div>"
                        . "</div>";
    
                    }else{
    
                        $cont .= "<div class='col-6'>"
                            ."<div class='my-2'>"
                                . "<div class='form-check'>"
                                    . "<input class='form-check-input input-agregar-dotacion' type='radio' value='" . $listaVestimentas[$i]->getId_vestimenta() . "' name='flexRadioDefault'>"
                                    . "<input class='form-control d-none' type='text' value='" . $listaVestimentas[$i]->getCantidad() . "'>"  
                                ."</div>"
                            ."</div>"
                            ."<div class='bloque-dotacion dotacion-agregada bg-light py-4 px-5'>"
                                ."<div class='col d-flex justify-content-center align-items-center'>"
                                    ."<i class='fa-solid fa-person-booth'></i>"
                                ."</div>"
                                ."<div class='text-center'>"
                                    ."<p>Otra ropa de trabajo: " . $listaVestimentas[$i]->getNombre() . "</p>"
    
                                ."</div>"
                            . "</div>"
                        . "</div>";
    
                    }
                }
                
            }
        break;
        
        default:
            # code...
            break;
    }

    $cont .= "</div>";

    echo $cont;

}else{
    echo "Error, está entrando a una sección de forma indebida";
}
