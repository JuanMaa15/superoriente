<?php

require_once '../../models/DAO/UsuarioDAO.php';
require_once '../../public/libs/PhpSpreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\{Spreadsheet, IOFactory};
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;

if (isset($_POST['btn-reporte-empleados-filtros'])) {

    $usuariodao = new UsuarioDAO();

    $listaUsuarios;

    $tipo_documento = isset($_POST['tipo_documento']) ? "AND tu.id_tipo_documento" . $_POST['tipo_documento'] : "";
    $tipo_vivienda = isset($_POST['casa']) ? "AND tu.id_casa = " . $_POST['casa'] : "";
    $estrato = isset($_POST['estrato']) ? "AND tu.estrato = " . $_POST['estrato'] : "";
    $genero = isset($_POST['genero']) ? "AND tu.id_genero = " . $_POST['genero'] : "";
    $lugar_residencia = isset($_POST['lugar_residencia']) ? "AND tu.id_lugar_residencia = " . $_POST['lugar_residencia'] : "";
    $estado_civil = isset($_POST['tipo_documento']) ? "AND tu.id_nivel_academico = " . $_POST['tipo_documento'] : "";
    $nivel_academico = isset($_POST['estado_civil']) ? "AND tu.id_estado_civil = " . $_POST['estado_civil'] : "";
    $eps = isset($_POST['eps']) ? "AND tu.id_eps = " . $_POST['eps'] : "";
    $tipo_sangre_rh = isset($_POST['tbl_tipo_sangre_rh']) ? "AND tu.id_tipo_sangre_rh = " . $_POST['tbl_tipo_sangre_rh'] : "";
    $sucursal = isset($_POST['sucursal']) ? "AND tu.id_sucursal = " . $_POST['sucursal'] : "";
    $tipo_contrato = isset($_POST['tipo_contrato']) ? "AND tu.id_tipo_contrato = " . $_POST['tipo_contrato'] : "";
    $cesantia = isset($_POST['cesantia']) ? "AND tu.id_cesantia = " . $_POST['cesantia'] : "";
    $clase_riesgo = isset($_POST['clase_riesgo']) ? "AND tu.id_clase_riesgo = " . $_POST['clase_riesgo'] : "";
    $seccion = isset($_POST['seccion']) ? "AND tu.id_seccion = " . $_POST['seccion'] : "";
    $area = isset($_POST['area']) ? "AND tu.id_area = " . $_POST['area'] : "";
    $cargo = isset($_POST['cargo']) ? "AND tu.id_cargo = " . $_POST['cargo'] : "";
    $pension = isset($_POST['pension']) ? "AND tu.id_pension = " . $_POST['pension'] : "";
    $tipo_dotacion = isset($_POST['tipo_dotacion']) ? "AND tu.id_tipo_dotacion = " . $_POST['tipo_dotacion'] : "";
    $estado = isset($_POST['estado']) ? "AND tu.id_estado = " . $_POST['estado'] : "";
    $hijos = isset($_POST['hijo']) ? intval($_POST['hijo']) : "";
    $salario1 = isset($_POST['salario1']) ? $_POST['salario1'] : "";
    $salario2 = isset($_POST['salario2']) ? $_POST['salario2'] : "";
    $fecha1 = isset($_POST['fecha1']) ? $_POST['fecha1'] : "";
    $fecha2 = isset($_POST['fecha2']) ? $_POST['fecha2'] : "";
    $salarioF = "";
    $fechaF = "";
    if ($salario1 != "" && $salario2 != "") {
        $salarioF = "AND salario BETWEEN " . $salario1 . " AND " . $salario2;
    }

    if ($fecha1 != "" && $fecha2 != "") {
        $fechaF = "AND fecha_ingreso BETWEEN '" . $fecha1 . "' AND '" . $fecha2. "'";
    }
    
     

    $listaUsuarios = $usuariodao->listaUsuarioFiltros($tipo_documento, $tipo_vivienda, $estrato, $genero, $lugar_residencia, $nivel_academico, $estado_civil, $eps, $tipo_sangre_rh, $sucursal, $tipo_contrato, $cesantia, $clase_riesgo, $seccion, $area, $cargo, $pension, $tipo_dotacion, $estado, $salarioF, $fechaF); 

    $listaUsuariosHijos = [];

    for ($i=0; $i < count($listaUsuarios); $i++) { 
        
        $listaUsuariosHijos[$i] = $usuariodao->listaUsuarioFiltroHijos($listaUsuarios[$i]->getId_usuario(), $tipo_documento, $tipo_vivienda, $estrato, $genero, $lugar_residencia, $nivel_academico, $estado_civil, $eps, $tipo_sangre_rh, $sucursal, $tipo_contrato, $cesantia, $clase_riesgo, $seccion, $area, $cargo, $pension, $tipo_dotacion, $estado, $salarioF, $fechaF); 

    }
    // NOMBRE DEL ARCHIVO Y CHARSET


    header('Content-Type:text/cvs; charset=utf-8');
    header('Content-Disposition: attachment; filename="Reporte_filtros_usuario.csv"');


    // Salida del archivo
    $salida = fopen('php://output', 'w');


    $tableHead =[
        'font'=>[
            'color'=>[
                'rgb'=>'000'
            ]
        ],
        'fill'=>[
            'fillType' => Fill::FILL_SOLID,
            'startColor' => [
                'rgb'=>'32CD32'
            ]
        ]
    ];

    $excel = new Spreadsheet();
    $hojaActiva = $excel->getActiveSheet();
    $hojaActiva->setTitle("Reporte dotación");

    $hojaActiva->getColumnDimension('A')->setWidth(20);
    $hojaActiva->getColumnDimension('B')->setWidth(20);
    $hojaActiva->getColumnDimension('C')->setWidth(30);
    $hojaActiva->getColumnDimension('D')->setWidth(20);
    $hojaActiva->getColumnDimension('E')->setWidth(20);
    $hojaActiva->getColumnDimension('F')->setWidth(20);
    $hojaActiva->getColumnDimension('G')->setWidth(20);
    $hojaActiva->getColumnDimension('H')->setWidth(20);
    $hojaActiva->getColumnDimension('I')->setWidth(10);
    $hojaActiva->getColumnDimension('J')->setWidth(20);
    $hojaActiva->getColumnDimension('K')->setWidth(20);
    $hojaActiva->getColumnDimension('L')->setWidth(20);
    $hojaActiva->getColumnDimension('M')->setWidth(10);
    $hojaActiva->getColumnDimension('N')->setWidth(30);
    $hojaActiva->getColumnDimension('O')->setWidth(20);
    $hojaActiva->getColumnDimension('P')->setWidth(20);
    $hojaActiva->getColumnDimension('Q')->setWidth(20);
    $hojaActiva->getColumnDimension('R')->setWidth(20);
    $hojaActiva->getColumnDimension('S')->setWidth(20);
    $hojaActiva->getColumnDimension('T')->setWidth(20);
    $hojaActiva->getColumnDimension('U')->setWidth(20);
    $hojaActiva->getColumnDimension('V')->setWidth(30);
    $hojaActiva->getColumnDimension('W')->setWidth(30);
    $hojaActiva->getColumnDimension('X')->setWidth(30);
    $hojaActiva->getColumnDimension('Y')->setWidth(30);
    $hojaActiva->getColumnDimension('Z')->setWidth(30);
    $hojaActiva->getColumnDimension('AA')->setWidth(30);
    $hojaActiva->getColumnDimension('AB')->setWidth(10);
    $hojaActiva->getColumnDimension('AC')->setWidth(20);
    $hojaActiva->getColumnDimension('AD')->setWidth(10);
    $hojaActiva->getColumnDimension('AE')->setWidth(20);
    $hojaActiva->getColumnDimension('AF')->setWidth(20);
    $hojaActiva->getColumnDimension('AG')->setWidth(20);
    $hojaActiva->getColumnDimension('AH')->setWidth(10);
    $hojaActiva->getColumnDimension('AI')->setWidth(20);
    $hojaActiva->getColumnDimension('AJ')->setWidth(20);
    $hojaActiva->getColumnDimension('AK')->setWidth(20);
    $hojaActiva->getColumnDimension('AL')->setWidth(10);
    $hojaActiva->getColumnDimension('AM')->setWidth(10);
    $hojaActiva->getColumnDimension('AN')->setWidth(10);
    $hojaActiva->getColumnDimension('AO')->setWidth(10);
    $hojaActiva->getColumnDimension('AP')->setWidth(20);
    $hojaActiva->getColumnDimension('AQ')->setWidth(10);
    $hojaActiva->getColumnDimension('AR')->setWidth(20);
    $hojaActiva->getColumnDimension('AS')->setWidth(30);
    $hojaActiva->getColumnDimension('AT')->setWidth(20);
    $hojaActiva->getColumnDimension('AU')->setWidth(30);
    $hojaActiva->getColumnDimension('AV')->setWidth(20);
    $hojaActiva->getColumnDimension('AW')->setWidth(20);
    $hojaActiva->getColumnDimension('AX')->setWidth(20);
    $hojaActiva->getColumnDimension('AY')->setWidth(20);
    $hojaActiva->getColumnDimension('AZ')->setWidth(10);
    $hojaActiva->getColumnDimension('AA')->setWidth(10);

    $hojaActiva->getRowDimension(1)->setRowHeight(25);
    
    $hojaActiva->getStyle(1)->applyFromArray($tableHead);
    $hojaActiva->getStyle(1)->getFont()->setSize('11');
    $hojaActiva->getStyle(1)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $hojaActiva->getStyle(1)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

    $hojaActiva->setCellValue('A1', 'NRO DOCUMENTO');
    $hojaActiva->setCellValue('B1', 'FECHA DE EXPEDICION');
    $hojaActiva->setCellValue('C1', 'LUGAR DE EXPEDICION');
    $hojaActiva->setCellValue('D1', 'NOMBRE');
    $hojaActiva->setCellValue('E1', 'APELLIDO');
    $hojaActiva->setCellValue('F1', 'TELEFONO FIJO');
    $hojaActiva->setCellValue('G1', 'TELEFONO MOVIL');
    $hojaActiva->setCellValue('H1', 'TIPO DE VIVIENDA');
    $hojaActiva->setCellValue('I1', 'ESTRATO');
    $hojaActiva->setCellValue('J1', 'FECHA DE NACIMIENTO');
    $hojaActiva->setCellValue('K1', 'FECHA ACTUAL');
    $hojaActiva->setCellValue('L1', 'ANTIGUEDAD');
    $hojaActiva->setCellValue('M1', 'EDAD');
    $hojaActiva->setCellValue('N1', 'DIRECCION');
    $hojaActiva->setCellValue('O1', 'LUGAR DE RESIDENCIA');
    $hojaActiva->setCellValue('P1', 'NIVEL ACADEMICO');
    $hojaActiva->setCellValue('Q1', 'AREA ACADEMICA');
    $hojaActiva->setCellValue('R1', 'ESTADO CIVIL');
    $hojaActiva->setCellValue('S1', 'EPS');
    $hojaActiva->setCellValue('T1', 'NRO DE CUENTA');
    $hojaActiva->setCellValue('U1', 'TIPO DE SANGRE Y RH');
    $hojaActiva->setCellValue('V1', 'ANTECEDENTES');
    $hojaActiva->setCellValue('W1', '¿PRACTICA DEPORTE?');
    $hojaActiva->setCellValue('X1', 'CONSUMO DE CIGARRROS');
    $hojaActiva->setCellValue('Y1', 'CONSUMO DE LICOR');
    $hojaActiva->setCellValue('Z1', 'CONSUMO DE SPA');
    $hojaActiva->setCellValue('AA1', 'CORREO');
    //$hojaActiva->setCellValue('H1', 'PASSWORD');
    $hojaActiva->setCellValue('AB1', 'PERFIL');
    $hojaActiva->setCellValue('AC1', 'PERSONA DE EMERGENCIA');
    $hojaActiva->setCellValue('AD1', 'TELEFONO FIJO');
    $hojaActiva->setCellValue('AE1', 'TELEFONO MOVIL');
    $hojaActiva->setCellValue('AF1', 'PARENTESCO');

    $hojaActiva->setCellValue('AG1', 'SUCURSAL');
    $hojaActiva->setCellValue('AH1', 'TIPO DE CONTRATO');
    $hojaActiva->setCellValue('AI1', 'FECHA DE INGRESO');
    $hojaActiva->setCellValue('AJ1', 'FECHA DE RETIRO');
    $hojaActiva->setCellValue('AK1', 'MOTIVO DE RETIRO');
    $hojaActiva->setCellValue('AL1', 'CESANTIA');
    $hojaActiva->setCellValue('AM1', 'SALARIO');
    $hojaActiva->setCellValue('AN1', 'VALOR DIA');
    $hojaActiva->setCellValue('AO1', 'VALOR HORA');
    $hojaActiva->setCellValue('AP1', 'CLASE DE RIESGO');
    $hojaActiva->setCellValue('AQ1', 'AREA');
    $hojaActiva->setCellValue('AR1', 'SECCION');
    $hojaActiva->setCellValue('AS1', 'CARGO');
    $hojaActiva->setCellValue('AT1', 'PENSION');
    $hojaActiva->setCellValue('AU1', 'TIPO DE DOTACION');
    $hojaActiva->setCellValue('AV1', 'CAMISA');
    $hojaActiva->setCellValue('AW1', 'PANTALON');
    $hojaActiva->setCellValue('AX1', 'ZAPATO');
    $hojaActiva->setCellValue('AY1', 'ESTADO');


    

    $fila = 2;

    if ($hijos != "") {
        $hojaActiva->setCellValue('AZ1', 'HIJOS');
        for ($i=0; $i < count($listaUsuarios); $i++) { 
            if ($listaUsuariosHijos[$i]->getHijos() == $hijos) {

                

                $hojaActiva->setCellValue('A'.$fila, $listaUsuarios[$i]->getId_usuario());
                $hojaActiva->setCellValue('B'.$fila, $listaUsuarios[$i]->getFecha_expedicion());
                $hojaActiva->setCellValue('C'.$fila, $listaUsuarios[$i]->getLugar_expedicion());
                $hojaActiva->setCellValue('D'.$fila, $listaUsuarios[$i]->getNombre());
                $hojaActiva->setCellValue('E'.$fila, $listaUsuarios[$i]->getApellido());
                $hojaActiva->setCellValue('F'.$fila, $listaUsuarios[$i]->getTelefono_fijo());
                $hojaActiva->setCellValue('G'.$fila, $listaUsuarios[$i]->getTelefono_movil());
                $hojaActiva->setCellValue('H'.$fila, $listaUsuarios[$i]->getTipo_casa());
                $hojaActiva->setCellValue('I'.$fila, $listaUsuarios[$i]->getEstrato());
                $hojaActiva->setCellValue('J'.$fila, $listaUsuarios[$i]->getFecha_nacimiento());
                $hojaActiva->setCellValue('K'.$fila, $listaUsuarios[$i]->getFecha_actual());
                $hojaActiva->setCellValue('L'.$fila, $listaUsuarios[$i]->getAntiguedad());
                $hojaActiva->setCellValue('M'.$fila, $listaUsuarios[$i]->getEdad());
                $hojaActiva->setCellValue('N'.$fila, $listaUsuarios[$i]->getDireccion());
                $hojaActiva->setCellValue('O'.$fila, $listaUsuarios[$i]->getLugar_residencia());
                $hojaActiva->setCellValue('P'.$fila, $listaUsuarios[$i]->getNivel_academico());
                $hojaActiva->setCellValue('Q'.$fila, $listaUsuarios[$i]->getArea_academica());
                $hojaActiva->setCellValue('R'.$fila, $listaUsuarios[$i]->getEstado_civil());
                $hojaActiva->setCellValue('S'.$fila, $listaUsuarios[$i]->getEps());
                $hojaActiva->setCellValue('T'.$fila, $listaUsuarios[$i]->getNro_cuenta());
                $hojaActiva->setCellValue('U'.$fila, $listaUsuarios[$i]->getTipo_sangre());
                $hojaActiva->setCellValue('V'.$fila, $listaUsuarios[$i]->getAntecedentes());
                $hojaActiva->setCellValue('W'.$fila, $listaUsuarios[$i]->getPractica_deporte());
                $hojaActiva->setCellValue('X'.$fila, $listaUsuarios[$i]->getConsumo_cigarros());
                $hojaActiva->setCellValue('Y'.$fila, $listaUsuarios[$i]->getConsumo_licor());
                $hojaActiva->setCellValue('Z'.$fila, $listaUsuarios[$i]->getConsumo_spa());
                $hojaActiva->setCellValue('AA'.$fila, $listaUsuarios[$i]->getCorreo());
               // $hojaActiva->setCellValue('AB'.$fila, $listaUsuarios[$i]->getPassword());
                $hojaActiva->setCellValue('AB'.$fila, $listaUsuarios[$i]->getPerfil());
                $hojaActiva->setCellValue('AC'.$fila, $listaUsuarios[$i]->getNombre_persona_emergencia());
                $hojaActiva->setCellValue('AD'.$fila, $listaUsuarios[$i]->getTelefono_emergencia());
                $hojaActiva->setCellValue('AE'.$fila, $listaUsuarios[$i]->getCelular_emergencia());
                $hojaActiva->setCellValue('AF'.$fila, $listaUsuarios[$i]->getParentesco_emergencia());

                $hojaActiva->setCellValue('AG'.$fila, $listaUsuarios[$i]->getSucursal());
                $hojaActiva->setCellValue('AH'.$fila, $listaUsuarios[$i]->getTipo_contrato());
                $hojaActiva->setCellValue('AI'.$fila, $listaUsuarios[$i]->getFecha_ingreso());
                $hojaActiva->setCellValue('AJ'.$fila, $listaUsuarios[$i]->getFecha_retiro());
                $hojaActiva->setCellValue('AK'.$fila, $listaUsuarios[$i]->getMotivo_retiro());
                $hojaActiva->setCellValue('AL'.$fila, $listaUsuarios[$i]->getCesantia());
                $hojaActiva->setCellValue('AM'.$fila, $listaUsuarios[$i]->getSalario());
                $hojaActiva->setCellValue('AN'.$fila, $listaUsuarios[$i]->getValor_dia());
                $hojaActiva->setCellValue('AO'.$fila, $listaUsuarios[$i]->getValor_hora());
                $hojaActiva->setCellValue('AP'.$fila, $listaUsuarios[$i]->getClase_riesgo());
                $hojaActiva->setCellValue('AQ'.$fila, $listaUsuarios[$i]->getArea());
                $hojaActiva->setCellValue('AR'.$fila, $listaUsuarios[$i]->getSeccion());
                $hojaActiva->setCellValue('AS'.$fila, $listaUsuarios[$i]->getCargo());
                $hojaActiva->setCellValue('AT'.$fila, $listaUsuarios[$i]->getPension());
                $hojaActiva->setCellValue('AU'.$fila, $listaUsuarios[$i]->getTipo_dotacion());
                $hojaActiva->setCellValue('AV'.$fila, $listaUsuarios[$i]->getCamisa());
                $hojaActiva->setCellValue('AW'.$fila, $listaUsuarios[$i]->getPantalon());
                $hojaActiva->setCellValue('AX'.$fila, $listaUsuarios[$i]->getZapato());
                $hojaActiva->setCellValue('AY'.$fila, $listaUsuarios[$i]->getEstado());
                $hojaActiva->setCellValue('AZ'.$fila, $listaUsuarios[$i]->getHijos());

                $fila++;

            }
            

        }
    }else{
        for ($i=0; $i < count($listaUsuarios); $i++) { 
            $hojaActiva->setCellValue('A'.$fila, $listaUsuarios[$i]->getId_usuario());
            $hojaActiva->setCellValue('B'.$fila, $listaUsuarios[$i]->getFecha_expedicion());
            $hojaActiva->setCellValue('C'.$fila, $listaUsuarios[$i]->getLugar_expedicion());
            $hojaActiva->setCellValue('D'.$fila, $listaUsuarios[$i]->getNombre());
            $hojaActiva->setCellValue('E'.$fila, $listaUsuarios[$i]->getApellido());
            $hojaActiva->setCellValue('F'.$fila, $listaUsuarios[$i]->getTelefono_fijo());
            $hojaActiva->setCellValue('G'.$fila, $listaUsuarios[$i]->getTelefono_movil());
            $hojaActiva->setCellValue('H'.$fila, $listaUsuarios[$i]->getTipo_casa());
            $hojaActiva->setCellValue('I'.$fila, $listaUsuarios[$i]->getEstrato());
            $hojaActiva->setCellValue('J'.$fila, $listaUsuarios[$i]->getFecha_nacimiento());
            $hojaActiva->setCellValue('K'.$fila, $listaUsuarios[$i]->getFecha_actual());
            $hojaActiva->setCellValue('L'.$fila, $listaUsuarios[$i]->getAntiguedad());
            $hojaActiva->setCellValue('M'.$fila, $listaUsuarios[$i]->getEdad());
            $hojaActiva->setCellValue('N'.$fila, $listaUsuarios[$i]->getDireccion());
            $hojaActiva->setCellValue('O'.$fila, $listaUsuarios[$i]->getLugar_residencia());
            $hojaActiva->setCellValue('P'.$fila, $listaUsuarios[$i]->getNivel_academico());
            $hojaActiva->setCellValue('Q'.$fila, $listaUsuarios[$i]->getArea_academica());
            $hojaActiva->setCellValue('R'.$fila, $listaUsuarios[$i]->getEstado_civil());
            $hojaActiva->setCellValue('S'.$fila, $listaUsuarios[$i]->getEps());
            $hojaActiva->setCellValue('T'.$fila, $listaUsuarios[$i]->getNro_cuenta());
            $hojaActiva->setCellValue('U'.$fila, $listaUsuarios[$i]->getTipo_sangre());
            $hojaActiva->setCellValue('V'.$fila, $listaUsuarios[$i]->getAntecedentes());
            $hojaActiva->setCellValue('W'.$fila, $listaUsuarios[$i]->getPractica_deporte());
            $hojaActiva->setCellValue('X'.$fila, $listaUsuarios[$i]->getConsumo_cigarros());
            $hojaActiva->setCellValue('Y'.$fila, $listaUsuarios[$i]->getConsumo_licor());
            $hojaActiva->setCellValue('Z'.$fila, $listaUsuarios[$i]->getConsumo_spa());
            $hojaActiva->setCellValue('AA'.$fila, $listaUsuarios[$i]->getCorreo());
           // $hojaActiva->setCellValue('AB'.$fila, $listaUsuarios[$i]->getPassword());
            $hojaActiva->setCellValue('AB'.$fila, $listaUsuarios[$i]->getPerfil());
            $hojaActiva->setCellValue('AC'.$fila, $listaUsuarios[$i]->getNombre_persona_emergencia());
            $hojaActiva->setCellValue('AD'.$fila, $listaUsuarios[$i]->getTelefono_emergencia());
            $hojaActiva->setCellValue('AE'.$fila, $listaUsuarios[$i]->getCelular_emergencia());
            $hojaActiva->setCellValue('AF'.$fila, $listaUsuarios[$i]->getParentesco_emergencia());

            $hojaActiva->setCellValue('AG'.$fila, $listaUsuarios[$i]->getSucursal());
            $hojaActiva->setCellValue('AH'.$fila, $listaUsuarios[$i]->getTipo_contrato());
            $hojaActiva->setCellValue('AI'.$fila, $listaUsuarios[$i]->getFecha_ingreso());
            $hojaActiva->setCellValue('AJ'.$fila, $listaUsuarios[$i]->getFecha_retiro());
            $hojaActiva->setCellValue('AK'.$fila, $listaUsuarios[$i]->getMotivo_retiro());
            $hojaActiva->setCellValue('AL'.$fila, $listaUsuarios[$i]->getCesantia());
            $hojaActiva->setCellValue('AM'.$fila, $listaUsuarios[$i]->getSalario());
            $hojaActiva->setCellValue('AN'.$fila, $listaUsuarios[$i]->getValor_dia());
            $hojaActiva->setCellValue('AO'.$fila, $listaUsuarios[$i]->getValor_hora());
            $hojaActiva->setCellValue('AP'.$fila, $listaUsuarios[$i]->getClase_riesgo());
            $hojaActiva->setCellValue('AQ'.$fila, $listaUsuarios[$i]->getArea());
            $hojaActiva->setCellValue('AR'.$fila, $listaUsuarios[$i]->getSeccion());
            $hojaActiva->setCellValue('AS'.$fila, $listaUsuarios[$i]->getCargo());
            $hojaActiva->setCellValue('AT'.$fila, $listaUsuarios[$i]->getPension());
            $hojaActiva->setCellValue('AU'.$fila, $listaUsuarios[$i]->getTipo_dotacion());
            $hojaActiva->setCellValue('AV'.$fila, $listaUsuarios[$i]->getTalla_camisa());
            $hojaActiva->setCellValue('AW'.$fila, $listaUsuarios[$i]->getTalla_pantalon());
            $hojaActiva->setCellValue('AX'.$fila, $listaUsuarios[$i]->getTalla_zapato());
            $hojaActiva->setCellValue('AY'.$fila,$listaUsuarios[$i]->getEstado());
            $fila++;

        }
    }

    
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="reporte_usuario.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = IOFactory::createWriter($excel, 'Xlsx');
    $writer->save('php://output');

    exit;
    

}

?>