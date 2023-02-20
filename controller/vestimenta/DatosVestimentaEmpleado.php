<?php

require_once('../../models/DAO/OtraVestimentaDAO.php');
require_once('../../models/DAO/UsuarioDAO.php');
require_once('../../models/DAO/CargoDAO.php');


$usuariodao = new UsuarioDAO();
$listaUsuarios = $usuariodao->listaUsuarios();


$cargodao = new CargoDAO();
$listaCargos = $cargodao->listaCargos();

if (isset($_POST['id'])) {

    $id_vestimenta = $_POST['id'];

    if (preg_match('/[0-9]+/',$id_vestimenta)) {

        $id_vestimenta = intval($id_vestimenta);

        $vestimentadao = new OtraVestimentaDAO();
        $listaUsuariosId = $usuariodao->listaUsuariosConId();        
       
        $vestimentadto = $vestimentadao->listaVestimenta($id_vestimenta);

        $cont = "<div class='row my-2'>"
                    ."<div class='col-3'>"
                        ."<h5>Vestimenta: " . $vestimentadto->getNombre() .  " </h5>"
                    ."</div>"
                    ."<div class='col-2'>"
                        ."<h5>Disponibles: " . $vestimentadto->getCantidad()  .  " </h5>"
                    ."</div>"
                ."</div>"
                ."<div class='row my-2'>"
                . "<div class='col-4'>"
                ."<label class='texto-claro'>Vestimentas disponibles por asignar:</label>"
                ."<input type='text' class='form-control campo-cant' value='" . $vestimentadto->getCantidad() . "' id='campo-cant-vestimenta' readonly>"
                ."<input type='text' class='d-none form-control' value='" . $vestimentadto->getCantidad() . "' id='campo-cant-fija-vestimenta' readonly>"
                ."</div>"
                . "<div class='col-5'>"
                ."<label class='texto-claro'>Cantidad de camisas para asignar:</label>"
                ."<input type='number' class='form-control campo-cant-asignar' id='campo-cant-asignar-vestimenta'>"
                ."</div>"
                . "<div class='col-3'>"
                . "<button class='btn btn-verde' id='btn-seleccionar-todos'>Selecc todos</button>"
                ."</div>"
                ."</div>"
            ."<div class='row my-4'>";

            $validar_asignaciones = false;
            
            for ($i=0; $i < count($listaUsuariosId); $i++){

                if ($listaUsuariosId[$i]->getVestimenta() == null && $listaUsuariosId[$i]->getTipo_dotacion() == $vestimentadto->getTipo_dotacion()) {
                    $validar_asignaciones = true;

                    for ($j=0; $j < count($listaCargos); $j++) { 
                        if ($listaCargos[$j]->getId_cargo() == $listaUsuariosId[$i]->getCargo()) {
                            $cargo =  $listaCargos[$j]->getNombre();
                        }
                    }

                    if ($vestimentadto->getCantidad() > 1) {
                        $cont .= "<div class='col-4 cont-emple " . $listaUsuariosId[$i]->getId_usuario(). " " . $listaUsuariosId[$i]->getNombre() . " " . $cargo ."'>"
                            . "<div class='my-2'>"
                                .  "<div class='form-check'>"
                                ."<input class='form-check-input checkbox-empleados checkbox-cont-vestimenta' type='checkbox' value='" . $listaUsuariosId[$i]->getId_usuario() . "' id='flexCheckChecked'>"
                                ."<input type='text' disabled>"  
                                ."</div>"
                            ."</div>"
                            ."<div class='card' style='width: 18rem;'>"
                                ."<img src='". $listaUsuariosId[$i]->getFoto() ."' class='card-img-top card-img-profile' alt='...'>"
                                ."<div class='card-body'>"
                                    ."<h5 class='card-title titulo-campos'>" . $listaUsuariosId[$i]->getNombre() . ' ' . $listaUsuariosId[$i]->getApellido() . "</h5>"
                                    ."<p class='card-text'>Número de documento: ". $listaUsuariosId[$i]->getId_usuario() ." </p>"
                                    ."<p class='card-text'>Ocupación: " . $cargo . "</p>"
                                . "</div>"
                            . "</div>"
                        . "</div>";

                        

                        }else if($vestimentadto->getCantidad() == 1){
                            $cont .= "<div class='col-4 cont-emple " . $listaUsuariosId[$i]->getId_usuario(). " " . $listaUsuariosId[$i]->getNombre() . " " . $cargo ."' >"
                            . "<div class='my-2'>"
                                .  "<div class='form-check'>"
                                ."<input class='form-check-input checkbox-empleados checkbox-cont-vestimenta' type='radio' value='" . $listaUsuarios[$i]->getId_usuario() . "'>"    
                                ."<input type='text' disabled>"
                                ."</div>"
                            ."</div>"
                            ."<div class='card' style='width: 18rem;'>"
                                ."<img src='". $listaUsuariosId[$i]->getFoto() ."' class='card-img-top card-img-profile' alt='...'>"
                                ."<div class='card-body'>"
                                    ."<h5 class='card-title titulo-campos'>" . $listaUsuariosId[$i]->getNombre() . ' ' . $listaUsuariosId[$i]->getApellido() . "</h5>"
                                    ."<p class='card-text'>Número de documento: ". $listaUsuariosId[$i]->getId_usuario() ." </p>"
                                    ."<p class='card-text'>Ocupación: " . $cargo . "</p>"
                                . "</div>"
                            . "</div>"
                        . "</div>";

                        }else{

                        }    

                }
                   
            }   

            if (!$validar_asignaciones) {
                $cont .= "<div class='col'>"
                        . "<h4 class='text-center'>Todos los empleados tienen asignada una vestimenta</h4>"
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

