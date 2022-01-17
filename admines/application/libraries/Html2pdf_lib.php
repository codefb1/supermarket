<?php

require_once(APPPATH.'third_party/html2pdf/html2pdf.class.php');

class Html2pdf{
	
	public $html2pdf;
	public function __construct(){
	}
	public function show($html = "<h1>Hello</h1>" , $pdf = FALSE, $format = 'A4'){
 		$this->html2pdf = new HTML2PDF('P', $format, 'fr');
		$this->html2pdf->pdf->SetDisplayMode('fullpage');
		$this->html2pdf->writeHTML($html, $pdf);
		ob_clean();
        return $this->html2pdf;
		 // return "E";
	}

}
