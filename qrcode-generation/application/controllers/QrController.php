<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QrController extends CI_Controller {

	function __construct ()
	{	
		parent::__construct();
		$this->load->library('phpqrcode/qrlib');
		$this->load->helper('url');
	}

	public function index()
	{	
		$this->load->view('include-template/header.php');
		$this->load->view('qrcodeview/qrcodetext.php');
		$this->load->view('include-template/footer.php');
	}

	public function qrcodeGenerator ( )
	{
		
		
		$qrtext = $this->input->post('qrcode_text');
		
		if(isset($qrtext))
		{

			//file path for store images
		    $SERVERFILEPATH = $_SERVER['DOCUMENT_ROOT'].'/qrcode-generation/images/';
		   
			$text = $qrtext;
			$text1= substr($text, 0,9);
			
			$folder = $SERVERFILEPATH;
			$file_name1 = "Qrcode" . rand(2,200) . ".png";
			$file_name = $folder.$file_name1;
			QRcode::png($text,$file_name);
			
			echo"<center><img style='width: 200px;'src=".base_url().'images/'.$file_name1."></center";
		}
		else
		{
			echo 'No Text Entered';
		}	
	}
}
