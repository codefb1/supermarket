		<div class="modal fade" id="myModalCartSave" tabindex="-1" aria-labelledby="myModalCartSaveLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
  <div class="modal-header">
<h4 class="modal-title">
					
					<div>  Les produits suivants ont été bien ajoutés </div>
					</h4>
					  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
					
				</div>
      <div class="modal-body">
	  
	  <table class="std table table_cart">
                                            <thead>
                                                <tr style="background: #f7f8f9!important;">
                                                    <th class="first_item" style="padding-left: 5%;" >Nom du produit</th>
													<th class=""style="width: 20%;">Quantité</th>
                                                      <th class="item mywishlist_first"style="width: 20%;">Prix Unitaire TTC   </th>
													<th class="item mywishlist_first"style="width: 20%;">Prix Total TTC </th>
                                                    
													<th class="item mywishlist_second"></th>
                                                </tr>
                                            </thead>
											<tbody class="list_cart_modal">
											</tbody>
											</table>
											
     
					
      </div>
      <div class="modal-footer cart-footer">
	    <a type="button" class="btn btn-secondary checkout_page" href="<?php echo base_url().'cart';?>" >  <i class="fa fa-chevron-right"></i> Voir mon panier</a>
 <button type="button" class="btn btn-secondary cart_modal_close" data-dismiss="modal"> <i class="fa  fa-chevron-right"></i> Continuer mes achats</button>

      </div>
    </div>
  </div>
</div>
  