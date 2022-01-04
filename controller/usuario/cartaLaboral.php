<?php

require ("../../public/libs/tfpdf/tfpdf.php");

require_once ("../../models/DAO/UsuarioDAO.php");
require_once ("../../models/DTO/UsuarioDTO.php");



$id_usuario = $_GET['doc'];

$usuariodao = new UsuarioDAO();

$usuariodto = $usuariodao->listaUsuario($id_usuario);

$genero = '';

if ($usuariodto->getGenero() == "masculino") {
    $genero = "El señor";
}else{
    $generp = "La señora";
}


$pdf = new tFPDF();
$pdf->SetMargins(30, 10 , 30);
$pdf->AddPage();
$pdf->SetFont('Arial','',12);


$pdf->Cell(70,60,'Rionegro, '. date('d M Y'), 0,1, 'L');

$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,0,'EL DEPARTAMENTO DE RECURSOS HUMANOS DE: ', 0,0, 'C');
$pdf->Ln(10);
$pdf->Cell(0,0,'SUPERORIENTE S.A', 0,0, 'C');
$pdf->Ln(10);
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,0,'Identificado con NIT. 800.045.218-4', 0,0, 'C');
$pdf->Ln(10);
$pdf->Cell(0,0,'HACE CONSTAR QUE:', 0,0, 'C');
$pdf->Ln(20);
$pdf->MultiCell(0,5,utf8_decode( $genero  . ' '. strtoupper($usuariodto->getNombre(). " ". $usuariodto->getApellido()) .' con número de cédula ' . $usuariodto->getId_usuario() . ' labora en esta empresa con un contrato ' . $usuariodto->getTipo_contrato() . ', desde ' . $usuariodto->getFecha_inicio() . ' desempeñándose bajo el cargo de ' . strtoupper($usuariodto->getCargo()) . ', devengando un salario $' . intval($usuariodto->getSueldo()) . '.'), 'C');

$pdf->Ln(20);
$pdf->Cell(0,0,'Dicho certificado se expide a solicitud verbal de la interesada.', 0,0, 'L');
$pdf->Ln(20);
$pdf->Cell(0,0,'Atentamente,', 0,0, 'L');
$pdf->Ln(50);
$pdf->Image('../../view/img/firma.png', 30, 200,50);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,0,'CRISTINA LLANO HURTADO', 0,0, 'L');
$pdf->Ln(5);
$pdf->Cell(0,0, utf8_decode('Jefe de Gestión Humana'), 0,0, 'L');
$pdf->Ln(5);
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,0,'SUPERORIENTE S.A.', 0,0, 'L');

$pdf->Output();
?>