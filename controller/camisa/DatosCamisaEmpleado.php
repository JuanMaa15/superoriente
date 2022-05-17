<?php

require_once('../../models/DAO/CamisaDAO.php');
require_once('../../models/DAO/UsuarioDAO.php');
require_once('../../models/DAO/CargoDAO.php');
require_once('../../models/DAO/GeneroDAO.php');

$usuariodao = new UsuarioDAO();
$listaUsuarios = $usuariodao->listaUsuarios();
$listaUsuariosId = $usuariodao->listaUsuariosConId();

$cargodao = new CargoDAO();
$listaCargos = $cargodao->listaCargos();

$generodao = new GeneroDAO();
$listaGeneros = $generodao->listaGeneros();

if (isset($_POST['id'])) {

    $id_camisa = $_POST['id'];

    if (preg_match('/[0-9]+/',$id_camisa)) {

        $id_camisa = intval($id_camisa);

        $camisadao = new CamisaDAO();
        
        
        $camisadto = $camisadao->listaCamisa($id_camisa);

        $genero = "";
        $cargo = "";

        for ($i=0; $i < count($listaGeneros); $i++) { 
            if ($listaGeneros[$i]->getId_genero() == $camisadto->getGenero()) {
                $genero = $listaGeneros[$i]->getNombre();
            }
        }

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
                    ."<div class='col-3'>"
                        ."<h5>Genero: " . $genero  .  " </h5>"
                    ."</div>"
                ."</div>"
                ."<div class='row my-2'>"
                . "<div class='col-4'>"
                ."<label class='texto-claro'>Camisas disponibles por asignar:</label>"
                ."<input type='text' class='form-control campo-cant' value='" . $camisadto->getCantidad() . "' id='campo-cant-camisa' readonly>"
                ."<input type='text' class='d-none form-control' value='" . $camisadto->getCantidad() . "' id='campo-cant-fija-camisa' readonly>"
                ."</div>"
                . "<div class='col-5'>"
                ."<label class='texto-claro'>Cantidad de camisas para asignar:</label>"
                ."<input type='number' class='form-control campo-cant-asignar' id='campo-cant-asignar-camisa'>"
                ."</div>"
                . "<div class='col-3'>"
                . "<button class='btn btn-verde' id='btn-seleccionar-todos'>Selecc todos</button>"
                ."</div>"

                ."</div>"
            ."<div class='row my-4'>";

                
            $validar_asignaciones = false;
            
            for ($i=0; $i < count($listaUsuariosId); $i++){

                if ($listaUsuariosId[$i]->getCamisa() == NULL && $listaUsuariosId[$i]->getTipo_dotacion() == $camisadto->getTipo_dotacion() && $listaUsuariosId[$i]->getGenero() == $camisadto->getGenero()) {
   
                    $validar_asignaciones = true;

                    for ($j=0; $j < count($listaCargos); $j++) { 
                        if ($listaCargos[$j]->getId_cargo() == $listaUsuariosId[$i]->getCargo()) {
                            $cargo =  $listaCargos[$j]->getNombre();
                        }
                    }

                    if ($camisadto->getCantidad() > 1) {
                        $cont .= "<div class='col-4 cont-emple " . $listaUsuariosId[$i]->getId_usuario(). " " . $listaUsuariosId[$i]->getNombre() . " " . $cargo ."'>"
                            . "<div class='my-2'>"
                                .  "<div class='form-check'>"
                                ."<input class='form-check-input checkbox-empleados checkbox-cont-camisa' type='checkbox' value='" . $listaUsuariosId[$i]->getId_usuario() . "' id='flexCheckChecked'>"
                                ."<input type='text' disabled>"
                                ."</div>"
                            ."</div>"
                            ."<div class='card' style='width: 18rem;'>"
                                ."<img src='...' class='card-img-top card-img-profile' alt='...'>"
                                ."<div class='card-body'>"
                                    ."<h5 class='card-title titulo-campos'>" . $listaUsuariosId[$i]->getNombre() . ' ' . $listaUsuariosId[$i]->getApellido() . "</h5>"
                                    ."<p class='card-text'>Número de documento: ". $listaUsuariosId[$i]->getId_usuario() ." </p>"
                                    ."<p class='card-text'>Ocupación: " . $cargo . "</p>"
                                    //."<p class='card-text'>Genero: " . $genero . "</p>"
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
                                ."<input class='form-check-input checkbox-empleados checkbox-cont-camisa' type='radio' value='" . $listaUsuariosId[$i]->getId_usuario() . "'>"    
                                ."<input type='text' disabled>"
                                ."</div>"
                            ."</div>"
                            ."<div class='card' style='width: 18rem;'>"
                                ."<img src='...' class='card-img-top card-img-profile' alt='...'>"
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

