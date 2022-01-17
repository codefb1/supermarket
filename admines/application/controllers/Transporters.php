<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	error_reporting(E_ALL);
	class Transporters extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
		
	
		}
		/* liste Banners */
		/*** Default controller function ***/
			public function index(){
		
		
		try {
				$config = array();
				$config['base_url'] = base_url() . "transporters/index";
				$config['total_rows'] = $this->M_transporters->count_all();
				$config['per_page'] = 20;
				$config['uri_segment'] = 3;
				$config['num_links'] = 3;
				$config['full_tag_open'] = '<div   class="bs-example"><ul class="pagination p_pagination">';
				$config['full_tag_close'] = '</ul></div><!--pagination-->';
				$config['first_link'] = '&laquo; Première';
				$config['first_tag_open'] = '<li class="prev page">';
				$config['first_tag_close'] = '</li>';
				$config['last_link'] = 'Dernier &raquo;';
				$config['last_tag_open'] = '<li class="next page">';
				$config['last_tag_close'] = '</li>';
				$config['next_link'] = 'Suivant &rarr;';
				$config['next_tag_open'] = '<li class="next page">';
				$config['next_tag_close'] = '</li>';
				$config['prev_link'] = '&larr; Pr&eacute;cédent';
				$config['prev_tag_open'] = '<li class="prev page">';
				$config['prev_tag_close'] = '</li>';
				$config['cur_tag_open'] = '<li class="page-number active"><a href="">';
				$config['cur_tag_close'] = '</a></li>';
				$config['num_tag_open'] = '<li class="page">';
				$config['num_tag_close'] = '</li>';

				$this->pagination->initialize($config);

				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data['transporters_list'] = $this->M_transporters->get_all($config['per_page'], $page);
				$data['pagination'] = $this->pagination->create_links();
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}
		
		$this->template->load('template','views_transporters/index',$data);
	}
		/*** Add Banner interface function ***/
		public function add()
		{
			$data['process_status'] = 0;
			
				$data['countries_list'] = $this->M_countries->get_all_table();
				
	 	if($this->input->post('transporter_name')) {
			
		try {
			
			$this->form_validation->set_rules('transporter_name', 'transporter_name', 'required');
			   $add_data=array(
					                    "transporter_name" => $this->input->post('transporter_name'),
                                        "transporter_city" => $this->input->post('transporter_city'),
										 "transporter_phone" => $this->input->post('transporter_phone'),
										//"transporter_phone_portable" => $this->input->post('transporter_phone_portable'),
										//"transporter_zip" => $this->input->post('transporter_zip'),
										"transporter_price_by_one" => $this->input->post('transporter_price_by_one'),
									  "transporter_picture" => $this->input->post('transporter_picture'),
										"transporter_short_text" => $this->input->post('transporter_short_text'),
										"transporter_responsable" => $this->input->post('transporter_responsable'),
										"transporter_price_not_france" => $this->input->post('transporter_price_not_france'),
										"transporter_price_in_france" => $this->input->post('transporter_price_in_france'),
										"transporter_data_created" => date("Y-m-d H:i:s")
										);
				if($this->form_validation->run() == FALSE) {
				
				$data['process_status'] = 99;
				
				$data['transporter_name'] = $this->input->post('transporter_name');
				$data['transporter_phone_portable'] = $this->input->post('transporter_phone_portable');
                $data['transporter_price_in_france'] = $this->input->post('transporter_price_in_france');
				$data['transporter_city'] = $this->input->post('transporter_city');
				$data['transporter_phone'] = $this->input->post('transporter_phone');
				//$data['transporter_zip'] = $this->input->post('transporter_zip');
				$data['transporter_picture'] = $this->input->post('transporter_picture');
				$data['transporter_short_text'] = $this->input->post('transporter_short_text');
				$data['transporter_price_by_one'] = $this->input->post('transporter_price_by_one');
				$data['transporter_responsable'] = $this->input->post('transporter_responsable');
                $data['transporter_price_not_france'] = $this->input->post('transporter_price_not_france');
				$this->template->load('template','views_transporters/add',$data);	
				}
						
			if ($this->form_validation->run() == TRUE) {
				if($this->M_transporters->add_new_entry($add_data) == true ) {	
					$data['process_status'] = 1;
					
				
							
							
					$this->template->load('template','views_transporters/add',$data);
				}
				
				else if($this->M_transporters->add_new_entry($add_data) == false ) {
					$data['process_status'] = 2;
					$data['transporter_name'] = $this->input->post('transporter_name');
					$data['transporter_price_in_france'] = $this->input->post('transporter_price_in_france');
					$data['transporter_city'] = $this->input->post('transporter_city');
					$data['transporter_phone'] = $this->input->post('transporter_phone');
					$data['transporter_phone_portable'] = $this->input->post('transporter_phone_portable');
					$data['transporter_price_by_one'] = $this->input->post('transporter_price_by_one');
				    $data['transporter_picture'] = $this->input->post('transporter_picture');
				    $data['transporter_short_text'] = $this->input->post('transporter_short_text');
					$data['transporter_responsable'] = $this->input->post('transporter_responsable');
				    $data['transporter_price_not_france'] = $this->input->post('transporter_price_not_france');
					$this->template->load('template','views_transporters/add',$data);
					
				}
			}
		} catch (Exception $exc) {
		 $this->exceptionhandler->handle($exc);
		}
		}
		
		else {

			$this->template->load('template','views_transporters/add',$data);
		}

		}
		/*** Edit banner interface function ***/
		public function edit()
		{
			$data['countries_list'] = $this->M_countries->get_all_table();
				
			$data['transporter'] = $this->M_transporters->get_this(end($this->uri->segments),null);
			
			
			
			if($this->input->post('transporter_id') > 0) {
				try {	
				
			$this->form_validation->set_rules('transporter_name', 'transporter_name', 'required');
			   $update_data=array(
								"transporter_name" => $this->input->post('transporter_name'),
								"transporter_city" => $this->input->post('transporter_city'),
								"transporter_phone" => $this->input->post('transporter_phone'),
								"transporter_phone_portable" => $this->input->post('transporter_phone_portable'),
							//	"transporter_zip" => $this->input->post('transporter_zip'),
								"transporter_price_in_france" => $this->input->post('transporter_price_in_france'),
								"transporter_price_not_france" => $this->input->post('transporter_price_not_france'),
								"transporter_price_by_one" => $this->input->post('transporter_price_by_one'),
								"transporter_picture" => $this->input->post('transporter_picture'),
								"transporter_short_text" => $this->input->post('transporter_short_text'),
								"transporter_responsable" => $this->input->post('transporter_responsable'),
								"transporter_data_updated" => date("Y-m-d H:i:s")
										);
				if 	($this->form_validation->run() == FALSE) {
						 $data['process_status'] = 99;
						 redirect(base_url().'transporters/edit/'.$data['process_status'].'/'.$this->input->post('transporter_id'), 'refresh');
				}
							
				if ($this->form_validation->run() == TRUE) {
					
					$update_process = $this->M_transporters->update_this($this->input->post('transporter_id'), $update_data);
					
					if($update_process  == true ) {
					
						 $data['process_status'] = 1;
						 redirect(base_url().'transporters/edit/'.$data['process_status'].'/'.$this->input->post('transporter_id'), 'refresh');
					}
					
					else if($update_process == false ) {
					
						 $data['process_status'] = 2;
						 redirect(base_url().'transporters/edit/'.$data['process_status'].'/'.$this->input->post('transporter_id'), 'refresh');
					}
				}

					} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
			}
			else {
					
		$this->template->load('template','views_transporters/edit',$data);
			}

		} 
	
		/*** Delete banner  Execute function ***/
		public function delete() {  
		try {
			$data_id=$this->input->post('transporter_id');
			if(is_numeric($data_id)){
				if($this->M_transporters->deletethis($data_id)==true){
				  echo json_encode(array('result'=>1));
				}
			}
			else {
				$us=10;
				redirect('/transporters/index/'.$data_id);
			}
			
				} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
					
		}
	
		/*** Update status Banner  Execute function ***/
		public function updatestatus() { 
		
		try {
			$us=0;
			$data_id=$this->input->post('idsatus');
			$transporter_id=$this->input->post('transporter_id');
			if(is_numeric($data_id)){
				$update_entries=array('transporter_data_status'=>$data_id);
				if($this->M_transporters->update_status($update_entries,$transporter_id)==true){
					echo json_encode(array('result'=>1));
				}
			}
			else {  
				 echo json_encode(array('result'=>0));

			}
			
				} catch (Exception $exc) {
					  $this->exceptionhandler->handle($exc);
					}
		}
			

			/*** upload  picture Banner  Execute function ***/
    public function uploadFile()
    { 

        try {
			$config = array(
							'upload_path' => './medias/transporters/',
							'allowed_types' => '*',
							'max_size' => '6000',
							'max_width' => '4000',
							'max_height' => '4000'
							);
     
            $this->load->library('upload');

   
            $file_name    =  'file_'. md5(microtime());
            $config['file_name'] = $file_name;
            $this->upload->initialize($config);
            $file = $this->upload->do_upload('logo');

            if (!$file)
            {
                    $errors = $this->upload->display_errors('', '');
                  
             var_dump($errors);
            }
            else
            { 

                    $data_file = $this->upload->data();

                    $data_image  =  $data_file['file_name'];
                   
									echo ($data_image);

            }
			
		} catch (Exception $exc) {
		  $this->exceptionhandler->handle($exc);
		 
		}

        }

	}
?>