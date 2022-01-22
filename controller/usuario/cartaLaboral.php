<?php

require ("../../public/libs/tfpdf/tfpdf.php");

require_once ("../../models/DAO/UsuarioDAO.php");
require_once ("../../models/DAO/TipoContratoDAO.php");


setlocale(LC_TIME, "spanish");


$id_usuario = $_GET['doc'];

$usuariodao = new UsuarioDAO();

$usuariodto = $usuariodao->listaUsuario($id_usuario);

$usuariodtoId = $usuariodao->listaUsuarioConId($id_usuario);

$genero = '';

if ($usuariodtoId->getGenero() == 1) {
    $genero = "El señor";
}else{
    $genero = "La señora";
}

$tipoContratodao = new TipoContratoDAO();
$listaTiposContratos = $tipoContratodao->listaTiposContratos(); 
$tipo_contrato = '';
for ($i=0; $i < count($listaTiposContratos); $i++) { 
    if ($usuariodtoId->getTipo_contrato() == $listaTiposContratos[$i]->getId_tipo_contrato()) {
        $tipo_contrato = $listaTiposContratos[$i]->getNombre();
    }
}

$fecha_inicio = $usuariodto->getFecha_ingreso();
$fecha_fin = $usuariodto->getFecha_retiro();

$modif_fecha_inicio = date("d-m-Y", strtotime($fecha_inicio));
$modif_fecha_fin = date("d-m-Y", strtotime($fecha_fin));

$desc_fecha_inicio = strftime("%d de %B de %Y", strtotime($modif_fecha_inicio));
$desc_fecha_fin = strftime("%d de %B de %Y", strtotime($modif_fecha_fin));

$pdf = new tFPDF();
$pdf->SetMargins(30, 10 , 30);
$pdf->AddPage();
$pdf->SetFont('Arial','',12);


$pdf->Cell(70,60,'Rionegro, '. strftime("%d de %B del %Y") , 0,1, 'L');

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

if ($usuariodtoId->getEstado() == 1) {
    $pdf->MultiCell(0,5,utf8_decode( $genero . ' '. strtoupper($usuariodto->getNombre(). " ". $usuariodto->getApellido()) .' con número de cédula ' . $usuariodto->getId_usuario() . ' labora en esta empresa con un contrato ' . $tipo_contrato . ', desde el ' . $desc_fecha_inicio . ' desempeñándose bajo el cargo de ' . strtoupper($usuariodto->getCargo()) . ', devengando un salario $' . intval($usuariodto->getSalario()) . '.'), 'C');

}else{
    $pdf->MultiCell(0,5,utf8_decode( $genero  . ' '. strtoupper($usuariodto->getNombre(). " ". $usuariodto->getApellido()) .' con número de cédula ' . $usuariodto->getId_usuario() . ' laboró en esta empresa con un contrato a termino ' . $tipo_contrato . ', desde el ' . $desc_fecha_inicio . ' hasta ' . $desc_fecha_fin . ' desempeñándose bajo el cargo de ' . strtoupper($usuariodto->getCargo()) . ', devengando un salario $' . intval($usuariodto->getSalario()) . '.'), 'C');

}


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