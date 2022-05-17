<?php

require_once('../../models/DAO/ZapatoDAO.php');
require_once('../../models/DAO/UsuarioDAO.php');

$usuariodao = new UsuarioDAO();
$listaUsuarios = $usuariodao->listaUsuarios();


if (isset($_POST['id'])) {

    $id_zapato = $_POST['id'];

    if (preg_match('/[0-9]+/',$id_zapato)) {

        $id_zapato = intval($id_zapato);

        $zapatodao = new ZapatoDAO();
        
        
        $zapatodto = $zapatodao->listaZapato($id_zapato);

        $cont = "<div class='row my-2'>"
                    ."<div class='col-3'>"
                        ."<h5>Zapato: " . $zapatodto->getNombre() .  " </h5>"
                    ."</div>"
                    ."<div class='col-2'>"
                        ."<h5>Talla: " . $zapatodto->getTalla() .  " </h5>"
                    ."</div>"
                    ."<div class='col-2'>"
                        ."<h5>Disponibles: " . $zapatodto->getCantidad()  .  " </h5>"
                    ."</div>"
                ."</div>"
                ."<div class='row my-2'>"
                . "<div class='col-4'>"
                ."<label class='texto-claro'>Zapatos disponibles por asignar:</label>"
                ."<input type='text' class='form-control campo-cant' value='" . $zapatodto->getCantidad() . "' id='campo-cant-zapato' readonly>"
                ."<input type='text' class='d-none form-control' value='" . $zapatodto->getCantidad() . "' id='campo-cant-fija-zapato' readonly>"
                ."</div>"
                . "<div class='col-5'>"
                ."<label class='texto-claro'>Cantidad de camisas para asignar:</label>"
                ."<input type='number' class='form-control campo-cant-asignar' id='campo-cant-asignar-zapato'>"
                ."</div>"
                . "<div class='col-3'>"
                . "<button class='btn btn-verde' id='btn-seleccionar-todos'>Selecc todos</button>"
                ."</div>"
                ."</div>"
            ."<div class='row my-4'>";

            $validar_asignaciones = false;
            
            for ($i=0; $i < count($listaUsuarios); $i++){

                if ($listaUsuarios[$i]->getZapato() == null) {

                    $validar_asignaciones = true;
                    if ($zapatodto->getCantidad() > 1) {
                        $cont .= "<div class='col-4 cont-emple " . $listaUsuarios[$i]->getId_usuario(). " " . $listaUsuarios[$i]->getNombre() . " " . $listaUsuarios[$i]->getCargo() ."'>"
                            . "<div class='my-2'>"
                                .  "<div class='form-check'>"
                                ."<input class='form-check-input checkbox-empleados checkbox-cont-zapato' type='checkbox' value='" . $listaUsuarios[$i]->getId_usuario() . "' id='flexCheckChecked'>"
                                ."<input type='text' disabled>" 
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

                        

                        }else if($zapatodto->getCantidad() == 1){
                            $cont .= "<div class='col-4'>"
                            . "<div class='my-2'>"
                                .  "<div class='form-check'>"
                                ."<input class='form-check-input checkbox-empleados checkbox-cont-zapato' type='radio' value='" . $listaUsuarios[$i]->getId_usuario() . "'>"    
                                ."<input type='text' disabled>"
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
                        . "<h4 class='text-center'>Todos los empleados tienen asignado un par de zapatos</h4>"
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

