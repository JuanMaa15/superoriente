<?php

require_once('../../models/DAO/CamisaDAO.php');
require_once('../../models/DAO/UsuarioDAO.php');

$usuariodao = new UsuarioDAO();
$listaUsuarios = $usuariodao->listaUsuarios();


if (isset($_POST['id'])) {

    $id_camisa = $_POST['id'];

    if (preg_match('/[0-9]+/',$id_camisa)) {

        $id_camisa = intval($id_camisa);

        $camisadao = new CamisaDAO();
        
        
        $camisadto = $camisadao->listaCamisa($id_camisa);

        $cont = "<div class='row my-2'>"
                    ."<div class='col-3'>"
                        ."<h5>Camisa: " . $camisadto->getNombre() .  " </h5>"
                    ."</div>"
                    ."<div class='col-2'>"
                        ."<h5>Talla: " . $camisadto->getTalla() .  " </h5>"
                    ."</div>"
                    ."<div class='col-2'>"
                        ."<h5>Disponibles: " . $camisadto->getCantidad()  .  " </h5>"
                    ."</div>"
                ."</div>"
                ."<div class='row my-2'>"
                . "<div class='col-4'>"
                ."<label class='texto-claro'>Camisas disponibles por asignar:</label>"
                ."<input type='text' class='form-control' value='" . $camisadto->getCantidad() . "' id='campo-cant' readonly>"
                ."<input type='text' class='d-none form-control' value='" . $camisadto->getCantidad() . "' id='campo-cant-fija' readonly>"
                ."</div>"
                ."</div>"
            ."<div class='row my-4'>";

                
            $validar_asignaciones = false;
            
            for ($i=0; $i < count($listaUsuarios); $i++){

                if ($listaUsuarios[$i]->getCamisa() == null) {

                    $validar_asignaciones = true;
                    if ($camisadto->getCantidad() > 1) {
                        $cont .= "<div class='col-4 cont-emple " . $listaUsuarios[$i]->getId_usuario(). " " . $listaUsuarios[$i]->getNombre() . " " . $listaUsuarios[$i]->getCargo() ."'>"
                            . "<div class='my-2'>"
                                .  "<div class='form-check'>"
                                ."<input class='form-check-input checkbox-empleados' type='checkbox' value='" . $listaUsuarios[$i]->getId_usuario() . "' id='flexCheckChecked'>"
                                    
                                ."</div>"
                            ."</div>"
                            ."<div class='card' style='width: 18rem;'>"
                                ."<img src='...' class='card-img-top card-img-profile' alt='...'>"
                                ."<div class='card-body'>"
                                    ."<h5 class='card-title titulo-campos'>" . $listaUsuarios[$i]->getNombre() . ' ' . $listaUsuarios[$i]->getApellido() . "</h5>"
                                    ."<p class='card-text'>Número de documento: ". $listaUsuarios[$i]->getId_usuario() ." </p>"
                                    ."<p class='card-text'>Ocupación: " . $listaUsuarios[$i]->getCargo() . "</p>"
                                . "</div>"
                            . "</div>"
                        . "</div>";
                        /* ."<div class='col-4 cont-emple raul 123214144 Ingeniero'>"
                            . "<div class='my-2'>"
                                .  "<div class='form-check'>"
                                ."<input class='form-check-input checkbox-empleados-camisa' type='checkbox' value='" . $listaUsuarios[$i]->getId_usuario() . "' id='flexCheckChecked'>"
                                    
                                ."</div>"
                            ."</div>"
                            ."<div class='card' style='width: 18rem;'>"
                                ."<img src='...' class='card-img-top card-img-profile' alt='...'>"
                                ."<div class='card-body'>"
                                    ."<h5 class='card-title titulo-campos'>" . $listaUsuarios[$i]->getNombre() . ' ' . $listaUsuarios[$i]->getApellido() . "</h5>"
                                    ."<p class='card-text'>Número de documento: ". $listaUsuarios[$i]->getId_usuario() ." </p>"
                                    ."<p class='card-text'>Ocupación: " . $listaUsuarios[$i]->getCargo() . "</p>"
                                . "</div>"
                            . "</div>"
                        . "</div>"; */
                        }else if($camisadto->getCantidad() == 1){
                            $cont .= "<div class='col-4'>"
                            . "<div class='my-2'>"
                                .  "<div class='form-check'>"
                                ."<input class='form-check-input checkbox-empleados' type='radio' value='" . $listaUsuarios[$i]->getId_usuario() . "'>"    
                                ."</div>"
                            ."</div>"
                            ."<div class='card' style='width: 18rem;'>"
                                ."<img src='...' class='card-img-top card-img-profile' alt='...'>"
                                ."<div class='card-body'>"
                                    ."<h5 class='card-title titulo-campos'>" . $listaUsuarios[$i]->getNombre() . ' ' . $listaUsuarios[$i]->getApellido() . "</h5>"
                                    ."<p class='card-text'>Número de documento: ". $listaUsuarios[$i]->getId_usuario() ." </p>"
                                    ."<p class='card-text'>Ocupación: " . $listaUsuarios[$i]->getCargo() . "</p>"
                                . "</div>"
                            . "</div>"
                        . "</div>";

                        }else{

                        }    



                }
                
                     
                    
            }   


            if (!$validar_asignaciones) {
                $cont .= "<div class='col'>"
                        . "<h4 class='text-center'>Todos los empleados tienen asignada una camisa</h4>"
                        . "</div>"; 
            }
        

        $cont .= "</div>"
                ."</div>";

         echo $cont;

    }else{
        echo "<div class='alert alert-danger' role='alert'>El código no es valido</div>";
    }

}else{
    echo "Error, está entrando a una sección de forma indebida";

}

