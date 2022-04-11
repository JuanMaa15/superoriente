<?php

require_once('../../models/DAO/UsuarioDAO.php');
require_once('../../models/DAO/CamisaDAO.php');
require_once('../../models/DAO/PantalonDAO.php');
require_once('../../models/DAO/ZapatoDAO.php');
require_once('../../models/DAO/OtraVestimentaDAO.php');

if (true) {

    $id_usuario = $_POST['id'];
    $id_dotacion = intval($_POST['id_dotacion']);
    
    $usuariodao = new UsuarioDAO();
    $usuariodto = $usuariodao->listaUsuarioConId($id_usuario);
    $cont = "<div class='row'>";

    switch ($_POST['opc']) {
        case 'camisa':
            
            $camisadao = new CamisaDAO();
            $listaCamisas = $camisadao->listaCamisas();

            for ($i=0; $i < count($listaCamisas); $i++) { 
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

                }
            }

           
        break;

        case "pantalon":
            
            $pantalondao = new PantalonDAO();
            $listaPantalones = $pantalondao->listaPantalones();

            for ($i=0; $i < count($listaPantalones); $i++) { 
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

                }
            }

        break;
        case "zapato":
            $zapatodao = new ZapatoDAO();
            $listaZapatos = $zapatodao->listaZapatos();

            for ($i=0; $i < count($listaZapatos); $i++) { 
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

        break;
        case "otros":

            $otraVestimentadao = new OtraVestimentaDAO();
            $listaVestimentas = $otraVestimentadao->listaVestimentas();

            for ($i=0; $i < count($listaVestimentas); $i++) { 
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
                                ."<p>Zapato: " . $listaVestimentas[$i]->getNombre() . "</p>"
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
        break;
        
        default:
            # code...
            break;
    }

    $cont .= "</div>";

    echo $cont;

}else{

}
