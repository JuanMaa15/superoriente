<?php

require_once ("../../models/DAO/UsuarioDAO.php");

if (isset($_POST['btn-reporte-opcion-trabajo'])) {

    $usuariodao = new UsuarioDAO();

    switch ($_POST['opc']) {
        case 'seccion':

            $id_seccion = $_POST['opc_seccion'];

            if (!empty($id_seccion) && preg_match('/[0-9]+/', $id_seccion)) {

                $id_seccion = intval($id_seccion);

                $listaUsuarios = $usuariodao->ListaSeccionUsuario($id_seccion);

                header('Content-Type:text/cvs; charset=latin1');
                header('Content-Disposition: attachment; filename="Reporte_usuario_seccion.csv"');

            }else{
                echo "Datos incorrectos";
            }

            
        break;

        case 'area':

            $id_area = $_POST['opc_area'];

            if (!empty($id_area) && preg_match('/[0-9]+/', $id_area)) {

                $id_area = intval($id_area);

                $listaUsuarios = $usuariodao->ListaAreaUsuario($id_area);

                header('Content-Type:text/cvs; charset=latin1');
                header('Content-Disposition: attachment; filename="Reporte_usuario_area.csv"');

            }else{
                echo "Datos incorrectos";
            }

            
        break;

        case 'cargo':

            $id_cargo = $_POST['opc_cargo'];

            if (!empty($id_cargo) && preg_match('/[0-9]+/', $id_cargo)) {

                $id_cargo = intval($id_cargo);

                $listaUsuarios = $usuariodao->ListaCargoUsuario($id_cargo);

                header('Content-Type:text/cvs; charset=latin1');
                header('Content-Disposition: attachment; filename="Reporte_usuario_cargo.csv"');

            }else{
                echo "Datos incorrectos";
            }

            
        break;
        
        default:
            return "Error";
        break;
    }

    

    // NOMBRE DEL ARCHIVO Y CHARSET

    


    // Salida del archivo
    $salida = fopen('php://output', 'w');

    fputcsv($salida, array('NRO DOCUMENTO', 'TIPO DE DOCUMENTO', 'FECHA DE EXPEDICION', 'LUGAR DE EXPEDICION', 'NOMBRE', 'APELLIDO', 'TELEFONO FIJO', 'TELEFONO MOVIL', 'CASA', 'GENERO','FECHA NACIMIENTO','EDAD','DIRECCION','LUGAR DE RESIDENCIA','NIVEL ACADEMICO','AREA ACADEMICA','ESTADO CIVIL','EPS','NRO CUENTA', 'TIPO DE SANGRE Y RH','ANTECEDENTES','PRACTICA DEPORTE','CONSUMO CIGARROS','CONSUMO DE LICOR','CONSUMO SPA','CORREO','CONTRASEÑA','PERFIL','PERSONA DE EMERGENCIA','TELEFONO EMERGENCIA','CELULAR EMERGENCIA','PARENTESCO EMERGENCIA','SUCURSAL','TIPO DE CONTRATO','FECHA DE INGRESO', 'FECHA DE RETIRO','MOTIVO DE RETIRO', 'SALARIO','VALOR DIA','VALOR HORA','CLASE DE RIESGO','PORCENTAJE DE RIESGO','SECCION','AREA','CARGO','PENSION','TIPO DE DOTACION','ESTADO'));
    for ($i=0; $i < count($listaUsuarios); $i++) { 
        fputcsv($salida, array($listaUsuarios[$i]->getId_usuario(),
                $listaUsuarios[$i]->getTipo_documento(),
                $listaUsuarios[$i]->getFecha_expedicion(),
                $listaUsuarios[$i]->getLugar_expedicion(),        
                $listaUsuarios[$i]->getNombre(),
                $listaUsuarios[$i]->getApellido(),
                $listaUsuarios[$i]->getTelefono_fijo(),
                $listaUsuarios[$i]->getTelefono_movil(),
                $listaUsuarios[$i]->getTipo_casa(),
                $listaUsuarios[$i]->getGenero(),
                $listaUsuarios[$i]->getFecha_nacimiento(),
                $listaUsuarios[$i]->getEdad(),
                $listaUsuarios[$i]->getDireccion(),
                $listaUsuarios[$i]->getLugar_residencia(),
                $listaUsuarios[$i]->getNivel_academico(),
                $listaUsuarios[$i]->getArea_academica(),
                $listaUsuarios[$i]->getEstado_civil(),
                $listaUsuarios[$i]->getEps(),
                $listaUsuarios[$i]->getNro_cuenta(),
                $listaUsuarios[$i]->getTipo_sangre(),
                $listaUsuarios[$i]->getAntecedentes(),
                $listaUsuarios[$i]->getPractica_deporte(),
                $listaUsuarios[$i]->getConsumo_cigarros(),
                $listaUsuarios[$i]->getConsumo_licor(),
                $listaUsuarios[$i]->getConsumo_spa(),
                $listaUsuarios[$i]->getCorreo(),
                $listaUsuarios[$i]->getPassword(),
                $listaUsuarios[$i]->getPerfil(),
                $listaUsuarios[$i]->getNombre_persona_emergencia(),
                $listaUsuarios[$i]->getTelefono_emergencia(),
                $listaUsuarios[$i]->getCelular_emergencia(),
                $listaUsuarios[$i]->getParentesco_emergencia(),


                $listaUsuarios[$i]->getSucursal(),
                $listaUsuarios[$i]->getTipo_contrato(),
                $listaUsuarios[$i]->getFecha_ingreso(),
                $listaUsuarios[$i]->getFecha_retiro(),
                $listaUsuarios[$i]->getMotivo_retiro(),
                $listaUsuarios[$i]->getSalario(),
                $listaUsuarios[$i]->getValor_dia(),
                $listaUsuarios[$i]->getValor_hora(),
                $listaUsuarios[$i]->getClase_riesgo(),
                $listaUsuarios[$i]->getPorcentaje_riesgo(),
                $listaUsuarios[$i]->getArea(),
                $listaUsuarios[$i]->getSeccion(),
                $listaUsuarios[$i]->getCargo(),
                $listaUsuarios[$i]->getPension(),
                $listaUsuarios[$i]->getTipo_dotacion(),
                $listaUsuarios[$i]->getEstado())
                );
    }

    

}




?>