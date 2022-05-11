<?php

require_once('../../models/DAO/PantalonDAO.php');
require_once('../../models/DAO/UsuarioDAO.php');
require_once('../../models/DAO/GeneroDAO.php');
require_once('../../models/DAO/CargoDAO.php');


$usuariodao = new UsuarioDAO();
$listaUsuarios = $usuariodao->listaUsuarios();
$listaUsuariosId = $usuariodao->listaUsuariosConId();

$cargodao = new CargoDAO();
$listaCargos = $cargodao->listaCargos();

$generodao = new GeneroDAO();
$listaGeneros = $generodao->listaGeneros();

if (isset($_POST['id'])) {

    $id_pantalon = $_POST['id'];

    if (preg_match('/[0-9]+/',$id_pantalon)) {
        $genero = "";
        $id_camisa = intval($id_pantalon);

        $pantalondao = new PantalonDAO();
        
        
        $pantalondto = $pantalondao->listaPantalon($id_pantalon);

        $genero = "";
        $cargo = "";

        for ($i=0; $i < count($listaGeneros); $i++) { 
            if ($listaGeneros[$i]->getId_genero() == $pantalondto->getGenero()){
                $genero = $listaGeneros[$i]->getNombre();
            }
        }

        $cont = "<div class='row my-2'>"
                    ."<div class='col-3'>"
                        ."<h5>Pantalón: " . $pantalondto->getNombre() .  " </h5>"
                    ."</div>"
                    ."<div class='col-2'>"
                        ."<h5>Talla: " . $pantalondto->getTalla() .  " </h5>"
                    ."</div>"
                    ."<div class='col-2'>"
                        ."<h5>Disponibles: " . $pantalondto->getCantidad()  .  " </h5>"
                    ."</div>"
                    ."<div class='col-3'>"
                        ."<h5>Genero: " . $genero  .  " </h5>"
                    ."</div>"
                ."</div>"
                ."<div class='row my-2'>"
                . "<div class='col-4'>"
                ."<label class='texto-claro'>Pantalones disponibles por asignar:</label>"
                ."<input type='text' class='form-control campo-cant' value='" . $pantalondto->getCantidad() . "' id='campo-cant-pantalon' readonly>"
                ."<input type='text' class='d-block form-control' value='" . $pantalondto->getCantidad() . "' id='campo-cant-fija-pantalon' readonly>"
                ."</div>"
                . "<div class='col-5'>"
                ."<label class='texto-claro'>Cantidad de pantalones para asignar:</label>"
                ."<input type='number' class='form-control campo-cant-asignar' id='campo-cant-asignar-pantalon'>"
                ."</div>"
                . "<div class='col-3'>"
                . "<button class='btn btn-verde' id='btn-seleccionar-todos'>Selecc todos</button>"
                ."</div>"
                ."</div>"
            ."<div class='row my-4'>";

            $validar_asignaciones = false;
            
            for ($i=0; $i < count($listaUsuariosId); $i++){

                if ($listaUsuariosId[$i]->getPantalon() == NULL && $listaUsuariosId[$i]->getTipo_dotacion() == $pantalondto->getTipo_dotacion() && $listaUsuariosId[$i]->getGenero() == $pantalondto->getGenero()) {

                    for ($j=0; $j < count($listaCargos); $j++) { 
                        if ($listaCargos[$j]->getId_cargo() == $listaUsuariosId[$i]->getCargo()) {
                            $cargo =  $listaCargos[$j]->getNombre();
                        }
                    }

                    $validar_asignaciones = true;
                    if ($pantalondto->getCantidad() > 1) {
                        $cont .= "<div class='col-4 cont-emple " . $listaUsuariosId[$i]->getId_usuario(). " " . $listaUsuariosId[$i]->getNombre() . " " . $cargo ."'>"
                            . "<div class='my-2'>"
                                .  "<div class='form-check'>"
                                ."<input class='form-check-input checkbox-empleados checkbox-cont-pantalon' type='checkbox' value='" . $listaUsuariosId[$i]->getId_usuario() . "' id='flexCheckChecked'>"
                                    
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

                        

                        }else if($pantalondto->getCantidad() == 1){
                            $cont .= "<div class='col-4'>"
                            . "<div class='my-2'>"
                                .  "<div class='form-check'>"
                                ."<input class='form-check-input checkbox-empleados checkbox-cont-pantalon' type='radio' value='" . $listaUsuariosId[$i]->getId_usuario() . "'>"    
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
                        . "<h4 class='text-center'>Todos los empleados tienen asignado un pantalón</h4>"
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

