<?php

require_once ("../../models/DAO/UsuarioDAO.php");

if (isset($_POST['btn-reporte-contrato'])) {

    $usuariodao = new UsuarioDAO();

    $contrato = intval($_POST['contrato']);

    $listaUsuarios = $usuariodao->ListaTipoContratoUsuario($contrato);

    // NOMBRE DEL ARCHIVO Y CHARSET


    header('Content-Type:text/cvs; charset=latin1');
    header('Content-Disposition: attachment; filename="Reporte_contrato_usuario.csv"');


    // Salida del archivo
    $salida = fopen('php://output', 'w');

    fputcsv($salida, array('Nro documento', 'Nombre', 'Apellido', 'Tipo de contrato'));

    for ($i=0; $i < count($listaUsuarios); $i++) { 
        fputcsv($salida, array($listaUsuarios[$i]->getId_usuario(),
                                $listaUsuarios[$i]->getNombre(),
                                $listaUsuarios[$i]->getApellido(),
                                $listaUsuarios[$i]->getTipo_contrato())
                );
    }

}






?>