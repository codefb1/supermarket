<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller {
	/* Init tables home */
	
	public function index(){
		       
				$data['setting'] = $this->M_settings->get_this();
				$data['sociaux'] = $this->M_sociaux->get_this(1);
				$data['categories_list'] = $this->M_categories->get_categories(false);
				$data['sub_categories_list'] = $this->M_categories->get_categories(true);
				$data['menu'] = "cart";
				$data['body'] = "product-cart checkout-cart blog";
				$taxe = $this->M_taxe->get_taxe();
				$taxe_value= $taxe->taxe_value;
		        $data['taxe']= $taxe_value/100;
					
				$data['products'] =$this->M_products->get_products();
				$all_association=true;
				$data['banniers'] = $this->M_banners->get_bannier_emplacement(6);
				$data['transporters'] = $this->M_transporters->get_this(1); 
				foreach ($this->cart->contents() as $items){
					 $product = $this->M_products->get_this(intval($items['id']));
					if($product->product_entier_association){
							} else{
							$all_association=false;
							}
				}
				if($all_association){
						$data['transporters'] = $this->M_transporters->get_this(2); 
					}
				 
		
	/***** END BLOCK TEMPLATE*****/
	
		$this->template->load('template_carts','views_carts/index',$data);
	}

	 public function add_cart()
	 {  
	 
	    $optionPrice = 0;
        $qty= $this->input->post('qty');
		$slectedOptions = $this->input->post('slectedOption');
		
		  $optionslist = array();
		foreach($slectedOptions as $slectedOption=>$v) {
		
			$options_type = $this->M_categories_options->get_this($v);
			$optionslist[$options_type->categorie_option_id]['categorie_option_id']=$options_type->categorie_option_id;
			$optionslist[$options_type->categorie_option_id]['option_name']=$options_type->option_name;
			$optionslist[$options_type->categorie_option_id]['option_price']=$options_type->option_price;
			$optionslist[$options_type->categorie_option_id]['option_price_unitaire']=number_format($options_type->option_price, 2, '.', '');
			$optionslist[$options_type->categorie_option_id]['option_price_rectif']=number_format($options_type->option_price*$qty, 2, '.', '');;
			$optionslist[$options_type->categorie_option_id]['qty']=$qty;
			$optionPrice=$optionPrice+$options_type->option_price*$qty;
		}
	    $product = $this->M_products->get_this($this->input->post('product_id')); 
		$product_pictures =$product->product_picture;
		$product_name = str_replace("'", " ", $product->product_name);
		$taxe = $this->M_taxe->get_taxe();
		$taxe_value= $taxe->taxe_value;
		$taxe= $taxe_value/100;
		$product_id = $product->product_id;
		$product_path =  base_url().'products/show/'.$product->product_id;
		$price = number_format($product->product_price_selling, 2, '.', '');
		//$this->cart->insert($item);
		$oldprice =0;
		if($product->product_is_promo==2){
			$price = number_format($product->product_price_dicount, 2, '.', '');
			$oldprice = number_format($product->product_price_selling, 2, '.', '');
		}
		$refSlectedOptions='';
		$id=$product->product_id;
		if($slectedOptions){
			$refSlectedOptions = $this->genererChaineAleatoire(5);
			$id=$id.''.$refSlectedOptions;
		}
				$item = array(

				'id' =>$id, 
				'name' => 'product_'.$product->product_id,
				'qty' => $qty,
				'price' => $price/*?$data['product']->product_price:0.00*/,
				'options'  => array('product' => $product,'optionPrice' => $optionPrice,'optionslist' => $optionslist,'product_entier_association' => $product->product_entier_association, 'association_id' => $association_id)




				);
       $totalPriceAndoption='€ '.number_format($price*$qty+$optionPrice, 2, '.', '');
       $rowId=$this->cart->insert($item);
	   $data = array();
	   $totalCart=0;
       $totalCartht =0;
	   $totalOptionPrice = 0;
	   
	   foreach($this->cart->contents() as $rowid => $item) {
		
		    $product = $this->M_products->get_this(intVal($item['id']));
			 $path =base_url().'admines/medias/products/'.$product->product_picture;
			$oldprice =0;
			if($product->product_is_promo==2){

			  $oldprice = number_format($product->product_price_selling, 2, '.', '');
			}

				//$pathShowProduct = base_url().'products/show/'.$product->product_id.'-'.strtolower(url_title($product->product_name));
				 $pathShowProduct = base_url().'products/show/'.$product->product_id;
			
			
		   
		   // $product_name = str_replace("'", " ", );
		   $productName = $product->product_name;
		    if($product->product_entier_association){
				$productName = $item['name'];
			}
			$data[$item['id']]['product_id'] = intVal($item['id']);
			$data[$item['id']]['product_name'] = $productName;
			$data[$item['id']]['product_pictures'] = $path;
			$data[$item['id']]['pathShowProduct'] = $pathShowProduct;
			$data[$item['id']]['price'] = number_format($item['price'], 2, '.', '');  
			$data[$item['id']]['qty'] = $item['qty']; 
            $data[$item['id']]['rowid'] = $item['rowid']; 
			$data[$item['id']]['oldprice'] = $oldprice;
			$poids="";
            if($product->show_poids) {
				$poids =$product->product_poids;
				}			
            $data[$item['id']]['product_poids'] = $poids; 
            $totalCart=$totalCart+($item['price']*$item['qty']);
		    $optionProductPrice="";
			if($item['options']['optionPrice']){
			$totalOptionPrice = $totalOptionPrice+ $item['options']['optionPrice'];
			$optionProductPrice=number_format($item['options']['optionPrice'], 2, '.', '');  
		 }
		    $data[$item['id']]['optionPrice'] = $optionProductPrice;
	   } 
	       $totalCart=$totalCart+$totalOptionPrice;
		   $totalCartTva=$totalCart-$totalCart*(1-$taxe);
		   
	   echo json_encode(array('result'=>1,'totalPriceAndoption'=>$totalPriceAndoption,'optionslist' => $optionslist,'qty'=>$qty,'optionPrice'=>$optionPrice,'totalCartTva'=>number_format($totalCartTva, 2, ',', ''),'product_path'=>$product_path,'oldprice'=>$oldprice,'price'=>number_format($price,2, '.', ''),'pricetotal'=>number_format($price*$this->input->post('qty'),2, '.', ''),'product_id'=>$product_id,'rowId'=>$rowId,"totalCart"=>number_format($totalCart, 2, ',', ''),"product_name"=>$product_name ,'all_cart'=>$data,'product_picture'=>$product_pictures,'item'=>$item,'nbrcart'=>count($this->cart->contents()),'contents'=>$this->cart->contents()));
	 }
	 
	 
	 public function add_cart_association()
	 {
        $taxe = $this->M_taxe->get_taxe();
		$taxe_value= $taxe->taxe_value;
		$taxe= $taxe_value/100;
		$product = $this->M_products->get_this($this->input->post('product_id'));
		$association_id = $this->input->post('association_id');
		$price = $product->product_price_selling;
		$product_name=$product->product_name;
		$id=$product->product_id.'-mc'; 
		$qty= $this->input->post('qty'); 
        $slectedOptions = $this->input->post('slectedOption');
		$optionPrice=0;
		$optionslist = array();
		foreach($slectedOptions as $slectedOption=>$v) {
		
			$options_type = $this->M_categories_options->get_this($v);
			$optionslist[$options_type->categorie_option_id]['categorie_option_id']=$options_type->categorie_option_id;
			$optionslist[$options_type->categorie_option_id]['option_name']=$options_type->option_name;
			$optionslist[$options_type->categorie_option_id]['option_price']=$options_type->option_price;
			$optionslist[$options_type->categorie_option_id]['option_price_unitaire']=number_format($options_type->option_price, 2, '.', '');
			$optionslist[$options_type->categorie_option_id]['option_price_rectif']=number_format($options_type->option_price*$qty, 2, '.', '');
			$optionslist[$options_type->categorie_option_id]['qty']=$qty;
			$optionPrice=$optionPrice+$options_type->option_price*$qty;
		}
		
		if($association_id){
		    $association = $this->M_associations->get_this($association_id);
			$product_name= 'Mouton a offrir à une association en '.$association->country_name;
		    //$price = $association->association_price;
		    $price = $association->association_price;
		
			$id=$product->product_id.'-mo-'.$association_id;
		}	
		$refSlectedOptions='';
		if($slectedOptions){
			$refSlectedOptions = $this->genererChaineAleatoire(5);
			$id=$id.''.$refSlectedOptions;
		}
	
		//$this->cart->insert($item);
			$item = array(

			'id' =>$id,
			'name' => $product_name,
			'qty' => $qty,
			'price' => number_format($price, 2, '.', '')/*?$data['product']->product_price:0.00*/,
			'options'  => array('product' => $product,'optionPrice' => $optionPrice,'optionslist' => $optionslist,'product_entier_association' => $product->product_entier_association, 'association_id' => $association_id)

			);

        $this->cart->insert($item);
	   $totalPriceAndoption ='€ '.number_format($price*$qty+$optionPrice, 2, '.', '');
	   $data = array();
	   $totalCart=0;
	   $totalCartht =0;
	   $all_association=true;
	   $totalOptionPrice = 0;
	   foreach($this->cart->contents() as $rowid => $item) {
		   
		    $product = $this->M_products->get_this(intVal($item['id']));
		   
		   $productName = $product->product_name;
		    if($product->product_entier_association){
				$productName = $item['name'];
			}
		   $path =base_url().'admines/medias/products/'.$product->product_picture;
		  //$pathShowProduct =base_url().'products/show/'.$product->product_id.'-'.strtolower(url_title($product->product_name));
		   // $product_name = str_replace("'", " ", );
			$data[$item['id']]['product_id'] = intVal($item['id']);
			$data[$item['id']]['product_name'] = $productName;
			$data[$item['id']]['product_pictures'] = $path;
			$data[$item['id']]['pathShowProduct'] = $pathShowProduct;
			$data[$item['id']]['price'] = number_format($item['price'], 2, '.', '');  
			$data[$item['id']]['qty'] = $item['qty']; 
            $data[$item['id']]['rowid'] = $item['rowid']; 
			$poids="";
            if($product->show_poids) {
				$poids =$product->product_poids;
				}			
            $data[$item['id']]['product_poids'] = $poids; 
			$totalCart=$totalCart+($item['price']*$item['qty']);
			$optionProductPrice="";
			if($item['options']['optionPrice']){
			$totalOptionPrice = $totalOptionPrice+ $item['options']['optionPrice'];
			$optionProductPrice=number_format($item['options']['optionPrice'], 2, '.', '');  
			}
			$data[$item['id']]['optionPrice'] = $optionProductPrice;
	  
	   }
	    $totalCart=$totalCart +$totalOptionPrice;
	   $totalCartTva=$totalCart*(1+$taxe)-$totalCart;
	   echo json_encode(array('result'=>1,'totalPriceAndoption'=>$totalPriceAndoption,'optionslist' => $optionslist,'optionPrice'=>$optionPrice,'price'=>number_format($price,2, '.', ''),'pricetotal'=>number_format($price*$this->input->post('qty'),2, '.', ''),'qty'=>$qty,'totalCartTva'=>number_format($totalCartTva, 2, ',', ''),"totalCartttc"=>number_format($totalCart*(1+$taxe), 2, ',', ''),"totalCart"=>number_format($totalCart, 2, ',', ''),"product_name"=>$product_name ,'all_cart'=>$data,'product_picture'=>$product->product_picture,'item'=>$item,'nbrcart'=>count($this->cart->contents()),'contents'=>$this->cart->contents()));
	 }
	 public function removeItem()
    {
	    $taxe = $this->M_taxe->get_taxe();
		$taxe_value= $taxe->taxe_value;
		$taxe= $taxe_value/100;
		$all_association=true;
		$totalOptionPrice = 0;
	   $totalCart=0;
		$rowid=$this->input->post('rowid');
			$data = array(
			'rowid'   => $rowid,
			'qty'     => 0
			);
	    
		if($this->cart->update($data)){ 
	  foreach($this->cart->contents() as $rowid => $item) {
		  
				$product = $this->M_products->get_this($item['id']);      
				$totalCart=$totalCart+($item['price']*$item['qty']);
				if($product->product_entier_association){
				} else{
				$all_association=false;
				}
				$optionProductPrice="";
				if($item['options']['optionPrice']){
				$totalOptionPrice = $totalOptionPrice+ $item['options']['optionPrice'];
				$optionProductPrice=number_format($item['options']['optionPrice'], 2, '.', '');  
				}
				$data[$item['id']]['optionPrice'] = $optionProductPrice;
			}     
	        $transporters = $this->M_transporters->get_this(1); 
			if($all_association){
			$transporters = $this->M_transporters->get_this(2); 
			}
			$totalCart=$totalCart+$totalOptionPrice;
			$totalCartTva=$totalCart*(1+$taxe)-$totalCart;
			$totalCartsTVA=($totalCart+$transporters->transporter_price_in_france)*(1+$taxe)-($totalCart+$transporters->transporter_price_in_france);
			$totalCartsHT=($totalCart+$transporters->transporter_price_in_france)-$totalCartsTVA;
            $totalCartsTTC=$totalCart+$transporters->transporter_price_in_france;
			echo json_encode(array('result'=>1,"totalCartsTTC"=>number_format($totalCartsTTC, 2, ',', ''),"totalCartsTVA"=>number_format($totalCartsTVA, 2, ',', ''),"totalCartsHT"=>number_format($totalCartsHT, 2, ',', ''),'qty'=>0,'totalCartTva'=>number_format($totalCartTva, 2, ',', ''),"totalCartht"=>number_format((1+$taxe)*$totalCart, 2, ',', ''),"totalCart"=>number_format($totalCart, 2, ',', ''),'nbrcart'=>count($this->cart->contents()),'contents'=>$this->cart->contents()));
	
		}
	}
	 public function update_product()
    {
	    $taxe = $this->M_taxe->get_taxe();
		$taxe_value= $taxe->taxe_value;
		$taxe= $taxe_value/100;
		$rowidup=$this->input->post('rowid');
		$qty=$this->input->post('qty');
			$data = array(
			'rowid'   => $rowidup,
			'qty'     => $qty
			);
	
		if($this->cart->update($data)){ 
	
			   $data = array();
		$totalCart=0;
		$totalPriceProduct=0;
		$all_association=true;
		 $totalOptionPrice = 0;
	   foreach($this->cart->contents() as $rowid => $item) {
		   $image =$this->M_products_pictures->get_one_product_picture($item['id']);
		   $path =base_url().'admines/medias/products/'.$image->product_pictures;
		    $product = $this->M_products->get_this($item['id']);
		   //  $pathShowProduct =base_url().'products/show/'.$product->product_id.'-'.strtolower(url_title($product->product_name));
		    $pathShowProduct =base_url().'products/show/'.$product->product_id;
		    $product_name = str_replace("'", " ", $product->product_name);
			$data[$item['id']]['product_id'] = $item['id'];
			$data[$item['id']]['product_name'] = $product_name;
			$data[$item['id']]['product_pictures'] = $path;
			$data[$item['id']]['pathShowProduct'] = $pathShowProduct;
			$data[$item['id']]['price'] = number_format($item['price'], 2, '.', '');  
			$data[$item['id']]['qty'] = $item['qty']; 
            $data[$item['id']]['rowid'] = $item['rowid'];  			
                                                    
		$totalCart=$totalCart+($item['price']*$item['qty']);
		
		if($rowidup==$rowid){
			$totalPriceProduct=$item['price']*$item['qty'];
		}
		if($product->product_entier_association){
		} else{
		$all_association=false;
		}
		$optionProductPrice="";
		if($item['options']['optionPrice']){
		$totalOptionPrice = $totalOptionPrice+ $item['options']['optionPrice'];
		$optionProductPrice=number_format($item['options']['optionPrice'], 2, '.', '');  
		}
		$data[$item['id']]['optionPrice'] = $optionProductPrice;
	   }
	   $transporters = $this->M_transporters->get_this(1); 
	   if($all_association){
						$transporters = $this->M_transporters->get_this(2); 
					}
		$totalCart=$totalCart+$totalOptionPrice;
	     $totalCartTva=$totalCart*(1+$taxe)-$totalCart;
	     $totalCartsTVA=($totalCart+$transporters->transporter_price_in_france)*(1+$taxe)-($totalCart+$transporters->transporter_price_in_france);
	     $totalCartsHT=($totalCart+$transporters->transporter_price_in_france)-$totalCartsTVA;
	     $totalCartsTTC=$totalCart+$transporters->transporter_price_in_france;
	   echo json_encode(array('result'=>1,"totalCartsTTC"=>number_format($totalCartsTTC, 2, ',', ''),"totalCartsTVA"=>number_format($totalCartsTVA, 2, ',', ''),"totalCartsHT"=>number_format($totalCartsHT, 2, ',', ''),'qty'=>$qty,'totalCartTva'=>number_format($totalCartTva, 2, ',', ''),"totalCartht"=>number_format($totalCart*(1-$taxe), 2, ',', ''),"totalPriceProduct"=>number_format($totalPriceProduct, 2, ',', ''),"totalCart"=>number_format($totalCart, 2, ',', ''),"product_name"=>$product_name ,'all_cart'=>$data,'product_picture'=>$image->product_pictures,'item'=>$item,'nbrcart'=>count($this->cart->contents()),'contents'=>$this->cart->contents()));
	 
		}
	}
	
		 public function editItem()
    {
	
		$rowids=$this->input->post('rowid');
			
	    
		$sub_categorie_id=false;
		$show_option=false;
		$options ="";
		$group_options ="";
		$checkListOptions =[];
	  foreach($this->cart->contents() as $rowid => $item) {
		  if($rowid==$rowids){
				$product = $this->M_products->get_this($item['id']); 
				$qty = $item['qty']; 
				$price = $item['price']; 
				$pricetotal=$item['price']*$item['qty'];
				$productName = $product->product_name;
				$productId = $product->product_id;
				$product_is_promo = $product->product_is_promo;
				if($product->product_entier_association){
				$productName = $item['name'];
				}
				$product_price_selling =  number_format($product->product_price_selling, 2, ',', '');
			    $product_price_dicount =  number_format($product->product_price_dicount, 2, ',', '');
                $productPicture =  base_url().'admines/medias/products/'.$product->product_picture;	
			    $priceKg= '';   
						if($product->product_poids) {
								if($product->product_is_promo==2){
								$priceKg= "Le 1 kg à € ".(number_format((1/$product->product_poids)* $product->product_price_dicount, 2, ',', ''));
								}  else {
								$priceKg= "Le 1 kg à € ".(number_format((1/$product->product_poids)* $product->product_price_selling, 2, ',', ''));

								}

						}
						$product_poids=$product->product_poids;	
						$product_info=$product->product_info;						
						$show_poids=$product->show_poids;
						$show_option=$product->show_option;
						$sub_categorie_id=$product->sub_categorie_id;
						$association_id=$item['options']['association_id'];
					   if($item['options']['optionslist']){
						foreach ($item['options']['optionslist'] as $optionslist){
							$checkListOptions []=$optionslist['categorie_option_id'];
						  }		
					  } 				  
		    }  
			
			    
			} 
             if($show_option){
				$options = $this->M_categories_options->get_options($sub_categorie_id,false);
				$group_options = $this->M_categories_options->get_options($sub_categorie_id,true);	
			}			
	    
			echo json_encode(array('result'=>1 ,'productId'=>$productId,'associationId'=>$association_id,'rowids'=>$rowids,'checkListOptions'=>$checkListOptions,'options'=>$options,'group_options'=>$group_options,'product_info'=>$product_info,'show_poids'=>$show_poids,'show_option'=>$show_option,'priceKg'=>$priceKg,'product_poids'=>$product_poids,'product_is_promo'=>$product_is_promo,'product_price_dicount'=>$product_price_dicount,'product_price_selling'=>$product_price_selling,'productPicture'=>$productPicture,'productName'=>$productName,'qty'=>$qty,'price'=>number_format($price, 2, ',', ''),'pricetotal'=>number_format($pricetotal, 2, ',', '')));
	
		
	}
	
	public function genererChaineAleatoire($longueur, $listeCar = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
	{
	$chaine = '';
	$max = mb_strlen($listeCar, '8bit') - 1;
	for ($i = 0; $i < $longueur; ++$i) {
	$chaine .= $listeCar[random_int(0, $max)];
	}
	return $chaine;
	}			
			
	
		 public function updateCarteItem()
    {
	    
		$rowidup=$this->input->post('rowid');
	    $qty= $this->input->post('qty');
		$association_id= $this->input->post('associationId');
		$slectedOptions = $this->input->post('slectedOption');
		$productId = $this->input->post('productId');
		$product = $this->M_products->get_this($productId); 
		$optionslist = array();
		$optionPrice=0;
		foreach($slectedOptions as $slectedOption=>$v) {
		
			$options_type = $this->M_categories_options->get_this($v);
			$optionslist[$options_type->categorie_option_id]['categorie_option_id']=$options_type->categorie_option_id;
			$optionslist[$options_type->categorie_option_id]['option_name']=$options_type->option_name;
			$optionslist[$options_type->categorie_option_id]['option_price']=$options_type->option_price;
			$optionslist[$options_type->categorie_option_id]['option_price_unitaire']=number_format($options_type->option_price, 2, '.', '');
			$optionslist[$options_type->categorie_option_id]['option_price_rectif']=number_format($options_type->option_price*$qty, 2, '.', '');;
			$optionslist[$options_type->categorie_option_id]['qty']=$qty;
			$optionPrice=$optionPrice+$options_type->option_price*$qty;
		}
			$data = array(
			'rowid'   => $rowidup,
			'qty'     => $qty,
			'options'  => array('product' => $product,'optionPrice' => $optionPrice,'optionslist' => $optionslist,'product_entier_association' => $product->product_entier_association, 'association_id' => $association_id)
			
			);
			
	$this->cart->update($data);
	$this->session->set_flashdata('update_cart', 'Mise à jour votre panier avec succès');
	 echo json_encode(array('result'=>1));
	 
		}
	
}

