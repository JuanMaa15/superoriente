<?php

require_once ("../../models/DAO/UsuarioDAO.php");

if (isset($_POST['btn-reporte-casa'])) {

    $usuariodao = new UsuarioDAO();

    $casa = intval($_POST['tipo_casa']);

    $listaUsuarios = $usuariodao->ListaCasaUsuario($casa);

    // NOMBRE DEL ARCHIVO Y CHARSET


    header('Content-Type:text/cvs; charset=latin1');
    header('Content-Disposition: attachment; filename="Reporte_tipo_casa_usuario.csv"');


    // Salida del archivo
    $salida = fopen('php://output', 'w');

    fputcsv($salida, array('Nro documento', 'Nombre', 'Apellido', 'Tipo de casa'));

    for ($i=0; $i < count($listaUsuarios); $i++) { 
        fputcsv($salida, array($listaUsuarios[$i]->getId_usuario(),
                                $listaUsuarios[$i]->getNombre(),
                                $listaUsuarios[$i]->getApellido(),
                                $listaUsuarios[$i]->getTipo_casa())
                );
    }

}






?>