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

    fputcsv($salida, array('Nro documento', 'Nombre', 'Apellido', 'Sección', 'Area', 'Cargo'));

    for ($i=0; $i < count($listaUsuarios); $i++) { 
        fputcsv($salida, array($listaUsuarios[$i]->getId_usuario(),
                                $listaUsuarios[$i]->getNombre(),
                                $listaUsuarios[$i]->getApellido(),
                                $listaUsuarios[$i]->getSeccion(),
                                $listaUsuarios[$i]->getArea(),
                                $listaUsuarios[$i]->getCargo())
                );
    }

    

}




?>