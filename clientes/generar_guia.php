<?php
require '../php/conexion.php';
require '../fpdf/fpdf.php';
require '../phpqrcode/qrlib.php';
session_start();

$conexion = conectar();

// Obtenemos el ID de envío desde el parámetro de la URL
if (isset($_GET['id_envio'])) {
    $id_envio = $_GET['id_envio'];

    // Consulta SQL para obtener los datos del envío específico
    $sql = "SELECT * FROM packetdrive.envios WHERE id_envio = '$id_envio'";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Crear el código QR
        $seguimiento = $row['seguimiento'];
        $qrCodeFile = '../qrcodes/' . $seguimiento . '.png';
        QRcode::png($seguimiento, $qrCodeFile, QR_ECLEVEL_L, 4);

        // Creamos el PDF
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 12);

        // Encabezado de la guía
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, utf8_decode('Guía de Envío'), 0, 1, 'C');
        $pdf->Cell(0, 10, '-----------------------', 0, 1, 'C');
        $pdf->Ln(10);

        // Crear la tabla para mostrar la información
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(50, 10, utf8_decode('Remitente:'), 0, 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, utf8_decode($row['remitente']), 0, 1);

        // Receptor
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(50, 10, utf8_decode('Receptor:'), 0, 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, utf8_decode($row['receptor']), 0, 1);

        // Descripción de envío
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(50, 10, utf8_decode('Descripción de envío:'), 0, 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, utf8_decode($row['descripcion_envio']), 0, 1);

        // Peso
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(50, 10, 'Peso:', 0, 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, utf8_decode($row['peso'] . ' kg'), 0, 1);

        // Precio
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(50, 10, 'Precio:', 0, 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, '$' . $row['precio'], 0, 1);

        // Dirección de envío
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(50, 10, utf8_decode('Dirección de envío:'), 0, 1);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, utf8_decode($row['calle'] . ' ' . $row['numero']), 0, 1);
        $pdf->Cell(0, 10, utf8_decode($row['colonia']), 0, 1);
        $pdf->Cell(0, 10, utf8_decode($row['municipio']), 0, 1);
        $pdf->Cell(0, 10, utf8_decode($row['estado']), 0, 1);
        $pdf->Cell(0, 10, utf8_decode($row['pais']), 0, 1);
        $pdf->Cell(0, 10, utf8_decode('CP ' . $row['cp']), 0, 1);
        $pdf->Ln(10);

        // Número de seguimiento y código QR
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(50, 10, utf8_decode('Número de seguimiento:'), 0, 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, utf8_decode($row['seguimiento']), 0, 1);

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(50, 10, utf8_decode('Descripción de domicilio:'), 0, 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, utf8_decode($row['descripcion_dom']), 0, 1);

        // Código QR
        $pdf->Cell(50, 50, '', 0, 0);
        $pdf->Image($qrCodeFile, $pdf->GetX(), $pdf->GetY(), 50, 50);
        $pdf->Cell(0, 50, '', 0, 1);

        // Pie de página
        $pdf->SetY(-20);
        $pdf->Cell(0, 10, 'www.dhl.com', 0, 1, 'C');

        // Añadir más detalles del envío si lo deseas...

        // Generar el PDF y descargarlo
        $pdf->Output('Guia_Envio_' . $row['seguimiento'] . '.pdf', 'D');
        exit();
    }
}

// Si el ID de envío no es válido o no se encuentra, redirigir a la página de verenvios.php
$_SESSION['color']="success";

$_SESSION['msg'] = "Guia Generada correctamente.";

header("Location: verenvios.php");
exit();
?>
