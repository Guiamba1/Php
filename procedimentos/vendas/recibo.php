<?php
// Carregar dompdf
require_once '../../lib/dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

$option =  new Options();
$option ->set('isRemoteEnabled', true);

$id=$_GET['idvenda'];



 $html=file_get_contents("http://localhost/php/view/vendas/comprovanteVendaPdf.php?idvenda=".$id);


 
// Instanciamos um objeto da classe DOMPDF.
$pdf = new DOMPDF($option);
 
// Definimos o tamanho do papel e orientação.
//$pdf->set_paper(array(50,0,10,250));
//$pdf->set_paper(array(0,0,125,250));
 
 
// Carregar o conteúdo html.
$pdf->load_html(utf8_decode($html));
 
// Renderizar PDF.
$pdf->render();
 
// Enviamos pdf para navegador.
$pdf->stream('relatorioVenda.pdf');



