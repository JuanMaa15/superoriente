<?php

require_once '../../models/DAO/UsuarioDAO.php';
require_once '../../models/DAO/TipoCamisaDAO.php';
require_once '../../models/DAO/TipoPantalonDAO.php';
require_once '../../models/DAO/TipoZapatoDAO.php';
require_once '../../public/libs/PhpSpreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\{Spreadsheet, IOFactory};
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;

//use PhpOffice\PhpSpreadsheet\IOFactory;

if (isset($_POST)) {


    $genero = isset($_POST['genero']) ? "AND tu.id_genero = " . $_POST['genero'] : "";
    $sucursal = isset($_POST['sucursal']) ? "AND tu.id_sucursal = " . $_POST['sucursal'] : "";
    $tipo_dotacion = isset($_POST['tipo_dotacion']) ? "AND tu.id_tipo_dotacion = " . $_POST['tipo_dotacion'] : "";
    $talla_camisa = isset($_POST['talla_camisa']) ? "AND tu.talla_camisa = '" . $_POST['talla_camisa'] . "'" : "";
    $talla_pantalon = isset($_POST['talla_pantalon']) ? "AND tu.talla_pantalon = '".  $_POST['talla_pantalon'] . "'" : "";
    $talla_zapato = isset($_POST['talla_zapato']) ? "AND tu.talla_zapato = '" . $_POST['talla_zapato'] . "'" : "";
    $tipo_camisa = isset($_POST['tipo_camisa']) ? $_POST['tipo_camisa'] : "";
    $tipo_pantalon = isset($_POST['tipo_pantalon']) ? $_POST['tipo_pantalon'] : "";
    $tipo_zapato = isset($_POST['tipo_zapato']) ? $_POST['tipo_zapato'] : "";
    $camisa = "";
    $pantalon = "";
    $zapato = "";
    $tipo = "";
    $ropa = "";
    
    $tipoCamisadao = new TipoCamisaDAO();
    $listaTiposCamisas = $tipoCamisadao->listaTiposCamisas();
    $tipoPantalondao = new TipoPantalonDAO();
    $listaTiposPantalones = $tipoPantalondao->listaTiposPantalones();
    $tipoZapatodao = new TipoZapatoDAO();
    $listaTiposZapatos = $tipoZapatodao->listaTiposZapatos();
     

    $validar_existencias = false;
    $campos = array();
    $cant_caracteres = "";

    $usuariodao = new UsuarioDAO();
    $revisar = "";

    $listaUsuarios;

    if ($tipo_camisa != "") {
        for ($j=0; $j < count($listaTiposCamisas); $j++) { 
            if ($listaTiposCamisas[$j]->getId_tipo_camisa() == intval($tipo_camisa)) {
                $tipo = $listaTiposCamisas[$j]->getNombre();
            }   
        }
        $ropa = "CAMISA";

    }else if($tipo_pantalon != "") {
        for ($j=0; $j < count($listaTiposPantalones); $j++) { 
            if ($listaTiposPantalones[$j]->getId_tipo_pantalon() == intval($tipo_pantalon)) {
                $tipo = $listaTiposPantalones[$j]->getNombre();
            }   
        }
        
        $ropa = "PANTALON";

    }else if($tipo_zapato != "") {
        for ($j=0; $j < count($listaTiposZapatos); $j++) { 
            if ($listaTiposZapatos[$j]->getId_tipo_zapato() == intval($tipo_zapato)) {
                $tipo = $listaTiposZapatos[$j]->getNombre();
            }   
        }
    
        $ropa = "ZAPATO";
    }else{
        $ropa = "";
    }

    $camisa = $talla_camisa;
    $pantalon = $talla_pantalon;
    $zapato = $talla_zapato;

    $listaUsuarios = $usuariodao->listaDotacionFiltros($genero, $sucursal, $tipo_dotacion, $camisa, $pantalon, $zapato); 

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
    $hojaActiva->getColumnDimension('B')->setWidth(30);
    $hojaActiva->getColumnDimension('C')->setWidth(30);
    $hojaActiva->getColumnDimension('D')->setWidth(20);
    $hojaActiva->getColumnDimension('E')->setWidth(20);
    $hojaActiva->getColumnDimension('F')->setWidth(20);
    $hojaActiva->getColumnDimension('G')->setWidth(20);
    $hojaActiva->getColumnDimension('H')->setWidth(10);

    $hojaActiva->getRowDimension(1)->setRowHeight(25);
    
    $hojaActiva->getStyle(1)->applyFromArray($tableHead);
    $hojaActiva->getStyle(1)->getFont()->setSize('11');
    $hojaActiva->getStyle(1)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $hojaActiva->getStyle(1)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

    $hojaActiva->setCellValue('A1', 'NRO DOCUMENTO');
    $hojaActiva->setCellValue('B1', 'NOMBRE');
    $hojaActiva->setCellValue('C1', 'APELLIDO');
    $hojaActiva->setCellValue('D1', 'SUCURSAL');
    $hojaActiva->setCellValue('E1', 'TIPO DE DOTACION');
    $hojaActiva->setCellValue('F1', 'GENERO');
    $hojaActiva->setCellValue('G1', 'TIPO DE ' . $ropa);
    $hojaActiva->setCellValue('H1', 'TALLA');

    

    $fila = 2;

    for ($i=0; $i < count($listaUsuarios); $i++) { 
        $hojaActiva->setCellValue('A'.$fila, $listaUsuarios[$i]->getId_usuario());
        $hojaActiva->setCellValue('B'.$fila, $listaUsuarios[$i]->getNombre());
        $hojaActiva->setCellValue('C'.$fila, $listaUsuarios[$i]->getApellido());
        $hojaActiva->setCellValue('D'.$fila, $listaUsuarios[$i]->getSucursal());
        $hojaActiva->setCellValue('E'.$fila, $listaUsuarios[$i]->getTipo_dotacion());
        $hojaActiva->setCellValue('F'.$fila, $listaUsuarios[$i]->getGenero());
        $hojaActiva->setCellValue('G'.$fila, $ropa . " " . strtoupper($tipo));
        $hojaActiva->setCellValue('H'.$fila, $listaUsuarios[$i]->getTalla_camisa());
        $fila++;

    }

    $fila = $fila + 1;

    $hojaActiva->setCellValue('H'.$fila, "TOTAL: ".count($listaUsuarios));
    $hojaActiva->getStyle('H'.$fila)->applyFromArray($tableHead);

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="reporte_dotacion.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = IOFactory::createWriter($excel, 'Xlsx');
    $writer->save('php://output');

    exit;
}