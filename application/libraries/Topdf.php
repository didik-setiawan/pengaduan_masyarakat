<?php 
defined('BASEPATH') or exit('No direct script access allowed');
require_once('./asset/dompdf/autoload.inc.php');
use Dompdf\Dompdf;
/**
 * 
 */
class Topdf {
	public function generate($html, $filename = '', $size = 'A4', $orientation = 'portrait'){
		$pdf = new Dompdf;

		$CI =& get_instance();
		$CI->dompdf = $pdf;
		
		$dompdf->loadHtml($html);
		$dompdf->setPaper($size, $orientation);
		$dompdf->render();
		$dompdf->stream($filename . '.pdf', array("Attachment" => 0));
	}
}