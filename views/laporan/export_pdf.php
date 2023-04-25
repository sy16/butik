<?php
require_once('../../tcpdf/tcpdf.php');

include("../../config/connection.php");

$sql = "SELECT tamu.nama, tamu.alamat, tamu.satuan_kerja, kunjungan.tgl_kunjung, kunjungan.jml_rombongan FROM tamu INNER JOIN kunjungan WHERE tamu.nik = kunjungan.id_tamu;";
$res = mysqli_query($connect, $sql);

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set orientasi halaman menjadi landscape
$pdf->setPageOrientation('L');

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Butik');
$pdf->SetTitle('Laporan Pengunjung');
$pdf->SetSubject('Laporan Pengunjung');
$pdf->SetKeywords('Laporan, Pengunjung');

// $pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

$pdf->SetHeaderData('', 0, 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kabupaten Tabalong', 'Jl. H. Obar Sobari Rt. 12 Kel Mabuun Kec. Murung Pudak Kab. Tabalong');



$pdf->setFooterData(array(0,64,0), array(0,64,128));

$pdf->setHeaderFont(Array('helvetica', '', 12));
$pdf->setFooterFont(Array('helvetica', '', 8));

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$pdf->SetFont('helvetica', '', 10);

$pdf->AddPage();

$html = '
<table>
    <thead>
      <tr>
        <th width="50">No</th>
        <th width="150">Nama</th>
        <th width="200">Alamat</th>
        <th width="150">Satuan Kerja</th>
        <th width="150">Tgl Kunjungan</th>
        <th width="150" align="center">Jml Rombongan</th>
      </tr>
    </thead>';

$no=1;
while($row = mysqli_fetch_array($res)){
    $html .= '
    <tr>
        <td width="50">'.$no.'</td>
        <td width="150">'.$row['nama'].'</td>
        <td width="200">'.$row['alamat'].'</td>
        <td width="150">'.$row['satuan_kerja'].'</td>
        <td width="150">'.date('d F Y', strtotime($row['tgl_kunjung'])).'</td>
        <td width="150" align="center">'.$row['jml_rombongan'].'</td>
    </tr>';
    $no++;
}
$html .= '</table>';

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->lastPage();

$pdf->Output('Laporan Pengunjung.pdf', 'D');
?>
