<?php

require_once ("../../models/DAO/UsuarioDAO.php");

if (isset($_POST['btn-reporte-estado'])) {

    $usuariodao = new UsuarioDAO();

    $estado = intval($_POST['estado']);

    $listaUsuarios = $usuariodao->ListaEstadoUsuario($estado);

    // NOMBRE DEL ARCHIVO Y CHARSET


    header('Content-Type:text/cvs; charset=latin1');
    header('Content-Disposition: attachment; filename="Reporte_estado_usuario.csv"');


    // Salida del archivo
    $salida = fopen('php://output', 'w');

    fputcsv($salida, array('Nro documento', 'Nombre', 'Apellido', 'Estado'));

    for ($i=0; $i < count($listaUsuarios); $i++) { 
        fputcsv($salida, array($listaUsuarios[$i]->getId_usuario(),
                                $listaUsuarios[$i]->getNombre(),
                                $listaUsuarios[$i]->getApellido(),
                                $listaUsuarios[$i]->getEstado())
                );
    }

}






?>