<?php

require_once '../../lib/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;


$option =  new Options();
$option ->set('isRemoteEnabled', true);

$id=$_GET['idvenda'];

function file_get_contents_curl($url) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);

    $dados = curl_exec($ch);
    curl_close($ch);

    return $dados;
}

 $html=file_get_contents("http://localhost/php/view/vendas/relatorioVendaPdf.php?idvenda=".$id);


 
// Instanciamos um objeto da classe DOMPDF.
$pdf = new DOMPDF($option);
 
// Definimos o tamanho do papel e orientação.
$pdf->set_paper("letter", "portrait");
//$pdf->set_paper(array(0,0,104,250));
 
// Carregar o conteúdo html.
$pdf->load_html(utf8_decode($html));
 
// Renderizar PDF.
$pdf->render();
 
// Enviamos pdf para navegador.
$pdf->stream('relatorioVenda.pdf');



