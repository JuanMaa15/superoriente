<?php

require_once ("../../models/DAO/UsuarioDAO.php");

if (isset($_POST['btn-reporte-salario'])) {

    $usuariodao = new UsuarioDAO();

    $inicio_salario = $_POST['inicio_salario'];
    $fin_salario = $_POST['fin_salario'];

    $listaUsuarios = $usuariodao->ListaSalarioUsuario($inicio_salario, $fin_salario);

    // NOMBRE DEL ARCHIVO Y CHARSET

    header('Content-Type:text/cvs; charset=latin1');
    header('Content-Disposition: attachment; filename="Reporte_salario_empleados.csv"');


    // Salida del archivo
    $salida = fopen('php://output', 'w');

    fputcsv($salida, array('Nro documento', 'Nombre', 'Apellido', 'Salario'));

    for ($i=0; $i < count($listaUsuarios); $i++) { 
        fputcsv($salida, array($listaUsuarios[$i]->getId_usuario(),
                                $listaUsuarios[$i]->getNombre(),
                                $listaUsuarios[$i]->getApellido(),
                                $listaUsuarios[$i]->getSalario())
                );
    }

    

}




?>