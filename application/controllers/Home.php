<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

 public function __construct()
    {
       parent::__construct();
    	 
    }   
			/*** Default controller function ***/
			public function index()
			{     
			    $data['setting'] = $this->M_settings->get_this();
				$data['sociaux'] = $this->M_sociaux->get_this(1);
				$data['categories_list'] = $this->M_categories->get_categories(false);
				$data['products_couffat'] = $this->M_products->get_product_couffin_home();
				
				$data['blocksOne'] = $this->M_homeBlocks->get_this(1);
				$data['blocksTow'] = $this->M_homeBlocks->get_this(2);
				$data['blocksTree'] = $this->M_homeBlocks->get_this(3);
				$data['banners_list'] = $this->M_banners->get_all(3);
				$data['slider_list'] = $this->M_banners->get_all(2);
				$data['products_list'] = $this->M_products->get_product_home();
				$data['products_best_seller_list'] = $this->M_products->get_product_best_seller();
				$data['get_products_promo_list'] = $this->M_products->get_product_promo();
				$taxe = $this->M_taxe->get_taxe();
				$taxe_value= $taxe->taxe_value;
				$data['taxe']= $taxe_value/100;
				$data['menu'] = "home";
				$data['page_couffat'] = $this->M_pages->get_this(18);
				
					$this->template->load('template-home','views_homes/index',$data);
			
			}
        public function sendMail_3()
    {

/*$this->load->library('email');*/
$this->load->library('email');
$config['protocol'] = "smtp";
$config['smtp_host'] = "ssl://smtp.gmail.com";
$config['smtp_port'] = "587";
$config['smtp_user'] = "contact@go-ferme-halal.com"; 
$config['smtp_pass'] = "Azerty75$1";
$config['charset'] = "utf-8";
$config['mailtype'] = "html";
$config['newline'] = "\r\n";
$this->email->initialize($config);
/*$config = array(        
    'protocol' => 'smtp',
    'smtp_host' => 'smtp.gmail.com',
    'smtp_port' => '465',
    'smtp_user' => 'contact@go-ferme-halal.com',
    'smtp_pass' => 'Azerty75$'
    );*/
	/*$config=array(
					'charset'=>'utf-8',
					'wordwrap'=> TRUE,
					'mailtype' => 'html'
					);
$this->email->initialize($config);

$this->email->from('bassem@go-makkah.com', 'Blabla');
$list = array('bassem@go-makkah.com');
$this->email->to('contact@go-ferme-halal.com');
$this->email->reply_to('elfartoun@gmail.com', 'Explendid Videos');
$this->email->subject('This is an email test');
$this->email->message('It is working. Great!');
$this->email->send();*/
//$this->load->library('email');
// from address
$this->email->from('contact@go-ferme-halal.com', 'Your Name');
$this->email->to('elfartoun@gmail.com'); // to Email address
$this->email->cc('bassem@go-makkah.com'); // cc Email address (optional)
//$this->email->bcc('them@their-example.com'); // BCC Email Address (optional)
 
$this->email->subject('Email Test'); // email Subject 
$this->email->message('Testing the email class.'); // email Body or Message 
$send=$this->email->send(); // send Email 
var_dump($send);exit;  


		}
	   public function sendMail()
    {
					//$this->load->library('email');
					/*$config=array(
					'charset'=>'utf-8',
					'wordwrap'=> TRUE,
					'mailtype' => 'html'
					);*/
					
				//	$config['protocol'] = 'smtp';
					//$config['smtp_host'] = 'smtp.gmail.com';
					//$config['smtp_user'] = 'go.makkah@gmail.com';
					//$config['smtp_pass'] = 'hyfinsniitopnnrx';
					//$config['smtp_port'] = 25;
					
					$this->load->library('email');
					$config=array(
					'charset'=>'utf-8',
					'wordwrap'=> TRUE,
					'mailtype' => 'html'
					);
/*$config = array(
    'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
    'smtp_host' => 'smtp.gmail.com', 
    'smtp_port' => 587,
    'smtp_user' => 'commercial@go-ferme-halal.com',
    'smtp_pass' => 'Azerty75+',
    'smtp_crypto' => 'tls', //can be 'ssl' or 'tls' for example
    'mailtype' => 'text', //plaintext 'text' mails or 'html'
    'smtp_timeout' => '4', //in seconds
    'charset' => 'iso-8859-1',
    'wordwrap' => TRUE
);*/
/*$config = Array(
        'protocol' => 'smtp',
        'smtp_host' => 'smtp.gmail.com',
        'smtp_port' => 25, //465,
        'smtp_user' => 'go.makkah@gmail.com',
        'smtp_pass' => 'hyfinsniitopnnrx',
        'smtp_crypto' => 'tls',
    
        'mailtype'  => 'html', 
        'charset'   => 'iso-8859-1'
    );
    $config['newline'] = "\r\n";
    $config['crlf'] = "\r\n";*/
	/*$this->load->library('email');
$config=array(
'charset'=>'utf-8',
'wordwrap'=> TRUE,
'mailtype' => 'html'
);*/
		$this->email->initialize($config);
		$this->email->from('commercial@go-ferme-halal.com', 'ddd');
		$this->email->to('elfartoun@gmail.com');
		$this->email->subject('teste');
		$this->email->message("ok");
		$send  = $this->email->send() ;
		var_dump($send);exit;
				//	$message = "Line 1\r\nLine 2\r\nLine 3";

// Dans le cas où nos lignes comportent plus de 70 caractères, nous les coupons en utilisant wordwrap()
//$message = wordwrap($message, 70, "\r\n");

// Envoi du mail
//mail('bassem@go-makkah.com', 'Mon Sujet', $message);
/*$this->email->initialize($config);
$this->email->from('contact@go-ferme-halal.com', 'test');
$this->email->to('bassem@go-makkah.com');
$this->email->subject('Votre commande N°#00');
$this->email->message('testttt');
$send=$this->email->send();*/
//var_dump($send);exit;
$to      = 'commercial@go-ferme-halal.com';
$subject = 'le sujet';
$message = 'Bonjour !';
$headers = 'From: bassem@go-makkah.com' . "\r\n" .
'Reply-To: commercial@go-ferme-halal.com' . "\r\n" .
'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
echo  $send;
					
					}
					
			public function sendMail2()
			{
				include './phpmailer_5.2.4/class.phpmailer.php';
				/*$mail = new PHPMailer(); 
				$mail->From = "contact@go-ferme-halal.com";
				//$mail->AddReplyTo('support@go-makkah.com', 'GO-MAKAKH.com');
				$mail->FromName = "GO-makkah.com";
               $mail->AddAddress('elfartoun@gmail.com');
				$mail->Subject = 'teste';

				$mail->Body = 'teste';
				$mail->IsHTML(true);
				$issend= $mail->Send();var_dump($issend);exit;
					$mail = new PHPMailer;*/
	//$mail->isSMTP();
	//Enable SMTP debugging// 0 = off (for production use)// 1 = client messages// 2 = client and server messages
	//$mail->SMTPDebug =0;
	//$mail->Debugoutput = 'html';

	//$mail->SMTPAuth = true;
	//$mail->Username = "go.makkah@gmail.com";
	//$mail->Password = "hyfinsniitopnnrx";
	//$mail->Host       = "smtp.gmail.com";     // sets GMAIL as the SMTP server
	//$mail->SMTPSecure = "tls";                // sets the prefix to the servier
	//$mail->Port = 25;

	//$mail->CharSet     = 'UTF-8';
	//$mail->Encoding    = '8bit';

	/*$mail->setFrom('support@go-makkah.com', 'GO-Makkah.com');
	$mail->addAddress("elfartoun@gmail.com");
	$mail->Subject = 'dsdsdsd' ;
	$mail->msgHTML($txt);
	//$mail->AltBody = 'This is a plain-text message body';
	$send=$mail->send();*/
	$html="ok";
	$subject="test_bassem";
	$to="elfartoun@gmail.com";
	$mail = new PHPMailer;
$mail->isSMTP();
//Enable SMTP debugging// 0 = off (for production use)// 1 = client messages// 2 = client and server messages
$mail->SMTPDebug =2;
$mail->Debugoutput = 'html';

$mail->SMTPAuth = true;
$mail->Username = "commercial@go-ferme-halal.com";
$mail->Password = "Azerty75$"; // hyfinsniitopnnrx
$mail->Host       = "smtp.gmail.com";     // sets GMAIL as the SMTP server
$mail->SMTPSecure = "tls";                // sets the prefix to the servier
$mail->Port = 587;

$mail->CharSet     = 'UTF-8';
$mail->Encoding    = '8bit';

$mail->setFrom('commercial@go-ferme-halal.com', 'GO-Makkah.com');
$mail->addAddress($to);
$mail->Subject = '=?UTF-8?B?'.base64_encode( trim($subject) ).'?=' ;
$mail->msgHTML($html);
//$mail->AltBody = 'This is a plain-text message body';
$send=$mail->send();
				var_dump($send);exit;
			}
			
			function distance(){
				error_reporting(~0);
ini_set('display_errors', 1);
			$addressFrom = '191 rue Saint-Jacques, Paris ';
				$addressTo   = '37 bd Romain Rolland, Montroug ';

				// Get distance in km
				$distance = $this->getDistance($addressFrom, $addressTo, "K");
				
				}
			function getDistance($addressFrom, $addressTo, $unit = ''){
    // Google API key
    $apiKey = 'AIzaSyC9Mgof1iPZOTNIkAai10ZtbX rFXEb40vA';
    
    // Change address format
    $formattedAddrFrom    = str_replace(' ', '+', $addressFrom);
    $formattedAddrTo     = str_replace(' ', '+', $addressTo);
  // Geocoding API request with start address
    $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false&key='.$apiKey);
		
  var_dump($geocodeFrom);exit;
    $outputFrom = json_decode($geocodeFrom);
    if(!empty($outputFrom->error_message)){
        return $outputFrom->error_message;
    }
  
    // Geocoding API request with end address
    $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false&key='.$apiKey);
    $outputTo = json_decode($geocodeTo);
    if(!empty($outputTo->error_message)){
        return $outputTo->error_message;
    }
    
    // Get latitude and longitude from the geodata
    $latitudeFrom    = $outputFrom->results[0]->geometry->location->lat;
    $longitudeFrom    = $outputFrom->results[0]->geometry->location->lng;
    $latitudeTo        = $outputTo->results[0]->geometry->location->lat;
    $longitudeTo    = $outputTo->results[0]->geometry->location->lng;
    
    // Calculate distance between latitude and longitude
    $theta    = $longitudeFrom - $longitudeTo;
    $dist    = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
    $dist    = acos($dist);
    $dist    = rad2deg($dist);
    $miles    = $dist * 60 * 1.1515;
    
    // Convert unit and return distance
    $unit = strtoupper($unit);
    if($unit == "K"){
        return round($miles * 1.609344, 2).' km';
    }elseif($unit == "M"){
        return round($miles * 1609.344, 2).' meters';
    }else{
        return round($miles, 2).' miles';
    }
}

public function send_mail_test()
    {
        require_once(APPPATH.'third_party/PHPMailer-master/PHPMailerAutoload.php');
        $mail = new PHPMailer();
        $mail->IsSMTP(); /* we are going to use SMTP */
        $mail->SMTPAuth   = true; /* enabled SMTP authentication */
        $mail->SMTPSecure = "tls";  /* prefix for secure protocol to connect to the server */
        $mail->Host       = "smtp.gmail.com";      /* setting GMail as our SMTP server */
        $mail->Port       = 587;                   /* SMTP port to connect to GMail */
        $mail->Username   = "commercial@go-ferme-halal.com";  /* user email address */
        $mail->Password   = "Azerty75$";            /* password in GMail */
        $mail->SetFrom('contact@go-ferme-halal.com', 'Mail');  /* Who is sending */
        $mail->isHTML(true);
        $mail->Subject    = "Mail Subject";
        $mail->Body      = '
            <html>
            <head>
                <title>Title</title>
            </head>
            <body>
            <h3>Heading</h3>
            <p>Message Body</p><br>
            <p>With Regards</p>
            <p>Your Name</p>
            </body>
            </html>
        ';
        $destino = 'elfartoun@gmail.com'; // Who is addressed the email to
        $mail->AddAddress($destino, "Receiver");
        if(!$mail->Send()) {
            echo 'non';
        } 
else
 {
             echo 'non';
        }
    }
	
	public function send_mail_tests()
    {
	/*$config['protocol'] = 'imap';
$config['smtp_host'] = 'imap.gmail.com';
$config['smtp_port'] = '993'; // 8025, 587 and 25 can also be used. Use Port 465 for SSL.
$config['smtp_crypto'] = 'ssl';
//$config['smtp_user'] = 'USERNAME';
//$config['smtp_pass'] = 'PASSWORD';
$config['charset'] = 'utf-8';
$config['mailtype'] = 'html';
$config['newline'] = "rn";
$this->load->library('email');
$this->email->from('elfartoun@gmail.com', 'Sender Name');
$this->email->to('commercial@go-ferme-halal.com','Recipient Name');
$this->email->subject('Your Subject');
$this->email->message('Your Message');
$send =$this->email->send();
var_dump($send);exit;*/


	/*$config['protocol'] = 'smtp';
$config['smtp_host'] = 'smtp.gmail.com';
$config['smtp_port'] = '587'; // 8025, 587 and 25 can also be used. Use Port 465 for SSL.
$config['smtp_crypto'] = 'tls';
$config['smtp_user'] = 'commercial@go-ferme-halal.com';
$config['smtp_pass'] = 'Azerty75$';
$config['charset'] = 'utf-8';
$config['mailtype'] = 'html';
$config['newline'] = "rn";
$this->load->library('email');
$this->email->initialize($config);
$this->email->from('elfartoun@gmail.com', 'Sender Name');
$this->email->to('commercial@go-ferme-halal.com','Recipient Name');
$this->email->subject('Your Subject');
$this->email->message('Your Message');
$send =$this->email->send();*/
require_once(APPPATH.'third_party/PHPMailer-master/PHPMailerAutoload.php');
$email="bassem@go-makkah.com";
$Subject='test';
$email_body='test';
$mail = new PHPMailer(true);
$mail->isSMTP();
try {
$mail->SMTPDebug  = 0;                    // enables SMTP debug information (for testing)
$mail->SMTPAuth   = true;                 // enable SMTP authentication
$mail->SMTPSecure = "tls";                // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";     // sets GMAIL as the SMTP server
$mail->Port       = 25;                  // set the SMTP port for the GMAIL server
$mail->Username   = 'commercial@go-ferme-halal.com'; 			// GMAIL username
$mail->Password   = 'Azerty75+';            // GMAIL password

$mail->From        = 'commercial@go-ferme-halal.com';
$mail->AddReplyTo('contact@go-ferme-halal.com', 'go-ferme-halal.com');
$mail->FromName    = 'go-ferme-halal.com';
$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';

$mail->AddAddress($email);

$mail->Subject = '=?UTF-8?B?'.base64_encode($Subject).'?=' ;
$mail->MsgHTML( stripcslashes( $email_body)  );

			$mail->Send();
			
} catch (phpmailerException $e) {
echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
echo $e->getMessage(); //Boring error messages from anything else!
}
}

public function send_go()
    { 
//require_once(APPPATH.'third_party/PHPMailer-master/PHPMailerAutoload.php');	
	include './phpmailer_5.2.4/class.phpmailer.php';
			$Subject="test";
			$email_body='bien venu';
			$email="elfartoun@gmail.com";
			$mail = new PHPMailer(true);
			//$mail->IsSMTP();
			try {
			//$mail->SMTPDebug  = 2;                    // enables SMTP debug information (for testing)
			//$mail->SMTPAuth   = true;                 // enable SMTP authentication
			//$mail->SMTPSecure = "tls";                // sets the prefix to the servier
			//$mail->Host       = "smtp.gmail.com";     // sets GMAIL as the SMTP server
			//$mail->Port       = 587;                  // set the SMTP port for the GMAIL server 587
			//$mail->Username   = 'commercial@go-ferme-halal.com'; 			// GMAIL username
			//$mail->Password   = 'Azerty75+';              // GMAIL password
			/*$mail->SMTPOptions = array(
			'ssl' => tableau(
					'verify_peer' => faux,
					'verify_peer_name' => faux,
					'allow_self_signed' => vrai
					)
			);*/
			$mail->From        = 'contact@go-ferme-halal.com';
			$mail->AddReplyTo('elfartoun@gmail.com', 'GO-ferme.com');
			$mail->FromName    = 'GO-ferme.com';
			$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
			$mail->AddAddress($email);
			$mail->Subject = '=?UTF-8?B?'.base64_encode($Subject).'?=' ;
			$mail->MsgHTML( stripcslashes( $email_body)  );


		
			 	var_dump($mail->Send());exit;	

			} catch (phpmailerException $e) {
			echo $e->errorMessage(); //Pretty error messages from PHPMailer
			} catch (Exception $e) {
			echo $e->getMessage(); //Boring error messages from anything else!
			}
			}
			public function send_preo(){
			
	//include './phpmailer_5.2.4/class.phpmailer.php';
	require_once(APPPATH.'third_party/PHPMailer-master/PHPMailerAutoload.php');
	$Correo = new PHPMailer();
  $Correo->IsSMTP();
  $Correo->SMTPAuth = true;
  $Correo->SMTPSecure = "tls";
  $Correo->Host = "smtp.gmail.com";
  $Correo->Port = 25;
  $Correo->UserName = "commercial@go-ferme-halal.com";
  $Correo->Password = "Azerty75+";
  $Correo->SetFrom('commercial@go-ferme-halal.com','De Yo');
  $Correo->FromName = "From";
  $Correo->AddAddress("bassem@go-makkah.com");
  $Correo->Subject = "Prueba con PHPMailer";
  $Correo->Body = "<H3>Bienvenido! Esto Funciona!</H3>";
  $Correo->IsHTML (true);
  if (!$Correo->Send())
  {
    echo "Error: $Correo->ErrorInfo";
  }
  else
  {
    echo "Message Sent!";
  }
   }
   
   public function sendMailOrder()
    {   
	     $data['orders']= $this->M_orders->get_this(74);
		  $data['customers']= $this->M_customers->get_this($data['orders']->customer_id);
         $data['orders_details']= $this->M_orders->get_orders_detail($data['orders']->order_id);
		  $this->load->library('email');
		
		  $config=array(
			  'charset'=>'utf-8',
			  'wordwrap'=> TRUE,
			  'mailtype' => 'html'
			 ); 
		  
		
		  $no_email = $this->load->view('views_emails/commande_email_template/email_new_order',$data,true);
		  $this->email->initialize($config);
		  $this->email->from('contact@go-ferme-halal.com','GO-FERME-HALAL');
		  $this->email->to('elfartoun@gmail.com');
		  $this->email->subject('GO-FERME-HALAL.COM - Nouvelle commande');
		  $this->email->message($no_email);
		 $this->email->send();
		
		
	}
}
?>