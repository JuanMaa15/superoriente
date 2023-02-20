<?php

require ("../../public/libs/tfpdf/tfpdf.php");

require_once ("../../models/DAO/UsuarioDAO.php");
require_once ("../../models/DAO/TipoContratoDAO.php");


setlocale(LC_TIME, "spanish");


$id_usuario = $_GET['id'];

$usuariodao = new UsuarioDAO();

$usuariodto = $usuariodao->listaUsuario($id_usuario);


$usuarioCamisa = $usuariodao->traerCamisas($id_usuario);
$usuarioPantalon = $usuariodao->traerPantalones($id_usuario);
$usuarioZapato = $usuariodao->traerZapatos($id_usuario);
$usuarioVestimenta = $usuariodao->traerVestimenta($id_usuario);

$pdf = new tFPDF('L', 'mm', array(200, 280));
$pdf->SetMargins(30, 10 , 30);
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);
$pdf->Cell(40,0,'SUPERORIENTE S.A', 0,0, 'C');
$pdf->Ln(7);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(12,0,'Recursos Humanos', 0,0, 'C');
$pdf->Ln(10);
$pdf->Cell(1,0,'Empleado:', 0,0, 'C');
$pdf->Cell(290,0,'Nota de entrega:', 0,0, 'C');
$pdf->Ln(10);
$pdf->SetFont('Arial','',11);
$pdf->Cell(85,0, utf8_decode('Nombre: '. $usuariodto->getNombre(). " " . $usuariodto->getApellido()), 0,0, 'C');
$pdf->Ln(10);
$pdf->Cell(40,0,'Documento: '. $usuariodto->getId_usuario(),0,0,'C');
$pdf->Ln(13);
$pdf->Cell(33,0,'Fecha: '. date("d-m-Y"), 0,0, 'C' );
$pdf->Cell(260,0,'Entrega Recurso Humano Superoriente', 0,0, 'C' );
$pdf->Ln(15);
$pdf->Cell(30,10,utf8_decode('Código'),1,0,'L');
$pdf->Cell(80,10,utf8_decode('Descripción'),1,0,'L');
$pdf->Cell(33,10,utf8_decode('Cantidad'),1,0,'L');
$pdf->Cell(33,10,utf8_decode('Precio'),1,0,'L');
$pdf->Cell(33,10,utf8_decode('Total'),1,0,'L');
$pdf->Ln(15);

if ($usuarioCamisa != null) {
    $pdf->Cell(30,10,utf8_decode("001"),0,0,'L');
    $pdf->Cell(80,10,utf8_decode($usuarioCamisa->getCamisa()),0,0,'L');
    $pdf->Cell(33,10,utf8_decode($usuarioCamisa->getCant_camisa()),0,0,'L');
    $pdf->Ln(5);
}

if ($usuarioPantalon != null) {
    $pdf->Cell(30,10,utf8_decode("002"),0,0,'L');
    $pdf->Cell(80,10,utf8_decode($usuarioPantalon->getPantalon()),0,0,'L');
    $pdf->Cell(33,10,utf8_decode($usuarioPantalon->getCant_pantalon()),0,0,'L');
    $pdf->Ln(5);
}

if ($usuarioZapato != null) {
    $pdf->Cell(30,10,utf8_decode("003"),0,0,'L');
    $pdf->Cell(80,10,utf8_decode($usuarioZapato->getZapato()),0,0,'L');
    $pdf->Cell(33,10,utf8_decode($usuarioZapato->getCant_zapato()),0,0,'L');
    $pdf->Ln(5);
}

if ($usuarioVestimenta != null) {
    $pdf->Cell(30,10,utf8_decode("004"),0,0,'L');
    $pdf->Cell(80,10,utf8_decode($usuarioVestimenta->getVestimenta()),0,0,'L');
    $pdf->Cell(33,10,utf8_decode($usuarioVestimenta->getCant_vestimenta()),0,0,'L');
}

$pdf->Ln(20);
$pdf->Cell(120,0,utf8_decode('El suscrito en mi condición de empleado de SUPERORIENTE S.A.'), 0,0, 'C' );
$pdf->Ln(5);
$pdf->Cell(150,0, utf8_decode('Identificado con el número de cédula de ciudadanía que aparece al pie de mi firma,'), 0,0, 'C' );
$pdf->Ln(5);
$pdf->Cell(135,0,utf8_decode('dejo constancia de que en la fecha recibo de la EMPLEADORA la dotación'), 0,0, 'C' );
$pdf->Ln(5);
$pdf->Cell(50,0,utf8_decode('anterior corresponde a la '), 0,0, 'C' );
$pdf->Cell(20,0,'', 1,0, 'L' );
$pdf->Ln(5);
$pdf->Cell(95,0,utf8_decode('del año, señalada por la Ley Laboral para el mes de '), 0,0, 'C' );
$pdf->Cell(30,0,'', 1,0, 'L' );
$pdf->Ln(10);
$pdf->Cell(300,0,utf8_decode('Firma:'), 0,0, 'C' );
$pdf->Ln(10);
$pdf->Cell(300,0,utf8_decode('CC:'), 0,0, 'C' );

$pdf->Output();
?>