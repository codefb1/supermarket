		<div class="modal " id="showProducts" tabindex="-1" aria-labelledby="myModalshowProducts" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
  <div class="modal-header">

					  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
					
				</div>
      <div class="modal-body">
	  
                    <div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 ">
					<img class="img-fluid image-cover product_image_modal" src="" alt="">
					</div>
					
					<div class="col-lg-6 col-md-6 col-sm-6 products_modal">
					 <div class="row">
					 <div class="col-lg-12 col-md-12 col-sm-12 "><h2 class="product_name_modal"></h2></div>
					</div>
					 <div class="row block_price">
					 <div class="col-lg-12 col-md-12 col-sm-12 product_price_modal" ></div>
									  <div class="col-lg-12 col-md-12 col-sm-12 product_price_kg_modal" >
									  
									  <span class="product_price_kgs">  </span> 
                                             
									  </div>
					  <div class="col-lg-12 col-md-12 col-sm-12 product_info_modal" ><span class="product_info"></span></div>
					    					              
					
					</div>
					<div class="row ">
					   <div class="has-border cart-area  block-quantity">
                                                            <div class="product-quantity">
                                                                <div class="qty">
                                                                    <div class="input-group">
                                                                        <div class="quantity">
                                                                            <span class="control-label">Quantité : </span>
                                                                            <input type="text" name="qty" id="quantity_wanted" value="1"  class="input-group form-control qty quantity_modal">
                                                                        </div>
                                                                        <span class="add">
                                                                            <button style="background: #fff  !important;border: none;"class="btn btn-primary add-to-cart add-item  add_cart_modal" data-id=<?php echo $product->product_id;?>  >
                                                                             <span>Ajouter au panier</span>
                                                                            </button>
                                                                           
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <p class="product-minimal-quantity">
                                                            </p>
                                                        </div>
					</div>
					
					
					<div class="row "> 
					  <div class="col-lg-12 col-md-12 col-sm-12 label_certification" ></div>
					
					</div>
					<div class="row blcok_product_short_description"> 
					  <div class="col-lg-12 col-md-12 col-sm-12 " ><p class="product_short_description_modal"></p></div>
					
					</div>
					
					<div class="row blcok_product_path_modal"> 
					  <div class="col-lg-12 col-md-12 col-sm-12 " >
					  <a  href=""  class="product_path_modal" ><span> Voir article</span> </a>
					  
					  </div>
					
					</div>
					</div>
					
					</div>
											
     
					
      </div>
      <div class="modal-footer">
	  
      </div>
    </div>
  </div>
</div>
  