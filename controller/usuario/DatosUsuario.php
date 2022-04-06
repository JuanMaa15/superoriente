<?php 

require_once('../../models/DAO/UsuarioDAO.php');

if(isset($_POST['busqueda']) && isset($_POST['id'])) {




    $id_usuario = $_POST['id'];
    $busqueda = $_POST['busqueda'];

    $usuariodao = new UsuarioDAO();
    $usuariodto = $usuariodao->listaUsuario($id_usuario);

    $datos_encontrados = "<h3 class='titulo-perfil'>Datos personales</h3>"
                        . "<div class='row'>";

    if (str_contains("Tipo de documento", $busqueda)) {
        $datos_encontrados .= "<div class='col-3 my-2'>"
                                . "<h4 class='fs-6 titulo-campos'>Tipo de documento</h4>"
                                . "<p class=my-1>" . $usuariodto->getTipo_documento() . "</p>"
                             . "</div>";
    }

    if (str_contains("Numero de documento", $busqueda) || str_contains("Número de documento", $busqueda)) {
        $datos_encontrados .= "<div class='col-3 my-2'>"
                                . "<h4 class='fs-6 titulo-campos'>Número de documento</h4>"
                                . "<p class=my-1>" . $usuariodto->getId_usuario() . "</p>"
                             . "</div>";
    }

    if (str_contains("Fecha de expedicion", $busqueda) || str_contains("Fecha de expedición", $busqueda)) {
        $datos_encontrados .= "<div class='col-3 my-2'>"
                                . "<h4 class='fs-6 titulo-campos'>Fecha de expedición (Doc)</h4>"
                                . "<p class=my-1>" . $usuariodto->getFecha_expedicion() . "</p>"
                             . "</div>";
    }

    if (str_contains("Lugar de expedicion", $busqueda) || str_contains("Lugar de expedición", $busqueda)) {
        $datos_encontrados .= "<div class='col-3 my-2'>"
                                . "<h4 class='fs-6 titulo-campos'>Lugar de expedición (Doc)</h4>"
                                . "<p class=my-1>" . $usuariodto->getLugar_expedicion() . "</p>"
                             . "</div>";
    }

    if (str_contains("Teléfono fijo", $busqueda) || str_contains("Telefono fijo", $busqueda)) {
        $datos_encontrados .= "<div class='col-3 my-2'>"
                                . "<h4 class='fs-6 titulo-campos'>Teléfono fijo</h4>"
                                . "<p class=my-1>" . $usuariodto->getTelefono_fijo() . "</p>"
                             . "</div>";
    }

    if (str_contains("Teléfono Móvil", $busqueda) || str_contains("Telefono Movil", $busqueda)) {
        $datos_encontrados .= "<div class='col-3 my-2'>"
                                . "<h4 class='fs-6 titulo-campos'>Teléfono Móvil</h4>"
                                . "<p class=my-1>" . $usuariodto->getTelefono_movil() . "</p>"
                             . "</div>";
    }

    if (str_contains("Casa", $busqueda)) {
        $datos_encontrados .= "<div class='col-3 my-2'>"
                                . "<h4 class='fs-6 titulo-campos'>Casa</h4>"
                                . "<p class=my-1>" . $usuariodto->getTipo_casa() . "</p>"
                             . "</div>";
    }

    if (str_contains("Género", $busqueda) || str_contains("Genero", $busqueda)) {
        $datos_encontrados .= "<div class='col-3 my-2'>"
                                . "<h4 class='fs-6 titulo-campos'>Género</h4>"
                                . "<p class=my-1>" . $usuariodto->getGenero() . "</p>"
                             . "</div>";
    }


    if (str_contains("Edad", $busqueda)) {
        $datos_encontrados .= "<div class='col-3 my-2'>"
                                . "<h4 class='fs-6 titulo-campos'>Edad</h4>"
                                . "<p class=my-1>" . $usuariodto->getEdad() . "</p>"
                             . "</div>";
    }

    if (str_contains("Fecha de nacimiento", $busqueda)) {
        $datos_encontrados .= "<div class='col-3 my-2'>"
                                . "<h4 class='fs-6 titulo-campos'>Fecha de nacimiento</h4>"
                                . "<p class=my-1>" . $usuariodto->getFecha_nacimiento() . "</p>"
                            .  "</div>";
    }

    if (str_contains("Nivel académico", $busqueda) || str_contains("Nivel academico", $busqueda)) {
        $datos_encontrados .= "<div class='col-3 my-2'>"
                                . "<h4 class='fs-6 titulo-campos'>Nivel académico</h4>"
                                . "<p class=my-1>" . $usuariodto->getNivel_academico() . "</p>"
                             . "</div>";
    }

    if (str_contains("Area académica", $busqueda) || str_contains("Area academica", $busqueda)) {
        $datos_encontrados .= "<div class='col-3 my-2'>"
                                . "<h4 class='fs-6 titulo-campos'>Area académica</h4>"
                                . "<p class=my-1>" . $usuariodto->getArea_academica() . "</p>"
                             . "</div>";
    }

    if (str_contains("Estado civil", $busqueda)) {
        $datos_encontrados .= "<div class='col-3 my-2'>"
                                . "<h4 class='fs-6 titulo-campos'>Estado civil</h4>"
                                . "<p class=my-1>" . $usuariodto->getEstado_civil() . "</p>"
                             . "</div>";
    }

    if (str_contains("EPS", $busqueda)) {
        $datos_encontrados .= "<div class='col-3 my-2'>"
                                . "<h4 class='fs-6 titulo-campos'>EPS</h4>"
                                . "<p class=my-1>" . $usuariodto->getEps() . "</p>"
                             . "</div>";
    }

    if (str_contains("Número de cuenta", $busqueda) || str_contains("Numero de cuenta", $busqueda)) {
        $datos_encontrados .= "<div class='col-3 my-2'>"
                                . "<h4 class='fs-6 titulo-campos'>Número de cuenta</h4>"
                                . "<p class=my-1>" . $usuariodto->getNro_cuenta() . "</p>"
                            .  "</div>";
    }

    if (str_contains("Tipo de sangre y RH", $busqueda)) {
        $datos_encontrados .= "<div class='col-3 my-2'>"
                                . "<h4 class='fs-6 titulo-campos'>Tipo de sangre y RH</h4>"
                                . "<p class=my-1>" . $usuariodto->getTipo_sangre() . "</p>"
                             . "</div>";
    }

    if (str_contains("Lugar de residencia", $busqueda)) {
        $datos_encontrados .= "<div class='col-3 my-2'>"
                                . "<h4 class='fs-6 titulo-campos'>Lugar de residencia</h4>"
                                . "<p class=my-1>" . $usuariodto->getLugar_residencia() . "</p>"
                             . "</div>";
    }

    if (str_contains("Dirección", $busqueda) || str_contains("Direccion", $busqueda)) {
        $datos_encontrados .= "<div class='col-3 my-2'>"
                                . "<h4 class='fs-6 titulo-campos'>Dirección</h4>"
                                . "<p class=my-1>" . $usuariodto->getDireccion() . "</p>"
                             . "</div>";
    }

    if (str_contains("Antecedentes", $busqueda)) {
        $datos_encontrados .= "<div class='col-3 my-2'>"
                                . "<h4 class='fs-6 titulo-campos'>Antecedentes</h4>"
                                . "<p class=my-1>" . $usuariodto->getAntecedentes() . "</p>"
                             . "</div>";
    }


    if (str_contains("Practica deporte", $busqueda)) {
        $datos_encontrados .= "<div class='col-3 my-2'>"
                                . "<h4 class='fs-6 titulo-campos'>¿Practica deporte? ¿Cual?</h4>"
                                . "<p class=my-1>" . $usuariodto->getPractica_deporte() . "</p>"
                             . "</div>";
    }

    if (str_contains("¿Cuanto cigarros se fuma a la semana?", $busqueda)) {
        $datos_encontrados .= "<div class='col-3 my-2'>"
                                . "<h4 class='fs-6 titulo-campos'>¿Cuanto cigarros se fuma a la semana?</h4>"
                                . "<p class=my-1>" . $usuariodto->getConsumo_cigarros() . "</p>"
                             . "</div>";
    }

    if (str_contains("¿Cuantas copas de licor se toma a la semana?", $busqueda)) {
        $datos_encontrados .= "<div class='col-3 my-2'>"
                                . "<h4 class='fs-6 titulo-campos'>¿Cuantas copas de licor se toma a la semana?</h4>"
                                . "<p class=my-1>" . $usuariodto->getConsumo_licor() . "</p>"
                             . "</div>";
    }

    if (str_contains("¿Con que frecuencia consume sustancias alucinogenas?", $busqueda)) {
        $datos_encontrados .= "<div class='col-3 my-2'>"
                                . "<h4 class='fs-6 titulo-campos'>¿Con que frecuencia consume sustancias alucinogenas?</h4>"
                                . "<p class=my-1>" . $usuariodto->getConsumo_spa() . "</p>"
                             . "</div>";
    }

    if (str_contains("Correo eletrónico", $busqueda) || str_contains("correo eletrónico", $busqueda)) {
        $datos_encontrados .= "<div class='col-3 my-2'>"
                                . "<h4 class='fs-6 titulo-campos'>Correo eletrónico</h4>"
                                . "<p class=my-1>" . $usuariodto->getCorreo() . "</p>"
                            .  "</div>";
    }

    if (str_contains("Perfil", $busqueda)) {
        $datos_encontrados .= "<div class='col-3 my-2'>"
                                . "<h4 class='fs-6 titulo-campos'>Perfil</h4>"
                                . "<p class=my-1>" . $usuariodto->getPerfil() . "</p>"
                            .  "</div>";
    }

    if (str_contains("En caso de emergencia llamar a...", $busqueda)) {
        $datos_encontrados .= "<div class='col-3 my-2'>"
                                . "<h4 class='fs-6 titulo-campos'>En caso de emergencia llamar a...<h4>"
                                . "<p class=my-1>" . $usuariodto->getNombre_persona_emergencia() . "</p>"
                             . "</div>";
    }

    if (str_contains("Teléfono fijo (Persona de emergencia)", $busqueda)) {
        $datos_encontrados .= "<div class='col-3 my-2'>"
                                . "<h4 class='fs-6 titulo-campos'>Teléfono fijo (Persona de emergencia)<h4>"
                                . "<p class=my-1>" . $usuariodto->getTelefono_emergencia() . "</p>"
                             . "</div>";
    }

    if (str_contains("Teléfono Móvil (Persona de emergencia)", $busqueda)) {
        $datos_encontrados .= "<div class='col-3 my-2'>"
                                . "<h4 class='fs-6 titulo-campos'>Teléfono Móvil (Persona de emergencia)</h4>"
                                . "<p class=my-1>" . $usuariodto->getCelular_emergencia() . "</p>"
                             . "</div>";
    }

    if (str_contains("Parentesco (Persona de emergencia)", $busqueda)) {
        $datos_encontrados .= "<div class='col-3 my-2'>"
                                . "<h4 class='fs-6 titulo-campos'>Parentesco (Persona de emergencia)</h4>"
                                . "<p class=my-1>" . $usuariodto->getParentesco_emergencia() . "</p>"
                             . "</div>";
    }


    $datos_encontrados .= "</div>";

    echo $datos_encontrados;
                         
}