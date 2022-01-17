<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	error_reporting(E_ALL);
	class Cart extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
		
	
		}
		/* liste Banners */
		/*** Default controller function ***/
			public function index(){
				
				$postcode1=68200;
$postcode2=68210;
$result = array();

$url = "http://maps.googleapis.com/maps/api/distancematrix/json?origins=$postcode1&destinations=$postcode2&mode=bicycling&language=en-EN&sensor=false";

$data = @file_get_contents($url);

$result = json_decode($data, true);
$url ="https://maps.googleapis.com/maps/api/distancematrix/json?origins=144216,india&destinations=160017,india&mode=driving&language=en-EN&sensor=false&key=AIzaSyD4k2TXDporC2KLg4b2_SMGdCkh2AEudr8";
   $data   = @file_get_contents($url);
   $result = json_decode($data, true); //print_r($result);  //outputs the array   
   $distances = array( // converts the units
   "meters" => $result["rows"][0]["elements"][0]["distance"]["value"],
   "kilometers" => $result["rows"][0]["elements"][0]["distance"]["value"] / 1000,
   "yards" => $result["rows"][0]["elements"][0]["distance"]["value"] * 1.0936133,
   "miles" => $result["rows"][0]["elements"][0]["distance"]["value"] * 0.000621371    );   
$url = 'http://maps.google.com/maps/geo?q=EC3M,+UK&output=csv&sensor=false';

$data = @file_get_contents($url);
	var_dump($data );exit;
$result = explode(",", $data);   
print_r($data);     

        $data['customers_list'] = $this->M_customers->get_all_table($customer_id);
		$this->template->load('template','views_carts/index',$data);
	}
		/*** Add Banner interface function ***/
		public function getCodePostals() {
		$theta = $this->distance( 55.5391,-21.0269, 55.518, -21.2815, "k");
		var_dump($theta);exit;
}
		
			
						
function distance($lat1, $lon1, $lat2, $lon2, $unit) { 
 
  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);
 
  if ($unit == "K") {
    return ($miles * 1.609344);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
        return $miles;
      }
}

		public function getCodePostal() {

				
			
				$customer_id=$this->input->post('customer_id');
				$data['customer'] = $this->M_customers->get_this($customer_id);
				$customer_zip=$data['customer']->customer_zip;
				$data['partners'] = $this->M_partners->get_this_by_zip($customer_zip);
				if($data['partners']){
					 echo json_encode(array('result'=>0,'partener_zip'=>$data['partners']->partener_zip,'partener_lastname'=>$data['partners']->partener_lastname));
				}
				else 
				{    $customer_zip=substr($customer_zip, 0, -2);
				   $vicopoUrl = 'https://vicopo.selfbuild.fr/cherche/'.$customer_zip;
				   $jsons_code_zip = @json_decode(file_get_contents($vicopoUrl));
				   $is_code_zip =false;
				   foreach($jsons_code_zip->cities as $code_zip){
							
							$data['partners'] = $this->M_partners->get_this_by_zip($code_zip->code);
							if($data['partners']){
					           $is_code_zip =true;
							    break; 
			     	          }
							}
							if($is_code_zip){
					            echo json_encode(array('result'=>0,'partener_zip'=>$data['partners']->partener_zip,'partener_lastname'=>$data['partners']->partener_lastname));
				
				            }else{
								    $customer_zip=substr($customer_zip, 0, -3);
							$vicopoUrl = 'https://vicopo.selfbuild.fr/cherche/'.$customer_zip;
							$jsons_code_zip = @json_decode(file_get_contents($vicopoUrl));
							$is_code_zip_1 = false;
					 foreach($jsons_code_zip->cities as $code_zip){
							
							$data['partners'] = $this->M_partners->get_this_by_zip($code_zip->code);
							if($data['partners']){
					           $is_code_zip_1 = true;
							    break; 
			     	          }
							}
								 echo json_encode(array('result'=>0,'partener_zip'=>$data['partners']->partener_zip,'partener_lastname'=>$data['partners']->partener_lastname));
				
							}	
				}
				}
				

		

	}
	
	
		
		
?>