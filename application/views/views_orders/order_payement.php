                      <div class="wrap-banner">

            <!-- breadcrumb -->
            <nav class="breadcrumb-bg">
                <div class="container no-index">
                    <div class="breadcrumb">
                        <ol>
                              <li class="breadcrumb-home">
                                            <a href="<?php echo base_url();?>">
                                                <span>Accueil</span>
                                            </a>
                                        </li>
                            <li>
                                <a href="#" class="breadcrumb-title">
                                    <span>Paiment </span>
                                </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </nav>

        </div>

				   
					  <div id="wrapper-site">
            <div id="content-wrapper" class="full-width">
                <div id="main">
				
                    <div class="container account">	
									<h1 class="title-page">Paiment </h1>
									<div class="row">
									  <div class="col-4 col-sm-4 col-md-4 col-lg-4 text-center "> 
									  </div>
									    <div class="col-2 col-sm-2 col-md-2 col-lg-2 text-center "> 
									  <form action="<?php echo base_url().'payments/accepte';?>" id="customer-form" class="js-customer-form" method="post">
                                     <input  name="order_billing_lastname" type="hidden"  value="<?php echo $order_billing_lastname; ?>">
									<input  name="order_billing_firstname" type="hidden"  value="<?php echo $order_billing_firstname; ?>">
									 <input  name="order_billing_city" type="hidden"  value="<?php echo $order_billing_city; ?>">
									 <input  name="order_billing_phone" type="hidden"  value="<?php echo $order_billing_phone; ?>">
									 <input  name="order_billing_street" type="hidden"  value="<?php echo $order_billing_street; ?>">
									 <input  name="order_billing_country" type="hidden"  value="<?php echo $order_billing_country; ?>">
									 <input  name="order_billing_zip" type="hidden"  value="<?php echo $order_billing_zip; ?>">
									 <input  name="order_billing_email" type="hidden"  value="<?php echo $order_billing_email; ?>">
									
									<input  name="order_shipping_lastname" type="hidden"  value="<?php echo $order_shipping_lastname; ?>">
									 <input  name="order_shipping_firstname" type="hidden"  value="<?php echo $order_shipping_firstname; ?>">
									 <input  name="order_shipping_city" type="hidden"  value="<?php echo $order_shipping_city; ?>">
									 <input  name="order_shipping_phone" type="hidden"  value="<?php echo $order_shipping_phone; ?>">
									 <input  name="order_shipping_street" type="hidden"  value="<?php echo $order_shipping_street; ?>">
									 <input  name="order_shipping_country" type="hidden"  value="<?php echo $order_shipping_country; ?>">
									 
									 
									 <input  name="order_shipping_zip" type="hidden"  value="<?php echo $order_shipping_zip; ?>">
									 <input  name="order_shipping_email" type="hidden"  value="<?php echo $order_shipping_email; ?>">
									 
									 
									  <button class="btn btn-primary" type="submit">
                                                 Paiement accepté 
                                                </button>
									 
									 
									 
									 
									 
									 </form>
									  </div>
									   <div class="col-2 col-sm-2 col-md-2 col-lg-2 text-center "> 
										  <button class="btn btn-primary" style="margin-left: 20px;"onClick="location.href='<?php echo base_url().'payments/refuse';?>'">
                                                  Paiement refusé
												  
                                                </button>
												
									  </div>
									     <div class="col-4 col-sm-4 col-md-4 col-lg-4 text-center "> 
									  </div>
									   
									</div>
									</div>
									</div>
									</div>
									</div>
								