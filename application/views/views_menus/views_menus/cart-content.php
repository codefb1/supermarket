	 <?php if($this->cart->contents()){  ?>
										<table>
										
                                            <tbody class="cart_items">
											<?php $totalCart=0; $totalOptionPrice = 0; foreach ($this->cart->contents() as $items):
											
											
											$path =base_url().'admines/medias/products/'.$items['options']['product']->product_picture;
											$totalCart=$totalCart+($items['price']*$items['qty']);
											if($items['options']['optionPrice']){
											$totalOptionPrice = $totalOptionPrice+$items['options']['optionPrice'];
											}
											
											?>
											
													<tr class="rowid_<?php echo $items['rowid'];?>">
													<td class="product-image">
													
													<?php if($items['options']['product']->product_entier_association){  ?>
													<a href="#"><img src="<?php echo $path ;?>" alt="<?php echo  $items['options']['product']->product_name; ?>"></a>
													<?php  } else {  ?>
													<a href="<?php echo base_url().'products/show/'.$items['options']['product']->product_id.'-'.strtolower(url_title($items['options']['product']->product_name));?>"><img src="<?php echo $path ;?>" alt="<?php echo  $items['name'];?>"></a>
													
													<?php  }  ?>
												</td>
													<td>
													 <?php if($items['options']['product']->product_entier_association){  ?>
													<div class="product-name"><a href="#"><?php echo  $items['name'];?></a></div>
													<?php  } else {  ?>
													<div class="product-name"><a href="<?php echo base_url().'products/show/'.$items['options']['product']->product_id.'-'.strtolower(url_title($items['options']->product_name));?>"><?php echo  $items['options']['product']->product_name;?></a></div>
			
													<?php  }  ?>
													<div><?php echo $items['qty'];?> x<span class="product-price">€ <?php if ($items['price']>0){  echo number_format($items['price'], 2, ',', '');} else {echo "N.D";}?></span></div>
													 <?php if($items['options']['optionPrice']){  ?>
													  <div>Option :<span class="product-price">€ <?php   echo number_format($items['options']['optionPrice'], 2, ',', ''); ?></span></div>
													
													 <?php  }  ?>
													
													</td>
													<td class="action">
													<a class="remove" href="#" onclick="remove_item('<?php echo $items['rowid'];?>');"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
													</td>
													</tr>  
													<?php endforeach; ?>
                                             
                                            </tbody>
                                        </table>
										  <?php  } else {  ?>
										     <table>
                                            <tbody class="cart_items">
											
                                                 <tr>
                                                    <td>
														<div style="width: 100%;">
												     		<p class="text-center">Aucun article dans votre panier.</p>
														</div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
										  <?php }  ?>
										               <table>
                                            <tbody class="">
											<tr></tr>
                                                   <tr class="total">
                                                    <td colspan="2">Total TTC:</td>
                                                    <td class="total_cart"> € <?php echo  number_format($totalCart+$totalOptionPrice, 2, ',', '') ;?></td>
                                                </tr>
                                                    <td colspan="3" class="d-flex justify-content-center">
                                                        <div class="cart-button">
                                                            <a href="<?php echo base_url().'cart';?>" title="Voir panier" class="view_cart">Voir panier </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    