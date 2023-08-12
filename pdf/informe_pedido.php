<?php
require('../Config/conexion.php');
require('../src/fpdf.php');

class PDF extends FPDF
{
    function Header()
    {
        $this->Image('../Assets/img/Logo_Hossna.png', 150, 10, 40);

        $this->SetFont('Times', 'B', 20);
        $this->Image('../Assets/img/triangulosrecortados.png', 0, 0, 70); //imagen(archivo, png/jpg || x,y,tamaño)
        $this->setXY(60, 15);
        $this->Cell(100, 8, 'Reportes de Pedidos', 0, 1, 'C', 0);
        $this->Ln(20);
    }

    function GetCellWidth($text, $font)
    {
        $this->SetFont($font);
        return $this->GetStringWidth($text);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Pagina' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$db = new Database();
$conn = $db->conectar();

$sql = "SELECT pedidos.*, u.id_usuario, u.nombre, u.correo, u.telefono, p.id_producto, p.nombre AS nombre_producto, p.imagen FROM pedidos AS pedidos JOIN usuarios AS u ON pedidos.id_usuario = u.id_usuario JOIN productos AS p ON pedidos.id_producto = pedidos.id_producto WHERE u.id_usuario = 3";
$result = $conn->query($sql);

$result = $conn->query($sql);
if (!$result) {
    die("Error al ejecutar la consulta: ");
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$idPedidoWidth = $pdf->GetCellWidth('ID Pedido', 'Arial');
$nombreWidth = $pdf->GetCellWidth('Nombre', 'Arial');
$nombreProductoWidth = $pdf->GetCellWidth('N_producto', 'Arial');
$cantidadWidth = $pdf->GetCellWidth('Cantidad', 'Arial');
$totalWidth = $pdf->GetCellWidth('Total', 'Arial');
$fechaVentaWidth = $pdf->GetCellWidth('Fecha de Pedido', 'Arial');

$leftMargin = 5.5;
$pdf->SetLeftMargin($leftMargin);

$pdf->SetFont('Arial', '', 8);
$pdf->Cell($idPedidoWidth, 6, utf8_encode('ID Pedido'), 1, 0, 'C');
$pdf->Cell($nombreWidth, 6, utf8_encode('Nombre'), 1, 0, 'C');
$pdf->Cell($nombreProductoWidth, 6, utf8_encode('N_Producto'), 1, 0, 'C');
$pdf->Cell($cantidadWidth, 6, utf8_encode('Cantidad'), 1, 0, 'C');
$pdf->Cell($totalWidth, 6, utf8_encode('Total'), 1, 0, 'C');
$pdf->Cell($fechaVentaWidth, 6, utf8_encode('F_pedido'), 1, 0, 'C');

$pdf->SetFillColor(233, 229, 235); //color de fondo rgb
$pdf->SetDrawColor(61, 61, 61); //color de linea  rgb

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $pdf->Cell($idPedidoWidth, 6, $row["id_pedido"], 1, 0, 'C');
    $pdf->Cell($nombreWidth, 6, $row["nombre"], 1, 0, 'C');
    $pdf->Cell($nombreProductoWidth, 6, $row["nombre_producto"], 1, 0, 'C');
    $pdf->Cell($cantidadWidth, 6, $row["cantidad"], 1, 0, 'C');
    $pdf->Cell($totalWidth, 6, $row["total"], 1, 0, 'C');
    $pdf->Cell($fechaVentaWidth, 6, $row["fecha_pedido"], 1, 1, 'C');
}

$pdf->Output();
