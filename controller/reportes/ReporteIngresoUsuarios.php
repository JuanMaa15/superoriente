<?php

require_once ("../../models/DAO/UsuarioDAO.php");

if (isset($_POST['btn-reporte-ingreso'])) {

    $usuariodao = new UsuarioDAO();

    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];

    $listaUsuarios = $usuariodao->ListaFechaUsuario($fecha_inicio, $fecha_fin);

    // NOMBRE DEL ARCHIVO Y CHARSET

    header('Content-Type:text/cvs; charset=latin1');
    header('Content-Disposition: attachment; filename="Reporte_fechas_ingreso.csv"');


    // Salida del archivo
    $salida = fopen('php://output', 'w');

    fputcsv($salida, array('Nro documento', 'Nombre', 'Apellido', 'Fecha de ingreso', 'Fecha de fin'));

    for ($i=0; $i < count($listaUsuarios); $i++) { 
        fputcsv($salida, array($listaUsuarios[$i]->getId_usuario(),
                                $listaUsuarios[$i]->getNombre(),
                                $listaUsuarios[$i]->getApellido(),
                                $listaUsuarios[$i]->getFecha_ingreso(),
                                $listaUsuarios[$i]->getFecha_retiro())
                );
    }

    

}




?>