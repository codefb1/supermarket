 <?php  if($session_search!="boucherie"){ 
$session_search_array = array(
								 'all_sub_categorie' => "",
								 'filtre_boucherie_certif' => "",
								 'product_boucherie_bio' => "",
								 'product_boucherie_label_rouge' => "",
								 
								 
							 );
							  $this->session->set_userdata($session_search_array); 
 
  } ?>
  
   <?php  if($session_search!="subcategorie"){ 
$session_search_array = array(
								 
								 'sub_categorie_certif' => "",
								 'sub_categorie_bio' => "",
								 'sub_categorie_label_rouge' => "",
								 
								 
							 );
							  $this->session->set_userdata($session_search_array); 
 
  } ?>
  
    <?php  if($session_search!="categorie"){ 
$session_search_array = array(
								 
								 'product_categorie_certif' => "",
								 'product_categorie_bio' => "",
								 'product_categorie_label_rouge' => "",
								 
								 
							 );
							  $this->session->set_userdata($session_search_array); 
 
  } ?>
     <?php  if($session_search!="solde"){ 
$session_search_array = array(
								 'all_product_categorie_solde' => "",
								 'all_product_certif_solde' => "",
								 'all_product_bio_solde' => "",
								 'all_product_label_rouge_solde' => "",
								 
								 
							 );
							  $this->session->set_userdata($session_search_array); 
 
  } ?>
  